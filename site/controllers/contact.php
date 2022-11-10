<?php



function validate_rechapcha($response){
	// Verifying the user's response (https://developers.google.com/recaptcha/docs/verify)
	$verifyURL = 'https://www.google.com/recaptcha/api/siteverify';
    echo "<pre>".$response."</pre>";
	
	// Collect and build POST data
	$post_data = http_build_query(
		array(
			'secret' => '',
			'response' => $response,
			'remoteip' => (isset($_SERVER["HTTP_CF_CONNECTING_IP"]) ? $_SERVER["HTTP_CF_CONNECTING_IP"] : $_SERVER['REMOTE_ADDR'])
		)
	);
	
	// Send data on the best possible way
	if(function_exists('curl_init') && function_exists('curl_setopt') && function_exists('curl_exec')) {
		// Use cURL to get data 10x faster than using file_get_contents or other methods
		$ch =  curl_init($verifyURL);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
			curl_setopt($ch, CURLOPT_TIMEOUT, 5);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-type: application/x-www-form-urlencoded'));
			$response = curl_exec($ch);
		curl_close($ch);
	} else {
		// If server not have active cURL module, use file_get_contents
		$opts = array('http' =>
			array(
				'method'  => 'POST',
				'header'  => 'Content-type: application/x-www-form-urlencoded',
				'content' => $post_data
			)
		);
		$context  = stream_context_create($opts);
		$response = file_get_contents($verifyURL, false, $context);
	}

	// Verify all reponses and avoid PHP errors
	if($response) {
       
		$result = json_decode($response);
		if ($result->success===true) {
        
			return true;
		} else {
			return $result;
		}
	}

	// Dead end
	return false; 
}



return function($kirby, $pages, $page) {

    $alert = null;

    if($kirby->request()->is('POST') && get('submit')) {

        

        // check the honeypot
        /*if(empty(get('website')) === false) {
            go($page->url());
            exit;
        }*/
    

        // check the captcha
        
        $captchaResponse = get('g-recaptcha-response');
   
        if (validate_rechapcha($captchaResponse) === false) {

            exit;
        }

        
        $data = [
            'firstname'  => get('firstname'),
            'lastname'  => get('lastname'),
            'email' => get('email'),
            'text'  => get('text'),

        
           
        ];

        $rules = [
            'firstname'  => ['required', 'min' => 2],
            'lastname'  => ['required', 'min' => 2],
            'email' => ['required', 'email'],
            'text'  => ['required', 'min' => 3, 'max' => 3000],

         
        ];

        $messages = [
            'firstname'  => 'First name must at least have 2 letters',
            'lastname'  => 'Last name must at least have 2 letters',
            'email' => 'Please enter a valid email address',
            'text'  => 'Please enter a text between 3 and 3000 characters',
          
        ];




        // some of the data is invalid
        if($invalid = invalid($data, $rules, $messages)) {
            $alert = $invalid;

            // the data is fine, let's send the email
        } else {
            try {
                
                $kirby->email([
                    'template' => 'email',
                    'from'     => 'sender@vivasvat.yoga',
                    'replyTo'  => $data['email'],
                    'to'       => 'vivasvat.yoga@gmail.com',
                    'subject'  => esc($data['firstname']).' '.esc($data['lastname']). ' sent you a message from your contact form',
                    'data'     => [
                        'text'   => esc($data['text']),
                        'sender' => esc($data['firstname'].' '.esc($data['lastname'])),
                        'email'     => esc($data['email'])
                    ]
                ]);


            } catch (Exception $error) {
                echo $error;
                $alert['error'] = "The form could not be sent";
            }

            // no exception occured, let's send a success message
            if (empty($alert) === true) {
                $success = 'Your message has been sent, thank you. We will get back to you soon!';
                $data = [];
            }
        }
    }

    return [
        'alert'   => $alert,
        'data'    => $data ?? false,
        'success' => $success ?? false
    ];
};












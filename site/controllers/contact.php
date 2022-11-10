<?php
return function($kirby, $pages, $page) {

    $alert = null;

    if($kirby->request()->is('POST') && get('submit')) {

        // check the honeypot
        /*if(empty(get('website')) === false) {
            go($page->url());
            exit;
        }*/

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

        $captchaInvalid = true;

        // Validate captcha
        $curlx = curl_init();
        curl_setopt($curlx, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($curlx, CURLOPT_HEADER, 0);
        curl_setopt($curlx, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($curlx, CURLOPT_POST, 1);

        $post_data = 
        [
            'secret' => '6LdE7fUiAAAAAJsKuqbVi6E2E5p9XNxk5q3dt_4c', //<--- your reCaptcha secret key
            'response' => $_POST['g-recaptcha-response']
        ];
        curl_setopt($curlx, CURLOPT_POSTFIELDS, $post_data);
        $resp = json_decode(curl_exec($curlx));
        curl_close($curlx);

        if ($resp->success) 
        {
          $captchaInvalid = false;
        } else {
            $captchaInvalid = true;    
        }
        $invalid = invalid($data, $rules, $messages);

        // some of the data is invalid
        if ($captchaInvalid && $invalid) {
            $alert = "";
            if ($invalid) {
                $alert = $invalid;
            } else {
                $alert = "You failed to check that you are not a robot";
            }
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
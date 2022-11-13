<?php

define( 'WP_DEBUG', true ); // On active les erreurs
define( 'WP_DEBUG_LOG', true ); // Enregistrées dans un fichier
define( 'WP_DEBUG_DISPLAY', true );

return function ($kirby, $pages, $page) {

    $alert = null;

    if ($kirby->request()->is('POST') && get('submit')) {

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
            'g-recaptcha-resonse' => get('g-recaptcha-response')

        
           
        ];

        $rules = [
            'firstname'  => ['required', 'min' => 2],
            'lastname'  => ['required', 'min' => 2],
            'email' => ['required', 'email'],
            'text'  => ['required', 'min' => 3, 'max' => 3000],
            'g-recaptchar-response' => ['required', ]

         
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

                if (isset($_POST['g-recaptcha-response'])) {
                    $captcha=$_POST['g-recaptcha-response'];
                }
                if (!$captcha) {
                    throw error('lease check the captcha form.');
                }
                $secretKey = c::get('plugin.recaptcha.secret');
                $ip = $_SERVER['REMOTE_ADDR'];
                $response=file_get_contents(
                "https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip
                );
                $responseKeys = json_decode($response, true);
                if (intval($responseKeys["success"]) !== 1) {
                    throw error('The authentification that you are not spammer failed.');
                }
                
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












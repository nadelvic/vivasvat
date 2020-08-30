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
            'text'  => get('text')
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
            'text'  => 'Please enter a text between 3 and 3000 characters'
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
                    'to'       => 'nathan.delavictoire@gmail.com',
                    'subject'  => esc($data['name']) . ' sent you a message from your contact form',
                    'data'     => [
                        'text'   => esc($data['text']),
                        'sender' => esc($data['name'])
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
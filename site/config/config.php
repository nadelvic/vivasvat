<?php 


/* Languages */

/*
c::set('languages', array(
    array(
      'code'    => 'fr',
      'name'    => 'FR',
      'default' => true,
      'locale'  => 'fr_FR',
      'url'     => '/',
    ),
    array(
      'code'    => 'en',
      'name'    => 'EN',
      'locale'  => 'en_US',
      'url'     => '/en',
    ),
  ));*/
  


 // Production mod 
c::set('plugin.recaptcha.sitekey', '6LdE7fUiAAAAAC6jRbHUQ-uzj9HDPgg1bb619WJ2');

c::set('plugin.recaptcha.secret', '');

  


  return [
      'languages' => true,
      'debug'  => true,
     
  ];

?>
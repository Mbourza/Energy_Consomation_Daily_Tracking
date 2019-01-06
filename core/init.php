<?php 

session_start();

$GLOBALS['config'] = array(


    'mysql' => array(
    
        'host' => 'localhost',
        'user' => 'root',
        'pass' => '',
        'db' => 'alkatech'
    ),
    
    'session' =>array(
    
        'session_name' => 'user',
        'token_name' => 'token'
    ),
    
    'cookies' => array(
        
        'cockie_name' => 'hash',
        'cookie_expiry' => 604000
    )

);

spl_autoload_register(function($class){

	require_once('classes/'. $class .'.php');
});

require_once ('functions/escape.php');

?>
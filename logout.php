<?php 

require_once('core/init.php');

$user = new Client();

$user->logOut();

Redirect::to('login.php');


?>
<?php 

require_once('core/init.php');

$vals = DB::getInstance()->getId();

$val = $vals->value_gaz;

echo $val;


?>
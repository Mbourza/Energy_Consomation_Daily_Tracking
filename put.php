<?php 

require_once('core/init.php');

if(isset($_GET['data'])) {

	$data = json_decode($_GET["data"], true);
    
    $put = DB::getInstance()->insert('compte', array(

		'value_gaz' => $data["gaz"]
	));

	if(!$put){

		echo 'No';
	}


}

?>
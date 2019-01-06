<?php

require_once('core/init.php');
if(Input::exists()){

    if(Token::check(Input::get('token'))){

	    $validate   = new Validate();
	    $validation = $validate->check($_POST, array(

		    'nom' => array(

			    'required' => true,
			    'min' => 3,
			    'max' => 20 
			    ),

		    'prenom' => array(

			    'required' => true,
			    'min' => 3,
			    'max' => 20 
			    ),

		    'email' => array(

		    	'unique' => 'clients',
		    	'required' => true
		    	),

		    'password' => array(

			    'required' => true
			    )

		    ));

	    if($validation->passed()){

		    $client = new Client();
		    $salt = Hash::salt(32);

		    try{

		    	$client->create(array(

		    		'nom_client' => Input::get('nom'),
		    		'prenom_client' => Input::get('prenom'),
		    		'email'  => Input::get('email'),
		    		'password'   => Hash::make(Input::get('password'), $salt),
		    		'group' => 1,
		    		'salt'  => $salt,
		    		'date_join' => date('Y-m-d H:i:s'),
		    		'avatar' => $_FILES['avatar']['name']
,
		    		));

		    }catch(Exception $e){

		    	die($e->getMessage());
		    }

	    }else{

		    print_r($validation->errors());
	    }
	}
}

?>

<form action="" method="post" enctype="multipart/form-data" id="addEtud">
	
	<div class="field">
		<input type="text" name="nom" placeholder="Client Name..." id="numInput"/>
	</d&&siv>

	<div class="field">
	    <input type="text" name="prenom" placeholder="Client Last Name..." id="lnumInput"/>
	</div>

	<div class="field">
	   <input type="email" name="email" placeholder="Client Email here..." id="eInput"/>	
	</div>

	<div class="field">
	    <input type="password" name="password" placeholder="Client Password..." id="coInput"/>	
	</div>

	<div class="field">
	    <input type="file" id="fInput" name="avatar"/>
	</div>

	<div class="field">
	    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>"/>
        <input type="submit" value="Add Client" id="sub-btn">
	</div>

</form>
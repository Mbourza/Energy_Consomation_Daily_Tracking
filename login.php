<?php 

require('core/init.php');

if(Input::exists()) {

    if(Token::check(Input::get('token'))) {

	    $validate   = new Validate();
	    $validation = $validate->check($_POST, array(

            'clientEmail' => array('required' => true),
            'clientPass' => array('required' => true)
        
        ));
        
        if($validation->passed()){
            
            $client = new Client();   

            $login = $client->login(Input::get('clientEmail'), Input::get('clientPass'));
            
            if($login){
                
                Redirect::to('index.php');

            }else{

                echo 'there was a problem';
            }
            
        } else{
            
            echo "Entere Ur Username And Password To Log In";
        }
    }
}


?>

<?php require_once('template/header.php'); ?>

<div id="logInfo">
    
    <p>Entre Your Data To Log Into Your Account</p>

    <form action="" method="post">
        <input type="email" name="clientEmail" placeholder="Your Email..." id="nInput"><br />
        <input type="password" name="clientPass" placeholder="Your password..." id="pInput"><br />
        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
        <input type="submit" value="Log In" id="ulog-btn">
    </form>
    <div id="helpanel">
        <a href="">Help</a>
        <a href="">About</a>
        <a href="">Contact</a>
    </div>
    
</div>
<?php require_once('template/footer.php'); ?>

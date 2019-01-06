<?php require_once('core/init.php'); ?>

<?php 

$client = new Client();

?>

<?php require_once('template/header.php'); ?>

<?php require_once('template/sidebar.php'); ?>

<?php 

if(!Session::exists(Config::get('session/session_name'))){

	Redirect::to('login.php');

} else {

$page = escape(@$_GET['page']);

	switch($page){

		case '':
			require_once('template/content.php'); 
			break;
		case 'suivi':
			require_once('suivi.php');
			break;
		case 'historique':
			require_once'historique.php';
			break;
		case 'comparisation':
			require_once'comparisation.php';
			break;
		case'objectif': 
		    require_once'objectif.php';
		    break;
		    case'etiquete':
		    require_once'etiquete.php';
		    break;
		    case'facture':
		    require_once'facture.php';
		    break;
		    case'alarm':
		    require_once'alarm.php';
		    break;
		    case 'profile':
		    require_once'profile.php';
		    break;
		    case'parametre':
		    require_once'parametre.php';
		    break;

		    default :
		    require_once'includes/errors/404.php';
		    break;
	}
}
?>
<?php require_once('template/footer.php');?>



<!DOCTYPE html>
<html lang="fr">
	
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale = 1">	
	<title>ALakatech</title>
	<link rel="stylesheet" href="template/css/style.css" />
</head>
<body>
	
<div id="mainHeader">
    <div id="logo">
        <a href="#" ><img src="template/img/logo.png" alt="Website logo" /></a>
    </div>
    <ul>
        <li><?php if(Session::exists(Config::get('session/session_name'))) {echo Session::get(Config::get('session/session_name'));} ?><ul>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Parametre</a></li>
            <li><a href="#">logout</a></li>
        </ul></li>
    </ul>
</div>
<div id="warpp">
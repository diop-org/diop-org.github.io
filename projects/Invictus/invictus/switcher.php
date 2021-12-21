<?php
	if(isset($_GET['invictus_style'])){
		setcookie("invictus_style", $_GET['invictus_style'], time()+604800, "/", ".do-media.de" );	
	}
	if(isset($_GET['invictus_color'])){
		setcookie("invictus_color", $_GET['invictus_color'], time()+604800, "/", ".do-media.de" );	
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>
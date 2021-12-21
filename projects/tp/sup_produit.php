<?php
include("file:///C|/Users/User/127.0.0.1/EasyPHP 3.0/www/cours_tw_20_05_2011/connection/connexion.php");
$id=$_GET['codeprod'];
$req="delete from produit where codeprod=".$id;
$exe=mysql_query($req);
if($exe)
{
	echo"Suppression bien effectuee!";
	include("file:///C|/Users/User/127.0.0.1/EasyPHP 3.0/www/cours_tw_20_05_2011/modif1.php");
}
else
{
	echo"Erreur";
}
?>
<?php
include("connection/connexion.php");
$matricule=$_POST['idpret'];
$nom=$_POST['designpret'];
$req="insert into pret values('$matricule','$nom')";
$exe=mysql_query($req);
if($exe)
{
echo "pret enregistre avec succes <br>";
echo"<a href=\"pret.html\">nouvel pret </a>";
}
else
include("menu.html");
mysql_close();
?>

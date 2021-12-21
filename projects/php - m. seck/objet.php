<?php
include("connection/connexion.php");
$matricule=$_POST['idpret'];
$nom=$_POST['ISBN'];
$adres=$_POST['nbrepag'];
$num=$_POST['date'];
$req="insert into etre objet values('$matricule','$nom','$adres','$num')";
$exe=mysql_query($req);
if($exe)
{
echo "Objet enregistre avec succes <br>";
echo"<a href=\"pret.html\">nouvel objet </a>";
}
else
include("menu.html");
mysql_close();
?>

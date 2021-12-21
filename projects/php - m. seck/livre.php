<?php
include("connection/connexion.php");
$matricule=$_POST['ISBN'];
$nom=$_POST['titre'];
$adres=$_POST['nbrepag'];
$num=$_POST['numaut'];
$code=$_POST['idc'];
$cod=$_POST['cde'];
$req="insert into livre values('$matricule','$nom','$adres','$num','$code','$cod')";
$exe=mysql_query($req);
if($exe)
{
echo "livre enregistre avec succes <br>";
echo"<a href=\"livre.html\">nouveau livre </a>";
}
else
include("menu.html");
mysql_close();
?>

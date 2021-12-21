<?php
include("connection/connexion.php");
$matricule=$_POST['cde'];
$nom=$_POST['nome'];
$adres=$_POST['adres'];
$tel=$_POST['tel'];
$req="insert into editeu values('$matricule','$nom','$adres','$tel')";
$exe=mysql_query($req);
if($exe)
{
echo "Editeur enregistre avec succes <br>";
echo"<a href=\"editeur.html\">nouvel editeur </a>";
}
else
include("menu.html");
mysql_close();
?>

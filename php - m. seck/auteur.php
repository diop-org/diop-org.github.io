<?php
include("connection/connexion.php");
$matricule=$_POST['numaut'];
$nom=$_POST['nomaut'];
$prenom=$_POST['prenomaut'];
$adresse=$_POST['adresseaut'];
$req="insert into auteur values('$matricule','$nom','$prenom','$adresse')";
$exe=mysql_query($req);
if($exe)
{
echo "Auteur enregistre avec succes <br>";
echo"<a href=\"auteur.html\">nouvel auteur </a>";
}
else
include("menu.html");
mysql_close();
?>

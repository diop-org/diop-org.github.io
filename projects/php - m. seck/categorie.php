<?php
include("connection/connexion.php");
$matricule=$_POST['idc'];
$nom=$_POST['libc'];
$req="insert into categorie values('$matricule','$nom')";
$exe=mysql_query($req);
if($exe)
{
echo "Categorie enregistre avec succes <br>";
echo"<a href=\"categorie.html\">nouvelle categorie </a>";
}
else
include("menu.html");
mysql_close();
?>

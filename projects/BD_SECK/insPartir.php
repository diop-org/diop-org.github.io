<?php
include("connexion.php");
extract($_POST);
$requete="insert into partir values ('$mission','$employe','$dmis')";
$execute=mysql_query($requete);
if($execute)
{
echo "partir ajout� avec succ�s";
include("partir.php");
}
else
{
echo "ERROR";
}
?>
<?php
include("connexion.php");
extract($_POST);
$requete="insert into departement values ('$cod','$ndept')";
$execute=mysql_query($requete);
if($execute)
{
echo "Departement ajouté avec succés";
include("departement.php");
}
else
{
echo "ERROR";
}
?>
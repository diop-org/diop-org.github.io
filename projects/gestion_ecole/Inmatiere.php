
<?php
include("connexion.php");
extract($_POST);
$requete="insert into matiere values ('$code_matiere',$nom_matiere')";
$execution=mysql_query($requete);
if($execution)
{
echo "matiere  ajout� avec succ�s";
include("matiere.php");
}
else
{
echo "ERROR";
}
?>
<?php
include("connexion.php");
extract($_POST);
$requete="insert into employe values ('$matr','$civ','$no','$pno','$adr','$tel','$dep')";
$execute=mysql_query($requete);
if($execute)
{
echo "Employe ajouté avec succés";
include("employe.php");
}
else
{
echo "ERROR";
}
?>
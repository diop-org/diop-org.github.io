<?php
include("connexion.php");
extract($_POST);
$db= new DB;
$lien=$db->connexion();
$db->executeSQL=("insert into client values('$id','$no','$adr','$tel','$chiffr')",$lien);
echo"Insertion reussie";
include("compagnie.php");;
?>


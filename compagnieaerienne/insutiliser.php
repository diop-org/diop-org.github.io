<?php
include("connexion.php");
extract($_POST);
$db= new DB;
$lien=$db->connexion();
$db->executeSQL("insert into inventaire values('$date','$desti','$mat','$id')",$lien);
echo"Insertion reussie";
header("location:utiliser.php");
?>
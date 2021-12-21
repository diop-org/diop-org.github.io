<?php
include("connexion.php");
extract($_POST);
$db= new DB;
$lien=$db->connexion();
$db->executeSQL("insert into inventaire values('$id','$coul','$nbr'$type','$idcomp')",$lien);
echo"Insertion reussie";
header("location:avion.php");
?>
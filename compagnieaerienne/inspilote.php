<?php
include("connexion.php");
extract($_POST);
$db= new DB;
$lien=$db->connexion();
$db->executeSQL("insert into client values('$matr','$no','$pno','$adr','$tel')",$lien);
echo"Insertion reussie";
include("pilote.php");;
?>


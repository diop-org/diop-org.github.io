<?php
include("classDatabase.php");
extract($_POST);
$db=new DB;
$lien=$db->connexion();
$db->ExecuteSQL("insert into auteur values('$idA','$noA','$prA','$em')",$lien);
echo "<a href=\"auteur.php\">New </a>"
?>
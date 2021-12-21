<?php
include("classDatabase.php");
extract($_POST);
$db=new DB;
$lien=$db->connexion();
$db->ExecuteSQL("insert into livre values('$is','$nol','$nbp','$col','$idA')",$lien);
echo "<a href=\"livre.php\">New </a>"
?>
<?php
include("Database.php");
extract($_POST);
$db=new Database;
$lien=$db->connexion();
$req="insert into ordinateur values('$numOrdinateur','$numSalle','$marque','$tyep')";
$db->ExecuteSQL($req,$lien);
echo "Ordinateur ajoute avec succes";
echo "<a href=\"listOrdinateur.php\">Liste Ordinateurs</a>";
?>
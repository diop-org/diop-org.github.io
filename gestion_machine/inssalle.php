<?php
include("Database.php");
extract($_POST);
$db=new Database;
$lien=$db->connexion();
$req="insert into salle values('$numSalle','$libelleSalle','$matricule_Formateur')";
$db->ExecuteSQL($req,$lien);
echo "Salle ajoutee avec succes";
echo "<a href=\"#\">Recherche</a>";
?>
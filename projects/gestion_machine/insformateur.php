<?php
include("Database.php");
extract($_POST);
$db=new Database;
$lien=$db->connexion();
$req="insert into formateur values('$matricule_Formateur','$nom','$prenom','$adresse','$email')";
$db->ExecuteSQL($req,$lien);
echo "Formateur ajoute avec succes";
echo "<a href=\"listeformateur.php\">Listes Formateurs</a>";
?>
<?php
include("Database.php");
extract($_POST);
$db=new Database;
$lien=$db->connexion();
$req="insert into auteur values('$isbn','$intitule','$nbpage','$couleur')";
$db->ExecuteSQL($req,$lien);
echo "Auteur ajoute avec succes";
echo "<a href=\"auteur.php\">Retour</a>";
?>
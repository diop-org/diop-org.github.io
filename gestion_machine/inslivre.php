<?php
include("Database.php");
extract($_POST);
$db=new Database;
$lien=$db->connexion();
$req="insert into livre values('$ISBN','$intitule','$nbpage','$couleur','$idEditeur','$idrayon')";
$db->ExecuteSQL($req,$lien);
echo "Livre ajoute avec succes";
echo "<a href=\"listelivre.php\">Listes Livrer</a>";
?>
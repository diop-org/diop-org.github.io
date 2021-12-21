<?php
include("Database.php");
extract($_POST);
$db=new Database;
$lien=$db->connexion();
$req="insert into auteur values('$idauteur','$civilite','$nomauteur','$pnomauteur','$adrauteur','$telauteur')";
$db->ExecuteSQL($req,$lien);
echo "Auteur ajoute avec succes";
echo "<a href=\"auteur.php\">Retour</a>";
?>
<?php
include("connexion.php");
extract($_POST);
$requete="insert into etudiant  values('','$civilite','$nom','$prenom','$adresse','$telephone','$email','')";
$execution=mysql_query($requete);
if($execution)
{
echo "etudiant ajout� avec succ�s";
include("etudiant.php");
}
else
{
echo "ERROR";
}
?>
<?php
include("connect.php");
extract($_POST);
$req="insert into etudiant values('$matricule','$nom','$prenom','$adresse','$email','$idclasse')";
$exe=mysql_query($req);
if($exe)
{echo"Etudiant enregistree avec succes!!!!";
include("etudiant.php");
}
else
{echo"Erreur de codage";
}
?>

<?php
include("connexion.php");
extract($_POST);
$requete="insert into classe values ('','$no')";
$execution=mysql_query($requete);
if($execution)
{
echo "Classe ajouté avec succés";
include("etudiant.php");
}
else
{
echo "ERROR";
}
?>
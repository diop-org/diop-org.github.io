<?php
include("connexion.php");
extract($_POST);
$requete="insert into mission  values ('$mis','$typ','$lie','$dur')";
$execute=mysql_query($requete);
if($execute)
{
echo "Mission ajouté avec succés";
include("mission.php");
}
else
{
echo "ERROR";
}
?>
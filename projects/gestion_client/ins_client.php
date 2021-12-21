<?php
include("connection/connexion.php");
extract($_POST);
$req="insert into client values('$idcli','$nom','$pnom','$adresse','$telephone')";
$exe=mysql_query($req);
if($exe)
{
echo "client bien ajouté !<br>";
echo "<a href=\"client.php\"> New client</a>";
}
else
{
echo "Revoir les codes";
}
?>
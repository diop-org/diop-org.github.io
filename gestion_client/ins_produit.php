<?php
include("connection/connexion.php");
extract($_POST);
$req="insert into produit values('$code','$designation','$pu','$qte')";
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
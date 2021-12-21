
<?php
include("classDatabase.php");
$db= new DB;
$lien=$db->connexion();
$exe=$db->executeSQL("select * from avion",$lien);
echo"<table>
<tr class=\"deb\">
<td>Avion</td>
<td>Nombre_places</td>
<td>Type</td>
<td>Compagnie</td>

</tr>";
while($l=$db->Nlignes($exe))
{
echo"<tr class=\"in\">
<td>".$l['idAvion']."</td>
<td>".$l['couleur']."</td>
<td>".$l['nbplaces']."</td>
<td>".$l['type']."</td>
<td>".$l['idCompagnie']."</td>

</tr>";
}
echo "</table>";
?>


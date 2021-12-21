
<?php
include("classDatabase.php");
$db= new DB;
$lien=$db->connexion();
$exe=$db->executeSQL("select * from compagnie",$lien);
echo"<table>
<tr class=\"deb\">
<td>Compagnie</td>
<td>Nom_compagnie</td>
<td>Telephone</td>
<td>Chiffre d'affaire</td>

</tr>";
while($l=$db->Nlignes($exe))
{
echo"<tr class=\"in\">
<td>".$l['idCompagnie']."</td>
<td>".$l['nomCompagnie']."</td>
<td>".$l['adrCompagnie']."</td>
<td>".$l['telCompagnie']."</td>
<td>".$l['Chiffaffaire']."</td>

</tr>";
}
echo "</table>";
?>


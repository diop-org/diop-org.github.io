
<?php
include("classDatabase.php");
$db= new DB;
$lien=$db->connexion();
$exe=$db->executeSQL("select * from compagnie",$lien);
echo"<table>
<tr class=\"deb\">
<td>Compagnie</td>
<td>Nom_compagnie</td>
<td>Adresse</td>
<td>Telephone</td>
<td>Chiffre d'affaire</td>
<td>MODIFIER</td>
<td>SUPPRIMER</td>

</tr>";
while($l=$db->Nlignes($exe))
{
echo"<tr class=\"in\">
<td>".$l['idCompagnie']."</td>
<td>".$l['nomCompagnie']."</td>
<td>".$l['adrCompagnie']."</td>
<td>".$l['telCompagnie']."</td>
<td>".$l['chiffaffaire']."</td>
<td><a href=\"modif2compagnie.php?idcompagnie=".$l['idCompagnie']."\">modifier</a></td> 
<td><a href=\"sup2compagnie.php?idcompagnie=".$l['idCompagnie']."\" >supprimer</a></td>

</tr>";
}
echo "</table>";
?>


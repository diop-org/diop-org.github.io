<?php include("debut.php");?>
<?php
include("classDatabase.php");
$db= new DB;
$lien=$db->connexion();
$exe=$db->executeSQL("select * from candidat",$lien);
echo"<table>
<tr class=\"deb\">
<td>Identifiant</td>
<td>Nom_candidat</td>
<td>Prenom_candidat</td>
<td>Adresse_candidat</td>
<td>Nationalité</td>
<td>Telephone</td>
</tr>";
while($l=$db->Nlignes($exe))
{
echo"<tr class=\"in\">
<td>".$l['idCandidat']."</td>
<td>".$l['nomCandidat']."</td>
<td>".$l['pnomCandidat']."</td>
<td>".$l['adresse']."</td>
<td>".$l['nationalite']."</td>
<td>".$l['telephone']."</td>
</tr>";
}
echo "</table>";
?>

<?php include("fin.php");?>
<?php
include("classdatabase.php");
$db=new DB;
$lien=$db->connexion();
$result=$db->ExecuteSQL("select * from compagnie",$lien);
echo"<table border=\"1\">
<tr color=\"green\">
<td>Identifiant</td>
<td>Nom compagnie</td>
<td>Adresse</td>
<td>Chiffre Affaire</td>
</tr>";
while($l=$db->FetchLigne($result))
{
echo"<tr>
<td>".$l['idcompagni']."</td>
<td>".$l['nomcompagnie']."</td>
<td>".$l['adressecompagnie']."</td>
<td>".$l['chiffaff']."</td>
</tr>";
}
echo"</table>";
echo "<pre><a href=\"form_compagnie.php\">Retour</a>         <a href=\"Menu.php\">MENU</a></pre>";
?>
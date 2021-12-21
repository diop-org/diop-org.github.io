<?php
include("classdatabase.php");
$db=new DB;
$lien=$db->connexion();
$result=$db->ExecuteSQL("select * from avion",$lien);
echo"<table border=\"1\">
<tr bgcolor=\"green\">
<td>Identifiant</td>
<td>Nom avion</td>
<td>nobre de place</td>
<td>compagnie</td>
</tr>";
while($l=$db->FetchLigne($result))
{
echo"<tr>
<td>".$l['idavion']."</td>
<td>".$l['nomavion']."</td>
<td>".$l['nbplace']."</td>
<td>".$l['idcompagni']."</td>
</tr>";
}
echo"</table>";
echo "<a href=\"form_avion.php\">Retour</a>";
?>
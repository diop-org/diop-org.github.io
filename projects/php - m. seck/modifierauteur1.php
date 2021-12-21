<?php
require("connection/connexion.php");
echo"<table width=\"100\">
<tr>
<td width=\"20\">nomaut</td>
<td width=\"20\">prenomaut</td>
<td width=\"20\">adresseaut</td>
<td width=\"20\">Modifier</td>
</tr>";
$aff="select *from auteur order by nomaut asc";
$exe=mysql_query($aff);
while($ligne=mysql_fetch_array($exe))
{
echo"<tr>
<td width=\"30\">".$ligne['nomaut']."</td>
<td width=\"20\">".$ligne['prenomaut']."</td>
<td width=\"40\">".$ligne['adresseaut']."</td>
<td width=\"20\"><a href=modifierauteur2.php?numaut=".$ligne['numaut']."><input type=\"submit\" id=\"submit\" value=\"MODIFIER\"></a></td>
</tr>";
}
echo"</table>";
mysql_close();
?>
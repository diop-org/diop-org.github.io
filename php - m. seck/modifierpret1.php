<?php
require("connection/connexion.php");
echo"<table width=\"100\">
<tr>
<td width=\"20\">designpret</td>
<td width=\"20\">Modifier</td>
</tr>";
$aff="select *from pret order by designpret asc";
$exe=mysql_query($aff);
while($ligne=mysql_fetch_array($exe))
{
echo"<tr>
<td width=\"30\">".$ligne['designpret']."</td>
<td width=\"20\"><a href=modifierpret2.php?idpret=".$ligne['idpret']."><input type=\"submit\" id=\"submit\" value=\"MODIFIER\"></a></td>
</tr>";
}
echo"</table>";
mysql_close();
?>
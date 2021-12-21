<?php
require("connection/connexion.php");
echo"<table width=\"100\">
<tr>
<td width=\"20\">nome</td>
<td width=\"20\">adres</td>
<td width=\"20\">tel</td>
<td width=\"20\">Modifier</td>
</tr>";
$aff="select *from editeu order by nome asc";
$exe=mysql_query($aff);
while($ligne=mysql_fetch_array($exe))
{
echo"<tr>
<td width=\"30\">".$ligne['nome']."</td>
<td width=\"20\">".$ligne['adres']."</td>
<td width=\"40\">".$ligne['tel']."</td>
<td width=\"20\"><a href=modifierediteur2.php?cde=".$ligne['cde']."><input type=\"submit\" id=\"submit\" value=\"MODIFIER\"></a></td>
</tr>";
}
echo"</table>";
mysql_close();
?>
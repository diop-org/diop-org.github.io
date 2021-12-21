<?php
require("connection/connexion.php");
echo"<table width=\"100\">
<tr>
<td width=\"20\">libc</td>
<td width=\"20\">Modifier</td>
</tr>";
$aff="select *from categorie order by libc asc";
$exe=mysql_query($aff);
while($ligne=mysql_fetch_array($exe))
{
echo"<tr>
<td width=\"30\">".$ligne['libc']."</td>
<td width=\"20\"><a href=modifiercategorie2.php?idc=".$ligne['idc']."><input type=\"submit\" id=\"submit\" value=\"MODIFIER\"></a></td>
</tr>";
}
echo"</table>";
mysql_close();
?>
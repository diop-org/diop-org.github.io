<?php
require("connection/connexion.php");
echo"<table width=\"100\">
<tr>
<td width=\"20\">titre</td>
<td width=\"20\">nbrepag</td>
<td width=\"20\">idc</td>
<td width=\"20\">numaut</td>
<td width=\"20\">cde</td>
<td width=\"20\">Modifier</td>
</tr>";
$aff="select *from livre order by titre asc";
$exe=mysql_query($aff);
while($ligne=mysql_fetch_array($exe))
{
echo"<tr>
<td width=\"30\">".$ligne['titre']."</td>
<td width=\"20\">".$ligne['nbrepag']."</td>
<td width=\"40\">".$ligne['idc']."</td>
<td width=\"40\">".$ligne['numaut']."</td>
<td width=\"40\">".$ligne['cde']."</td>
<td width=\"20\"><a href=modifierlivre2.php?ISBN=".$ligne['ISBN']."><input type=\"submit\" id=\"submit\" value=\"MODIFIER\"></a></td>
</tr>";
}
echo"</table>";
mysql_close();
?>
<?php
include("connection/connexion.php");
$req="select *from pret";
$exe=mysql_query($req);
echo"<table border=1>
<tr>
<td>Identifiant pret</td>
<td>designation</td>
</tr>";
while($lig=mysql_fetch_row($exe))
{
echo "<tr>
<td>".$lig[0]."</td>
<td>".$lig[1]."</td>
</tr>";
}
echo"</table>";
mysql_close();
?>
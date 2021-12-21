<?php
include("connection/connexion.php");
$req="select ISBN,titre,nbrepag from livre where idc=1";
$exe=mysql_query($req);
echo"<table border=1>
<tr>
<td>Identifiant livre</td>
<td>titre</td>
<td>nombre page</td> 
</tr>";
while($lig=mysql_fetch_row($exe))
{
echo "<tr>
<td>".$lig[0]."</td>
<td>".$lig[1]."</td>
<td>".$lig[2]."</td>
</tr>";
}
echo"</table>";
mysql_close();
?>
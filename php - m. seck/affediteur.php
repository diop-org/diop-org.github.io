<?php
include("connection/connexion.php");
$req="select *from editeu";
$exe=mysql_query($req);
echo"<table border=1>
<tr>
<td>Code editeur</td>
<td>Nom</td>
<td>Adresse</td>
<td>Telephone</td> 
</tr>";
while($lig=mysql_fetch_row($exe))
{
echo "<tr>
<td>".$lig[0]."</td>
<td>".$lig[1]."</td>
<td>".$lig[2]."</td>
<td>".$lig[3]."</td>
</tr>";
}
echo"</table>";
mysql_close();
?>
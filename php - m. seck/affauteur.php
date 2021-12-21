<?php
include("connection/connexion.php");
$req="select *from auteur";
$exe=mysql_query($req);
echo"<table border=1>
<tr>
<td>Num</td>
<td>Nom</td>
<td>prenom</td> 
<td>adresse</td>
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
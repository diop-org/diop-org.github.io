<?php
include("connection/connexion.php");
$req="select *from livre";
$exe=mysql_query($req);
echo"<table border=1>
<tr>
<td>Identifiant livre</td>
<td>titre</td>
<td>nombre page</td> 
<td>numero auteur</td>
<td>idenfiant categorie</td>
<td>Code editeur</td>
</tr>";
while($lig=mysql_fetch_row($exe))
{
echo "<tr>
<td>".$lig[0]."</td>
<td>".$lig[1]."</td>
<td>".$lig[2]."</td>
<td>".$lig[3]."</td>
<td>".$lig[4]."</td>
<td>".$lig[5]."</td>
</tr>";
}
echo"</table>";
mysql_close();
?>
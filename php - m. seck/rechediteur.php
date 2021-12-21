<?php
include("connection/connexion.php");
$a=$_POST['nome'];
$req="select * from editeu where nome='$a'";
$exe=mysql_query($req);
echo"<table>
<tr>
<td>Code editeur</td>
<td>Nom editeur</td>
<td>Adresse</td>
<td>Telephone</td>
</tr>";

while($ligne=mysql_fetch_row($exe))
{
echo "<tr>
 <td>".$ligne[0]."</td>
 <td>".$ligne[1]."</td>
 <td>".$ligne[2]."</td>
 <td>".$ligne[3]."</td>
 
 </tr>";
}
echo"</table>";

mysql_close();
?>
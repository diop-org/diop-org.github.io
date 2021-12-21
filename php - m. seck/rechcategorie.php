<?php
include("connection/connexion.php");
$a=$_POST['libc'];
$req="select * from categorie where libc='$a'";
$exe=mysql_query($req);
echo"<table>
<tr>
<td>Identifiant</td>
<td>Libelle</td>
</tr>";

while($ligne=mysql_fetch_row($exe))
{
echo "<tr>
 <td>".$ligne[0]."</td>
 <td>".$ligne[1]."</td>
 
 </tr>";
}
echo"</table>";

mysql_close();
?>
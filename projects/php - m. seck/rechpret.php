<?php
include("connection/connexion.php");
$a=$_POST['designpret'];
$req="select * from pret where designpret='$a'";
$exe=mysql_query($req);
echo"<table>
<tr>
<td>Designation pret</td>
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
<?php
include("connection/connexion.php");
$a=$_POST['titre'];
$req="select * from livre where titre='$a'";
$exe=mysql_query($req);
echo"<table border=2>
<tr>
<td>Numero livre</td>
<td>Titre</td>
<td>Nombre de page</td>
<td>Idc</td>
<td>Cde</td>
<td>Num aut</td>
</tr>";

while($ligne=mysql_fetch_row($exe))
{
echo "<tr>
 <td>".$ligne[0]."</td>
 <td>".$ligne[1]."</td>
 <td>".$ligne[2]."</td>
 <td>".$ligne[3]."</td>
  <td>".$ligne[4]."</td>
   <td>".$ligne[5]."</td>
 
 </tr>";
}
echo"</table>";

mysql_close();
?>
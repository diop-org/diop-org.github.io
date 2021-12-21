<?php
include("connection/connexion.php");
$a=$_POST['nomaut'];
$req="select * from auteur where nomaut='$a'";
$exe=mysql_query($req);
echo"<table border=2>
<tr>
<td>numero auteur</td>
<td>Nom auteur</td>
<td>Prenom auteur</td>
<td>Adresse auteur</td>
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
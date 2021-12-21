<?php
include("connexion.php");
$req1="select * from mission";
$exe=mysql_query($req1);
echo "<table border=\"0\">
<tr bgcolor=\"blue\">
<td> N°_Mission</td>
<td> Type_Mission</td>
<td>Lieu_Mission</td>a
<td>Durée_Mission</td>
</tr>";
while($ligne=mysql_fetch_array($exe))
{ 
echo "<tr>
<td>".$ligne['idmission']."</td>
<td>".$ligne['type']."</td>
<td>".$ligne['lieu']."</td>
<td>".$ligne['duree']."</td>
</tr>";
}
echo "</table>";
echo "<a href=\"mission.php\">RETOUR</a>";
?>

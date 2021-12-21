<?php
include("connexion.php");
$req1="select * from partir";
$exe=mysql_query($req1);
echo "<table border=\"0\">
<tr bgcolor=\"blue\">
<td> N°_Mission</td>
<td>N°_Employe </td>
<td>Date_Partir</td>
</tr>";
while($ligne=mysql_fetch_array($exe))
{ 
echo "<tr>
<td>".$ligne['idmission']."</td>
<td>".$ligne['matr']."</td>
<td>".$ligne['lieu']."</td>
<td>".$ligne['datem']."</td>
</tr>";
}
echo "</table>";
echo "<a href=\"partir.php\">RETOUR</a>";
?>

<?php
include("connexion.php");
$req1="select * from classe";
$exe=mysql_query($req1);
echo "<table border=\"0\">
<tr bgcolor=\"green\">
<td> idclasse</td>
<td>nom_classe </td>

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
echo "<a href=\"classe.php\">RETOUR</a>";
?>

<?php
include("connexion.php");
$req1="select * from departement";
$exe=mysql_query($req1);
echo "<table border=\"0\">
<tr bgcolor=\"blue\">
<td> Code_Departement</td>
<td> Nom_Departement</td>
</tr>";
while($ligne=mysql_fetch_array($exe))
{ 
echo "<tr>
<td>".$ligne['code']."</td>
<td>".$ligne['nomdept']."</td>
</tr>";
}
echo "</table>";
echo "<a href=\"departement.php\">RETOUR</a>";
?>

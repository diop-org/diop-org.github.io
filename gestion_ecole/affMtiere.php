

<?php
include("connexion.php");
$req1="select * from matiere";
$exe=mysql_query($req1);
echo "<table border=\"0\">
<tr bgcolor=\"green\">
<td> idclasse</td>
<td>nom_classe </td>

</tr>";
while($ligne=mysql_fetch_array($exe))
{ 
echo "<tr>
<td>".$ligne['codeMatiere']."</td>
<td>".$ligne['nomMatiere']."</td>

</tr>";
}
echo "</table>";
echo "<a href=\"matiere.php\">RETOUR</a>";
?>

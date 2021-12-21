<?php
include("connexion.php");
$req1="select * from etudiant";
$exe=mysql_query($req1);
echo "<table border=\"0\">
<tr bgcolor=\"pink\">
<td> Matricule</td>
<td> Civilite</td>
<td> Nom</td>
<td> Prenom</td>
<td>Adresse </td>
<td> Telephone</td>
<td> idclasse</td>
</tr>";
while($ligne=mysql_fetch_array($exe))
{ 
echo "<tr>
<td>".$ligne['matricule']."</td>
<td>".$ligne['civilite']."</td>
<td>".$ligne['nom']."</td>
<td>".$ligne['prenom']."</td>
<td>".$ligne['adresse']."</td>
<td>".$ligne['telephone']."</td>
<td>".$ligne['idclasse']."</td>
</tr>";
}
echo "</table>";
echo "<a href=\"etudiant.php\">RETOUR</a>";
?>

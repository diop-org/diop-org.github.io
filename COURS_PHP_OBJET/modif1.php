<html>
  <head>
    <title>modification de données en PHP :: partie 1</title>
  </head>
<body>
  <?php
    include("classdatabase.php");
$db=new DB;
$lien=$db->Connexion();
$exe=$db->ExecuteSQL("SELECT * FROM compagnie ORDER BY nomcompagnie",$lien);
   
  
echo"<table border=1>
<tr bgcolor=\"green\">
<td>NOM</td>
<td>ADRESSE</td>
<td>CHIFFRE AFFAIRE</td>
<td>MODIFIER</td>
<td>SUPPRIMER</td>
</tr>";
 
    //affichage des données:
    while($l= $db->FetchLigne($exe))
    {
echo"<tr>
<td>".$l['nomcompagnie']."</td>
 <td>".$l['adressecompagnie']."</td>
<td>".$l['chiffaff']."</td>
<td><a href=\"modif2.php?idcompagni=".$l['idcompagni']."\"><img src=\"b_edit.png\">Modifier</a></td> 
<td><a href=\"sup2.php?idcompagni=".$l['idcompagni']."\" onclick=\"return(confirm('Voulez-vous SUPPRIMER ?'));\"><img src=\"b_drop.png\">Suprimer</a></td>

</tr>";
    }
echo"</table>";
  ?>

</body>
</html>
<html>
  <head>
    <title>modification de données en PHP :: partie 1</title>
  </head>
<body>
  <?php
    include("classDatabase.php");
$db=new DB;
$lien=$db->Connexion();
$exe=$db->ExecuteSQL("SELECT * FROM compagnie ORDER BY nomcompagnie",$lien);
   
  
echo"<table border=1>
<tr>
<td>NOM</td>
<td>ADRESSE</td>
<td>CHIFFRE_AFFAIRE</td>
<td>MODIFIER</td>
<td>SUPPRIMER</td>
</tr>";
 
    //affichage des données:
    while($l= $db->FetchLigne($exe))
    {
echo"<tr>
<td>".$l['nomCompagnie']."</td>
 <td>".$l['adrCompagnie']."</td>
<td>".$l['chiffre']."</td>
<td><a href=\"modif2.php?idcompagnie=".$result['idcompagnie']."\">modifier</a></td> 
<td><a href=\"sup2.php?idcompagnie=".$result['idcompagnie']."\" >supprimer</a></td> 

</tr>";
    }
echo"</table>";
  ?>

</body>
</html>
<html>
  <head>
    <title>modification de données en PHP :: partie 1</title>
  </head>
<body>
  <?php
    include("classDatabase.php");
$db=new DB;
$lien=$db->connexion();
$exe=$db->ExecuteSQL("SELECT * FROM auteur ORDER BY noauteur",$lien);
   
  
echo"<table border=1>
<tr>

<td>NomAuteur</td>
<td>prAuteur</td>
<td>email</td>
<td>MODIFIER</td>
<td>SUPPRIMER</td>
</tr>";
 
    //affichage des données:
    while($l= $db->FetchLigne($exe))
    {
echo"<tr>

<td>".$l['noauteur']."</td>
 <td>".$l['prauteur']."</td>
 <td>".$l['email']."</td>
<td><a href=\"Modif2.php?idauteur=".$l['idauteur']."\"><img src=\"b_edit.png\"></a></td> 
<td><a href=\"Sup2.php?idauteur=".$l['idauteur']."\" >supprimer</a></td> 

</tr>";
    }
echo"</table>";
  ?>

</body>
</html>
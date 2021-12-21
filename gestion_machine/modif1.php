<html>
 <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
<link href="style/style_css.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <?php
    include("Database.php");
$db=new Database;
$lien=$db->connexion();
$exe=$db->ExecuteSQL("SELECT * FROM salle ORDER BY numSalle",$lien);
   
  
echo"<table border=1 align=\"center\">
<tr>
<td>numSalle</td>
<td>libelleSalle</td>
<td>matricule_Formateur</td>
<td>MODIFIER</td>
<td>SUPPRIMER</td>
</tr>";
 
    //affichage des données:
    while($l= $db->Fetchligne($exe))
    {
echo"<tr>
<td>".$l['numSalle']."</td>
<td>".$l['libelleSalle']."</td>
<td>".$l['matricule_Formateur']."</td>
<td><a href=\"modif2.php?numSalle=".$l['numSalle']."\"><img src=\"b_edit.png\"/></a></td> 
<td><a href=\"sup2.php?numSalle=".$l['numSalle']."\" onclick=\"return(confirm('voulez vous supprimer'));\">><img src=\"b_drop.png\"/></a></td> 

</tr>";
    }
echo"</table>";
  ?>

</body>
</html>
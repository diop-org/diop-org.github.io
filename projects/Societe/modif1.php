<html>
  <head>
    <title>modification de données en PHP :: partie 1</title>
  </head>
<body>
<?php
session_start();
echo"Bonjour " .$_SESSION[prenom]." ".$_SESSION[nom];
?>
  <?php
    include("connect.php");
$req="select * from employe ORDER BY nom";
$exe=mysql_query($req);
   
  
echo"<center><table border=1>
<tr>
<td>Nom</td>
<td>Prenom</td>
<td>Adresse</td>
   <td>Sexe</td>
  
   <td>Telephone</td>
  <td>idDepartement</td>
<td>MODIFIER</td>
<td>SUPPRIMER</td>
</tr>";
 
    //affichage des données:
    while($l= mysql_fetch_array($exe))
    {
echo"<tr>
<td>".$l['nom']."</td>
<td>".$l['prenom']."</td>
<td>".$l['adresse']."</td>
<td>".$l['sexe']."</td>
<td>".$l['tele']."</td>
<td>".$l['iddpt']."</td>
<td><a href=\"modif2.php?mat=".$l['mat']."\"><img src=\"b_edit.png\"></a></td> 
<td><a href=\"sup2.php?mat=".$l['mat']."\" onclick=\"return(confirm('Etes-vous sûr de vouloir supprimer cette entrée?'));\" ><img src=\"b_drop.png\"></a></td> 

</tr>";
    }
echo"</table></center>";
  ?>

</body>
</html>
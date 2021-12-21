<html>
  <head>
    <title>modification de données en PHP :: partie 1</title>
  </head>
<body>
  <?php
    include("connect.php");
$req="select * from produit ORDER BY code";
$exe=mysql_query($req);
   
  
echo"<center><table border=1>
<tr>

<td>Designation</td>
<td>Prix-unitaire</td>
   <td>Quantite</td>
  
<td>MODIFIER</td>
<td>SUPPRIMER</td>
</tr>";
 
   
    while($l= mysql_fetch_array($exe))
    {
echo"<tr>
<td>".$l['designation']."</td>
<td>".$l['pu']."</td>
<td>".$l['qte']."</td>


<td><a href=\"modifproduit1.php?mat=".$l['code']."\"><img src=\"b_edit.png\"></a></td> 
<td><a href=\"supproduit.php?mat=".$l['code']."\" onclick=\"return(confirm('Etes-vous sûr de vouloir supprimer cette entrée?'));\" ><img src=\"b_drop.png\"></a></td> 

</tr>";
    }
echo"</table></center>";
  ?>

</body>
</html>
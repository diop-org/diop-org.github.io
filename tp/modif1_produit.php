<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Modif 1 Produit</title>
</head>

<body>
<?php
include("connection/connexion.php");
$sql="SELECT * FROM produit ORDER BY desprod";
$requete = mysql_query($sql);
echo"<table align=center border=1 bordercolor=blue bgcolor=grey>
<tr>
<td align=center>Code du Produit</td>
<td align=center>Designation du Produit</td>
<td align=center>Prix Unitaire du Produit</td>
<td align=center>Quantite Produit</td>
<td align=center>MODIFIER</td>
<td align=center>SUPPRIMER</td>
</tr>";
	//affichage des donnees:
	while($result=mysql_fetch_array($requete))
	{
echo"<tr>
<td align=center>".$result['codeprod']."</td>
<td align=center>".$result['desprod']."</td>
<td align=center>".$result['puprod']."</td>
<td align=center>".$result['qteprod']."</td>
<td align=center><a href=\"modif2_produit.php?codeprod=".$result['codeprod']."\"><img src=\"b_edit.png\"></a></td>
<td align=center><a href=\"sup.php?codeprod=".$result['idfour']."\"><img src=\"b_drop.png\"></a></td>
</tr>";
	}
echo"</table>";
?>			  
</body>
</html>
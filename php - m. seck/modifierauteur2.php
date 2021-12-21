<?php
require("connection/connexion.php");
$matr=$_GET['numaut'];
$req="select *from auteur where numaut='$matr'";
$exe=mysql_query($req);
while($ligne=mysql_fetch_array($exe))
{
?>
<form action="modifierauteur3.php" method="POST">
<table width="400">
<tr>
<td width=50></td>
<td width=30><input type="hidden" name="numaut" value="<?php echo $matr
?>"></td>
</tr>
<tr>
<td width="50">Nom</td>
<td width="30"><input type="text" name="nomaut" value="<?php echo $ligne['nomaut'] 
?>"></td>
</tr>
<tr>
<td width="50">Prenom</td>
<td width="30"><input type="text" name="prenomaut" value="<?php echo $ligne['prenomaut'] 
?>"></td>
</tr>
<tr>
<td width="50">Adresse</td>
<td width="30"><input type="text" name="adresseaut" value="<?php echo $ligne['adresseaut'] 
?>"></td>
</tr>

<tr>
 <td colspan="2"><input type="submit" value="modifier"></td>
</tr>
</table>
</form>
<?php
}
mysql_close();
?>
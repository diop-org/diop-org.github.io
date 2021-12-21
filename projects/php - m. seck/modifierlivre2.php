<?php
require("connection/connexion.php");
$matr=$_GET['ISBN'];
$req="select *from livre where ISBN='$matr'";
$exe=mysql_query($req);
while($ligne=mysql_fetch_array($exe))
{
?>
<form action="modifierlivre3.php" method="POST">
<table width="400">
<tr>
<td width=50></td>
<td width=30><input type="hidden" name="ISBN" value="<?php echo $matr
?>"></td>
</tr>
<tr>
<td width="50">Nom</td>
<td width="30"><input type="text" name="titre" value="<?php echo $ligne['titre'] 
?>"></td>
</tr>
<tr>
<td width="50">Prenom</td>
<td width="30"><input type="text" name="nbrepag" value="<?php echo $ligne['nbrepag'] 
?>"></td>
</tr>
<tr>
<td width="50">Identificateur</td>
<td width="30"><input type="text" name="idc" value="<?php echo $ligne['idc'] 
?>"></td>
</tr>
<tr>
<td width="50">Numero</td>
<td width="30"><input type="text" name="numaut" value="<?php echo $ligne['numaut'] 
?>"></td>
</tr>
<tr>
<td width="50">Code</td>
<td width="30"><input type="text" name="cde" value="<?php echo $ligne['cde'] 
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
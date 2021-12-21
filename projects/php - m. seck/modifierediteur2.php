<?php
require("connection/connexion.php");
$matr=$_GET['cde'];
$req="select *from editeu where cde='$matr'";
$exe=mysql_query($req);
while($ligne=mysql_fetch_array($exe))
{
?>
<form action="modifierediteur3.php" method="POST">
<table width="400">
<tr>
<td width=50></td>
<td width=30><input type="hidden" name="cde" value="<?php echo $matr
?>"></td>
</tr>
<tr>
<td width="50">Nom</td>
<td width="30"><input type="text" name="nome" value="<?php echo $ligne['nome'] 
?>"></td>
</tr>
<tr>
<td width="50">Adresse</td>
<td width="30"><input type="text" name="adres" value="<?php echo $ligne['adres'] 
?>"></td>
</tr>
<tr>
<td width="50">Telephone</td>
<td width="30"><input type="text" name="tel" value="<?php echo $ligne['tel'] 
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
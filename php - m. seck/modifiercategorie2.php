<?php
require("connection/connexion.php");
$matr=$_GET['idc'];
$req="select *from categorie where idc='$matr'";
$exe=mysql_query($req);
while($ligne=mysql_fetch_array($exe))
{
?>
<form action="modifiercategorie3.php" method="POST">
<table width="400">
<tr>
<td width=50></td>
<td width=30><input type="hidden" name="idc" value="<?php echo $matr
?>"></td>
</tr>
<tr>
<td width="50">Libelle</td>
<td width="30"><input type="text" name="libc" value="<?php echo $ligne['libc'] 
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
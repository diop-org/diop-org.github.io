<?php
require("connection/connexion.php");
$matr=$_GET['idpret'];
$req="select *from pret where idpret='$matr'";
$exe=mysql_query($req);
while($ligne=mysql_fetch_array($exe))
{
?>
<form action="modifierpret3.php" method="POST">
<table width="400">
<tr>
<td width=50></td>
<td width=30><input type="hidden" name="idpret" value="<?php echo $matr
?>"></td>
</tr>
<tr>
<td width="50">Designation</td></tr><tr>
<td width="30"><input type="text" name="designpret" value="<?php echo $ligne['designpret'] 
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
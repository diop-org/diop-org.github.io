<html>
<body bgcolor="sienna">
<form name="form1" method="post" action="inspartir.php">
<fieldset>
<legend> PARTIR</legend>
<table border="1" >
<tr>
<td><label>Id_Mission</label> </td>
<td> <?php
include("connexion.php");
$req="select * from mission";
$exe=mysql_query($req);
echo " <select name=\"mission\">";
while($l=mysql_fetch_array($exe))
{
echo "<option value=".$l['idmission'].">".$l['idmission']."</option>";
}
echo "</select>";
?>
</td>
</tr>
<tr>
<td><label>Mat_Employe</label> </td>
<td>  
<?php
include("connexion.php");
$req="select * from employe";
$exe=mysql_query($req);
echo " <select name=\"employe\">";
while($l=mysql_fetch_array($exe))
{
echo "<option value=".$l['matricule'].">".$l['nom']."</option>";
}
echo "</select>";
?>
</td>
</tr>
<tr>
<td><label>Date</label> </td>
<td><input name="dmis" type="text" id="dmis">
<br> </td>
</tr>


<tr>
<td><input type="submit" name="va" value="Envoyer"> </td>
<td><input type="reset" name="an" value="Annuler"></td>
</tr>
</table>
</fieldset>
</form>
</body>
</html>
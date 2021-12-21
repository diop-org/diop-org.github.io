<html>
<body bgcolor="blue">
<form name="form1" method="post" action="insEmp.php">
<fieldset>
<legend>EMPLOYE</legend>
<table border="1" >
<tr>
<td><label>Matricule</label> </td>
<td> <input name="matr" type="text" id="matr"></td>
</tr>
<tr>
<td><label>Civilite</label> </td>
<td><select name="civ">
<option>Mr </option>
<option>Mme </option>
<option>Mlle </option>
</select>
 </td>
</tr>
<tr>
<td><label>Nom</label> </td>
<td><input name="no" type="text" id="no">
<br> </td>
</tr>
<tr>
<td><label>Prenom</label> </td>
<td><input name="pno" type="text" id="pno">
<br> </td>
</tr>
<tr>
<td><label>Adresse</label></td>
<td><input name="adr" type="text" id="adr">
<br></td>
</tr>
<tr>
<td><label>Telephone</label></td>
<td><input name="tel" type="text" id="tel">
<br></td>
</tr><tr>
<td><label>Depatement</label></td>
<td> 
<?php
include("connexion.php");
$req="select * from departement";
$exe=mysql_query($req);
echo " <select name=\"dep\">";
while($l=mysql_fetch_array($exe))
{
echo "<option value=".$l['code'].">".$l['nomdept']."</option>";
}
echo "</select>";
?>
</td>
</tr>
<td><input type="submit" name="va" value="Envoyer"> </td>
<td><input type="reset" name="an" value="Annuler"></td>
</tr>
</table>
</fieldset>
</form>
</body>
</html>
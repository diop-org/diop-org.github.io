<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="insertcommander.php">
  <table width="309" border="1">
    <tr>
      <td width="161">Numero commande </td>
      <td width="132"><label>
        <select name="numcom">
		<?php
		include("connex.php");
		$req="select * from commande";
		$exe=mysql_query($req);
		while($l=mysql_fetch_array($exe))
		{
		echo"<option value=".$l['numcom'].">".$l['numcom']."</option>";
		}
		?>
        </select>
      </label></td>
    </tr>
    <tr>
      <td>Numero produit </td>
      <td><label>
        <select name="numprod">
		<?php
		include("connex.php");
		$req="select * from produit";
		$exe=mysql_query($req);
		while($l=mysql_fetch_array($exe))
		{
		echo"<option value=".$l['numprod'].">".$l['numprod']."</option>";
		}
		?>
        </select>
      </label></td>
    </tr>
    <tr>
      <td>Date commander</td>
      <td><label>
        <input name="datecom" type="text" id="datecom" />
      </label></td>
    </tr>
    <tr>
      <td>Quantit&eacute; commander </td>
      <td><label>
        <input name="qtecom" type="text" id="qtecom" />
      </label></td>
    </tr>
    <tr>
      <td><label>
        <input type="submit" name="Submit" value="Enregistrer" />
      </label></td>
      <td><label>
        <input type="reset" name="Submit2" value="Annuler" />
      </label></td>
    </tr>
  </table>
</form>
</body>
</html>

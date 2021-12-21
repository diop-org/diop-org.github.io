<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="insertcommande.php">
  <table width="347" border="0">
    <tr>
      <td width="180">Numero Commande </td>
      <td width="157"><label>
        <input name="numcom" type="text" id="numcom" />
      </label></td>
    </tr>
    <tr>
      <td>Libelle </td>
      <td><label>
        <input name="libellecom" type="text" id="libellecom" />
      </label></td>
    </tr>
    <tr>
      <td>Numero client </td>
      <td><label>
        <select name="numcli">
		<?php
		include("connex.php");
		$req="select * from client";
		$exe=mysql_query($req);
		while($l=mysql_fetch_array($exe))
		{
		echo"<option value=".$l['numcli'].">".$l['numcli']."</option>";
		}
		?>
        </select>
      </label></td>
    </tr>
    <tr>
      <td>Numero livraison </td>
      <td><label>
        <select name="numlivraison">
		<?php
		include("connex.php");
		$req="select * from livraison";
		$exe=mysql_query($req);
		while($l=mysql_fetch_array($exe))
		{
		echo"<option value=".$l['numlivraison'].">".$l['numlivraison']."</option>";
		}
		?>
        </select>
      </label></td>
    </tr>
    <tr>
      <td><label>
        <input type="submit" name="Submit" value="Enregister" />
      </label></td>
      <td><label>
        <input type="reset" name="Submit2" value="Annuler" />
      </label></td>
    </tr>
  </table>
</form>
</body>
</html>

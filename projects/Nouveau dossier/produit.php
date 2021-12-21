<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="insproduit.php">
  <table width="306" border="1">
    <tr>
      <td width="129">Numero-produit:</td>
      <td width="161"><label>
        <input type="text" name="numprod" id="numprod" />
      </label></td>
    </tr>
    <tr>
      <td>Nom:</td>
      <td><label>
        <input type="text" name="nomprod" id="nomprod" />
      </label></td>
    </tr>
    <tr>
      <td>Couleur:</td>
      <td><label>
        <input type="text" name="couleur" id="couleur" />
      </label></td>
    </tr>
    <tr>
      <td>Type:</td>
      <td><label>
        <?php
		include("connect.php");
		$req="select * from type-produit";
		$exe=mysql_query($req);
		echo"<select name=\"numtype\">";
		while($l=mysql_fetch_array($exe))
		{
			echo"<option value=".$l['numtype'].">".$l['numtype']."</option>";
		}
		?>
      </label></td>
    </tr>
    <tr>
      <td><label>
        <input type="submit" name="enregistrer" id="enregistrer" value="Enregistrer" />
      </label></td>
      <td><label>
        <input type="submit" name="annuler" id="annuler" value="Annuler" />
      </label></td>
    </tr>
  </table>
</form>
</body>
</html>
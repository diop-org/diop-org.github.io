<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="inscommander.php">
  <table width="292" border="1">
    <tr>
      <td width="132">Numero-commande</td>
      <td width="144"><label>
        <?php
		include("connect.php");
		$req="select * from commande";
		$exe=mysql_query($req);
		echo"<select name=\"numcommande\">";
		while($l=mysql_fetch_array($exe))
		{
			echo"<option value=".$l['numcommande'].">".$l['numcommande']."</option>";
		}
		?>
      </label></td>
    </tr>
    <tr>
      <td>Numero-produit</td>
      <td><label>
        <?php
		include("connect.php");
		$req="select * from produit";
		$exe=mysql_query($req);
		echo"<select name=\"numprod\">";
		while($l=mysql_fetch_array($exe))
		{
			echo"<option value=".$l['numprod'].">".$l['numprod']."</option>";
		}
		?>
      </label></td>
    </tr>
    <tr>
      <td>Date-commande</td>
      <td><label>
        <input type="text" name="datecom" id="datecom" />
      </label></td>
    </tr>
    <tr>
      <td>Quantite-commande</td>
      <td><label>
        <input type="text" name="annuler" id="annuler" />
      </label></td>
    </tr>
    <tr>
      <td><label>
        <input type="submit" name="enregistrer" id="enregistrer" value="Enregistrer" />
      </label></td>
      <td><label>
        <input type="submit" name="annuler2" id="annuler2" value="Annuler" />
      </label></td>
    </tr>
  </table>
</form>
</body>
</html>
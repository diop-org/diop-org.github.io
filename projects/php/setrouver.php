<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="inssetrouver.php">
  <table width="334" border="1">
    <tr>
      <td width="142">Id-commande:</td>
      <td width="191"><label>
        <?php
		include("connect.php");
		$req="select * from commander";
		$exe=mysql_query($req);
		echo"<select name=\"idcom\">";
		while($l=mysql_fetch_array($exe))
		{
			echo"<option value=".$l['idcom'].">".$l['idcom']."</option>";
		}
		?>
      </label></td>
    </tr>
    <tr>
      <td>code:</td>
      <td><label>
        <?php
		include("connect.php");
		$req="select * from produit";
		$exe=mysql_query($req);
		echo"<select name=\"code\">";
		while($l=mysql_fetch_array($exe))
		{
			echo"<option value=".$l['code'].">".$l['code']."</option>";
		}
		?>
      </label></td>
    </tr>
    <tr>
      <td>Date-commade:</td>
      <td><label>
        <input type="text" name="datecom" id="datecom" />
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
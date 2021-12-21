<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="inscommande.php">
  <table width="329" border="1">
    <tr>
      <td width="169">Id-commande:</td>
      <td width="144"><label>
        <input type="text" name="idcom" id="idcom" />
      </label></td>
    </tr>
    <tr>
      <td>Libelle-commande:</td>
      <td><label>
        <input type="text" name="libcom" id="libcom" />
      </label></td>
    </tr>
    <tr>
      <td>Matricule-client:</td>
      <td><label>
        <?php
		include("connect.php");
		$req="select * from client";
		$exe=mysql_query($req);
		echo"<select name=\"matricule\">";
		while($l=mysql_fetch_array($exe))
		{
			echo"<option value=".$l['matricule'].">".$l['matricule']."</option>";
		}
		?></label></td>
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
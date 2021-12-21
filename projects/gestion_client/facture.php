<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body bgcolor="#00FFCC"><form action="ins_produit.php" method="post">
<table width="293" border="1" align="center" bgcolor="#0000FF">
  <tr>
    <td width="100">numero facture</td>
    <td width="177">
      <input type="text" name="numfact" id="textfield" />
    </td>
  </tr>
  <tr>
    <td>libellée</td>
    <td><input name="libfact" type="text" /></td>
  </tr>
  <tr>
    <td height="32">type facture</td>
    <td><input name="typefact" type="text" /></td>
  </tr>
 
  <tr>
    <td> commande</td>
    <td>
      <select name="numcom" id="select">
       <?php
	  include("connection/connexion.php");
	  $req="select * from fournisseur";
	  $exe=mysql_query($req);
	  while($ligne=mysql_fetch_array($exe))
		{
			echo "<option value=".$ligne['idfour'].">".$ligne['idfour']."</option>";
		}
	 ?>
      </select>
    </td>
  </tr>
  <tr>
    <td><label>
      <input type="submit" name="button" id="button" value="Envoyer" />
    </label></td>
    <td><label>
      <input type="reset" name="button2" id="button2" value="annuler" />
    </label></td>
  </tr>
</table>
</form>
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body bgcolor="#00FFCC"><form action="ins_produit.php" method="post">
<table width="278" border="1" align="center" bgcolor="#0000FF">
  <tr>
    <td width="100">code</td>
    <td width="162">
      <input type="text" name="code" id="textfield" />
    </td>
  </tr>
  <tr>
    <td>Désignation</td>
    <td><input name="des" type="text" /></td>
  </tr>
  <tr>
    <td>Prix unitaire</td>
    <td><input name="pu" type="text" /></td>
  </tr>
  <tr>
    <td>Quantité</td>
    <td><input name="qte" type="text" /></td>
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
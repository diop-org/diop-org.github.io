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
      <td width="129">Code:</td>
      <td width="161"><label>
        <input type="text" name="code" id="code" />
      </label></td>
    </tr>
    <tr>
      <td>designation:</td>
      <td><label>
        <input type="text" name="designation" id="designation" />
      </label></td>
    </tr>
    <tr>
      <td>Prix-unitaire:</td>
      <td><label>
        <input type="text" name="pu" id="pu" />
      </label></td>
    </tr>
    <tr>
      <td>Quantite:</td>
      <td><label>
        <input type="text" name="qte" id="qte" />
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
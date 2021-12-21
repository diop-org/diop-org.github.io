<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
</head>
<body>
<?php include("debut.php");?>
<form id="form1" name="form1" method="post" action="inscompagnie.php">
  <table width="424" border="1" align="center">
    <tr>
      <th scope="col">Identifiant de la compagnie </th>
      <th scope="col"><label>
        <input name="id" type="text" id="id" />
      </label></th>
    </tr>
    <tr>
      <th scope="row">Nom de la compagnie </th>
      <td><label>
        <input name="no" type="text" id="no" />
      </label></td>
    </tr>
    <tr>
      <th scope="row">Adresse de la compagnie </th>
      <td><label>
        <input name="adr" type="text" id="adr" />
      </label></td>
    </tr>
    <tr>
      <th scope="row">Telephone de la compagnie </th>
      <td><label>
        <input name="tel" type="text" id="tel" />
      </label></td>
    </tr>
    <tr>
      <th scope="row">Chiffre d'affaire de la compagnie </th>
      <td><label>
        <input name="chiffr" type="text" id="chiffr" />
      </label></td>
    </tr>
    <tr>
      <th align="right" scope="row"><label>
        <input name="ok" type="submit" id="ok" value="Enregistrer" />
      </label></th>
      <td><label>
        <input name="nul" type="submit" id="nul" value="Annuler" />
      </label></td>
    </tr>
  </table>
</form>
</body>
</html>

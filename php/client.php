<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="insclient.php">
  <table width="347" border="1">
    <tr>
      <td width="169">Matricule:</td>
      <td width="162"><label>
        <input type="text" name="matricule" id="matricule" />
      </label></td>
    </tr>
    <tr>
      <td>Nom:</td>
      <td><label>
        <input type="text" name="nom" id="nom" />
      </label></td>
    </tr>
    <tr>
      <td>Prenom:</td>
      <td><label>
        <input type="text" name="pnom" id="pnom" />
      </label></td>
    </tr>
    <tr>
      <td>Adresse:</td>
      <td><label>
        <input type="text" name="adresse" id="adresse" />
      </label></td>
    </tr>
    <tr>
      <td>Telephone:</td>
      <td><label>
        <input type="text" name="tel" id="tel" />
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
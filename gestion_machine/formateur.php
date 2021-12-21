<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
<link href="style/style_css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form id="form1" name="form1" method="post" action="insFormateur.php">
  <table width="400" border="0" align="center" cellspacing="4">
    <tr>
      <td align="right">matricule_Formateur</td>
      <td><input type="hidden" name="matricule_Formateur" id="hiddenField" /></td>
    </tr>
    <tr>
      <td align="right">nom</td>
      <td><label for="textfield"></label>
      <input type="text" name="nom" id="gris" /></td>
    </tr>
    <tr>
      <td align="right">prenom</td>
      <td><label for="textfield2"></label>
      <input type="text" name="prenom" id="gris" /></td>
    </tr>
    <tr>
      <td align="right">Adresse</td>
      <td><label for="textfield3"></label>
      <input type="text" name="adresse" id="gris" /></td>
    </tr>
    <tr>
      <td align="right">Email</td>
      <td><label for="textfield4"></label>
      <input type="text" name="email" id="gris" /></td>
    </tr>
    <tr>
      <td align="right"><input name="button" type="image" id="button" value="Envoyer" src="images/envoyer.png" alt="Envoyer" /></td>
      <td><input name="button2" type="image" id="button2" value="Annuler" src="images/annuler.png" alt="Annuler" /></td>
    </tr>
  </table>
</form>
</body>
</html>
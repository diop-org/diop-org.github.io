<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Numero-facture:</td>
      <td><label>
        <select name="numfact" id="numfact">
        </select>
      </label></td>
    </tr>
    <tr>
      <td>Numero-produit:</td>
      <td><label>
        <select name="numprod" id="numprod">
        </select>
      </label></td>
    </tr>
    <tr>
      <td>Quantite_commande:</td>
      <td><label>
        <input type="text" name="qtecom" id="qtecom" />
      </label></td>
    </tr>
    <tr>
      <td>Date-commande:</td>
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
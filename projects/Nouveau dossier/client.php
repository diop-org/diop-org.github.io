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
      <td width="169">Nom:</td>
      <td width="162"><label>
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
      <td>Civilite:</td>
      <td><label>
        <input type="radio" name="radio" id="madame" value="madame" />
        Mme<br />
        <input type="radio" name="radio" id="mademoiselle" value="mademoiselle" />
        Mlle<br />
        <input type="radio" name="radio" id="monsieur" value="monsieur" />
      Mr</label></td>
    </tr>
    <tr>
      <td>Sexe:</td>
      <td><label>
        <input type="text" name="sexe" id="sexe" />
      </label></td>
    </tr>
    <tr>
      <td>Adresse:</td>
      <td><label>
        <input type="text" name="adrclient" id="adrclient" />
      </label></td>
    </tr>
    <tr>
      <td>Telephone:</td>
      <td><label>
        <input type="text" name="telclient" id="telclient" />
      </label></td>
    </tr>
    <tr>
      <td>Mode-paiement:</td>
      <td><label>
        <input type="radio" name="radio" id="modepaiement" value="modepaiement" />
        <br />
      </label>
        <label>
          <input type="radio" name="radio" id="modepaiement2" value="modepaiement" />
          <br />
        </label>
        <label>
          <input type="radio" name="radio" id="modepaiement3" value="modepaiement" />
      </label></td>
    </tr>
    <tr>
      <td>Mot de passe:</td>
      <td><label>
        <input type="text" name="passwd" id="passwd" />
      </label></td>
    </tr>
    <tr>
      <td>Confirmer mot de passe:</td>
      <td><label>
        <input type="text" name="passwd1" id="passwd1" />
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
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
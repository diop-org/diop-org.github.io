<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans nom</title>
<style type="text/css">
<!--
.ch2txt {
	height: 30px;
	width: 200px;
	border: 1px solid #000;
}
-->
</style>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form id="form1" name="form1" method="post" action="insCompagnie.php">
  <table width="50%" border="0" align="center" cellpadding="0" cellspacing="10">
    <tr>
      <td align="right">Identifiant : </td>
      <td><span id="sprytextfield1">
        <label>
          <input name="idC" type="text" class="ch2txt" id="idC" />
        </label>
      <span class="textfieldRequiredMsg">Une valeur est requise.</span></span></td>
    </tr>
    <tr>
      <td align="right">Nom Compagnie : </td>
      <td><span id="sprytextfield2">
        <input name="nC" type="text" class="ch2txt" id="nC" />
      <span class="textfieldRequiredMsg">Une valeur est requise.</span></span></td>
    </tr>
    <tr>
      <td align="right">Adresse : </td>
      <td><span id="sprytextfield3">
        <input name="adrC" type="text" class="ch2txt" id="adrC" />
      <span class="textfieldRequiredMsg">Une valeur est requise.</span></span></td>
    </tr>
    <tr>
      <td align="right">Téléphone : </td>
      <td><span id="sprytextfield4">
        <input name="telC" type="text" class="ch2txt" id="telC" />
      <span class="textfieldRequiredMsg">Une valeur est requise.</span></span></td>
    </tr>
    <tr>
      <td align="right"><label>
        <input type="submit" name="button" id="button" value="AJOUTER" />
      </label></td>
      <td><label>
        <input type="reset" name="button2" id="button2" value="ANNULER" />
      </label></td>
    </tr>
  </table>
</form>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
//-->
</script>
</body>
</html>

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
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="50%" border="0" align="center" cellpadding="0" cellspacing="10">
    <tr>
      <td align="right">Identifiant_Avion : </td>
      <td><span id="sprytextfield1">
        <label>
          <input name="idA" type="text" class="ch2txt" id="idA" />
        </label>
      <span class="textfieldRequiredMsg">Une valeur est requise.</span></span></td>
    </tr>
    <tr>
      <td align="right">Nom Avion : </td>
      <td><span id="sprytextfield2">
        <input name="nA" type="text" class="ch2txt" id="nA" />
      <span class="textfieldRequiredMsg">Une valeur est requise.</span></span></td>
    </tr>
    <tr>
      <td align="right">Type Avion : </td>
      <td><input name="tA" type="text" class="ch2txt" id="tA" /></td>
    </tr>
    <tr>
      <td align="right">Nombre de Place : </td>
      <td><span id="sprytextfield3">
        <input name="nbP" type="text" class="ch2txt" id="nbP" />
      <span class="textfieldRequiredMsg">Une valeur est requise.</span></span></td>
    </tr>
    <tr>
      <td align="right">Couleur : </td>
      <td><span id="sprytextfield4">
        <input name="cA" type="text" class="ch2txt" id="cA" />
      <span class="textfieldRequiredMsg">Une valeur est requise.</span></span></td>
    </tr>
    <tr>
      <td align="right">idCompagnie : </td>
      <td><span id="spryselect1">
        <label>
          <select name="idC" id="idC">
          </select>
        </label>
      <span class="selectRequiredMsg">Sélectionnez un élément.</span></span></td>
    </tr>
    <tr>
      <td align="right"><label>
        <input type="submit" name="button" id="button" value="ENREGISTRER" />
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
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
//-->
</script>
</body>
</html>

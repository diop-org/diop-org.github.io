<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>inventaire</title>
<style type="text/css">
<!--
.forme {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 14px;
	font-style: italic;
	color: #09F;
}
-->
</style>
</head>

<body>
<fieldset><legend><font color="#00CCFF" size="+3">INVENTAIRE</font></legend>
<form id="form1" name="form1" method="post" action="insinventaire.php">
  <table width="300" height="215" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="40" class="forme">Référence du produit</td>
      <td><label for="ref"></label><?php
		include("connexion.php");
		?>
        <?php
		$db= new DB;
		$lien=$db->connexion();
		$exe=$db->executeSQL("select * from produit",$lien);
		echo"<select name=\"refe\">";
		while($lig=$db->Nlignes($exe))
		{
		echo"<option value=".$lig['reference'].">".$lig['designation']."</option>";
		}
		echo"</select>";
		?></td>
    </tr>
    <tr>
      <td height="40" class="forme">Numero de la facture</td>
      <td height="40"><label for="num"></label>
	  <?php
		//include("connexion.php");
		$db= new DB;
		$lien=$db->connexion();
		$exe=$db->executeSQL("select * from facture",$lien);
		echo"<select name=\"numf\">";
		while($lig=$db->Nlignes($exe))
		{
		echo"<option value=".$lig['numfacture'].">".$lig['idclient']."</option>";
		}
		echo"</select>";
		?></td>
    </tr>
    <tr>
      <td height="20" class="forme">Quantité</td>
      <td height="20"><p>
        <label for="qte"></label>
      </p>
      <p>&nbsp;</p>
      <p>
        <input type="text" name="qte" id="qte" />
      </p></td>
    </tr>
    <tr>
      <td><label for="ajout"></label>
      <input name="ajout" type="submit" class="forme" id="ajout" value="Enregistrer" /></td>
      <td height="40"><label for="nul"></label>
      <input name="nul" type="reset" class="forme" id="nul" value="Annuler" /></td>
    </tr>
  </table>
</form>
</fieldset>
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Vol</title>
</head>
<body>
<fieldset>
<legend align="center">ENREGISTREMENT D'UN VOL</legend>
<form id="form1" name="form1" method="post" action="insvol.php">
  <table width="355" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="219">Numero du vol</td>
      <td width="136"><label for="num"></label>
      <input type="text" name="num" id="num" /></td>
    </tr>
    <tr>
      <td>Date du vol</td>
      <td><label for="date"></label>
      <input type="text" name="date" id="date" /></td>
    </tr>
    <tr>
      <td>Heure de départ du vol</td>
      <td><label for="hdep"></label>
      <input type="text" name="hdep" id="hdep" /></td>
    </tr>
    <tr>
      <td>Heure d'arrivée du vol</td>
      <td><label for="harriv"></label>
      <input type="text" name="harriv" id="harriv" /></td>
    </tr>
    <tr>
      <td>Destination du vol</td>
      <td><label for="destin"></label>
      <input type="text" name="destin" id="destin" /></td>
    </tr>
    <tr>
      <td><label for="ajout"></label>
        Identifiant de l'avion</td>
      <td><label for="nul"><?php
		include("connexion.php");
		$db= new BD;
		$lien=$db->connexion();
		$exe=$db->executeSQL("select * from avion",$lien);
		echo"<select name=\"idav\">";
		while($lig=$db->Nlignes($exe))
		{
		echo"<option value=".$lig['idavion'].">".$lig['nomavion']." ".$lig['typeavion']."</option>";
		}
		echo"</select>";
		?></label></td>
    </tr>
    <tr>
      <td><label for="ajout2"></label>
      <input type="submit" name="ajout" id="ajout2" value="Enregistrer" /></td>
      <td><label for="nul2"></label>
      <input type="reset" name="nul" id="nul2" value="Annuler" /></td>
    </tr>
  </table>
</form>
</fieldset>
</body>
</html>
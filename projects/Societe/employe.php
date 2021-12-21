<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>
<?php
session_start();
echo"Bonjour  " .$_SESSION[prenom]." ".$_SESSION[nom];
?>
<form id="form1" name="form1" method="post" action="insemploye.php">
  <table width="1000">
    <tr>
      <td width="136">Matricule</td>
      <td width="852"><label>
        <input type="text" name="mat" id="mat" />
      </label></td>
    </tr>
    <tr>
      <td>Nom</td>
      <td><label>
        <input type="text" name="nom" id="nom" />
      </label></td>
    </tr>
    <tr>
      <td>Prenom</td>
      <td><label>
        <input type="text" name="prenom" id="prenom" />
              
      </label></td>
    </tr>
    <tr>
      <td>Sexe</td>
      <td><label>
        <input type="radio" name="radio" id="sex" value="Masculin" />
      M
      <input type="radio" name="radio" id="Feminin" value="Feminin" />
      F</label></td>
    </tr>
    <tr>
      <td>Adresse</td>
      <td><label>
        <input type="text" name="adresse" id="adresse" />
      </label></td>
    </tr>
    <tr>
      <td>Telephone</td>
      <td><label>
        <input type="text" name="tele" id="tele" />
      </label></td>
    </tr>
    <tr>
      <td>idDepartement</td>
      <td><label>
        <?php
		include("connect.php");
		$req="select * from departement";
		$exe=mysql_query($req);
		echo"<select name=\"iddpt\">";
		while($l=mysql_fetch_array($exe))
		{
			echo"<option value=".$l['iddpt'].">".$l['nomdpt']."</option>";
		}
		?>
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="val" id="val" value="Enregistrer" />
      </label></td>
    </tr>
  </table>
</form>
</body>
</html>
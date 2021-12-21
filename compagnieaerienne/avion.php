<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
</head>

<body>
<blockquote>
<?php include("debut.php");?>
  <form id="form1" name="form1" method="post" action="insavion.php">
    <table width="365" height="196" border="1" align="center">
      <tr>
        <th scope="col">Identifiant de la avion </th>
        <th scope="col"><label>
          <input name="id" type="text" id="id" />
        </label></th>
      </tr>
      <tr>
        <th scope="row"><p>Couleur de la avion </p>      </th>
        <td><label>
          <input name="coul" type="text" id="coul" />
        </label></td>
      </tr>
      <tr>
        <th scope="row">Nombre de places l' avion </th>
        <td><label>
          <input name="nbr" type="text" id="nbr" />
        </label></td>
      </tr>
      <tr>
        <th scope="row">Type </th>
        <td><label>
          <input name="type" type="text" id="type" />
        </label></td>
      </tr>
      <tr>
        <th scope="row"><label>Identifiant de la compagnie </label></th>
        <td><label>
		<?php
		include("connexion.php");
		$db= new BD;
		$lien=$db->connexion();
		$exe=$db->executeSQL("select * from compagnie",$lien);
		echo"<select name=\"idcomp\">";
		while($lig=$db->Nlignes($exe))
		{
		echo"<option value=".$lig['idcompagnie'].">".$lig['nomcompagnie']." ".$lig['adrcompagnie']."</option>";
		}
		echo"</select>";
		?></label></td>
      </tr>
      <tr>
        <th align="right" scope="row"><input type="submit" name="ok" id="ok" value="Envoyer" /></th>
        <td><input type="submit" name="nul" id="nul" value="Envoyer" /></td>
      </tr>
    </table>
  </form>
</blockquote>
</body>
</html>

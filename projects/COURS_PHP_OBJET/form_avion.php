<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans nom</title>
</head>

<body>
<fieldset>
<legend>FORMULAIRE AVION</legend>
<form id="form1" name="form1" method="post" action="inser_avion.php">
  <table width="200" border="1">
    <tr>
      <td>idavion</td>
      <td><label>
        <input name="idav" type="text" id="idav" />
      </label></td>
    </tr>
    <tr>
      <td>nomavion</td>
      <td><label>
        <input name="noav" type="text" id="noav" />
      </label></td>
    </tr>
    <tr>
      <td>nbplace</td>
      <td><label>
        <input name="nbp" type="text" id="nbp" />
      </label></td>
    </tr>
    <tr>
      <td>compagnie</td>
      <td><label>
        <?php
		include("classdatabase.php");
		$db=new DB;
		$lien=$db->connexion();
		$exe=$db->ExecuteSQL("select * from compagnie",$lien);
		echo "<select name=\"comp\">";
		while($l=$db->FetchLigne($exe))
		{
		echo"<option value=".$l['idcompagni'].">".$l["nomcompagnie"]."</option>";
		}
		echo"</select>";
		?>
		
      </label></td>
    </tr>
    <tr>
      <td><label>
        <input type="submit" name="Submit" value="Envoyer" />
      </label></td>
      <td><label>
        <input type="reset" name="Submit2" value="Annuler" />
      </label></td>
    </tr>
  </table>
</form>
<pre><a href="affiche_avion.php">AFFICHE</a>     <a href="Menu.php">MENU</a></pre>;

</fieldset>
</body>
</html>

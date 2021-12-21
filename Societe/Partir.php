<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="inspartir.php">
  <table width="1000">
    <tr>
      <td width="212">idMission</td>
      <td width="776"><label>
        <?php
		include("connect.php");
		$req="select * from mission";
		$exe=mysql_query($req);
		echo"<select name=\"idmiss\">";
		while($l=mysql_fetch_array($exe))
		{
			echo"<option value=".$l['idmiss'].">".$l['lieu']."</option>";
		}
		?>
      </label></td>
    </tr>
    <tr>
      <td>Matricule</td>
      <td><label>
        <?php
		include("connect.php");
		$req="select * from employe";
		$exe=mysql_query($req);
		echo"<select name=\"mat\">";
		while($l=mysql_fetch_array($exe))
		{
			echo"<option value=".$l['mat'].">".$l['nom']."</option>";
		}
		?>
      </label></td>
    </tr>
    <tr>
      <td>datem</td>
      <td><label>
        <input type="text" name="date" id="date" />
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="save" id="save" value="Sauvegarder" />
      </label></td>
    </tr>
  </table>
</form>
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans nom</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="inspartir.php">
  <table width="30%" height="163" border="0" align="center">
    <tr>
      <td align="right">Matricule:</td>
      <td><label for="mat">
      <?php
        include("connect.php");
        $req="select  *from employe";
        $exe=mysql_query($req);
        echo "<select name=\"matricule\">";
        while($l=mysql_fetch_array($exe))
        {
        echo "<option value=".$l['matricule'].">".$l['matricule']."</option>";
        }
        ?></label>
        </td>
    </tr>
    <tr>
      <td align="right">Idmission:</td>
      <td><label for="idmiss">
      <?php
        include("connect.php");
        $req="select  *from mission";
        $exe=mysql_query($req);
        echo "<select name=\"idmiss\">";
        while($l=mysql_fetch_array($exe))
        {
        echo "<option value=".$l['idmiss'].">".$l['idmiss']."</option>";
        }
        ?></label>
        </td>
    </tr>
    <tr>
      <td align="right">date_mission:</td>
      <td><label for="datem"></label>
      <input type="text" name="datem" id="datem" /></td>
    </tr>
    <tr>
      <td align="right"><input type="submit" name="enregistrer" id="enregistrer" value="Enregistrer" /></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>

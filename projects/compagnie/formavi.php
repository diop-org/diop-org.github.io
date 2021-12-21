<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans nom</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="100%" border="0">
    <tr>
      <td align="right">Identifiant_avion :</td>
      <td><label for="id_comp"></label>
      <input type="text" name="id_comp" id="id_comp" /></td>
    </tr>
    <tr>
      <td align="right">Nom_avion :</td>
      <td><label for="nomav"></label>
      <input type="text" name="nomav" id="nomav" /></td>
    </tr>
    <tr>
      <td align="right">Type_avion :</td>
      <td><label for="type"></label>
      <input type="text" name="type" id="type" /></td>
    </tr>
    <tr>
      <td align="right">Nbre _avion :</td>
      <td><label for="nbre"></label>
      <input type="text" name="nbre" id="nbre" /></td>
    </tr>
    <tr>
      <td align="right">Couleur :</td>
      <td><input type="text" name="clr" id="clr" /></td>
    </tr>
    <tr>
      <td align="right">Id_compagnie:</td>
      <td><label for="idcomp"></label>
         <?php
        include("connect.php");
        $req="select  *from compagnie";
        $exe=mysql_query($req);
        echo "<select name=\"comp\">";
        while($l=mysql_fetch_array($exe))
        {
        echo "<option value=".$l['idcompagnie'].">".$l['nomcompagnie']."</option>";
        }
        ?>
       </td>
    </tr>
    <tr>
      <td align="right"><input type="submit" name="enregistrer" id="enregistrer" value="Enregistrer" /></td>
      <td><label for="clr">
        <input type="submit" name="annuler" id="annuler" value="Annuler" />
      </label></td>
    </tr>
  </table>
</form>
</body>
</html>

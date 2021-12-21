<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans nom</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="insemp.php">
  <table width="40%" height="246" border="0" align="center">
    
    <tr>
      <td align="right">Matricule :</td>
      <td><label for="matricule"></label>
      <input type="text" name="matricule" id="matricule" /></td>
    </tr>
    <tr>
      <td align="right">Nom:</td>
      <td><label for="nom"></label>
      <input type="text" name="nom" id="nom" /></td>
    </tr>
    <tr>
      <td align="right">Prenom:</td>
      <td><label for="prenom"></label>
      <input type="text" name="prenom" id="prenom" /></td>
    </tr>
    <tr>
      <td align="right">Sexe:</td>
      <td><label for="sexe"></label>
        <select name="sexe" id="sexe">
          <option>masculin</option>
          <option>feminin</option>
      </select></td>
    </tr>
    <tr>
      <td align="right">Adresse:</td>
      <td><label for="adresse"></label>
      <input type="text" name="adresse" id="adresse" /></td>
    </tr>
    <tr>
      <td align="right">Telephone:</td>
      <td><label for="telephone"></label>
      <input type="text" name="telephone" id="telephone" /></td>
    </tr>
    <tr>
      <td align="right">Departement:</td>
      <td><label for="iddep"></label>
      <?php
        include("connect.php");
        $req="select  *from departement";
        $exe=mysql_query($req);
        echo "<select name=\"iddep\">";
        while($l=mysql_fetch_array($exe))
        {
        echo "<option value=".$l['iddep'].">".$l['nomdep']."</option>";
        }
        ?>
        </td>
    </tr>
    <tr>
      <td align="right"><input type="submit" name="enregistrer" id="enregistrer" value="Enregistrer" /></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>

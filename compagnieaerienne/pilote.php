<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
</head>

<body>
<?php include("debut.php");
?>
<form id="form1" name="form1" method="post" action="inspilote.php">
  <table width="397" border="1" align="center">
    <tr>
      <th scope="col">Matricule</th>
      <th scope="col"><label>
        <input name="mat" type="text" id="mat" />
      </label></th>
    </tr>
    <tr>
      <th scope="row">Nom</th>
      <td><label>
        <input name="no" type="text" id="no" />
      </label></td>
    </tr>
    <tr>
      <th scope="row">Prenom</th>
      <td><label>
        <input name="pno" type="text" id="pno" />
      </label></td>
    </tr>
    <tr>
      <th scope="row">Adresse</th>
      <td><label>
        <input name="adr" type="text" id="adr" />
      </label></td>
    </tr>
    <tr>
      <th scope="row">Telephone</th>
      <td><label>
        <input name="tel" type="text" id="tel" />
      </label></td>
    </tr>
    <tr>
      <th align="right" scope="row"><label>
        <input name="ok" type="submit" id="ok" value="Enregistrer" />
      </label></th>
      <td><label>
        <input name="nul" type="submit" id="nul" value="Annuler" />
      </label></td>
    </tr>
  </table>
</form>
<?php
if(isset($_POST['ajouter']))
{
include("classDatabase.php");
extract($_POST);
$db= new DB;
$lien=$db->connexion();
$db->executeSQL("insert into client values('$idClient','$nomClient','$pnomClient','$adrClient','$telephone')",$lien);
echo"Insertion reussie";
}
?>
<?php include("fin.php");?>
</body>
</html>

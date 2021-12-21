<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
</head>

<body>
<?php include("debut.php");
?>
<form id="form1" name="form1" method="post" action="insutiliser.php">
  <table width="402" height="174" border="1" align="center">
    <tr>
      <th scope="col">Identifiant de l'avion </th>
      <th scope="col"><label><?php
		include("connexion.php");
		?>
        <?php
		$db= new DB;
		$lien=$db->connexion();
		$exe=$db->executeSQL("select * from avion",$lien);
		echo"<select name=\"id\">";
		while($lig=$db->Nlignes($exe))
		{
		echo"<option value=".$lig['idavion'].">".$lig['type']."</option>";
		}
		echo"</select>";
		?></td>
		</label></th>
    </tr>
    <tr>
      <th scope="row">Matricule</th>
      <td><label></label>
	  <?php
		//include("connexion.php");
		$db= new DB;
		$lien=$db->connexion();
		$exe=$db->executeSQL("select * from pilote",$lien);
		echo"<select name=\"mat\">";
		while($lig=$db->Nlignes($exe))
		{
		echo"<option value=".$lig['numfacture'].">".$lig['idclient']."</option>";
		}
		echo"</select>";
		?></td>
	  
    </tr>
    <tr>
      <th scope="row"><p>Date de vol</p>      </th>
      <td><label>
        <input name="id" type="text" id="id" />
      </label></td>
    </tr>
    <tr>
      <th scope="row">Destination</th>
      <td><label>
        <input name="mat" type="text" id="mat" />
      </label></td>
    </tr>
    <tr>
      <th align="right" scope="row"><label>
        <input name="ok" type="submit" id="ok" value="Enregistrer" />
      </label></th>
      <td><label>
        <input name="nul" type="reset" id="nul" value="Annuler" />
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

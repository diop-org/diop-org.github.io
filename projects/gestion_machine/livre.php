<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
<link href="style/style_css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form id="form1" name="form1" method="post" action="inslivre.php">
  <table width="400" border="0" align="center" cellspacing="4">
    <tr>
      <td align="right">ISBN</td>
      <td><input name="ISBN" type="hidden" id="gris" value="" /></td>
    </tr>
    <tr>
      <td align="right">INTITULE</td>
      <td><label for="textfield"></label>
      <input type="text" name="intitule" id="gris" /></td>
    </tr>
    <tr>
      <td align="right">NB PAGES</td>
      <td><label for="textfield2"></label>
      <input type="text" name="nbpage" id="gris" /></td>
    </tr>
    <tr>
      <td align="right">COULEUR</td>
      <td><label for="textfield3"></label>
      <input type="text" name="couleur" id="gris" /></td>
    </tr>
     <tr>
     <td align="right">Editeur</td>
     <td><label for="select"></label>
       <select name="idEditeur" id="gris">
         <option>------------------------</option>
         <?php
		 include("Database.php");
		 $db=new Database;
		 $lien=$db->connexion();
		$exe=$lien=$db->ExecuteSQL("select * from editeur",$lien);
		 while($l=$db->Fetchligne($exe))
		 {
			 echo"<option value=".$l['idEditeur'].">".$l['nomEditeur']."</option>";
		 }
		 ?>
       </select>
       </td>
    </tr>
     <tr>
     <td align="right">Rayon</td>
     <td><label for="select"></label>
       <select name="idrayon" id="gris">
         <option>------------------------</option>
           <?php
		 $db=new Database;
		 $lien=$db->connexion();
		$exe=$lien=$db->ExecuteSQL("select * from rayon",$lien);
		 while($l=$db->Fetchligne($exe))
		 {
			 echo"<option value=".$l['idrayon'].">".$l['categorie']."</option>";
		 }
		 ?>
       </select></td>
    </tr>
    <tr>
      <td align="right"><input name="button" type="image" id="button" value="Envoyer" src="images/envoyer.png" alt="Envoyer" /></td>
      <td><input name="button2" type="image" id="button2" value="Annuler" src="images/annuler.png" alt="Annuler" /></td>
    </tr>
  </table>
</form>
</body>
</html>
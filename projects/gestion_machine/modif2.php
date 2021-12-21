<html>
  <head>
    <title>modification de données en PHP :: partie2</title>
  </head>
<body>
  <?php
   include("Database.php");
$db=new Database;
$lien=$db->connexion();

  //récupération de la variable d'URL,
  //qui va nous permettre de savoir quel enregistrement modifier
  $id=$_GET["idauteur"];
$req="SELECT * FROM auteur WHERE idauteur =".$id;
 
  //requête SQL:
$exe=$db->ExecuteSQL($req,$lien);
 
 
 
  //affichage des données:
  if($l= $db->Fetchligne($exe))
  {
  ?>
<form name="insertion" action="modif3.php" method="POST">
  <input type="hidden" name="idaut" value="<?php echo $id ;?>">
  <table border="0" align="center" cellspacing="2" cellpadding="2">
<tr align="center">
      <td>CIV_AUTEUR</td>
      <td><input type="text" name="civaut" value="<?php echo $l['civilite'] ;?>"></td>
    </tr>
    <tr align="center">
      <td>NOM_AUTEUR</td>
      <td><input type="text" name="nomaut" value="<?php echo $l['nomauteur'] ;?>"></td>
    </tr>
    <tr align="center">
      <td>PRENOM_AUTEUR</td>
      <td><input type="text" name="paut" value="<?php echo $l['pnomauteur'] ;?>"></td>
    </tr>
    <tr align="center">
      <td>ADRESSE_AUTEUR</td>
      <td><input type="text" name="adraut" value="<?php echo $l['adrauteur'] ;?>"></td>
    </tr>
<tr align="center">
      <td>TEL_AUTEUR</td>
      <td><input type="text" name="telaut" value="<?php echo $l['telauteur'] ;?>"></td>
    </tr>
    <tr align="center">
      <td colspan="2"><input type="submit" value="modifier"></td>
    </tr>
  </table>
</form>
  <?php
  }//fin if 
  ?>
</body>

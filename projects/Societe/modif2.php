<html>
  <head>
    <title>modification de données en PHP :: partie2</title>
  </head>
<body>
  <?php
   include("connect.php");


  //récupération de la variable d'URL,
  //qui va nous permettre de savoir quel enregistrement modifier
  $id=$_GET["mat"] ;
$req="SELECT * FROM employe WHERE mat =".$id;
 
 
$exe=mysql_query($req);
 
 
 
  //affichage des données:
  if($l=mysql_fetch_array($exe))
  {
  ?>
<form name="insertion" action="modif3.php" method="POST">
  <input type="hidden" name="num" value="<?php echo $id ;?>">
  <table border="0" align="center" cellspacing="2" cellpadding="2">
    <tr align="center">
      <td>nom</td>
      <td><input type="text" name="nom" value="<?php echo $l['nom'] ;?>"></td>
    </tr>
    <tr align="center">
      <td>prenom</td>
      <td><input type="text" name="pnom" value="<?php echo $l['prenom'] ;?>"></td>
    </tr>
    <tr align="center">
      <td>Adresse</td>
      <td><input type="text" name="adr" value="<?php echo $l['adresse'] ;?>"></td>
    </tr>
<tr align="center">
      <td>Sexe</td>
      <td><input type="text" name="sex" value="<?php echo $l['sexe'] ;?>"></td>
    </tr>
<tr align="center">
      <td>Telephone</td>
      <td><input type="text" name="tel" value="<?php echo $l['tele'] ;?>"></td>
    </tr>
<tr align="center">
      <td>Identifiant departement</td>
      <td><input type="text" name="dep" value="<?php echo $l['iddpt'] ;?>"></td>
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

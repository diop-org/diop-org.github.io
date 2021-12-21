<html>
  <head>
    <title>modification de données en PHP :: partie2</title>
  </head>
<body>
  <?php
   include("classDatabase.php");
$db=new DB;
$lien=$db->connexion();

  //récupération de la variable d'URL,
  //qui va nous permettre de savoir quel enregistrement modifier
  $id=$_GET["idauteur"] ;
$req="SELECT * FROM auteur WHERE idauteur =".$id;
 
  //requête SQL:
$exe=$db->ExecuteSQL($req,$lien);
  //affichage des données:
  if($l= $db->FetchLigne($exe))
  {
  ?>
<form name="insertion" action="Modif3.php" method="POST">
  <input type="hidden" name="numc" value="<?php echo $id ;?>">
  <table border="0" align="center" cellspacing="2" cellpadding="2">
    <tr align="center">
      <td>nomAuteur</td>
      <td><input type="text" name="nomc" value="<?php echo $l['noauteur'] ;?>"></td>
    </tr>
    <tr align="center">
      <td>prAuteur</td>
      <td><input type="text" name="adrc" value="<?php echo $l['prauteur'] ;?>"></td>
    </tr>
    <tr align="center">
      <td>email</td>
      <td><input type="text" name="chif" value="<?php echo $l['email'] ;?>"></td>
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
</html>

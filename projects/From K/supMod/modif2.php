<html>
  <head>
    <title>modification de données en PHP :: partie2</title>
  </head>
<body>
  <?php
   include("classDatabase.php");
$db=new DB;
$lien=$dc->Connexion();

  //récupération de la variable d'URL,
  //qui va nous permettre de savoir quel enregistrement modifier
  $id=$_GET["idcompagnie"] ;
$req="SELECT * FROM compagnie WHERE idcompagnie =".$id;
 
  //requête SQL:
$exe=$db->ExecuteSQL($req,$lien);
 
 
 
  //affichage des données:
  if($l= $db->FetchLigne($exe))
  {
  ?>
<form name="insertion" action="modif3.php" method="POST">
  <input type="hidden" name="numc" value="<?php echo $id ;?>">
  <table border="0" align="center" cellspacing="2" cellpadding="2">
    <tr align="center">
      <td>nomCompagnie</td>
      <td><input type="text" name="nomc" value="<?php echo $l['nomcompagnie'] ;?>"></td>
    </tr>
    <tr align="center">
      <td>AdrCompagnie</td>
      <td><input type="text" name="adrc" value="<?php echo $l['adrcompagnie'] ;?>"></td>
    </tr>
    <tr align="center">
      <td>Chiffre_Affaire</td>
      <td><input type="text" name="chif" value="<?php echo $l['chiffre'] ;?>"></td>
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

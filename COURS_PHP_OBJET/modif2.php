<html>
  <head>
    <title>modification de donn�es en PHP :: partie2</title>
  </head>
<body>
  <?php
   include("classdatabase.php");
$db=new DB;
$lien=$db->Connexion();

  //r�cup�ration de la variable d'URL,
  //qui va nous permettre de savoir quel enregistrement modifier
  $id=$_GET["idcompagni"] ;
$req="SELECT * FROM compagnie WHERE idcompagni =".$id;
 
  //requ�te SQL:
$exe=$db->ExecuteSQL($req,$lien);
 
 
 
  //affichage des donn�es:
  if($l= $db->FetchLigne($exe))
  {
  ?>
<form name="insertion" action="modif3.php" method="POST">
  <input type="hidden" name="numc" value="<?php echo $id ;?>">
  <table border="0" align="center" cellspacing="2" cellpadding="2">
    <tr align="center">
      <td>Nom Compagnie</td>
      <td><input type="text" name="nomc" value="<?php echo $l['nomcompagnie'] ;?>"></td>
    </tr>
    <tr align="center">
      <td>Adr Compagnie</td>
      <td><input type="text" name="adrc" value="<?php echo $l['adressecompagnie'] ;?>"></td>
    </tr>
    <tr align="center">
      <td>Chiffre Affaire</td>
      <td><input type="text" name="chif" value="<?php echo $l['chiffaff'] ;?>"></td>
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

<html>
  <head>
    <title>modification de données en PHP :: partie2</title>
  </head>
<body>
  <?php
   include("connect.php");


  
  $id=$_GET["matricule"] ;
$req="SELECT * FROM produit WHERE code =".$code;
 
 
$exe=mysql_query($req);
 
 
 

  if($l=mysql_fetch_array($exe))
  {
  ?>
<form name="insertion" action="modifproduit2.php" method="POST">
  <input type="hidden" name="num" value="<?php echo $id ;?>">
  <table border="0" align="center" cellspacing="2" cellpadding="2">
    <tr align="center">
      <td>nom</td>
      <td><input type="text" name="designation" value="<?php echo $l['designation'] ;?>"></td>
    </tr>
    <tr align="center">
      <td>prenom</td>
      <td><input type="text" name="pu" value="<?php echo $l['pu'] ;?>"></td>
    </tr>
    <tr align="center">
      <td>Adresse</td>
      <td><input type="text" name="qte" value="<?php echo $l['qte'] ;?>"></td>
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

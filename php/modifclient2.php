<?php
 include("connect.php");
 
 
  $nom=$_POST['nom'] ;
$pnom=$_POST['pnom'] ;
 $adresse=$_POST['adresse'] ;
  $tel=$_POST['tel'] ;

 
 
  $id= $_POST['matricule'] ;
 
 
  $sql = "UPDATE client
            SET nom='$nom', 
                       pnom='$pnom', 
	          adresse='$adresse',
                            tel='$tel', 
           WHERE matricule='$id' " ;
 
  
  $exe=mysql_query($sql);;
 
 
 
  if($exe)
  {
    echo("La modification à été correctement effectuée") ;
include("modifclient.php");
  }
  else
  {
    echo("La modification à échouée") ;
  }
?>
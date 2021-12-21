<?php
    include("connect.php");

  $id  = $_GET['code'] ;

  $sql = "DELETE 
            FROM produit
	    WHERE matricule= ".$id ;
  echo $sql ;	    

  $exe = mysql_query($sql) ;
 
  
  if($exe)
  {
    echo("La suppression à été correctement effectuée") ;
include("modifproduit1.php");
  }
  else
  {
    echo("La suppression à échouée") ;
  }
?>
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
    echo("La suppression � �t� correctement effectu�e") ;
include("modifproduit1.php");
  }
  else
  {
    echo("La suppression � �chou�e") ;
  }
?>
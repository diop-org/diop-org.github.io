<?php
    include("connect.php");

  $id  = $_GET['matricule'] ;

  $sql = "DELETE 
            FROM client
	    WHERE matricule= ".$id ;
  echo $sql ;	    

  $exe = mysql_query($sql) ;
 
  
  if($exe)
  {
    echo("La suppression � �t� correctement effectu�e") ;
include("modifclient1.php");
  }
  else
  {
    echo("La suppression � �chou�e") ;
  }
?>
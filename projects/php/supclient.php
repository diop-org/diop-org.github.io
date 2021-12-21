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
    echo("La suppression à été correctement effectuée") ;
include("modifclient1.php");
  }
  else
  {
    echo("La suppression à échouée") ;
  }
?>
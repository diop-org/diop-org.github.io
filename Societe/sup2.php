<?php
    include("connect.php");
  //r�cup�ration de la variable d'URL,
  //qui va nous permettre de savoir quel enregistrement supprimer:
  $id  = $_GET['mat'] ;
  //requ�te SQL:
  $sql = "DELETE 
            FROM employe
	    WHERE mat = ".$id ;
  echo $sql ;	    
  //ex�cution de la requ�te:
  $exe = mysql_query($sql) ;
 
  //affichage des r�sultats, pour savoir si la suppression a march�e:
  if($exe)
  {
    echo("La suppression � �t� correctement effectu�e") ;
include("modif1.php");
  }
  else
  {
    echo("La suppression � �chou�e") ;
  }
?>
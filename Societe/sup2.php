<?php
    include("connect.php");
  //récupération de la variable d'URL,
  //qui va nous permettre de savoir quel enregistrement supprimer:
  $id  = $_GET['mat'] ;
  //requête SQL:
  $sql = "DELETE 
            FROM employe
	    WHERE mat = ".$id ;
  echo $sql ;	    
  //exécution de la requête:
  $exe = mysql_query($sql) ;
 
  //affichage des résultats, pour savoir si la suppression a marchée:
  if($exe)
  {
    echo("La suppression à été correctement effectuée") ;
include("modif1.php");
  }
  else
  {
    echo("La suppression à échouée") ;
  }
?>
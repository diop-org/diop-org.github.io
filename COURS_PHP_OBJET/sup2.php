<?php
    include("classdatabase.php");
$db=new DB;
$lien=$db->Connexion();
  //r�cup�ration de la variable d'URL,
  //qui va nous permettre de savoir quel enregistrement supprimer:
  $id  = $_GET['idcompagni'] ;
 
  //requ�te SQL:
  $sql = "DELETE 
            FROM compagnie
	    WHERE idcompagni = ".$id ;
 // echo $sql ;	    
  //ex�cution de la requ�te:
  $exe = $db->ExecuteSQL($sql,$lien) ;
 
  //affichage des r�sultats, pour savoir si la suppression a march�e:
  if($exe)
  {
    echo("La suppression � �t� correctement effectu�e") ;
     
  }
  else
  {
    echo("La suppression � �chou�e") ;

  }

?>
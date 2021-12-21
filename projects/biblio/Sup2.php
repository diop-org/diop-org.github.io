<?php
    include("classDatabase.php");
$db=new DB;
$lien=$db->Connexion();
  //récupération de la variable d'URL,
  //qui va nous permettre de savoir quel enregistrement supprimer:
  $id  = $_GET['idauteur'] ;
 
  //requête SQL:
  $sql = "DELETE 
            FROM auteur
	    WHERE idauteur".$id ;
  echo $sql ;	    
  //exécution de la requête:
  $exe = $db->ExecuteSQL($sql,$lien) ;
 
  //affichage des résultats, pour savoir si la suppression a marchée:
  if($exe)
  {
    echo("La suppression à été correctement effectuée") ;
  }
  else
  {
    echo("La suppression à échouée") ;
  }
?>
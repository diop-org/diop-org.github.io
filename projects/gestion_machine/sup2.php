<?php
    include("Database.php");
$db=new Database;
$lien=$db->connexion();
  //récupération de la variable d'URL,
  //qui va nous permettre de savoir quel enregistrement supprimer:
  $idauteur = $_GET['idauteur'] ;
 
  //requête SQL:
  $sql = "DELETE 
            FROM auteur
	    WHERE idauteur = ".$idauteur ;
  //echo $sql ;	    
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
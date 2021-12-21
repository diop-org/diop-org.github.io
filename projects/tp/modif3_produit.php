<?php
include("connection/connexion.php");
 
  //récupération des valeurs des champs:
 
  $codeprod=$_POST['codeprod'] ;
 $desprod=$_POST['desprod'] ;
  $puprod=$_POST['puprod'] ;
  $qteprod=$_POST['qteprod'] ;
  //récupération du numero :
  $id=$_POST['codeprod'] ;
 
  //création de la requête SQL:
  $sql = "UPDATE produit
            SET codeprod='$codeprod', 
	          desprod='$desprod',
		  puprod='$puprod',
		  qteprod='$qteprod'
           WHERE codeprod='$id' " ;
 
  //exécution de la requête SQL:
  $requete=mysql_query($sql)or die( mysql_error() ) ;
 
 
  //affichage des résultats, pour savoir si la modification a marchée:
  if($requete)
  {
    echo("La modification à été correctement effectuée") ;
include("modif1_produit.php");
  }
  else
  {
    echo("La modification à échouée") ;
  }
?>
<?php
include("connection/connexion.php");
 
  //r�cup�ration des valeurs des champs:
 
  $codeprod=$_POST['codeprod'] ;
 $desprod=$_POST['desprod'] ;
  $puprod=$_POST['puprod'] ;
  $qteprod=$_POST['qteprod'] ;
  //r�cup�ration du numero :
  $id=$_POST['codeprod'] ;
 
  //cr�ation de la requ�te SQL:
  $sql = "UPDATE produit
            SET codeprod='$codeprod', 
	          desprod='$desprod',
		  puprod='$puprod',
		  qteprod='$qteprod'
           WHERE codeprod='$id' " ;
 
  //ex�cution de la requ�te SQL:
  $requete=mysql_query($sql)or die( mysql_error() ) ;
 
 
  //affichage des r�sultats, pour savoir si la modification a march�e:
  if($requete)
  {
    echo("La modification � �t� correctement effectu�e") ;
include("modif1_produit.php");
  }
  else
  {
    echo("La modification � �chou�e") ;
  }
?>
<?php
 include("classDatabase.php");
  //récupération des valeurs des champs:
 
  $nomc=$_POST['nomc'] ;
 $adrc=$_POST['adrc'] ;
  $chifc=$_POST['chif'] ;
 
  //récupération du numero :
  $id= $_POST['numc'] ;
 
  //création de la requête SQL:
  $sql = "UPDATE compagnie
            SET nomcompagnie='$nomc', 
	          adrcompagnie='$adrc',
		  chiffre ='$chifc'
           WHERE numcompagnie='$id' " ;
 
  //exécution de la requête SQL:
  $exe=$db->ExecuteSQL($sql,$lien);
 
 
  //affichage des résultats, pour savoir si la modification a marchée:
  if($exe)
  {
    echo("La modification à été correctement effectuée") ;
include("modif1.php");
  }
  else
  {
    echo("La modification à échouée") ;
  }
?>
<?php
 include("classDatabase.php");
  //r�cup�ration des valeurs des champs:
 
  $nomc=$_POST['nomc'] ;
 $adrc=$_POST['adrc'] ;
  $chifc=$_POST['chif'] ;
 
  //r�cup�ration du numero :
  $id= $_POST['numc'] ;
 
  //cr�ation de la requ�te SQL:
  $sql = "UPDATE compagnie
            SET nomcompagnie='$nomc', 
	          adrcompagnie='$adrc',
		  chiffre ='$chifc'
           WHERE numcompagnie='$id' " ;
 
  //ex�cution de la requ�te SQL:
  $exe=$db->ExecuteSQL($sql,$lien);
 
 
  //affichage des r�sultats, pour savoir si la modification a march�e:
  if($exe)
  {
    echo("La modification � �t� correctement effectu�e") ;
include("modif1.php");
  }
  else
  {
    echo("La modification � �chou�e") ;
  }
?>
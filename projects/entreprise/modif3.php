<?php
 include("connect.php");
  //récupération des valeurs des champs:
 
  $nomc=$_POST['nom'] ;
$pnomc=$_POST['pnom'] ;
 $adrc=$_POST['adresse'] ;
  $tel=$_POST['tel'] ;

 
  //récupération du numero :
  $id= $_POST['num'] ;
 
  //création de la requête SQL:
  $sql = "UPDATE client
            SET nom='$nomc', 
                       prenom='$pnomc', 
	          adresse='$adrc',
                        sexe='$sex', 
                            telephone='$tel', 
		 iddep ='$dep'
           WHERE matricule='$id' " ;
 
  //exécution de la requête SQL:
  $exe=mysql_query($sql);;
 
 
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
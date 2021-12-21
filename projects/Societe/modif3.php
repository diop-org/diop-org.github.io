<?php
 include("connect.php");
  //récupération des valeurs des champs:
 
  $nomc=$_POST['nom'] ;
$pnomc=$_POST['pnom'] ;
 $adrc=$_POST['adr'] ;
 $sex=$_POST['sex'] ;
  $tel=$_POST['tel'] ;
 $dep=$_POST['dep'] ;
 
  //récupération du numero :
  $id= $_POST['num'] ;
 
  //création de la requête SQL:
  $sql = "UPDATE employe
            SET nom='$nomc', 
                       prenom='$pnomc', 
	          adresse='$adrc',
                        sexe='$sex', 
                            tele='$tel', 
		 iddpt ='$dep'
           WHERE mat='$id' " ;
 
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
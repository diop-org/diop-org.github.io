<?php
 include("connect.php");
  //r�cup�ration des valeurs des champs:
 
  $nomc=$_POST['nom'] ;
$pnomc=$_POST['pnom'] ;
 $adrc=$_POST['adr'] ;
 $sex=$_POST['sex'] ;
  $tel=$_POST['tel'] ;
 $dep=$_POST['dep'] ;
 
  //r�cup�ration du numero :
  $id= $_POST['num'] ;
 
  //cr�ation de la requ�te SQL:
  $sql = "UPDATE employe
            SET nom='$nomc', 
                       prenom='$pnomc', 
	          adresse='$adrc',
                        sexe='$sex', 
                            tele='$tel', 
		 iddpt ='$dep'
           WHERE mat='$id' " ;
 
  //ex�cution de la requ�te SQL:
  $exe=mysql_query($sql);;
 
 
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
<?php
 include("classdatabase.php");
$db=new DB;
$lien=$db->Connexion();
  //r�cup�ration des valeurs des champs:
 
  $nomc=$_POST['nomc'] ;
 $adrc=$_POST['adrc'] ;
  $chifc=$_POST['chif'] ;
 
  //r�cup�ration du numero :
  $id= $_POST['numc'] ;
 
  //cr�ation de la requ�te SQL:
  $sql = "UPDATE compagnie
            SET nomcompagnie='$nomc', 
	          adressecompagnie='$adrc',
		  chiffaff ='$chifc'
           WHERE idcompagni='$id' " ;
 
  //ex�cution de la requ�te SQL:
  $exe=$db->ExecuteSQL($sql,$lien);
 
 
  //affichage des r�sultats, pour savoir si la modification a march�e:
  if($exe)
  {
    echo("La modification � �t� correctement effectu�e") ;
echo"<a href=\"modif1.php\">liste des compagnies</a>";
;
  }
  else
  {
    echo("La modification � �chou�e") ;
  }
?>
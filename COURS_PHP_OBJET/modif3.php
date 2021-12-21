<?php
 include("classdatabase.php");
$db=new DB;
$lien=$db->Connexion();
  //récupération des valeurs des champs:
 
  $nomc=$_POST['nomc'] ;
 $adrc=$_POST['adrc'] ;
  $chifc=$_POST['chif'] ;
 
  //récupération du numero :
  $id= $_POST['numc'] ;
 
  //création de la requête SQL:
  $sql = "UPDATE compagnie
            SET nomcompagnie='$nomc', 
	          adressecompagnie='$adrc',
		  chiffaff ='$chifc'
           WHERE idcompagni='$id' " ;
 
  //exécution de la requête SQL:
  $exe=$db->ExecuteSQL($sql,$lien);
 
 
  //affichage des résultats, pour savoir si la modification a marchée:
  if($exe)
  {
    echo("La modification à été correctement effectuée") ;
echo"<a href=\"modif1.php\">liste des compagnies</a>";
;
  }
  else
  {
    echo("La modification à échouée") ;
  }
?>
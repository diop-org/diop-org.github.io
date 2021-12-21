<?php
 include("Database.php");
$db=new Database;
$lien=$db->connexion();
  //récupération des valeurs des champs:
 $civ=$_POST['civaut'] ;
  $nomaut=$_POST['nomaut'] ;
 $po=$_POST['paut'] ;
  $adr=$_POST['adraut'] ;
$tel=$_POST['telaut'] ;
 
  //récupération du numero :
  $id= $_POST['idaut'] ;
 
  //création de la requête SQL:
  $sql = "UPDATE auteur
            SET civilite='$civ', 
                 nomauteur='$nomaut', 
	          pnomauteur='$po',
		  adrauteur ='$adr',
                 telauteur='$tel'
           WHERE idauteur='$id' " ;
 
  //exécution de la requête SQL:
  $exe=$db->ExecuteSQL($sql,$lien);
 
 
  //affichage des résultats, pour savoir si la modification a marchée:
  if($exe)
  {
    echo("La modification à été correctement effectuée<br/>") ;
echo"<a href=\"modif1.php\">Listes des Auteurs</a>";
  }
  else
  {
    echo("La modification à échouée") ;
  }
?>
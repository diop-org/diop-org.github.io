<?php
 include("Database.php");
$db=new Database;
$lien=$db->connexion();
  //r�cup�ration des valeurs des champs:
 $civ=$_POST['civaut'] ;
  $nomaut=$_POST['nomaut'] ;
 $po=$_POST['paut'] ;
  $adr=$_POST['adraut'] ;
$tel=$_POST['telaut'] ;
 
  //r�cup�ration du numero :
  $id= $_POST['idaut'] ;
 
  //cr�ation de la requ�te SQL:
  $sql = "UPDATE auteur
            SET civilite='$civ', 
                 nomauteur='$nomaut', 
	          pnomauteur='$po',
		  adrauteur ='$adr',
                 telauteur='$tel'
           WHERE idauteur='$id' " ;
 
  //ex�cution de la requ�te SQL:
  $exe=$db->ExecuteSQL($sql,$lien);
 
 
  //affichage des r�sultats, pour savoir si la modification a march�e:
  if($exe)
  {
    echo("La modification � �t� correctement effectu�e<br/>") ;
echo"<a href=\"modif1.php\">Listes des Auteurs</a>";
  }
  else
  {
    echo("La modification � �chou�e") ;
  }
?>
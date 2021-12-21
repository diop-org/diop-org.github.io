<?php
 include("classDatabase.php");
 $db=new DB;
 $lien=$db->Connexion();
  //récupération des valeurs des champs:
 
  $noA=$_POST['noA'] ;
 $prA=$_POST['prA'] ;
  $em=$_POST['em'] ;
 
  //récupération du numero :
  $id= $_POST['idA'] ;
 
  //création de la requête SQL:
  $sql = "UPDATE auteur
            SET noauteur='$noA', 
	          prauteur='$prA',
		  email ='$em'
           WHERE idauteur='$id' " ;
 
  //exécution de la requête SQL:
 $exe=$db->ExecuteSQL($sql,$lien);
   //affichage des résultats, pour savoir si la modification a marchée:
  if($exe)
  {
    echo("La modification à été correctement effectuée") ;

  }
  else
  {
    echo("La modification à échouée") ;
  }
?>
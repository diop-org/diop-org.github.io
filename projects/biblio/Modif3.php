<?php
 include("classDatabase.php");
 $db=new DB;
 $lien=$db->Connexion();
  //r�cup�ration des valeurs des champs:
 
  $noA=$_POST['noA'] ;
 $prA=$_POST['prA'] ;
  $em=$_POST['em'] ;
 
  //r�cup�ration du numero :
  $id= $_POST['idA'] ;
 
  //cr�ation de la requ�te SQL:
  $sql = "UPDATE auteur
            SET noauteur='$noA', 
	          prauteur='$prA',
		  email ='$em'
           WHERE idauteur='$id' " ;
 
  //ex�cution de la requ�te SQL:
 $exe=$db->ExecuteSQL($sql,$lien);
   //affichage des r�sultats, pour savoir si la modification a march�e:
  if($exe)
  {
    echo("La modification � �t� correctement effectu�e") ;

  }
  else
  {
    echo("La modification � �chou�e") ;
  }
?>
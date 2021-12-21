<?php
 include("connect.php");
 
 
  $designation=$_POST['designation'] ;
$pu=$_POST['pu'] ;
 $qte=$_POST['qte'] ;


 
  
  $id= $_POST['code'] ;
 
 
  $sql = "UPDATE produit
            SET designation='$designation', 
                       pu='$pu', 
	          qte='$qte',
           WHERE matricule='$id' " ;
 
  
  $exe=mysql_query($sql);;
 
 
 
  if($exe)
  {
    echo("La modification à été correctement effectuée") ;
include("modifproduit.php");
  }
  else
  {
    echo("La modification à échouée") ;
  }
?>
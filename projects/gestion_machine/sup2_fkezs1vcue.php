<?php
    include("Database.php");
$db=new Database;
$lien=$db->connexion();
  //r�cup�ration de la variable d'URL,
  //qui va nous permettre de savoir quel enregistrement supprimer:
  $id  = $_GET['idauteur'] ;
 
  //requ�te SQL:
  $sql = "DELETE 
            FROM auteur
	    WHERE idauteur = ".$id ;
  //echo $sql ;	    
  //ex�cution de la requ�te:
  $exe = $db->ExecuteSQL($sql,$lien) ;
 
  //affichage des r�sultats, pour savoir si la suppression a march�e:
  if($exe)
  {
    echo("La suppression � �t� correctement effectu�e") ;
  }
  else
  {
    echo("La suppression � �chou�e") ;
  }
?>
<?php
echo "<mm:dwdrfml documentRoot=\"" . __FILE__ .	"\" >\n\n";
$included_files = get_included_files();
foreach ($included_files as $filename) {
	echo "<mm:IncludeFile path=\"$filename\" />\n\n";
}
echo "</mm:dwdrfml>\n\n";

?>
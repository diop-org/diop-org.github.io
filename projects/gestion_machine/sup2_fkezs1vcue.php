<?php
    include("Database.php");
$db=new Database;
$lien=$db->connexion();
  //récupération de la variable d'URL,
  //qui va nous permettre de savoir quel enregistrement supprimer:
  $id  = $_GET['idauteur'] ;
 
  //requête SQL:
  $sql = "DELETE 
            FROM auteur
	    WHERE idauteur = ".$id ;
  //echo $sql ;	    
  //exécution de la requête:
  $exe = $db->ExecuteSQL($sql,$lien) ;
 
  //affichage des résultats, pour savoir si la suppression a marchée:
  if($exe)
  {
    echo("La suppression à été correctement effectuée") ;
  }
  else
  {
    echo("La suppression à échouée") ;
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
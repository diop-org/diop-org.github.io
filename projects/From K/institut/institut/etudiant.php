<?php
include("classDatabase.php");
		?>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">

<fieldset>
  
   
 <legend> Etudiant</legend>
  

<pre>
Matricule:  <label><input type="text" name="matricule" id="matricule" /></label>
 
Nom:<label>        <input type="text" name="nom" id="nom"/> </label>  Prenom:  <label><input type="text" name="prenom" id="prenom" /></label> 

 
Adresse :<label>   <input type="text" name="adresse" id="adresse" />   Email:   <label><input type="text" name="email" id="email" /></label> 


Classe:     <label><?php	
		$db= new DB;
		$lien=$db->connexion();
		$exe=$db->executeSQL("select * from classe",$lien);
		echo"<select name=\"id\">";
		while($l=$db->Nlignes($exe))
		{
		echo"<option value=".$l['idClasse'].">".$l['nomClasse']."</option>";
		}
		echo"</select>";
		?></label>

Photo :     <label><input type="file" name="file" id="file" /></label> <label></label>
</label>
       
<label><a href="index.php?KIM=4"><input type="button" name="afficher" id="afficher" value="Liste des etudiants" /></a></label>    <label><input type="submit" name="ajouter" id="ajouter"value="Ajouter" /></label> 
  
</pre>

</fieldset>

</form>
<?php
if(isset($_POST['ajouter']))
{

extract($_POST);
$img=$_FILES["file"]["name"];
$taille=$_FILES["file"]["size"];
list($ph,$ext)=explode(".",$img);
$ext=".".$ext;
$chemin="./images/".$img;
move_uploaded_file($_FILES["file"]["tmp_name"],$chemin);
$db= new DB;
$lien=$db->connexion();
$db->executeSQL("insert into etudiant values('$matricule','$nom','$prenom','$adresse','$email','$id','$img')",$lien);

echo"Insertion reussie";

}
?>
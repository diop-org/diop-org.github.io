<?php
include("classDatabase.php");
		?>
<form id="form1" name="form1" method="post" action="">

<fieldset>
  
   
 <legend> Avion</legend>
  

<pre>
idAvion:<label><input type="text" name="idAvion" id="idAvion" /></label>
 
Couleur:<label><input type="text" name="couleur" id="couleur "/> </label>  Nombre de places:<label><input type="text" name="nbplaces" id="nbplaces" /></label> 

 
Type :<label><input type="text" name="type" id="type" />
</label>
Compagnie:<label><?php	
		$db= new DB;
		$lien=$db->connexion();
		$exe=$db->executeSQL("select * from compagnie",$lien);
		echo"<select name=\"id\">";
		while($l=$db->Nlignes($exe))
		{
		echo"<option value=".$l['idCompagnie'].">".$l['nomCompagnie']."</option>";
		}
		echo"</select>";
		?></label>
       
<label><a href="index.php?KIM=13"><input type="button" name="afficher" id="afficher" value="Liste des avions" /></a></label>
<label><input type="submit" name="ajouter" id="ajouter"value="Ajouter" /></label> 
  
</pre>

</fieldset>

</form>
<?php
if(isset($_POST['ajouter']))
{

extract($_POST);
$db= new DB;
$lien=$db->connexion();
$db->executeSQL("insert into avion values('$idAvion','$couleur','$nbplaces','$type','$id')",$lien);
echo"Insertion reussie";

}
?>
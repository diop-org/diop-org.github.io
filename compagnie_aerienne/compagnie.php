<?php
include("classDatabase.php");
		?>
<form id="form1" name="form1" method="post" action="">

<fieldset>
 <legend> Compagnie</legend>
  <pre>
idCompagnie:<label><input type="text" name="idCompagnie" id="idCompagnie" /></label>
 
Nom-Compagnie:<label><input type="text" name="nomCompagnie" id="nomCompagnie" /></label>  

 
Adresse :<label><input type="text" name="adrCompagnie" id="adrCompagnie" />
</label>
Telephone:<label><input type="text" name="telCompagnie" id="telCompagnie" /></label>Chiffre d'affaire: <label><input type="text" name="chiffaffaire" id="chiffaffaire" /></label>
<label><a href="index.php?KIM=12.php"><input type="button" name="afficher" id="ajouter" value="Liste des compagnies" /></a></label>
<label><input type="submit" name="ajouter" id="ajouter"value="Ajouter" /></label> 
  
</pre>

</fieldset>

</form>
<?php
if(isset($_POST['ajouter']))
{
//include("classDatabase.php");
extract($_POST);
$db= new DB;
$lien=$db->connexion();
$db->executeSQL("insert into compagnie values('$idCompagnie','$nomCompagnie','$adrCompagnie','$telCompagnie','$chiffaffaire')",$lien);
echo"Insertion reussie";

}
?>
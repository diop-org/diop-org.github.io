<?php
include("classDatabase.php");
		?>
<form id="form1" name="form1" method="post" action="pilote.php">

<fieldset>
  
   
 <legend> Compagnie</legend>
  

<pre>
Matricule:<label><input type="text" name="matricule" id="matricule" /></label>
 
Nom-Pilote:<label><input type="text" name="nomPilote" id="nomPilote" /></label>  Prenom-Pilotee:<label><input type="text" name="prenomPilote" id="prenomPilote" /></label> 

 
Adresse :<label><input type="text" name="adresse" id="adresse" />
</label>
Telephone:<label><input type="text" name="telephone" id="telephone" /></label>
<label><a href="affiche_pilote.php"><input type="button" name="afficher" id="ajouter" value="Liste des pilotes" />
<label><input type="submit" name="ajouter" id="ajouter"value="Ajouter" /></label> 
  
</pre>

</fieldset>

</form>
?>
<?php
if(isset($_POST['ajouter']))
{
//include("classDatabase.php");
extract($_POST);
$db= new DB;
$lien=$db->connexion();
$db->executeSQL("insert into pilotevalues('$matricule','$nompilote','$prenompilote','$adresse','$telephone')",$lien);
echo"Insertion reussie";

}
?>

<?php include("debut.php");?>
<form id="form1" name="form1" method="post" action="candidat.php">

<fieldset>
  
   
 <legend> Candidat</legend>
  

<pre>
IdCandidat:<label><input type="text" name="idCandidat" id="idCandidat" /></label>
 
Nom-Candidat:<label><input type="text" name="nomCandidat" id="nomCandidat" /></label>  Prenom-Candidat:<label><input type="text" name="pnomCandidat" id="pnomCandidat" /></label> 

 
Adresse :<label><input type="text" name="adresse" id="adresse" />
</label>
Nationalite: <label><input type="text" name="nationalite" id="nationalite" /></label>Telephone:<label><input type="text" name="telephone" id="telephone" /></label>
<label><a href="affiche_candidat.php"><input type="button" name="afficher" id="ajouter" value="Liste des candidats" />
<label><input type="submit" name="ajouter" id="ajouter"value="Ajouter" /></label> 
  
</pre>

</fieldset>

</form>
<?php
if(isset($_POST['ajouter']))
{
include("classDatabase.php");
extract($_POST);
$db= new DB;
$lien=$db->connexion();
$db->executeSQL("insert into candidat values('$idCandidat','$nomCandidat','$pnomCandidat','$adresse','$nationalite','$telephone')",$lien);
echo"Insertion reussie";

}
?>
<?php include("fin.php");?>

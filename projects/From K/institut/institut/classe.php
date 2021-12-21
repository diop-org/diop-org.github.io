<?php
include("classDatabase.php");
		?>
<form id="form1" name="form1" method="post" action="">

<fieldset>
 <legend> Classe</legend>
  <pre>
idClasse:  <label><input type="text" name="idClasse" id="idClasse" /></label>
 
Nom-classe:<label><input type="text" name="nomClasse" id="nomClasse" /></label>  

</label>    <label><input type="submit" name="ajouter" id="ajouter"value="Ajouter" /></label> 
  
</pre>

</fieldset>

</form>
<?php
if(isset($_POST['ajouter']))
{

extract($_POST);
$db= new DB;
$lien=$db->connexion();
$db->executeSQL("insert into classe values('$idClasse','$nomClasse')",$lien);
echo"Insertion reussie";

}
?>
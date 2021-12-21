
<?php include("debut.php");?>
<form id="form1" name="form1" method="post" action="centre.php">

<fieldset>
  
   
 <legend>Centre</legend>
  

<pre>

Identifiant:<label><input type="text" name="idCentre" id="idCentre" /></label>
 
Nom-centre:<label><input type="text" name="nomCentre" id="nomCentre" /></label>
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
$db->executeSQL("insert into centre values('$idCentre','$nomCentre')",$lien);
echo"Insertion reussie";

}
?>
<?php include("fin.php");?>

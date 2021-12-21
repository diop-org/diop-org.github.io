
<?php include("debut.php");?>
<form id="form1" name="form1" method="post" action="exam.php">

<fieldset>
  
   
 <legend>EXAMEN</legend>
  

<pre>

Identifiant:<label><input type="text" name="idExam" idExam" /></label>
 
Libelle-examen:<label><input type="text" name="libExam" id="libExam" /></label>  Option:<label><input type="text" name="option" id="option" /></label> 

 
Session :
<label>
<input type="text" name="session" id="session" />
</label>

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
$db->executeSQL("insert into exam values('$idExam','$libExam','$option','$session')",$lien);
echo"Insertion reussie";

}
?>
<?php include("fin.php");?>

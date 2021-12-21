<?php include("debut.php");?>
<?php
include("classDatabase.php");
		?>
<form id="form1" name="form1" method="post" action="examen.php">

<fieldset>
  
   
 <legend>EXAMEN</legend>
  

<pre>

Identifiant:<label><input type="text" name="idExam" id="idExam" /></label>
 
Libelle-examen:<label><input type="text" name="libExam" id="libExam" /></label>  Option:<label><input type="text" name="option" id="option" /></label>
Session:<label><input type="text" name="session" id="session" />
</label> Centre:
<label>
<?php	
		$db= new DB;
		$lien=$db->connexion();
		$exe=$db->executeSQL("select * from centre",$lien);
		echo"<select name=\"id\">";
		while($l=$db->Nlignes($exe))
		{
		echo"<option value=".$l['idcentre'].">".$l['nomCentre']."</option>";
		}
		echo"</select>";
		?></label>

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
$db->executeSQL("insert into examen values('$idExam','$libExam','$option','$session','$id')",$lien);
echo"Insertion reussie";

}
?>
<?php include("fin.php");?>

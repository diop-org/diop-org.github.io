
<?php include("debut.php");?>
<?php
include("classDatabase.php");
		?>
<form id="form1" name="form1" method="post" action="composer.php">

<fieldset>
  
   
<legend> Composer</legend>
  

<pre>

Identifiant-Exam:<label><?php	
		$db= new DB;
		$lien=$db->connexion();
		$exe=$db->executeSQL("select * from examen",$lien);
		echo"<select name=\"idExam\">";
		while($l=$db->Nlignes($exe))
		{
		echo"<option value=".$l['idExam'].">".$l['idExam']."</option>";
		}
		echo"</select>";
		?></label>
        
Identifiant-Candidat:<label><?php	
		$db= new DB;
		$lien=$db->connexion();
		$exe=$db->executeSQL("select * from candidat",$lien);
		echo"<select name=\"idCandidat\">";
		while($l=$db->Nlignes($exe))
		{
		echo"<option value=".$l['idCandidat'].">".$l['idCandidat']."</option>";
		}
		echo"</select>";
		?></label>

Note:<label><input type="text" name="note" id="note" /></label>Appreciation:<label><input type="text" name="appreciation" id="appreciation" />
</label>
 
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
$db->executeSQL("insert into composer values('$idExam','$idCandidat','$note','$appreciation')",$lien);
echo"Insertion reussie";

}
?>
<?php include("fin.php");?>

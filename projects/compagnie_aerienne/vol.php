<?php
include("classDatabase.php");
		?>
<form id="form1" name="form1" method="post" action="">

<fieldset>
  
   
 <legend>VOL</legend>
  

<pre>
Pilote:<label><?php	
		$db= new DB;
		$lien=$db->connexion();
		$exe=$db->executeSQL("select * from pilote",$lien);
		echo"<select name=\"matricule\">";
		while($l=$db->Nlignes($exe))
		{
		echo"<option value=".$l['matricule'].">".$l['nom']."</option>";
		}
		echo"</select>";
		?></label>
 
Avion:<label><?php	
		$db= new DB;
		$lien=$db->connexion();
		$exe=$db->executeSQL("select * from avion",$lien);
		echo"<select name=\"id\">";
		while($l=$db->Nlignes($exe))
		{
		echo"<option value=".$l['idAvion'].">".$l['idAvion']."</option>";
		}
		echo"</select>";
		?></label>
 
Date_Vol:<label><input type="text" name="datevol" id="datevol" /></label>  Destination:<label><input type="text" name="destination" id="destination" /></label>


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
$db->executeSQL("insert into vol_utiliser values('$matricule','$id','$datevol','$destination')",$lien);
echo"Insertion reussie";

}
?>

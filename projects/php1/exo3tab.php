<html>
<body>
<form action="exo2tab.php" method="post">
<label>Entrer le nom de la personne : </label><input type="text" name="h"><br>
<label>Entrer le prenom de la personne : </label><input type="text" name="h"><br>
<label>Entrer l'age de la personne : </label><input type="text" name="h"><br>
<label>Entrer le sexe de la personne : </label><input type="text" name="h"><br>
<label>Entrer l'adresse de la personne : </label><input type="text" name="h"><br>
<label>Entrer le plat préféré de la personne : </label><input type="text" name="h"><br>
<input type="submit" name="ok" value="Valider">
</form>
</body>
</html>
<?php
if(isset($_POST["ok"]))
{
$om=$_POST['ph'];
$prenom=$_POST['ph'];
$age=$_POST['ph'];
$sexe=$_POST['ph'];
$adresse=$_POST['ph'];
$plat=$_POST['ph'];
$tab=array("nom"=>$nom ;"prenom"=>$prenom ;"age"=>$age ;"sexe"=>$sexe ;"adresse"=>$adresse ;"plat"=>$plat );

}
echo "</pre>";
?>
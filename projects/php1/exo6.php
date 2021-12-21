<html>
<body>
<form action="exo6.php" method="post">
<label>Donner le Montant :</label><input tupe="text" name="PU"><br>
<label>Donner la Quantité :</label><input tupe="text" name="Qte"><br>
<input type="submit" value="Calculer" name="ok">
</html>
</body>
</form>
<?php
if(isset($_POST['ok']))
{
$x=$_POST['PU'];
$y=$_POST['Qte'];
echo"Le montant de la commande est : ".($x*$y)."<br>";
echo"La remise est : ".(($x*$y)*0.05)."<br>";
echo"Frait de port : ".(($x*$y)*0.02)."<br>";
echo"Net : ".(($x*$y)+(($x*$y)*0.02)-(($x*$y)*0.05));
}
?>
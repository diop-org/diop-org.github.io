<html>
<body>
<form action="Mituel2.php" method="post">
<label>Saisissez le montant</label><input type="text" name="MT"><br>
<input type="submit" value="Calculer" name="ok">
</form>
</body>
</html>
<?php
if(isset($_POST['ok']))
{
$x=$_POST['MT'];
$secu=($x-1)*0.7;
if ($secu >= 105)
$secu=105;
$mut=$x-$secu-1;
if ($mut > ($secu*3.5))
$mut=$secu*3.5;
$mont=$x-$secu-$mut;
echo"La sécurité sociale vous rembourse ".$secu."<br>";
echo"La mutuelle vous rembourse ".$mut."<br>";
echo"Vous payez ".$mont;
}
?>
<html>
<body>
<form action="tarif.php" method="post">
<label>Donner la quantité :</label><input type="text" name="qt"><br>
<input type="submit" value="Calculer" name="ok">
</html>
</body>
</form>
<?php
if(isset($_POST['ok']))
{
$x=$_POST['qt'];
if ($x <= 10)
echo"Le montant total est : ".($x*150)."€";
else
if (($x > 10) && ($x <= 40))
echo"Le montant total est : ".($x*135)."€";
else
echo"Le montant total est : ".($x*110)."€";
}
?>

<html>
<body>
<form action="perimetr.php" method="post">
<label>Donner le rayon :</label><input type="text" name="ray"><br>
<input type="submit" value="Calculer" name="ok">
</html>
</body>
</form>
<?php
if(isset($_POST['ok']))
{
$x=$_POST['ray'];
define("pi",3.14);
$p=2*pi*$x;
echo"Le périmètre est : ".$p;
}
?>

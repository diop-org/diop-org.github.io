<html>
<body>
<form action="triangle.php" method="post">
<label>Donner la hauteur du triangle : </label><input type="text" name="h"><br>
<input type="submit" name="ok" value="Valider">
</form>
</body>
</html>
<?php
include("entete.inc.php");
if(isset($_POST["ok"]))
{
$x=$_POST['h'];
for($i=1;$i<=$x;$i++)
{
for($y=1;$y<=$i;$y++)
{
echo"*";
}
echo"<br>";
}
}
include("piedpage.inc.php");
?>

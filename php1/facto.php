<html>
<body>
<form action="facto.php" method="post">
<label>Donner un nombre </label><input type="text" name="nb"><br>
<input type="submit" value="Calculer" name="ok">
</form>
</body>
</html>
<?php
include("entete.inc.php");
if(isset($_POST["ok"]))
{
$x=$_POST['nb'];
echo "Le factoriel de 0 est 1<br>";
for($i=1;$i<=$x;$i++)
{
$f=1;
for($j=1;$j<=$i;$j++)
{
$f=$f*$j;
}
echo "Le factoriel de ".$i." est ".$f."<br>";
}
}
include("piedpage.inc.php");
?>
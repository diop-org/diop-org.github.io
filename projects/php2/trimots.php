<html>
<body>
<form action="trimots.php" method="post">
<label>Donner un mot</label><input type="text" name="mot1"><br>
<label>Donner un mot</label><input type="text" name="mot2"><br>
<label>Donner un mot</label><input type="text" name="mot3"><br>
<input type="submit" value="Trier" name="ok">
</form>
</body>
</html>
<?php
if (isset($_POST['ok']))
{
$x=$_POST['mot1'];
$y=$_POST['mot2'];
$z=$_POST['mot3'];
if (($x <= $y ) && ($x <= $z))
{echo $x."<br>";
if ($x <= $z)
echo $y." ".$z;
else
echo $z." ".$y;
}
else
if ($y <= $z)
{
echo $y."<br>";
if ($x <= $z)
echo $x." ".$z;
else
echo $z." ".$x;
}
else
{
echo $z."<br>";
if ($x <= $y)
echo $x." ".$y;
else
echo $y." ".$x;
}
}
?>
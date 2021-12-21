<html>
<body>
<form action"enonce1.php" method="post">
Saissez les vals et virgule entre eux<input type="text" name="val"><br>
<input type="submit" value="somme" name="valid">
</form>
<?php
if(isset($_POST['valid']))
{
$x=$_POST['val'];
$som=0;
$y=explode(",",$x);
for($i=0;$i<count($y);$i++)
{$som=$som+$y[$i];}
echo "la somme est ".$som;
}
?>
</body></html>

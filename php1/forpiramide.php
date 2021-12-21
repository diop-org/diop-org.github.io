<html>
<body>
<form action="forpiramide.php" method="post">
<label>Donner la hauteur de la ligne : </label><input type="text" name="h"><br>
<input type="submit" name="ok" value="Valider">
</form>
</body>
</html>
<?php
include("entete.inc.php");
echo"<pre>";
if(isset($_POST["ok"]))
{
$x=$_POST['h'];
for($i=1;$i<=$x;$i++)
{
for($y=$x;$y>$i;$y--)
{
echo" ";
}
for($k=1;$k<=(2*$i-1);$k++)
{
echo"*";
}
echo"<br>";
}
}
echo"<pre>";
include("piedpage.inc.php");
?>

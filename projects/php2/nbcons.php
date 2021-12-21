<html>
<body>
<form action="nbcons.php" method="post">
<label>Saisissez uune phrase </label><input type="text" name="ph"><br>
<input type="submit" value="Calculer" name="ok">
</form>
</body>
</html>
<?php
include("entete.inc.php");
if(isset($_POST["ok"]))
{
$x=$_POST['ph'];
$y=strlen($x);
$cpcons=0;
$cpvoy=0;
for($i=0;$i<=$y;$i++)
{
if ((substr($x,$i,1) == "a") || (substr($x,$i,1) == "o") || (substr($x,$i,1) == "i") || (substr($x,$i,1) == "u") || (substr($x,$i,1) == "y") || (substr($x,$i,1) == "e") || 
(substr($x,$i,1) == "E") || (substr($x,$i,1) == "A") || (substr($x,$i,1) == "O") || (substr($x,$i,1) == "I") || (substr($x,$i,1) == "U") || (substr($x,$i,1) == "Y"))
{
$cpvoy=$cpvoy+1;
}
else
if ((substr($x,$i,1) != " ") && (substr($x,$i,1) != ".") && (substr($x,$i,1) != ",") && (substr($x,$i,1) != ";") && (substr($x,$i,1) != "!") && (substr($x,$i,1) != "?") && 
(substr($x,$i,1) != "'")) 
{
$cpcons=$cpcons+1;
}

}
echo "Le nombre de consonne est ".$cpcons."<br>";
echo "Le nombre de voyelle est ".$cpvoy."<br>";
}
include("piedpage.inc.php");
?>
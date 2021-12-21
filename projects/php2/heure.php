<html>
<body>
<form action="heure.php" method="post">
<label>Saisissez l'heure : </label><input type="text" name="H"><br>
<label>Saisissez la minute :</label><input type="text" name="M"><br>
<label>Saisissez la seconde :</label><input type="text" name="S"><br>
<input type="submit" value="Calculer" name="ok">
</form>
</body>
</html>
<?php
if(isset($_POST['ok']))
{
$H=$_POST['H'];
$M=$_POST['M'];
$S=$_POST['S'];
$S=$S+1;
if ($S == 60)
{
$S=0;
$M=$M+1;
} 
if ($H == 60)
{
$M=0;
$H=$H+1;
}
if ($H == 24)
{
$H=0;
}
echo "L'heure aprés une seconde est : ".$H."H".$M."mn".$S."s";
}
?>
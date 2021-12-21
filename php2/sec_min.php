<html>
<body>
<form action="sec_min.php" method="post">
<label>Donner le temps en second :</label><input tupe="text" name="ts"><br>
<input type="submit" value="Calculer" name="ok">
</html>
</body>
</form>
<?php
if(isset($_POST['ok']))
{
$x=$_POST['ts'];
$h=floor($x/3600);
$r=$x%3600;
$m=floor($r/60);
$s=$r%60;
echo"L'heure est : ".$h."H".$m."mn".$s."sec";
}
?>
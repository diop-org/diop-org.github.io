<html>
<body>
<form action="exo3.php" method="post">
<label>DONNER LE MAXIMUM:</label><input type="text" name="max"><br>
<label>DONNER LE MINIMUM :</label><input type="text" name="min"><br>
<input type="submit" name="ok" value="executer">
</form>
</body>
</html>
<?php
if(isset($_POST['ok']))
{
$min=$_POST['min'];
$max=$_POST['max'];
if($max<$min)
{
echo "ATTENTION!!!!Le maximum doit toujours etre superieur au minimum";
}
else
{
  for($i=$max;$i>=$min;$i--)
  {
    echo $i."<br>";
    }    
}
}
?>




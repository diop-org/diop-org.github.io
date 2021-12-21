<html>
<body>
<form action"exo1.php" method="post">
Saissez les valeurs du tableau <input type="text" name="t"><br>
<input type="submit" value="save" name="ok">
</form>
</body>
</html>
<?php
if(isset($_POST['ok']))
{
$x=$_POST['t'];
$tab=explode(",",$x);
function positifnegatif($tab)
{
$cptp=0;
$cptn=0;
for($i=0;$i<count($tab);$i++)
{
if($tab[$i]>0)
{
$cptp=$cptp+1;
}
echo "1";
else
{
if($tab[$i]<0)
{$cptn=$cptn+1;
}
else
{$cpt=$cpt+1;
}
}



}
positifnegatif($tab);

}

?>
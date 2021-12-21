<html>
<body>
<form action"enonce3.php" method="post">
Saissez les vals du premier tableau<input type="text" name="t1"><br>
Saissez les vals du premier tableau<input type="text" name="t2"><br>
<input type="submit" value="save" name="valid">
</form>
</body></html>
<?php
if(isset($_POST['valid']))
{
$x=$_POST['t1'];
$y=$_POST['t2'];
$tab1=explode(",",$x);
$tab2=explode(",",$y);
if ((count($tab1))!=(count($tab2)))
{
echo "differents";
}
else
{
$trouv=0;
$i=0;
$j=0;
while(($i<count($tab1))&&($j<count($tab2))&&($trouv=0))
{
if($tab1[$i]!= $tab2[$j])
{
$trouv==1;}
$i++;
$j++;
}
if($trouv==0)
{echo "les 2 tableaux sont identiques";}
else
echo "les tab sont differents";
}
}
?>
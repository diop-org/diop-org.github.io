<?php
echo "<pre>";
$note=array(12,13,8,9,12,15,4,20,7);
$note[10]=11;
$x=count($note);
for($i=0;$i<$x;$i++)
{
$tamp=$note[$i];
echo $tamp."\t";
}
echo"<br>";
sort($note);
for($i=0;$i<$x;$i++)
{
$tamp=$note[$i];
echo $tamp."\t";
}
echo "</pre>";
?>
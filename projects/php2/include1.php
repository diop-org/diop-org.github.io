<?php
include("entete.inc.php");
$i=1;
while($i<=100)
{
if (($i%10) == 0)
echo"|<br>";
echo"|".$i;
$i++;
}
include("piedpage.inc.php");
?>
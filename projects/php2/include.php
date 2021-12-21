<?php
include("entete.inc.php");
for($i=1;$i<=100;$i++)
{
if (($i%10) == 0)
echo"|<br>";
echo"|".$i;
}
include("piedpage.inc.php");
?>
<?php
$h=$_POST['x'];
if ($h > 6)
{echo "Erreur!La hauteur ne doit pas depasser 6";}
else
{echo"<pre>";
if ($h > 0) echo"     *\n";
if ($h > 1) echo"    ***\n";
if ($h > 2) echo"   *****\n";
if ($h > 3) echo"  *******\n";
if ($h > 4) echo" *********\n";
if ($h > 5) echo"***********\n";
echo"</pre>";}
?>
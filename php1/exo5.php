<?php
$x=$_POST['MT'];
$secu=($x-1)*0.7;
$mut=($x-1)*0.3;
$mont=$x-$secu-$mut;
echo"La sécurité sociale vous rembourse ".$secu."<br";
echo"La mutuelle vous rembourse ".$mut."<br";
echo"Vous payez ".$mont;
?>
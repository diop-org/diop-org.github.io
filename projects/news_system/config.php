<?php
$serveur="localhost";
$utilisateur="root";
$pass="";
$base="news";
mysql_connect($serveur,$utilisateur,$pass) ;
mysql_select_db($base) or die ("Could not select database");
?> 



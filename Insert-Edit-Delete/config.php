<?php

/* Database Connection */

$serveur="localhost";
$utilisateur="root";
$pass="";
$base="employee";

mysql_connect($serveur,$utilisateur,$pass)or die ('MySQL connect failed. ' . mysql_error());
mysql_select_db($base) or die('Cannot select database. ' . mysql_error());

?>
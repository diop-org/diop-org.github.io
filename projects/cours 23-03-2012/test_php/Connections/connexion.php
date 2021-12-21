<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_connexion = "localhost";
$database_connexion = "multimedia";
$username_connexion = "root";
$password_connexion = "";
$connexion = mysql_pconnect($hostname_connexion, $username_connexion, $password_connexion) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
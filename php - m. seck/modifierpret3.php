<?php
require("connection/connexion.php");
extract($_POST);
$req="update pret set designpret='$designpret' where idpret='$idpret'";
$exe=mysql_query($req);
if($exe)
include("modifierpret1.php");
?>
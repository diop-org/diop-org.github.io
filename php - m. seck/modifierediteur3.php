<?php
require("connection/connexion.php");
extract($_POST);
$req="update editeu set nome='$nome',adres='$adres',tel='$tel' where cde='$cde'";
$exe=mysql_query($req);
if($exe)
include("modifierediteur1.php");
?>
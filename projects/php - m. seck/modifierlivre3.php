<?php
require("connection/connexion.php");
extract($_POST);
$req="update livre set titre='$titre',nbrepag='$nbrepag',idc='$idc',numaut='$numaut',cde='$cde' where ISBN='$ISBN'";
$exe=mysql_query($req);
if($exe)
include("modifierlivre1.php");
?>
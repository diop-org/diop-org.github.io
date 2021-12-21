<?php
require("connection/connexion.php");
extract($_POST);
$req="update categorie set libc='$libc' where idc='$idc'";
$exe=mysql_query($req);
if($exe)
include("modifiercategorie1.php");
?>
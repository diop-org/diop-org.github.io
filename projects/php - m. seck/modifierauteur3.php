<?php
require("connection/connexion.php");
extract($_POST);
$req="update auteur set nomaut='$nomaut',prenomaut='$prenomaut',adresseaut='$adresseaut' where numaut='$numaut'";
$exe=mysql_query($req);
if($exe)
include("modifierauteur1.php");
?>
<?php
include("classdatabase.php");
extract($_POST);
$db = new DB ;
$lien=$db->Connexion();
$db->ExecuteSQL("insert into avion values('$idav','$noav','$nbp','$comp')",$lien);
echo "AVION bien ajout�e !!!";
include("form_compagnie.php");
?>
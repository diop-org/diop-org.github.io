<?php
include("classdatabase.php");
extract($_POST);
$db = new DB ;
$lien=$db->Connexion();
$db->ExecuteSQL("insert into compagnie values('$idcomp','$nocomp','$adrcomp','$chaf')",$lien);
echo "Commpagnie bien ajoutée !!!";
include("form_compagnie.php");
?>
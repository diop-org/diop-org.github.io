
<?php
include("connect.php");
extract($_POST);
$req="insert into classe values('$idclasse','$nomclasse')";
$exe=mysql_query($req);
if($exe)
{echo"Classe enregistree avec succes!!!!";
include("classe.php");
}
else
{echo"Erreur de codage";
}
?>

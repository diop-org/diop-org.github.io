<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
</head>

<body>
<?php
include("connex.php");
extract($_POST);
$req="insert into client values('$numcli','$nomcli','$prencli','$adrcli','$sexe','$telcli','$modepaiment')";
$exe=mysql_query($req);
if($exe)
{
	echo"client enregistré avec succes";
	include("client.php");
}
else
{ 
	echo"ereur de codage";
}
?>
</body>
</html>

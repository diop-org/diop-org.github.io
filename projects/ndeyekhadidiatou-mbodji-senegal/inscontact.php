<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>
<?php
include("connect.php");
extract($_POST);
$req="insert into contacts values('$nom','$prenom','$email','$message')";
$exe=mysql_query($req);
if($exe)
{echo"contact enregistree avec succes!!!!";
include("contacts.php");
}
else
{echo"Erreur de codage";
}
?>
</body>
</html>
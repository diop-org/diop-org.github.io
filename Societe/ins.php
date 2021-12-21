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
if($pwd==$rpwd)
{
	if(strlen($pwd)>6)
	{
		$req="insert into user values('','$no','$pnom','utilisateur','$log','$pwd')";
		$exe=mysql_query($req);
		if($exe)
		{
			echo"Inscription reussie";
			include("administration.php");
		}
		else
		{
			echo"Error";
			include("form_inscription.php");
		}
	}
	else
	{
		echo"Vous devez depasser 6 caracteres";
		include("form_inscription.php");
    }
}
else
{
	echo"Retaper le Password";
	include"form_inscription.php";
	}
	?>
</body>
</html>
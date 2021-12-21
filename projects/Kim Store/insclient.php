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
if($passwd==$passwd1)
{
	if(strlen($passwd)>6)
	{
	$req="insert into client values ('','$nomclient','$pnomclient','$sexe','$adrclient','$telclient','$login','$modepaiement','$passwd','utilisateur')";
		$exe=mysql_query($req);
		if($exe)
		{echo "Inscription reussie";
		include("administration.PHP");
		}
		else
		{echo "Error";
		include("client.php");
		}
	}
		else
		{echo "Le mot de passe doit depasser 6 caracteres";
		include("client.php");
		}
	}
		else
		{echo "Retaper le password";
		include("client.php");
		}
		?>


			

</body>
</html>
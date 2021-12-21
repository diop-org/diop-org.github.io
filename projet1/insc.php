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
		$req="insert into inscription values('','$nom','$prenom','utilisateur','$login','$Mp')";
		$exe=mysql_query($req);
		if($exe)
		{echo "Inscription reussie";
		include("administrateur.PHP");
		}
		else
		{echo "Error";
		include("sinscrire.php");
		}
	}
		else
		{echo "Le mot de passe doit depasser 6 caracteres";
		include("sinscrire.php");
		}
	}
		else
		{echo "Retaper le password";
		include("sinscrire.php");
		}
		?>
</body>
</html>
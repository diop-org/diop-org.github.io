<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>
                      <?php 
  if (isset($_GET["Titre"])){
   $Titre =  $_GET["Titre"];
			 switch ($Titre){
				case 1: 
					$page="Welcome";
				break;	
                }
				}else{
					$page="" ;
	  }
  
   echo $page;?>

<body>
</body>
</html>
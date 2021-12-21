<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>
<?php
include("connect.php");
$r=$_POST['search'];
$req="select * from employe where nom like'%$r%' AND prenom like'%$r%'";
$exe=mysql_query($req);
echo"<table>
<tr>
<td> Matricule </td>
<td> Nom </td>
<td> Prémon </td>
</tr>";
while($l=mysql_fetch_row($exe))
{
	echo"<tr>
	<td> ".$l[0]."</td>
	<td> ".$l[1]."</td>
	<td> ".$l[2]."</td>
	</tr>";
}
echo"</table>";
?>
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans nom</title>
<link href="file:Societe/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="contener">
  <div id="header"></div>
  <div id="header_1">
    <div id="header_1_1"></div>
    <div id="header_1_2"><form action="rechercher.php" method="post">
<input type="text" name="search" />
<input type="submit" value="Recherche" />
</form><br class="clear" />

 </div>
  </div>
  <div id="menu">
    <div id="acc"></div>
    <div id="prod"></div>
    <div id="Pa"></div>
    <div id="cont"></div>
    <div id="Admin"></div>
    <br class="clear" />
</div>
  <div id="middle">
    <div id="middle_1">
      <div id="middle_1_1"></div>
      <div id="middle_1_2"></div>
    </div>
    <div id="middle_2"><?php
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
?></div>
    <br class="clear" />
</div>
  <div id="footer">Placez ici le contenu de  id "footer"</div>
Placez ici le contenu de  id "contener"
<br class="clear" />
</div>
</body>
</html>


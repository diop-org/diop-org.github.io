<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
<link href="style/style_css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
include("Database.php");

$db=new Database;
$lien=$db->connexion();
$req="select * from rayon";
$exe=$db->ExecuteSQL($req,$lien);

echo "<table border=\"1\" align=\"center\">
<tr bgcolor= \"gray\">
<td> IDENTIFIANT </td> <td> CATEGORIE </td> 
</tr>";

while ($l=$db->Fetchligne($exe))
{
echo"
<tr>
<td>".$l['idrayon']."</td>
<td>".$l['categorie']."</td>
</tr>";

}
echo "</table>";

echo "RETOURNER A L'ENREGISTREMENT <pre>          </pre>  <a href=\"rayon.php\"> RETOUR A L'INSERTION <a>";
?>
</body>
</html>
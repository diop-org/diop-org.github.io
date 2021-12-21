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
$req="select * from ordinateur";
$exe=$db->ExecuteSQL($req,$lien);

echo "<table border=\"1\" align=\"center\">
<tr bgcolor= \"gray\">
<td>numOrdinateur </td> <td> numSalle </td> <td> Marque </td> <td>Type</td> 
</tr>";

while ($l=$db->Fetchligne($exe))
{
echo"
<tr>
<td>".$l['numOrdinateur']."</td>
<td>".$l['numSalle']."</td>
<td>".$l['marque']."</td>
<td>".$l['type']."</td>
</tr>";

}
echo "</table>";

echo "RETOURNER A L'ENREGISTREMENT <pre>          </pre>  <a href=\"ordinateur.php\"> RETOUR A L'INSERTION <a>";
?>
</body>
</html>
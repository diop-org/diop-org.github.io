<?php
include("classDatabase.php");
$db=new DB;
$lien=$db->connexion();
echo"<table border=1>
<tr bgcolor=\"red\">
<td>idAuteur</td>
<td>nomAuteur</td>
<td> prAuteur</td>
<td>email</td>
</tr>";
$exe=$db->ExecuteSQL("select *from auteur",$lien);
while($l=$db->FetchLigne($exe))
{
echo "<tr>
<td>".$l['idauteur']."</td>
<td>".$l['noauteur']."</td>
<td>".$l['prauteur']."</td>
<td>".$l['email']."</td>
</tr>";
}
echo"</table>";
?>

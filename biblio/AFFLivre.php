<?php
include("classDatabase.php");
$db=new DB;
$lien=$db->connexion();
echo"<table border=1>
<tr bgcolor=\"red\" >
<td>idLivre</td>
<td>nomLivre</td>
<td>nbpages</td>
<td>couleur</td>
<td>idauteur</td>
</tr>";
$exe=$db->ExecuteSQL("select *from livre",$lien);
while($l=$db->FetchLigne($exe))
{
echo "<tr>
<td>".$l['idLivre']."</td>
<td>".$l['nomLivre']."</td>
<td>".$l['nbpages']."</td>
<td>".$l['couleur']."</td>  
<td>".$l['idauteur']."</td>
</tr>";
}
echo"</table>";
?>

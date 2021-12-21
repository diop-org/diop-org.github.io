<html>
<body >
<table border="1" bgcolor="pink">
<tr>
<td></td>
<td>Dakar</td>
<td>Thies</td>
<td>LOUGA</td>
<td>St-louis</td>
</tr>
<?php
$ville[]=array(""=>"DAKAR ","DAKAR"=>0,"THIES"=>381,"LOUGA"=>564,"St-louis"=>517);
$ville[]=array(""=>"Thies ","DAKAR"=>381,"THIES"=>0,"LOUGA"=>865,"St-louis"=>728);
$ville[]=array(""=>"Louga","DAKAR"=>564,"THIES"=>865,"LOUGA"=>0,"St-louis"=>504);
$ville[]=array(""=>"St-louis","DAKAR"=>517,"THIES"=>728,"LOUGA"=>504,"St-louis"=>0);
foreach($ville as $villes)
{
?>
<tr>
<?php
foreach($villes as $distances)
{
?>
<td>
<?php
echo $distances;
?>
</td>
<?php
}
?>
</tr>
<?php
}
?>
</table>
</body>
</html>
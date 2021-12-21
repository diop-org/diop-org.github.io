<html>
<body>
<table>
<tr>
<td>Fonction</td>
<td>Nom</td>
<td>Prenom</td>
<td>Age</td>
</tr>
<?php
$personnel[]=array("fonction"=>"Agent de maitrise","nom"=>"Dupont","prenom"=>"Jean","age"=>54);
$personnel[]=array("fonction"=>"Technitien","nom"=>"Durand","prenom"=>"Paul","age"=>"");
$personnel[]=array("fonction"=>"Chef de projet","nom"=>"Hanassi","prenom"=>"","age"=>27);
foreach($personnel as $personne)
{
?>
<tr>
<?php
foreach($personne as $info)
{
?>
<td>
<?php
echo $info;
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
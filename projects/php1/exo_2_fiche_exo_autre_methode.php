<?php
$personnel[]=array("fonction"=>"Agent de maitrise","nom"=>"Dupont","prenom"=>"Jean","age"=>54);
$personnel[]=array("fonction"=>"Technitien","nom"=>"Durand","prenom"=>"Paul","age"=>"");
$personnel[]=array("fonction"=>"Chef de projet","nom"=>"Hanassi","prenom"=>"","age"=>27);
echo"<table>
<tr>
<td>Fonction</td>
<td>Nom</td>
<td>Prenom</td>
<td>Age</td>
</tr>";
foreach($personnel as $personne)
  {
	  echo"<tr>";
	  foreach($personne as $info)
	     {
			 echo"<td>";
			 echo $info;
			 echo"</td>";
		 }
		 echo"</tr>";
  }
  echo"</table>";
?>
		 

<?php
include("entete.inc.php");
$ville[]=array(""=>"DAKAR ","DAKAR"=>0,"THIES"=>381,"LOUGA"=>564,"St-louis"=>517);
$ville[]=array(""=>"Thies ","DAKAR"=>381,"THIES"=>0,"LOUGA"=>865,"St-louis"=>728);
$ville[]=array(""=>"Louga ","DAKAR"=>564,"THIES"=>865,"LOUGA"=>0,"St-louis"=>504);
$ville[]=array(""=>"St-louis","DAKAR"=>517,"THIES"=>728,"LOUGA"=>504,"St-louis"=>0);
echo"<table>
<tr>
<td></td>
<td>Dakar</td>
<td>Thies</td>
<td>LOUGA</td>
<td>St-louis</td>
</tr>";
foreach($ville as $villes)
  {
	  echo"<tr>";
	  foreach($villes as $distances)
	     {
			 echo"<td>";
			 echo $distances;
			 echo"</td>";
		 }
		 echo"</tr>";
  }
  echo"</table>";
include("piedpage.inc.php");
?>
		 

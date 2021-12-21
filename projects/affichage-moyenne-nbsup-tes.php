<?php
function affiche($x)
{for($i=0;$i<count($x);$i++)
{echo $x[$i]."/";
}}
function moyenne($x)
{for($i=0;$i<count($x);$i++)
{$som=0; $note=0;
$som=$som+$x[$i];}
$moy=$som/count($x);
echo "la moyenne est :".$moy;
}
function nbsup10($x)
{$cpt=0;
for($i=0;$i<$count;$i++)
{if($x[$i]>=10)
{echo $x[$i]."/";
$cpt=$cpt+1;
}
echo $cpt;
}
function test20($x)
{$trouv=1; $i=0;
while((i<count($x)&&($trouv==0))
{$trouv=1; 
echo "20 existe";
else
echo"20 nexiste pas";
}}
function meilleur($x)
{for($i=0;$i<count($x);$i++)
{if ($i==0)
{$mn=$x[$i];}
else
{if ($mn<$x[$i])
$mn=$x[$i];
}}
return ($mn);
}
tab =array ( 8,10,54,-5,7,8,17,2,7,16);
affiche ($tab);
moyennne ($tab);
nbsup10 ($tab);
test20 ($tab);
$meilleur=meilleur($tab);
echo $meilleur;
?>


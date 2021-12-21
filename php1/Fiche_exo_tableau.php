<?php
function affiche($tab)
{
  for ($i=0;$i<count($tab);$i++)
    {
       echo "[".$tab[$i]."]";
    }
 }
function moyenne($tab)
 {
   $som=0; 
    
       for ($i=0;$i<count($tab);$i++)
          {
             $som=$som+$tab[$i];
           }
      
  
 $moy=$som/count($tab);
 echo "La moyenne est".$moy;
}
function nbresup($tab)
 {
   $tamp=0;
  for($i=0;$i<count($tab);$i++)
    {
       if ($tab[$i]>=10)
           {
              echo "[".$tab[$i]."]";
              $tamp=$tamp+1;
            }
		}
        echo "Le nombre d'élément sup à 10 est".$tamp;
     }
  function test20($tab)
       {
          $trouve=0; $i=0;
            while(($i<count($tab))&&($trouve==0))
             { 
                if ($tab[$i]==20)
                  $trouve=1;
                  else
                    $i++;
             }
             return($trouve);
        }
  function meilleur_note($tab)
   {
     for($i=0;$i<count($tab);$i++)
        {
          if($i==0)
             { 
               $mnote=$tab[$i];
             }
               else
               {
                  if($mnote<$tab[$i])
                  $mnote=$tab[$i];
               }
         }
      return($mnote);
    }
  $tableau=array(10,15,5,2,20,30,0,4,8);
  affiche($tableau);
echo "<br>";
 moyenne($tableau);
echo "<br>";
 nbresup($tableau);
echo "<br>";
 $test=test20($tableau);
 if($test==0)
echo "La valeur 20 est n'existe pas";
else
echo "La valeur 20 est retrouvé";
echo "<br>";
$meilleur=meilleur_note($tableau);
echo "La meilleur note est:".$meilleur;            
?>

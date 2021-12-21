<html>
<body>
<form action="premier.php" method="post">
Saissez le nombre<input type="text" name="nb"><br>
<input type="submit" value="Valider" name="ok">
</form>
</body></html>
<?php
if(isset($_POST['ok']))
{
$x=$_POST['nb'];
function Premier($x)
  {
  $cpt=0;
   for($i=1;$i<=$x;$i++)
    {
     if(($x % $i) == 0)
     {
      $cpt=$cpt+1;
     }
    }
  if($cpt==2)
  {
  echo"Le nombre est premier";
  }
  else
   {
   echo"Le nombre n'est pas premier";
   }
}
Premier($x);
}
?> 

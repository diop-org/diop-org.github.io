<?php
function dynamique_premiere()
{
	$tab=array();
	$N=func_num_args();
	for($i=0;$i<$N;$i++)
	{
		$tab[$i]=func_get_arg($i);
	}
	
	for($i=0;$i<$N;$i++)
	    {
		$k=0;
			for($j=1;$j<=$tab[$i];$j++)
			{
				if(($tab[$i] % $j)==0)
				$k=$k+1;
			}
			if($k==2)
			echo $tab[$i]."<br>";
		}
}
dynamique_premiere(15,20,1,3,4,6,9,2);
?>

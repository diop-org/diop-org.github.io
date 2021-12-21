<html >
<head>
<title>tableau</title>
</head>
<body>
<form name="form" method="POST" action="tritab+pair.php">
<label> Donnez les entiers </label>
<input type="text" name="not" />
<input type="submit" name="OK" value="Valider" />
</form>
</body>
</html>
<?php
if (isset ($_POST['OK']))
{
$rec = $_POST ['not'];
$x=explode(",",$rec);
function somme_trie ($x)
    {
      $s=0;
	  sort($x);
      for ($i=0; $i<count($x); $i++)
        {
           echo" $x[$i]."; ";
          if($x[$i]%2==0)
		  {
			  $s=$s+$x[$i];
		  }
         }
	echo "<br>";
		 echo" La somme est " .$s;
	}
	somme_trie($x);
}
?>

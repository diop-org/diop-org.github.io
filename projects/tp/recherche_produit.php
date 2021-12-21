<?php
	include("connection/connexion.php");
	$x=$_POST['zone'];
	$req="select *from produit where code='$x'";
	$exe=mysql_query($req);
	echo "<table border=1>
		<tr>
			<td>Code du Produit</td>
			<td>Designation du Produit</td>
			<td>Prix Unitaire du Produit</td>
			<td>Quantite du Produit</td>
		</tr>";
		while($l=mysql_fetch_array($exe))
			{
				echo"<tr>
					<td>".$l['codeprod']."</td>
					<td>".$l['desprod']."</td>
					<td>".$l['puprod']."</td>
					<td>".$l['qteprod']."</td>
					</tr>";
			}
			echo"</table>";
?>
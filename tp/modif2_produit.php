<html>
	<head>
    	<title>Modif 2 Produit</title>
    </head>
<body>
	<?php
	include("connection/connexion.php);
	//recuperation de la variable d'URL,
	//qui va nous permettre de savoir quel enregistrement modidifer
	$id=$_GET['codeprod'];
	
	//requete SQL:
	$sql="SELECT * FROM produit WHERE codeprod=".$id;
	
	//execution de la requete:
	$requete=mysql_query($sql);
	
	//affichage des donnees:
	if($result=mysql_fetch_array($requete))
	{
		?>
		<form name="insertion" action="file:modif3_produit.php" method="post">
        <input type="hidden" name="codeprod" value="<?php echo $id ;?>">
        <table border="0" align="center" cellspacing="2" cellpadding="2">
        <tr align="center">
        	<td>Code du Produit:</td>
            <td><input type="text" name="codeprod" value="<?php echo $result['codeprod'];?>"></td>
			</tr>
			<tr align="center">
        	<td>Designation du Produit:</td>
            <td><input type="text" name="desprod" value="<?php echo $result['desprod'];?>"></td>
			</tr>
            <tr align="center">
        	<td>Prix Unitaire du Produit:</td>
            <td><input type="text" name="puprod" value="<?php echo $result['puprod'] ;?>"></td>
			</tr>
			<tr align="center">
        	<td>Quantite Produit:</td>
            <td><input type="text" name="qteprod" value="<?php echo $result['qteprod'] ;?>"></td>
			</tr>
			<tr align="center">
			<td colspan="2"><input type="submit" value="modifier"></td>
			</tr>
			</table>
			</form>
			<?php
	}//fin if
	?>
	</body>
      </html>
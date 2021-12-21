<html>
<body>
<form action="age1.php" method="post">
<label>Donner vootre année de naissance</label><input type="text" name="an"><br>
<input type="submit" value="Calculer" name="ok">
</form>
</body>
</html>
<?php
if (isset($_POST['ok']))
{
$cours=date("Y");
$annee=$_POST['an'];
$age=$cours-$annee;
if (($age < 1 ) && ($age > 130))
echo"La valeur n'est pas correcte";
else
echo "Vous avez : ".$age."ans";
}
?>
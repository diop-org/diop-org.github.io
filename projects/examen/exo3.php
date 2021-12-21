<html>
<body>
<form action="exo3.php" method="post">
<label>NOM :</label><input type="text" name="nm"><br>
<label>PRENOM :</label><input type="text" name="pn"><br>
<label>DATE DE NAISSANCE :</label><input type="text" name="dat"><br>



<input type="submit" name="ok" value="Envoyer">

</form>
</body>
</html>
<?php
if(isset($_POST['ok']))
{
$n=$_POST['nm'];
$p=$_POST['pn'];
$d=$_POST['dat'];
$aujourdui=date("Y");
$age=$aujourdui-$d;
if(($age>1)&&($age<120))
{
echo "Bonjour".$n."<br>";
echo "Vous etes ne en ".$d."<br>";
echo "Nous sommes en ".$aujourdui."<br>";
echo "Vous avez donc ".$age."ans<br>";
}
else
{
echo "Bonjour :".$n.$p."<br>";
echo "Vous etes ne en ".$d."<br>";
echo "Nous sommes en ".$aujourdui."<br>";
echo "Vous avez donc ".$age."ans<br>";
}

}
?>




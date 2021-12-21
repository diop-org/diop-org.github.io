<html>
<body>
<form action="site.php" method="post">
<label>Saisir Votre Nom</label><input type="text" name="nom"><br>
<label>Civilité</label>
<SELECT NAME="civ">
<option>Monsieur</option><option>Madame</option><option>Madmoiselle</option>
</select><br>
<label>Donner l'article</label><input type="text" name="art"><br>
<label>Donner le Montant </label><input type="text" name="mit"><br>
<input type="submit" value="VALIDER" name="ok">
</form>
</body>
</html>
<?php
if(isset($_POST['ok']))
{
$n=$_POST['nom'];
$d=date("D-M-Y");
$h=date("h-m-s");
$a=$_POST['art'];
$m=$_POST['mit'];
$c=$_POST['civ'];
$fin=16*60;
echo "Bonjour ";
if ($c == "Monsieur")
$sal="Le bienvenu";
else 
$sal="La bienvenu";
echo $c." ".$n." "."soyez ".$sal." "."sur ce site<br>";
echo"Nous sommes le ".$d." et il est ".$h."<br>";
echo"L'enchère sur votre ".$a." se termine dans ".(date('H')*60-$fin)."mn"."<br>";
echo"Votre enchère actuelle est de ".$m." Euro,soit ".($m*650)." Franc"; 
}
?>
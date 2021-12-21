<html>
<body>
<form action="exo3tp3.php" method="post">
<label>Etudiant 1 : </label><input type="text" name="1"><br>
<label>Etudiant 2 : </label><input type="text" name="2"><br>
<label>Etudiant 3 : </label><input type="text" name="3"><br>
<label>Etudiant 4 : </label><input type="text" name="4"><br>
<input type="submit" name="ok" value="Valider">
</form>
</body>
</html>
<?php
echo"<pre>";
if(isset($_POST["ok"]))
{
$nom[]=$_POST['n'];
$note[]=$_POST['nt'];
$x=count($note);

}
echo"<pre>";
?>

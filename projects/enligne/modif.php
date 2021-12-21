<a href="css.php">Page css</a>
<a href="rajout.php">Rajouter une balise </a>
<form method="POST" action="css.php">
<?php
mysql_connect('localhost','root','');// Connexion à la BDD
mysql_select_db('online');// N'oubliez pas de remplacer les ***** 
  
  
$retour=mysql_query('SELECT * FROM css');// On récupère les entrées
$id=0;
  
while ($donnees=mysql_fetch_array($retour))
{
        echo "<input size=25 type='text' value='".$donnees['commentaire']."' name='style[$id][commentaire]' />"; // Le champ de texte du commentaire
        echo "<a href='css.php?supr=".$donnees['id']."'>Supprimer</a><br />"; // Le lien pour supprimer un code   
        echo "<textarea name='style[$id][code]' cols=30 rows=8>".$donnees['code']."</textarea><br/>"; // Un textarea qui contiendra le code
        echo "<input type='hidden' name='style[$id][id]' value='".$donnees['id']."' />"; // Un champ caché pour récupérer l'id du code
        echo "<br /><br />";
        $id++;
}
mysql_close();
?>
<input type="submit" value="Modifier" name="modifier"/>
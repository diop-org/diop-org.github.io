<a href="modif.php">Modifier le code</a>
<a href="rajout.php">Rajouter une balise </a>
<?php
mysql_connect('localhost','root','');// Connexion à la BDD
mysql_select_db('online');// N'oubliez pas de remplacer les ***** 
  
// -------------------------------------------
// Vérif. 1 : Est-ce qu'on rajoute quelque chose ?
// -------------------------------------------
if(isset($_POST['rajout'])) 
{
        $commentaire=$_POST['commentaire'];
        $code=$_POST['code'];
        mysql_query("INSERT INTO css VALUES('','".$commentaire."','".$code."')");
}
  
  
// -------------------------------------------
// Vérif. 2 : Est-ce que l'on modifie le code ?
// -------------------------------------------
if (isset($_POST['modifier'])) {
    $p = $_POST['style'];// On décale les tableaux d'un rang
        foreach($p as $key =>$s)
        {
         
                $code=$s['code'];
                $commentaire=$s['commentaire'];
                $id=$s['id'];
                mysql_query( 'UPDATE css SET code=\''.$code.'\', commentaire=\''.$commentaire.'\' WHERE id='.$id.' ');
        }
}
// -------------------------------------------
// Vérif. 3 : On essaye de supprimer quelque chose ?
// -------------------------------------------
if (isset($_GET['supr'])) {
        $id=$_GET['supr'];
        mysql_query( "DELETE FROM css WHERE id=".$id." ");
        }
  
// -------------------------------------------
// On écrit dans le fichier
// -------------------------------------------
$fichier=fopen("style.css","w"); // On l'ouvre en mode « w »
$retour = mysql_query('SELECT * FROM css');$message="";
while ($donnees = mysql_fetch_array($retour))
        {
        $message .= $donnees['code'];
        $message .="\n";// Retour à la ligne
        }
fputs($fichier, $message);
fclose($fichier);
  
// -------------------------------------------
// On affiche le fichier
// -------------------------------------------
$fichier=fopen("style.css","r");
$compteur=1;
while (!feof($fichier)) 
{
        $ligne=fgets($fichier);
        echo $compteur.'.'.nl2br($ligne);
        $compteur++;
}
//mysql_close();
?>
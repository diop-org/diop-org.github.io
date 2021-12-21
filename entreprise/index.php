<?php
if(isset($_POST['envoi']))
{
include("connect.php");
$login=$_POST['login'];
$mdp=$_POST['pass'];
$sql="select * from user where login='$login' and passe='$mdp'";
$query=mysql_query($sql);
$nb=mysql_num_rows($query);
if($nb>0){
$user=mysql_fetch_assoc($query);
$nom=$user['Nom'];
$prenom=$user['Prenom'];
$profil=$user['Profil'];
session_start();
$_SESSION['prenom']=$prenom;
$_SESSION['nom']=$nom;
$_SESSION['profil']=$profil;
if($_SESSION['profil']=="administrateur")
header("location:form_etudiant.php");
else
header("location:form_cours.php");//exit();
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans nom</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
  <div id="bann">Placez ici le contenu de  id "bann"</div>
  <div id="rechercher">Placez ici le contenu de  id "rechercher"</div>
  <div id="menu">Placez ici le contenu de  id "menu"</div>
  <div id="middle">
    <div id="m1">
      <div class="m1_1">Placez ici le contenu de  id "m1_1"</div>
      <div class="m1_1">
        <table align="center" bgcolor="#FF99FF">
          <tr>
            <td width="383"><form id="form1" name="form1" method="post" action="administration.php">
              <table width="293" border="0" align="center" class="financia1">
                <tr>
                  <td colspan="2"><div align="center">Authentification</div></td>
                </tr>
                <tr>
                  <td width="121">Login</td>
                  <td width="162"><input type="text" name="login" /></td>
                </tr>
                <tr>
                  <td>Mot de Passe</td>
                  <td><input type="password" name="pass" /></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><input type="submit" name="envoi" value="Valider" /></td>
                </tr>
              </table>
              <a href="inscription.php">Voulez vs inscrire</a>
            </form></td>
          </tr>
        </table>
      </div>
    Placez ici le contenu de  id "m1"<br class="lamda" />
</div>
    <div id="m2"></div>
    <p>&nbsp;</p>
    <br class="lamda" />
  </div>
  <div id="footer">Placez ici le contenu de  id "footer"</div>
</div>
</body>
</html>

<?php
if(isset($_POST['envoi']))
{
include("connect.php");
$login=$_POST['login'];
$mdp=$_POST['pass'];
$sql="select * from user where login='$login' and pass='$mdp'";
$query=mysql_query($sql);
$nb=mysql_num_rows($query);
if($nb>0){
$user=mysql_fetch_assoc($query);
$nom=$user['nom'];
$prenom=$user['prenom'];
$profil=$user['profil'];
session_start();
$_SESSION['prenom']=$prenom;
$_SESSION['nom']=$nom;
$_SESSION['profil']=$profil;
if($_SESSION['profil']=="administrateur")
header("location:client.php");
else
header("location:modif1.php");//exit();
}
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/style.css" rel="stylesheet" type="text/css">
<title>Document sans titre</title>
<style type="text/css">
<!--
.Style2 {
	color: #6600FF;
	font-size: 18px;
	font-family: Georgia, "Times New Roman", Times, serif;
}
-->
</style>
</head>

<body bgcolor="#99CCFF">
<table width="714" height="459" border="0" align="center">
  <tr>
    
    <td width="403" height="21">&nbsp;</td>
    <td width="387">&nbsp;</td>
    <td width="1" rowspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="21" colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td height="361" colspan="2">
	<p>&nbsp;</p>
	
      <table align="center">
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
<a href="inscription.php">Voulez vous inscrire</a>
        </form></td>
      </tr>
    </table>
	<p>&nbsp;</p>
	<p>&nbsp;</p>	</td>
  </tr>
  <tr>
    <td colspan="3" >&nbsp;</td>
  </tr>
</table>
</body>
</html>

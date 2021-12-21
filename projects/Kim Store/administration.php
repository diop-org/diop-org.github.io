<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
if(isset($_POST['envoi']))
{
include("connect.php");
$login=$_POST['login'];
$mdp=$_POST['passwd'];
$sql="select * from client where login='$login' and passwd='$mdp'";
$query=mysql_query($sql);
$nb=mysql_num_rows($query);
if($nb>0){
$user=mysql_fetch_assoc($query);
$nom=$user['Nom'];
$prenom=$user['Prenom'];
$profil=$user['Profil'];
session_start();
$_SESSION['pnomclient']=$prenom;
$_SESSION['nomclient']=$nom;
$_SESSION['profil']=$profil;
if($_SESSION['profil']=="administrateur")
header("location:indexad.php");
else
header("location:indexx.php");//exit();
}
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Accueil</title>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<!--Slider Link-->
	<script type="text/javascript" charset="utf-8" src="js/jquery-1.3.2.min.js"></script>	
	<script type="text/javascript" charset="utf-8" src="js/jqFancyTransitions.js"></script>
<!--Slider Link Fin-->
</head>

<body>

<div id="header">
  <div id="header_in">
    <div id="logo"><a href="index.php"><img src="images/logo.png" width="156" height="107" /></a></div>
    <div id="header_in_right">
      <div id="slogan"><form id="form1" name="form1" method="post" action="">
          <table width="64%" align="right" cellspacing="5" id="featured">
            <tr>
            <td align="right"><img src="images/ico-account-nav.png" width="14" height="14" alt="connexion" /></td>
              <td align="right"><span id="sprytextfield1">
                <label>
                  <input name="text1" type="text" class="chp_txt" id="text1" value="Email" onfocus="if(this.value=='Utilisateur'){this.value=''};" onblur="if(this.value==''){this.value='Utilisateur'};"/>
                </label>
                <span class="textfieldRequiredMsg">Une valeur est requise.</span></span></td>
              <td align="right"><input name="password1" type="password" class="chp_txt" id="password1" value="*************" onfocus="if(this.value=='Utilisateur'){this.value=''};" onblur="if(this.value==''){this.value='Utilisateur'};" /></td>
              <td align="right"><input name="button" type="image" id="button" value="Envoyer" src="images/valider.png" alt="Valider" /></td>
              <td align="right"><img src="images/recup.png" width="25" height="25" alt="Reuperation" /></td>
            </tr>
          </table>
      </form></div>
    </div>
  </div>
</div>
<div id="middle">
  <div id="navigation">
    <div id="accueil"><a href="index.php"><img src="images/ico-breadcrumb-home.png" width="52" height="37" alt="Accueil" /></a></div>
    <div id="env_nav">
  <ul id="nav">
    <li><a href="#">Nouveautes</a></li>
    <li><a href="espce-client.html">Espace Client</a></li>
    <li><a href="#">Panier</a></li>
    <li><a href="#">contact</a></li>
    <form id="form2" name="form2" method="post" action="">
    <table width="200" border="0" align="right">
      <tr>
        <td><label for="recherche"></label>
          <input name="recherche" type="text" class="chp_txt" id="recherche" /></td>
        <td><input type="image" src="images/ico-search.png" name="recherche2" id="recherche2" value="Envoyer" /></td>
      </tr>
    </table>
  </form>
  </ul>
  
    </div>
  </div>
  <div id="middle_in">
    <div id="middleslider">
    
    <div class="wrapper clearfloat">
  <div id="blinds"> 
  
  <img title="Produit à la Une" alt="News du site 1" src="slides/nature-photo0.jpg" /> 
  
  <img title="Produit à la Une 1" alt="News du site 2" src="slides/nature-photo1.jpg" /> 
  
  <img title="Produit à la Une 2" alt="News du site 3" src="slides/nature-photo2.jpg" /> 
  
  <img title="Produit à la Une 3" alt="News du site 4" src="slides/nature-photo3.jpg" /> 
  
  <img title="Produit à la Une 4" alt="News du site 5" src="slides/nature-photo4.jpg" /> </div>
  <!-- end of #blinds-->
  <script type="text/javascript">
		$("#blinds").jqFancyTransitions({
			width: 960,
			height: 330,
			strips: 20
		}); 
		</script>
  <div id="buttons"></div>
  <!-- end of #buttons-->
</div>
    
    </div>
    <div id="middle_in_in">
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
                <td><input type="password" name="passwd" id="passwd" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><input type="reset" name="envoi" value="Valider" /></td>
              </tr>
            </table>
<a href="client.php">Voulez vous inscrire</a>
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
      <div id="middle_in_right"> 
        <h1>Reserver à la PUB</h1>
      </div>
      <br class="clear" />
    </div>
  </div>
  <div id="middle_bottom"></div>
  <div id="footer">
    <div id="footer_in">
      <div class="cop" id="footer_left">Copyright &copy; - 2012 kimpeps</div>
      <div id="footer_right"><img src="images/logo1.png" width="68" height="46" alt="logo" /></div><br class="clear" />

    </div>
  </div>
</div>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
//-->
</script>
</body>
</html>

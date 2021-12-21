<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
      <div id="slogan">
      <form id="form1" name="form1" method="post" action="">
          <table width="64%" align="right" cellspacing="5" id="featured">
            <tr>
            <td align="right"><img src="images/ico-account-nav.png" width="14" height="14" alt="connexion" /></td>
              <td align="right">
                <label>
                  <input name="login" type="text" class="chp_txt" id="login" />
              </label></td>
              <td align="right"><label>
                <input name="passwd" type="text" class="chp_txt" id="passwd" />
              </label></td>
              <td align="right"><input name="button" type="image" id="button" value="Envoyer" src="images/valider.png" alt="Valider" /></td>
              <td align="right"><img src="images/recup.png" width="25" height="25" alt="Recuperation" /></td>
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
    <li><a href="nouveaute.html">Nouveautes</a></li>
    <li><a href="espce-client.html">Espace Client</a></li>
    <li><a href="panier.php">Panier</a></li>
    <li><a href="contact.php">contact</a></li>
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
  
  <img src="slides/nature-photo0.jpg" alt="News du site 1" width="960" height="330" title="Produit à la Une" /> 
  
  <img title="Produit à la Une 1" alt="News du site 2" src="slides/nature-photo1.jpg" /> 
  
  <img title="Produit à la Une 2" alt="News du site 3" src="slides/nature-photo2.jpg" /> 
  
  <img src="slides/nature-photo3.jpg" alt="News du site 4" width="960" height="330" title="Produit à la Une 3" /> 
  
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
      <div id="middle_in_left">
        <div class="bloc_produits">
          <h1>produit 1<img src="images/Image-Produit.jpg" width="180" height="191" alt="prod" /></h1>
          <p>Produit XXX Prix: 15.000 FCFA </p>
          <p><a href="#"><img src="images/ico-cart.png" width="14" height="14" alt="acheter" /></a></p>
        </div>
        <div class="bloc_produits">
          <h1>produit 2<img src="images/Image-Produit.jpg" width="180" height="191" alt="prod" /></h1>
          <p>Produit XXX Prix: 15.000 FCFA </p>
          <p><a href="#"><img src="images/ico-cart.png" width="14" height="14" alt="acheter" /></a></p>
        </div>
        <div class="bloc_produits">
          <h1>produit 3<img src="images/Image-Produit.jpg" width="180" height="191" alt="prod" /></h1>
          <p>Produit XXX Prix: 15.000 FCFA </p>
          <p><a href="#"><img src="images/ico-cart.png" width="14" height="14" alt="acheter" /></a></p>
        </div>
        <div class="bloc_produits">
          <h1>produit 4<img src="images/Image-Produit.jpg" width="180" height="191" alt="prod" /></h1>
          <p>Produit XXX Prix: 15.000 FCFA </p>
          <p><a href="#"><img src="images/ico-cart.png" width="14" height="14" alt="acheter" /></a></p>
        </div>
        <div class="bloc_produits">
          <h1>produit 5<img src="images/Image-Produit.jpg" width="180" height="191" alt="prod" /></h1>
          <p>Produit XXX Prix: 15.000 FCFA </p>
          <p><a href="#"><img src="images/ico-cart.png" width="14" height="14" alt="acheter" /></a></p>
        </div>
        <div class="bloc_produits">
          <h1>produit 6<img src="images/Image-Produit.jpg" width="180" height="191" alt="prod" /></h1>
          <p>Produit XXX Prix: 15.000 FCFA </p>
          <p><a href="#"><img src="images/ico-cart.png" width="14" height="14" alt="acheter" /></a></p>
        </div>
      </div>
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

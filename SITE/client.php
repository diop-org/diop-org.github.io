
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Accueil</title>
<link href="file:///C|/wamp/www/kim/Kim Store/css/styles.css" rel="stylesheet" type="text/css" />
<script src="file:///C|/wamp/www/kim/Kim Store/SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="file:///C|/wamp/www/kim/Kim Store/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<!--Slider Link-->
	<script type="text/javascript" charset="utf-8" src="file:///C|/wamp/www/kim/Kim Store/js/jquery-1.3.2.min.js"></script>	
	<script type="text/javascript" charset="utf-8" src="file:///C|/wamp/www/kim/Kim Store/js/jqFancyTransitions.js"></script>
<!--Slider Link Fin-->
</head>

<body>

<div id="header">
  <div id="header_in">
    <div id="logo"><a href="file:///C|/wamp/www/kim/Kim Store/index.php"><img src="file:///C|/wamp/www/kim/Kim Store/images/logo.png" width="156" height="107" /></a></div>
    <div id="header_in_right">
      <div id="slogan"><form id="form1" name="form1" method="post" action="">
          <table width="64%" align="right" cellspacing="5" id="featured">
            <tr>
            <td align="right"><img src="file:///C|/wamp/www/kim/Kim Store/images/ico-account-nav.png" width="14" height="14" alt="connexion" /></td>
              <td align="right"><span id="sprytextfield1">
                <label>
                  <input name="text1" type="text" class="chp_txt" id="text1" value="Email" onfocus="if(this.value=='Utilisateur'){this.value=''};" onblur="if(this.value==''){this.value='Utilisateur'};"/>
                </label>
                <span class="textfieldRequiredMsg">Une valeur est requise.</span></span></td>
              <td align="right"><input name="password1" type="password" class="chp_txt" id="password1" value="*************" onfocus="if(this.value=='Utilisateur'){this.value=''};" onblur="if(this.value==''){this.value='Utilisateur'};" /></td>
              <td align="right"><input name="button" type="image" id="button" value="Envoyer" src="file:///C|/wamp/www/kim/HEAVY/images/valider.png" alt="Valider" /></td>
              <td align="right"><img src="file:///C|/wamp/www/kim/HEAVY/images/recup.png" width="25" height="25" alt="Reuperation" /></td>
            </tr>
          </table>
      </form></div>
    </div>
  </div>
</div>
<div id="middle">
  <div id="navigation">
    <div id="accueil"><a href="file:///C|/wamp/www/kim/Kim Store/index.php"><img src="file:///C|/wamp/www/kim/Kim Store/images/ico-breadcrumb-home.png" width="52" height="37" alt="Accueil" /></a></div>
    <div id="env_nav">
  <ul id="nav">
    <li><a href="#">Client</a></li>
    <li><a href="file:///C|/wamp/www/kim/Kim Store/espce-client.html">Produit</a></li>
    <li><a href="#">Commander</a></li>
    <li><a href="#">Commande</a></li>
    <li><a href="#">Page 5</a></li>
    <li><a href="#">contact</a></li>
    <form id="form2" name="form2" method="post" action="">
    <table width="200" border="0" align="right">
      <tr>
        <td><label for="recherche"></label>
          <input name="recherche" type="text" class="chp_txt" id="recherche" /></td>
        <td><input type="image" src="file:///C|/wamp/www/kim/Kim Store/images/ico-search.png" name="recherche2" id="recherche2" value="Envoyer" /></td>
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
  
  <img title="Produit à la Une" alt="News du site 1" src="file:///C|/wamp/www/kim/Kim Store/slides/nature-photo0.jpg" /> 
  
  <img title="Produit à la Une 1" alt="News du site 2" src="file:///C|/wamp/www/kim/Kim Store/slides/nature-photo1.jpg" /> 
  
  <img title="Produit à la Une 2" alt="News du site 3" src="file:///C|/wamp/www/kim/Kim Store/slides/nature-photo2.jpg" /> 
  
  <img title="Produit à la Une 3" alt="News du site 4" src="file:///C|/wamp/www/kim/Kim Store/slides/nature-photo3.jpg" /> 
  
  <img title="Produit à la Une 4" alt="News du site 5" src="file:///C|/wamp/www/kim/Kim Store/slides/nature-photo4.jpg" /> </div>
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
      <form id="form1" name="form1" method="post" action="insclient.php">
  <table width="347" border="1">
    <tr>
      <td width="169">Nom:</td>
      <td width="162"><label>
        <input type="text" name="nom" id="nom" />
      </label></td>
    </tr>
    <tr>
      <td>Prenom:</td>
      <td><label>
        <input type="text" name="pnom" id="pnom" />
      </label></td>
    </tr>
    <tr>
      <td>Civilite:</td>
      <td><label>
        <input type="radio" name="radio" id="madame" value="madame" />
        Mme<br />
        <input type="radio" name="radio" id="mademoiselle" value="mademoiselle" />
        Mlle<br />
        <input type="radio" name="radio" id="monsieur" value="monsieur" />
      Mr</label></td>
    </tr>
    <tr>
      <td>Sexe:</td>
      <td><label>
        <input type="text" name="sexe" id="sexe" />
      </label></td>
    </tr>
    <tr>
      <td>Adresse:</td>
      <td><label>
        <input type="text" name="adrclient" id="adrclient" />
      </label></td>
    </tr>
    <tr>
      <td>Telephone:</td>
      <td><label>
        <input type="text" name="telclient" id="telclient" />
      </label></td>
    </tr>
    <tr>
      <td>Mode-paiement:</td>
      <td><label>
        <input type="radio" name="radio" id="modepaiement" value="modepaiement" />
        Visa Card
        <br />
      </label>
        <label>
          <input type="radio" name="radio" id="modepaiement2" value="modepaiement" />
          <br />
        </label>
        <label>
          <input type="radio" name="radio" id="modepaiement3" value="modepaiement" />
      </label></td>
    </tr>
    <tr>
      <td>Mot de passe:</td>
      <td><label>
        <input type="text" name="passwd" id="passwd" />
      </label></td>
    </tr>
    <tr>
      <td>Confirmer mot de passe:</td>
      <td><label>
        <input type="text" name="passwd1" id="passwd1" />
      </label></td>
    </tr>
    <tr>
      <td><label>
        <input type="submit" name="enregistrer" id="enregistrer" value="Enregistrer" />
      </label></td>
      <td><label>
        <input type="submit" name="annuler" id="annuler" value="Annuler" />
      </label></td>
    </tr>
  </table>
</form>

      <div id="middle_in_right"> 
        <h1>Reserver à la PUB</h1>
      </div>
      <br class="clear" />
    </div>
  </div>
  <div id="middle_bottom"></div>
  <div id="footer">
    <div id="footer_in">
      <div id="footer_left">&copy; - 2012</div>
      <div id="footer_right">Design by KIM</div>
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


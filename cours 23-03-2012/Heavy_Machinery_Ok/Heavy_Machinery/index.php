<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>---::: HEAVY MACHINERY INTERNATIONAL :::---</title>
<link rel="shortcut icon" href="images/favicon1.ico" /><link href="css/styles.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<!-- DEBUT FORM CONTACT section -->
<link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<!-- FIN FORM CONTACT section -->
<!-- ACCORDEON DEBUT -->
    <script type="text/javascript" src="js/jquery-1.2.1.js"></script>
<!-- ACCORDEON FIN -->

<!-- Start WOWSlider.com HEAD section -->
	<link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>
	<script type="text/javascript" src="engine1/wowslider.js"></script>
<!-- End WOWSlider.com HEAD section -->

<!-- ACCORDEON POUR I.E. section -->
	<!--[if lte IE 6]>
	<style type="text/css">
		li {
			height: 1px;
			}
	</style>
	<![endif]-->
</head>

<body>
<div id="slider">



<!-- Start WOWSlider.com BODY section -->
<div id="wowslider-container1">
<div class="ws_images">
<span><img src="data1/images/slider.jpg" alt="slider" title="slider" id="wows0"/></span>
<span><img src="data1/images/camion.jpg" alt="camion" title="camion" id="wows1"/></span>
<span><img src="data1/images/camion2.jpg" alt="camion2" title="camion2" id="wows2"/></span>
<span><img src="data1/images/slider1.jpg" alt="slider" title="slider" id="wows3"/></span>
</div>
<div class="ws_bullets">
 <div>
<a href="#wows0" title="slider"><img src="data1/tooltips/slider.jpg" alt="slider"/>1</a>
<a href="#wows1" title="camion"><img src="data1/tooltips/camion.jpg" alt="camion"/>2</a>
<a href="#wows2" title="camion2"><img src="data1/tooltips/camion2.jpg" alt="camion2"/>3</a>
<a href="#wows3" title="slider"><img src="data1/tooltips/slider1.jpg" alt="slider"/>4</a>
</div></div>

</div>
<script type="text/javascript" src="engine1/script.js"></script>
<!-- End WOWSlider.com BODY section -->

</div>
<div id="header">
  <div id="header_in">
    <div id="logo"><a href="index.php?Heavy=1"><img src="images/logo_heavy.png" width="156" height="107" alt="HEAVY MACHINERY" /></a></div>
    <div id="header_in_right">
      <div id="slogan">Bringing the Best Machinery Across the seas</div>
    </div>
  </div>
</div>
<div id="middle">
  <div id="navigation">
    <div id="accueil"><a href="index.php?Heavy=1"><img src="images/accueil.png" width="35" height="34" alt="Accueil" /></a></div>
    <div id="env_nav">
  <ul id="nav">
    <li><a href="index.php?Heavy=2&amp;Titre=2">used equipement</a></li>
    <li><a href="index.php?Heavy=3&amp;Titre=3">parts</a></li>
    <li><a href="index.php?Heavy=4&amp;Titre=4">international delivries</a></li>
    <li><a href="index.php?Heavy=5&amp;Titre=5">services</a></li>
    <li><a href="index.php?Heavy=6&amp;Titre=6">inventory</a></li>
    <li><a href="index.php?Heavy=7&amp;Titre=7">contact</a></li>
  </ul>
    </div>
  </div>
  <div id="middle_in">
    <div id="middle_in_in">
      <div id="middle_in_left">
      <h2>
                      <?php 
  if (isset($_GET["Titre"])){
   $Titre =  $_GET["Titre"];

			 switch ($Titre){
				case 1: 
					$page="Welcome";
				break;	
				case 11: 
					$page="Heavy Parts";
				break;	
				case 12: 
					$page="Heavy Rent";
				break;	
				case 13: 
					$page="Heavy Sale";
				break;	
				case 2: 
					$page="used equipement";
				break;	
				case 3: 
					$page="heavy parts";
				break;	
				case 4: 
					$page="international delivries";
				break;	
				case 5: 
					$page="services";
				break;	
				case 6: 
					$page="inventory";
				break;	
				case 7: 
					$page="contact";
				break;	
                }
				}else{
					$page="" ;
	  }
  
   echo $page;?>
</h2>
          <?php 
		  if(!empty($_GET['Heavy'])){
		  switch($_GET['Heavy']){
		  	case 1:
				include('accueil.html');
			break;
		  	case 11:
				include('accueil.html');
			break;
		  	case 12:
				include('rent.html');
			break;
		  	case 13:
				include('sale.html');
			break;
		  	case 2:
				include('equipement.php');
			break;
		  	case 3:
				include('parts.php');
			break;
		  	case 4:
				include('delivries.php');
			break;
		  	case 5:
				include('services.php');
			break;
		  	case 6:
				include('inventory.php');
			break;
		  	case 7:
				include('contact.php');
			break;
		  }
		  }else{
				include('accueil.html');
		  }
		  
		  ?>


      </div>
      <div id="middle_in_right">
        <form id="form1" name="form1" method="post" action="">
          <table width="100%" cellspacing="5">
            <tr>
              <td align="right"><span id="sprytextfield1">
                <label>
                  <input name="text1" type="text" class="chp_txt" id="text1" value="Username" onfocus="javascript:this.value=''" onBlur="javascript:this.value='Username'"/>
                </label>
                <span class="textfieldRequiredMsg">Champ obligatoire.</span></span></td>
            </tr>
            <tr>
              <td align="right"><span id="sprypassword1">
                <label>
                  <input name="password1" type="password" class="chp_txt" id="password1" value="password" onfocus="javascript:this.value=''" onBlur="javascript:this.value='Password'"/>
                </label>
                <span class="passwordRequiredMsg">Champ obligatoire.</span></span></td>
            </tr>
            <tr>
              <td align="right"><label>
                <input name="button" type="image" id="button" value="Envoyer" src="images/valider.png" alt="Valider" />
                &nbsp;&nbsp;<img src="images/recup.png" width="25" height="25" alt="Reuperation" /></label></td>
            </tr>
          </table>
        </form>
      </div>
      <br class="clear" />
    </div>
  </div>
  <div id="middle_bottom"></div>
  <div id="footer">
    <div id="footer_in">
      <div id="footer_left">&copy; - Heavy Machinery Intenational</div>
      <div id="footer_right"><a href="http://www.omeganets.net" target="_blank"><img src="images/omeganets.net.png" width="47" height="27" alt="OMEGANETS.NET" /></a></div>
    </div>
  </div>
</div>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1");
//-->
</script>
</body>
</html>

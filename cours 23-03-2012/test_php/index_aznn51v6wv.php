<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans nom</title>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="images/icone.gif" />
<link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<style type="text/css">a#vlb{display:none}</style>
	<script type="text/javascript" src="engine1/jquery.js"></script>
	<script type="text/javascript" src="engine1/wowslider.js"></script>
</head>

<body>
<div id="slider"><div id="wowslider-container1">
	 <div class="ws_images">
<span><img src="data1/images/slider.jpg" alt="slider" title="magui" id="wows0"/></span>
<span><img src="data1/images/camion.jpg" alt="camion" title="yaye fall" id="wows1"/></span>
<span><img src="data1/images/camion2.jpg" alt="camion2" title="doumbia" id="wows2"/></span>
<span><img src="data1/images/slider_0.jpg" alt="slider" title="isi" id="wows3"/></span></div>
<div class="ws_bullets">
  <div>
<a href="#wows0" title="magui"><img src="data1/tooltips/slider.jpg" alt="slider"/>1</a>
<a href="#wows1" title="yaye fall"><img src="data1/tooltips/camion.jpg" alt="camion"/>2</a>
<a href="#wows2" title="doumbia"><img src="data1/tooltips/camion2.jpg" alt="camion2"/>3</a>
<a href="#wows3" title="isi"><img src="data1/tooltips/slider_0.jpg" alt="slider"/>4</a>
</div></div>
	</div>
	<script type="text/javascript" src="engine1/script.js"></script></div>
<div id="header">
  <div id="header_in">
    <div id="logo"><a href="#" title="Logo Heavy Machinery"><img src="images/logo_heavy.png" width="156" height="107" alt="HEAVY MACHINERY" /></a></div>
    <div id="header_in_right">
      <div id="slogan">Bringing the Best Machinery Across the seas</div>
    </div>
  </div>
</div>
<div id="middle">
  <div id="navigation">
  <div id="accueil"><a href="index.php?variable=1"><img src="images/accueil.png" width="33" height="34" alt="Accueil" /></a></div>
    <ul id="nav">
      <li><a href="index.php?variable=2" title="Présentation">Présentation</a></li>
      <li><a href="index.php?variable=3" title="Solutions">Solutions</a></li>
      <li><a href="index.php?variable=4" title="Formation">Formations</a></li>
      <li><a href="index.php?variable=5" title="Références">Références</a></li>
      <li><a href="index.php?variable=5" title="Contact">Contact</a></li>
    </ul>
  </div>
  <div id="middle_in">
    <div id="middle_in_in">
      <div id="middle_in_left">
      <?php
      if(isset($_GET['variable'])){
		  $valeur=$_GET['variable'];
		  switch($valeur){
			  case 1:
			  include("accueil.php");
			  break;
			  case 2:
			  include("page2.php");
			  break;
			  case 3:
			  include("page3.php");
			  break;
			  case 4:
			  include("page4.php");
			  break;
			  case 5:
			  include("contact.php");
			  break;
		  }
	  }
	  else{
		  include("accueil.php");
	  }
	  ?>
		  </div>
      <div id="middle_in_right">
    
        <form id="form1" name="form1" method="post" action="">
          <table width="100%" cellspacing="5">
            <tr>
              <td align="right"><span id="sprytextfield1">
                <label>
                  <input name="text1" type="text" class="chp_txt" id="text1" value="Username" onfocus="javascript:this.value=''"onBlur="javascript:this.value='Username'"/>
                </label>
                <span class="textfieldRequiredMsg">Une valeur est requise.</span></span></td>
            </tr>
            <tr>
              <td align="right"><span id="sprypassword1">
                <label>
                  <input name="password1" type="password" class="chp_txt" id="password1" value="Password" onfocus="javascript:this.value=''" onBlur="javascript:this.value='Password'"/>
                </label>
                <span class="passwordRequiredMsg">Une valeur est requise.</span></span></td>
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

<?php
echo "<mm:dwdrfml documentRoot=\"" . __FILE__ .	"\" >\n\n";
$included_files = get_included_files();
foreach ($included_files as $filename) {
	echo "<mm:IncludeFile path=\"$filename\" />\n\n";
}
echo "</mm:dwdrfml>\n\n";

?>
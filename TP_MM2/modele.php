<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
<link href="css/styles_css.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="bg_top">
  <div id="bg_bottom">
    <div id="contener">
      <div id="logo">
        <div id="logo_agridev"><img src="images/logo_agridev.jpg" width="181" height="84" alt="Agridev" /></div>
        <div id="logo_selsine"><img src="images/logo_selsine.jpg" width="120" height="90" alt="Sel Sine" /></div>
        <br class="clear" />
      </div>
      <div id="navigation">
        <div id="nav_left">
          <div id="nav_right">
            <ul id="MenuBar1" class="MenuBarHorizontal">
              <li><a class="MenuBarItemSubmenu" href="#">presentation</a>
                <ul>
                  <li><a href="#">Elément 1.1</a></li>
                  <li><a href="#">Elément 1.2</a></li>
                  <li><a href="#">Elément 1.3</a></li>
                </ul>
              </li>
              <li><a href="#" class="MenuBarItemSubmenu">activites</a>
                <ul>
                  <li><a href="ventes.html">ventes</a></li>
                  <li><a href="#produits.html">produits</a></li>
                </ul>
              </li>
              <li><a class="MenuBarItemSubmenu" href="#">partenaires</a>
                <ul>
                  <li><a class="MenuBarItemSubmenu" href="#">Elément 3.1</a>
                    <ul>
                      <li><a href="#">Elément 3.1.1</a></li>
                      <li><a href="#">Elément 3.1.2</a></li>
                    </ul>
                  </li>
                  <li><a href="#">Elément 3.2</a></li>
                  <li><a href="#">Elément 3.3</a></li>
                </ul>
              </li>
              <li><a href="#">liens utiles</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div id="page">
        <div id="slide"></div>
        <div id="middle">Le Contenu de la page        </div>
        <div id="footer">
          <div id="footer_L">&copy; - Sel Sine</div>
          <div id="footer_D"><a href="http://www.omeganets.net" target="_blank"><img src="images/omeganets.png" width="47" height="27" alt="omeganets" /></a></div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
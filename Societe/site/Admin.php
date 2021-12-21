<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans nom</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="contener">
  <div id="header"></div>
  <div id="header_1">
    <div id="header_1_1"></div>
    <div id="header_1_2"><form action="rechercher.php" method="post">
<input type="text" name="search" />
<input type="submit" value="Recherche" />
</form><br class="clear" />

 </div>
  </div>
  <div id="menu">
    <div id="acc"><a href="indexkj.php">Acceuil</a></div>
    <div id="prod">Produit</div>
    <div id="Pa">Partenaires</div>
    <div id="cont">Contact</div>
    <div id="Admin"><a href="Admin.php">Admin</a></div>
    <br class="clear" />
</div>
  <div id="middle">
    <div id="middle_1">
      <div id="middle_1_1"></div>
      <div id="middle_1_2"></div>
    </div>
    <div id="middle_2">
      <form id="form1" name="form1" method="post" action="ins.php">
        <table width="411">
          <tr>
            <td width="140">Nom</td>
            <td width="251"><label>
              <input type="text" name="no" id="no" />
            </label></td>
          </tr>
          <tr>
            <td>Prenom</td>
            <td><label>
              <input type="text" name="pnom" id="pnom" />
            </label></td>
          </tr>
          <tr>
            <td>Login</td>
            <td><label>
              <input type="text" name="log" id="log" />
            </label></td>
          </tr>
          <tr>
            <td>Mot de Passe</td>
            <td><label>
              <input type="password" name="pwd" id="pwd" />
            </label></td>
          </tr>
          <tr>
            <td>Repeter mot de passe</td>
            <td><label>
              <input type="password" name="rpwd" id="rpwd" />
            </label></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><label>
              <input type="submit" name="ins" id="ins" value="Inscription" />
            </label></td>
          </tr>
        </table>
      </form>
    </div>
    <div id="middle_3">Placez ici le contenu de  id "middle_3"</div>
    <br class="clear" />
</div>
  <div id="footer">Placez ici le contenu de  id "footer"</div>
  <br class="clear" />
</div>
</body>
</html>


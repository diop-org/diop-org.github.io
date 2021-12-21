<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans nom</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="contenu">
  <div id="menu_top">
    <h1>ISI 2013</h1>
  </div>
  <div id="middle">
    <div id="conteneur"> <?php 
	if(isset($_GET['KIM'])){
	    $valeur = $_GET['KIM'];
		switch($valeur){
		   case 1:
		      include("accueil.php");
		   break;
		   case 2:
		      include("etudiant.php");
		   break;
		   case 3:
		      include("classe.php");
		   break;
		   case 4:
		      include("affiche_etudiant.php");
		   break;
		}
	  }else{
		include("accueil.php");
	  }
	?></div>
    <div id="colonne_right">
      <div id="menu_right">
        <table>
          <tr>
            <td><a href="index.php?KIM=2">Etudiant</a></td>
          </tr>
          <tr>
            <td><a href="index.php?KIM=3">CLASSE</a></td>
          </tr>
        </table>
      </div>
      <div id="connexion"><table width="170" border="0" align="center" cellpadding="0" cellspacing="5">
              <tr>
                <td align="right"><label>
                  <input name="textfield" type="text" class="ch_txt" id="textfield" value="Login" onclick="if(this.value == 'Login'){this.value=''};" onBlur="if(this.value == ''){this.value='Login';}"/>
                </label></td>
              </tr>
              <tr>
                <td align="right"><label>
                  <input name="textfield2" type="password" class="ch_txt" id="textfield2" onBlur="if(this.value == ''){this.value='********';}" onclick="if(this.value == '********'){this.value=''};" value="********" />
                </label></td>
              </tr>
              <tr>
                <td align="right"><label>
                  <input name="button2" type="image" id="button2" value="Envoyer" src="images/bt_radio.png" />
                  <input name="button" type="image" id="button" value="Réinitialiser" src="images/bt_radio2.png" />
                </label></td>
              </tr>
            </table></div><br class="lamda" />

    </div><br class="lamda" />

  </div>
  <div id="footer">COPYRIGHT 2013</div>
</div>
</body>
</html>

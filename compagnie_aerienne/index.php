<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans nom</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="contenu">
  <div id="menu_top"> <ul id="nav">
			<li><a href="index.php?KIM=1" title="aller à la section 1">Accueil</a></li>
			<li><a href="index.php?KIM=2" title="aller à la section 2">Presentation</a></li>
			<li><a href="index.php?KIM=3" title="aller à la section 3">Produit</a></li>
			<li><a href="index.php?KIM=4" title="aller à la section 4">Partenaire</a></li>
			<li><a href="5" title="aller à la section 5">Admin</a></li>
		</ul></div>
  <div id="middle">
    <div id="conteneur"> <?php 
	if(isset($_GET['KIM'])){
	    $valeur = $_GET['KIM'];
		switch($valeur){
		   case 1:
		      include("accueil.html");
		   break;
		   case 2:
		      include("presentation.php");
		   break;
		   case 3:
		      include("produits.php");
		   break;
		   case 4:
		      include("partenaires.php");
		   break;
		   case 5:
		      include("admin.php");
		   break;
		   case 6:
		      include("compagnie.php");
		   break;
		   case 7:
		      include("avion.php");
		   break;
		    case 8:
		      include("pilote.php");
		   break;
		    case 9:
		      include("vol.php");
		   break;
		    case 10:
		      include("listing.php");
		   break;
		    case 11:
		      include("admin.php");
		   break;
		    case 12:
		      include("affiche_compagnie.php");
		   break;
		      case 13:
		      include("affiche_avion.php");
		   break;
		}
	  }else{
		include("accueil.html");
	  }
	?></div>
    <div id="colonne_right">
      <div id="menu_right">
        <table>
          <tr>
            <td><a href="index.php?KIM=6">Compagnie</a></td>
          </tr>
          <tr>
            <td><a href="index.php?KIM=7">Avion</a></td>
          </tr>
          <tr>
            <td><a href="index.php?KIM=8">Pilote</a></td>
          </tr>
          <tr>
            <td><a href="index.php?KIM=9">Vol</a></td>
          </tr>
          <tr>
            <td><a href="index.php?KIM=10">Listing</a></td>
          </tr>
          <tr>
            <td><a href="index.php?KIM=11">Admin</a></td>
          </tr>
        </table>
      </div>
      <div id="connexion">Placez ici le contenu de  id "connexion"</div><br class="lamda" />

    </div><br class="lamda" />

  </div>
  <div id="footer">COPYRIGHT 2013</div>
</div>
</body>
</html>

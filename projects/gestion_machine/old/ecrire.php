<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>History and Library - free css website template</title>
<meta name="keywords" content="History and Library, free css website template, CSS, HTML" />
<meta name="description" content="History and Library - free css website template by templatemo.com" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;

}
</script>
</head>
<body>
<div id="templatemo_container">
	<div id="templatemo_banner">
    <!--  Free CSS Templates @ www.TemplateMo.com  -->
        <div id="search_section">
            <form action="#" method="get">
                <input type="text" value="Enter keyword here..." name="q" size="10" id="searchfield" title="searchfield" onfocus="clearText(this)" onblur="clearText(this)" />
              <input type="submit" name="Search" value="" alt="Search" id="searchbutton" title="Search" />
            </form>
      </div>

    </div> <!-- end of banner -->
    
	<div id="templatemo_menu">
        <ul>
            <li><a href="auteur.php" class="current">Auteur</a></li>
            <li><a href="livre.php">Livre</a></li>
            <li><a href="editeur.php">Editeur</a></li>
            <li><a href="rayon.php">Rayon</a></li>
            <li><a href="#" class="last">Ecrire</a></li>
        </ul>    	
    </div> <!-- end of menu -->
    
    <div id="templatemo_content_top">
    	
      <div class="section_w335 fl margin_right_40">
        
        	<div class="header_01">
            	Ecrire</div>
        	<form id="form1" name="form1" method="post" action="">
        	  <table width="200" border="0">
        	    <tr>
        	      <td align="right">IIdentifiant Auteur :</td>
        	      <td><label for="ida"></label>
        	        <?php

include("bd/database.php");

$req="select * from auteur";

$exe= mysql_query($req);

echo "<select name=\"idauteur\" >";
while($l=mysql_fetch_array($exe))
{
echo "<option value=".$l['idauteur'].">".$l['nomauteur']."</option>";
}
echo" </select>";
?></td>
      	      </tr>
        	    <tr>
        	      <td align="right">Identifiant Isbn :</td>
        	      <td><label for="idi"></label>
        	        <?php

include("bd/database.php");

$req="select * from livre";

$exe= mysql_query($req);

echo "<select name=\"isbn\" >";
while($l=mysql_fetch_array($exe))
{
echo "<option value=".$l['isbn'].">".$l['intitule']."</option>";
}
echo" </select>";
?></td>
      	      </tr>
        	    <tr>
        	      <td align="right">Date :</td>
        	      <td><label for="date"></label>
       	          <input type="text" name="date" id="date" /></td>
      	      </tr>
        	    <tr>
        	      <td align="right">&nbsp;</td>
        	      <td>&nbsp;</td>
      	      </tr>
        	    <tr>
        	      <td align="right"><input type="submit" name="ok" id="ok" value="Envoyer" /></td>
        	      <td>&nbsp;</td>
      	      </tr>
      	    </table>
   	      </form>
        	<p></p>
        </div>
<div class="margin_bottom_20 b_bottom">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>
        
        <div class="cleaner"></div>
    </div> <!-- end of content top -->
    
    <div id="templatmeo_content_bottom">
    <div class="margin_bottom_40 b_bottom"></div>
        <div class="margin_bottom_30">
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
        </div>
        
        <div id="templatemo_footer">
        
          <ul class="footer_list">
                <li><a href="#">Home</a></li>
                <li><a href="#">Books</a></li>
                <li><a href="#">Resources</a></li>
                <li><a href="#">Services</a></li>
                <li class="last"><a href="#">Contact</a></li>
            </ul> 
            
            <div class="margin_bottom_10"></div>
            
            Copyright © 2024 <a href="#">Your Company Name</a> | Designed by <a href="http://www.templatemo.com" target="_parent">Free CSS Templates</a>
            
            <div class="margin_bottom_20"></div>
            
            <a href="http://validator.w3.org/check?uri=referer"><img style="border:0;width:88px;height:31px" src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" width="88" height="31" vspace="8" border="0" /></a>
<a href="http://jigsaw.w3.org/css-validator/check/referer"><img style="border:0;width:88px;height:31px"  src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="Valid CSS!" vspace="8" border="0" /></a>
		
        </div>
        
        <div class="cleaner"></div>    
    </div> <!-- end of content bottom -->
</div> <!-- end of container -->
<!--  Free Website Templates @ TemplateMo.com  -->
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans nom</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
/*
Created by: Travis Beckham :: http://www.squidfingers.com | http://www.podlob.com
version date: 06/02/03 :: If want to use this code, feel free to do so,
but please leave this message intact. (Travis Beckham) 
*/
// Node Functions

if(!window.Node){
  var Node = {ELEMENT_NODE : 1, TEXT_NODE : 3};
}

function checkNode(node, filter){
  return (filter == null || node.nodeType == Node[filter] || node.nodeName.toUpperCase() == filter.toUpperCase());
}

function getChildren(node, filter){
  var result = new Array();
  var children = node.childNodes;
  for(var i = 0; i < children.length; i++){
    if(checkNode(children[i], filter)) result[result.length] = children[i];
  }
  return result;
}

function getChildrenByElement(node){
  return getChildren(node, "ELEMENT_NODE");
}

function getFirstChild(node, filter){
  var child;
  var children = node.childNodes;
  for(var i = 0; i < children.length; i++){
    child = children[i];
    if(checkNode(child, filter)) return child;
  }
  return null;
}

function getFirstChildByText(node){
  return getFirstChild(node, "TEXT_NODE");
}

function getNextSibling(node, filter){
  for(var sibling = node.nextSibling; sibling != null; sibling = sibling.nextSibling){
    if(checkNode(sibling, filter)) return sibling;
  }
  return null;
}
function getNextSiblingByElement(node){
        return getNextSibling(node, "ELEMENT_NODE");
}

// Menu Functions & Properties

var activeMenu = null;

function showMenu() {
  if(activeMenu){
    activeMenu.className = "";
    getNextSiblingByElement(activeMenu).style.display = "none";
  }
  if(this == activeMenu){
    activeMenu = null;
  } else {
    this.className = "active";
    getNextSiblingByElement(this).style.display = "block";
    activeMenu = this;
  }
  return false;
}

function initMenu(){
  var menus, menu1, text, a, i;
  menus = getChildrenByElement(document.getElementById("menu1"));
  for(i = 0; i < menus.length; i++){
    menu1 = menus[i];
    text = getFirstChildByText(menu1);
    a = document.createElement("a");
    menu1.replaceChild(a, text);
    a.appendChild(text);
    a.href = "#";
    a.onclick = showMenu;
    a.onfocus = function(){this.blur()};
  }
}

if(document.createElement) window.onload = initMenu;
</script>
</head>

<body>

<div id="contener">
  <div id="header"></div>
  <div id="header_1">
    <div id="header_1_1"></div>
    <div id="header_1_2"><form action="rechercher.php" method="post" class="formul">
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
      <div id="middle_1_1">
      
      <ul id="menu1">
  <li>Menu Item 1
    <ol>
      <li><a href="#">Sub Item 1.1</a></li>
      <li><a href="#">Sub Item 1.2</a></li>
      <li><a href="#">Sub Item 1.3</a></li>
    </ol>
  </li>
  <li>Menu Item 2
    <ol>
      <li><a href="#">Sub Item 2.1</a></li>
      <li><a href="#">Sub Item 2.2</a></li>
      <li><a href="#">Sub Item 2.3</a></li>
    </ol>
  </li>
  <li>Menu Item 3
    <ol>
      <li><a href="#">Sub Item 3.1</a></li>
      <li><a href="#">Sub Item 3.2</a></li>
      <li><a href="#">Sub Item 3.3</a></li>
    </ol>
  </li>
  <li>Menu Item 4
    <ol>
      <li><a href="#">Sub Item 4.1</a></li>
      <li><a href="#">Sub Item 4.2</a></li>
      <li><a href="#">Sub Item 4.3</a></li>
    </ol>
  </li>
  <li>Menu Item 5
    <ol>
      <li><a href="#">Sub Item 5.1</a></li>
      <li><a href="#">Sub Item 5.2</a></li>
      <li><a href="#">Sub Item 5.3</a></li>
    </ol>
  </li>
</ul>
<p>
      </div>
      <div id="middle_1_2"></div>
    </div>
    <div id="middle_2">
      <table width="489">
        <tr>
          <td width="130">idDepartement</td>
          <td width="347"><label>
            <input type="text" name="iddept" id="iddpt" />
          </label></td>
        </tr>
        <tr>
          <td>nomDepartement</td>
          <td><label>
            <input type="text" name="nomdept" id="nomdpt" />
          </label></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><label>
            <input type="submit" name="Valeur" id="Valeur" value="Valider" />
          </label></td>
        </tr>
      </table>
    </div>
    <div id="middle_3">Placez ici le contenu de  id "middle_3"</div>
    <br class="clear" />
</div>
  <div id="footer">Placez ici le contenu de  id "footer"</div>
Placez ici le contenu de  id "contener"
<br class="clear" />
</div>
</body>
</html>


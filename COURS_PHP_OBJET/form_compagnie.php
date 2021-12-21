<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Test JAVASRIPT</title>
<script Language="JAVASCRIPT">

function verifier()
{
if(document.form1.idcomp.value=="")
{
alert("ce champ doit être renseigné");
document.form1.idcomp.focus();
return false;
}

if(document.form1.nocomp.value=="")
{
alert("ce champ doit être renseigné");
document.form1.nocomp.focus();
return false;
}

if(document.form1.adrcomp.value=="")
{
alert("ce champ doit être renseigné");
document.form1.adrcomp.focus();
return false;
}
var x=1;
for(i=0;i<document.form1.chaf.value.length;++i)
if(document.form1.chaf.value.charAt(i)<"0"||document.form1.chaf.value.charAt(i)>"9")
x=-1;
if(x==-1)
{
alert("ceci n'est pas un nombre");
document.form1.chaf.focus();
return false;
}
}
</script>
</head>

<body>
<fieldset>
<legend>FORMULAIRE COMPAGNIE</legend>
<form id="form1" name="form1" method="post" action="inser_compagnie.php" onsubmit="return verifier()">
  <table width="200" border="1">
    <tr>
      <td>idcompagnie</td>
      <td><label>
        <input name="idcomp" type="text" id="idcomp" />
      </label></td>
    </tr>
    <tr>
      <td>nomcompagnie</td>
      <td><label>
        <input name="nocomp" type="text" id="nocomp" />
      </label></td>
    </tr>
    <tr>
      <td>adresse</td>
      <td><input name="adrcomp" type="text" id="adrcomp" /></td>
    </tr>
    <tr>
      <td>chiffaff</td>
      <td><label>
        <input name="chaf" type="text" id="chaf" />
      </label></td>
    </tr>
    <tr>
      <td><label>
        <input type="submit" name="Submit" value="Valider" />
      </label></td>
      <td><label>
        <input name="reset" type="submit" id="reset" value="Annuler" />
      </label></td>
    </tr>
  </table>
</form>
<?php
echo "<pre><a href=\"modif1.php\">AFFICHER</a>         <a href=\"Menu.php\">MENU</a></pre>";
?>                                
</fieldset>
</body>
</html>

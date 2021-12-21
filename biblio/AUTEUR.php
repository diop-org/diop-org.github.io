<html><head> <title>TestJavascript</title>
<script language="javascript">
function verif()
{
if (document.auteur.idA.value=="")
{ 
alert ("Ce champ doit est renseigné");
document.auteur.idA.focus();
return false; 
 }

if (document.auteur.noA.value=="")
{ 
alert ("Ce champ doit est renseigné");
document.auteur.noA.focus();
return false; 
 }
 
 if (document.auteur.prA.value=="")
{ 
alert ("Ce champ doit est renseigné");
document.auteur.prA.focus();
return false; 
 }

if (document.auteur.em.value=="")
{ 
alert ("Ce champ doit est renseigné");
document.auteur.em.focus();
return false; 
 }
}
</script>
<style type="text/css">
<!--
.Style1 {color: #000000}
-->
</style>
</head>
<Body bgcolor="#3300CC">

  <form action="INSAuteur.php" name="auteur" method="post" onsubmit="return verif()" >
 <caption align="center"> <marquee> <font color="#FF0033" size="+6">Menu Auteur</font></marquee></caption>
 <table width="200" border="1" align="center" bgcolor="#00CC99">
   <tr>
     <th width="120" scope="col"><span class="Style1">idAuteur</span></th>
     <th width="64" scope="col"><label>
       <input name="idA" type="text" id="idA" />
     </label></th>
   </tr>
   <tr>
     <td><span class="Style1">nomAuteur</span></td>
     <td><label>
       <input name="noA" type="text" id="noA" />
     </label></td>
   </tr>
   <tr>
     <td><span class="Style1">prAuteur</span></td>
     <td><label>
       <input name="prA" type="text" id="prA" />
     </label></td>
   </tr>
   <tr>
     <td><span class="Style1">email</span></td>
     <td><label>
       <input name="em" type="text" id="em" />
     </label></td>
   </tr>
   <tr>
     <td><span class="Style1">
       <label>
       <input type="submit" name="Submit" value="Envoyer" />
       </label>
     </span></td>
     <td><label>
       <input name="reset" type="reset" id="reset" value="Annuler" />
     </label></td>
   </tr>
 </table>
 <p>&nbsp;</p>
  </fieldset>
  <p>&nbsp;</p>
</form>
</body>
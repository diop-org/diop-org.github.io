<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<div id="MailContact">
 <!-- DEBUT ADRESSES BOUCLE--> 
 <div class="ZnContact">
    <div class="zn_contact">
      <div class="zn_contact_left">Nom :</div>
      <div class="zn_contact_right">NDIAYE</div>
    </div>
    <div class="zn_contact">
      <div class="zn_contact_left">Pnénom :</div>
      <div class="zn_contact_right">Ousmane</div>
    </div>
    <div class="zn_contact">
      <div class="zn_contact_left">Téléphone USA :</div>
      <div class="zn_contact_right">+001 816 728 36 16</div>
    </div>
    <div class="zn_contact">
      <div class="zn_contact_left"> Fax USA :</div>
      <div class="zn_contact_right">+001 816 453 04 43</div>
    </div>
    <div class="zn_contact">
      <div class="zn_contact_left">Téléphone Sénégal  :</div>
      <div class="zn_contact_right">+221 77 638 30 51</div>
    </div>
  </div>
 <!-- FIN ADRESSES BOUCLE--> 
<br class="clear" />
</div>
<br />
<div id="FormContact">
  <form name="form1" method="post" action="">
    <table width="90%" border="0" align="left" cellpadding="0" cellspacing="3">
      <tr>
        <td colspan="2" align="left" valign="top" nowrap="nowrap"><span class="txtGras">Envoyer un message</span></td>
        <td width="2%" rowspan="9" align="right" valign="top" nowrap="nowrap">&nbsp;</td>
        <td align="right" valign="top" nowrap="nowrap">&nbsp;</td>
        <td nowrap="nowrap">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="left" valign="top" nowrap="nowrap">&nbsp;</td>
        <td align="right" valign="top" nowrap="nowrap">&nbsp;</td>
        <td nowrap="nowrap">&nbsp;</td>
      </tr>
      <tr>
        <td width="14%" align="right" valign="top" nowrap="nowrap">Nom :</td>
        <td width="43%" nowrap="nowrap"><span id="sprytextfield1">
          <label>
            <input name="text1" tabindex="1" type="text" class="chpTxt" id="text1" />
          </label>
        <span class="textfieldRequiredMsg">*</span></span></td>
        <td width="10%" align="right" valign="top" nowrap="nowrap">Objet :</td>
        <td width="31%" nowrap="nowrap"><span id="sprytextfield3">
          <label>
            <input name="text3" tabindex="6" type="text" class="chpTxt" id="text3" />
          </label>
          <span class="textfieldRequiredMsg">*</span></span></td>
      </tr>
      <tr>
        <td align="right" valign="top" nowrap="nowrap">Prénom :</td>
        <td nowrap="nowrap"><label>
          <input name="textfield" tabindex="2" type="text" class="chpTxt" id="textfield" />
        </label></td>
        <td align="right" valign="top" nowrap="nowrap">Message :</td>
        <td nowrap="nowrap">&nbsp;</td>
      </tr>
      <tr>
        <td align="right" valign="top" nowrap="nowrap">E-mail :</td>
        <td nowrap="nowrap"><span id="sprytextfield2">
          <label>
            <input name="text2" tabindex="3" type="text" class="chpTxt" id="text2" />
          </label>
        <span class="textfieldRequiredMsg">*</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span></td>
        <td colspan="2" rowspan="3" align="left" valign="top" nowrap="nowrap"><span id="sprytextarea1">
          <label>
            <textarea name="textarea1" tabindex="7" class="znTxt_2" id="textarea1"></textarea>
          </label>
        <span class="textareaRequiredMsg">*</span></span></td>
      </tr>
      <tr>
        <td align="right" valign="top" nowrap="nowrap">Tél :</td>
        <td nowrap="nowrap"><label>
          <input name="textfield2" tabindex="4" type="text" class="chpTxt" id="textfield2" />
        </label></td>
      </tr>
      <tr>
        <td height="63" align="right" valign="top" nowrap="nowrap">Adresse :</td>
        <td nowrap="nowrap"><label>
          <textarea name="textarea" tabindex="5" class="znTxt_1" id="textarea"></textarea>
        </label></td>
      </tr>
      <tr>
        <td align="right">&nbsp;</td>
        <td nowrap="nowrap">&nbsp;</td>
        <td align="right" nowrap="nowrap">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2"><input name="button" type="image" id="button" value="Envoyer" src="images/envoyer.png" alt="Envoyer" /></td>
      </tr>
    </table>
<br class="clear" />
  </form>
</div>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "email");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
//-->
</script>

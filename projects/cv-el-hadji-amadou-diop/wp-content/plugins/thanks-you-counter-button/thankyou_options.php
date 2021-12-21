<?php
/* 
 * Settings form of Thank You Counter Button WordPress Plugin
 * 
 */

if (!defined('THANKS_PLUGIN_URL')) {
  die;  // Silence is golden, direct call is prohibited
}

$buttonColors = array('brown'=>'#ca6600', 
                      'blue'=>'#0031fb', 
                      'red'=>'#fd0031', 
                      'green'=>'#33ca00', 
                      'grey'=>'#ececec', 
                      'black'=>'#4c4c4c');

function thanks_displayBoxStart($title) {
?>
			<div class="postbox" style="float: left;">
				<h3 style="cursor:default;"><span><?php echo $title ?></span></h3>
				<div class="inside">
<?php
}
// 	end of thanks_displayBoxStart()

function thanks_displayBoxEnd() {
?>
				</div>
			</div>
<?php
}
// end of thanks_displayBoxEnd()

$shinephpFavIcon = THANKS_PLUGIN_URL.'/images/vladimir.png';
if (isset($_GET['action']) && isset($_GET['success']) && $_GET['success']==1) {
  if ($_GET['action']=='default') {
    $mess = __('Default Settings are restored','thankyou');
  } else if ($_GET['action']=='resetall') {
    $mess = __('All Thanks Counters are cleared','thankyou');
  }
  if ($mess) {
    echo '<div class="updated" style="margin:0;">'.$mess.'</div><br style="clear: both;"/>';
  }
}
?>
  
				<div id="poststuff">
					<div class="tycb-sidebar" >
						
<?php thanks_displayBoxStart(__('About this Plugin:', 'thankyou')); ?>
											<a class="thanks_rsb_link" style="background-image:url(<?php echo $shinephpFavIcon; ?>);" target="_blank" href="http://www.shinephp.com/"><?php _e("Author's website", 'thankyou'); ?></a>
											<a class="thanks_rsb_link" style="background-image:url(<?php echo THANKS_PLUGIN_URL.'/images/tycb.png'; ?>" target="_blank" href="http://www.shinephp.com/thank-you-counter-button-wordpress-plugin/"><?php _e('Plugin webpage', 'thankyou'); ?></a>
											<a class="thanks_rsb_link" style="background-image:url(<?php echo THANKS_PLUGIN_URL.'/images/tycb_help.png'; ?>" target="_blank" href="http://www.shinephp.com/thank-you-counter-button-wordpress-plugin/2/#filterhooks"><?php _e('Additional documentation', 'thankyou'); ?></a>
											<a class="thanks_rsb_link" style="background-image:url(<?php echo THANKS_PLUGIN_URL.'/images/tycb_changelog.png'; ?>);" target="_blank" href="http://www.shinephp.com/thank-you-counter-button-wordpress-plugin/2/#changelog"><?php _e('Changelog', 'thankyou'); ?></a>
											<a class="thanks_rsb_link" style="background-image:url(<?php echo THANKS_PLUGIN_URL.'/images/tycb_faq.png'; ?>)" target="_blank" href="http://www.shinephp.com/thank-you-counter-button-wordpress-plugin/2/#faq"><?php _e('FAQ', 'thankyou'); ?></a>
                      <a class="thanks_rsb_link" style="background-image:url(<?php echo THANKS_PLUGIN_URL.'/images/greetings.png'; ?>);" onclick="thanks_show_greetings()" href="#">Greetings</a>
                      <hr />
                      <div style="text-align: center;">
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                          <input type="hidden" name="cmd" value="_s-xclick">
                          <input type="hidden" name="encrypted" 
                                 value="-----BEGIN PKCS7-----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-----END PKCS7-----">
                          <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                          <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                        </form>
                      </div>                        
<?php thanks_displayBoxEnd(); ?>
          <div id="thanks_greetings" style="visibility: hidden;">  
<?php thanks_displayBoxStart(__('Greetings:','thankyou')); ?>
              <a class="thanks_rsb_link" style="background-image:url(<?php echo $shinephpFavIcon; ?>);" target="_blank" title="<?php _e("It's me, the author", 'thankyou'); ?>" href="http://www.shinephp.com/">Vladimir</a>
              <a class="thanks_rsb_link" style="background-image:url(<?php echo THANKS_PLUGIN_URL.'/images/pcde.png'; ?>);" target="_blank" title="<?php _e('for the help with Belarusian translation', 'thankyou'); ?>" href="http://pc.de">Marcis Gasuns</a>
              <a class="thanks_rsb_link" style="background-image:url(<?php echo THANKS_PLUGIN_URL.'/images/owen.png'; ?>);" target="_blank" title="<?php _e('for the help with Chinese translation', 'thankyou'); ?>" href="http://mencase.com">Owen</a>
              <a class="thanks_rsb_link" style="background-image:url(<?php echo THANKS_PLUGIN_URL.'/images/rene.png'; ?>);" target="_blank" title="<?php _e('for the help with Dutch translation', 'thankyou'); ?>" href="http://wpwebshop.com">Rene</a>
              <a class="thanks_rsb_link" style="background-image:url(<?php echo THANKS_PLUGIN_URL.'/images/whiler.png'; ?>);" target="_blank" title="<?php _e('for the help with French translation, ideas, source code contributions and new versions testing', 'thankyou'); ?>" href="http://blogs.wittwer.fr/whiler/">Whiler</a>
              <a class="thanks_rsb_link" style="background-image:url(<?php echo THANKS_PLUGIN_URL.'/images/tolingo.png'; ?>);" target="_blank" title="<?php _e('for the help with German translation', 'thankyou'); ?>" href="http://www.tolingo.com">www.tolingo.com</a>
              <a class="thanks_rsb_link" title="<?php _e('for the help with Hungarian translation', 'thankyou'); ?>" href="#">Nightmare</a>              
              <a class="thanks_rsb_link" style="background-image:url(<?php echo THANKS_PLUGIN_URL.'/images/ugo.png'; ?>);" target="_blank" title="<?php _e('for the help with Italian translation', 'thankyou'); ?>" href="http://www.myeasywp.com">Ugo</a>
              <a class="thanks_rsb_link" style="background-image:url(<?php echo THANKS_PLUGIN_URL.'/images/alessandro.png'; ?>);" target="_blank" title="<?php _e("for the help with Italian translation",'thankyou');?>" href="http://technodin.org">Alessandro Mariani</a>
              <a class="thanks_rsb_link" style="background-image:url(<?php echo THANKS_PLUGIN_URL.'/images/host1free.png'; ?>)" target="_blank" title="<?php _e("For the help with Lithuanian translation", 'ure'); ?>" href="http://host1free.com">Vincent G</a>
              <a class="thanks_rsb_link" style="background-image:url(<?php echo THANKS_PLUGIN_URL.'/images/omi.png'; ?>);" target="_blank" title="<?php _e('for the help with Spanish translation, ideas and new versions testing', 'thankyou'); ?>" href="http://equipajedemano.info/">Omi</a>
              <a class="thanks_rsb_link" style="background-image:url(<?php echo THANKS_PLUGIN_URL.'/images/sadri.png'; ?>)" target="_blank" title="<?php _e("For the help with Turkish translation", 'ure'); ?>" href="http://www.faydaliweb.com">Sadri Ercan</a>
              <br/>
              <a class="thanks_rsb_link" style="background-image:url(<?php echo THANKS_PLUGIN_URL.'/images/arne.png'; ?>);" target="_blank" title="<?php _e('for setting page layout idea and html markup examples', 'thankyou'); ?>" href="http://www.arnebrachhold.de/projects/wordpress-plugins/google-xml-sitemaps-generator/">Arne</a>
              <a class="thanks_rsb_link" style="background-image:url(<?php echo THANKS_PLUGIN_URL.'/images/simon.png'; ?>);" target="_blank" title="<?php _e('for the excelent JQuery color picker', 'thankyou'); ?>" href="http://www.supersite.me/website-building/jquery-free-color-picker/">Simon</a>
              <a class="thanks_rsb_link" style="background-image:url(<?php echo THANKS_PLUGIN_URL.'/images/dhtmlgoodies.png'; ?>);" target="_blank" title="<?php _e('for the form input slider code', 'thankyou'); ?>" href="http://www.dhtmlgoodies.com/">DHTMLGoodies</a>
              <a class="thanks_rsb_link" style="background-image:url(<?php echo THANKS_PLUGIN_URL.'/images/eric.png'; ?>);" target="_blank" title="<?php _e('for the cute online button image generator', 'thankyou'); ?>" href="http://www.glassybuttons.com/glassy.php">Eric</a>
<?php thanks_displayBoxEnd(); ?>
          </div>   						
					</div>

          <div class="tycb" >
<form method="post" action="options.php">
<?php
    settings_fields('thankyoubutton-options');
?>            

<script language="javascript" type="text/javascript">
  
  function thanks_show_greetings(message) {
    var el = document.getElementById('thanks_greetings');
    if (el.style.visibility=='visible') {
      el.style.visibility = 'hidden';
    } else {
      el.style.visibility = 'visible';
    }
  }

  
  function thanks_hideShowDiv(checkbox) {
    var el = document.getElementById('categorydiv')
    if (checkbox.checked) {
      el.style.display = 'block';
    } else {
      el.style.display = 'none';
    }
  }

  function thanks_hideShowSettingsShortcut(checkState) {
		if (checkState)
			document.getElementById('thanks_settings_shortcuts').style.display='inline-table';
		else
			document.getElementById('thanks_settings_shortcuts').style.display='none';
  }

  function thanks_Settings(action) {
    if (action=='cancel') {
      document.location = '<?php echo THANKS_WP_ADMIN_URL; ?>/options-general.php?page=thankyou.php';
    } else {
      if (action=='default') {
        var mess = '<?php echo thanks_esc_js(__('All settings for TYCB plugin will be return to the default values, Continue?','thankyou')); ?>';
      } else if (action=='resetall') {
        var mess = '<?php echo thanks_esc_js(__('All thanks counters for all posts will be set to 0,\n all thanks click history will be cleared, Continue?','thankyou')); ?>';
      }
      if (!confirm(mess)) {
        return false;
      }

      el = document.getElementById('ajax_loader_options');
      if (el!=undefined) {
        el.style.visibility = 'visible';
      }
      jQuery.ajax({
        type: "POST",
        url: ThanksSettings.plugin_url + '/thankyou-ajax.php',
        data: { 
                post_id: -1,
                action: action,
                _ajax_nonce: ThanksSettings.ajax_nonce
      },
      success: function(msg){
        if (msg.indexOf('error')>0) {
          alert(msg);
        } else {
          document.location = '<?php echo THANKS_WP_ADMIN_URL.'/options-general.php?page=thankyou.php&action='; ?>'+ action +'&success=1';
        }
      },
      error: function(msg) {
        alert(msg);
      }
      });
    }

  }
  // thanks_Settings()
  

  function switchDivDisplay(divName) {
    var divEl = document.getElementById(divName);
    if (divEl.style.display=='block') {
      divEl.style.display = 'none';
    } else {
      divEl.style.display = 'block';
    }
  }

  function refreshButtonCaption(newCaption) {

    el = document.getElementById('thanksButton_stylePreview');
    el.value = newCaption +' '+ Math.ceil(Math.random()*100);
    
  }
  // end of refreshButtonCaption();


  function refreshPreviewButton() {
    
    var el = document.getElementById('thanks_custom');
    if (!el.checked) {
      
      var size = 'compact';
      var el = document.getElementById('thanks_size_large');
      if (el.checked) {
        size = 'large';
      }
      
      var corners_form = '';
      var el = document.getElementById('thanks_form_rounded');
      if (el.checked) {
        corners_form = '1';
      } 
      
      el = document.getElementById("thanks_color");
      var color = el.options[el.selectedIndex].value;
      
      el = document.getElementById('thanksButton_stylePreview');
      if (size=='large') {
        oldClassName = 'thanks_'+ 'compact';
        el.style.width = '120px';
        el.style.height = '40px';
      } else {
        oldClassName = 'thanks_'+ 'large';
        el.style.width = '100px';
        el.style.height = '26px';
      }
      el.className = el.className.replace(oldClassName,'thanks_'+ size);              
      var buttonImageURL = '<?php echo THANKS_PLUGIN_URL; ?>/images/thanks_'+ size +'_'+ color + corners_form +'.png';
      el = document.getElementById('thanksButtonDiv_stylePreview');
      el.style.backgroundImage = 'url('+ buttonImageURL +')';
      ThanksSettings.button_image_url = buttonImageURL;
      ThanksSettings.button_image_glow_url = '<?php echo THANKS_PLUGIN_URL; ?>/images/thanks_'+ size +'_'+ color + corners_form +'_glow.png';
    } else {
      el = document.getElementById('thanksButtonDiv_stylePreview');
      var buttonImageURL = document.getElementById('thanks_custom_url').value;
      el.style.backgroundImage = 'url('+ buttonImageURL +')';      
      el = document.getElementById('thanksButton_stylePreview');
      el.className = el.className.replace('thanks_compact','thanks_custom');        
      el.className = el.className.replace('thanks_large','thanks_custom'); 
      var value = document.getElementById('thanks_custom_width').value;
      if (value.indexOf('px')<0) {
        value += 'px';
      } 
      el.style.width = value;
      var value = document.getElementById('thanks_custom_height').value;
      if (value.indexOf('px')<0) {
        value += 'px';
      } 
      el.style.height = value;
      ThanksSettings.button_image_url = buttonImageURL;
      var buttonImageGlowURL = document.getElementById('thanks_custom_glow_url').value;
      if (buttonImageGlowURL!='') {
        ThanksSettings.button_image_glow_url = buttonImageGlowURL;
      } else {
        ThanksSettings.button_image_glow_url = buttonImageURL;
      }
    }
  }
  // end of refreshPreviewButton();


  function refreshButtonCaptionColor(newColor) {
    el = document.getElementById('thanksButton_custom');
    el.style.color = newColor;

    el = document.getElementById('thanksButton_stylePreview');
    el.style.color = newColor;
  }
  // end of refreshButtonCaptionColor()


  function refreshButtonCaptionStyle(newStyle) {
    //font-family: Verdana, Arial, Sans-Serif; font-size: 14px; font-weight: normal;
    var newStyles = newStyle.split(';');
    var fontFamily =  ''; var fontWeight = ''; var fontSize = '';
    el = document.getElementById('thanksButton_custom');
    el.style.fontFamily = fontFamily;
    el.style.fontSize = fontSize;
    el.style.fontWeight = fontWeight;

    el = document.getElementById('thanksButton_stylePreview');
    el.style.fontFamily = fontFamily;
    el.style.fontSize = fontSize;
    el.style.fontWeight = fontWeight;
  }
  // end of refreshButtonCaptionStyle()

  
  function thanksCustomWidthChange(newValue) {
    var el = document.getElementById('thanksButton_custom');
    if (newValue.indexOf('px')<0) {
      newValue = newValue +'px';
    }
    el.style.width = newValue;
  }
  // end of thanksCustomWidthChange()

  function thanksCustomHeightChange(newValue) {
    var el = document.getElementById('thanksButton_custom');
    if (newValue.indexOf('px')<0) {
      newValue = newValue +'px';
    }
    el.style.height = newValue;
  }
  // end of thanksCustomWidthChange()

  function buttonDivStyleChange(newStyle) {
    var el = document.getElementById('thanks_button_preview');
    el.setAttribute("style", newStyle);
    el.style.cssText = newStyle;

  }
  // end of buttonDivStyleChange()

  function checkBoxChange(cb, elName) {
    el = document.getElementById(elName);
    if (cb.checked) {
      el.style.visibility = 'visible';
    } else {
      el.style.visibility = 'hidden';
    }
  }
  // end of checkBoxChange()

</script>

<div class="postbox" style="padding-bottom: 10px;">
  <h3><?php	_e('Display', 'thankyou'); ?></h3>
        <table class="form-table" style="clear:none;" cellpadding="0" cellspacing="0">          
          <tr>
            <th scope="row">
	             <?php _e('Display','thankyou'); ?>
            </th>
            <td>
                <input type="checkbox" value="1" <?php echo ($thanks_display_page=='1') ? 'checked="checked"' : ''; ?>
                       name="thanks_display_page" id="thanks_display_page" />
                <label for="thanks_display_page"><?php _e('Display button at Pages','thankyou'); ?></label><br/>
                <input type="checkbox" value="1" <?php echo ($thanks_display_home=='1') ? 'checked="checked"' : ''; ?>
                       name="thanks_display_home" id="thanks_display_home" />
                <label for="thanks_display_home"><?php _e('Display button at Home page, Categories/Tags archive pages','thankyou'); ?></label><br/>                
                <input type="checkbox" value="1" <?php echo ($thanks_not_display_for_categories=='1') ? 'checked="checked"' : ''; ?>
                       name="thanks_not_display_for_categories" id="thanks_not_display_for_categories" onclick="thanks_hideShowDiv(this)"/>
                
                <label for="thanks_not_display_for_categories">
<?php _e('Do not show button for selected categories','thankyou');
  $categories = get_terms('category', array('hierarchical' => true));

?>
                </label>
                <div id="categorydiv" class="postbox" style="width:350px;margin-bottom: 0px;display:<?php echo ($thanks_not_display_for_categories) ? 'block':'none';?>">
                  <div id="categories-all" class="tabs-panel">
                  <ul>
<?php
  
  foreach ($categories as $i=>$category) {
    if ($category->parent) {
      continue;
    }
    $checked = '';
    if (is_array($thanks_not_display_for_cat_list) and count($thanks_not_display_for_cat_list)) {
      foreach($thanks_not_display_for_cat_list as $catId) {
        if ($catId==$category->term_id) {
          $checked = 'checked="checked"';
          break;
        }
      }
    }
?>
   <li><input type="checkbox" name="thanks_not_display_for_cat_list[]" value="<?php echo $category->term_id;?>" <?php echo $checked; ?> />
<?php echo $category->name; ?>
   </li>
<?php
    $children = get_terms('category', array('hierarchical' => false, 'child_of' => $category->term_id));
    foreach ($children as $subcategory) {
      $checked = '';
      if (is_array($thanks_not_display_for_cat_list) and count($thanks_not_display_for_cat_list)) {
        foreach($thanks_not_display_for_cat_list as $catId) {
          if ($catId==$subcategory->term_id) {
            $checked = 'checked="checked"';
            break;
          }
        }
      }
?>
      <li>&nbsp;&nbsp;&nbsp;<input type="checkbox" name="thanks_not_display_for_cat_list[]" value="<?php echo $subcategory->term_id;?>" <?php echo $checked; ?> />
        <?php echo $subcategory->name; ?>
      </li>
<?php
    }
  }

?>
                  </ul>
                  </div>
                </div>                
            </td>
          </tr>
          <tr>
          <th scope="row">
            <?php _e('Position in the Post text', 'thankyou'); ?>
          </th>
          <td>
            <div>
              <span style="float: left; width: 140px;"><input type="checkbox" name="thanks_position_before" value="1" <?php echo thanks_optionChecked($thanks_position_before, 1); ?> onchange="checkBoxChange(this, 'thanks_position_firstpageonly');"/> <?php _e('Before', 'thankyou'); ?></span>
              <div id="thanks_position_firstpageonly" style="<?php echo ($thanks_position_before) ? 'visibility: visible;':'visibility: hidden'; ?>" >
                <input type="checkbox" name="thanks_position_firstpageonly" value="1" <?php echo thanks_optionChecked($thanks_position_firstpageonly, 1); ?> /> <?php _e('At first page of multipaged posts only', 'thankyou'); ?>
              </div>
            </div>
            <div>
              <span style="float: left; width: 140px;"><input type="checkbox" name="thanks_position_after" value="1" <?php echo thanks_optionChecked($thanks_position_after, 1); ?> onchange="checkBoxChange(this, 'thanks_position_lastpageonly');"/> <?php _e('After', 'thankyou'); ?></span>
              <div id="thanks_position_lastpageonly" style="<?php echo ($thanks_position_after) ? 'visibility: visible;':'visibility: hidden'; ?>" >
                <input type="checkbox" name="thanks_position_lastpageonly" id="thanks_position_lastpageonly" value="1" <?php echo thanks_optionChecked($thanks_position_lastpageonly, 1); ?> /> <?php _e('At last page of multipaged posts only', 'thankyou'); ?>
              </div>
            </div>
            <div>
              <input type="checkbox" name="thanks_position_shortcode" value="1" <?php echo thanks_optionChecked($thanks_position_shortcode, 1); ?> /> <?php _e('Shortcode [thankyou]','thankyou'); ?>
              <input type="checkbox" name="thanks_position_manual" value="1" <?php echo thanks_optionChecked($thanks_position_manual, 1); ?> /> <?php _e('Manual','thankyou'); ?>
            </div>
          </td>
        </tr>
        <tr>
          <th scope="row">
	           <label for="thanks_caption"><?php _e('Button Caption','thankyou'); ?></label>
          </th>
          <td>
             <input type="text" value="<?php echo $thanks_caption; ?>" name="thanks_caption" id="thanks_caption" onkeyup="refreshButtonCaption(this.value);" onchange="refreshButtonCaption(this.value);"/>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="thanks_style"><?php _e('Button Styling','thankyou'); ?></label></th>
          <td>
            <span class="setting-description" style="float: left; width: 150px;"><?php _e('Add style to the div:','thankyou');?></span>
            <input type="text" value="<?php echo htmlspecialchars($thanks_style); ?>" name="thanks_style" id="thanks_style" size="40" onchange="buttonDivStyleChange(this.value);"/>
            <a href="javascript:void(0);" onclick="switchDivDisplay('buttonDivStyleHelp');"><img src="<?php echo THANKS_PLUGIN_URL.'/images/question_grey.png';?>" alt="question sign" title="float: left; margin-right: 10px;"/></a><br/>
            <div id="buttonDivStyleHelp" style="display: none;"><span class="setting-description"><?php _e('e.g.,','thankyou');?> <code>float: left; margin-right: 10px;</code></span></div>
            <span class="setting-description" style="float: left; width: 150px;"><?php _e('to the Caption font:','thankyou');?></span>
            <input type="text" value="<?php echo htmlspecialchars($thanks_caption_style); ?>" name="thanks_caption_style" id="thanks_caption_style" size="40" onchange="refreshButtonCaptionStyle(this.value);"/>
            <a href="javascript:void(0);" onclick="switchDivDisplay('buttonFontStyleHelp');"><img src="<?php echo THANKS_PLUGIN_URL.'/images/question_grey.png';?>" alt="question sign" title="font-family: Sans-Serif; font-size: 14px; font-weight: normal;"/></a>
            <div id="buttonFontStyleHelp" style="display: none;"><span class="setting-description"><?php _e('e.g.,','thankyou');?><code>font-family: Sans-Serif; font-size: 14px; font-weight: normal;</code></span></div>
            <div><?php _e('font color: ','thankyou');?><input name="thanks_caption_color" id="thanks_caption_color" class="iColorPicker" value="<?php echo $thanks_caption_color; ?>" type="text" size="10" onchange="refreshButtonCaptionColor(this.value);"></div>
          </td>
        </tr>
        <tr>
          <th scope="row">
            <?php _e('Button grafics','thankyou'); ?>
          </th>
          <td>
            <span style="font-size: 12px;"><?php _e('Size','thankyou'); ?>:</span>  
              <input type="radio" name="thanks_size" id="thanks_size_large"<?php echo ($thanks_size=='large') ? 'checked="checked"' : ''; ?>
                     value="large" onclick="refreshPreviewButton();"/>
              <label for="thanks_size_large"><?php _e('Normal','thankyou'); ?></label>&nbsp;
              <input type="radio" name="thanks_size" id="thanks_size_compact" <?php echo ($thanks_size=='compact') ? 'checked="checked"' : ''; ?>
                     value="compact" onclick="refreshPreviewButton();"/>
              <label for="thanks_size_compact"><?php _e('Compact','thankyou'); ?></label>
              <span style="margin-left:40px;font-size: 12px;"><?php _e('Form', 'thankyou'); ?>:</span>
              <input type="radio" name="thanks_form" id="thanks_form_square" <?php echo ($thanks_form=='square') ? 'checked="checked"' : ''; ?>
                     value="square" onclick="refreshPreviewButton();"/>
              <label for="thanks_form_square"><?php _e('Square','thankyou'); ?></label>&nbsp;
              <input type="radio" name="thanks_form" id="thanks_form_rounded" <?php echo ($thanks_form=='rounded') ? 'checked="checked"' : ''; ?>
                     value="rounded" onclick="refreshPreviewButton();"/>
              <label for="thanks_form_rounded"><?php _e('Rounded','thankyou'); ?></label>
          </td>
        </tr>

        <tr>
          <th scope="row">
            <?php _e('Color', 'thankyou'); ?>
          </th>
          <td>
            <select id="thanks_color" name="thanks_color" onchange="refreshPreviewButton();" >
<?php
  foreach ($buttonColors as $key=>$value) {
    if ($key=='grey') {
      $color = 'black';
    } else {
      $color = 'white';
    }
    echo '<option value="'.$key.'" style="background:'.$value.'; color: '.$color.';" '.(($thanks_color==$key) ? 'selected="selected"' : '').' >&nbsp;'.ucfirst($key).'&nbsp;</option>';
  }
?>
            </select>
          </td>
        </tr>

        <tr>
          <td>
            <input type="checkbox" id="thanks_custom" name="thanks_custom" value="1" <?php echo ($thanks_custom=='1') ? 'checked="checked"' : ''; ?> onclick="refreshPreviewButton();"/>
            <?php _e('Custom button image URL', 'thankyou'); ?><br />
            <?php _e('Hover state image URL', 'thankyou'); ?>
          </td>
          <td>
            <input type="text" id="thanks_custom_url" name="thanks_custom_url" value="<?php echo $thanks_custom_URL; ?>"  size="80" onchange="refreshPreviewButton();" />
            <a href="javascript:void(0);" onclick="switchDivDisplay('customButtonDivStyleHelp');"><img src="<?php echo THANKS_PLUGIN_URL.'/images/question_grey.png';?>" alt="question sign" title="http://yourblog.com/wp-content/uploads/2009/10/your-button.png"/></a><br />
            <input type="text" id="thanks_custom_glow_url" name="thanks_custom_glow_url" value="<?php echo $thanks_custom_glow_URL; ?>"  size="80" onchange="refreshPreviewButton();" />
            <div id="customButtonDivStyleHelp" style="display:none;"><?php _e('e.g.,','thankyou'); ?> <code>http://yourblog.com/wp-content/uploads/2009/10/your-button.png</code></div>
            <div>
              <span style="float:left; width:210px;"><?php _e('Width, px', 'thankyou'); ?> <input type="text" id="thanks_custom_width" name="thanks_custom_width" value="<?php echo $thanks_custom_width; ?>" size="4" onchange="refreshPreviewButton();" /></span>
              <span style="float:left; width:210px;"><?php _e('Height, px', 'thankyou'); ?> <input type="text" id="thanks_custom_height" name="thanks_custom_height" value="<?php echo $thanks_custom_height; ?>" size="4" onchange="refreshPreviewButton();" /></span>
            </div>            
          </td>
        </tr>
      </table>
  
<h3><?php _e('Button DIV Style Preview', 'thankyou'); $thanks_display_anchor = 1; ?></h3>
								<div class="column-parent" style="background:#FFFFFF; ">
<?php

  if ($thanks_custom) {
    $thanks_width = $thanks_custom_width;
    $thanks_height = $thanks_custom_height;
  } else {
    $thanks_width = '';
    $thanks_height = '';
  }

  $inputButtonHTML = thanks_getButtonInputHTML('javascript:void(0);', $thanks_caption.' '.rand(0, 100), $buttonSizeClass, $buttonColorClass,
     $imageURL, $thanks_width, $thanks_height, $thanks_caption_style, $thanks_caption_color, 'stylePreview', 'Thank You Counter Button Preview');
  
  echo '<div class="thanks_button_div" id="thanks_button_preview" style="'.$thanks_style.'">'.
      $inputButtonHTML.
   		'<div id="thanks_settings_shortcuts" class="thanks_settings_shortcuts'.(($thanks_display_settings_shortcuts == '1')?'':'_off').'">'.
 			'<a href="javascript:void;" title="'.__('Settings','thankyou').'"><img class="thanks_shortcuts" height="8" width="8" alt="thank_you_settings" src="'.THANKS_PLUGIN_URL.'/images/settings.png" /></a>'.
 			'<a href="javascript:void;" title="'.esc_attr(sprintf(__('View statistics details for "%s"', 'thankyou'), __('Post Title','thankyou'))).'"><img class="thanks_shortcuts" height="8" width="8" alt="thank_you_settings" src="'.THANKS_PLUGIN_URL.'/images/stats.png" /></a>'.
 			'<a title="'.__('Hide these shortcuts', 'thankyou').'" href="javascript:void;"><img class="thanks_shortcuts" height="8" width="8" alt="thank_you_settings" src="'.THANKS_PLUGIN_URL.'/images/disable.png" /></a>'.
 			'</div></div>';
?>
                  <p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer bibendum turpis vitae lectus semper feugiat. Ut massa ligula, sodales dictum porta ac, varius ut felis. Quisque ultrices elementum ligula euismod auctor. Sed non orci at augue gravida tincidunt dictum sit amet enim. Phasellus ultrices quam ac ligula convallis nec pellentesque ante luctus. Duis aliquet mattis velit, eu blandit nisi euismod et. Suspendisse hendrerit nisl dui. Quisque eu odio felis, id consequat turpis. In rhoncus turpis nec sapien convallis at vehicula dui pharetra. Morbi in nunc ut nibh faucibus dignissim nec sit amet arcu. Nulla facilisi. Praesent suscipit vestibulum ipsum, ut ornare tortor posuere at. Nullam id erat eu sem blandit gravida iaculis faucibus magna. In tempus blandit nulla, in consectetur diam tempor in. Etiam a justo vitae est tristique fermentum vitae at arcu.</p>
								</div>

      <h3><?php _e('Miscellaneous:', 'thankyou'); ?></h3>
      <table class="form-table" style="clear:none;" cellpadding="0" cellspacing="0">
        <tr>
          <th scope="row">
              <?php _e('Check IP-address','thankyou'); ?>
          </th>
          <td>
            <input type="checkbox" value="1" <?php echo ($thanks_check_ip_address=='1') ? 'checked="checked"' : ''; ?>
                   name="thanks_check_ip_address" id="thanks_check_ip_address" />
            <label for="thanks_check_ip_address"><?php _e('Only one Thanks for post for one IP-address limit','thankyou'); ?></label><br/>
            <?php _e('Time limit:', 'thankyou'); ?>
            <div style="display:inline-table;"><label for="thanks_time_limit1"><input type="radio" value="1" name="thanks_time_limit[]" id="thanks_time_limit1" <?php echo ($thanks_time_limit[0]=='1') ? 'checked="checked"' : ''; ?> />
            <?php _e('Forever','thankyou'); ?></label><br/>
            <label for="thanks_time_limit2"><input type="radio" value="2" name="thanks_time_limit[]" id="thanks_time_limit2" <?php echo ($thanks_time_limit[0]=='2') ? 'checked="checked"' : ''; ?> />
            <?php _e('Only for this period','thankyou'); ?></label>            
          <input type="text" name="thanks_time_limit_seconds" id="thanks_time_limit_seconds" value="<?php echo $thanks_time_limit_seconds; ?>" size="10" />
            <?php _e('seconds', 'thankyou'); ?></div>
          </td>
        </tr>
        <tr>
          <th scope="row">
              <?php _e('Display settings shortcuts','thankyou'); ?>
          </th>
          <td>
            <input type="checkbox" value="1" <?php echo ($thanks_display_settings_shortcuts == '1') ? 'checked="checked"' : ''; ?>
                   name="thanks_display_settings_shortcuts" id="thanks_display_settings_shortcuts" onchange="javascript:thanks_hideShowSettingsShortcut(this.checked);" />
            <label for="thanks_display_settings_shortcuts"><?php _e('Add shortcuts next to the buttons for settings quick access','thankyou'); ?></label>
          </td>
        </tr>
        </table>
      <div class="submit">
        <div style="float: left; ">
          <input type="submit" name="submit" value="<?php _e('Save Changes', 'thankyou'); ?>" title="<?php _e('Save Changes', 'thankyou'); ?>" />
          <input type="button" name="cancel" value="<?php _e('Cancel', 'thankyou') ?>" title="<?php _e('Cancel not saved changes', 'thankyou'); ?>" onclick="thanks_Settings('cancel');"/>
        </div>
        <div style="float: right; ">
          <input class="warning" type="button" name="default" value="<?php _e('Return to Defaults', 'thankyou') ?>" title="<?php _e('Restore the default values for all settings', 'thankyou'); ?>" onclick="thanks_Settings('default');"/>
          <input class="warning" type="button" name="reset" value="<?php _e('Reset Counters', 'thankyou') ?>" title="<?php _e('Reset all thanks counters for the all posts', 'thankyou'); ?>" onclick="thanks_Settings('resetall');"/>
        </div>             
      </div>
          
      <div id="ajax_loader_options" style="float: right; display:inline;visibility: hidden;"><img alt="ajax loader" src="<?php echo THANKS_PLUGIN_URL . '/images/ajax-loader.gif'; ?>" /></div>
      </div>
    </form> 
  </div>

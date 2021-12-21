<?php 

/* 
	Options	Case
	Author: Tyler Cuningham
	Establishes the theme options case.
	Copyright (C) 2011 CyberChimps
	Version 2.0
	
*/

	global  $themename, $themeslug, $options;		
		
foreach ($optionlist as $value) {  
switch ( $value['type'] ) {
 
case "open":
?>

<table width="100%" border="0" style="padding:10px;">

 
<?php break;
 
case "close":
?>


</table><br />
 
<?php break;


case "open-tab":
?>

<div id="<?php echo $value['id']; ?>">

 
<?php break;
 
case "close-tab":
?>


</div>

<?php break; 

case 'blog_title':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><font size="4"><b>BLOG OPTIONS</b></font> </td>
    <td width="85%"></td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'slider_title':  
?>  
  
<tr>

    <td width="20%" rowspan="2" valign="middle"><font size="4"><b>SLIDER OPTIONS</b></font> </td>
    <td width="80%"></td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'seo_title':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><font size="4"><b>SEO OPTIONS</b></font> </td>
    <td width="85%"></td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'general_faq':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">Read the <a href="http://cyberchimps.com/question/droidpress-general-settings-tab/" target="_blank">General Options FAQ</a></td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'design_faq':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">Read the <a href="http://cyberchimps.com/question/droidpress-design-settings-tab/" target="_blank">Design Options FAQ</a></td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'social_faq':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">Read the <a href="http://cyberchimps.com/question/droidpress-social-settings-tab/" target="_blank">Social Options FAQ</a></td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'blog_faq':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">Read the <a href="http://cyberchimps.com/question/droidpress-blog-settings-tab/" target="_blank">Blog Options FAQ</a></td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'footer_faq':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">Read the <a href="http://cyberchimps.com/question/pro-footer-settings-tab/" target="_blank">Footer Options FAQ</a></td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'upload2':
?>   


<tr>

<td width="15%" rowspan="2" valign="middle"><strong>Custom Favicon</strong>


 
<tr>
<td width="85%">

<br />
    <?php settings_fields($themeslug.'_options'); ?>
    <?php do_settings_sections(''.$themeslug.'');  
    
    $file2 = $options['file2'];
    
    if ($file2 != ''){
    
    echo "Favicon preview:<br /><br /><img src='{$file2['url']}'><br /><br /><br />";}
    echo "<input type='text' name='favicon_filename_text' size='72' value='{$file2['url']}'/>";
    echo "<br />" ;
    echo "<br />" ;
    echo "<input type='file' name='favicon_filename' size='30' />";?>

    
    <br />
    <small>Upload a favicon image to use, press "save settings" to save image.</small>


<?php
	$value = isset($options['file2']) ? $options['file2'] : '';
?>

</td>
</tr>
 
        <tr>
<td><small></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php break; 

case 'excerpts':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    <br />
    <input type="checkbox" id="<?php echo $themename ;?>[<?php echo $themeslug ;?>_show_excerpts]" name="<?php echo $themename ;?>[<?php echo $themeslug ;?>_show_excerpts]" value="1" <?php checked( '1', $options[$themeslug.'_show_excerpts'] ); ?>> - Show Excerpts
<br /><br />

	<?php
		if (isset($options[$themeslug.'_excerpt_link_text']) == "")
			$textlink = '(Read More...)';
			
		else
			$textlink = $options[$themeslug.'_excerpt_link_text']; 
	?>
	
   <input type="text" id="<?php echo $themename ;?>[<?php echo $themeslug ;?>_excerpt_link_text]" name="<?php echo $themename ;?>[<?php echo $themeslug ;?>_excerpt_link_text]" value="<?php echo $textlink ;?>"> - Excerpt Link Text
<br /><br />

	<?php
		if (isset($options[$themeslug.'_excerpt_length']) == "")
			$length = '55';
			
		else
			$length = $options[$themeslug.'_excerpt_length']; 
	?>

     <input type="text" id="<?php echo $themename ;?>[<?php echo $themeslug ;?>_excerpt_length]" name="<?php echo $themename ;?>[<?php echo $themeslug ;?>_excerpt_length]" value="<?php echo $length ;?>" > - Excerpt Character Length
<br /><br />

</td>
  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
break;


case 'post':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    <br />
    <input type="checkbox" id="<?php echo $themename ;?>[<?php echo $themeslug ;?>_hide_author]" name="<?php echo $themename ;?>[<?php echo $themeslug ;?>_hide_author]" value="1" <?php checked( '1', $options[$themeslug.'_hide_author'] ); ?>> - Author
<br /><br />

   <input type="checkbox" id="<?php echo $themename ;?>[<?php echo $themeslug ;?>_hide_categories]" name="<?php echo $themename ;?>[<?php echo $themeslug ;?>_hide_categories]" value="1" <?php checked( '1', $options[$themeslug.'_hide_categories'] ); ?>> - Categories
<br /><br />

   <input type="checkbox" id="<?php echo $themename ;?>[<?php echo $themeslug ;?>_hide_date]" name="<?php echo $themename ;?>[<?php echo $themeslug ;?>_hide_date]" value="1" <?php checked( '1', $options[$themeslug.'_hide_date'] ); ?>> - Date
<br /><br />

   <input type="checkbox" id="<?php echo $themename ;?>[<?php echo $themeslug ;?>_hide_comments]" name="<?php echo $themename ;?>[<?php echo $themeslug ;?>_hide_comments]" value="1" <?php checked( '1', $options[$themeslug.'_hide_comments'] ); ?>> - Comments
<br /><br />

   <input type="checkbox" id="<?php echo $themename ;?>[<?php echo $themeslug ;?>_hide_share]" name="<?php echo $themename ;?>[<?php echo $themeslug ;?>_hide_share]" value="1" <?php checked( '1', $options[$themeslug.'_hide_share'] ); ?>> - Share
<br /><br />

   <input type="checkbox" id="<?php echo $themename ;?>[<?php echo $themeslug ;?>_hide_tags]" name="<?php echo $themename ;?>[<?php echo $themeslug ;?>_hide_tags]" value="1" <?php checked( '1', $options[$themeslug.'_hide_tags'] ); ?>> - Tags
<br /><br />

</td>
  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
break;
 
case 'color2':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    
<?php

	if (isset($options[$themeslug.'_link_color']) == "") {
		$picker = '3B5A7B';
	}
			
	else {
		$picker = $options[$themeslug.'_link_color']; 
	}
?>

<input type="text" class="color{required:false}" id="<?php echo $themename ;?>[<?php echo $themeslug ;?>_link_color]" name="<?php echo $themename ;?>[<?php echo $themeslug ;?>_link_color]"  value="<?php echo $picker ;?>" style="width: 300px;" maxlength="6">   

<br /><br />
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break; 

case 'color8':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    
<?php

	if (isset($options[$themeslug.'_footer_color']) == "") {
		$picker = '222';
	}		
	else {
		$picker = $options[$themeslug.'_footer_color']; 
	}
?>

<br />
<input type="text" class="color{required:false}" id="<?php echo $themename ;?>[<?php echo $themeslug ;?>_footer_color]" name="<?php echo $themename ;?>[<?php echo $themeslug ;?>_footer_color]"  value="<?php echo $picker ;?>" style="width: 300px;" maxlength="6">   

<br /><br />
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break; 
 
case 'facebook':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo $themename.'['.$value['id'].']'; ?>" id="<?php echo $themeslug.'['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="<?php echo $themename ;?>[<?php echo $themeslug ;?>_hide_facebook]" name="<?php echo $themename ;?>[<?php echo $themeslug ;?>_hide_facebook]" value="1" <?php checked( '1', $options[$themeslug.'_hide_facebook'] ); ?>> - Check this box to hide the Facebook icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
break;


case 'twitter':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo $themename.'['.$value['id'].']'; ?>" id="<?php echo $themeslug.'['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="<?php echo $themename ;?>[<?php echo $themeslug ;?>_hide_twitter]" name="<?php echo $themename ;?>[<?php echo $themeslug ;?>_hide_twitter]" value="1" <?php checked( '1', $options[$themeslug.'_hide_twitter'] ); ?>> - Check this box to hide the Twitter icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'gplus':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo $themename.'['.$value['id'].']'; ?>" id="<?php echo $themeslug.'['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="<?php echo $themename ;?>[<?php echo $themeslug ;?>_hide_gplus]" name="<?php echo $themename ;?>[<?php echo $themeslug ;?>_hide_gplus]" value="1" <?php checked( '1', $options[$themeslug.'_hide_gplus'] ); ?>> - Check this box to hide the Google + icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;


case 'linkedin':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo $themename.'['.$value['id'].']'; ?>" id="<?php echo $themeslug.'['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="<?php echo $themename ;?>[<?php echo $themeslug ;?>_hide_linkedin]" name="<?php echo $themename ;?>[<?php echo $themeslug ;?>_hide_linkedin]" value="1" <?php checked( '1', $options[$themeslug.'_hide_linkedin'] ); ?>> - Check this box to hide the LinkedIn icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;


case 'youtube':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo $themename.'['.$value['id'].']'; ?>" id="<?php echo $themeslug.'['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="<?php echo $themename ;?>[<?php echo $themeslug ;?>_hide_youtube]" name="<?php echo $themename ;?>[<?php echo $themeslug ;?>_hide_youtube]" value="1" <?php checked( '1', $options[$themeslug.'_hide_youtube'] ); ?>> - Check this box to hide the YouTube icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'email':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo $themename.'['.$value['id'].']'; ?>" id="<?php echo $themeslug.'['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="<?php echo $themename ;?>[<?php echo $themeslug ;?>_hide_email]" name="<?php echo $themename ;?>[<?php echo $themeslug ;?>_hide_email]" value="1" <?php checked( '1', $options[$themeslug.'_hide_email'] ); ?>> - Check this box to hide the Email icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'rss':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo $themename.'['.$value['id'].']'; ?>" id="<?php echo $themeslug.'['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="<?php echo $themename ;?>[<?php echo $themeslug ;?>_hide_rss]" name="<?php echo $themename ;?>[<?php echo $themeslug ;?>_hide_rss]" value="1" <?php checked( '1', $options[$themeslug.'_hide_rss'] ); ?>> - Check this box to hide the RSS icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break; 

 
case 'textarea':
?>
 
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong></label> <br /><small><?php echo $value['desc']; ?></small> </td> 
    <td width="85%"><textarea id="<?php echo $themename.'['.$value['id'].']'; ?>" name="<?php echo $themename.'['.$value['id'].']'; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo stripslashes( $options[$value['id']] ); ?></textarea></td>  
 
  
 </tr>
 <tr>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr>
<?php break; 

case 'textarea2':
?>
 
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong></label> <br /><small><?php echo $value['desc']; ?></small> </td> 
    <td width="85%"><br /><textarea id="<?php echo $themename.'['.$value['id'].']'; ?>" name="<?php echo $themename.'['.$value['id'].']'; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo stripslashes( $options[$value['id']] ); ?></textarea></td>  
 
  
 </tr>
 <tr>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr>
<?php break;

case 'text':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo $themename.'['.$value['id'].']'; ?>" id="<?php echo $themeslug.'['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" /></td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'text2':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><br /><input style="width:300px;" name="<?php echo $themename.'['.$value['id'].']'; ?>" id="<?php echo $themeslug.'['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" /></td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'featured':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo $themename.'['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_featured_images as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select><br /></br>

Define a custom Featured Image size below (default is 100 by 100):

<br /><br />

<?php

	if (isset($options[$themeslug.'_featured_image_height']) == "") {
			$featureheight = '100';
	}		
	
	else {
		$featureheight = $options[$themeslug.'_featured_image_height']; 
	}
	
		if (isset($options[$themeslug.'_featured_image_width']) == "") {
			$featurewidth = '100';
	}		
	
	else {
		$featurewidth = $options[$themeslug.'_featured_image_width']; 
	}
	
?>

<input type="text" id="<?php echo $themename ;?>[<?php echo $themeslug ;?>_featured_image_height]" name="<?php echo $themename ;?>[<?php echo $themeslug ;?>_featured_image_height]"  value="<?php echo $featureheight ;?>" style="width: 300px;"> - Height

<br /><br />

<input type="text" id="<?php echo $themename ;?>[<?php echo $themeslug ;?>_featured_image_width]" name="<?php echo $themename ;?>[<?php echo $themeslug ;?>_featured_image_width]"  value="<?php echo $featurewidth ;?>" style="width: 300px;"> - Width

</td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'select2':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo $themename.'['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_font as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select>
<br /> 

</td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'select8':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo $themename.'['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_sidebar_type as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select>


</td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;
 
case "checkbox":
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%">
<input type="checkbox" name="<?php echo $themename.'['.$value['id'].']'; ?>" id="<?php echo $themename.'['.$value['id'].']'; ?>" value="1" <?php checked( '1', $options[$value['id']] ); ?>/>
</td>
</tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php break;
}
}
?>
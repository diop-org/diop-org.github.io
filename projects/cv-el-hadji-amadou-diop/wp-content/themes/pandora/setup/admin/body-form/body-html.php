<?php
//this is the admin user interface
function pandora_admin_main_form(){
	global $pandora_siteurl, $pandora_options;
	
	?><div class="wrap-es">
		<form action="" method="post">
			<h3><?php _e('Body settings', 'pandora'); ?></h3>						
			<div style="clear:both;height:10px;"></div> 
			<table class="table-options">
				<tr class="title-row">
					<td class="title-desc">
						<?php _e( 'Number of the images in Slider:', 'pandora') ?>
					</td>
					<td class="options-input">
						<input name="pan_slider_number" id="pan_slider_number" type="text" value="<?php echo $pandora_options['pan_slider_number'] ?>" />
						<br />
						<?php _e( 'Notice: recomended image sizes is 1000x300 pixels in jpg format.', 'pandora') ?>
					</td><!-- new fill ///////////////////////////////////////////////// -->
				</tr>
				<tr class="title-row">
					<td class="title-desc">
						<?php _e( 'Post Category for Slider:', 'pandora') ?>
					</td>
					<td class="options-input">
						<select name="pan_slider_cat" id="pan_slider_cat">
						<?php
							$pandora_cats = get_categories();
							foreach ($pandora_cats as $cat){
								$selected = "";
								if ($cat->cat_ID == $pandora_options['pan_slider_cat']){
									$selected = "SELECTED";
								}
								?><option value="<?php echo $cat->cat_ID ?>"<?php echo $selected ?>><?php echo $cat->cat_name ?></option><?php
							}						
						?>
						</select>
						<br />
						<?php _e( 'The featured images of posts will be displayed from this category like a slider category. Example, category name: Leader Posts', 'pandora') ?>
					</td><!-- new fill ///////////////////////////////////////////////// -->
				</tr>
				<tr class="title-row">
					<td class="title-desc">
						<?php _e( 'Newest Posts/Page:' , 'pandora') ?>
					</td>
					<td class="options-input">
						<input name="pan_news" id="pan_news" type="text" value="<?php echo $pandora_options['pan_new_post'] ?>" />
						<br />
						<?php _e( 'Number of the newest Posts on the Index page. It is display Featured view. It\'s so big.', 'pandora') ?>
					</td><!-- new fill ///////////////////////////////////////////////// -->
				</tr>
				<tr class="title-row">
					<td class="title-desc">
						<?php _e( 'Normal Posts/Page:' , 'pandora') ?>
					</td>
					<td class="options-input">
						<input name="pan_normals" id="pan_normals" type="text" value="<?php echo $pandora_options['pan_normal_post'] ?>" />
						<br />
						<?php _e( 'Number of the not new but not old Posts on the Index page. They have normal sizes (Classic view).', 'pandora') ?>
					</td><!-- new fill ///////////////////////////////////////////////// -->
				</tr>
				<tr class="title-row">
					<td class="title-desc">
						<?php _e( 'Old Posts/Page:' , 'pandora') ?>
					</td>
					<td class="options-input">
						<input name="pan_olds" id="pan_olds" type="text" value="<?php echo $pandora_options['pan_old_post'] ?>" />
						<br />
						<?php _e( 'Number of the old Posts on the Index page. Only Featured images titles and dates are displayed, it is look like a gallery.','pandora') ?>
					</td><!-- new fill ///////////////////////////////////////////////// -->
				</tr>
				<tr class="title-row">
					<td class="title-desc">
						<?php _e( 'Archive Posts/Page:','pandora') ?>
					</td>
					<td class="options-input">
						<input name="pan_archives" id="pan_archives" type="text" value="<?php echo $pandora_options['pan_archive_post'] ?>" />
						<br />
						<?php _e( 'Number of the oldest Posts on the Index page. Only titles and dates are displayed. It is look like an easy list.','pandora') ?>
					</td><!-- new fill ///////////////////////////////////////////////// -->
				</tr>
				<tr class="title-row">
					<td class="title-desc">
						<?php _e( 'Main Logo URL:','pandora') ?>
					</td>
					<td class="options-input">
						<input name="pan_smile" id="pan_smile" type="text" value="<?php echo $pandora_options['pan_smile_url'] ?>" />
						<br />
						<?php _e( 'Enter Your Logo\'s URL. It will appear on top of the index page instead the Pandora smile.','pandora') ?>
					</td><!-- new fill ///////////////////////////////////////////////// -->
				</tr>
				<tr class="title-row">
					<td class="title-desc">
						<?php _e( 'Favicon:','pandora') ?>
					</td>
					<td class="options-input">
						<input name="pan_favicon" id="pan_favicon" type="text" value="<?php echo $pandora_options['pan_custom_favicon'] ?>" />
						<br />
						<?php _e( 'Paste the full URL of Png/Gif image that will represent your website\'s favicon (16px x 16px).','pandora') ?>
					</td><!-- new fill ///////////////////////////////////////////////// -->
				</tr>
				<tr class="title-row">
					<td class="title-desc">
						<?php _e( 'Only two columns - Big Blog style','pandora') ?>
					</td>
					<td class="options-input">
						<?php if ($pandora_options['pan_page_style'] == 0) {$checked = "checked=\"yes\""; } else { $checked = ""; } ?>
						<input type="radio" name="pan_page" id="pan_page" value="0" <?php echo $checked ?>/>
						<br />
						<?php _e( 'Mark this if you wanna only two columns on index (one for content and one for primary sidebar.','pandora') ?>
					</td><!-- new fill ///////////////////////////////////////////////// -->
				</tr>
				<tr class="title-row">
					<td class="title-desc">
						<?php _e( 'Three columns - Portal style','pandora') ?>
					</td>
					<td class="options-input">
						<?php if ($pandora_options['pan_page_style'] == 1) {$checked = "checked=\"yes\""; } else { $checked = ""; } ?>
						<input type="radio" name="pan_page" id="pan_page" value="1" <?php echo $checked ?>/>
						<br />
						<?php _e( 'This is the default style.<br />Three columns on index (one for content and two for primary and secondary sidebars on right side.','pandora') ?>
					</td><!-- new fill ///////////////////////////////////////////////// -->
				</tr>
				<tr class="title-row">
					<td class="title-desc">
						<?php _e( 'Three columns - Clan Page style','pandora') ?>
					</td>
					<td class="options-input">
						<?php if ($pandora_options['pan_page_style'] == 2) {$checked = "checked=\"yes\""; } else { $checked = ""; } ?>
						<input type="radio" name="pan_page" id="pan_page" value="2" <?php echo $checked ?>/>
						<br />
						<?php _e( 'Mark this if you wanna three columns on index (one for primary sidebar, one for content and one for secondary sidebar.','pandora') ?>
					</td><!-- new fill ///////////////////////////////////////////////// -->
				</tr>
				<tr class="title-row">
					<td class="title-desc">
						<?php _e( 'Footer copyright text:','pandora') ?>
					</td>
					<td class="options-input">
						<textarea name="pan_copyright" id="pan_copyright" cols="70" rows="4"><?php echo stripslashes($pandora_options['pan_footer_text']) ?></textarea>
						<br />
						<?php _e( 'Enter the text for your copyright license. It will be in the footer.','pandora') ?>
					</td><!-- new fill ///////////////////////////////////////////////// -->
				</tr>
				<tr class="title-row">
					<td class="title-desc">
						<?php _e( 'Google Analytics Code:','pandora') ?>
					</td>
					<td class="options-input">
						<textarea name="pan_stats" id="pan_stats" cols="70" rows="8"><?php echo stripslashes($pandora_options['pan_tracking_code']) ?></textarea>
						<br />
						<?php _e('You can paste your Google Analytics or other tracking code in this box. This will be automatically added to the footer.','pandora') ?>
					</td><!-- new fill ///////////////////////////////////////////////// -->
				</tr>
				<tr class="title-row">
					<td class="title-desc">
						<?php _e('Skinner name:','pandora') ?>
					</td>
					<td class="options-input">
						<input name="pan_skinner" id="pan_skinner" type="text" value="<?php echo stripslashes($pandora_options['pan_skin_name']) ?>" />
						<br />
						<?php _e('This theme created by belicza.com, but if you changed something, upload your logo, your images, your design then please enter your name or your site here.','pandora') ?>
					</td><!-- new fill ///////////////////////////////////////////////// -->
				</tr>
			</table>	
			<input name="save" type="submit" value="<?php _e('Save changes','pandora') ?>" />    
			<input type="hidden" name="action" value="save" />       <a href="#backtotop"><?php _e('Go to Top','pandora'); ?></a>
			<div style="clear:both;"></div>		
			<?php wp_nonce_field('pandora_nonce_validator','pandora_nonces'); ?>
		</form>
	</div><!-- end wrap-->
	<div style="clear:both;height:20px;"></div>
	<?php
}
pandora_admin_main_form();
?>
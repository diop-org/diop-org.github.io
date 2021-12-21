<?php

add_action('admin_menu', 'mass_photo_menu');

/*-----------------------------------------------------------------------------------*/
/*	Create the menu entry for Bulk photo posting
/*-----------------------------------------------------------------------------------*/

function mass_photo_menu() {	
	add_submenu_page( "edit.php?post_type=".POST_TYPE_GALLERY, 'Bulk Photo Posting', 'Bulk Photo Posting', 'manage_options', 'photos_mass_posting', 'mass_photo_posting');
}

/*-----------------------------------------------------------------------------------*/
/*	Get the custom post type object for photos
/*-----------------------------------------------------------------------------------*/

function max_get_custom_post_type($name = POST_TYPE_GALLERY){
	$args = array(
	  'name' => $name
	);	
	$output = 'objects'; // names or objects
	$post_types = get_post_types($args,$output); 
	
	return $post_types;
}


/*-----------------------------------------------------------------------------------*/
/*	Main Function
/*-----------------------------------------------------------------------------------*/

function mass_photo_posting() {
	
	global $box;
	
	// check user permission to use bulk photo posting
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.', MAX_SHORTNAME) );
	}
	
	if(!empty($_POST) && !empty($_POST['post'])){
		
		ksort($_POST['post']);
		
		foreach ($_POST['post'] as $key => $value) {
			
			$imageID = $key;
			
			$photos[$imageID]['id_photo'] = $imageID;
			$photos[$imageID]['post_name'] = $_POST['post_name'][$imageID];
			
			foreach (@$_POST['galleries'] as $key => $value) {
				if($key == $imageID){
					foreach($value as $key2 => $value2){
						$photos[$imageID]['gal'] .= $key2 . ",";
					}
				}
			}
			
			$photos[$imageID]['photo_copyright_information_value'] = $_POST['photo_copyright_information_value'][$imageID];			
			$photos[$imageID]['photo_copyright_link_value'] = $_POST['photo_copyright_link_value'][$imageID];			
			$photos[$imageID]['photo_location_value'] = $_POST['photo_location_value'][$imageID];			
			$photos[$imageID]['photo_date_value'] = strtotime($_POST['photo_date_value'][$imageID]);
			$photos[$imageID]['photo_item_type_value'] = $_POST['photo_item_type_value'][$imageID];
			$photos[$imageID]['photo_cropping_direction_value'] = $_POST['photo_cropping_direction_value'][$imageID];
			$photos[$imageID]['photo_lightbox_type_value'] = "Photo";
						
			// Get fullsize background
			if( $_POST['fullsize_background'][$imageID] == 'nofullsize' ){
				$photos[$imageID]['show_post_fullsize_value'] =  'false';
			}else{
				$photos[$imageID]['show_post_fullsize_value'] =  'true';
			}
			
			if( $_POST['fullsize_background'][$imageID] == 'random' ){
				$photos[$imageID]['show_random_fullsize_value'] =  'true';
			}else if( $_POST['fullsize_background'][$imageID] == 'featured' ){
				$photos[$imageID]['show_random_fullsize_value'] =  'false';
			}else {
				$photos[$imageID]['show_random_fullsize_value'] =  'false';
			}
			
			if( $_POST['fullsize_background_url'][$imageID] != '' ){
				$photos[$imageID]['show_page_fullsize_url_value'] =  $_POST['fullsize_background_url'][$imageID];
			}		
	
			// get the tags array
			$photos[$imageID]['post_tags'] = explode(",", trim( $_POST['post_tags'][$imageID] )); 
			
		}
		
		if(!empty($photos)){
			
			foreach($photos as $photo){
				
				$cat_array = explode(',', substr($photo['gal'], 0, -1));
				
				// prepare the photo post values
				$post = array(
					'post_title' => $photo['post_name'],
					'post_content' => '',
					'post_status' => 'publish',
					'post_author' => 1,
					'post_type' => POST_TYPE_GALLERY,
					'tax_input' => array( GALLERY_TAXONOMY => $cat_array )
				);

				// add the new post
				$post_id = wp_insert_post( $post );

				// add the tags to the new post
				if( !empty($photo['post_tags']) ){
					wp_set_post_tags($post_id, $photo['post_tags']); 
					unset($GLOBALS['tag_cache']);  
				}
				
				// add the meta fields from $_POST values to the new post
				foreach($photo as $index => $value) {
					add_post_meta($post_id, MAX_SHORTNAME.'_'.$index, $photo[$index]);					
				}
								
				// Set featured post from media attachment
				set_post_thumbnail( $post_id, $photo['id_photo'] );
				$image_post = array();
				$image_post['ID'] = $photo['id_photo'];
				$image_post['post_parent'] = $post_id;
				
				// update the post
				wp_update_post( $image_post );

				// show update message
				$_saved = true;

			}
		}
	}else{
		$_saved = false;	
	}
	
	
	// Get unassigned attachments
	$images_args = array(
		'numberposts'	=> 99999,
		'orderby'       => 'post_date',
		'order'         => 'ASC',
		'post_type'     => 'attachment',
		'post_parent'   => 0,
		'post_status'   => 'inherit' 
	);
	$images = get_posts( $images_args );
	
	// Get Gallery Categories
	$gallery_args = array(
		'type'                     => 'post',
		'child_of'                 => 0,
		'orderby'                  => 'name',
		'order'                    => 'ASC',
		'hide_empty'               => 0,
		'hierarchical'             => 1,
		'taxonomy'                 => GALLERY_TAXONOMY,
		'pad_counts'               => false 
	);	
	$galleries = get_categories( $gallery_args );	
	
	// get the custom post type for further use
	$post_types = max_get_custom_post_type();

	// get galleries in hirachical order
	$taxonomy_names = get_object_taxonomies( 'gallery' );
	$hierarchical_taxonomies = array();
	$flat_taxonomies = array();
	foreach ( $taxonomy_names as $taxonomy_name ) {
	$taxonomy = get_taxonomy( $taxonomy_name );
					
	if ( !$taxonomy->show_ui )
		continue;
					
	if ( $taxonomy->hierarchical )
		$hierarchical_taxonomies[] = $taxonomy;
	else
		$flat_taxonomies[] = $taxonomy;
	}
	
	?>
	
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/base/jquery-ui.css" rel="stylesheet" /> 
	
	<style type="text/css">
		#massPhotoUpload th { }
		#massPhotoUpload th.col-preview, #massPhotoUpload td.media-icon { width: 70px; padding: 8px 0; }
		
		#massPhotoUpload .col-gallery, #massPhotoUpload .col-gallery ul, #massPhotoUpload .col-gallery ul li { margin: 0; padding: 0; font-size: 11px; line-height: 20px; }
		#massPhotoUpload td.col-gallery { padding: 7px 13px 7px 0; white-space: nowrap; width: 15% }
		
		#massPhotoUpload ul.cat-checklist { background-color: white; border-color: #DDD; padding: 0 5px; }
		
		#massPhotoUpload .col-gallery ul.children { margin: 0 0 0 18px; }
		#massPhotoUpload .col-gallery input { margin-top: 0; }
		
		#massPhotoUpload th.col-meta { width: 10em; }
		#massPhotoUpload td { padding: 4px 7px 2px; }
		#massPhotoUpload td label { white-space: nowrap  }
		#massPhotoUpload td.col-description .input-text-wrap, #massPhotoUpload th.col-description .input-text-wrap { color: #808387; font-size: 11px; }		
		#massPhotoUpload td.col-description .input-text-wrap .text-description{ width: 90%; display: block; white-space: normal; padding-left: .65em; }
		#massPhotoUpload td.col-background { width: 160px; }
		#massPhotoUpload td.col-background label span.title { width: auto; float: none; }
		#massPhotoUpload td.col-background label span.input-text-wrap { margin: 0; float: left; width: 1.5em }
		
		#massPhotoUpload tr.front-row td, #massPhotoUpload tr.front-row th { background: #ECECEC; }
		#massPhotoUpload input.post_name, #massPhotoUpload textarea.post_tags { width: 90%; }
		#massPhotoUpload a.post_file { line-height: 22px; font-size: 11px; }
		#massPhotoUpload .file-ext { text-transform: uppercase; }
		#massPhotoUpload td.column-file label span.file-ext { font-size: 11px; }
		#massPhotoUpload input.button-primary { margin-bottom: 15px; }
		#massPhotoUpload input[type="radio"] { height: 17px; }
		
		#massPhotoUpload select, #massPhotoUpload textarea { font-size: 11px; }
		#massPhotoUpload .input-url { display: none; width: 90% }	
	</style>
	
	<div class="wrap">
		<div id="icon-upload" class="icon32"><br /></div>
		<h2>Bulk <?php echo $post_types[POST_TYPE_GALLERY]->labels->singular_name ?> Posting <a href="media-new.php" class="add-new-h2">Add New Media</a></h2>
		
		<?php if( $_saved === true ){ ?>
		<div id="message" class="updated below-h2">
			<p>
				<?php echo $post_types[POST_TYPE_GALLERY]->labels->name ?> saved and published. <a href="edit.php?post_type=gallery"><?php echo $post_types[POST_TYPE_GALLERY]->labels->name ?></a><br>
			</p>
		</div>
		<?php } ?>
		
		
		<form method="post" id="massPhotoUpload">
		<p>
			<?php _e('This list shows all the images from your media library that are not attached to any post. You can create your posts easily from here with a few clicks.', MAX_SHORTNAME) ?>
		</p>		

		<?php if( $images ) { ?>	
			
			<table class="wp-list-table widefat" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th scope="col" class="manage-column column-cb check-column">&nbsp;</th>
					<th scope="col" class="manage-column col-preview">&nbsp;</th>
					<th scope="col" class="manage-column"><?php _e('File', MAX_SHORTNAME) ?></th>
					<th scope="col" class="manage-column col-gallery"><?php _e('Galleries', MAX_SHORTNAME) ?></th>
					<th scope="col" class="manage-column col-meta"><?php _e('Meta Information', MAX_SHORTNAME) ?></th>
					<th scope="col" class="manage-column"><?php _e('Settings', MAX_SHORTNAME) ?></th>
					<th scope="col" class="manage-column"><?php _e('Background Image ', MAX_SHORTNAME) ?></th>
				</tr>
			</thead>
			<tbody>
			
				<?php 
				// More than one image
				if(count($images) > 1) { 
				?>
				<tr class="front-row inline-edit-row">
					<th scope="row" class="column-cb check-column"><input type="checkbox" id="post" disabled="disabled" /></th>
					<td>&nbsp;</td>
					<td class="col-description">
						<fieldset>
							<label>
								<span class="title"><?php _e('Title', MAX_SHORTNAME) ?></span>
								<span class="input-text-wrap">		
									<input type="text" id="post_name" class="post_name">
								</span>
							</label>
							<label>
								<span class="title"><?php _e('Tags', MAX_SHORTNAME) ?></span>
								<span class="input-text-wrap">		
									<textarea id="post_tags" class="post_tags tax_input_post_tag"></textarea>
								</span>
							</label>							
							<label>
								<span class="input-text-wrap"><span class="text-description"><?php _e('Changes made in this line will be incorporated into other lines.', MAX_SHORTNAME) ?></span></span>
							</label>
						</fieldset>
					</td>
					<td class="col-gallery">
						<?php						

								 if ( count( $hierarchical_taxonomies ) ) :
														
										foreach ( $hierarchical_taxonomies as $taxonomy ) :											
											
											$box = array('id' => $taxonomy->name, 'hideid' => 1 );
																									
											$output .= '<input type="hidden" name="" value="0" />';
											$output .= '<ul class="cat-checklist '.esc_attr( $taxonomy->name ).'-checklist">';
											ob_start();
											wp_terms_checklist( null, array( 'taxonomy' => $taxonomy->name, 'walker' => new max_category_checklist_walker, 'selected_cats' => get_post_meta($post->ID, $box['id'], true), 'checked_ontop' => false ) );
											$output .= ob_get_contents();
											ob_end_clean();
											$output .= '</ul>';
							
										endforeach; //$hierarchical_taxonomies as $taxonomy 
							
								endif; // count( $hierarchical_taxonomies ) && !$bulk
								
								echo $output;
						?>
					</td>
					<td>
						<fieldset>
							<label>
								<span class="title">&copy; Owner</span>
								<span class="input-text-wrap">
									<input type="text" id="photo_copyright_information_value" />
								</span>
							</label>
							<label>
								<span class="title">&copy; Link</span>
								<span class="input-text-wrap">						
									<input type="text" id="photo_copyright_link_value" />
								</span>
							</label>
							<label>
								<span class="title">Location</span>
								<span class="input-text-wrap">						
									<input type="text" id="photo_location_value">
								</span>
							</label>
							<label>
								<span class="title">Date</span>
								<span class="input-text-wrap">
									<input type="text" id="photo_date_value" class="photo_date_value">
								</span>
							</label>							
						</fieldset>
					</td>
					<td>
						<fieldset>
							<label>
								<span class="title"><?php _e('Link type', MAX_SHORTNAME) ?></span>
								<span class="input-text-wrap">
									<select id="photo_item_type_value"><option value="lightbox">Lightbox</option><option selected="selected" value="projectpage">Project Page</option></select>
								</span>								
							</label>
							<label>
								<span class="title"><?php _e('Cropping', MAX_SHORTNAME) ?></span>
								<span class="input-text-wrap">						
									<select id="photo_cropping_direction_value">
										<option selected="selected">Position in the Center (default)</option>
										<option>Align top</option>
										<option>Align top right</option>
										<option>Align top left</option>
										<option>Align bottom</option>
										<option>Align bottom right</option>
										<option>Align bottom left</option>
										<option>Align left</option>
										<option>Align right</option>
									</select>					
								</span>
																
							</label>
						</fieldset>
					</td>
					<td class="col-description col-background">
						<fieldset>
							<label>
								<span class="input-text-wrap">
									<input type="radio" id="fullsize_background_featured" name="fullsize_background" value="featured" checked="checked" />
								</span>
								<span class="title"><?php _e('Post Featured Image', MAX_SHORTNAME) ?></span>
							</label>						
							<label>
								<span class="input-text-wrap">
									<input type="radio" id="fullsize_background_random" name="fullsize_background" value="random" />
								</span>							
								<span class="title"><?php _e('Random Gallery Image', MAX_SHORTNAME) ?></span>
							</label>
							<label>
								<span class="input-text-wrap">
									<input type="radio" id="fullsize_background_url" name="fullsize_background" value="url" />
								</span>							
								<span class="title"><?php _e('Image from URL', MAX_SHORTNAME) ?></span>
								<input type="text" id="fullsize_background_url_value" name="fullsize_background_url" class="input-url"/>
							</label>
							<label>
								<span class="input-text-wrap">
									<input type="radio" id="fullsize_background_show" name="fullsize_background" value="nofullsize" />
								</span>							
								<span class="title"><?php _e('No Background', MAX_SHORTNAME) ?></span>
							</label>							
						</fieldset>
					</td>					
				</tr>
				<?php } ?>				
				<?php				

					foreach ($images as $image){

						$path_info = pathinfo( wp_get_attachment_url( $image->ID, 'full' ) );
						
						echo '<tr class="inline-edit-row">';
						echo '<th class="check-column"><input type="checkbox" class="post" name="post['.$image->ID.']" value="1" disabled="disabled" /></th>';
						echo '<td class="column-icon media-icon"><a href="' . wp_get_attachment_url( $image->ID, 'full' ) . '">' . wp_get_attachment_image( $image->ID, array(64,64) ) . '</a></td>';
						echo '<td class="column-file">
								<fieldset>
									<label>
										<span class="title">' . __('Title', MAX_SHORTNAME) . '</span>
										<span class="input-text-wrap">		
											<input type="text" name="post_name['.$image->ID.']" class="post_name" value="'.$image->post_title.'">
											<input type="hidden" name="post_hidden_name['.$image->ID.']" value="'.$image->post_title.'">											
										</span>
									</label>
									<label>
										<span class="title">' . __('Tags', MAX_SHORTNAME) . '</span>
										<span class="input-text-wrap">		
											<textarea name="post_tags['.$image->ID.']" class="post_tags">'.$image->post_tags.'</textarea>
											<input type="hidden" name="post_hidden_tags['.$image->ID.']" value="'.$image->post_tags.'">											
										</span>
									</label>									
									<label>
										<span class="title">'. __('File', MAX_SHORTNAME).'</span>
										<span class="input-text-wrap">
											<a href="media.php?attachment_id='.$image->ID.'&action=edit" class="post_file">'.$image->post_title.'</a> - <span class="file-ext">'. $path_info['extension'] . '</span>
										</span>
									</label>
									<label class="gallery-error">
										<span class="title"></span>
										<span class="input-text-wrap">
											<small class="ui-state-error-text">'. __('You need to choose at least one gallery to save this photo.',MAX_SHORTNAME).'</small>
										</span>
									</label>
								</fieldset>
								
							  </td>';
						echo '<td class="col-gallery">';
						
								$output = "";
						
								 if ( count( $hierarchical_taxonomies ) ) :
														
										foreach ( $hierarchical_taxonomies as $taxonomy ) :											
											
											$box = array('id' => 'galleries', 'imageID' => $image->ID );
																									
											$output .= '<input type="hidden" name="" value="0" />';
											$output .= '<ul class="cat-checklist '.esc_attr( $taxonomy->name ).'-checklist">';
											ob_start();
											wp_terms_checklist( null, array( 'taxonomy' => $taxonomy->name, 'walker' => new max_category_checklist_walker, 'selected_cats' => get_post_meta($post->ID, $box['id'], true), 'checked_ontop' => false ) );
											$output .= ob_get_contents();
											ob_end_clean();
											$output .= '</ul>';
							
										endforeach; //$hierarchical_taxonomies as $taxonomy 
							
								endif; // count( $hierarchical_taxonomies ) && !$bulk
								
								echo $output;

						echo '</td>';
						echo '<td>
								<fieldset>
									<label>
										<span class="title">' . __('&copy; Owner', MAX_SHORTNAME) . '</span>
										<span class="input-text-wrap">						
											<input type="text" class="photo_copyright_information_value" name="photo_copyright_information_value['.$image->ID.']">
										</span>
									</label>
									<label>
										<span class="title">' . __('&copy; Link', MAX_SHORTNAME) . '</span>
										<span class="input-text-wrap">								
											<input type="text" class="photo_copyright_link_value" name="photo_copyright_link_value['.$image->ID.']">
										</span>
									</label>
								</fieldset>
								<fieldset>
									<label>
										<span class="title">' . __('Location', MAX_SHORTNAME) . '</span>
										<span class="input-text-wrap">						
											<input type="text" class="photo_location_value" name="photo_location_value['.$image->ID.']">
										</span>
									</label>
									<label>
										<span class="title">' . __('Date', MAX_SHORTNAME) . '</span>
										<span class="input-text-wrap">								
											<input type="text" class="photo_date_value" name="photo_date_value['.$image->ID.']">											
										</span>
									</label>
								</fieldset>								
							 </td>';							 
						echo '<td>
								<fieldset>
									<label>
										<span class="title">'.__('Link type', MAX_SHORTNAME).'</span>
										<span class="input-text-wrap">						
											<select name="photo_item_type_value['.$image->ID.']" class="photo_item_type_value"><option value="lightbox">Lightbox</option><option selected="selected" value="projectpage">Project Page</option></select>
										</span>								
									</label>								
									<label>
										<span class="title">'.__('Cropping', MAX_SHORTNAME).'</span>									
										<span class="input-text-wrap">								
											<select name="photo_cropping_direction_value['.$image->ID.']" class="photo_cropping_direction_value"><option selected="selected">Position in the Center (default)</option><option>Align top</option><option>Align top right</option><option>Align top left</option><option>Align bottom</option><option>Align bottom right</option><option>Align bottom left</option><option>Align left</option><option>Align right</option></select>
										</span>
									</label>
								</fieldset>											
							  </td>';
						echo '<td class="col-background">
								<fieldset>
									<label>
										<span class="input-text-wrap">
											<input type="radio" class="fullsize_background_featured" name="fullsize_background['.$image->ID.']" value="featured"  checked="checked">
										</span>									
										<span class="title">'.__('Post Featured Image', MAX_SHORTNAME).'</span>
									</label>
									<label>
										<span class="input-text-wrap">
											<input type="radio" class="fullsize_background_random" name="fullsize_background['.$image->ID.']" value="random">
										</span>									
										<span class="title">'.__('Random Gallery Image', MAX_SHORTNAME).'</span>
									</label>
									<label>
										<span class="input-text-wrap">
											<input type="radio" class="fullsize_background_url" name="fullsize_background['.$image->ID.']" value="url" />
										</span>							
										<span class="title">'.__('Image from URL', MAX_SHORTNAME).'</span>
										<input type="text" class="fullsize_background_url_value input-url" name="fullsize_background_url['.$image->ID.']" />
									</label>
									<label>
										<span class="input-text-wrap">
											<input type="radio" class="fullsize_background_show" name="fullsize_background['.$image->ID.']" value="nofullsize">
										</span>									
										<span class="title">'.__('No Background', MAX_SHORTNAME).'</span>
									</label>																		
								</fieldset>
							  </td>';
						echo '</tr>';
					}
				?>
				</tbody>
			</table>
			<p class="submit"><input type="submit" disabled="disabled" value="<?php _e('Save and publish marked ' . $post_types[POST_TYPE_GALLERY]->labels->name, MAX_SHORTNAME) ?>" class="button-primary save"></p>
			
			<?php 
			}else{
				// no unattached images in media library
			?>
			<div id="message" class="updated below-h2">
				<p>
					You don't have images in your media library that are not attached to any post. <a href="media-new.php">Add New Media</a> <br>
				</p>
			</div>			
			<?php } ?>
			
		</form>
	</div>
	
	<script type="text/javascript">
		var $j = jQuery.noConflict();
		
		jQuery(document).ready(function($) {
			
			jQuery(".photo_date_value").datepicker();
			
			// odd/even for alternate rows
			jQuery('#massPhotoUpload tr:odd').addClass('alternate');
			
			// Change action for all rows
			jQuery("#massPhotoUpload tr.front-row td input, #massPhotoUpload tr.front-row td textarea, #massPhotoUpload tr.front-row th input, #massPhotoUpload tr.front-row th textarea").change(function () {
				var gal = jQuery(this).attr('id');
							
				if(jQuery(this).is(':checked')){
					var $checkbox = jQuery("."+gal);
					$checkbox.attr('checked', true);
					$checkbox.change();
				}else{
					var $checkbox = jQuery("."+gal);
					$checkbox.attr('checked', false);
					$checkbox.change();
				}
				if(jQuery(this).hasClass('post_name')){
					var ele = jQuery(this);
					var i = 1;
					jQuery("."+gal).not(ele).each(function(){ 
						if(ele.attr('value') != ""){
							jQuery(this).attr('value', ele.attr('value') + "-" + i);
							i++;							
						}else{
							
							jQuery(this).attr('value', jQuery(this).next().val() );
							
						}
					});
				}else{
					jQuery("."+gal).attr('value', jQuery(this).attr('value'));
				}
			});
			
			// change event of select
			jQuery("#massPhotoUpload tr.front-row td select").change(function () {
				var id = jQuery(this).attr('id');
				var sel = jQuery(this).val();
				jQuery("."+id).val(sel);
			});
			
			// Show and hide URL input
			jQuery("#massPhotoUpload input[type='radio']").bind('change',function(){
				
				if( jQuery(this).is("tr.front-row input[type='radio']") && jQuery(this).val() == 'url' ){
					jQuery("#massPhotoUpload .input-url").show();
				}else if ( jQuery(this).is("tr.front-row input[type='radio']") && jQuery(this).val() != 'url' ){
					jQuery("#massPhotoUpload .input-url").hide().val('');
				}else{
				
					if(jQuery(this).val() == 'url'){								
						jQuery(this).parents('fieldset').find('.input-url').show();
					}else{
						jQuery(this).parents('fieldset').find('.input-url').hide();
					}
				
				}
			})
			
			// check for number of images to publish
			jQuery('th.check-column input[type=checkbox]').bind('change', function(){
				
                var b = $('th.check-column input');
                if( b.filter(':checked').length > 0) {
					jQuery('p.submit input.save').removeAttr('disabled');
				}else{
					jQuery('p.submit input.save').attr('disabled', 'disabled');
				}
							
			})
			
	
			// gallery checkbox action
			jQuery('ul.cat-checklist input').live('change', function (){
		
				var ul = jQuery(this).parents('ul.cat-checklist')
				var checked = jQuery('input', ul).filter(':checked').length;
				
				if(checked > 0){					
					ul.parents('tr').find('th.check-column input').attr('disabled',false);
					ul.parents('tr').find('td.column-file .gallery-error').hide();
				}else{
					ul.parents('tr').find('th.check-column input').attr('disabled',true);
					ul.parents('tr').find('td.column-file .gallery-error').show();
				}
			})
			
			
			
		});
	</script>
	<?php
}

?>

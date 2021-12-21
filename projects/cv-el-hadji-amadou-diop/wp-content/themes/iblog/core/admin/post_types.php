<?php 

// ******** Custom Post Types ******** /// 	

	add_action('init', 'fslide_control');  
	add_action('init', 'fbox_control');  

	function fslide_control() {  
	 	register_post_type( 'feature' , array(  
	 			'label' => __('Slides', TDOMAIN),  
				'singular_label' => __('Slide', TDOMAIN),
				'description' => 'For setting slides on the feature page template',
				'public' => true,  
				'show_ui' => true,  
				'capability_type' => 'post',  
				'hierarchical' => false,  
				'rewrite' => false,  
				'supports' => array('title', 'editor', 'thumbnail'), 
				'menu_icon' => CORE_IMAGES."/favicon-pagelines.ico"
			));  
		
	}

	function fbox_control() {  
	 	register_post_type( 'boxes' , array(  
	 			'label' => __('Boxes', TDOMAIN),  
				'singular_label' => __('Box', TDOMAIN),  
				'public' => true,  
				'show_ui' => true,  
				'capability_type' => 'post',  
				'hierarchical' => false,  
				'rewrite' => false,  
				'supports' => array('title', 'editor', 'thumbnail'), 
				'menu_icon' => CORE_IMAGES."/favicon-pagelines.ico"
			));  
	}

	
	// Viewing columns (when viewing all features)
	register_taxonomy("Sets", array("feature"), array("hierarchical" => true, "label" => "Sets", "singular_label" => "Set", "rewrite" => true));
	register_taxonomy("Sets", array("boxes"), array("hierarchical" => true, "label" => "Sets", "singular_label" => "Set", "rewrite" => true));  
	
	// Define Column Fields
	add_filter("manage_edit-feature_columns", "prod_edit_columns");
	add_filter("manage_edit-boxes_columns", "prod_edit_columns");
	
	// Define Custom Column Values
	add_action("manage_posts_custom_column",  "prod_custom_columns");

	function prod_edit_columns($columns){
			$columns = array(
				"cb" => "<input type=\"checkbox\" />",
				"title" => "Title",
				"description" => "Text",
				"media" => "Media",
				"sets" => "Feature Sets",
			);

			return $columns;
	}

	function prod_custom_columns($column){
			global $post;
			switch ($column){
				case "description":
					the_excerpt();
					break;
				case "media":
					$custom = get_post_custom($post->ID);
				 	if($custom['postMedia'][0]){
						echo $custom['postMedia'][0]; 
					}else{
						the_post_thumbnail(array(100,100));	
					} 
					break;
				case "sets":
					echo get_the_term_list($post->ID, 'Sets', '', ', ','');
					break;
			}
	}
	
	
	
		add_action("admin_init", "admin_init");
		add_action('save_post', 'save_slide_meta');

		function admin_init(){
			add_meta_box("media-meta", "Media HTML", "meta_options", "feature", "normal", "low");
			pagelines_default_custom_posts('feature');
			pagelines_default_custom_posts('boxes');
		}

		function meta_options(){
			global $post;
			$custom = get_post_custom($post->ID);
			$postMedia = $custom["postMedia"][0];
			?>
			
			<textarea id="postMedia" class="postMediaInput" style="width: 95%; height: 5em;margin:1em" tabindex="6" name="postMedia" cols="40" rows="1"><?php echo $postMedia; ?></textarea>
			<?php if($postMedia):?>
				<h4>Media Preview</h4>
			<div class="postMediaPreview" style="width: 480px; border: 1px solid #eee;margin: 1em;">
				<?php echo $postMedia; ?>
			</div>
			<?php endif;?>
		<?php
		}

		function save_slide_meta(){
			global $post;
			update_post_meta($post->ID, "postMedia", $_POST["postMedia"]);
		}
		
		function pagelines_default_custom_posts($type = ''){
			
			if(!get_posts('post_type='.$type)){
				if($type == "feature") $default_posts = array_reverse(get_default_features());
				elseif($type == "boxes") $default_posts = array_reverse(get_default_fboxes());
				
				foreach($default_posts as $dpost){
					// Create post object
					$default_post = array();
					$default_post['post_title'] = $dpost['title'];
					$default_post['post_content'] = $dpost['text'];
					$default_post['post_type'] = $type;
					$default_post['post_status'] = 'publish';
					
					$newPostID = wp_insert_post( $default_post );
				
					if($type == 'feature'){ 
						update_post_meta($newPostID, 'postMedia', $dpost['media']);
					}elseif($type == 'boxes'){ 
						pagelines_add_post_thumbnail($newPostID, $dpost['media']);
					}
				}
			}
		}
		
		function pagelines_add_post_thumbnail($postid, $imagename, $imagedir = null){
			
			if($imagename){
				
			 	$upload_dir = wp_upload_dir(); 
				if(!$imagedir) $imagedir = TEMPLATEPATH.'/images/';	
				
				
				
				$file = $imagedir.basename($imagename);
				$newfile = $upload_dir['basedir'].'/'.basename($imagename);
				
				if (!copy($file, $newfile)) { echo "failed to copy $file...\n";	}
				
				  $wp_filetype = wp_check_filetype(basename($imagename), null );
				  $attachment = array(
				     'post_mime_type' => $wp_filetype['type'],
				     'post_title' => preg_replace('/\.[^.]+$/', '', basename($imagename)),
				     'post_content' => '',
				     'post_status' => 'inherit'
				  );
				  $attach_id = wp_insert_attachment( $attachment, basename($imagename), $postid );
				  // you must first include the image.php file
				  // for the function wp_generate_attachment_metadata() to work
				  require_once(ABSPATH . "wp-admin" . '/includes/image.php');
				  $attach_data = wp_generate_attachment_metadata( $attach_id, basename($imagename) );
				  wp_update_attachment_metadata( $attach_id, $attach_data );
			
				
				// Set new image as post thumbnail
				update_post_meta($postid, '_thumbnail_id', $attach_id);
	
			}		
		}

		
?>

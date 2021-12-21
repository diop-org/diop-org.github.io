<?php
global $shortname;

/*-----------------------------------------------------------------------------------*/
/* = Custom function for query posts
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'max_query_posts' ) ):

	function max_query_posts($showposts, $catArray, $random = false, $offset = false, $order = 'DESC') {

		global $post;
		
		$off = !$offset ? "" : $offset;
		$rand = !$random ? "" : $random;
      
		$paged = get_query_var('paged') ? get_query_var('paged') : 1;		

		$cat_string = "";

		// Check if catArray is a array or single cat	
		if(is_array($catArray)){
			$terms = "";
			foreach($catArray as $index => $term_id){
				// get the gallery name
				$term = get_term_by('id', $index, GALLERY_TAXONOMY);
				if($term){
					$cat_string .= $term->slug.',';
				}			
			}
			$cat_string = substr($cat_string, 0, -1);
		}else{
			$cat_string = $catArray;	
		}

        $defaults = array(
                'paged'                         => $paged,
                'posty_type'                    => 'gallery',
				'post__not_in' 					=> array($post->ID),
                'posts_per_page'                => $showposts,
				GALLERY_TAXONOMY				=> $cat_string,
				'orderby'						=> $rand,
				'order'							=> $order,
				'offset'						=> $offset
			);				

		$query = $defaults;
		return query_posts( $query );
	}
endif;

/*-----------------------------------------------------------------------------------*/
/* = Custom function for query term posts
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'max_query_term_posts' ) ):
	function max_query_term_posts($showposts = PER_PAGE_DEFAULT, $id_array, $type = 'gallery', $random = false, $taxonomy = GALLERY_TAXONOMY, $sorting = false, $filter_current = false){		

		global $post;

		$rand = !$random ? "" : $random;
		$sort = !$sorting ? "" : $sorting;	
		
		$posts_to_query = get_objects_in_term($id_array, $taxonomy);
		
		if($filter_current === true){
			$_array_diff = array( 0 => $post->ID );
			$posts_to_query = array_diff($posts_to_query, $_array_diff);
		}
				
		return query_posts( array( 'showposts'=> $showposts, 'post_type' => $type, 'post__in' => $posts_to_query, 'orderby' => $rand, 'order' => $sort ) );
	}
endif;

/*-----------------------------------------------------------------------------------*/
/* = Custom function for query posts by tags
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'max_query_tag_posts' ) ):
	function max_query_tag_posts($showposts = PER_PAGE_DEFAULT, $type = 'gallery', $tag_slug = false, $paged){	
	
		$tag = !$tag_slug ? "" : $tag_slug;		
		return query_posts( array( 'showposts'=> $showposts, 'post_type' => $type, 'tag'=> $tag, 'paged' => $paged) );		
	}
endif;


/*-----------------------------------------------------------------------------------*/
/* = Get a image url from post id
/*-----------------------------------------------------------------------------------*/

function max_get_post_image_url($id, $size = 'full'){
	return wp_get_attachment_image_src( get_post_thumbnail_id( $id ), $size);
}

if ( ! function_exists( 'max_get_image_path' ) ):
	function max_get_image_path ($post_id = null, $size = 'full') {
		if ($post_id == null) {
			global $post;
			$post_id = $post->ID;
		}
		$theImageSrc = max_get_post_image_url($post_id, $size);
		
		global $blog_id;
		
		if (isset($blog_id) && $blog_id > 0) {
			$imageParts = explode('/files/', $theImageSrc[0]);
			if (isset($imageParts[1])) {
				$theImageSrc[0] = '/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];
			}
		}
		
		return $theImageSrc[0];
	}
endif;

/*-----------------------------------------------------------------------------------*/
/* = Get a Post Image depending on Options set in Options Panel
/*-----------------------------------------------------------------------------------*/

function max_get_post_custom_image( $return = false, $p_id = false ){
	
	global $shortname, $post, $imgDimensions;
									
	$post_id = !$p_id ? $post->ID : $p_id;
									
	// check if its a lightbox or a project page link
	$photo_item_type = get_post_meta($post_id, $shortname.'_photo_item_type_value', true);
	
	// Get the post image via timthumb
	$imgUrl = max_get_post_image_url($post_id, "full");
			
	$output = "";
	
	if( !isset( $imgDimensions['width'] ) ) {
		$width = "";
		$imgWidth = "";
	}else{
		$width = "&amp;w=".$imgDimensions['width'];
		$imgWidth = ' width="' . $imgDimensions['width'] . '"';
	}
	if( !isset( $imgDimensions['height'] ) ) {
		$height = "";
		$imgHeight = "";
	}else{
		$height = "&amp;h=".$imgDimensions['height'];
		$imgHeight = ' height="' . $imgDimensions['height'] . '"';
	}
	
	if ( has_post_thumbnail( $post_id ) ) {
		
		// Get Image URL
		$imgUrl[0] = max_get_image_path($post_id); 	
					
		// get the title	
		$title = ' title="' . get_the_excerpt() . '"';			
		
		$cat_list = array();
		
		foreach(get_the_category() as $category){
			$cat_list[] = $category->cat_ID;
		}
				
		if ( !in_array( get_option_max('general_blog_id'), $cat_list ) ) {
								
			// Photo Type is a Lightbox
			if($photo_item_type == "Lightbox" || $photo_item_type == 'lightbox' ){
								
				// Display Lightbox Photo
				if ( get_post_meta($post_id, $shortname.'_photo_lightbox_type_value', true) == "Photo" || get_post_meta($post_id, $shortname.'_photo_lightbox_type_value', true) == "photo" ){
				
					if( is_multisite() ){ 
						$multiURL = WP_CONTENT_URL; 
					} else{
						$multiURL = "";
					}
				
					$output .= '<a href="' . $multiURL . $imgUrl[0] . '" rel="prettyPhoto[gal]" lnk="'. get_permalink($post_id).'" '.$title.'><img src="' . get_template_directory_uri() . '/timthumb.php?src=' . $imgUrl[0] . $width . $height . '&amp;a=' . get_cropping_direction( get_post_meta($post_id, $shortname.'_photo_cropping_direction_value', true) ) . '&amp;q=100" alt="' . get_the_title() .'"' . $imgWidth . $imgHeight . ' /></a>';
				
				}
				
				// Display Lightbox YouTube Video
				if ( get_post_meta($post_id, $shortname.'_photo_lightbox_type_value', true) == "YouTube-Video" || get_post_meta($post_id, $shortname.'_photo_lightbox_type_value', true) == "youtube" ){
					
					$output .= '<a href="' . get_post_meta($post_id, $shortname.'_photo_video_youtube_value', true) . '" rel="prettyPhoto" title="' . get_the_title() . '" lnk="'. get_permalink($post_id).'"><img src="' . get_template_directory_uri() . '/timthumb.php?src=' . $imgUrl[0] . $width . $height . '&amp;a=' . get_cropping_direction( get_post_meta($post_id, $shortname.'_photo_cropping_direction_value', true) ) . '&amp;q=100" alt="' . get_the_title() .'"' . $imgWidth . $imgHeight . ' /></a>';
					
				}
				
				// Display Lightbox Vimeo Video
				if ( get_post_meta($post_id, $shortname.'_photo_lightbox_type_value', true) == "Vimeo-Video" || get_post_meta($post_id, $shortname.'_photo_lightbox_type_value', true) == "vimeo" ){
					
					$output .= '<a href="' . get_post_meta($post_id, $shortname.'_photo_video_vimeo_value', true) . '" rel="prettyPhoto" title="' . get_the_title() . '" lnk="'. get_permalink($post_id).'"><img src="' . get_template_directory_uri() . '/timthumb.php?src=' . $imgUrl[0] . $width . $height . '&amp;a=' . get_cropping_direction( get_post_meta($post_id, $shortname.'_photo_cropping_direction_value', true) ) . '&amp;q=100" alt="' . get_the_title() .'"' . $imgWidth . $imgHeight . ' /></a>';
					
				}			
				
			}else if($photo_item_type == "Project Page" || $photo_item_type == 'projectpage' || $photo_item_type == 'selfhosted' || $photo_item_type == 'youtube_embed' || $photo_item_type == 'vimeo_embed'  ){	

				// Photo Type is a Project Page			
				$output .= '<a href="' . get_permalink($post_id) . '" title="' . get_the_title() . '"><img src="' . get_template_directory_uri() . '/timthumb.php?src=' . $imgUrl[0] . $width . $height . '&amp;a=' . get_cropping_direction( get_post_meta($post_id, $shortname.'_photo_cropping_direction_value', true) ) . '&amp;q=100"' . $imgWidth . $imgHeight . ' alt="' . get_the_title() . '" class="fade-image"/></a>';
											
			}else if($photo_item_type == "External Link" || $photo_item_type == 'external' ){	
				
				$target = get_post_meta($post_id, MAX_SHORTNAME.'_external_link_target_value',true);
				$str_target = isset($target) && $target !="" ? $target : "_blank";
				
				// Photo Type is an external Link			
				$output .= '<a href="' . get_post_meta($post_id, $shortname.'_photo_external_link_value', true) . '" target="'.get_post_meta($post_id, MAX_SHORTNAME.'_external_link_target_value',true).'" title="' . get_the_title() . '"><img src="' . get_template_directory_uri() . '/timthumb.php?src=' . $imgUrl[0] . $width . $height . '&amp;a=' . get_cropping_direction( get_post_meta($post_id, $shortname.'_photo_cropping_direction_value', true) ) . '&amp;q=100"' . $imgWidth . $imgHeight . '  alt="' . get_the_title() . '" class="fade-image"/></a>';
											
			}else{
				// Get the timbthumb image
				$output .=	'<a href="'. $imgUrl[0] .'" rel="prettyPhoto" title="'. get_the_excerpt() .'" lnk="'. get_permalink($post_id).'">
								<img src="' . get_template_directory_uri(). '/timthumb.php?src=' . $imgUrl[0] . $height . $width.'&amp;a='. get_cropping_direction( get_post_meta($post_id, $shortname.'_photo_cropping_direction_value', 2313) ) . '&amp;q=100"' . $imgWidth . $imgHeight . ' class="fade-image" alt="' . get_the_title() . '" title="' . get_the_title() . '" />
							</a>';					
			}
			
		}else{
			
			// Get the timbthumb image
			$output .=	'<a href="'. $imgUrl[0] .'" rel="prettyPhoto"'.$title.' lnk="'. get_permalink($post_id).'">
							<img src="' . get_template_directory_uri(). '/timthumb.php?src=' . $imgUrl[0] . $height . $width.'&amp;a='. get_cropping_direction( get_post_meta($post_id, $shortname.'_photo_cropping_direction_value', 2313) ) . '&amp;q=100"' . $imgWidth . $imgHeight . ' class="fade-image" alt="' . get_the_title() . '" title="' . get_the_title() . '" />
						</a>';	
		}
			
										
	}
	
	if($return === true){
		return $output;
	}else{
		echo $output;
	}
}

/*-----------------------------------------------------------------------------------*/
/* = Get a Post Image depending on Options set in Options Panel
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'max_get_slider_image' ) ):

	function max_get_slider_image( $_meta, $img_slug, $sort = 0, $return = false, $greyscale = false ){
		
		// Get Image URL
		$theImageSrc = wp_get_attachment_image_src( $_meta['imgID'], 'slides-slider' );
		
		global $blog_id;
		
		if (isset($blog_id) && $blog_id > 0) {
			$imageParts = explode('/files/', $theImageSrc[0]);
			if (isset($imageParts[1])) {
				$theImageSrc[0] = '/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];
			}
		}
		
		$img_url = $theImageSrc[0];
				
		$output = "";
			
		$cat_list = array();
			
		$imgWidth =  ' width="660"';
		$width = 	 '&amp;w=660';

		$new_height = floor( 660 / $theImageSrc[1] * $theImageSrc[2] );

		$imgHeight =  ' height="'.$new_height.'"';
		$height = 	 '&amp;h='.$new_height;		
		
		foreach(get_the_category() as $category){
			$cat_list[] = $category->cat_ID;
		}
				
		// check greyscale images
		$greyscale = $greyscale == "true" ? "&amp;f=2" : "";
		
		// output the link and the image					
		$_link = wp_get_attachment_url( $_meta['imgID'] );					
		$_add =  ' rel="prettyPhoto[gal]"';
		
		// check title
		$title = isset($_meta['showtitle']) && $_meta['showtitle'] == 'true' ? ' title="' . get_the_excerpt() . '"' : $title = "";

		$output .= '<a href="' . $_link .'" ' . $title . $_add . ' lnk="'. get_permalink($post_id).'" style="width: 660px; height: '.$new_height.'px">';			
		$output .= '<img src="' . get_template_directory_uri() . '/timthumb.php?src=' . $img_url .'&amp;a=' . $_meta['cropping'] . $width . $height . '" alt="' . get_the_title() . '"' . $imgWidth . $imgHeight . $sort . ' />';
		$output .= '</a>';

		if($return === true){
			return $output;
		}else{
			echo $output;
		}
		
	}

endif;


/*-----------------------------------------------------------------------------------*/
/* = Get a Post Lightbox CSS Class
/*-----------------------------------------------------------------------------------*/

function max_get_post_lightbox_class(){
	
	global $shortname, $post, $imgDimensions;
	
	$link_type = get_post_meta($post->ID, MAX_SHORTNAME.'_photo_item_type_value', true);
	$lightbox_type = get_post_meta($post->ID, MAX_SHORTNAME.'_photo_lightbox_type_value', true);
	
	$class = "";
	$class2 = "";

	switch($link_type){
	
		case 'lightbox':
		case "Lightbox":
		
			$class = "lightbox";
		
			switch($lightbox_type){
		
				case "Photo":
				case "photo": 
					$class2 = " photo";
				break;
				
				case "YouTube-Video":
				case "youtube":
					$class2 = " youtube-video";
				break;		
				
				case "Vimeo-Video":
				case "vimeo":
					$class2 = " vimeo-video";
				break;
				
				default: 
					$class2 = "";
				break;
			}
			
		break;
		
		case 'projectpage':
		case 'Project Page':
		
			$class = "link";
			
		break;
		
		case 'external':
		case 'External Link':
		
			$class = "external";
			
		break;
		
		case 'selfhosted':
		case 'youtube_embed':
		case 'vimeo_embed':

			$class = "video";
			
		break;			

		default: $class = "photo";
		break;

	}
		
	return $class.$class2;
	
}




/*-----------------------------------------------------------------------------------*/
/* = Custom excerpt function
/*-----------------------------------------------------------------------------------*/

function max_get_the_excerpt( $echo = false ){
	
	global $shortname, $post;
	
	$excerpt = $post->post_excerpt; 
	
	if ($excerpt != "" ) {
		if ( $echo === true ) { 
			the_excerpt();
		}else{
			return $excerpt;
		}
	}
	
	return false;
	
}

/*-----------------------------------------------------------------------------------*/
/* = Get all the meta fields for a page or post and store it in an array
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'max_get_cutom_meta_array' ) ):

	function max_get_cutom_meta_array( $id = 0 ){
		//if we want to run this function on a page of our choosing them the next section is skipped.
		//if not it grabs the ID of the current page and uses it from now on.
		if ($id == 0) :
			global $wp_query;		
			$content_array = $wp_query->get_queried_object();
			@$id = $content_array->ID;
		endif;   
	
		//knocks the first 3 elements off the array as they are WP entries and i dont want them.
		$first_array = @get_post_custom_keys($id);
	
		if(count($first_array)){
			//first loop puts everything into an array, but its badly composed
			foreach ($first_array as $key => $value) :
				   $second_array[$value] =  get_post_meta($id, $value, FALSE);
		
					//so the second loop puts the data into a associative array
					foreach($second_array as $second_key => $second_value) :
							   $result[$second_key] = $second_value[0];
					endforeach;
			 endforeach;
		}else{
			return false;
		}
	
		//and returns the array.
		return $result;
		
	}
	
endif;

/*-----------------------------------------------------------------------------------*/
/* = Get custom prev and next links for custom taxonomy
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'max_get_custom_prev_next' ) ):

	function max_get_custom_prev_next( $term_ids, $order_by = 'date', $order = 'DESC', $post_type = "gallery", $taxonomy = GALLERY_TAXONOMY ){
		
		global $post;
		
		// query all other posts from the current post categories
		$_nav_posts = max_query_term_posts( 9999, $term_ids, $post_type, $order_by, $taxonomy, $order );
							
		foreach($_nav_posts as $_index => $_value){							
			$_id_array[] = $_value->ID;							
		}	
		
		// prepare some values
		$_search_id = $post->ID;	
		$_first_id = current($_id_array);
		$_last_id = $_id_array[sizeof($_id_array)-1];		
		
		$_current_key = array_search($_search_id, $_id_array);	
		$_current_value = $_id_array[$_current_key];						
						
		$_prev_id = "";
		$_next_id = "";
					
		// get next post_id
		if($_search_id != $_last_id){
			$_next_id = $_current_key + 1;
			$_next_value = $_id_array[$_next_id];
		}
		
		// get prev post_id
		if($_search_id != $_first_id){
			$_prev_id = $_current_key - 1;
			$_prev_value = $_id_array[$_prev_id];
		}
		
		$_return_values = array(
			'prev_id' => @$_prev_value,
			'next_id' => @$_next_value
		);
		
		return $_return_values;
		
	}
	
endif;

?>
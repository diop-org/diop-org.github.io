<?php
/**
 * @package WordPress
 * @subpackage Invictus
 */
 
global $showSuperbgimage, $fromGallery, $taxonomy_name, $the_term, $post_terms, $isFullsizeGallery, $isPost, $shortname, $page_obj, $main_homepage, $_query_has_videos, $isFullsizeFlickr;
 
 
// Check if social icons should be used
if(get_option_max('social_use')=='true'){

	global $social_array;

	// Prepare Social network icons 
	$iconArray = array();
	$iconUrl = array();
	$iconPath = get_template_directory_uri()."/images/social/";
	if( is_array( get_option_max('social_show') ) ){
		foreach(get_option_max('social_show') as $index => $value) {
			$iconArray[$index] = $value;
			$iconUrl[$index] = get_option_max('social_'.$value);
		}
	}
} 
 
?>

	</div><!-- #main -->
</div><!-- #page -->

<footer id="colophon" role="contentinfo">
	
	<span class="footer-info">
		
		<?php echo stripslashes( get_option_max('copyright') ) ?>
		
	</span>
	
	<?php if ( get_option_max('fullsize_key_nav') == "true" ){ ?><a href="#keynav" id="fullsizeKeynav" class="keynav tooltip" title="<?php _e('Use Keynav to navigate', MAX_SHORTNAME) ?>"></a><?php } ?>

	<?php
	// Check if social array is enabled
	if(get_option_max('social_use')=='true' && is_array(get_option_max('social_show'))){ 
	?>
	<div id="sociallinks" class="clearfix">
	
		<?php
		// check if social bartender plugin is installed
		if( function_exists( 'social_bartender' ) ){ 
			social_bartender(); 
		}else{	
		
		//Start the generated social network loop
		?>
		<ul>
		<?php
		$blank = get_option_max('social_show_blank') == 'true' ? 'target="_blank"' : '';
			
		for ($iconCount = 0; $iconCount < count($iconArray); $iconCount++) {
			if ($iconArray[$iconCount] != "")
				if ($iconUrl[$iconCount] !="") // check if url is set
					echo '<li><a href="'.$iconUrl[$iconCount].'" title="'.$iconArray[$iconCount].'" '.$blank.' class="tooltip"><img alt="'.$iconArray[$iconCount].'" src="' . $iconPath . '' . $iconArray[$iconCount] . '.png" /></a></li>';
			}
		?>
		</ul>
		<?php
		}
		?>
	</div>
	<?php } ?>
			
</footer><!-- #colophon -->

<?php if( ( $main_homepage === true || $isFullsizeGallery === true ) && !$isFullsizeFlickr )
	// get the thumbnails if the page is the homepage
	get_template_part( 'includes/scroller', 'thumbnails.inc' );
?>

<?php 

	// check if it is not the homepage and get the random background image post	

	wp_reset_query();	

	if(isset($page_obj)){
		$pageID = $page_obj->ID;
	}else{
		$pageID = $post->ID;
	}	
			
	if(!$isPost){
		$imageURL = get_post_meta($pageID, 'max_show_page_fullsize_url', true);
	}else{
		$imageURL = get_post_meta($pageID, $shortname.'_show_page_fullsize_url_value', true);
	}
	

if( !$isFullsizeGallery && !$isFullsizeFlickr ) {

	if ( ( !is_home() && get_post_meta($pageID, 'max_show_page_fullsize', true) == 'true' ) || $showSuperbgimage === true ){ 
	
		// Check if a url for a background image is set
		if( $fromGallery !==true ){
		
			if( $imageURL == "" ){
				
				if( !$taxonomy_name ) 
				{				
					$random_post = max_query_term_posts( 1, get_option_max('fullsize_featured_cat'), 'gallery', 'rand' );				
				}
				else
				{
					$random_post = max_query_term_posts( 1, $the_term->term_id, 'gallery', 'rand' );					
				}
			}
			
		}
		
?>
        <script type="text/javascript">

			jQuery(function($){
				// Options for SuperBGImage
				$.fn.superbgimage.options = {
					slideshow: 0, // 0-none, 1-autostart slideshow
					randomimage: 0,
					preload: 1
				};

				// initialize SuperBGImage
				$('#superbgimage').superbgimage().hide();	
				
			});
			
		</script>

		<div id="superbgimage">		

			<?php 
			
			if( $isPost === true && get_post_meta($pageID, $shortname.'_show_post_fullsize_value', true) == 'true' ) {	
				
				// Random image from post gallery
				if(get_post_meta($pageID, $shortname.'_show_random_fullsize_value', true) == 'true'){
				
					$term_id_array = array();
					foreach($post_terms as $index => $value){
						$term_id_array[$index] = $index;
					}
	
					$random_post = max_query_term_posts( 1 , $term_id_array, 'gallery', 'rand' );
					$imgUrl = max_get_image_path($random_post[0]->ID, 'full');							
				
				}else if ( get_post_meta($pageID, $shortname.'_show_random_fullsize_value', true) != 'true' ){

					if($imageURL == ""){
						// No image url set => show featured image
						$imgUrl = max_get_image_path($pageID, 'full');					
					}else{						
						// Image url is set
						$imgUrl = $imageURL;
					}
										
				}
				
			?>		
				<a class="item" href="<?php if( is_multisite() && $imageURL == "" ){ echo WP_CONTENT_URL; } echo $imgUrl; ?>"></a>
			<?php
			}
			?>			
			
			<?php			
			// Get Background image for pages		
			if( get_post_meta($pageID , 'max_show_page_fullsize', true) == 'true' ){				
						
				if($imageURL == ""){
					
					// Random image from featured homepage gallery
					$imgUrl = max_get_image_path($random_post[0]->ID, 'full');	
					
				}else{	
					
					// show image from entered URL				
					$imgUrl = $imageURL;
				}
				
				?>
				
				<a class="item" href="<?php if( is_multisite() && $imageURL == "" ){ echo WP_CONTENT_URL; } echo $imgUrl; ?>"></a>
								
			<?php 
			} 
			?>
					
			<?php wp_reset_query(); ?>		
					
		</div>
	
<?php }
}
?>

<?php

	// Get Google Analyric Code if set in options menu
	$google_id = get_option_max('google_analytics_id');
	if(!empty($google_id)){
			
		// Get the template part
		get_template_part( 'google_analytic' );
			
	}
?>

<?php wp_footer(); ?>

</body>
</html>
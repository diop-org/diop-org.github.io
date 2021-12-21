<?php
/**
 * @package WordPress
 * @subpackage invictus
 */

global $meta, $isPost;

$showSuperbgimage = true ;
$fromGallery = true;
$isPost = true;

// store post id for use in other loops
$_stored_postid = $post->ID;

//Get the page meta informations and store them in an array
$meta = max_get_cutom_meta_array();


if(isset($meta[MAX_SHORTNAME.'_photo_slider_select'])) :
	
	/*-----------------------------------------------------------------------------------*/
	/*  Get Slides Slider JS if needed
	/*-----------------------------------------------------------------------------------*/
	if( $meta[MAX_SHORTNAME.'_photo_slider_select'] == 'slider-slides'){
		wp_enqueue_script('jquery-slides', get_template_directory_uri() .'/slider/slides/slides.min.jquery.js', 'jquery');
		wp_enqueue_style('slides-css', get_template_directory_uri().'/slider/slides/slider-slides.css', false, false);	
	}
	
	/*-----------------------------------------------------------------------------------*/
	/*  Get Nivo Slider JS if needed
	/*-----------------------------------------------------------------------------------*/
	
	if($meta[MAX_SHORTNAME.'_photo_slider_select'] == 'slider-nivo'){
		wp_enqueue_script('jquery-nivo', get_template_directory_uri() .'/slider/nivo/jquery.nivo.slider.pack.js', 'jquery');
		wp_enqueue_style('nivo-css', get_template_directory_uri().'/slider/nivo/nivo-slider.css', false, false);	
	}
	
	/*-----------------------------------------------------------------------------------*/
	/*  Get Kwicks Slider JS if needed
	/*-----------------------------------------------------------------------------------*/
	if($meta[MAX_SHORTNAME.'_photo_slider_select'] == 'slider-kwicks'){
		wp_enqueue_script('jquery-kwicks', get_template_directory_uri() .'/slider/kwicks/jquery.kwicks.min.js', 'jquery');
		wp_enqueue_style('kwicks-css', get_template_directory_uri().'/slider/kwicks/kwicks-slider.css', false, false);	
	}

endif;

/*-----------------------------------------------------------------------------------*/
/*  Get JPlayer JS if needed
/*-----------------------------------------------------------------------------------*/
if( $meta[MAX_SHORTNAME.'_photo_item_type_value'] == 'selfhosted' || $meta[MAX_SHORTNAME.'_photo_item_type_value'] == 'embedded' )  {
	wp_enqueue_script('swobject', get_template_directory_uri() .'/js/swfobject.js', 'jquery');
	wp_enqueue_script('jwplayer', get_template_directory_uri() .'/js/jwplayer/jwplayer.js', 'jquery');
}

wp_reset_query();

get_header();

?>

<div id="single-page" class="clearfix left-sidebar">

		<div id="primary">		
		
			<?php 
			
				the_post(); 
				
				// get the posts terms for further use
				$terms = wp_get_post_terms($post->ID, GALLERY_TAXONOMY);
				$term_list = "";
				$post_terms = array();
				foreach ($terms as $term) {
					$term_list .= '<a href="' . get_term_link($term->slug, GALLERY_TAXONOMY) . '">'.$term->name.'</a>, ';
					$post_terms[$term->term_id] =  $term->slug;
				}				
				
			?>
		
			<header class="entry-header">
					
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php 
				// check if there is a excerpt
				if( max_get_the_excerpt() ){ 
				?>
				<h2 class="entry-description"><?php max_get_the_excerpt(true) ?></h2>
				<?php } ?>
				
				<div class="clearfix entry-meta entry-meta-head">

					<ul>
						<?php															
							printf( __( '<li>By <span>%1$s</span>&nbsp;/</li> ', MAX_SHORTNAME), get_the_author() );
							printf( __( '<li><span>%1$s</span>&nbsp;/</li>', MAX_SHORTNAME), get_the_date() );
							printf( __( '<li>In <span>%1$s</span>&nbsp;/</li>', MAX_SHORTNAME), substr($term_list, 0, -2) );
							echo '<li class="cnt-comment"><a href="#comments-holder"><span class="icon"></span>';
							comments_number( 'No Comments', '1 Comment', '% Comments' );
							echo '</a></li>';					
						?>
					</ul>

					<!-- Entry nav -->					
					<?php
					
						// Get all Images from the Gallery for navigation
						$term_ids = array();
						foreach($post_terms as $index => $value){
							$term_ids[$index] = $index;
						}
															
						$_nav_ids = max_get_custom_prev_next($term_ids);
									
					?>
					<ul class="nav-posts">
						<?php if($_nav_ids['prev_id']){ ?>
						<li class="nav-previous tooltip" title="<?php _e('Previous post', MAX_SHORTNAME) ?>"><a href="<?php echo get_permalink( $_nav_ids['prev_id'] ) ?>"><span class="meta-nav"><?php _e( 'Previous post link', MAX_SHORTNAME ) ?></span></a></li>
						<?php } ?>
						<?php if($_nav_ids['next_id']){ ?>
						<li class="nav-next tooltip" title="<?php _e('Next post', MAX_SHORTNAME) ?>"><a href="<?php echo get_permalink( $_nav_ids['next_id'] ) ?>"><span class="meta-nav"><?php _e( 'Next post link', MAX_SHORTNAME ) ?></span></a></li>
						<?php } ?>
					</ul>	
						
				</div><!-- .entry-meta -->				
			
			</header><!-- .entry-header -->

			<?php if ( @$_COOKIE['wp-postpass_' . COOKIEHASH] == $post->post_password || $post->post_password == "")  { ?>

			<div id="content" role="main">
			
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					<?php 				
					/*-----------------------------------------------------------------------------------*/
					/*  Get the needed Slider Template if a slider is selected
					/*-----------------------------------------------------------------------------------*/
					if( isset($meta[MAX_SHORTNAME.'_photo_slider_select']) && $meta[MAX_SHORTNAME.'_photo_slider_select'] != "" && $meta[MAX_SHORTNAME.'_photo_slider_select'] != "none" && $meta[MAX_SHORTNAME.'_photo_item_type_value'] == 'projectpage' ){
						// strip of "slider-"
						$slider_tpl = split("-", $meta[MAX_SHORTNAME.'_photo_slider_select'] );	
						get_template_part( 'includes/slider', $slider_tpl[1].'.inc' );
					}
					/*-----------------------------------------------------------------------------------*/
					/*  Get the needed Image or Video
					/*-----------------------------------------------------------------------------------*/
					else if( $meta[MAX_SHORTNAME.'_photo_item_type_value'] == 'selfhosted' || 
						$meta[MAX_SHORTNAME.'_photo_item_type_value'] == 'youtube_embed' || 
						$meta[MAX_SHORTNAME.'_photo_item_type_value'] == "vimeo_embed" )
					{
						
						get_template_part( 'includes/post', 'video.inc' );
						
					}else{

						// start featured image code here										
						if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { 
						
							// Get the thumbnail
							$imgID = get_post_thumbnail_id();  
							$imgUrl = max_get_image_path($post->ID, 'full');
							
							$showUrl = $imgUrl;
							
							// Check if images should be cropped
							$timb_height ='';
							$timb_img_height = '';
							
							if(get_option_max( 'image_project_original_ratio' ) != 'true' ) {
								$timb_height = '&amp;h=350';
								$timb_img_height = 'height="350"';
							}
						
					?>
					
						<div class="entry-image">
							<?php 
								// Check if it is an image or video
								if( $meta[MAX_SHORTNAME.'_photo_lightbox_type_value'] == "YouTube-Video" || $meta[MAX_SHORTNAME.'_photo_lightbox_type_value'] == 'youtube' ){
									$showUrl = $meta[MAX_SHORTNAME.'_photo_video_youtube_value'];
								}
							?>
	
							<?php 
								// Check if it is an image or video
								if( $meta[MAX_SHORTNAME.'_photo_lightbox_type_value'] == "Photo" || $meta[MAX_SHORTNAME.'_photo_lightbox_type_value'] == "photo"){
									$showUrl = $imgUrl;
								}
							?>
	
							<?php 
								// Check if it is an image or video
								if( $meta[MAX_SHORTNAME.'_photo_lightbox_type_value'] == "Vimeo-Video" || $meta[MAX_SHORTNAME.'_photo_lightbox_type_value'] == "vimeo"){
									$showUrl = $meta[MAX_SHORTNAME.'_photo_video_vimeo_value'];
								}
							?>
	
							<a href="<?php if( is_multisite() ){ echo WP_CONTENT_URL; } echo $showUrl; ?>" lnk="<?php echo get_permalink($post_id) ?>" class="scroll-link" style="display: block;" rel="prettyPhoto" title="<?php echo get_the_excerpt() ?>">
								<img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php  echo $imgUrl; ?><?php echo $timb_height ?>&amp;w=<?php echo MAX_CONTENT_WIDTH ?>&amp;a=<?php echo get_cropping_direction( $meta[MAX_SHORTNAME.'_photo_cropping_direction_value'] ) ?>&amp;q=100" <?php echo $timb_img_height ?> width="<?php echo MAX_CONTENT_WIDTH ?>" class="fade-image<?php if( get_option_max('image_show_fade') != "true") { echo(" no-hover"); } ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" />
							</a>
										
						</div>
						
					<?php }  ?>
					<?php // end featured image code here ?>
					<?php } ?>
	
					<div class="clearfix">
					
						<?php if( $meta[MAX_SHORTNAME.'_photo_copyright_information_value'] != "" || $meta[MAX_SHORTNAME.'_photo_copyright_link_value'] || $meta[MAX_SHORTNAME.'_photo_location_value'] != "" || $meta[MAX_SHORTNAME.'_photo_date_value'] != "" ) { ?>
						<div class="entry-meta">
							<ul class="clearfix ">									
								<?php if( $meta[MAX_SHORTNAME.'_photo_copyright_link_value'] != "" ){ ?>
								
								<li><?php _e('Copyright','invictus') ?>: <a href="<?php echo $meta[MAX_SHORTNAME.'_photo_copyright_link_value'] ?>" title="<?php echo $meta[MAX_SHORTNAME.'_photo_copyright_information_value'] ?>" target="_blank"><?php echo $meta[MAX_SHORTNAME.'_photo_copyright_information_value'] ?></a></li>
								
								<?php } else { ?>
									
								<li><?php _e('Copyright','invictus') ?>: <?php echo $meta[MAX_SHORTNAME.'_photo_copyright_information_value'] ?></li>
							
								<?php } ?>
																			
								<?php if( $meta[MAX_SHORTNAME.'_photo_location_value'] != "" ) { ?> <li><?php _e('Location','invictus') ?>: <span><?php echo $meta[MAX_SHORTNAME.'_photo_location_value'] ?></span></li> <?php } ?>
								<?php if( $meta[MAX_SHORTNAME.'_photo_date_value'] != "" ) { ?> <li><?php _e('Date','invictus') ?>: <span><?php echo date('m/d/Y',$meta[MAX_SHORTNAME.'_photo_date_value']) ?></span></li> <?php } ?>
							</ul>								
						</div><!-- .entry-meta -->				
						<?php } ?>
					
					
						<?php 
							/*  Include Social Sharing links */
							get_template_part( 'social', 'share' ); 
						?>		
						
						<?php if(get_the_tag_list()){ ?>
						<ul class="clearfix entry-tags">
							<?php echo get_the_tag_list('<li class="title">Tags:<li>','<li>','</li>'); ?>
						</ul>													
						<?php } ?>
				
						<div class="entry-content">	
							<?php the_content(); ?>
						</div><!-- .entry-content -->				
								
						
					</div>
								
				</article><!-- #post-<?php the_ID(); ?> -->
						
				<?php 		
				// Check if other images of a gallery should be shown
				if ( get_option_max('image_show_gallery_images') == "true" ){
									
						// fetch the gallery terms attached to this photo posts
						$obj_galleryTerms = wp_get_post_terms($post->ID, GALLERY_TAXONOMY);						
						foreach($obj_galleryTerms as $index => $value){
							$arr_galleryTerms[$value->term_id] = $value->name;
						}
												
						// query the gallery image posts and store them in an object
						$obj_galleryImages = max_query_posts(get_option_max('image_count_gallery_images'), $arr_galleryTerms, 'rand', false, "DESC");
						$imgDimensions = array( 'width' => 144, 'height' => 100 );
						
					?>
					
					<?php if ( have_posts() ){ // show posts if query found some ?>
							
						<div id="relatedGalleryImages" class="entry-related-images portfolio-four-columns">
							<h3 class="related-title"><?php _e('More from this Gallery', MAX_SHORTNAME) ?></h3>
							
							<ul id="portfolioList" class="clearfix portfolio-list">		
												
								<?php
								// start the posts loop
								while ( have_posts() ) {
																	
									// get the post
									the_post();
													
									// get the post thumbnail url
									$_imgUrl = max_get_image_path( get_the_ID(), 'full' );
												
									?>						
									<li data-id="id-<?php echo get_the_ID() ?>" class="item <?php echo max_get_post_lightbox_class(); ?><?php if( get_option_max('image_show_fade') != "true") { echo(" no-hover"); } ?>">
										<div class="shadow">
											<?php echo '<a href="' . get_permalink() . '" title="' . get_the_title() . '"><img src="' . get_template_directory_uri(). '/timthumb.php?src=' . $_imgUrl .'&amp;w='.$imgDimensions['width'].'&amp;h='.$imgDimensions['height'].'" alt="' . get_the_title() . '" width="'.$imgDimensions['width'].'" height="'.$imgDimensions['height'].'" alt="' . get_the_title() . '" /></a>'; ?>
										</div>
										<?php
										// check if caption option is selected 
										if ( get_option_max( 'image_show_caption' ) == 'true' ) {
										?>
										<div class="item-caption">
											<strong><?php echo get_the_title() ?></strong>
										</div>
										<?php } ?>
									</li>
								<?php } // end of the loop. ?>							
							
							</ul>
							
						</div>
					
					<?php } ?>

					<?php wp_reset_query();	// reset the gallery image query ?>					
				
				<?php } ?>
												
				<?php 					
					// Check if author should be shown and get the Author Infos
					if ( get_option_max('general_show_photo_author') == "true" ){
						echo do_shortcode("[authorbox]");
					}
				?>						
						
				<?php 
					// Get Related Posts
					echo do_shortcode("[related_posts]");
				?>

				<div id="comments-holder" class="clearfix">
					<?php comments_template( '', true ); ?>
				</div>
			
			</div><!-- #content -->
						
			<?php }else{ ?>
			
			<div id="content" role="main">
			
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
					<div class="clearfix">													
				
						<div class="entry-content">	
							<?php the_content(); ?>
						</div><!-- .entry-content -->		
						
					</div>
								
				</article><!-- #post-<?php the_ID(); ?> -->
					
			</div><!-- #content -->
			
			<?php } ?>
			
		</div><!-- #primary -->

		<div id="sidebar">
			 <?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('sidebar-gallery-project') ) ?>		
		</div>

</div>

<?php get_footer(); ?>
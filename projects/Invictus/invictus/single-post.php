<?php
/**
 * Template for displaying the Blog Detail Page 
 *
 * @package WordPress
 * @subpackage Invictus
 * @since Invictus 1.0
 */

//Get the post meta informations and store them in an array
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


get_header(); 

the_post();

?>


<div id="single-page" class="clearfix blog left-sidebar">

		<div id="primary">

			<header class="entry-header">
					
				<h1 class="entry-title"><?php the_title(); ?></h1>
				
				<?php if ( !post_password_required() ) : ?>
				<div class="clearfix entry-meta entry-meta-head">

					<ul>
						<?php
						
							// get entry categories
							$post_categories = wp_get_post_categories( $post->ID );
							$cat_list = array();
							foreach ( $post_categories as $c ) {
								$cat = get_category( $c );
								$cat_list[] .= '<a href="'. get_category_link( $c ) .'">'. $cat->name .'</a>';
							}						
									
							$cat_list = implode(', ', $cat_list);						
																				
							printf( __( '<li>By <span>%1$s</span>&nbsp;/</li> ', MAX_SHORTNAME), get_the_author() );
							printf( __( '<li><span>%1$s</span>&nbsp;/</li>', MAX_SHORTNAME), get_the_date() );
							printf( __( '<li>In <span>%1$s</span>&nbsp;/</li>', MAX_SHORTNAME), substr($cat_list, 0, -2) );
							echo '<li class="cnt-comment"><a href="#comments-holder"><span class="icon"></span>';
							comments_number( 'No Comments', '1 Comment', '% Comments' );
							echo '</a></li>';					
						?>
					</ul>
					
					<!-- Entry nav -->
					<ul class="nav-posts">			
						<?php if(get_previous_post()) {?>
						<li class="nav-previous tooltip" title="<?php _e('Previous post', MAX_SHORTNAME) ?>"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '', 'Previous post link', MAX_SHORTNAME ) . '</span> %title' ); ?></li>
						<?php } ?>
						<?php if(get_next_post()) {?>
						<li class="nav-next tooltip" title="<?php _e('Next post', MAX_SHORTNAME) ?>"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '', 'Next post link', MAX_SHORTNAME ) . '</span>' ); ?></li>
						<?php } ?>
					</ul>					
						
				</div><!-- .entry-meta -->				
				<?php endif; ?>
				
			</header><!-- .entry-header -->

			<div id="content" role="main">
				
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<?php if ( !post_password_required() ) : ?>
					
					<?php 					
					/*-----------------------------------------------------------------------------------*/
					/*  Get the needed Slider Template if a slider is selected
					/*-----------------------------------------------------------------------------------*/
					if( isset($meta[MAX_SHORTNAME.'_photo_slider_select']) && $meta[MAX_SHORTNAME.'_photo_slider_select'] != "" && $meta[MAX_SHORTNAME.'_photo_slider_select'] != "none" && $meta[MAX_SHORTNAME.'_photo_item_type_value'] == "none" ){
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
										
					
						if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { 
						
							// Get the thumbnail
							$imgID = get_post_thumbnail_id();  
							$imgUrl = max_get_image_path($post->ID, 'full');
	
							// Check if images should be cropped
							$timb_height ='';
							$timb_img_height = '';
						
							if(get_option_max( 'image_blog_original_ratio' ) != 'true' ) {
								$timb_height = '&amp;h=250';
								$timb_img_height = 'height="250"';
							}					
						
						?>
						
						<div class="entry-image">
							<a href="<?php if( is_multisite() ){ echo WP_CONTENT_URL; } echo $imgUrl; ?>" lnk="<?php echo get_permalink($post_id) ?>" class="scroll-link" style="display: block;" rel="prettyPhoto" title="<?php echo get_the_excerpt() ?>">
								<img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php  echo $imgUrl; ?><?php echo $timb_height ?>&amp;w=<?php echo MAX_CONTENT_WIDTH ?>&amp;a=<?php echo $meta[MAX_SHORTNAME.'_photo_cropping_direction_value']; ?>&amp;q=100" <?php echo $timb_img_height ?> width="<?php echo MAX_CONTENT_WIDTH ?>" class="fade-image<?php if( get_option_max('image_show_fade') != "true") { echo(" no-hover"); } ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" />
							</a>				
						</div>
							
						<?php }
					} ?>
					
					<?php endif; ?>
					
					<div class="clearfix">
						
						<?php if ( !post_password_required() ) : ?>
						<?php 
							/*  Include Social Sharing links */
							get_template_part( 'social', 'share' ); 
						?>
						<?php endif; ?>							
				
						<div class="entry-content">	
							<?php the_content(); ?>
						</div><!-- .entry-content -->
						
					</div>
				
				</article>
				
				<?php if ( !post_password_required() ) : ?>
				<?php
					// Check if author should be shown
					if ( get_option_max('general_show_author') == "true" ) 
						echo do_shortcode("[authorbox]")
				?>

				<?php 
					echo do_shortcode("[related_posts]") 
				?>
				
				<div id="comments-holder" class="clearfix">
					<?php comments_template( '', true ); ?>
				</div>
				
				<div class="pagination hidden"><p><?php posts_nav_link(' '); ?></p></div>
				<?php endif; ?>
				
			</div><!-- #content -->
		</div><!-- #primary -->
		
		<?php if ( !post_password_required() ) : ?>
		<div id="sidebar">
			 <?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('sidebar-blog-post') ) ?>		
		</div>
		<?php endif; ?>
		
</div>

<?php get_footer(); ?>


<?php
/**
 * Template Name: Portfolio Galleria Template
 *
 * @package WordPress
 * @subpackage Photonova
 * @since Photonova 1.0
 */

global $body_class_array, $meta;

wp_enqueue_script('jquery-galleria', get_template_directory_uri() .'/js/galleria/galleria-1.2.5.min.js', 'jquery');
wp_enqueue_style('galleria-css', get_template_directory_uri().'/js/galleria/galleria.classic.css', false, false);	

/*-----------------------------------------------------------------------------------*/
/*  Main Settings and variables
/*-----------------------------------------------------------------------------------*/
$meta = max_get_cutom_meta_array();

get_header();

$galleryPosts = max_query_term_posts( 9999 , $meta['max_select_gallery'], 'gallery', $order_by );	

?>

<?php 
// get the password protected login template part
if ( post_password_required() ) {
	get_template_part( 'includes/page', 'password.inc' );
} else {
?>

		<div id="primary" class="hfeed">
			
			<div id="content" role="main">
				
				<div <?php if(!is_front_page() && !is_Home()) the_post(); post_class('entry-header'); ?> id="post-<?php the_ID(); ?>">				
								

					<header class="clearfix">						
						<h1 class="page-title"><?php the_title(); ?></h1>
						<?php 
						// check if there is a excerpt
						if( max_get_the_excerpt() ){ 
						?>
						<h2 class="page-description"><?php max_get_the_excerpt(true) ?></h2>
						<?php } ?>				
					</header><!-- .entry-header -->
							
								
					<?php 
					if (have_posts()) : 
						
						// open galleria container
						$gal_output = '<div id="galleria" class="clearfix';
											
						$gal_output .= '">';
						
						while (have_posts()) {
							// get the post									
							the_post();
							// get image url
							$_poster_url =  max_get_image_path(get_the_ID(), 'full');
							// get post custom meta
							$_post_meta = max_get_cutom_meta_array(get_the_ID());						
							// attach image to output
							if(is_multisite()){
								$gal_output .= '<a href="'.WP_CONTENT_URL.$_poster_url.'">';
							}else{
								$gal_output .= '<a href="'.$_poster_url.'">';
							}
							$gal_output .= '<img title="' . get_the_title() . '"
											alt="' . $_post_meta[MAX_SHORTNAME.'_caption_text'] . '"
											src="' . get_template_directory_uri() . '/timthumb.php?src=' . $_poster_url . '&amp;w=100&amp;h=100&amp;a=c">
										</a>';
						}
						// close galleria container
						$gal_output .= '</div>';				
						wp_reset_query();
					endif;

					echo $gal_output; 
					?>					

					<?php if($post->post_content != "") : ?>
					<p>&nbsp;</p><br  />
					<div class="clearfix">
					<?php the_content() ?>
					</div>
					<?php endif; ?>
					
					<?php if ( $post->comment_status == 'open' && get_option_max('general_page_show_comments') == 'true' ) { ?>
					<div id="comments-holder" class="clearfix">
						<?php comments_template( '', true ); ?>
					</div>				
					<?php } ?>
										
				</div><!-- #post -->		

			</div><!-- #content -->
		</div><!-- #container -->

<script type="text/javascript">
//<![CDATA[
jQuery(function(){
	
    // Load the classic theme
	Galleria.loadTheme('<?php echo get_template_directory_uri() ?>/js/galleria/galleria.classic.min.js');

	// Initialize Galleria
	$('#galleria').galleria({
		<?php if( $meta[MAX_SHORTNAME.'_page_galleria_autoplay'] == 'true' ){ ?>
		autoplay: <?php echo $meta[MAX_SHORTNAME.'_page_galleria_autoplay']; ?>,
		<?php } ?>
		width: 660,
        height: <?php echo $meta[MAX_SHORTNAME.'_page_galleria_height']?>,
		imageCrop: '<?php echo $meta[MAX_SHORTNAME.'_page_galleria_crop'] ?>'
	});
	
});		
//]]>	
</script>
<?php } ?>
<?php get_footer(); ?>
<?php
/**
 * Template Name: Portfolio Fullsize Gridview
 *
 * @package WordPress
 * @subpackage Invictus
 * @since Invictus 1.0
 */

wp_enqueue_script('masonry');

get_header(); 

wp_reset_query();

// set the image dimensions for this portfolio template
if( !get_option_max( 'image_fullsize_grid_width') || get_option_max( 'image_fullsize_grid_width') == ""){
	$imgDimensions = array( 'width' => 200 );
}else{
	$imgDimensions = array( 'width' => get_option_max( 'image_fullsize_grid_width' ) );
}

// set the height if its larger than 0
if( get_option_max( 'image_fullsize_grid_height') && get_option_max( 'image_fullsize_grid_height') > 0 ){
	$imgDimensions['height'] = get_option_max( 'image_fullsize_grid_height' );
}

$itemCaption = true;

?>
<?php 
// get the password protected login template part
if ( post_password_required() ) {
	get_template_part( 'includes/page', 'password.inc' );
} else {
?>
		<div id="primary" class="portfolio-fullsize-grid">
			<div id="content" role="main">
				
				<header class="entry-header">
						
				<h1 class="page-title"><?php the_title(); ?></h1>
				<?php 
				// check if there is a excerpt
				if( max_get_the_excerpt() ){ 
				?>
				<h2 class="page-description"><?php max_get_the_excerpt(true) ?></h2>
				<?php } ?>
				
				</header><!-- .entry-header -->

				<?php /* -- added 2.0 -- */ ?>
				<?php the_content() ?>
				<?php /* -- end -- */ ?>
			
				<?php 
					// including the loop template gallery-loop.php
					get_template_part( 'gallery-loop' );
				?>

			</div><!-- #content -->
		</div><!-- #container -->
		
		<script type="text/javascript"> 
		//<![CDATA[
		jQuery(function(){
				   
		var container = jQuery('#portfolioList');
		
			jQuery('#portfolioList li.item').css({ opacity: 0 });
			
			container.imagesLoaded( function(){
				container.masonry({
					itemSelector : 'li.item',
					isAnimated: true,
					gutterWidth: 5,
					columnWidth: <?php get_option_max( 'image_fullsize_grid_width', true ) ?>
				})
				
				jQuery('#portfolioList li.item').animate({ opacity: 1 },150);				
								
			});

		});
		
		//]]>
		</script> 
		<style type="text/css">
			/** Masonry Portfolio **/
			.portfolio-fullsize-grid .portfolio-list li { 
				margin: 0 5px 5px 0;
				width: <?php get_option_max( 'image_fullsize_grid_width', true ) ?>px;
			}
		</style>		
<?php } ?>
<?php get_footer(); ?>

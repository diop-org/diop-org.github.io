<?php
/**
 * Template Name: Portfolio Fullsize Scroller
 *
 * @package WordPress
 * @subpackage Invictus
 * @since Invictus 1.0
 */

global $meta; 


wp_enqueue_script('jquery-mousewheel');
wp_enqueue_script('custom-scroller');

$meta = max_get_cutom_meta_array();

get_header(); 

// set the image dimensions for this portfolio template
$imgDimensions = array( 'height' => get_option_max( 'image_fullsize_scroller_height' ) );

$itemCaption = true;

?>

		<style type="text/css">
			.scroll-pane,
			.scroll-content { height: <?php get_option_max( 'image_fullsize_scroller_height', true ) ?>px }
		</style>

		<div id="primary" class="clearfix portfolio-fullsize-scroller<?php if ( post_password_required() ) : ?> portfolio-fullsize-closed<?php endif; ?>">
			<div id="content" role="main" class="clearfix">
				
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

				<?php if (@$_COOKIE['wp-postpass_' . COOKIEHASH] == $post->post_password || $post->post_password == "") { ?>
				<div class="scroll-pane">
					
					<div class="scroll-content">
					<?php 
						// including the loop template gallery-loop.php
						get_template_part( 'gallery-loop' );
					?>
					</div>
					<a href="#scroll-left" id="scroll_left" class="scroller-arrow disabled">Scroll Left</a>
					<a href="#scroll-right" id="scroll_right" class="scroller-arrow">Scroll Right</a>
					
					<div class="scroll-bar-wrap ui-widget-content ui-corner-bottom">
						<div class="scroll-bar"></div>
					</div>					
					
				</div>
				<?php } ?>

			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>

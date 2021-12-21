<?php
/**
 * Template Name: Portfolio 2 Columns
 *
 * @package WordPress
 * @subpackage Invictus
 * @since Invictus 1.0
 */

get_header(); 

wp_reset_query();

// set the image dimensions for this portfolio template
$imgDimensions = array( 'width' => 285, 'height' => 214 );

$itemCaption = true;
$hideExcerpt = true;

?>
<div id="single-page" class="clearfix left-sidebar">

		<div id="primary" class="portfolio-two-columns" >
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

				<?php if( $meta['max_page_allow_comments'] == 'true') { ?>
				<div id="comments-holder" class="clearfix">
                	<?php comments_template( '', true ); ?>
				</div>				
				<?php } ?>
				
			</div><!-- #content -->
		</div><!-- #container -->

		<div id="sidebar">
			<?php /* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('sidebar-gallery-two') ) ?>
		</div>		

</div>

<?php get_footer(); ?>

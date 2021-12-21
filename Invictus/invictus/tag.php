<?php
/**
 * The template for displaying Tag Archive pages.
 *
 * @package WordPress
 * @subpackage invictus
 * @since invictus 1.0
 */

get_header(); 

// set the image dimensions for this portfolio template
$imgDimensions = array( 'width' => 190, 'height' => 134 );

$substrExcerpt = 70;

$itemCaption = true;

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$tag_posts = query_posts( array('tag'=> get_query_var('tag'), 'post_type' => 'gallery', 'paged' => $paged) );

?>

<div id="single-page" class="clearfix left-sidebar">

		<div id="primary" class="portfolio-three-columns" >
			<div id="content" role="main">
				
				<header class="entry-header">
										
					<h1 class="page-title"><?php single_tag_title() ?></h1>
				
				</header><!-- .entry-header -->
				
				<?php 
					// including the loop template gallery-loop.php
					get_template_part( 'tag-loop', 'tag' );
				?>
			
				
				</div><!-- #content -->
				
		</div><!-- #container -->

		<div id="sidebar">
			 <?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('sidebar-tag') ) ?>
		</div>

</div>

<?php get_footer(); ?>

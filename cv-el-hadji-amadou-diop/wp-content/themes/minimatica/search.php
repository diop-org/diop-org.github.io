<?php
/**
 * Template to display search results
 *
 * @package WordPress
 * @subpackage Minimatica
 * @since Minimatica 1.0
 */

get_header(); ?>
<div class="title-container">
	<h1 class="page-title"><?php _e( 'Search Results for', 'minimatica' ); ?>: &quot;<?php echo get_search_query(); ?>&quot;</h1>
</div><!-- .title-container -->
<div id="container">
	<?php get_template_part( 'loop', 'search' ); ?>
	<?php get_sidebar(); ?>
	<div class="clear"></div>
</div><!-- #container -->
<?php get_footer(); ?>
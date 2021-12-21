<?php
/**
 * The main template
 *
 * Used as fallback if no other temokate found
 *
 * @package WordPress
 * @subpackage Minimatica
 * @since Minimatica 1.0
 */

get_header(); ?>
	<div id="container">
		<?php get_template_part( 'loop', 'index' ); ?>
		<?php get_sidebar(); ?>
		<div class="clear"></div>
	</div><!-- #container -->
<?php get_footer(); ?>
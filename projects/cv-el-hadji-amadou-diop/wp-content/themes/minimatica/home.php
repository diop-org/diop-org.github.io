<?php
/**
 * Template to display the default posts page
 *
 * @package WordPress
 * @subpackage Minimatica
 * @since Minimatica 1.0
 */

get_header(); ?>
<?php if( 'gallery' == minimatica_get_option( 'homepage_view' ) ) : ?>
	<div id="slider">
		<?php get_template_part( 'loop', 'slider' ); ?>
	</div><!-- #slider -->
<?php else : ?>
	<div id="container">
		<?php get_template_part( 'loop', 'index' ); ?>
		<?php get_sidebar(); ?>
		<div class="clear"></div>
	</div><!-- #container -->
<?php endif; ?>
<?php get_footer(); ?>
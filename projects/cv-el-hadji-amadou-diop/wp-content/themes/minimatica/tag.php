<?php
/**
 * Template for tag archives
 *
 * @package WordPress
 * @subpackage Minimatica
 * @since Minimatica 1.0
 */

get_header(); ?>

<?php if( 'gallery' == minimatica_get_option( 'tag_view' ) ) : ?>
	<div id="slider">
		<?php get_template_part( 'loop', 'slider' ); ?>
	</div><!-- #slider -->
<?php else : ?>
 	<div class="title-container">
		<h1 class="page-title"><?php _e( 'Entries tagged with', 'minimatica' ); ?> &quot;<?php single_tag_title(); ?>&quot;</h1>
	</div><!-- .title-container -->
	<div id="container">
		<?php get_template_part( 'loop', 'tag' ); ?>
		<?php get_sidebar(); ?>
		<div class="clear"></div>
	</div><!-- #container -->
<?php endif; ?>
<?php get_footer(); ?>
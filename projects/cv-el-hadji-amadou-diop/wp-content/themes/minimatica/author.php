<?php
/**
 * Template for author archives
 *
 * @package WordPress
 * @subpackage Minimatica
 * @since Minimatica 1.0
 */

get_header(); ?>

<?php if( 'gallery' == minimatica_get_option( 'author_view' ) ) : ?>
	<div id="slider">
		<?php get_template_part( 'loop', 'slider' ); ?>
	</div><!-- #slider -->
<?php else : ?>
 	<div class="title-container">
		<h1 class="page-title"><?php _e( 'Entries by', 'minimatica' ); ?> <?php the_author_meta( 'display_name', get_query_var( 'author' ) ); ?></h1>
	</div><!-- .title-container -->
	<div id="container">
		<?php get_template_part( 'loop', 'author' ); ?>
		<?php get_sidebar(); ?>
		<div class="clear"></div>
	</div><!-- #container -->
<?php endif; ?>
<?php get_footer(); ?>
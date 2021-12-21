<?php
/**
 * Template for category archives
 *
 * @package WordPress
 * @subpackage Minimatica
 * @since Minimatica 1.0
 */

get_header(); ?>
<?php if( ( 'gallery' == minimatica_get_option( 'category_view' ) ) && ( get_query_var( 'cat' ) != minimatica_get_option( 'blog_category' ) ) ) : ?>
	<div id="slider">
		<?php get_template_part( 'loop', 'slider' ); ?>
	</div><!-- #slider -->
<?php else : ?>
 	<div class="title-container">
		<h1 class="page-title"><?php single_cat_title(); ?></h1>
	</div><!-- .title-container -->
	<div id="container">
		<?php get_template_part( 'loop', 'category' ); ?>
		<?php get_sidebar(); ?>
		<div class="clear"></div>
	</div><!-- #container -->
<?php endif; ?>
<?php get_footer(); ?>
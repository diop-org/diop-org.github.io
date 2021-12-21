<?php
/**
 * Template used as fallback for archive pages
 *
 * @package WordPress
 * @subpackage Minimatica
 * @since Minimatica 1.0
 */

get_header(); ?>

<?php if( 'gallery' == minimatica_get_option( 'archive_view' ) ) : ?>
	<div id="slider">
		<?php get_template_part( 'loop', 'slider' ); ?>
	</div><!-- #slider -->
<?php else : ?>
 	<div class="title-container">
		<h1 class="page-title">
			<?php _e( 'Archive for', 'minimatica' ); ?>
			<?php if ( is_day() ) :
				echo get_the_date();
			elseif ( is_month() ) :
				echo get_the_date( 'F Y' );
			elseif ( is_year() ) :
				echo get_the_date( 'Y' );
			endif; ?>
		</h1>
	</div><!-- .title-container -->
	<div id="container">
		<?php get_template_part( 'loop', 'archive' ); ?>
		<?php get_sidebar(); ?>
		<div class="clear"></div>
	</div><!-- #container -->
<?php endif; ?>
<?php get_footer(); ?>
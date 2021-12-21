<?php
/**
 * The Loop for single posts
 *
 * @package WordPress
 * @subpackage Minimatica
 * @since Minimatica 1.0
 */
 ?>
 
 <?php if( have_posts() ) : the_post(); ?>
	<div class="title-container">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</div><!-- .title-container -->
	<div id="container">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php get_template_part( 'content', get_post_format() ); ?>
		</article><!-- .post -->
		<?php get_sidebar(); ?>
		<div class="clear"></div>
	</div><!-- #container -->
<?php endif; ?>
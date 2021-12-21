<?php
/**
 * The Loop for static pages
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
			<div id="content">
				<section class="entry-content">
					<?php the_content(); ?>
					<div class="clear"></div>
					<?php wp_link_pages(); ?>
				</section><!-- .entry-content -->
				<?php comments_template(); ?>
			</div><!-- #content -->
		</article><!-- .post -->
		<?php get_sidebar(); ?>
		<div class="clear"></div>
	</div><!-- #container -->
<?php endif; ?>
<?php
/**
 * The Main Loop
 *
 * Used as fallback if no specific loop file found
 *
 * @package WordPress
 * @subpackage Minimatica
 * @since Minimatica 1.0
 */
 ?>
 
 <?php if( have_posts() ) : ?>
	<div id="content" role="main">
		<?php while( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php if( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
							<?php the_post_thumbnail( 'homepage-thumb' ); ?>
						</a>
					<?php endif; ?>
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<aside class="entry-meta<?php if( has_post_thumbnail() ) : ?> folded<?php endif; ?>">
						<?php _e( 'By', 'minimatica' ); ?> <?php the_author_posts_link(); ?>
						<?php _e( 'on', 'minimatica' ); ?>
						<time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>
					</aside><!-- .entry-meta -->
				</header><!-- .entry-header -->
				<section class="entry-summary">
					<?php the_excerpt(); ?>
				</section><!-- .entry-summary -->
				<footer class="entry-footer">
					<a class="more-link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php echo __( 'Continue reading', 'minimatica' ) . ' &rarr;'; ?></a>
				</footer><!-- entry-footer -->
			</article><!-- .post -->
		<?php endwhile; ?>
		<?php if ( $wp_query->max_num_pages > 1 ) : ?>
			<div id="posts-nav" class="navigation">
				<div class="nav-previous"><?php next_posts_link( '&larr; ' . __( 'Older Posts', 'minimatica' ) ); ?></div>
				<div class="nav-next"><?php previous_posts_link( __( 'Newer Posts', 'minimatica' ) . ' &rarr;' ); ?></div>
				<div class="clear"></div>
			</div><!-- #nav-above -->
		<?php endif; ?>
	</div><!-- #content -->
<?php else : ?>
	<div id="content">
		<div id="post-0" <?php post_class(); ?>>
			<div class="entry-content">
				<p><?php _e( 'The content you were looking for could not be found.', 'minimatica' ); ?></p>
				<?php get_search_form(); ?>
			</div><!-- .entry-content -->
		</div><!-- .post -->
	</div><!-- #content -->
<?php endif; ?>
<?php
/**
 * The Loop when viewing in gallery mode
 *
 * @package WordPress
 * @subpackage Minimatica
 * @since Minimatica 1.0
 */
?>
<?php
	global $wp_query, $query_string;
	$paged = get_query_var( 'paged' );
	$args = array(
		'posts_per_page' => 4,
		'paged' => $paged,
		'ignore_sticky_posts' => 1
	);
	$args = wp_parse_args( $args, $wp_query->query );
?>
<?php query_posts( $args ); ?>
<?php if( have_posts() ) : ?>
	<div id="ajax-content">
		<ul id="slides" class="kwicks">
			<?php while( have_posts() ) : the_post(); ?>
				<?php $thumbnail = null; ?>
				<?php if( has_post_thumbnail() ) : ?>
					<?php $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'slider-thumb' ); ?>
				<?php endif; ?>
				<li class="slide">
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?><?php if( isset( $thumbnail ) ) : ?> style="background:url(<?php echo $thumbnail[0]; ?>) center no-repeat"<?php endif; ?>>
						<div class="opacity"></div>
						<a class="overlay" href="<?php the_permalink(); ?>" rel="bookmark"></a>
						<div class="entry-container">
							<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
							<div class="entry-summary">
								<?php the_excerpt(); ?>
								<div class="clear"></div>
							</div><!-- .entry-summary -->
						</div><!-- .entry-container -->
					</div><!-- .post -->
				</li>
				<?php $thumbnaill = null; ?>
			<?php endwhile; ?>
		</ul><!-- #slides -->
		<div class="clear"></div>
		<?php if ( $wp_query->max_num_pages > 1 ) : ?>
			<div id="nav-slider">
				<div class="nav-previous"><?php next_posts_link( '' ); ?></div>
				<div class="nav-next"><?php previous_posts_link( '' ); ?></div>
			</div><!-- #nav-above -->
		<?php endif; ?>
		<?php rewind_posts(); ?>
	</div><!-- #ajax-content -->
<?php endif; ?>
<?php wp_reset_query(); ?>
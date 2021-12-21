<?php
/**
 * Displays the content of posts with audio format
 *
 * @package WordPress
 * @subpackage Minimatica
 * @since Minimatica 1.0
 */
 ?>

<div id="content">
	<section class="entry-content">
		<?php the_post_thumbnail( 'homepage-thumb' ); ?>
		<?php minimatica_post_audio(); ?>
		<?php the_content(); ?>
		<div class="clear"></div>
		<?php wp_link_pages( array( 'before' => '<p class="pagination">' . __( 'Pages' ) . ': ' ) ); ?>
	</section><!-- .entry-content -->
	<div class="entry-header">
		<aside class="entry-meta">
			<ul>
				<li><?php _e( 'Posted by', 'minimatica' ); ?> <?php the_author_posts_link(); ?></li>
				<li><?php _e( 'on', 'minimatica' ); ?> <time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time></li>
				<li><?php _e( 'Filed under', 'minimatica' ); ?> <?php the_category( ', ' ); ?></li>
			</ul>
			<?php the_tags( '<div class="entry-tags">', ' ', '</div>' ); ?>
		</aside><!-- .entry-meta -->
		<div class="clear"></div>
	</div><!-- .entry-header -->
	<?php comments_template(); ?>
	<div class="clear"></div>
</div><!-- #content -->
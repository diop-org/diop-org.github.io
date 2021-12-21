<?php
/**
 * Displays the post content. Used as fallback for post formats
 *
 * @package WordPress
 * @subpackage Minimatica
 * @since Minimatica 1.0
 */
 ?>

<div id="content">
	<div class="entry-header">
		<a class="colorbox" href="<?php $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); echo $thumbnail[0] ?>">
			<?php the_post_thumbnail( 'single-thumb' ); ?>
		</a>
		<aside class="entry-meta">
			<ul>
				<li><?php _e( 'Written by', 'minimatica' ); ?> <?php the_author_posts_link(); ?></li>
				<li><?php _e( 'on', 'minimatica' ); ?> <time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time></li>
				<li><?php _e( 'Filed under', 'minimatica' ); ?> <?php the_category( ', ' ); ?></li>
				<?php edit_post_link( __( 'Edit', 'minimatica' ), '<li>', '</li>' ); ?>
			</ul>
			<?php the_tags( '<div class="entry-tags">', ' ', '</div>' ); ?>
		</aside><!-- .entry-meta -->
		<div class="clear"></div>
	</div><!-- .entry-header -->
	<section class="entry-content">
		<?php the_content(); ?>
		<div class="clear"></div>
		<?php wp_link_pages( array( 'before' => '<p class="pagination">' . __( 'Pages' ) . ': ' ) ); ?>
	</section><!-- .entry-content -->
	<?php comments_template(); ?>
</div><!-- #content -->
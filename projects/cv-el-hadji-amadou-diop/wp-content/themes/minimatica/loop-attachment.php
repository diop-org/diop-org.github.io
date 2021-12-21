<?php
/**
 * The Loop for attachment posts
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
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div id="content">
				<div class="entry-content">
					<div class="entry-attachment">
						<a<?php if ( wp_attachment_is_image() ) : ?> class="colorbox"<?php endif; ?> href="<?php echo wp_get_attachment_url(); ?>" title="<?php the_title_attribute(); ?>" rel="attachment">
							<?php if ( wp_attachment_is_image() ) : ?>
								<?php echo wp_get_attachment_image( $post->ID, 'attachment-thumb' ); ?>
							<?php else : ?>
								<?php echo basename( get_permalink() ); ?>
							<?php endif; ?>
						</a>
					</div><!-- .entry-attachment -->
					<?php if ( !empty( $post->post_excerpt ) ) : ?>
						<div class="entry-caption">
							<?php the_excerpt(); ?>
						</div><!-- .entry-caption -->
					<?php endif; ?>
					<?php the_content(); ?>
					<div class="clear"></div>
					<?php wp_link_pages(); ?>
				</div><!-- .entry-content -->
				<div class="post-top">
					<div class="entry-meta">
						<ul>
							<li><?php _e( 'Posted by', 'minimatica' ); ?> <?php the_author_posts_link(); ?></li>
							<li><?php _e( 'on', 'minimatica' ); ?> <?php the_date( get_option( 'date_format' ) ); ?></li>
							<?php if ( wp_attachment_is_image() ) : ?>
								<?php $metadata = wp_get_attachment_metadata(); ?>
								<li>
									<?php _e( 'Full size is', 'minimatica' );?>
									<a href="<?php echo wp_get_attachment_url(); ?>" title="<?php _e( 'Link to full-size image', 'minimatica' ); ?>"><?php echo $metadata['width']; ?> &times; <?php echo $metadata['height']; ?></a>
									<?php _e( 'pixels', 'minimatica' ); ?>
								</li>
							<?php endif; ?>
						</ul>
					</div><!-- .entry-meta -->
					<div id="attachment-nav">
						<div class="nav-next"><?php next_image_link(); ?></div>
						<div class="nav-previous"><?php previous_image_link(); ?></div>
						<div class="clear"></div>
					</div><!-- #attachment-nav -->
					<div class="clear"></div>
				</div><!-- .post-top -->
				<?php comments_template(); ?>
			</div><!-- #content -->
		</div><!-- .post -->
		<?php get_sidebar(); ?>
		<div class="clear"></div>
	</div><!-- #container -->
<?php endif; ?>
<?php
/**
 * @package Lazy Sunday
 */

get_header();
global $post;

?>

	<div id="content" class="content">
	<div class="title-header">
		<h2 class="page_title">
			<?php if ( is_day() ) : ?>
				<?php printf( __( 'Daily Archives:' , 'lazy-sunday' ) . ' %s', '<span>' . get_the_date() . '</span>' ); ?>
			<?php elseif ( is_month() ) : ?>
				<?php printf( __( 'Monthly Archives:' , 'lazy-sunday' ) . ' %s', '<span>' . get_the_date( 'F Y' ) . '</span>' ); ?>
			<?php elseif ( is_year() ) : ?>
				<?php printf( __( 'Yearly Archives:' , 'lazy-sunday' ) . ' %s', '<span>' . get_the_date( 'Y' ) . '</span>' ); ?>
			<?php elseif ( is_category() ) : ?>
				<?php printf( __( 'Category Archives:' , 'lazy-sunday' ) . ' %s', '<span>' . single_cat_title( '', false ) . '</span>' ); ?>
			<?php elseif ( is_tag() ) : ?>
				<?php printf( __( 'Tag Archives:' , 'lazy-sunday' ) . ' %s', '<span>' . single_tag_title( '', false ) . '</span>' ); ?>
			<?php else : ?>
				<?php _e( 'Blog Archives', 'lazy-sunday' ); ?>
			<?php endif; ?>
		</h2>
	</div>
	<?php $x = 0; ?>
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
			<?php if ( is_int( $x / 3 ) ) { ?>
				<div class="clear">
			<?php } ?>
				<div <?php post_class( 'secondary-posts' ) ?> id="post-<?php the_ID(); ?>">
					<div class="entry">
						<?php $thumburl = '';
							if( has_post_thumbnail( $post->ID ) ) { 
								$thumburl = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) );
								$thumburl = $thumburl[0];
							} 
							else {
								$args = array( 
									'post_type' => 'attachment', 
									'numberposts' => 1, 
									'post_status' => null, 
									'post_parent' => $post->ID ); 
								$attachments = get_posts($args);
								if ($attachments) {
									foreach ( $attachments as $attachment ) {
										$thumburl = wp_get_attachment_image_src( $attachment->ID, 'medium' );
										$thumburl = $thumburl[0];
									}
								}
							} 
							
							if ( ! $thumburl ) {
								$thumburl = get_template_directory_uri() . '/images/background.jpg';
							} ?>
						<div class="post-thumbnail" style="background-image:url('<?php echo $thumburl; ?>');"> 
							<a href="<?php the_permalink() ?>" class="post-thumbnail-link" title="<?php _e( 'Permanent Link to' , 'lazy-sunday' ) ?> <?php the_title_attribute(); ?>">
								&nbsp;
							</a>
						</div>
						<small><?php the_time( get_option( 'date_format' ) ); ?></small>
						<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to' , 'lazy-sunday' ) ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
					</div>
				</div>
				<?php if ( is_int( $x / 3 ) ) { ?>
					</div>
				<?php } 
				 $x = $x + 1; ?>
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo;' . __( 'Older Entries' , 'lazy-sunday' ) ) ?></div>
			<div class="alignright"><?php previous_posts_link( __( 'Newer Entries' , 'lazy-sunday' ) . ' &raquo;') ?></div>
		</div>

	<?php else : ?>

		<div class="title-header">
			<h2 class="page_title"><?php _e( 'Not Found' , 'lazy-sunday' ) ?></h2>
		</div>
		<p class="aligncenter"><?php _e( 'Sorry, no posts matched your criteria.', 'lazy-sunday' ) ?></p>
		<?php get_search_form(); ?>

	<?php endif; ?> 

	</div>

<?php get_footer(); ?>

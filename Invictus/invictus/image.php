<?php
/**
 * @package WordPress
 * @subpackage Toolbox
 */

get_header(); ?>

<div id="single-page" class="clearfix left-sidebar">

		<div id="primary" class="image-attachment portfolio-four-columns">
			<div id="content" role="main">

			<?php the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>

						<nav id="image-navigation">
							<span class="nav-previous"><?php previous_image_link( false, __( '&larr; Previous' , 'toolbox' ) ); ?></span>
							<span class="nav-next"><?php next_image_link( false, __( 'Next &rarr;' , 'toolbox' ) ); ?></span>
						</nav><!-- #image-navigation -->
						
					</header><!-- .entry-header -->

					<div class="entry-content">

						<div class="entry-attachment">
							<div class="attachment">
								<?php
									/**
									 * Grab the IDs of all the image attachments in a gallery so we can get the URL of the next adjacent image in a gallery,
									 * or the first image (if we're looking at the last image in a gallery), or, in a gallery of one, just the link to that image file
									 */
									$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
									foreach ( $attachments as $k => $attachment ) {
										if ( $attachment->ID == $post->ID )
											break;
									}
									$k++;
									// If there is more than 1 attachment in a gallery
									if ( count( $attachments ) > 1 ) {
										if ( isset( $attachments[ $k ] ) )
											// get the URL of the next image attachment
											$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
										else
											// or get the URL of the first image attachment
											$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
									} else {
										// or, if there's only 1 image, get the URL of the image
										$next_attachment_url = wp_get_attachment_url();
									}
								?>
								<a href="<?php echo $next_attachment_url; ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"><?php
								$attachment_size = apply_filters( 'theme_attachment_size',  800 );
								echo wp_get_attachment_image( $post->ID, array( $attachment_size, 9999 ) ); // filterable image width with, essentially, no limit for image height.
								?></a>
							</div><!-- .attachment -->

							<?php if ( ! empty( $post->post_excerpt ) ) : ?>
							<div class="entry-caption">
								<?php the_excerpt(); ?>
							</div>
							<?php endif; ?>
						</div><!-- .entry-attachment -->

						<div class="entry-meta">
							<ul class="clearfix">
							<?php
								$metadata = wp_get_attachment_metadata();
								printf( __( '<li class="meta-prep meta-prep-entry-date">Published </li> <li class="entry-date"><abbr class="published" title="%1$s">%2$s</abbr></li><li> at <a href="%3$s" title="Link to full-size image" rel="prettyPhoto">%4$s &times; %5$s</a></li><li>in <a href="%6$s" title="Return to %7$s" rel="gallery">%7$s</a></li>', 'invictus' ),
									esc_attr( get_the_time() ),
									get_the_date(),
									wp_get_attachment_url(),
									$metadata['width'],
									$metadata['height'],
									get_permalink( $post->post_parent ),
									get_the_title( $post->post_parent )
								);
							?>
							</ul>
						</div><!-- .entry-meta -->


						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'toolbox' ), 'after' => '</div>' ) ); ?>

					</div><!-- .entry-content -->

				</article><!-- #post-<?php the_ID(); ?> -->

				<ul id="portfolioList" class="clearfix portfolio-list">
				<?php
				echo show_all_thumbs();
				?>
				</ul>

				<?php comments_template(); ?>

			</div><!-- #content -->
		</div><!-- #primary -->
		
		<?php get_sidebar(); ?>

</div>
<?php get_footer(); ?>
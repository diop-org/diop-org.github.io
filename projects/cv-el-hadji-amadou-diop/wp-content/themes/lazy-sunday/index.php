<?php
/**
 * @package Lazy Sunday
 */

get_header();

?>
	<div id="content" class="content">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
	
			<div <?php post_class( 'first-posts' ) ?> id="post-<?php the_ID(); ?>">
				<div class="entry">
					<div class="title-header">
						<h2 class="page_title">
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to' , 'lazy-sunday' ) ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						</h2>
						<div class="post-date">
							<small><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to' , 'lazy-sunday' ) ?> <?php the_title_attribute(); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a></small>
						</div>
					</div>
					
					<?php the_content( __( 'Read the rest of this entry' , 'lazy-sunday' ) . ' &raquo;'); ?>
					<?php wp_link_pages( array( 'before' => '<p class="clear"><strong>' . __( 'Pages:' , 'lazy-sunday' ) . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number' ) ); ?>
					
					<?php the_tags('<p class="postmetadata clear">' . __( 'Tags:' , 'lazy-sunday' ) . ' ', ', ', '</p>'); ?>

					<p class="postmetadata clear">
						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to' , 'lazy-sunday' ) ?> <?php the_title_attribute(); ?>"><?php _e( 'Permalink' , 'lazy-sunday' ) ?></a> | 
						<?php _e( 'Posted in' , 'lazy-sunday' ) ?> <?php the_category( ', ' ) ?> | 
						<?php edit_post_link( __( 'Edit', 'lazy-sunday' ), '', ' | ' ); ?>  <?php comments_popup_link( __('No Comments' , 'lazy-sunday' ) . " &#187;", __('1 Comment' , 'lazy-sunday' ) . " &#187;", __('% Comments' , 'lazy-sunday' ) . " &#187;" ); ?>

					</p>
				</div>
			</div>	
			<hr />
		<?php endwhile; ?>

		
		<?php 
		
		$x = 0;
		
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		
		$postsperpage = get_option('posts_per_page');
		
		if($postsperpage && $paged) {
			
			$offset = $paged * $postsperpage;
			
			$countposts = wp_count_posts()->publish;
			
			if ( $offset <= $countposts ) {
			?>
				<h2><?php _e( 'More Posts' , 'lazy-sunday' ) ?></h2>
				<hr />
			<?php
		
				$args = array( 'numberposts' => 6, 'offset'=> $offset ); 
				
				$myposts = get_posts( $args );
				
				foreach( $myposts as $post ) :	setup_postdata($post); ?>
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
												'post_parent' => $post->ID,
												'post_mime_type' => 'image' ); 
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
												<?php the_title(); ?>
											</a>
										</div>
									<small><?php the_time( get_option( 'date_format' ) ); ?></small>
									<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to' , 'lazy-sunday' ) ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
								</div>
							</div>
					<?php if ( is_int( $x / 3 ) ) { ?>
						</div>
					<?php } 
					 $x++; ?>
			<?php endforeach; ?>
		<?php } 
		} ?>
		
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

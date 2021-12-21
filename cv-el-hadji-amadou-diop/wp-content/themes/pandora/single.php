<?php 
	get_header(); 
	?>
	
	<?php pandora_display_main_menu(); ?>
	
	<?php pandora_featured_pages(); ?>
	
	<div class="container">
		<div class="content content-mini">

			<div id="nav-above" class="navigation">
				<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">&laquo;</span> %title' ) ?></div>
				<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">&raquo;</span>' ) ?></div>
			</div>				
				
			<div id="post-<?php the_ID() ?>" class="post-normal-list">
			
				<div class="entry-image-container">
					<?php
					if ( has_post_thumbnail() ) 
					{
						?><a href="<?php the_permalink() ?>" title="<?php printf( __('Permalink to %s', 'pandora'), the_title_attribute('echo=0') ) ?>" rel="bookmark"><?php
							echo get_the_post_thumbnail(get_the_ID(), array(64,64) );
						?></a><?php
					} 
					else 
					{
						?><a href="<?php the_permalink() ?>" title="<?php printf( __('Permalink to %s', 'pandora'), the_title_attribute('echo=0') ) ?>" rel="bookmark">
							<img src="<?php echo get_template_directory_uri() ?>/images/thumbnail.jpg" title="<?php the_title() ?> " width="64" height="64">
						</a><?php
					}
					?>
					<div id="entry-date-container">
						<?php the_time('M. d.') ?>
					</div>
				</div>
				<div class="entry-title-container">
					<h2><a href="<?php the_permalink() ?>" title="<?php printf( __('Permalink to %s', 'pandora'), the_title_attribute('echo=0') ) ?>" rel="bookmark"><?php the_title() ?></a></h2>
				</div>
				<div class="entry-author-container">
					
				</div>
				
				<div id="entry-content-container">
				<?php the_content( ); ?>
				</div>
				
				<div id="entry-content-container">
					
					
					<p class="pointed-line-top">
						<?php printf( __( 'By %s', 'pandora' ), '<a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '" title="' . sprintf( __( 'View all posts by %s', 'pandora' ), $authordata->display_name ) . '">' . get_the_author() . '</a>' ) ?>
						| <?php printf( __( 'Posted in %s', 'pandora' ), get_the_category_list(', ') ) ?> |
						<?php edit_post_link( __( 'Edit', 'pandora' )) ?>
						<!-- comments -->
						<?php if ( ('open' == $post->comment_status) && ('open' == $post->ping_status) ) : // Comments and trackbacks open ?>
						<?php printf( __( '<a class="comment-link" href="#respond" title="Post a comment">Post a comment</a> or leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'pandora' ), get_trackback_url() ) ?>
						<?php elseif ( !('open' == $post->comment_status) && ('open' == $post->ping_status) ) : // Only trackbacks open ?>
											<?php printf( __( 'Comments are closed, but you can leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'pandora' ), get_trackback_url() ) ?>
						<?php elseif ( ('open' == $post->comment_status) && !('open' == $post->ping_status) ) : // Only comments open ?>
											<?php _e( 'Trackbacks are closed, but you can <a class="comment-link" href="#respond" title="Post a comment">post a comment</a>.', 'pandora' ) ?>
						<?php elseif ( !('open' == $post->comment_status) && !('open' == $post->ping_status) ) : // Comments and trackbacks closed ?>
											<?php _e( 'Both comments and trackbacks are currently closed.', 'pandora' ) ?>
						<?php endif; ?>
					</p>
					<p id="post-tags" class="pointed-line-bottom"><?php the_tags( __( 'Tagged: ', 'pandora' ), ", ", "\n\t\t\t\t\t" )?></p>
					<?php wp_link_pages(array('before' => '<p id="post-tags"><strong> '.__("Pages:","pandora").' </strong>', 'after' => '</p>', 'next_or_number' => 'number')); ?>
					<?php comments_template() ?>
				</div>
			</div>
				
			<div id="nav-below" class="navigation">
				<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">&laquo;</span> %title' ) ?></div>
				<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">&raquo;</span>' ) ?></div>
			</div>	
				

		</div><!-- #content -->
		<?php get_sidebar('side'); ?>
	</div><!-- #container -->

<?php get_footer(); ?>
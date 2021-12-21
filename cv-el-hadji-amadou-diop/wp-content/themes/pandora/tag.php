<?php get_header(); ?>

	<?php pandora_display_main_menu(); ?>
	
	<?php pandora_featured_pages(); ?>
	
	<div class="container">
		<div class="content content-mini">

			<h2 class="page-title"><?php _e( 'Tag Archives:', 'pandora' ) ?> <span><?php single_tag_title() ?></span></h2>

			<div id="nav-above" class="navigation">
				<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&laquo;</span> Older posts', 'pandora' ) ) ?></div>
				<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&raquo;</span>', 'pandora' ) ) ?></div>
			</div>

			<?php while ( have_posts() ) : the_post() ?>
				<div id="post-<?php the_ID() ?>" <?php post_class('post-normal-list') ?>>
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
						<span class="author vcard"><?php printf( __( 'By %s', 'pandora' ), '<a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '" title="' . sprintf( __( 'View all posts by %s', 'pandora' ), $authordata->display_name ) . '">' . get_the_author() . '</a>' ) ?></span>
						| <?php printf( __( 'Posted in %s', 'pandora' ), get_the_category_list(', ') ) ?> |
						<?php edit_post_link( __( 'Edit', 'pandora' )) ?><br />
						<?php comments_popup_link( __( 'Comments (0)', 'pandora' ), __( 'Comments (1)', 'pandora' ), __( 'Comments (%)', 'pandora' ) ) ?>
					</div>
					
					<div id="entry-content-container">
						<?php the_content( ); ?>
						<p id="post-tags"><?php the_tags( __( 'Tagged: ', 'pandora' ), ", ", "\n\t\t\t\t\t" )?></p>
					</div>
				</div>
			<?php endwhile; ?>

			<div id="nav-below" class="navigation">
				<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&laquo;</span> Older posts', 'pandora' ) ) ?></div>
				<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&raquo;</span>', 'pandora' ) ) ?></div>
			</div>

		</div><!-- #content -->
		<?php get_sidebar('side'); ?>
	</div><!-- #container -->

<?php get_footer() ?>
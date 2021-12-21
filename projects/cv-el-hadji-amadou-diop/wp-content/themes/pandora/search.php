<?php get_header(); ?>

	<?php pandora_display_main_menu(); ?>
	
	<?php pandora_featured_pages(); ?>
	
	<div class="container">
		<div class="content content-mini">

<?php if ( have_posts() ) : ?>
	<h2 class="page-title"><?php _e( 'Search Results for:', 'pandora' ) ?> <span><?php the_search_query() ?></span></h2>
	
	<div id="nav-above" class="navigation">
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&laquo;</span> Older results', 'pandora' ) ) ?></div>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer results <span class="meta-nav">&raquo;</span>', 'pandora' ) ) ?></div>
	</div>
			
	<div class="post-normal-list">
		<?php while ( have_posts() ) : the_post() ?>
			<div id="post-<?php the_ID() ?>">		
				<h3 class="search-title"><a href="<?php the_permalink() ?>" title="<?php printf( __( 'Permalink to %s', 'pandora' ), the_title_attribute('echo=0') ) ?>" rel="bookmark"><?php the_title() ?></a></h3>
				<div id="entry-content-container">
					<?php unset($previousday); printf( __( '%1$s &#8211; %2$s', 'pandora' ), the_date( '', '', '', false ), get_the_time() ) ?>
				</div>
				
				<?php if ( $post->post_type == 'post' ) { ?>
					<div id="entry-content-container">
						<?php printf( __( 'By %s', 'pandora' ), '<a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '" title="' . sprintf( __( 'View all posts by %s', 'pandora' ), $authordata->display_name ) . '">' . get_the_author() . '</a>' ) ?>
						| <?php printf( __( 'Posted in %s', 'pandora' ), get_the_category_list(', ') ) ?>
						| <?php comments_popup_link( __( 'Comments (0)', 'pandora' ), __( 'Comments (1)', 'pandora' ), __( 'Comments (%)', 'pandora' ) ) ?>
						<br /><?php the_tags( __( 'Tagged ', 'pandora' )) ?>
					</div>
				<?php } ?>
				
				<div id="entry-content-container">
						<?php the_excerpt( __( 'Read More <span class="meta-nav">&raquo;</span>', 'pandora' ) ) ?>
				</div>
				
				<div id="entry-content-container">
				<div class="pointed-line-top" style="margin-bottom:20px"></div></div>
			</div><!-- .post -->
		<?php endwhile; ?>
	</div>
			
	<div id="nav-below" class="navigation">
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&laquo;</span> Older results', 'pandora' ) ) ?></div>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer results <span class="meta-nav">&raquo;</span>', 'pandora' ) ) ?></div>
	</div>

<?php else : ?>

			<div class="post-normal-list">
				<h2 class="page-title"><?php _e( 'Nothing Found', 'pandora' ) ?></h2>
				<div id="entry-content-container">
					<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'pandora' ) ?></p>
					<form id="searchform-no-results" class="blog-search" method="get" action="<?php echo home_url() ?>">
						<div>
							<input id="s-no-results" name="s" class="text" type="text" value="<?php the_search_query() ?>" size="40" />
							<input class="button" type="submit" value="<?php _e( 'Find', 'pandora' ) ?>" /><br /><br />
						</div>
					</form>
				</div>
			</div><!-- .post -->

<?php endif; ?>

		</div><!-- #content -->
		<?php get_sidebar('side'); ?>
	</div><!-- #container -->

<?php get_footer() ?>
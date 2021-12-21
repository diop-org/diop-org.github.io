<?php get_header(); ?>

	<?php pandora_display_main_menu(); ?>
	
	<?php pandora_featured_pages(); ?>
	
	<div class="container">
		<div class="content content-mini">

			<div class="post-normal-list">
				<div id="post-0" class="post error404 not-found">
					<h2 class="page-title"><?php _e( 'Not Found', 'pandora' ) ?></h2>
					<div id="entry-content-container">
						<p><?php _e( 'Apologies, but we were unable to find what you were looking for. Perhaps  searching will help.', 'pandora' ) ?></p>
						<form id="searchform-404" class="blog-search" method="get" action="<?php echo home_url() ?>">
						<div>
							<input id="s-404" name="s" class="text" type="text" value="<?php the_search_query() ?>" size="40" />
							<input class="button" type="submit" value="<?php _e( 'Find', 'pandora' ) ?>" />
						</div>
						</form><br /><br />
					</div>
				</div><!-- .post -->
			</div>

		</div><!-- #content -->
		<?php get_sidebar('side'); ?>
	</div><!-- #container -->

<?php get_footer() ?>
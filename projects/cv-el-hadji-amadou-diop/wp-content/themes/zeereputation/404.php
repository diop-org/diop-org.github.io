<?php get_header(); ?>

		<div id="content">

		<!--- Post Starts -->
		
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
				<h2><?php _e('404 Error: Not found', 'themezee_lang'); ?></h2>
				
				<div class="entry">
					<p><?php _e('The page you trying to reach does not exist, or has been moved. Please use the menus or the search box to find what you are looking for', 'themezee_lang'); ?></p>
				</div>
				
			</div>
			
			<!--- Post Ends -->
			
		</div>
		
	<div class="clear"></div>
</div>
		
	<?php get_sidebar(); ?>
<?php get_footer(); ?>
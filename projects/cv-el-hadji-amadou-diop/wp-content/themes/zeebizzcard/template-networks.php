<?php
/*
Template Name: Page with Network Buttons
*/
?>
<?php get_header(); ?>

	<div id="content">
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
			<div id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<h2 class="page-title"><?php the_title(); ?></h2>
				<?php edit_post_link(__( 'Edit', 'themezee_lang' )); ?>

				<div class="entry">
					<?php the_content(); ?>
					<?php echo themezee_display_plugin_networks(); //Show Network Profiles ?>
					<?php wp_link_pages(); ?>
				</div>

			</div>
			
		<?php endwhile; ?>

		<?php endif; ?>

	</div>

	<?php get_footer(); ?>	
<?php get_sidebar(); ?>	
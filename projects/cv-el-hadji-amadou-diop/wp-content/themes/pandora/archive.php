<?php get_header(); ?>

	<?php pandora_display_main_menu(); ?>
	
	<?php pandora_featured_pages(); ?>
	
	<div class="container">
		<div class="content content-mini">

<?php the_post() ?>

<?php if ( is_day() ) : ?>
			<h2 class="page-title"><?php printf( __( 'Daily Archives: <span>%s</span>', 'pandora' ), get_the_time(get_option('date_format')) ) ?></h2>
<?php elseif ( is_month() ) : ?>
			<h2 class="page-title"><?php printf( __( 'Monthly Archives: <span>%s</span>', 'pandora' ), get_the_time('F Y') ) ?></h2>
<?php elseif ( is_year() ) : ?>
			<h2 class="page-title"><?php printf( __( 'Yearly Archives: <span>%s</span>', 'pandora' ), get_the_time('Y') ) ?></h2>
<?php elseif ( isset($_GET['paged']) && !empty($_GET['paged']) ) : ?>
			<h2 class="page-title"><?php _e( 'Blog Archives', 'pandora' ) ?></h2>
<?php endif; ?>

<?php rewind_posts() ?>

			<div id="nav-above" class="navigation">
				<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&laquo;</span> Older posts', 'pandora' ) ) ?></div>
				<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&raquo;</span>', 'pandora' ) ) ?></div>
			</div>

			<?php while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID() ?>" <?php post_class('post-gallery-list') ?>>
					<div style="float:left"><?php
					if ( has_post_thumbnail() ) 
					{
						?><a href="<?php the_permalink() ?>" title="<?php printf( __('Permalink to %s', 'pandora'), the_title_attribute('echo=0') ) ?>" rel="bookmark"><?php
							echo get_the_post_thumbnail(get_the_ID(), array(50,50) );
						?></a><?php
					} 
					else 
					{
						?><a href="<?php the_permalink() ?>" title="<?php printf( __('Permalink to %s', 'pandora'), the_title_attribute('echo=0') ) ?>" rel="bookmark">
							<img src="<?php echo get_template_directory_uri() ?>/images/thumbnail.jpg" title="<?php the_title() ?> " width="50" height="50">
						</a><?php
					}
					?>
					</div>
					<div id="title" style="padding:0 10px 0 5px;float:left">
					<a href="<?php the_permalink() ?>" title="<?php printf( __('Permalink to %s', 'pandora'), the_title_attribute('echo=0') ) ?>" rel="bookmark"><?php echo substr(get_the_title(),0,19) ?>...<br /><?php the_time('F jS, Y') ?></a>					
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
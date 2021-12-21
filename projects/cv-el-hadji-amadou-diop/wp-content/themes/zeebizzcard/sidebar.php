
	<div id="headwrap">
		<div id="header">

			<div id="logo">
					<?php 
					$options = get_option('themezee_options');
					if ( isset($options['themeZee_general_logo']) and $options['themeZee_general_logo'] <> "" ) { ?>
						<a href="<?php echo home_url(); ?>"><img src="<?php echo esc_url($options['themeZee_general_logo']); ?>" alt="Logo" /></a>
					<?php } else { ?>
						<a href="<?php echo home_url(); ?>/"><h1><?php bloginfo('name'); ?></h1></a>
						<h2><?php echo bloginfo('description'); ?></h2>
					<?php } ?>
			</div>
			
			<div id="portrait_image">
				<?php if(is_page() && has_post_thumbnail()) :
					the_post_thumbnail(array(280,300));
				elseif( get_header_image() != '' ) : ?>
					<img src="<?php echo get_header_image(); ?>" />
				<?php endif; ?>
			</div>
		</div>
	</div>
	
	<?php
	if(is_page()) :
		if(is_active_sidebar('sidebar-pages')) : ?>
	
		<div id="sidewrap">
			<div id="sidebar">
				<ul>
				<?php dynamic_sidebar('sidebar-pages'); endif; ?>
				</ul>
			</div>
		</div>
	<?php
	else:
		if(is_active_sidebar('sidebar-blog')) : ?>
	
		<div id="sidewrap">
			<div id="sidebar">
				<ul>
				<?php dynamic_sidebar('sidebar-blog'); endif; ?>
				</ul>
			</div>
		</div>
	<?php endif; ?>
	
	<div class="clear"></div>
</div>
	<?php wp_footer(); ?>
</body>
</html>

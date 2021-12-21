<?php
	
	// Function to display the slideshow
	function themezee_display_plugin_slider() {
	
		// Select Slider Modus
		wp_reset_query();
		
		$options = get_option('themezee_options');
		$slider_limit = intval($options['themeZee_slider_limit'] - 1);
		
		switch($options['themeZee_slider_content']) {
			case 0: query_posts('offset=0&posts_per_page=' . $slider_limit); break;
			case 1: query_posts('category_name=featured&offset=0&posts_per_page=' . $slider_limit); break;
			case 2: query_posts('meta_key=featured&meta_value=yes&offset=0&posts_per_page=' . $slider_limit); break;
			case 3: query_posts('cat=' . esc_attr($options['themeZee_slider_cat']) . '&offset=0&posts_per_page=' . $slider_limit); break;
			default: query_posts('offset=0&posts_per_page=' . $slider_limit); break;
		}
	?>

		<!-- HTML Output of Slideshow !-->
		<div id="slide_panel">
			<h2 id="slide_head"><?php echo esc_attr($options['themeZee_slider_title']); ?></h2>
			<div id="slide_keys">
				<a id="slide_prev" href="#prev">&lt;&lt;</a>
				<a id="slide_next" href="#next">&gt;&gt;</a>
			</div>
		</div>
		<div class="clear"></div>
		
		
		<div id="content-slider">
			
			<div id="slideshow">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
				
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						
					<div class="postmeta">
						<span class="meta-date"><a href="<?php the_permalink() ?>"><?php the_time(get_option('date_format')); ?></a></span>
						<span class="meta-category"><?php the_category(', '); ?></span>
						<span class="meta-comments"><a href="<?php the_permalink() ?>#comments"><?php comments_number(__('No comments', 'themezee_lang'),__('One comment','themezee_lang'),__('% comments','themezee_lang')); ?></a></span>
					</div>
					
					<div class="entry">
						<?php the_post_thumbnail('thumbnail', array('class' => 'alignleft')); ?>
						<?php the_content('<span class="moretext">' . __('Read more', 'themezee_lang') . '</span>'); ?>
						<?php wp_link_pages(); ?>
					</div>
					<div class="clear"></div>
					
				</div>
			
			<?php endwhile; ?>
			<?php endif; ?>
			
			</div>
			
		</div>
		<div class="clear"></div>
		<div id="slider_foot"></div>
	
	<!-- Slideshow End !-->
	
	<?php
		//Reset Query
		wp_reset_query();
	}
?>
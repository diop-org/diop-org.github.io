<?php if (dynamic_sidebar('Sidebar Widgets')) : else : ?>
    
        <!-- All this stuff in here only shows up if you DON'T have any widgets active in this zone -->
    
		<div class="widget-container">    
		<h2 class="widget-title"><?php printf( __('Pages', 'business' )); ?></h2>
		<ul>
    	<?php wp_list_pages('title_li=' ); ?>
    	</ul>
    	</div>
    
		<div class="widget-container">    
    	<h2 class="widget-title"><?php printf( __( 'Archives', 'business' )); ?></h2>
    	<ul>
    		<?php wp_get_archives('type=monthly'); ?>
    	</ul>
    	</div>
        
		<div class="widget-container">    
       <h2 class="widget-title"><?php printf( __('Categories', 'business' )); ?></h2>
        <ul>
    	   <?php wp_list_categories('show_count=1&title_li='); ?>
        </ul>
        </div>
        
		<div class="widget-container">    
    	<h2 class="widget-title"><?php printf( __('WordPress', 'business' )); ?></h2>
    	<ul>
    		<?php wp_register(); ?>
    		<li><?php wp_loginout(); ?></li>
    		<li><a href="<?php echo esc_url( __('http://wordpress.org/', 'business' )); ?>" target="_blank" title="<?php esc_attr_e('Powered by WordPress, state-of-the-art semantic personal publishing platform.', 'business'); ?>"> <?php printf( __('WordPress', 'business' )); ?></a></li>
    		<?php wp_meta(); ?>
    	</ul>
    	</div>
    	
    	<div class="widget-container">
    	<h2 class="widget-title"><?php printf( __('Subscribe', 'business' )); ?></h2>
    	<ul>
    		<li><a href="<?php bloginfo('rss2_url'); ?>"><?php printf( __('Entries (RSS)', 'business' )); ?></a></li>
    		<li><a href="<?php bloginfo('comments_rss2_url'); ?>"><?php printf( __('Comments (RSS)', 'business' )); ?></a></li>
    	</ul>
    	</div>
	
<?php endif; ?>
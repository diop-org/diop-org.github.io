<?php

// WELCOME WIDGET

if (class_exists('WP_Widget')) {
	class PageLines_Welcome extends WP_Widget {
	
	   function PageLines_Welcome() {
		   $widget_ops = array('description' => 'This widget places a welcome message with latest tweet in your sidebar; values for this are set in theme options.' );
		   parent::WP_Widget(false, $name = __('PageLines - Welcome', TDOMAIN), $widget_ops);    
	   }
	
	   function widget($args, $instance) {        
		   extract( $args );
		
			// THE TEMPLATE
		  	get_template_part('library/widget_welcome');
	   }
	
	   function update($new_instance, $old_instance) {                
		   return $new_instance;
	   }
	
	   function form($instance) { ?>    	   
		<p>	<?php _e('The options for this widget are set in theme options.',TDOMAIN);?></p>
		<p>	<?php _e('By default this widget only shows on your posts and single post pages. It can be set to show on all pages where the widget should be shown.',TDOMAIN);?></p>
	<?php 
	   }
	
	} 
	register_widget('PageLines_Welcome');
}


?>
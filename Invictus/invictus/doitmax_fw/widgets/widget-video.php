<?php

/*-----------------------------------------------------------------------------------*/
/*	 Widget for Video Display
/*-----------------------------------------------------------------------------------*/

class WP_Widget_Video_Cast extends WP_Widget {

	function WP_Widget_Video_Cast() {
	
		$widget_ops = array('classname' => 'max_widget_video','description' => __('Custom Widget that displays a YouTube or Vimeo Video.', 'invictus') );
		
		$settings_ops = array( 'width' => 193, 'height' => 120, 'id_base' => 'max_widget_video' );		
		
		$this->WP_Widget( 'max_widget_video', __('Custom Video Widget', 'invictus'), $widget_ops );
		$this->alt_option_name = 'widget_flickr_stream';
		
        add_action( 'save_post', array(&$this, 'flush_widget_cache') );
        add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
        add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
		
	}

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
	function widget( $args, $instance ) {
		
		$cache = wp_cache_get('widget_custom_video', 'widget');
	
		if ( !is_array($cache) )
			$cache = array();
	
		if ( isset($cache[$args['widget_id']]) ) {
			echo $cache[$args['widget_id']];
				return;
		}
	
		ob_start();
		extract($args);	
	
		$title = apply_filters('widget_title', $instance['title'] );
		$embed = $instance['embed'];
		$desc = $instance['desc'];
	
		echo $before_widget;
	
		if ( $title )
			echo $before_title . $title . $after_title;
	
		?>
			
		<div class="max_video">
		<?php echo $embed ?>
		</div>
			
		<p class="max_video_desc"><?php echo $desc ?></p>
		
		<?php
	
		echo $after_widget;
		
		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_custom_video', $cache, 'widget');				
		
	}


/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
	
		$instance['title'] = strip_tags( $new_instance['title'] );		
		$instance['desc'] = stripslashes( $new_instance['desc']);
		$instance['embed'] = stripslashes( $new_instance['embed']);
		$this->flush_widget_cache();
	
	    $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_custom_video']) )
            delete_option('widget_custom_video');
	
		return $instance;
	}

    function flush_widget_cache() {
        wp_cache_delete('widget_custom_video', 'widget');
    }	


/*-----------------------------------------------------------------------------------*/
/*	Widget Settings
/*-----------------------------------------------------------------------------------*/
	 
	function form( $instance ) {
	
		$settings = array(
			'title' => 'Custom Video',
			'embed' => stripslashes( '<iframe src="http://player.vimeo.com/video/19567761?title=0&amp;byline=0&amp;portrait=0" width="193" height="120"></iframe>'	),
			'desc' => 'This is a Video embeded by a Widget.',
		);		
		
		$instance = wp_parse_args( (array) $instance, $settings ); ?>
		
		<ul>
			<li>
				<p>
					<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'invictus') ?></label>
					<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
				</p>
			</li>
			<li>	
				<p>
					<label for="<?php echo $this->get_field_id( 'embed' ); ?>"><?php _e('Embed Code:', 'invictus') ?></label>
					<textarea style="height:200px;" class="widefat" id="<?php echo $this->get_field_id( 'embed' ); ?>" name="<?php echo $this->get_field_name( 'embed' ); ?>"><?php echo stripslashes(htmlspecialchars(( $instance['embed'] ), ENT_QUOTES)); ?></textarea>
				</p>
			</li>
			<li>	
				<p>
					<label for="<?php echo $this->get_field_id( 'desc' ); ?>"><?php _e('Short Description:', 'invictus') ?></label>
					<input class="widefat" id="<?php echo $this->get_field_id( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'desc' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['desc'] ), ENT_QUOTES)); ?>" />
				</p>
			</li>
		</ul>
			
		<?php
		}
	}

/*-----------------------------------------------------------------------------------*/
/*	Register Widget
/*-----------------------------------------------------------------------------------*/

// Add function to widgets_init that'll load our widget
add_action( 'widgets_init', 'max_widget_video' );

// Register widget
function max_widget_video() {
	register_widget( 'WP_Widget_Video_Cast' );
}

?>
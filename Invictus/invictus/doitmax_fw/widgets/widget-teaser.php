<?php

/*-----------------------------------------------------------------------------------*/
/*	 Widget for Welcome Teaser display Display
/*-----------------------------------------------------------------------------------*/

class WP_Widget_Welcome_Teaser extends WP_Widget {

	function WP_Widget_Welcome_Teaser() {
	
		$widget_ops = array('classname' => 'max_widget_teaser','description' => __('Custom Widget that displays the Welcome Teaser as Widget.', 'invictus') );
		
		$settings_ops = array( 'width' => 193, 'height' => 120, 'id_base' => 'max_widget_teaser' );		
		
		$this->WP_Widget( 'max_widget_teaser', __('Custom Welcome Teaser Widget', 'invictus'), $widget_ops );
		$this->alt_option_name = 'widget_welcome_teaser';
		
        add_action( 'save_post', array(&$this, 'flush_widget_cache') );
        add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
        add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
		
	}

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
	function widget( $args, $instance ) {
		
		$cache = wp_cache_get('widget_custom_teaser', 'widget');
	
		if ( !is_array($cache) )
			$cache = array();
	
		if ( isset($cache[$args['widget_id']]) ) {
			echo $cache[$args['widget_id']];
				return;
		}
	
		ob_start();
		extract($args);	
	
		$title = apply_filters('widget_title', $instance['title'] );
		$teaser_text = $instance['text'];
		$desc = $instance['desc'];
	
		echo $before_widget;
	
		?>
			
		<div class="teaser">
		<?php echo $teaser_text ?>
		</div>
		
		<?php
	
		echo $after_widget;
		
		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_custom_teaser', $cache, 'widget');				
		
	}


/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
	
		$instance['title'] = strip_tags( $new_instance['title'] );		
		$instance['text'] = stripslashes( $new_instance['text']);
		$instance['desc'] = stripslashes( $new_instance['desc']);
		$this->flush_widget_cache();
	
	    $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_custom_teaser']) )
            delete_option('widget_custom_teaser');
	
		return $instance;
	}

    function flush_widget_cache() {
        wp_cache_delete('widget_custom_teaser', 'widget');
    }	


/*-----------------------------------------------------------------------------------*/
/*	Widget Settings
/*-----------------------------------------------------------------------------------*/
	 
	function form( $instance ) {
	
		$settings = array(
			'title' => 'Custom Teaser',
			'text' => stripslashes( 'This is your Welcome Teaser text. Use the <strong>strong</strong> HTML tag to show <strong>Big</strong> Text'	),
			'desc' => 'This is a Custom Teaser Widget.',
		);		
		
		$instance = wp_parse_args( (array) $instance, $settings ); ?>
		
		<ul>
			<li>	
				<p>
					<label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e('Teaser Text:', 'invictus') ?></label>
					<textarea style="height:200px;" class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>"><?php echo stripslashes(htmlspecialchars(( $instance['text'] ), ENT_QUOTES)); ?></textarea>
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
add_action( 'widgets_init', 'max_widget_teaser' );

// Register widget
function max_widget_teaser() {
	register_widget( 'WP_Widget_Welcome_Teaser' );
}

?>
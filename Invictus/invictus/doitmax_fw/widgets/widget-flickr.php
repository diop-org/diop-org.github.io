<?php

/*-----------------------------------------------------------------------------------*/
/*	 Widget for Flickr Photostream Display
/*-----------------------------------------------------------------------------------*/

class WP_Widget_Flickr_Stream extends WP_Widget {

	function WP_Widget_Flickr_Stream() {
	
		$widget_ops = array('classname' => 'widget_flickr_stream','description' => __('Custom Widget that displays your Flickr Stream.', 'invictus') );
		$this->WP_Widget( 'custom_flickr_stream', __('Flickr Stream','invictus'), $widget_ops );
		$this->alt_option_name = 'widget_flickr_stream';
		
        add_action( 'save_post', array(&$this, 'flush_widget_cache') );
        add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
        add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
		
	}
	
/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
	function widget( $args, $instance ) {
		
		global $shortname;
	
        $cache = wp_cache_get('widget_custom_flickr_stream', 'widget');

        if ( !is_array($cache) )
            $cache = array();

        if ( isset($cache[$args['widget_id']]) ) {
            echo $cache[$args['widget_id']];
            return;
        }

        ob_start();
        extract($args);
	
		$title 	 = apply_filters('widget_title', $instance['title'] );
		$fID 	 = $instance['fID'];
		$count 	 = $instance['count'];
		$type 	 = $instance['type'];
		$display = $instance['display'];
	
		echo $before_widget;
	
		if(!is_numeric($count))
		{
			$count = 9;
		}
		
		if(empty($title))
		{
			$title = 'Flickr Stream';
		}	
		
		if ( $title )
			echo $before_title . $title . $after_title;
	
		 ?>
		
		<div id="flickr_wrapper" class="clearfix">		
			<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $count ?>&amp;display=<?php echo $display ?>&amp;size=s&amp;layout=x&amp;source=<?php echo $type ?>&amp;<?php echo $type ?>=<?php echo $fID ?>"></script>	
		</div>
		
		<?php
	
		echo $after_widget;
		
		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_custom_flickr_stream', $cache, 'widget');			
		
	}

/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	
	function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
	
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['fID'] = strip_tags( $new_instance['fID'] );
		$instance['count'] = $new_instance['count'];
		$instance['type'] = $new_instance['type'];
		$instance['display'] = $new_instance['display'];
		$this->flush_widget_cache();	
		 
        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_custom_flickr_stream']) )
            delete_option('widget_custom_flickr_stream');

        return $instance;	
	}
	
    function flush_widget_cache() {
        wp_cache_delete('widget_custom_flickr_stream', 'widget');
    }	


/*-----------------------------------------------------------------------------------*/
/*	Widget Settings
/*-----------------------------------------------------------------------------------*/
	 
	function form( $instance ) {

		$settings = array(
			'title' => 'Flickr Stream',
			'fID' => '63031814@N00',
			'count' => '9',
			'type' => 'user',
			'display' => 'latest',
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
					<label for="<?php echo $this->get_field_id( 'fID' ); ?>"><?php _e('Flickr ID:', 'invictus') ?> (<a href="http://idgettr.com/">idGettr</a>)</label>
					<input class="widefat" id="<?php echo $this->get_field_id( 'fID' ); ?>" name="<?php echo $this->get_field_name( 'fID' ); ?>" value="<?php echo $instance['fID']; ?>" />
				</p>
			</li>
			<li>
				<p>
					<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e('Number of Photos:', 'invictus') ?></label>
					<select id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" class="widefat">
						<option <?php if ( '3' == $instance['count'] ) echo 'selected="selected"'; ?>>3</option>
						<option <?php if ( '6' == $instance['count'] ) echo 'selected="selected"'; ?>>6</option>
						<option <?php if ( '9' == $instance['count'] ) echo 'selected="selected"'; ?>>9</option>
					</select>
				</p>
			</li>
			<li>
				<p>
					<label for="<?php echo $this->get_field_id( 'type' ); ?>"><?php _e('Type (user or group):', 'invictus') ?></label>
					<select id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" class="widefat">
						<option <?php if ( 'user' == $instance['type'] ) echo 'selected="selected"'; ?>>user</option>
						<option <?php if ( 'group' == $instance['type'] ) echo 'selected="selected"'; ?>>group</option>
					</select>
				</p>
			</li>
			<li>
				<p>
					<label for="<?php echo $this->get_field_id( 'display' ); ?>"><?php _e('Display (random or latest):', 'invictus') ?></label>
					<select id="<?php echo $this->get_field_id( 'display' ); ?>" name="<?php echo $this->get_field_name( 'display' ); ?>" class="widefat">
						<option <?php if ( 'random' == $instance['display'] ) echo 'selected="selected"'; ?>>random</option>
						<option <?php if ( 'latest' == $instance['display'] ) echo 'selected="selected"'; ?>>latest</option>
					</select>
				</p>
			</li>
		</ul>
			
		<?php
	}
}

/*-----------------------------------------------------------------------------------*/
/*	Register Widget
/*-----------------------------------------------------------------------------------*/

add_action( 'widgets_init', 'max_flickr_stream_widget' );

function max_flickr_stream_widget() {
	register_widget( 'WP_Widget_Flickr_Stream' );
}

?>
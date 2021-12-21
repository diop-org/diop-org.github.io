<?php 

add_action('widgets_init','fb_likebox_widget');

function fb_likebox_widget() {
	register_widget('fb_likebox_widget');
	
	}

class fb_likebox_widget extends WP_Widget {
	function fb_likebox_widget() {
			
		$widget_ops = array('classname' => 'Like-box','description' => __('Facebook Like Box','theme'));

		$this->WP_Widget('Like-box',__('Momizat - Facebook Likebox','theme'),$widget_ops);

		}
		
	function widget( $args, $instance ) {
		extract( $args );
		/* User-selected settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$width = $instance['width'];
		$height = $instance['height'];
		$background = $instance['background'];
		$borderc = $instance['borderc'];
		$page = $instance['page'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Title of widget (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;
?>
                <div class="like_box_footer" <?php
		if($background != '') {
			echo "style='background:#$background;'";
		}
		?>>
<iframe src="//www.facebook.com/plugins/likebox.php?href=<?php echo $page ; ?>&amp;width=<?php echo $width ; ?>&amp;colorscheme=light&amp;show_faces=true&amp;border_color=%23<?php echo $borderc ; ?>&amp;stream=false&amp;header=false&amp;height=<?php echo $height ; ?>" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:<?php echo $width; ?>px; height:<?php echo $height; ?>px;" allowTransparency="true"></iframe>
                </div><!--like_box_footer-->
			
<?php 
		/* After widget (defined by themes). */
		echo $after_widget;
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['width'] = $new_instance['width'];
		$instance['height'] = $new_instance['height'];
		$instance['background'] = $new_instance['background'];
		$instance['borderc'] = $new_instance['borderc'];
		$instance['page'] = $new_instance['page'];

		return $instance;
	}
	
function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
			'title' => __('Facebook','theme'),
			'page' => 'http://www.facebook.com/momizat',
			'width' => 300,
			'height' => 258,
			'borderc' => 'acb7d1',
			
 			);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
	
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'theme') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
	</p>

    	<p>
		<label for="<?php echo $this->get_field_id( 'width' ); ?>"><?php _e('Width:', 'theme') ?></label>
		<input id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" value="<?php echo $instance['width']; ?>"  class="widefat" />
		</p>

    	<p>
		<label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php _e('Height:', 'theme') ?></label>
		<input id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" value="<?php echo $instance['height']; ?>"  class="widefat" />
		</p>

    	<p>
		<label for="<?php echo $this->get_field_id( 'background' ); ?>"><?php _e('Background Color: (color code without #)', 'theme') ?></label>
		<input id="<?php echo $this->get_field_id( 'background' ); ?>" name="<?php echo $this->get_field_name( 'background' ); ?>" value="<?php echo $instance['background']; ?>"  class="widefat" />
		</p>
    	<p>
		<label for="<?php echo $this->get_field_id( 'borderc' ); ?>"><?php _e('Box border Color: (color code without #)', 'theme') ?></label>
		<input id="<?php echo $this->get_field_id( 'borderc' ); ?>" name="<?php echo $this->get_field_name( 'borderc' ); ?>" value="<?php echo $instance['borderc']; ?>"  class="widefat" />
		</p>

    	<p>
		<label for="<?php echo $this->get_field_id( 'page' ); ?>"><?php _e('Facebook Page URL:', 'theme') ?></label>
		<input id="<?php echo $this->get_field_id( 'page' ); ?>" name="<?php echo $this->get_field_name( 'page' ); ?>" value="<?php echo $instance['page']; ?>"  class="widefat" />
		</p>
        
   <?php 
}
	} //end class
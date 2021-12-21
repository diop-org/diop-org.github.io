<?php

/*-----------------------------------------------------------------------------------*/
/*	 Widget for Recent Gallery Items
/*-----------------------------------------------------------------------------------*/

class WP_Widget_Recent_Photos extends WP_Widget {

    function WP_Widget_Recent_Photos() {
		
        $widget_ops = array('classname' => 'widget_custom_recent_entries', 'description' => __( "The most recent Photos on your site", MAX_SHORTNAME) );
        $this->WP_Widget('max-custom-recent-posts', __('Recent Photo Posts', MAX_SHORTNAME), $widget_ops);
        $this->alt_option_name = 'widget_custom_recent_entries';

        add_action( 'save_post', array(&$this, 'flush_widget_cache') );
        add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
        add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
    }

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/

    function widget($args, $instance) {
		
		global $shortname, $imgDimensions;
		
		$imgDimensions = array( 'width' => 50, 'height' => 50 );
		
        $cache = wp_cache_get('widget_my_custom_recent_posts', 'widget');

        if ( !is_array($cache) )
            $cache = array();

        if ( isset($cache[$args['widget_id']]) ) {
            echo $cache[$args['widget_id']];
            return;
        }

        ob_start();
        extract($args);

        $title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Photostream', MAX_SHORTNAME) : $instance['title'], $instance, $this->id_base);
        if ( !$number = (int) $instance['number'] )
            $number = 10;
        else if ( $number < 1 )
            $number = 1;

		// get the posts from gallery category you want to exclude 
		$excluded_post_ids = get_objects_in_term( array(), GALLERY_TAXONOMY);
		
        $r = new WP_Query(array('showposts' => $number, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => true, 'post_type' => array('gallery'), 'post__not_in' => $excluded_post_ids ));
        if ($r->have_posts()) :
		
		?>
        <?php echo $before_widget; ?>
        <?php if ( $title ) echo $before_title . $title . $after_title; ?>
        <ul class="clearfix">
        <?php  while ($r->have_posts()) : $r->the_post(); ?>
			
		<li>
		
			<?php			
			$imgUrl = max_get_image_path($r->ID, "thumbnail");			
			// get the gallery item 
			echo '<a href="' . get_permalink($r->ID) . '" title="' . $r->post_title . '"><img src="' . get_template_directory_uri() . '/timthumb.php?src=' . $imgUrl . '&amp;w='. $imgDimensions['width'] . '&amp;h='.  $imgDimensions['height'] . '&amp;q=100" width="' . $imgDimensions['width'] . '" height="'. $imgDimensions['height'] . '" alt="' . $r->post_title . '" class="fade-image"/></a>';
			?>
			
		</li>

        <?php endwhile; ?>
        </ul>
		
        <?php echo $after_widget; ?>
		
		<?php
        // Reset the global $the_post as this query will have stomped on it
        wp_reset_postdata();

        endif;

        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('widget_my_custom_recent_posts', $cache, 'widget');
    }


/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int) $new_instance['number'];
        $this->flush_widget_cache();

        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_custom_recent_entries']) )
            delete_option('widget_custom_recent_entries');

        return $instance;
    }

    function flush_widget_cache() {
        wp_cache_delete('widget_my_custom_recent_posts', 'widget');
    }

/*-----------------------------------------------------------------------------------*/
/*	Widget Settings
/*-----------------------------------------------------------------------------------*/
    function form( $instance ) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        if ( !isset($instance['number']) || !$number = (int) $instance['number'] )
            $number = 5;
		?>
				<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','invictus'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
		
				<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:','invictus'); ?></label>
				<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
		<?php
    }
}

/*-----------------------------------------------------------------------------------*/
/*	Register Widget
/*-----------------------------------------------------------------------------------*/

register_widget('WP_Widget_Recent_Photos'); 

?>
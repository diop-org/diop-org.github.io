<?php

/**
 * ScTweetWidget Class
 */
class Sc_TweetWidget extends WP_Widget {
    /** constructor */
    function Sc_TweetWidget() {
        parent::WP_Widget(false, $name = 'Recent Tweets');
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {
		  extract( $args );
		  $title = apply_filters('widget_title', $instance['title']);
		  $username = apply_filters('widget_title', $instance['username']);
?>
<?php echo $before_widget; ?>
<?php if ( $title ) echo $before_title . $title . $after_title; ?>	  
<script>
twitter_username = '<?php echo $username; ?>';
</script>
<div id="sc-tweets" class="tweets">
</div>
<?php echo $after_widget; ?>
<?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {
		  $instance = $old_instance;
		  $instance['title'] = strip_tags($new_instance['title']);
		  $instance['username'] = strip_tags($new_instance['username']);
	    return $instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {
      foreach($instance as $key => $value) {
        $$key = esc_attr($value);
      }
?>
<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo 'Title:'; ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php if ( isset( $title ) ) echo $title; ?>" /></label></p>
<p><label for="<?php echo $this->get_field_id('username'); ?>"><?php echo 'Twitter Username:'; ?> <input class="widefat" id="<?php echo $this->get_field_id('username'); ?>" name="<?php echo $this->get_field_name('username'); ?>" type="text" value="<?php if ( isset( $username ) ) echo $username; ?>" /></label></p>
<?php
    }

} // class TweetWidget

/**
 * ScFollow Class
 */
class Sc_Follow extends WP_Widget {
    /** constructor */
    function Sc_Follow() {
        parent::WP_Widget(false, $name = 'Social Links');
    }

	/** @see WP_Widget::widget */
    function widget($args, $instance) {
  		extract( $args );
  		$title = apply_filters('widget_title', $instance['title']);
  		$en_facebook = $instance['en_facebook'];
  		$en_twitter = $instance['en_twitter'];
  		$en_feed = $instance['en_feed'];
  		$facebook = $instance['facebook'];
  		$twitter = $instance['twitter'];
  		if (!empty($instance['feed'])) {
  			$feed = $instance['feed'];
  		} else {
  			$feed = get_bloginfo('rss2_url');
  		}

?>
<?php echo $before_widget; ?>
<div class="follow">
<?php if ( $title ) echo $before_title . $title . $after_title; ?>
<ul>
<?php if ($en_facebook): ?><li><a href="http://www.facebook.com/<?php echo $facebook; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-facebook.gif"></a></li><?php endif; ?>
<?php if ($en_twitter): ?><li><a href="http://twitter.com/<?php echo $twitter; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-twitter.gif"></a></li><?php endif; ?>
<?php if ($en_feed): ?><li><a href="<?php echo $feed; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-rss.gif"></a></li><?php endif; ?>
</ul>
<div class="clear"></div>
</div>
<?php echo $after_widget; ?>
<?php
	}

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['en_facebook'] = strip_tags($new_instance['en_facebook']);
		$instance['en_twitter'] = strip_tags($new_instance['en_twitter']);
		$instance['en_feed'] = strip_tags($new_instance['en_feed']);
		$instance['facebook'] = strip_tags($new_instance['facebook']);
		$instance['twitter'] = strip_tags($new_instance['twitter']);
		$instance['feed'] = strip_tags($new_instance['feed']);
	    return $instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {
        foreach($instance as $key => $value) {
          $$key = esc_attr($value);
        }
?>
<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo 'Title:'; ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php if ( isset( $title ) ) echo $title; ?>" /></label></p>
<p>
	<input type="checkbox" id="<?php echo $this->get_field_id('en_facebook'); ?>" name="<?php echo $this->get_field_name('en_facebook'); ?>" title="Enable Facebook icon"<?php if ( isset( $en_facebook ) && $en_facebook ): ?> checked<?php endif;?>>
	<label for="<?php echo $this->get_field_id('facebook'); ?>"><?php echo 'Facebook page:'; ?>
	<input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php if ( isset( $facebook ) ) echo $facebook; ?>" /></label>
</p>
<p>
	<input type="checkbox" id="<?php echo $this->get_field_id('en_twitter'); ?>" name="<?php echo $this->get_field_name('en_twitter'); ?>" title="Enable Twitter icon"<?php if ( isset( $en_twitter ) && $en_twitter ): ?> checked<?php endif;?>>
	<label for="<?php echo $this->get_field_id('twitter'); ?>"><?php echo 'Twitter username:'; ?>
	<input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php if ( isset( $twitter ) ) echo $twitter; ?>" /></label>
</p>
<p>
	<input type="checkbox" id="<?php echo $this->get_field_id('en_feed'); ?>" name="<?php echo $this->get_field_name('en_feed'); ?>" title="Enable Feed icon"<?php if ( isset( $en_feed ) && $en_feed ): ?> checked<?php endif;?>>
	<label for="<?php echo $this->get_field_id('feed'); ?>"><?php echo 'Feed (leave empty for WP-generated RSS):'; ?>
	<input class="widefat" id="<?php echo $this->get_field_id('feed'); ?>" name="<?php echo $this->get_field_name('feed'); ?>" type="text" value="<?php if ( isset( $feed ) ) echo $feed; ?>" /></label>
</p>
<?php
    }

} //class ShowcaseFollow

// register Showcase widgets and sidebars
add_action('widgets_init', 'sc_register_sidebars');
add_action('widgets_init', create_function('', 'return register_widget("Sc_TweetWidget");'));
add_action('widgets_init', create_function('', 'return register_widget("Sc_Follow");'));

function sc_register_sidebars() {
	register_sidebar(array(
	  'name' => 'Sidebar',
	  'description' => __('Widgets in this area will be shown on the right-hand side.'),
	  'before_widget' => '<section><div>',
	  'after_widget' => '</div></section>',
	  'before_title' => '<h2>',
	  'after_title' => '</h2>'
	));
	register_sidebar(array(
	  'name' => 'Footer',
	  'description' => __('Widgets in this area will be shown in the footer.'),
	  'before_widget' => '	<div class="widget column grid_4"><div class="inner">',
	  'after_widget' => '</div></div>',
	  'before_title' => '<h2>',
	  'after_title' => '</h2>'
	));
}
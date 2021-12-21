<?php

/*-----------------------------------------------------------------------------------*/
/*	 Widget for Twitter Display
/*-----------------------------------------------------------------------------------*/

class WP_Widget_Recent_Tweets extends WP_Widget {

	function WP_Widget_Recent_Tweets() {
	
		$widget_ops = array('classname' => 'widget_recent_tweets','description' => __('Custom Widget that displays recent tweets.', 'invictus') );
		$this->WP_Widget( 'custom_recent_tweets', __('Custom Recent Tweets','invictus'), $widget_ops );
		$this->alt_option_name = 'widget_recent_tweets';
		
        add_action( 'save_post', array(&$this, 'flush_widget_cache') );
        add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
        add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
		
	}	

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
	function widget( $args, $instance ) {
	
		global $shortname;
	
        $cache = wp_cache_get('widget_custom_recent_tweets', 'widget');

        if ( !is_array($cache) )
            $cache = array();

        if ( isset($cache[$args['widget_id']]) ) {
            echo $cache[$args['widget_id']];
            return;
        }

        ob_start();
        extract($args);
	
		$title 	   = apply_filters('widget_title', $instance['title'] );
		$user	   = $instance['user'];
		$tweets    = $instance['tweets'];

		echo $before_widget;
	
		if ( $title )
			echo $before_title . $title . $after_title;
	
		 ?>
			
			<div id="recent-tweets" class="clearfix">
			
				<ul id="twitter_update_list">
					<li class="clearfix">&nbsp;</li>
				</ul>
				
			</div>
			
			<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
			<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/<?php echo $user ?>.json?callback=twitterCallback2&amp;count=<?php echo $tweets ?>"></script>
						
		<?php 

		echo $after_widget;
		
        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('widget_custom_recent_tweets', $cache, 'widget');		
		
	}

/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	
	function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
		
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['user'] = strip_tags( $new_instance['user'] );
		$instance['tweets'] = strip_tags( $new_instance['tweets'] );
		$this->flush_widget_cache();	
		 
        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_custom_recent_tweets']) )
            delete_option('widget_custom_recent_tweets');

        return $instance;	
	}
	
    function flush_widget_cache() {
        wp_cache_delete('widget_custom_recent_tweets', 'widget');
    }	


/*-----------------------------------------------------------------------------------*/
/*	Widget Settings
/*-----------------------------------------------------------------------------------*/
	 
	function form( $instance ) {
	
		$settings = array(
			'user' => 'envato',
			'tweets' => '5',
			'title' => 'Recent Tweets',
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
					<label for="<?php echo $this->get_field_id( 'user' ); ?>"><?php _e('Twitter Username:', 'invictus') ?></label>
					<input class="widefat" id="<?php echo $this->get_field_id( 'user' ); ?>" name="<?php echo $this->get_field_name( 'user' ); ?>" value="<?php echo $instance['user']; ?>" />
				</p>
			</li>			
			
			<li>
				<p>
					<label for="<?php echo $this->get_field_id( 'tweets' ); ?>"><?php _e('Number of tweets:', 'invictus') ?></label>
					<input class="widefat" id="<?php echo $this->get_field_id( 'tweets' ); ?>" name="<?php echo $this->get_field_name( 'tweets' ); ?>" value="<?php echo $instance['tweets']; ?>" />
				</p>
			</li>
						
		</ul>
			
		<?php
	}
}

/*-----------------------------------------------------------------------------------*/
/*	Register Widget
/*-----------------------------------------------------------------------------------*/

add_action( 'widgets_init', 'max_recent_tweets_widgets' );

function max_recent_tweets_widgets() {
	register_widget( 'WP_Widget_Recent_Tweets' );
}

?>

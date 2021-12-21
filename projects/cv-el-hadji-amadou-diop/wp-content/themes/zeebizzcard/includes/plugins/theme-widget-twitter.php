<?php
	// Add Theme Twitter Widget
	class themezee_Twitter_Widget extends WP_Widget {
		
		function themezee_Twitter_Widget() {
			$widget_ops = array('classname' => 'themezee_twitter', 'description' => __('Show your latest Tweets', 'themezee_lang') );
			$this->WP_Widget('zee_twitter', 'zeeTwitter Widget', $widget_ops);
		}
 
		function widget($args, $instance) {        
			extract( $args );
        
			$title	= empty($instance['title']) ? __('Latest Tweets', 'themezee_lang') : $instance['title'];
			$user	= empty($instance['user']) ? 'themezee'	: $instance['user'];
			$link	= $instance['twitter_link'] ? 1 : 0;
			$label	= empty($instance['twitter_label']) ? __('More updates on Twitter', 'themezee_lang') : $instance['twitter_label'];
			if ( !$nr = (int) $instance['twitter_nr'] )
				$nr = 5;
			else if ( $nr < 1 )
				$nr = 1;
			else if ( $nr > 15 )
				$nr = 15;
 
        ?>
			<?php echo $before_widget; ?>
				<?php echo $before_title . $title . $after_title; ?>
				
				<div id="twitter_div">
					<ul id="twitter_update_list"><li></li></ul>
					
					<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
					<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/<?php echo $user; ?>.json?callback=twitterCallback2&amp;count=<?php echo $nr; ?>"></script>
					  
					<?php if($link == 1) : ?>
						<p><a id="twitter_link" href="http://twitter.com/<?php echo $user; ?>"><?php echo $label; ?></a></p>
					<?php endif; ?>
				</div>
				
			<?php echo $after_widget; ?>
        <?php
		}

		function update($new_instance, $old_instance) {  
		
			$instance['title'] = esc_attr($new_instance['title']);
			$instance['user'] = esc_attr($new_instance['user']);
			$instance['twitter_link'] = $new_instance['twitter_link'] ? 1 : 0;
			$instance['twitter_label'] = esc_attr($new_instance['twitter_label']);
			$instance['twitter_nr'] = (int) $new_instance['twitter_nr'];
					  
			return $new_instance;
		}
 
		function form($instance) {
			
			$instance	= wp_parse_args( (array) $instance, array( 'title' => '', 'user' => '', 'twitter_link' => '', 'twitter_label' => '', 'twitter_nr' => '') );
			$title 		= esc_attr($instance['title']);
			$user		= empty($instance['user']) ? 'themezee'	: $instance['user'];
			$link 		= esc_attr($instance['twitter_link']);
			$label 		= esc_attr($instance['twitter_label']);
			if (!$nr = (int) $instance['twitter_nr']) $nr = 5;
	?>

			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'themezee_lang'); ?>:
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
				</label>
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('user'); ?>"><?php _e('User', 'themezee_lang'); ?>:
				<input class="widefat" id="<?php echo $this->get_field_id('user'); ?>" name="<?php echo $this->get_field_name('user'); ?>" type="text" value="<?php echo esc_attr($user); ?>" />
				</label>
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('twitter_nr'); ?>"><?php _e('Number of tweets to show', 'themezee_lang'); ?>:</label>
				<input id="<?php echo $this->get_field_id('twitter_nr'); ?>" name="<?php echo $this->get_field_name('twitter_nr'); ?>" type="text" value="<?php echo $nr; ?>" size="3" /><br />
				<small><?php _e('(at most 15)', 'themezee_lang'); ?></small>
			</p>
			
			<p>
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('twitter_link'); ?>" name="<?php echo $this->get_field_name('twitter_link'); ?>" <?php if( $link ) echo 'checked="checked"'; ?> />
				<label for="<?php echo $this->get_field_id('twitter_link'); ?>"><?php _e('Show link to Twitter', 'themezee_lang'); ?></label>		
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('twitter_label'); ?>"><?php _e('Link label', 'themezee_lang'); ?>:
				<input class="widefat" id="<?php echo $this->get_field_id('twitter_label'); ?>" name="<?php echo $this->get_field_name('twitter_label'); ?>" type="text" value="<?php echo esc_attr($label); ?>" />
				</label>
			</p>
			
	<?php
		}
	}
	register_widget('themezee_Twitter_Widget');
?>
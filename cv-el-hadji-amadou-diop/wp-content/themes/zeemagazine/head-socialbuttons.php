<?php
		// Social Media Buttons
		$url = get_template_directory_uri() . '/images/icons';
		$options = get_option('themeZee_options');
?>
			
				<?php // RSS Button
				if ( isset($options['themeZee_social_rss']) and $options['themeZee_social_rss'] <> '' ) { ?>
					<a href="<?php echo esc_url($options['themeZee_social_rss']); ?>"><img src="<?php echo $url; ?>/rss.png" alt="rss" /></a>
				<?php } ?>
				
				<?php // Email Button
				if ( isset($options['themeZee_social_email']) and $options['themeZee_social_email'] <> '' ) { ?>
					<a href="<?php echo esc_url($options['themeZee_social_email']); ?>"><img src="<?php echo $url; ?>/email.png" alt="email" /></a>
				<?php } ?>
				
				<?php // Twitter Button
				if ( isset($options['themeZee_social_twitter']) and $options['themeZee_social_twitter'] <> '' ) { ?>
					<a href="<?php echo esc_url($options['themeZee_social_twitter']); ?>"><img src="<?php echo $url; ?>/twitter.png" alt="twitter" /></a>
				<?php } ?>
				
				<?php // Facebook Button
				if ( isset($options['themeZee_social_facebook']) and $options['themeZee_social_facebook'] <> '' ) { ?>
					<a href="<?php echo esc_url($options['themeZee_social_facebook']); ?>"><img src="<?php echo $url; ?>/facebook.png" alt="facebook" /></a>
				<?php } ?>
				
				<?php // Google+ Button
				if ( isset($options['themeZee_social_googleplus']) and $options['themeZee_social_googleplus'] <> '' ) { ?>
					<a href="<?php echo esc_url($options['themeZee_social_googleplus']); ?>"><img src="<?php echo $url; ?>/googleplus.png" alt="GooglePlus" /></a>
				<?php } ?>
				
				<?php // Tumblr Button
				if ( isset($options['themeZee_social_tumblr']) and $options['themeZee_social_tumblr'] <> '' ) { ?>
					<a href="<?php echo esc_url($options['themeZee_social_tumblr']); ?>"><img src="<?php echo $url; ?>/tumblr.png" alt="tumblr" /></a>
				<?php } ?>
				
				<?php // LinkedIn Button
				if ( isset($options['themeZee_social_linkedin']) and $options['themeZee_social_linkedin'] <> '' ) { ?>
					<a href="<?php echo esc_url($options['themeZee_social_linkedin']); ?>"><img src="<?php echo $url; ?>/linkedin.png" alt="linkedin" /></a>
				<?php } ?>
				
				<?php // Xing Button
				if ( isset($options['themeZee_social_xing']) and $options['themeZee_social_xing'] <> '' ) { ?>
					<a href="<?php echo esc_url($options['themeZee_social_xing']); ?>"><img src="<?php echo $url; ?>/xing.png" alt="xing" /></a>
				<?php } ?>
				
				<?php // Delicious Button
				if ( isset($options['themeZee_social_delicious']) and $options['themeZee_social_delicious'] <> '' ) { ?>
					<a href="<?php echo esc_url($options['themeZee_social_delicious']); ?>"><img src="<?php echo $url; ?>/delicious.png" alt="delicious" /></a>
				<?php } ?>
				
				<?php // Digg Button
				if ( isset($options['themeZee_social_digg']) and $options['themeZee_social_digg'] <> '' ) { ?>
					<a href="<?php echo esc_url($options['themeZee_social_digg']); ?>"><img src="<?php echo $url; ?>/digg.png" alt="digg" /></a>
				<?php } ?>
				
				<?php // Flickr Button
				if ( isset($options['themeZee_social_flickr']) and $options['themeZee_social_flickr'] <> '' ) { ?>
					<a href="<?php echo esc_url($options['themeZee_social_flickr']); ?>"><img src="<?php echo $url; ?>/flickr.png" alt="flickr" /></a>
				<?php } ?>
				
				<?php // Youtube Button
				if ( isset($options['themeZee_social_youtube']) and $options['themeZee_social_youtube'] <> '' ) { ?>
					<a href="<?php echo esc_url($options['themeZee_social_youtube']); ?>"><img src="<?php echo $url; ?>/youtube.png" alt="youtube" /></a>
				<?php } ?>
				
				<?php // Vimeo Button
				if ( isset($options['themeZee_social_vimeo']) and $options['themeZee_social_vimeo'] <> '' ) { ?>
					<a href="<?php echo esc_url($options['themeZee_social_vimeo']); ?>"><img src="<?php echo $url; ?>/vimeo.png" alt="vimeo" /></a>
				<?php } ?>
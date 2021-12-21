<?php
	
	// Function to display networks
	function themezee_display_plugin_networks() {
	
		$url = get_template_directory_uri() . '/images/icons';
		$options = get_option('themezee_options');
		
		$networks = '<div class="network_profiles">';

		// Twitter Button
		if ( isset($options['themeZee_social_twitter']) and $options['themeZee_social_twitter'] <> '' ) :
			$networks .= '<a href="'. esc_url($options['themeZee_social_twitter']) .'">
				<img src="'. $url .'/twitter.png" alt="twitter" />
				<h4>Twitter</h4>
			</a>';
		endif;
					
		// Facebook Button
		if ( isset($options['themeZee_social_facebook']) and $options['themeZee_social_facebook'] <> '' ) :
			$networks .= '<a href="'. esc_url($options['themeZee_social_facebook']) .'">
				<img src="'. $url .'/facebook.png" alt="facebook" />
				<h4>Facebook</h4>
			</a>';
		endif;
					
		// GooglePlus Button
		if ( isset($options['themeZee_social_googleplus']) and $options['themeZee_social_googleplus'] <> '' ) :
			$networks .= '<a href="'. esc_url($options['themeZee_social_googleplus']) .'">
				<img src="'. $url .'/googleplus.png" alt="googleplus" />
				<h4>Google+</h4>
			</a>';
		endif;
					
		// LinkedIn Button
		if ( isset($options['themeZee_social_linkedin']) and $options['themeZee_social_linkedin'] <> '' ) :
			$networks .= '<a href="'. esc_url($options['themeZee_social_linkedin']) .'">
				<img src="'. $url .'/linkedin.png" alt="linkedin" />
				<h4>LinkedIn</h4>
			</a>';
		endif;
					
		// Xing Button
		if ( isset($options['themeZee_social_xing']) and $options['themeZee_social_xing'] <> '' ) :
			$networks .= '<a href="'. esc_url($options['themeZee_social_xing']) .'">
				<img src="'. $url .'/xing.png" alt="xing" />
				<h4>Xing</h4>
			</a>';
		endif;
		
		// MySpace Button
		if ( isset($options['themeZee_social_myspace']) and $options['themeZee_social_myspace'] <> '' ) :
			$networks .= '<a href="'. esc_url($options['themeZee_social_myspace']) .'">
				<img src="'. $url .'/myspace.png" alt="myspace" />
				<h4>MySpace</h4>
			</a>';
		endif;
		
		// Blogger Button
		if ( isset($options['themeZee_social_blogger']) and $options['themeZee_social_blogger'] <> '' ) :
			$networks .= '<a href="'. esc_url($options['themeZee_social_blogger']) .'">
				<img src="'. $url .'/blogger.png" alt="blogger" />
				<h4>Blogger</h4>
			</a>';
		endif;
		
		// Tumblr Button
		if ( isset($options['themeZee_social_tumblr']) and $options['themeZee_social_tumblr'] <> '' ) :
			$networks .= '<a href="'. esc_url($options['themeZee_social_tumblr']) .'">
				<img src="'. $url .'/tumblr.png" alt="tumblr" />
				<h4>Tumblr</h4>
			</a>';
		endif;
		
		// Typepad Button
		if ( isset($options['themeZee_social_typepad']) and $options['themeZee_social_typepad'] <> '' ) :
			$networks .= '<a href="'. esc_url($options['themeZee_social_typepad']) .'">
				<img src="'. $url .'/typepad.png" alt="typepad" />
				<h4>Typepad</h4>
			</a>';
		endif;
		
		// Wordpress Button
		if ( isset($options['themeZee_social_wordpress']) and $options['themeZee_social_wordpress'] <> '' ) :
			$networks .= '<a href="'. esc_url($options['themeZee_social_wordpress']) .'">
				<img src="'. $url .'/wordpress.png" alt="wordpress" />
				<h4>WordPress</h4>
			</a>';
		endif;
		
		// Gowalla Button
		if ( isset($options['themeZee_social_gowalla']) and $options['themeZee_social_gowalla'] <> '' ) :
			$networks .= '<a href="'. esc_url($options['themeZee_social_gowalla']) .'">
				<img src="'. $url .'/gowalla.png" alt="gowalla" />
				<h4>Gowalla</h4>
			</a>';
		endif;
		
		// Flickr Button
		if ( isset($options['themeZee_social_flickr']) and $options['themeZee_social_flickr'] <> '' ) :
			$networks .= '<a href="'. esc_url($options['themeZee_social_flickr']) .'">
				<img src="'. $url .'/flickr.png" alt="flickr" />
				<h4>Flickr</h4>
			</a>';
		endif;
		
		// Soundcloud Button
		if ( isset($options['themeZee_social_soundcloud']) and $options['themeZee_social_soundcloud'] <> '' ) :
			$networks .= '<a href="'. esc_url($options['themeZee_social_soundcloud']) .'">
				<img src="'. $url .'/soundcloud.png" alt="soundcloud" />
				<h4>Soundcloud</h4>
			</a>';
		endif;
		
		// Spotify Button
		if ( isset($options['themeZee_social_spotify']) and $options['themeZee_social_spotify'] <> '' ) :
			$networks .= '<a href="'. esc_url($options['themeZee_social_spotify']) .'">
				<img src="'. $url .'/spotify.png" alt="spotify" />
				<h4>Spotify</h4>
			</a>';
		endif;
		
		// Last.fm Button
		if ( isset($options['themeZee_social_lastfm']) and $options['themeZee_social_lastfm'] <> '' ) :
			$networks .= '<a href="'. esc_url($options['themeZee_social_lastfm']) .'">
				<img src="'. $url .'/lastfm.png" alt="lastfm" />
				<h4>Last.fm</h4>
			</a>';
		endif;
		
		// Youtube Button
		if ( isset($options['themeZee_social_youtube']) and $options['themeZee_social_youtube'] <> '' ) :
			$networks .= '<a href="'. esc_url($options['themeZee_social_youtube']) .'">
				<img src="'. $url .'/youtube.png" alt="youtube" />
				<h4>Youtube</h4>
			</a>';
		endif;
		
		// Vimeo Button
		if ( isset($options['themeZee_social_vimeo']) and $options['themeZee_social_vimeo'] <> '' ) :
			$networks .= '<a href="'. esc_url($options['themeZee_social_vimeo']) .'">
				<img src="'. $url .'/vimeo.png" alt="vimeo" />
				<h4>Vimeo</h4>
			</a>';
		endif;
		
		// DeviantART Button
		if ( isset($options['themeZee_social_deviantart']) and $options['themeZee_social_deviantart'] <> '' ) :
			$networks .= '<a href="'. esc_url($options['themeZee_social_deviantart']) .'">
				<img src="'. $url .'/deviantart.png" alt="deviantart" />
				<h4>DeviantART</h4>
			</a>';
		endif;
		
		// Dribbble Button
		if ( isset($options['themeZee_social_dribbble']) and $options['themeZee_social_dribbble'] <> '' ) :
			$networks .= '<a href="'. esc_url($options['themeZee_social_dribbble']) .'">
				<img src="'. $url .'/dribbble.png" alt="dribbble" />
				<h4>Dribbble</h4>
			</a>';
		endif;
		
		// Delicious Button
		if ( isset($options['themeZee_social_delicious']) and $options['themeZee_social_delicious'] <> '' ) :
			$networks .= '<a href="'. esc_url($options['themeZee_social_delicious']) .'">
				<img src="'. $url .'/delicious.png" alt="delicious" />
				<h4>Delicious</h4>
			</a>';
		endif;
		
		// Digg Button
		if ( isset($options['themeZee_social_digg']) and $options['themeZee_social_digg'] <> '' ) :
			$networks .= '<a href="'. esc_url($options['themeZee_social_digg']) .'">
				<img src="'. $url .'/digg.png" alt="digg" />
				<h4>Digg</h4>
			</a>';
		endif;
		
		// Reddit Button
		if ( isset($options['themeZee_social_reddit']) and $options['themeZee_social_reddit'] <> '' ) :
			$networks .= '<a href="'. esc_url($options['themeZee_social_reddit']) .'">
				<img src="'. $url .'/reddit.png" alt="reddit" />
				<h4>Reddit</h4>
			</a>';
		endif;
		
		// StumbleUpon Button
		if ( isset($options['themeZee_social_stumbleupon']) and $options['themeZee_social_stumbleupon'] <> '' ) :
			$networks .= '<a href="'. esc_url($options['themeZee_social_stumbleupon']) .'">
				<img src="'. $url .'/stumbleupon.png" alt="stumbleupon" />
				<h4>StumbleUpon</h4>
			</a>';
		endif;
		
		// RSS Button
		if ( isset($options['themeZee_social_rss']) and $options['themeZee_social_rss'] <> '' ) :
			$networks .= '<a href="'. esc_url($options['themeZee_social_rss']) .'">
				<img src="'. $url .'/rss.png" alt="rss" />
				<h4>RSS Feed</h4>
			</a>';
		endif;
		
		// Email Button
		if ( isset($options['themeZee_social_email']) and $options['themeZee_social_email'] <> '' ) :
			$networks .= '<a href="'. esc_url($options['themeZee_social_email']) .'">
				<img src="'. $url .'/email.png" alt="email" />
				<h4>Email</h4>
			</a>';
		endif;
		
		// Friendfeed Button
		if ( isset($options['themeZee_social_friendfeed']) and $options['themeZee_social_friendfeed'] <> '' ) :
			$networks .= '<a href="'. esc_url($options['themeZee_social_friendfeed']) .'">
				<img src="'. $url .'/friendfeed.png" alt="friendfeed" />
				<h4>Friendfeed</h4>
			</a>';
		endif;
		
		// Skype Button
		if ( isset($options['themeZee_social_skype']) and $options['themeZee_social_skype'] <> '' ) :
			$networks .= '<a href="'. esc_url($options['themeZee_social_skype']) .'">
				<img src="'. $url .'/skype.png" alt="skype" />
				<h4>Skype</h4>
			</a>';
		endif;
					
		$networks .= '</div><div class="clear"></div>';
		
		return $networks;
	}
	
	// Shortcode Function for Networks Plugin
	function themezee_shortcode_networks_function($atts, $content = null) {
		return themezee_display_plugin_networks();
	}
	add_shortcode('cardNetworks', 'themezee_shortcode_networks_function');
	
?>
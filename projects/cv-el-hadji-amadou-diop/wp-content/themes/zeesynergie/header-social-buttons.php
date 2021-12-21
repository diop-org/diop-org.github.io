<?php 
	// Get Buttons
	$url = get_template_directory_uri() . '/images/icons';
	$options = get_option('themezee_options');
	$networks = '';

	// Twitter Button
	if ( isset($options['themeZee_social_twitter']) and $options['themeZee_social_twitter'] <> '' ) :
		$networks .= '<a href="'. esc_url($options['themeZee_social_twitter']) .'"><img src="'. $url .'/twitter.png" alt="twitter" /></a>';
	endif;
				
	// Facebook Button
	if ( isset($options['themeZee_social_facebook']) and $options['themeZee_social_facebook'] <> '' ) :
		$networks .= '<a href="'. esc_url($options['themeZee_social_facebook']) .'"><img src="'. $url .'/facebook.png" alt="facebook" /></a>';
	endif;
				
	// GooglePlus Button
	if ( isset($options['themeZee_social_googleplus']) and $options['themeZee_social_googleplus'] <> '' ) :
		$networks .= '<a href="'. esc_url($options['themeZee_social_googleplus']) .'"><img src="'. $url .'/googleplus.png" alt="googleplus" /></a>';
	endif;
	
	// Pinterest Button
	if ( isset($options['themeZee_social_pinterest']) and $options['themeZee_social_pinterest'] <> '' ) :
		$networks .= '<a href="'. esc_url($options['themeZee_social_pinterest']) .'"><img src="'. $url .'/pinterest.png" alt="pinterest" /></a>';
	endif;
				
	// LinkedIn Button
	if ( isset($options['themeZee_social_linkedin']) and $options['themeZee_social_linkedin'] <> '' ) :
		$networks .= '<a href="'. esc_url($options['themeZee_social_linkedin']) .'"><img src="'. $url .'/linkedin.png" alt="linkedin" /></a>';
	endif;
				
	// Xing Button
	if ( isset($options['themeZee_social_xing']) and $options['themeZee_social_xing'] <> '' ) :
		$networks .= '<a href="'. esc_url($options['themeZee_social_xing']) .'"><img src="'. $url .'/xing.png" alt="xing" /></a>';
	endif;
	
	// MySpace Button
	if ( isset($options['themeZee_social_myspace']) and $options['themeZee_social_myspace'] <> '' ) :
		$networks .= '<a href="'. esc_url($options['themeZee_social_myspace']) .'"><img src="'. $url .'/myspace.png" alt="myspace" /></a>';
	endif;
	
	// Blogger Button
	if ( isset($options['themeZee_social_blogger']) and $options['themeZee_social_blogger'] <> '' ) :
		$networks .= '<a href="'. esc_url($options['themeZee_social_blogger']) .'"><img src="'. $url .'/blogger.png" alt="blogger" /></a>';
	endif;
	
	// Tumblr Button
	if ( isset($options['themeZee_social_tumblr']) and $options['themeZee_social_tumblr'] <> '' ) :
		$networks .= '<a href="'. esc_url($options['themeZee_social_tumblr']) .'"><img src="'. $url .'/tumblr.png" alt="tumblr" /></a>';
	endif;
	
	// Typepad Button
	if ( isset($options['themeZee_social_typepad']) and $options['themeZee_social_typepad'] <> '' ) :
		$networks .= '<a href="'. esc_url($options['themeZee_social_typepad']) .'"><img src="'. $url .'/typepad.png" alt="typepad" /></a>';
	endif;
	
	// Wordpress Button
	if ( isset($options['themeZee_social_wordpress']) and $options['themeZee_social_wordpress'] <> '' ) :
		$networks .= '<a href="'. esc_url($options['themeZee_social_wordpress']) .'"><img src="'. $url .'/wordpress.png" alt="wordpress" /></a>';
	endif;
	
	// Gowalla Button
	if ( isset($options['themeZee_social_gowalla']) and $options['themeZee_social_gowalla'] <> '' ) :
		$networks .= '<a href="'. esc_url($options['themeZee_social_gowalla']) .'"><img src="'. $url .'/gowalla.png" alt="gowalla" /></a>';
	endif;
	
	// Flickr Button
	if ( isset($options['themeZee_social_flickr']) and $options['themeZee_social_flickr'] <> '' ) :
		$networks .= '<a href="'. esc_url($options['themeZee_social_flickr']) .'"><img src="'. $url .'/flickr.png" alt="flickr" /></a>';
	endif;
	
	// Soundcloud Button
	if ( isset($options['themeZee_social_soundcloud']) and $options['themeZee_social_soundcloud'] <> '' ) :
		$networks .= '<a href="'. esc_url($options['themeZee_social_soundcloud']) .'"><img src="'. $url .'/soundcloud.png" alt="soundcloud" /></a>';
	endif;
	
	// Spotify Button
	if ( isset($options['themeZee_social_spotify']) and $options['themeZee_social_spotify'] <> '' ) :
		$networks .= '<a href="'. esc_url($options['themeZee_social_spotify']) .'"><img src="'. $url .'/spotify.png" alt="spotify" /></a>';
	endif;
	
	// Last.fm Button
	if ( isset($options['themeZee_social_lastfm']) and $options['themeZee_social_lastfm'] <> '' ) :
		$networks .= '<a href="'. esc_url($options['themeZee_social_lastfm']) .'"><img src="'. $url .'/lastfm.png" alt="lastfm" /></a>';
	endif;
	
	// Youtube Button
	if ( isset($options['themeZee_social_youtube']) and $options['themeZee_social_youtube'] <> '' ) :
		$networks .= '<a href="'. esc_url($options['themeZee_social_youtube']) .'"><img src="'. $url .'/youtube.png" alt="youtube" /></a>';
	endif;
	
	// Vimeo Button
	if ( isset($options['themeZee_social_vimeo']) and $options['themeZee_social_vimeo'] <> '' ) :
		$networks .= '<a href="'. esc_url($options['themeZee_social_vimeo']) .'"><img src="'. $url .'/vimeo.png" alt="vimeo" /></a>';
	endif;
	
	// DeviantART Button
	if ( isset($options['themeZee_social_deviantart']) and $options['themeZee_social_deviantart'] <> '' ) :
		$networks .= '<a href="'. esc_url($options['themeZee_social_deviantart']) .'"><img src="'. $url .'/deviantart.png" alt="deviantart" /></a>';
	endif;
	
	// Dribbble Button
	if ( isset($options['themeZee_social_dribbble']) and $options['themeZee_social_dribbble'] <> '' ) :
		$networks .= '<a href="'. esc_url($options['themeZee_social_dribbble']) .'"><img src="'. $url .'/dribbble.png" alt="dribbble" /></a>';
	endif;
	
	// Delicious Button
	if ( isset($options['themeZee_social_delicious']) and $options['themeZee_social_delicious'] <> '' ) :
		$networks .= '<a href="'. esc_url($options['themeZee_social_delicious']) .'"><img src="'. $url .'/delicious.png" alt="delicious" /></a>';
	endif;
	
	// Digg Button
	if ( isset($options['themeZee_social_digg']) and $options['themeZee_social_digg'] <> '' ) :
		$networks .= '<a href="'. esc_url($options['themeZee_social_digg']) .'"><img src="'. $url .'/digg.png" alt="digg" /></a>';
	endif;
	
	// Reddit Button
	if ( isset($options['themeZee_social_reddit']) and $options['themeZee_social_reddit'] <> '' ) :
		$networks .= '<a href="'. esc_url($options['themeZee_social_reddit']) .'"><img src="'. $url .'/reddit.png" alt="reddit" /></a>';
	endif;
	
	// StumbleUpon Button
	if ( isset($options['themeZee_social_stumbleupon']) and $options['themeZee_social_stumbleupon'] <> '' ) :
		$networks .= '<a href="'. esc_url($options['themeZee_social_stumbleupon']) .'"><img src="'. $url .'/stumbleupon.png" alt="stumbleupon" /></a>';
	endif;
	
	// RSS Button
	if ( isset($options['themeZee_social_rss']) and $options['themeZee_social_rss'] <> '' ) :
		$networks .= '<a href="'. esc_url($options['themeZee_social_rss']) .'"><img src="'. $url .'/rss.png" alt="rss" /></a>';
	endif;
	
	// Email Button
	if ( isset($options['themeZee_social_email']) and $options['themeZee_social_email'] <> '' ) :
		$networks .= '<a href="'. esc_url($options['themeZee_social_email']) .'"><img src="'. $url .'/email.png" alt="email" /></a>';
	endif;
	
	// Friendfeed Button
	if ( isset($options['themeZee_social_friendfeed']) and $options['themeZee_social_friendfeed'] <> '' ) :
		$networks .= '<a href="'. esc_url($options['themeZee_social_friendfeed']) .'"><img src="'. $url .'/friendfeed.png" alt="friendfeed" /></a>';
	endif;
	
	// Skype Button
	if ( isset($options['themeZee_social_skype']) and $options['themeZee_social_skype'] <> '' ) :
		$networks .= '<a href="'. esc_url($options['themeZee_social_skype']) .'"><img src="'. $url .'/skype.png" alt="skype" /></a>';
	endif;
	
	echo $networks;
?>
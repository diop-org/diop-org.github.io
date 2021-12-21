<?php
add_filter('widget_text', 'do_shortcode');
/**TRITON SHORTCODES **/


/**Quote Shortcode **/
/**USAGE: [quote]Your Quote[/quote]**/
function trt_quote( $atts, $content = null ) {
		return '<div class="lgn_quote">'.$content.'</div>';
}
add_shortcode( 'quote', 'trt_quote' );
/*TINY MCE Quote Button*/
function trt_add_quote_button() {  
  if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )  
 {  
   add_filter('mce_external_plugins', 'trt_add_quote_plugin');  
   add_filter('mce_buttons_3', 'trt_register_quote_button');  
  }  
}  
function trt_register_quote_button($buttons) {  
    array_push($buttons, "quote");  
    return $buttons;  
 }  
function trt_add_quote_plugin($plugin_array) {  
  $plugin_array['quote'] = get_template_directory_uri().'/js/buttons.js';  
   return $plugin_array;  
}
add_action('init', 'trt_add_quote_button');


/**FACEBOOK LIKE BUTTON **/
/**USAGE: [fblike]**/
function trt_facelike() {
   return '<iframe src="http://www.facebook.com/plugins/like.php?href='.urlencode(get_permalink($post->ID)).'&amp;layout=standard&amp;show_faces=false&amp;width=450&amp;action=like&amp;colorscheme=light" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:450px; height:60px"></iframe>';
}
add_shortcode('fblike', 'trt_facelike');
/*TINY Facebook Like Button*/
function trt_add_fblike_button() {  
  if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )  
 {  
   add_filter('mce_external_plugins', 'trt_add_fblike_plugin');  
   add_filter('mce_buttons_3', 'trt_register_fblike_button');  
  }  
}  
function trt_register_fblike_button($buttons) {  
    array_push($buttons, "fblike");  
    return $buttons;  
 }  
function trt_add_fblike_plugin($plugin_array) {  
  $plugin_array['fblike'] = get_template_directory_uri().'/js/buttons.js';  
   return $plugin_array;  
}
add_action('init', 'trt_add_fblike_button');


/**Youtube Video Shortcode **/
/**USAGE: [youtube width="640" height="385" video_id="EhkHFenJ3rM"]
**/
function trt_youtube_func($atts) {

	//extract short code attr
	extract(shortcode_atts(array(
		'width' => 600,
		'height' => 365,
		'video_id' => '',
	), $atts));
	
	$custom_id = time().rand();
	
	$return_html = '<object type="application/x-shockwave-flash" data="http://www.youtube.com/v/'.$video_id.'&hd=1" style="width:'.$width.'px;height:'.$height.'px"><param name="wmode" value="opaque"><param name="movie" value="http://www.youtube.com/v/'.$video_id.'&hd=1" /></object>';
	
	return $return_html;
}
add_shortcode('youtube', 'trt_youtube_func');
/*TINY youtube Button*/
function trt_add_youtube_button() {  
  if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )  
 {  
   add_filter('mce_external_plugins', 'trt_add_youtube_plugin');  
   add_filter('mce_buttons_3', 'trt_register_youtube_button');  
  }  
}  
function trt_register_youtube_button($buttons) {  
    array_push($buttons, "youtube");  
    return $buttons;  
 }  
function trt_add_youtube_plugin($plugin_array) {  
  $plugin_array['youtube'] = get_template_directory_uri().'/js/buttons.js';  
   return $plugin_array;  
}
add_action('init', 'trt_add_youtube_button');



/**Vimeo Video Shortcode **/
/**USAGE: [vimeo width="640" height="385" video_id="11770385"]
**/
function trt_vimeo_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'width' => 600,
		'height' => 365,
		'video_id' => '',
	), $atts));
	
	$custom_id = time().rand();
	
	$return_html = '<object width="'.$width.'" height="'.$height.'"><param name="allowfullscreen" value="true" /><param name="wmode" value="opaque"><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id='.$video_id.'&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" /><embed src="http://vimeo.com/moogaloop.swf?clip_id='.$video_id.'&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="'.$width.'" height="'.$height.'" wmode="transparent"></embed></object>';
	
	return $return_html;
}
add_shortcode('vimeo', 'trt_vimeo_func');
/*TINY Vimeo Button*/
function trt_add_vimeo_button() {  
  if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )  
 {  
   add_filter('mce_external_plugins', 'trt_add_vimeo_plugin');  
   add_filter('mce_buttons_3', 'trt_register_vimeo_button');  
  }  
}  
function trt_register_vimeo_button($buttons) {  
    array_push($buttons, "vimeo");  
    return $buttons;  
 }  
function trt_add_vimeo_plugin($plugin_array) {  
  $plugin_array['vimeo'] = get_template_directory_uri().'/js/buttons.js';  
   return $plugin_array;  
}
add_action('init', 'trt_add_vimeo_button');


/**Custom Button Shortcode **/
/**USAGE: [button class="violet"][/button]
**/
function trt_button_func($atts, $content = null) {

	//extract short code attr
	extract(shortcode_atts(array( 'url' => 'http://www.google.com'), $atts));
	
	$return_html = '<div class="scl_button"><span><a href="'.$url.'">'.$content.'</a></span></div><div style="clear:both"></div>';
	
	return $return_html;
}

add_shortcode('button', 'trt_button_func');
/*TINY buttons Button*/
function trt_add_button_button() {  
  if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )  
 {  
   add_filter('mce_external_plugins', 'trt_add_button_plugin');  
   add_filter('mce_buttons_3', 'trt_register_button_button');  
  }  
}  
function trt_register_button_button($buttons) {  
    array_push($buttons, "button");  
    return $buttons;  
 }  
function trt_add_button_plugin($plugin_array) {  
  $plugin_array['button'] = get_template_directory_uri().'/js/buttons.js';  
   return $plugin_array;  
}
add_action('init', 'trt_add_button_button');

<?php
/* 
	Options	Validate
	Author: Tyler Cuningham
	Establishes the theme options validation.
	Copyright (C) 2011 CyberChimps
	Version 2.0
	
*/

function theme_options_validate( $input ) {
	global  $themename, $themeslug, $options, $select_font, $select_featured_images;

	/* Assign checkbox value */

	if ( ! isset( $input[$themeslug.'_hide_post_icons'] ) )
		$input[$themeslug.'_hide_post_icons'] = null;
	$input[$themeslug.'_hide_post_icons'] = ( $input[$themeslug.'_hide_post_icons'] == 1 ? 1 : 0 );
	
	if ( ! isset( $input[$themeslug.'_hide_facebook'] ) )
		$input[$themeslug.'_hide_facebook'] = null;
	$input[$themeslug.'_hide_facebook'] = ( $input[$themeslug.'_hide_facebook'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input[$themeslug.'_hide_twitter'] ) )
		$input[$themeslug.'_hide_twitter'] = null;
	$input[$themeslug.'_hide_twitter'] = ( $input[$themeslug.'_hide_twitter'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input[$themeslug.'_hide_gplus'] ) )
		$input[$themeslug.'_hide_gplus'] = null;
	$input[$themeslug.'_hide_gplus'] = ( $input[$themeslug.'_hide_gplus'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input[$themeslug.'_hide_linkedin'] ) )
		$input[$themeslug.'_hide_linkedin'] = null;
	$input[$themeslug.'_hide_linkedin'] = ( $input[$themeslug.'_hide_linkedin'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input[$themeslug.'_hide_youtube'] ) )
		$input[$themeslug.'_hide_youtube'] = null;
	$input[$themeslug.'_hide_youtube'] = ( $input[$themeslug.'_hide_youtube'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input[$themeslug.'_hide_googlemaps'] ) )
		$input[$themeslug.'_hide_googlemaps'] = null;
	$input[$themeslug.'_hide_googlemaps'] = ( $input[$themeslug.'_hide_googlemaps'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input[$themeslug.'_hide_email'] ) )
		$input[$themeslug.'_hide_email'] = null;
	$input[$themeslug.'_hide_email'] = ( $input[$themeslug.'_hide_email'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input[$themeslug.'_hide_rss'] ) )
		$input[$themeslug.'_hide_rss'] = null;
	$input[$themeslug.'_hide_rss'] = ( $input[$themeslug.'_hide_rss'] == 1 ? 1 : 0 ); 

  	if ( ! isset( $input[$themeslug.'_hide_callout'] ) )
		$input[$themeslug.'_hide_callout'] = null;
	$input[$themeslug.'_hide_callout'] = ( $input[$themeslug.'_hide_callout'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input[$themeslug.'_show_fb_like'] ) )
		$input[$themeslug.'_show_fb_like'] = null;
	$input[$themeslug.'_show_fb_like'] = ( $input[$themeslug.'_show_fb_like'] == 1 ? 1 : 0 ); 
  
    if ( ! isset( $input[$themeslug.'_hide_slider'] ) )
		$input[$themeslug.'_hide_slider'] = null;
	$input[$themeslug.'_hide_slider'] = ( $input[$themeslug.'_hide_slider'] == 1 ? 1 : 0 ); 
  
    if ( ! isset( $input[$themeslug.'_hide_boxes'] ) )
		$input[$themeslug.'_hide_boxes'] = null;
	$input[$themeslug.'_hide_boxes'] = ( $input[$themeslug.'_hide_boxes'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input[$themeslug.'_hide_search'] ) )
		$input[$themeslug.'_hide_search'] = null;
	$input[$themeslug.'_hide_search'] = ( $input[$themeslug.'_hide_search'] == 1 ? 1 : 0 ); 
  
  	if ( ! isset( $input[$themeslug.'_hide_home_icon'] ) )
		$input[$themeslug.'_hide_home_icon'] = null;
	$input[$themeslug.'_hide_home_icon'] = ( $input[$themeslug.'_hide_home_icon'] == 1 ? 1 : 0 ); 
  
  	if ( ! isset( $input[$themeslug.'_hide_link'] ) )
		$input[$themeslug.'_hide_link'] = null;
	$input[$themeslug.'_hide_link'] = ( $input[$themeslug.'_hide_link'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input['if_slider_navigation'] ) )
		$input['if_slider_navigation'] = null;
	$input['if_slider_navigation'] = ( $input['if_slider_navigation'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input[$themeslug.'_show_excerpts'] ) )
		$input[$themeslug.'_show_excerpts'] = null;
	$input[$themeslug.'_show_excerpts'] = ( $input[$themeslug.'_show_excerpts'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input[$themeslug.'_hide_author'] ) )
		$input[$themeslug.'_hide_author'] = null;
	$input[$themeslug.'_hide_author'] = ( $input[$themeslug.'_hide_author'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input[$themeslug.'_hide_categories'] ) )
		$input[$themeslug.'_hide_categories'] = null;
	$input[$themeslug.'_hide_categories'] = ( $input[$themeslug.'_hide_categories'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input[$themeslug.'_hide_date'] ) )
		$input[$themeslug.'_hide_date'] = null;
	$input[$themeslug.'_hide_date'] = ( $input[$themeslug.'_hide_date'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input[$themeslug.'_hide_comments'] ) )
		$input[$themeslug.'_hide_comments'] = null;
	$input[$themeslug.'_hide_comments'] = ( $input[$themeslug.'_hide_comments'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input[$themeslug.'_hide_share'] ) )
		$input[$themeslug.'_hide_share'] = null;
	$input[$themeslug.'_hide_share'] = ( $input[$themeslug.'_hide_share'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input[$themeslug.'_hide_tags'] ) )
		$input[$themeslug.'_hide_tags'] = null;
	$input[$themeslug.'_hide_tags'] = ( $input[$themeslug.'_hide_tags'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input[$themeslug.'_enable_twitter'] ) )
		$input[$themeslug.'_enable_twitter'] = null;
	$input[$themeslug.'_enable_twitter'] = ( $input[$themeslug.'_enable_twitter'] == 1 ? 1 : 0 ); 
  
	if ( ! isset( $input[$themeslug.'_show_gplus'] ) )
		$input[$themeslug.'_show_gplus'] = null;
	$input[$themeslug.'_show_gplus'] = ( $input[$themeslug.'_show_gplus'] == 1 ? 1 : 0 ); 

	
	
  	/* Strip HTML from certain options */
  	  
	$input[$themeslug.'_facebook'] = wp_filter_nohtml_kses( $input[$themeslug.'_facebook'] ); 
    
	$input[$themeslug.'_twitter'] = wp_filter_nohtml_kses( $input[$themeslug.'_twitter'] ); 
  
	$input[$themeslug.'_linkedin'] = wp_filter_nohtml_kses( $input[$themeslug.'_linkedin'] );   
  
	$input[$themeslug.'_youtube'] = wp_filter_nohtml_kses( $input[$themeslug.'_youtube'] );  
  
	$input[$themeslug.'_rsslink'] = wp_filter_nohtml_kses( $input[$themeslug.'_rsslink'] );  
  
	$input[$themeslug.'_email'] = wp_filter_nohtml_kses( $input[$themeslug.'_email'] );   
  
	
	/* Handle file uploads */
	
	if ($_FILES['favicon_filename']['name'] != '') {
		$overrides = array('test_form' => false); 
        $file2 = wp_handle_upload($_FILES['favicon_filename'], $overrides);
       	$input['file2'] = $file2;
    } 
    
    elseif(isset($_POST['favicon_filename_text']) && $_POST['favicon_filename_text'] != '') {
	    $input['file2'] = array('url' => $_POST['_favicon_filename_text']);
    }
    
    else {
	    $input['file2'] = null;
	}
      
	return $input;    
}

?>
<?php

/*-----------------------------------------------------------------------------------*/
/*	Custom function for pagination
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'max_pagination' ) ):
	function max_pagination($pages = '', $range = 4)
	{
		 $showitems = ($range * 2)+1; 
	 
		 global $paged, $posts, $wp_query;
		 
		 if(empty($paged)) $paged = 1;
	 
		 if($pages == '')
		 {
			 $pages = $wp_query->max_num_pages;
			 if(!$pages)
			 {
				 $pages = 1;
			 }
		 }  
	 
		 if(1 != $pages)
		 {
			 echo "<div class=\"clearfix pagination\"><span>".__('Page', MAX_SHORTNAME)." ".$paged." ".__('of')." ".$pages."</span>";
			 if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; ".__('Next', MAX_SHORTNAME)."</a>";
			 if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; ".__('Previous', MAX_SHORTNAME)."</a>";
	 
			 for ($i=1; $i <= $pages; $i++)
			 {
				 if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
				 {
					 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
				 }
			 }
	 
			 if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">".__('Next', MAX_SHORTNAME)." &rsaquo;</a>";
			 if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>".__('Last', MAX_SHORTNAME)." &raquo;</a>";
			 echo "</div>\n";
		 }
	}
endif;

if ( ! function_exists( 'max_comment' ) ) :

/*-----------------------------------------------------------------------------------*/
/*	Template for comments and pingbacks.
/*-----------------------------------------------------------------------------------*/

function max_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '<span class="says">by</span> %s'), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->

		<div class="comment-meta commentmetadata">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s', MAX_SHORTNAME), get_comment_date(),  get_comment_time() ); ?>  <?php edit_comment_link( __( '(Edit)', MAX_SHORTNAME), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
		break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:','invictus' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', MAX_SHORTNAME), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

/*-----------------------------------------------------------------------------------*/
/*	Get image cropping direction
/*-----------------------------------------------------------------------------------*/

function get_cropping_direction($meta_value) {	
	
	switch($meta_value){
		
		case 'Position in the Center (default)' :
		case 'c':
			$dir = 'c';
		break;
	
		case 'Align top' :
		case 't':
			$dir = 't';
		break;
		
		case 'Align top right':
		case 'tr':
			$dir = 'tr';
		break;
		
		case 'Align top left':
		case 'tl':
			$dir = 'tl';
		break;
		
		case 'Align bottom':
		case 'b':
			$dir = 'b';
		break;
		
		case 'Align bottom right':
		case 'br':
			$dir = 'br';
		break;
		
		case 'Align bottom left':
		case 'bl':
			$dir = 'bl';
		break;
		
		case 'Align left':
		case 'l':
			$dir = 'l';
		break;
		
		case 'Align right':
		case 'r':
			$dir = 'r';
		break;
		
		default:
			$dir = 'c';
		break;
		
	}
	
	return $dir;
	
}

/*-----------------------------------------------------------------------------------*/
/*	Get hex to rgb and rgb to hex
/*-----------------------------------------------------------------------------------*/

	function max_HexToRGB($hex, $alpha = false) {
		$hex = ereg_replace("#", "", $hex);
		$color = array();
		
		if(strlen($hex) == 3) {
			$color['r'] = hexdec(substr($hex, 0, 1) . $r);
			$color['g'] = hexdec(substr($hex, 1, 1) . $g);
			$color['b'] = hexdec(substr($hex, 2, 1) . $b);
		}
		else if(strlen($hex) == 6) {
			$color['r'] = hexdec(substr($hex, 0, 2));
			$color['g'] = hexdec(substr($hex, 2, 2));
			$color['b'] = hexdec(substr($hex, 4, 2));
		}

		if($alpha){
			$color['a'] = $alpha;
		}
		
		return $color;
	}
	
	
	function max_RGBToHex($r, $g, $b) {
		//String padding bug found and the solution put forth by Pete Williams (http://snipplr.com/users/PeteW)
		$hex = "#";
		$hex.= str_pad(dechex($r), 2, "0", STR_PAD_LEFT);
		$hex.= str_pad(dechex($g), 2, "0", STR_PAD_LEFT);
		$hex.= str_pad(dechex($b), 2, "0", STR_PAD_LEFT);
		
		return $hex;
	}

/*-----------------------------------------------------------------------------------*/
/*	Google Font Lib
/*-----------------------------------------------------------------------------------*/

include_once(MAX_FW_PATH.'/includes/google.font.inc.php');

function max_get_google_font( $max_option = array() ) {
	
	global $google_font_array;
	
	if( !is_array($max_option) ){
		$max_option = array( $max_option );	
	}
	
	$output = "";
	
	$_temp_fonts = array();
	
	foreach($max_option as $index => $family){		
		
		if(!in_array($family, $_temp_fonts)){
		
			$_temp_fonts[] = $family;
			
			switch($family) {
		
				// Arial Standard	
				case  'Arial, Helvetica, sans-serif':
				case  'Verdana, Geneva, sans-serif':
				case  'Tahoma, Geneva, sans-serif':
				case  'Georgia, Times, serif':
					$output .= "";
				break;	
				
				default: $output .= '<link href="http://fonts.googleapis.com/css?family='.$google_font_array[$family].'" rel="stylesheet" type="text/css" />'."\n";
						
			}
			
		}
		
	}
	
	echo $output;
	
}


/*-----------------------------------------------------------------------------------*/
/*	Google Font HTML output
/*-----------------------------------------------------------------------------------*/

function max_get_google_font_html(){
	
	// get the fonts
	$body_font = get_option(MAX_SHORTNAME.'_font_body');
	$widget_font = get_option(MAX_SHORTNAME.'_font_widget');
	$nav_font = get_option(MAX_SHORTNAME.'_font_navigation');
	$pulldown_font = get_option(MAX_SHORTNAME.'_font_navigation_pulldown');
	
	$font_array = array( $body_font['font_family'], $widget_font['font_family'], $nav_font['font_family'], $pulldown_font['font_family'] );

	$_google_fonts = array();
	for($h = 1; $h <= 6; $h++){
		$_google_fonts['h'.$h] = get_option(MAX_SHORTNAME.'_font_h'.$h);
	}
		
	foreach($_google_fonts as $get_google_font){		
		// get the headline font
		$_temp_font_array[] = $get_google_font['font_family'];	
	}

	// combine both arrays
	$get_fonts = array_merge($font_array, $_temp_font_array); 

	// get the google font html	
	max_get_google_font( $get_fonts );
		
	// Main Color styles ?>
<style type="text/css">

	body { 
		font: <?php echo $body_font['font_size'] ?>px/<?php echo $body_font['line_height'] ?>px <?php echo max_get_font_string( $body_font['font_family'] ) ?>; font-weight: <?php echo $body_font['font_weight']; ?>;
		color: <?php echo $body_font['font_color'] ?>
	}

	#welcomeTeaser, #sidebar .max_widget_teaser, #showtitle, #slidecaption  {
		font-family: <?php echo max_get_font_string( $_google_fonts['h1']['font_family'] ).', "Helvetica Neue", Helvetica, Arial, sans-serif' ?>;
		font-weight: 300;
	}

	nav#navigation ul li a {
		font: <?php echo $nav_font['font_size'] ?>px/<?php echo $nav_font['line_height'] ?>px <?php echo max_get_font_string( $nav_font['font_family'] ) ?>; font-weight: <?php echo $nav_font['font_weight']; ?>
	}

	nav#navigation ul ul li a {
		font: <?php echo $pulldown_font['font_size'] ?>px/<?php echo $pulldown_font['line_height'] ?>px <?php echo max_get_font_string( $pulldown_font['font_family'] ) ?>; font-weight: <?php echo $pulldown_font['font_weight']; ?>
	}

	h1, h1 a:link, h1 a:visited { color: <?php echo $_google_fonts['h1']['font_color'] ?>; font: <?php echo $_google_fonts['h1']['font_size'] ?>px/<?php echo $_google_fonts['h1']['line_height'] ?>px <?php echo max_get_font_string( $_google_fonts['h1']['font_family'] ) ?>; font-weight: <?php echo $_google_fonts['h1']['font_weight']  ?> !important; }	
	h2 { color: <?php echo $_google_fonts['h2']['font_color'] ?>; font: <?php echo $_google_fonts['h2']['font_size'] ?>px/<?php echo $_google_fonts['h2']['line_height'] ?>px <?php echo max_get_font_string( $_google_fonts['h2']['font_family'] ) ?> !important; font-weight: <?php echo $_google_fonts['h2']['font_weight']; ?> !important; }
	h3 { color: <?php echo $_google_fonts['h3']['font_color'] ?>; font: <?php echo $_google_fonts['h3']['font_size'] ?>px/<?php echo $_google_fonts['h3']['line_height'] ?>px <?php echo max_get_font_string( $_google_fonts['h3']['font_family'] ) ?> !important; font-weight: <?php echo $_google_fonts['h3']['font_weight']; ?> !important; }
	h4 { color: <?php echo $_google_fonts['h4']['font_color'] ?>; font: <?php echo $_google_fonts['h4']['font_size'] ?>px/<?php echo $_google_fonts['h4']['line_height'] ?>px <?php echo max_get_font_string( $_google_fonts['h4']['font_family'] ) ?> !important; font-weight: <?php echo $_google_fonts['h4']['font_weight']; ?> !important; }
	h5 { color: <?php echo $_google_fonts['h5']['font_color'] ?>; font: <?php echo $_google_fonts['h5']['font_size'] ?>px/<?php echo $_google_fonts['h5']['line_height'] ?>px <?php echo max_get_font_string( $_google_fonts['h5']['font_family'] ) ?> !important; font-weight: <?php echo $_google_fonts['h5']['font_weight']; ?> !important; }
	h6 { color: <?php echo $_google_fonts['h6']['font_color'] ?>; font: <?php echo $_google_fonts['h6']['font_size'] ?>px/<?php echo $_google_fonts['h6']['line_height'] ?>px <?php echo max_get_font_string( $_google_fonts['h6']['font_family'] ) ?> !important; font-weight:  <?php echo $_google_fonts['h6']['font_weight']; ?> !important; }
		
		
	#sidebar h1.widget-title, #sidebar h2.widget-title {	
		color: <?php echo $widget_font['font_color'] ?>; font: <?php echo $widget_font['font_size'] ?>px/<?php echo $widget_font['line_height'] ?>px <?php echo max_get_font_string( $widget_font['font_family'] ) ?> !important; font-weight: <?php echo $widget_font['font_weight']; ?>;
	}
		
	<?php if ( get_option_max( 'homepage_teaser_font_size' ) != ""){?>
	#welcomeTeaser, #sidebar .max_widget_teaser { font-size: <?php get_option_max( 'homepage_teaser_font_size', true ) ?>px; }
	<?php } ?>
	<?php if ( get_option_max( 'homepage_teaser_font_size_bold' ) !="" ){?>
	#welcomeTeaser .inner strong, #sidebar .max_widget_teaser .inner strong { font-size: <?php get_option_max( 'homepage_teaser_font_size_bold', true ) ?>px; }
	<?php } ?>
		
</style>
	<?php
}

/*-----------------------------------------------------------------------------------*/
/*	Get Font Select
/*-----------------------------------------------------------------------------------*/

function max_google_font_select() {
	
	global $google_font_array;
	 
	$output= '<optgroup label="Standard Fonts">
			<option value="Arial, Helvetica, sans-serif">Arial, Helvetica, sans-serif</option>
			<option value="Verdana, Geneva, sans-serif">Verdana, Geneva, sans-serif</option>
			<option value="Tahoma, Geneva, sans-serif">Tahoma, Geneva, sans-serif</option>
			<option value="Georgia, Times, serif">Georgia, Times, serif</option>
		</optgroup>			
		<optgroup label="Google API Fonts">';
	
	// loop throug font array	
	foreach ($google_font_array as $index => $value ){
		$output .= '<option value="'.$index.'">'.$index.'</option>';
	}
	
	$output .= '</optgroup>';
	
	echo $output;
}

/*-----------------------------------------------------------------------------------*/
/*	Get the font string
/*-----------------------------------------------------------------------------------*/

function max_get_font_string( $font ){
	
	switch($font) {

		// Arial Standard	
		case  'Arial, Helvetica, sans-serif':
		case  'Verdana, Geneva, sans-serif':
		case  'Tahoma, Geneva, sans-serif':
		case  'Georgia, Times, serif':
			$output = $font;
		break;	
		
		default: $output = '"'.$font.'"';
				
	}
	
	return $output;
}

/*-----------------------------------------------------------------------------------*/
/*	Catch the Taxonomy Cats for Galleries
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'max_get_galleries' ) ):

	function max_get_galleries( $addSelect = false ){
		
		// catch the custom categories
		$gallery_cats = get_categories('taxonomy='.GALLERY_TAXONOMY.'&amp;orderby=name&hide_empty=0&hierarchical=1');
					
		foreach ($gallery_cats as $term_list ) {
			 $wp_gal_cats[$term_list->term_id] = $term_list->name;
		}
		
		return $wp_gal_cats;
	}
	
endif;

add_action('init', 'max_get_galleries');


/*-----------------------------------------------------------------------------------*/
/*	Create an own Dashboard feed
/*-----------------------------------------------------------------------------------*/
if(get_option('general_custom_dashboard',true) == 'true'){
	add_action('wp_dashboard_setup', 'max_dashboard_widgets');
}

function max_dashboard_widgets() {
     global $wp_meta_boxes;
     // remove unnecessary widgets
     // var_dump( $wp_meta_boxes['dashboard'] ); // use to get all the widget IDs
     unset(
          $wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins'],
          $wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'],
          $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']
     );
     // add a custom dashboard widget
	 add_meta_box( 'max_dashboard_custom_feed', 'Invictus news', 'max_dashboard_custom_feed_output', 'dashboard', 'normal', 'high' );
}

function max_dashboard_custom_feed_output() {
     echo '<div class="rss-widget">';
     wp_widget_rss_output(array(
          'url' => 'http://themes.do-media.de/wordpress/invictus/feed/',
          'title' => 'Invictus update',
          'items' => 2,
          'show_summary' => 1,
          'show_author' => 0,
          'show_date' => 1 
     ));
     echo "</div>";
}

/*-----------------------------------------------------------------------------------*/
/*	Check for a valid timestamp
/*-----------------------------------------------------------------------------------*/

function max_is_valid_timestamp($timestamp)
{
    return ((string) (int) $timestamp === $timestamp) 
        && ($timestamp <= PHP_INT_MAX)
        && ($timestamp >= ~PHP_INT_MAX);
}

?>
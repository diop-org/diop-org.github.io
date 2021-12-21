<?php
/**
 * Shortcodes for theme
 *
 * @since maxFrame 1.0
 */

/*-----------------------------------------------------------------------------------*/
/*	Typography Shortcodes
/*-----------------------------------------------------------------------------------*/

//*** Page caption Shortcode ***/
function page_caption_shortcode($atts, $content) {
   extract( shortcode_atts( array(
	), $atts ) );	
	return '<div class="page-caption cufon">'.do_shortcode($content).'</div>';
	}
add_shortcode('page_caption', 'page_caption_shortcode');

//*** Horizontal divider line Shortcode ***/
function horizontal_line_shortcode($atts, $content) {
	extract(shortcode_atts(array(
		'noshade' => 'true',
		'border' => '0'
	), $atts ) );	
	
	$noshade = esc_attr($noshade) == "true" ? 'noshade="noshade"' : "";
	
	return '<hr '. $noshade .' class="shortcode" />';
	}
add_shortcode('hr', 'horizontal_line_shortcode');

//*** Lists Shortcode ***/
function list_shortcode($atts, $content) {
	extract(shortcode_atts(array(
		'type' => '',
	), $atts));		
	return '<ul class="'.esc_attr($type).'">'.do_shortcode($content).'</ul>';
	}
add_shortcode('list', 'list_shortcode');

//*** Highlight Shortcode ***/
function highlight_shortcode($atts, $content) {
	extract(shortcode_atts(array(
		'type' => 'dark',
	), $atts));		
	return '<span class="highlight-'.esc_attr($type).'">'.do_shortcode($content).'</span>';
	}
add_shortcode('highlight', 'highlight_shortcode');

//*** Blockquote Shortcodes ***/
function blockquote_shortcode($atts, $content) {
   extract( shortcode_atts( array(
	), $atts ) );	
	return '<blockquote>'.do_shortcode($content).'</blockquote>';
	}
add_shortcode('blockquote', 'blockquote_shortcode');

//*** Arrowed list Shortcodes ***/
function list_with_arrows($atts, $content) {
	return '<ul class="arrows">'.html_entity_decode(strip_tags($content,'<li><a>')).'</ul>';
}
add_shortcode('list_arrow', 'list_with_arrows');

//*** Dropcap ***/
function dropcap_shortcode($atts, $content) {
	extract(shortcode_atts(array(
		'type' => ''
	), $atts));	
	
	$fc = substr($content, 0, 1);
	$length = strlen($content);
	$rest = substr($content, 1, $length);

	$add_class = "";

	if(esc_attr($type) != ""){
		$add_class = " dropcap-".esc_attr($type);
	}

	$html = '<span class="dropcap'.$add_class.'">'.$fc.'</span>';
	$html.= do_shortcode($rest);
	
	return $html;
}
add_shortcode('dropcap', 'dropcap_shortcode');

//*** Tipsy ToolTip Shortcode ***/
function tipsy_tooltip_shortcode($atts, $content) {
	extract(shortcode_atts(array(
		'url' => '',
		'title' => ''							 
	), $atts));	
	return '<a href="'.esc_attr($url).'" class="tooltip" title="'.esc_attr($title).'">'.html_entity_decode(strip_tags($content)).'</a>';
}
add_shortcode('tooltip', 'tipsy_tooltip_shortcode');

/*-----------------------------------------------------------------------------------*/
/*	Box Shortcodes
/*-----------------------------------------------------------------------------------*/

//*** Box with headline ***/
function box_with_headline_shortcode($atts, $content) {
	extract(shortcode_atts(array(
		'type' => '',
		'title' => ''
	), $atts));

	if(esc_attr($type) != ""){
		$type = " info-".esc_attr($type);
	}

	if(esc_attr($title) != ""){
		$has_title = true;
	}else{
		$has_title = false;
	}		

	$output  = "";
	$output .= '<div class="info-box' .$type. '">';
	$output .= $has_title === true ? '<div class="box-title">'.esc_attr($title).'</div>' : "";
	$output .= '<div class="box-content"><p>' . html_entity_decode(do_shortcode($content)) . '</p>';
	$output .= '</div>';
	$output .= '</div>';
	
	return $output;
}
add_shortcode('box_info', 'box_with_headline_shortcode');

//*** Toggle box ***/
function toggle_box_shortcode($atts, $content) {
	extract(shortcode_atts(array(
		'type' => '',
		'title' => 'Your Title'
	), $atts));

	if(esc_attr($type) != ""){
		$type = " toggle-".esc_attr($type);
	}

	$output  = "";
	$output .= '<div class="toggle-box' .$type. '">';
	$output .= '<div class="box-title"><a href="#">'.esc_attr($title).'</a></div>';
	$output .= '<div class="box-content"><div class="box-inner"><p>' . html_entity_decode(do_shortcode($content)) . '</div></p>';
	$output .= '</div>';
	$output .= '</div>';

	return $output;
}
add_shortcode('toggle_box', 'toggle_box_shortcode');

//*** Tabs ***/
function tabs_shortcode($atts, $content) {
	global $mytab_cnt_1, $mytab_cnt_2;
	
	extract(shortcode_atts(array(
    ), $atts));
	
	$mytab_cnt_1++;
	$mytab_cnt_2++;
	$cnt = 1;
	
	$output = "";

	$output .= '<div class="clearfix"><div class="tabs"><div class="tab-wrapper">';
	$output .= '<ul class="nav">';	
	
	foreach ($atts as $tab) {
		$output .= '<li><a title="' .$tab. '" href="#tab-' . $mytab_cnt_1 . '">' .$tab. '</a></li>';
		$mytab_cnt_1++;
		$cnt++;
	}
	$output .= '</ul>';

	$output .= do_shortcode($content);
	$output .= '</div></div></div>';
	
	return $output;
}
add_shortcode('tabs', 'tabs_shortcode');

//*** Tabpane ***/
function tab_panes_shortcode( $atts, $content = null ) {
	global $mytab_cnt_2;

	extract(shortcode_atts(array(
    ), $atts));
	
	$output = "";
	$output .= '<div class="tab" id="tab-' . $mytab_cnt_2 . '"><div class="inner">' . do_shortcode($content) .'</div></div>';
	$mytab_cnt_2++;
	
	return $output;
}
add_shortcode('tab_pane', 'tab_panes_shortcode');


/*-----------------------------------------------------------------------------------*/
/*	Media Shortcodes
/*-----------------------------------------------------------------------------------*/

//*** Image Float Shortcode ***/
function image_float_shortcode($atts, $content) {
	extract(shortcode_atts(array(
		'url' => '',
		'width' => '160',
		'height' => '120',
		'type' => 'left',
		'title' => ''
	), $atts));	
		
	$html  = '<div class="image-'.$type.'">';
	$html .= '<a class="pretty_image" lnk="'.esc_attr($url).'" href="'.esc_attr($url).'" rel="prettyPhoto" title="'.$content.'"><img src="'.get_template_directory_uri().'/timthumb.php?src='.esc_attr($url).'&amp;w='.esc_attr($width).'&amp;h='.esc_attr($height).'&amp;zc=1&amp;q=100" width="'.esc_attr($width).'" height="'.esc_attr($height).'" alt="'.esc_attr($title).'" class="fade-image" title="'.$content.'" /></a>';
	$html .= '<span class="caption">'.$content.'</span>';
	$html .= '</div>';	
	return $html;
}
add_shortcode('image_float', 'image_float_shortcode');

//*** PrettyPhoto Gallery ***/
function pretty_gallery_shortcode($atts, $content = null) {
   extract( shortcode_atts( array(
      'class' => 'pretty-gallery',
      ), $atts ) );
   return '<div class="clearfix '.esc_attr($class).'">'.$content.'</div>';
}
add_shortcode( 'pretty_gallery', 'pretty_gallery_shortcode' );

//*** Single Pretty Image ***/
function pretty_image_shortcode($atts, $content = null) {
	extract(shortcode_atts( 
		array ('url' => '', 
			   'width' => '', 
			   'height' => '', 
			   'title' => '',
			   'src' => '')
		, $atts));
	if(esc_attr($url)!=''){
		return '<p><a class="pretty_image" lnk="'.esc_attr($url).'" href="'.esc_attr($url).'" title="'.esc_attr($title).'"><img src="'.get_template_directory_uri().'/timthumb.php?src='.esc_attr($src).'&amp;w='.esc_attr($width).'&amp;h='.esc_attr($height).'&amp;zc=1&amp;q=100" width="'.esc_attr($width).'" height="'.esc_attr($height).'" alt="'.esc_attr($title).'" class="fade-image" /></a></p>';		
	}else{
		return '<p><a class="pretty_image" lnk="'.esc_attr($src).'" href="'.esc_attr($src).'" rel="prettyPhoto" title="'.esc_attr($title).'"><img src="'.get_template_directory_uri().'/timthumb.php?src='.esc_attr($src).'&amp;w='.esc_attr($width).'&amp;h='.esc_attr($height).'&amp;zc=1&amp;q=100" width="'.esc_attr($width).'" height="'.esc_attr($height).'" alt="'.esc_attr($title).'" class="fade-image" /></a></p>';
	}
}
add_shortcode('pretty_image', 'pretty_image_shortcode');

//*** Image with caption  ***/
function max_caption_image($atts, $content = null) {
	extract(shortcode_atts( 
		array ('url' => '', 
			   'width' => '', 
			   'height' => '', 
			   'caption' => '',
			   'title' => '')
		, $atts));
	
	return '<div class="img-caption">
				<img src="'.get_template_directory_uri().'/timthumb.php?src='.esc_attr($url).'&amp;w='.esc_attr($width).'&amp;h='.esc_attr($height).'&amp;zc=1&amp;q=100" width="'.esc_attr($width).'" height="'.esc_attr($height).'" alt="'.esc_attr($title).'" class="fade-image" />
				<span class="caption">'.do_shortcode($content).'</span>
			</div><div class="clearfix"></div>';
}
add_shortcode('caption_image', 'max_caption_image');


//*** Youtube shortcode ***/
function youtube_shortcode( $atts ) { 
	
	extract( shortcode_atts( array(
		'id' => '',
		'width' => '',
		'height' => '',
		'wmode' => 'transparent'
	), $atts ) );
	
	global $wp_embed; 
    
	if ( empty($atts['id']) )
	return ''; 
	
	$url = 'http://youtu.be/watch?v=' . $atts['id'] . '&wmode=transparent';
	
	//return $wp_embed->shortcode( $atts, $url );
	
	return '<iframe width="' . esc_attr($width). '" height="' . esc_attr($height). '" src="http://www.youtube-nocookie.com/embed/'. $atts['id'] .'?wmode=transparent" frameborder="0" allowfullscreen></iframe>';
   
}
add_shortcode( 'youtube', 'youtube_shortcode' );

//*** Vimeo shortcode ***/
function vimeo_shortcode( $atts ) { 
   extract( shortcode_atts( array(
      'id' => '',
      'width' => '',
      'height' => '',
      ), $atts ) );
    return '<iframe src="http://player.vimeo.com/video/' . esc_attr($id). '?title=0&amp;byline=0&amp;portrait=0" width="' . esc_attr($width). '" height="' . esc_attr($height). '"></iframe>';
}
add_shortcode( 'vimeo', 'vimeo_shortcode' );

//*** show recent posts ***/
function recent_posts_shortcode($atts){
	extract(shortcode_atts(array(
		'limit' => 4, 
		'type' => 'gallery',
		'width' => 125,
		'height' => 90,
		'img' => 'false'
		), $atts));
 
 	global $imgDimensions, $post;
	
	$imgDimensions = array( 'width' => $width, 'height' => $height );
 
	wp_reset_query();
 
	$q = new WP_Query('posts_per_page=' . esc_attr($limit) .'&post_type='.esc_attr($type));

	$type = esc_attr($img)=='false' ? "square" : "";
	$float = esc_attr($img)=='false' ? "recent-no-float" : "";
	
	$list  = '<div id="recent-posts" class="'. $float .'"><h3 class="recent-title">' . __( 'Recent Posts', MAX_SHORTNAME ) . '</h3> <ul class="clearfix '.$type.'">';
	 	
	while($q->have_posts()) : $q->the_post();	
		if(esc_attr($img)=='true'){
					
			$list .= '<li><div class="entry-image">';
						
			// get the gallery item 
			$list .= '<a href="'. get_permalink($post->ID) . '" title="'.get_the_title().'"><img src="'.get_template_directory_uri().'/timthumb.php?src='.max_get_image_path($post->ID, "full").'&amp;w='.esc_attr($width).'&amp;h='.esc_attr($height).'&amp;zc=1&amp;q=100" width="'.esc_attr($width).'" height="'.esc_attr($height).'" alt="'.get_the_title().'" class="fade-image" /></a>';
		
			$list .= '</div></li>';

			}else{
			
			$list .= 
			'<li>
				<a href="' . get_permalink() . '" title="'. get_the_title() . '">'. get_the_title(). '</a>
				&nbsp;-&nbsp;<span class="entry-meta">' . get_the_date() . '</span>
			</li>';
		}
	endwhile;
 
	wp_reset_query();
 
	return $list . '</ul></div>';
}
add_shortcode('recent_posts', 'recent_posts_shortcode');

//*** show related posts ***/
function related_posts_shortcode( $atts ) {
	
	extract(shortcode_atts(array(
	    'limit' => '4',
		'width' => 144,
		'height' => 100,
		'taxonomy' => GALLERY_TAXONOMY
	), $atts));

	global $wpdb, $post, $table_prefix, $imgDimensions;

	$imgDimensions = array( 'width' => $width, 'height' => $height );	

	if ($post->ID) {
 		// Get tags
		$tags = wp_get_post_tags( $post->ID );
		$tagsarray = array();
		foreach ($tags as $tag) {
			$tagsarray[] = $tag->term_id;
		}
		$tagslist = implode(',', $tagsarray);
		
		// Do the query
		$q = "SELECT p.*, count(tr.object_id) as count
			FROM $wpdb->term_taxonomy AS tt, $wpdb->term_relationships AS tr, $wpdb->posts AS p WHERE tt.taxonomy ='post_tag' AND tt.term_taxonomy_id = tr.term_taxonomy_id AND tr.object_id  = p.ID AND tt.term_id IN ($tagslist) AND p.ID != $post->ID
				AND p.post_status = 'publish'
				AND p.post_date_gmt < NOW()
 			GROUP BY tr.object_id
			ORDER BY count DESC, p.post_date_gmt DESC
			LIMIT $limit;";

		$related = $wpdb->get_results($q);
		
 		if ( $related ) {
			$list = '<div id="related-posts" class="entry-related-images portfolio-four-columns"><h3 class="related-title">' . __( 'Related Posts', MAX_SHORTNAME ) . '</h3> <ul class="clearfix portfolio-list">';
			foreach($related as $r) {
				if ( has_post_thumbnail( $r->ID ) ) {
					$_imgUrl = max_get_image_path($r->ID, "thumbnail");

					$hover_class = "";
					if( get_option_max('image_show_fade') != "true") { 
						$hover_class = ' no-hover';
					}					
					
					$list .= '<li class="item '. max_get_post_lightbox_class() . $hover_class .'"><div class="shadow">';
					
					// get the gallery item 
					$list .= '<a href="'.get_permalink($r->ID).'" title="'.$r->post_title.'"><img src="' . get_template_directory_uri(). '/timthumb.php?src=' . $_imgUrl.'&amp;w=' . esc_attr($width) .'&amp;h=' . esc_attr($height) .'" alt="'.$r->post_title.'" /></a></div>';

					// check if caption option is selected 
					if ( get_option_max( 'image_show_caption' ) == 'true' ) {				
						$list .= '<div class="item-caption"><strong>' . wptexturize($r->post_title) . '</strong></div>';
					}
					$list .= '</li>';
				}else{
					continue;
				}
			}
			$list .= '</ul></div>';
		} else {
			$list = "";
		}
		
		return $list;
	}
	return;
}
add_shortcode('related_posts', 'related_posts_shortcode');


//*** Author Box Shortcode ***/
function max_author_box() { 	

	$author_name = get_the_author();
	$site_link = get_the_author_meta('user_url');
	$author_desc = get_the_author_meta('description');
	$facebook_link = get_the_author_meta('aim');
	$twitter_link = get_the_author_meta('yim');

	$return_text = '<div id="author-info" class="clearfix">
						<h3 class="author-title">'. __('About the author', MAX_SHORTNAME) . '</h3>
						<div class="author-holder">
							<div class="author-image">
								<a href="'.$site_link.'">' . get_avatar( get_the_author_meta('email'), '80' ) . '</a>
							</div>
							<div class="author-bio">
								<p>'.$author_desc.'</p>
							</div>
						</div>
					</div>';

	return $return_text;

}
add_shortcode('authorbox', 'max_author_box');

// Google Maps shortcode
function googlemap_shortcode( $atts ) {
    extract(shortcode_atts(array(
        'width' => '500px',
        'height' => '300px',
        'apikey' => get_option("general_google_map_api"),
        'marker' => '',
        'center' => '',
        'zoom' => '13'
    ), $atts));
 
    if ($center) $setCenter = 'map.setCenter(new GLatLng('.$center.'), '.$zoom.');';
    if ($marker) $setMarker = 'map.addOverlay(new GMarker(new GLatLng('.$marker.')));';
 
    $rand = rand(1,100) * rand(1,100);
 
    return '
		<div id="map_canvas_'.$rand.'" class="google_maps_canvas"></div>
		<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key='.$apikey.'" type="text/javascript"></script>
 		
	    <script type="text/javascript">
		    function initialize() {
		      if (GBrowserIsCompatible()) {
		        var map = new GMap2(document.getElementById("map_canvas_'.$rand.'"));
		        '.$setCenter.'
		        '.$setMarker.'
		        map.setUIToDefault();
		      }
		    }
		    initialize();
	    </script>
    ';
 
}
add_shortcode('googlemap', 'googlemap_shortcode');


/*-----------------------------------------------------------------------------------*/
/*	Widget Shortcode
/*-----------------------------------------------------------------------------------*/

function widget_shortcode($atts) {
    
    global $wp_widget_factory;
    
    extract(shortcode_atts(array(
        'widget_name' => FALSE
    ), $atts));
    
    $widget_name = esc_html($widget_name);
    
    if (!is_a($wp_widget_factory->widgets[$widget_name], 'WP_Widget')):
        $wp_class = 'WP_Widget_'.ucwords(strtolower($class));
        
        if (!is_a($wp_widget_factory->widgets[$wp_class], 'WP_Widget')):
            return '<p>'.sprintf(__("%s: Widget class not found. Make sure this widget exists and the class name is correct", MAX_SHORTNAME),'<strong>'.$class.'</strong>').'</p>';
        else:
            $class = $wp_class;
        endif;
    endif;
    
    ob_start();
	
    the_widget($widget_name, $instance, array('widget_id'=>'arbitrary-instance-'.$id,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => ''
    ));
	
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
    
}
add_shortcode('widget','widget_shortcode'); 


/*-----------------------------------------------------------------------------------*/
/*	Column Shortcodes
/*-----------------------------------------------------------------------------------*/

/** Two columns **/
function max_two_col($atts, $content = null) {
	return '<div class="col_2">'.do_shortcode($content).'</div>';
}
function max_two_col_last( $atts, $content = null) {
	return '<div class="col_2 col_last">'.do_shortcode($content).'</div><div class="clearfix"> </div>';
}
add_shortcode('two_col', 'max_two_col');
add_shortcode('two_col_last', 'max_two_col_last');

/** Three columns **/
function max_three_col($atts, $content = null) {
	return '<div class="col_3">'.do_shortcode($content).'</div>';
}
function max_three_col_last( $atts, $content = null) {
	return '<div class="col_3 col_last">'.do_shortcode($content).'</div><div class="clearfix"></div>';
}
add_shortcode('three_col', 'max_three_col');
add_shortcode('three_col_last', 'max_three_col_last');

/** Four columns **/
function max_four_col($atts, $content = null) {
	return '<div class="col_4">'.do_shortcode($content).'</div>';
}
function max_four_col_last( $atts, $content = null) {
	return '<div class="col_4 col_last">'.do_shortcode($content).'</div><div class="clearfix"></div>';
}
add_shortcode('four_col', 'max_four_col');
add_shortcode('four_col_last', 'max_four_col_last');

/** 2/3 columns **/
function max_one_third_col($atts, $content = null) {
	return '<div class="col_one_third">'.do_shortcode($content).'</div>';
}
function max_two_third_col($atts, $content = null) {
	return '<div class="col_two_third">'.do_shortcode($content).'</div>';
}
function max_one_third_col_last( $atts, $content = null) {
	return '<div class="col_one_third col_one_third_last">'.do_shortcode($content).'</div><div class="clearfix"></div>';
}
function max_two_third_col_last( $atts, $content = null) {
	return '<div class="col_two_third col_two_third_last">'.do_shortcode($content).'</div><div class="clearfix"></div>';
}
add_shortcode('one_third', 'max_one_third_col');
add_shortcode('two_third', 'max_two_third_col');
add_shortcode('one_third_last', 'max_one_third_col_last');
add_shortcode('two_third_last', 'max_two_third_col_last');

?>
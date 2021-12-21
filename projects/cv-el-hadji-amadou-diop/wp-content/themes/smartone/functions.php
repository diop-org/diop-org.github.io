<?php 
add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' ); 
add_action( 'wp_dashboard_setup', 'addDashboardWidgets', 9 );

$_feed_url = 'http://feeds.feedburner.com/Xavisys';


function theme_options_init() {
	register_setting( 'smartone_options', 'smartone', 'theme_options_validate' );
  wp_register_style('mycss', WP_CONTENT_URL . '/themes/smartone/css/theme-options.css');
}

 function smartone_styles() {
       wp_enqueue_style('mycss');
   }

$themename = "SmartOne";
$template_url = get_template_directory_uri();

/* Redirect after activation */

if ( is_admin() && isset($_GET['activated'] ) && $pagenow ==	"themes.php" )
	wp_redirect( 'themes.php?page=theme_options' );


/**
 * Load up the menu page
 */
 
function theme_options_add_page() {
global $themename, $shortname, $options;
  $page = add_theme_page($themename." Settings", "".$themename." Settings", 'edit_theme_options', 'theme_options', 'theme_options_do_page');  
    add_action('admin_print_styles-' . $page, 'smartone_styles'); 

}

$select_scheme = array(
	'0' => array(
		'value' =>	'silver',
		'label' => __( 'Silver &nbsp;&nbsp;&nbsp;(default)' )
	),
	'1' => array(
		'value' =>	'grey',
		'label' => __( 'Grey' )
	),
	'2' => array(
		'value' =>	'black',
		'label' => __( 'Black' )
	),
	'3' => array(
		'value' =>	'purple',
		'label' => __( 'Purple' )
	),
	'4' => array(
		'value' =>	'orange',
		'label' => __( 'Orange' )
	),
	'5' => array(
		'value' =>	'red',
		'label' => __( 'Red' )
	),
	'6' => array(
		'value' =>	'green',
		'label' => __( 'Green' )
	),
	'7' => array(
		'value' =>	'blue',
		'label' => __( 'Blue' )
	),
	'8' => array(
		'value' =>	'gothic',
		'label' => __( 'Gothic' )
	)  
                     
); 

$select_sidebar = array(
	'0' => array(
		'value' =>	'right',
		'label' => __( 'Right &nbsp;&nbsp;&nbsp;(default)' )
	),
	'1' => array(
		'value' =>	'left',
		'label' => __( 'Left' )
	),
	'2' => array(
		'value' =>	'disable',
		'label' => __( 'Disable' )
	)                 
); 

$select_content_font = array(
	'0' => array(
		'value' =>	'georgia',
		'label' => __( 'Georgia &nbsp;&nbsp;&nbsp;(default)' )
	),
	'1' => array(
		'value' =>	'segoe',
		'label' => __( 'Segoe UI' )
	),
	'2' => array(
		'value' =>	'arial',
		'label' => __( 'Arial' )
	),
	'3' => array(
		'value' =>	'courier',
		'label' => __( 'Courier New' )
	),
	'4' => array(
		'value' =>	'comic',
		'label' => __( 'Comic Sans' )
	)
);



$shortname = "smt";

$optionlist = array (

// Design


array( "type" => "open"),


array(  "name" => "Menu/Links Color Scheme",
        "desc" => "",
        "id" => $shortname."_color_scheme",
        "type" => "select1",
        "std" => "false"
),   


array(  "name" => "Sidebar position",
        "desc" => "",
        "id" => $shortname."_pos_sidebar",
        "type" => "select3",
        "std" => "false"
),

// Subscribe buttons

  
// RSS Feed
  


array(  "name" => "RSS Feed",
        "desc" => "Insert custom RSS Feed URL, e.g. <strong>http://feeds.feedburner.com/Example</strong>",
        "id" => $shortname."_rss_feed",
        "type" => "text",
        "std" => ""),  



// Newsletter



array(  "name" => "Newsletter",
        "desc" => "Insert custom newsletter URL, e.g. <strong>http://feedburner.google.com/fb/a/mailverify?uri=Example&amp;loc=en_US</strong>",
        "id" => $shortname."_newsletter",
        "type" => "text",
        "std" => ""),  



// Facebook



array(  "name" => "Facebook",
        "desc" => "Insert your Facebook ID",
        "id" => $shortname."_facebook",
        "type" => "text",
        "std" => ""),  



// Twitter
 

array(  "name" => "Twitter",
        "desc" => "Insert your Twitter ID",
        "id" => $shortname."_twitter_id",
        "type" => "text",
        "std" => ""),  



// Styles

      
array(  "name" => "Content font",
        "desc" => "Examples: <span style='font-style:normal;font-size:23px;font-weight:bold;letter-spacing:-1px;'><span style='font-family:georgia;'>Georgia</span> <span style='font-family:Segoe UI,Calibri,Myriad Pro,Myriad,Trebuchet MS,Helvetica,Arial,sans-serif;'>Segoe UI</span> <span style='font-family:arial;'>Arial</span>
         <span style='font-family:courier new;'>Courier New</span> <span style='font-family:Comic Sans MS;'>Comic Sans</span>
        </span>",
        "id" => $shortname."_content_font",
        "type" => "select2",
        "std" => "false"),        

array(  "name" => "Custom CSS",
        "desc" => '<strong>For advanced users only</strong>: insert custom CSS, default <a href="'.$template_url.'/style.css" target="_blank">style.css</a> file',
        "id" => $shortname."_css_content",
        "type" => "textarea",
        "std" => "false"),

array( "type" => "close"),

);  

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $themename, $shortname, $optionlist, $select_scheme, $select_content_font, $select_sidebar; 
	if ( ! isset( $_REQUEST['updated'] ) ) {
		$_REQUEST['updated'] = false; 
} 
if( isset( $_REQUEST['reset'] )) { 
            global $wpdb;
            $query = "DELETE FROM $wpdb->options WHERE option_name LIKE 'smartone'";
            $wpdb->query($query);
            header("Location: themes.php?page=theme_options");
            die;
     } 
   
?>
 



	<div class="wrap">
  
 
  
<?php if ( function_exists('screen_icon') ) screen_icon(); ?>

      
<h2><?php echo $themename; ?> Settings</h2><br />


 <div style="margin-bottom:15px;padding:0 20px;clear:both;float:right;background:#FBFBFB;border:2px solid #ccc;-moz-border-radius:4px;-moz-box-shadow:0 1px 8px #bbb;">
  
   <?php $theme_data = get_theme_data(get_bloginfo( 'stylesheet_url' ));?>  
    
   <div style="float:right;font-weight:bold;position:relative;top:20px;">Developed by <?php echo $theme_data['Author']; ?></div>
    
    
    <h2 style="font-size:18px;float:left;">Thanks for using SmartOne</h2>
   
   <div style="position:relative;top:14px;float:left;"> 
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="TLNDBMZW7H89Y">
<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form> 
</div>

     <p style="clear:both;">Do you enjoy this theme? <a rel="bookmark" href="http://theme4press.com/smartone">Send your ideas - issues - wishes</a> or help in development by a donation. Thank you!</p>
    <p style="font-size:10px;">Version <?php echo $theme_data['Version']; ?> </p> 
    
    </div>  

		<?php if ( false !== $_REQUEST['updated'] ) { ?>
		<?php echo '<div id="message" class="updated fade" style="float:left;"><p><strong>'.$themename.' settings saved</strong></p></div>'; ?>
    
    <?php } if( isset( $_REQUEST['reset'] )) { echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset</strong></p></div>'; } ?>  


 

  <form method="post" action="options.php" enctype="multipart/form-data">
  
    <p class="submit" style="clear:left;">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Settings' ); ?>" />   
			</p>  
      
    <?php available_update(); ?>
    
      

 
    
    <div id="setContainer">




		
			<?php settings_fields( 'smartone_options' ); ?>
			<?php $options = get_option( 'smartone' ); ?>

			<table class="form-table">   

      <?php foreach ($optionlist as $value) {
switch ( $value['type'] ) {
 
case "open":
?>

<table width="100%" border="0" style="padding:10px;">

 
<?php break;
 
case "close":
?>


</table><br />

 
<?php break;
 
case 'text':
?>


 
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%"><input style="width:300px;" name="<?php echo 'smartone['.$value['id'].']'; ?>" id="<?php echo 'smartone['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo $options[$value['id']] ; } else { echo $value['std'] ; } ?>" /></td>

                                                                                                                                                                                       

</tr>
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
   





<?php
break;
 
case 'textarea':
?>
 
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%"><textarea id="<?php echo 'smartone['.$value['id'].']'; ?>" name="<?php echo 'smartone['.$value['id'].']'; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo stripslashes( $options[$value['id']] ); ?></textarea></td>
 
</tr>
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;
 
case 'select1':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'smartone['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_scheme as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								}
								echo $p . $r;
							?>
</select></td>
</tr> 
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
     


<?php
break;
 
case 'select2':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'smartone['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_content_font as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								}
								echo $p . $r;
							?>
</select></td>
</tr> 
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
 
 
<?php
break;
 
case 'select3':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'smartone['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_sidebar as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								}
								echo $p . $r;
							?>
</select></td>
</tr> 
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
  
              
                    
<?php
break;
 
case "checkbox":
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%">
<input type="checkbox" name="<?php echo 'smartone['.$value['id'].']'; ?>" id="<?php echo 'smartone['.$value['id'].']'; ?>" value="1" <?php checked( '1', $options[$value['id']] ); ?>/>
</td>
</tr>



 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


 
<?php break;
 
}
}
?>



      
    
    
      </div>  
  
      

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Settings' ); ?>" />   
			</p>
		</form>
    
    <form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
&nbsp;&nbsp;&nbsp;<small>Be carefull, all options will be removed!</small>
</p>
</form> 


	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $select_scheme;
	return $input;
}

if ( ! isset( $content_width ) )
	$content_width = 610;


add_action( 'after_setup_theme', 'smartone_setup' );

if ( ! function_exists( 'smartone_setup' ) ):


function smartone_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );


	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'smartone' ),
	) );

	// This theme allows users to set a custom background
	add_custom_background();

	// Your changeable header business starts here
	define( 'HEADER_TEXTCOLOR', '' );
	// No CSS, just IMG call. The %s is a placeholder for the theme template directory URI.
	define( 'HEADER_IMAGE', '%s/images/headers/silver-stripes.jpg' );

	// The height and width of your custom header. You can hook into the theme's own filters to change these values.
	// Add a filter to smartone_header_image_width and smartone_header_image_height to change these values.
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'smartone_header_image_width', 940 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'smartone_header_image_height', 198 ) );

	// We'll be using post thumbnails for custom header images on posts and pages.
	// We want them to be 940 pixels wide by 198 pixels tall.
	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

	// Don't support text inside the header image.
	define( 'NO_HEADER_TEXT', true );

	// Add a way for the custom header to be styled in the admin panel that controls
	// custom headers. See smartone_admin_header_style(), below.
	add_custom_image_header( '', 'smartone_admin_header_style' );

	// ... and thus ends the changeable header business.

	// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
	register_default_headers( array(
		'grassland' => array(
			'url' => '%s/images/headers/grassland.jpg',
			'thumbnail_url' => '%s/images/headers/grassland-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Grassland', 'smartone' )
		),
		'clouds' => array(
			'url' => '%s/images/headers/clouds.jpg',
			'thumbnail_url' => '%s/images/headers/clouds-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Clouds', 'smartone' )
		),
		'city' => array(
			'url' => '%s/images/headers/night-city.jpg',
			'thumbnail_url' => '%s/images/headers/night-city-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Night City', 'smartone' )
		),
		'squares' => array(
			'url' => '%s/images/headers/blue-squares.jpg',
			'thumbnail_url' => '%s/images/headers/blue-squares-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Blue Squares', 'smartone' )
		),
		'flowers' => array(
			'url' => '%s/images/headers/green-flowers.jpg',
			'thumbnail_url' => '%s/images/headers/green-flowers-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Green Flowers', 'smartone' )
		),
		'circles' => array(
			'url' => '%s/images/headers/orange-circles.jpg',
			'thumbnail_url' => '%s/images/headers/orange-circles-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Orange Circles', 'smartone' )
		),
		'ink' => array(
			'url' => '%s/images/headers/red-ink.jpg',
			'thumbnail_url' => '%s/images/headers/red-ink-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Red Ink', 'smartone' )
		),
		'sunset' => array(
			'url' => '%s/images/headers/sunset.jpg',
			'thumbnail_url' => '%s/images/headers/sunset-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Sunset', 'smartone' )
		),
		'stripes' => array(
			'url' => '%s/images/headers/silver-stripes.jpg',
			'thumbnail_url' => '%s/images/headers/silver-stripes-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Silver Stripes', 'smartone' )
		),
		'dots' => array(
			'url' => '%s/images/headers/brown-dots.jpg',
			'thumbnail_url' => '%s/images/headers/brown-dots-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Brown Dots', 'smartone' )
		),
		'waves' => array(
			'url' => '%s/images/headers/black-waves.jpg',
			'thumbnail_url' => '%s/images/headers/black-waves-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Black Waves', 'smartone' )
		),
		'bubbles' => array(
			'url' => '%s/images/headers/purple-bubbles.jpg',
			'thumbnail_url' => '%s/images/headers/purple-bubbles-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Purple Bubbles', 'smartone' )
		)                     
	) );
}
endif;

if ( ! function_exists( 'smartone_admin_header_style' ) ) :

function smartone_admin_header_style() {
?>
<style type="text/css">
/* Shows the same border as on front end */
#headimg {
	border-bottom: 1px solid #000;
	border-top: 4px solid #000;
}
/* If NO_HEADER_TEXT is false, you would style the text with these selectors:
	#headimg #name { }
	#headimg #desc { }
*/
</style>
<?php
}
endif;


function smartone_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'smartone_page_menu_args' );


function smartone_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'smartone_excerpt_length' );


function smartone_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'smartone' ) . '</a>';
}


function smartone_auto_excerpt_more( $more ) {
	return ' &hellip;' . smartone_continue_reading_link();
}
add_filter( 'excerpt_more', 'smartone_auto_excerpt_more' );


function smartone_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= smartone_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'smartone_custom_excerpt_more' );


function smartone_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'smartone_remove_gallery_css' );

if ( ! function_exists( 'smartone_comment' ) ) :


function smartone_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s', 'smartone' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php _e( 'Your comment is awaiting moderation.', 'smartone' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'smartone' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( 'Edit', 'smartone' ), ' ' );
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
		<p><?php _e( 'Pingback:', 'smartone' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'smartone'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;


function smartone_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Primary Widget Area', 'smartone' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'smartone' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'Secondary Widget Area', 'smartone' ),
		'id' => 'secondary-widget-area',
		'description' => __( 'The secondary widget area', 'smartone' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 3, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'smartone' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'smartone' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 4, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'smartone' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'smartone' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 5, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'smartone' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', 'smartone' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 6, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Fourth Footer Widget Area', 'smartone' ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'The fourth footer widget area', 'smartone' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}

function available_update() {
  static $themes_update;
  $theme = get_theme("smartone");
  if (!isset($themes_update)) $themes_update = get_transient('update_themes');

  if (is_object($theme) && isset($theme->stylesheet)) $stylesheet = $theme->stylesheet;
  elseif (is_array($theme) && isset($theme['Stylesheet'])) $stylesheet = $theme['Stylesheet'];
  else return;

  if (isset($themes_update->response[$stylesheet])):
    $update = $themes_update->response[$stylesheet];
    $theme_name = is_object($theme) ? $theme->name : (is_array($theme) ? $theme['Name'] : '');
    $details_url = add_query_arg(array('TB_iframe' => 'true', 'width' => 1024, 'height' => 800), $update['url']);
    $update_url = wp_nonce_url('update.php?action=upgrade-theme&amp;theme='.urlencode($stylesheet), 'upgrade-theme_'.$stylesheet);
    echo '<div class="updated fade below-h2" style="float:left;"><p>';
    if (!current_user_can('update_themes') || empty($update->package))
      printf(__('There is a new version of %1$s available. <a href="%2$s" class="thickbox" title="%1$s">View version %3$s Details</a>.'), $theme_name, $details_url, $update['new_version']);
    else printf(__('There is a new version of %1$s available. <a href="%2$s" class="thickbox" title="%1$s">View version %3$s Details</a> or <a href="%4$s" >upgrade automatically</a>.'), $theme_name, $details_url, $update['new_version'], $update_url);
    echo '</p></div>';
  endif;
}


/** Register sidebars by running smartone_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'smartone_widgets_init' );


add_action('wp_footer', 'smartone_credits');

function smartone_credits( ) {
	$credits = '<div id="site-info"><a href="'. home_url() .'">'. get_bloginfo( 'name' ) .'</a></div><div id="site-generator"><a href="http://theme4press.com/smartone/">SmartOne</a> theme by Theme4Press&nbsp;&nbsp;&bull;&nbsp;&nbsp;Powered by <a rel="generator" title="Semantic Personal Publishing Platform" href="http://wordpress.org">WordPress</a></div>';
	echo apply_filters( 'smartone_credits', (string) $credits );
}


function smartone_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'smartone_remove_recent_comments_style' );
                  
if ( ! function_exists( 'smartone_posted_on' ) ) :

function smartone_posted_on() {
	printf( __( '<a href="%1$s"><span class="%2$s">Posted on</span> %3$s</a> <span class="meta-sep">by</span> %4$s', 'smartone' ),
		post_permalink(),
    'meta-prep meta-prep-author',        
		sprintf( '<span class="entry-date">%3$s</span>',
      get_permalink(), 
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'smartone' ), get_the_author() ),
			get_the_author()
		)
	);
}
endif;

if ( ! function_exists( 'smartone_posted_in' ) ) :


function smartone_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'smartone' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'smartone' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'smartone' );
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;


function add_class_to_home( $homeclass ) {
	$homeclass = preg_replace( '/title="Home"/', 'title="Home" class="home"', $homeclass, 1 );
	return $homeclass;
}
add_filter('wp_page_menu','add_class_to_home');


	function addDashboardWidgets() {
			wp_add_dashboard_widget( 'dashboardb_xavisys' , 'Recent on Blogatize Network' , 'dashboardWidget' );
		}

		function dashboardWidget() {
			$args = array(
				'url'			=> 'http://feeds.feedburner.com/BlogatizeBlogNetwork',
				'items'			=> '3',
				'show_date'		=> 1,
				'show_summary'	=> 1,
			);
			echo '<div class="rss-widget">';
			echo '<a href="http://blogatize.net"><img class="alignright" src="'.get_template_directory_uri().'/images/blogatize-logo.png" /></a>';
			wp_widget_rss_output( $args );
			echo '<p style="border-top: 1px solid #CCC; padding-top: 10px; font-weight: bold;">';
			echo '<a href="http://feeds.feedburner.com/BlogatizeBlogNetwork"><img src="'.site_url().'/wp-includes/images/rss.png" alt=""/> Subscribe with RSS</a> | <a href="http://blogatize.net">Join Us with Your Blog</a>';
			echo "</p>";
			echo "</div>";
		}   
?>
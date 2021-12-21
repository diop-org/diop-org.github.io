<?php
/*
 * Set content-width varible
 */
if ( ! isset( $content_width ) ) $content_width = 720;


/*
 * Enqueue Comment Reply Script
 */
if ( is_singular() ) wp_enqueue_script( "comment-reply" );


/*
 * Add theme support for automatic feed links
 */
add_theme_support( 'automatic-feed-links' );



/*
 * Add custom menus
 */
register_nav_menu( 'top_menu', 'The top navigation menu.');



/*
 * Setup sidebar
 */
register_sidebar();



/*
 * Allows users to set a custom background
 * Users a custom background callback
 */ 
add_custom_background('wdc_custom_background');
function wdc_custom_background() {
    $background = get_background_image();
    $color = get_background_color();
    if ( ! $background && ! $color )
        return;
 
    $style = $color ? "background: #$color;" : '';
 
    if ( $background ) {
        $image = " background: url('$background');";
 
        $repeat = get_theme_mod( 'background_repeat', 'repeat' );
        if ( ! in_array( $repeat, array( 'no-repeat', 'repeat-x', 'repeat-y', 'repeat' ) ) )
            $repeat = 'repeat';
        $repeat = " background-repeat: $repeat;";
 
        $position = get_theme_mod( 'background_position_x', 'left' );
        if ( ! in_array( $position, array( 'center', 'right', 'left' ) ) )
            $position = 'left';
        $position = " background-position: top $position;";
 
        $attachment = get_theme_mod( 'background_attachment', 'scroll' );
        if ( ! in_array( $attachment, array( 'fixed', 'scroll' ) ) )
            $attachment = 'scroll';
        $attachment = " background-attachment: $attachment;";
 
        $style .= $image . $repeat . $position . $attachment;
    }
?>
<style type="text/css">
body { <?php echo trim( $style ); ?> }
</style>
<?php
}


/*
 * Include theme options. 
 */
$functions_path = TEMPLATEPATH . '/functions/';
require_once ($functions_path . 'theme-options.php');
$wiredriveSettings = new Wiredrive_Theme_Settings();



/*
 * Theme Options Page
 */
if (is_admin()) {
    add_action('admin_init', array($wiredriveSettings,'options_init' ));
    add_action('admin_menu', array($wiredriveSettings,'options_add_page'));
}



/*
 * Setup the custom header
 */ 
define( 'HEADER_TEXTCOLOR', '' );
define( 'HEADER_IMAGE', '%s/images/logo.png' );
define( 'HEADER_IMAGE_WIDTH', apply_filters( 'classic_header_image_width', 320 ) );
define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'classic_header_image_height', 150 ) );
define( 'NO_HEADER_TEXT', true );
add_custom_image_header( '', 'wdc_admin_header_style' );



/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header()
 *
 */
if ( ! function_exists( 'wdc_admin_header_style' ) ) :
function wdc_admin_header_style() {
?>
<style type="text/css">
.appearance_page_custom-header #headimg {
	background-repeat: no-repeat;
}
</style>
<?php
}
endif;

/*
 * Some custom conditional tags used for the top navgation
 */
function wdc_has_children() {
	global $post;
	$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
	return ($children) ? true : false;
}

function wdc_is_child() {
	global $post;
	return ($post->post_parent) ? true : false;
}



/*
 * Enqueue Custom Scripts
 */
function wdc_custom_scripts() {
    
    wp_register_script('wd-classic', get_template_directory_uri() . '/js/wd-classic.js');
    wp_enqueue_script('jquery');
    wp_enqueue_script('wd-classic');
    if (is_singular()) {
        wp_enqueue_script( 'comment-reply' );
    }
}    
add_action('wp_print_scripts', 'wdc_custom_scripts', 10);


/*
 * Enqueue Custom Styles
 */
function wdc_custom_css() {
    include( get_template_directory() . '/css/custom-css.php' );
}
add_action('wp_print_styles', 'wdc_custom_css', 10);



/*
 * Google Font Styles
 */
function wdc_google_font_css() {
    $settings = new Wiredrive_Theme_Settings();
    $fonts = $settings->getFonts();
    $options = $settings->getOptions();
    $font = $options['menu_font'];
    $menuFontURL = 'http://fonts.googleapis.com/css?family=' . $fonts[$font]['css']; 
    $font = $options['title_font'];
    $titleFontURL = 'http://fonts.googleapis.com/css?family=' . $fonts[$font]['css']; 
    $font = $options['body_font'];
    $bodyFontURL = 'http://fonts.googleapis.com/css?family=' . $fonts[$font]['css']; 

    wp_register_style('menu_font', $menuFontURL);
    wp_register_style('title_font', $titleFontURL);
    wp_register_style('body_font', $bodyFontURL);
    wp_enqueue_style('menu_font');
    wp_enqueue_style('title_font');
    wp_enqueue_style('body_font');
}
add_action('wp_print_styles', 'wdc_google_font_css', 10);



/*
 * Add custom metabox to the new/edit page
 */

add_action("add_meta_boxes", "wdc_add_metabox");
 
function wdc_add_metabox(){
    $settings = new Wiredrive_Theme_Settings();
    $options = $settings->getOptions();
    
    if ($options['page_titles'] == 'none') {
        // Only display the metabox if the "hide page titiles option is set on the theme options page.
        add_meta_box("wdc_page_title_options", "Page Title Options", "wdc_page_title_options", "page", "side", "low");
    }
}

function wdc_page_title_options() {
    global $post;
    $settings = new Wiredrive_Theme_Settings();
    $custom = get_post_custom($post->ID);
    
    if (isset($custom["pagetitle"][0])) {
        $pageTitle = $custom["pagetitle"][0];
    }

    ?>
    <p>
       <input type="checkbox" name="pagetitle" value="1" <?php if($pageTitle == 1) { echo 'checked="checked"';}?>> Display page title.
    </p>
    <?php
}

/*
 * Save the metabox vaule
 */
add_action('save_post', 'wdc_save_metabox');
function wdc_save_metabox(){
  global $post;
    
    if (isset($_POST['pagetitle'])) {
        update_post_meta($post->ID, "pagetitle", $_POST["pagetitle"]);
    } else {
        update_post_meta($post->ID, "pagetitle", '0');
    }
}
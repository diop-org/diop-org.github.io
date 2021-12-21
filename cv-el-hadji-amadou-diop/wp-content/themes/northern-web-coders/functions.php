<?php
/* Make theme available for translation */
/* Translations can be filed in the /languages/ directory */
load_theme_textdomain('nwc', get_template_directory() . '/languages');
	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

$content_width =400;

// Scripts
function nwc_enqueue_scripts() {  
	if (!is_admin()) {
	  wp_register_script('superfish', get_template_directory_uri() . '/js/superfish.js');
      wp_register_script('hover-Intent', get_template_directory_uri() . '/js/hoverIntent.js');
      wp_register_script('nwc-custom', get_template_directory_uri() . '/js/nwc-custom.js');
      wp_enqueue_script('jquery');  	     
	  wp_enqueue_script('superfish');   
      wp_enqueue_script('hover-Intent'); 
      wp_enqueue_script('nwc-custom'); 
	}
}

add_action('init', 'nwc_enqueue_scripts');
 
function add_ie_html5_shim () {
     echo '<!--[if lt IE 9]>' . "\n";
     echo '<script src="http://html5shim.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>' . "\n";
     echo '<![endif]-->' . "\n";
}

add_action('wp_head', 'add_ie_html5_shim');

add_theme_support('automatic-feed-links');

add_theme_support('post-thumbnails');

add_filter( 'use_default_gallery_style', '__return_false' );

add_editor_style('custom-editor-style.css');

add_custom_background();

define('HEADER_TEXTCOLOR', 'ffffff');
define('HEADER_IMAGE', '%s/images/header.jpg'); // %s is the template dir uri
define('HEADER_IMAGE_WIDTH', 950); // use width and height appropriate for your theme
define('HEADER_IMAGE_HEIGHT', 207);
define('NO_HEADER_TEXT', true );

// gets included in the site header
function header_style() {
    ?>
<style type="text/css">
header {
    background: url(<?php header_image(); ?>) no-repeat;
}
</style>
<?php
}

// gets included in the admin header
function admin_header_style() {
    ?>
<style type="text/css">
header {
    width: <?php echo HEADER_IMAGE_WIDTH; ?>%;
    height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
    background: no-repeat;
}
    </style><?php
}

add_custom_image_header('header_style', 'admin_header_style');


register_nav_menu( 'primary', 'Primary Navigation Menu' );

register_sidebar(array('name'=>'Footer-Sidebar 1',
'before_widget' => '<li>',
'after_widget' => '</li>',
'before_title' => '<h4>',
'after_title' => '</h4>',
));

register_sidebar(array('name'=>'Footer-Sidebar 2',
'before_widget' => '<li>',
'after_widget' => '</li>',
'before_title' => '<h4>',
'after_title' => '</h4>',
));

register_sidebar(array('name'=>'Footer-Sidebar 3',
'before_widget' => '<li>',
'after_widget' => '</li>',
'before_title' => '<h4>',
'after_title' => '</h4>',
));

register_sidebar(array('name'=>'Footer-Sidebar 4',
'before_widget' => '<li>',
'after_widget' => '</li>',
'before_title' => '<h4>',
'after_title' => '</h4>',
));

function the_breadcrumb() {
	echo '<a href="';
	echo home_url();
	echo '">';
	bloginfo('name');
	echo "</a> ";
	if (is_category() || is_single()) {
		echo "&raquo; ";
        the_category(', ');
		if (is_single()) {
			echo " &raquo; ";
			the_title();
		}
	} elseif (is_page()) {
		echo "&raquo; ";
   		echo the_title();
	}
};

function valid_search_form ($form) {
    return str_replace('role="search" ', '', $form);
}
add_filter('get_search_form', 'valid_search_form');

// remove junk from head
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
 
// remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist){
return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}
add_filter('the_category', 'remove_category_rel_from_category_list');

add_filter( 'img_caption_shortcode', 'cleaner_caption', 10, 3 );

function cleaner_caption( $output, $attr, $content ) {

	/* Set up the attributes for the caption <div>. */
	$attributes = ( !empty( $attr['id'] ) ? ' id="' . esc_attr( $attr['id'] ) . '"' : '' );
	$attributes .= ' class="wp-caption ' . esc_attr( $attr['align'] ) . '"';
	$attributes .= ' style="width: ' . esc_attr( $attr['width'] ) . 'px"';

	/* Open the caption <div>. */
	$output = '<span' . $attributes .'>';

	/* Allow shortcodes for the content the caption was created for. */
	$output .= do_shortcode( $content );

	/* Append the caption text. */
	$output .= '<span class="wp-caption-text">' . $attr['caption'] . '</span>';

	/* Close the caption </div>. */
	$output .= '</span>';

	/* Return the formatted, clean caption. */
	return $output;
}

function my_fields($fields) {
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

// Text des Namensfeldes ändern
$fields['author'] = '<p class="comment-form-author">' . '<label for="author">' . __( 'Name', 'nwc' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>';

// Text des E-Mail-Feldes ändern
$fields['email'] = '<p class="comment-form-email"><label for="email">' . __( 'E-Mail', 'nwc' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>';

// Text des Webseitenfeldes ändern
$fields['url'] = '<p class="comment-form-url"><label for="url">' . __( 'Website', 'nwc' ) . '</label>' .
'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>';

return $fields; }
add_filter('comment_form_default_fields','my_fields');

function nwc_comment($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
<div id="comment-<?php comment_ID(); ?>">
<div class="comment-author vcard">
<?php echo get_avatar( $comment->comment_author_email, 48 ); ?>
<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>', 'nwc'), get_comment_author_link()) ?>
</div>
<?php if ($comment->comment_approved == '0') : ?>
<em><?php _e('Your comment is awaiting moderation.', 'nwc') ?></em>
<br />
<?php endif; ?>
<div class="comment-meta commentmetadata">
<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s', 'nwc'), get_comment_date(),  get_comment_time()) ?></a>
<?php edit_comment_link(__('(Edit)', 'nwc'),'  ','') ?></div>
<div style="clear: both;"><?php comment_text() ?></div>
<div class="reply">
<?php $depth = array('depth' => $depth, 'max_depth' => $args['max_depth']); ?>
<?php $args['reply_text'] = __('Reply', 'nwc'); ?>
<?php comment_reply_link(array_merge($args, $depth)); ?>
</div><!-- .reply -->
</div>
<?php } ?>
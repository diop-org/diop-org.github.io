<?php	
	add_theme_support('automatic-feed-links');
	if ( ! isset( $content_width ) )
	$content_width = 560;

//Post Thumbnail	
if(function_exists('add_theme_support')) {
   add_theme_support( 'post-thumbnails' );
}

//Register Menus
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'Triton' )
	) );

//SIDEBAR
function trt_widgets_init(){
	register_sidebar(array(
	'name'          => __('Right Sidebar', 'Triton'),
	'id'            => 'sidebar',
	'description'   => __('Right Sidebar', 'Triton'),
	'before_widget' => '<li id="%1$s" class="widget %2$s"><div class="widget_top"></div><div class="widget_wrap">',
	'after_widget'  => '</div><div class="widget_bottom"></div>',
	'before_title'  => '<h3 class="widgettitle">',
	'after_title'   => '</h3>'
	));
	
	register_sidebar(array(
	'name'          => __('Midrow Widgets', 'Triton'),
	'id'            => 'mid_sidebar',
	'description'   => __('Widget Area for the Midrow', 'Triton'),
	'before_widget' => '<li id="%1$s" class="widget %2$s"><div class="widget_wrap">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3 class="widgettitle">',
	'after_title'   => '</h3>'
	));
	
	register_sidebar(array(
	'name'          => __('Footer Widgets', 'Triton'),
	'id'            => 'foot_sidebar',
	'description'   => __('Widget Area for the Footer', 'Triton'),
	'before_widget' => '<li id="%1$s" class="widget %2$s"><div class="widget_wrap">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3 class="widgettitle">',
	'after_title'   => '</h3>'
	));
}

add_action( 'widgets_init', 'trt_widgets_init' );


//Load Java Scripts to header
function trt_head_js() { 
if ( !is_admin() ) {
wp_enqueue_script('jquery');
wp_enqueue_script('triton_js',get_template_directory_uri().'/js/triton.js');
wp_enqueue_script('triton_other',get_template_directory_uri().'/js/other.js');
wp_enqueue_script('triton_newslider',get_template_directory_uri().'/js/featureList.js');

	$option =  get_option('trt_options');
	if($option['trt_slider']== "Easyslider") { 
    wp_enqueue_script('triton_easySlider',get_template_directory_uri().'/js/easyslider.js');
     }
    if($option["trt_diss_fbx"] == "1"){
    } else { 
	wp_enqueue_style('triton_fancybox_css',get_template_directory_uri().'/css/fancybox.css');
	wp_enqueue_script('triton_fancybox_js',get_template_directory_uri().'/js/fancybox.js');
	}


	}
}
add_action('wp_enqueue_scripts', 'trt_head_js');


add_action('wp_footer', 'trt_load_js');
 
function trt_load_js() { ?>
	<?php $option =  get_option('trt_options'); ?>
    <?php if($option['trt_slider']== "Easyslider") { ?>
    <script type="text/javascript">
		/* <![CDATA[ */
    jQuery(function(){
	jQuery("#slider").easySlider({
		auto: true,
		continuous: true,
		numeric: true,
		pause: <?php echo $option['trt_slider_speed'] ?>
		});
	});
	/* ]]> */
	</script>
    <?php } ?> 

    <?php } 

//Add Custom Slider Post
add_action('init', 'trt_slider_register');
 
function trt_slider_register() {
 
	$labels = array(
		'name' => _x('Slider', 'post type general name'),
		'singular_name' => _x('Slider Item', 'post type singular name'),
		'add_new' => _x('Add New', 'Slider item'),
		'add_new_item' => __('Add New Slide', 'Triton'),
		'edit_item' => __('Edit Slides', 'Triton'),
		'new_item' => __('New Slider', 'Triton'),
		'view_item' => __('View Sliders', 'Triton'),
		'search_items' => __('Search Sliders', 'Triton'),
		'menu_icon' => get_stylesheet_directory_uri() . 'images/article16.png',
		'not_found' =>  __('Nothing found', 'Triton'),
		'not_found_in_trash' => __('Nothing found in Trash', 'Triton'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'exclude_from_search' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => get_stylesheet_directory_uri() . '/images/slider_button.png',
		'rewrite' => false,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','excerpt','thumbnail'),
		'register_meta_box_cb' => 'trt_add_meta'
	  ); 
 
	register_post_type( 'slider' , $args );
}
//Slider Link Meta Box
add_action("admin_init", "trt_add_meta");
 
function trt_add_meta(){
  add_meta_box("trt_credits_meta", "Link", "trt_credits_meta", "slider", "normal", "low");
}
 

function trt_credits_meta( $post ) {

  // Use nonce for verification
  $trtdata = get_post_meta($post->ID, 'trt_slide_link', TRUE);
  wp_nonce_field( 'trt_meta_box_nonce', 'meta_box_nonce' ); 

  // The actual fields for data entry
  echo '<input type="text" id="trt_sldurl" name="trt_sldurl" value="'.$trtdata.'" size="75" />';
}

//Save Slider Link Value
add_action('save_post', 'trt_save_details');
function trt_save_details($post_id){
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
      return;

if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'trt_meta_box_nonce' ) ) return; 

  if ( !current_user_can( 'edit_post', $post_id ) )
        return;

$trtdata = esc_url( $_POST['trt_sldurl'] );
update_post_meta($post_id, 'trt_slide_link', $trtdata);
return $trtdata;  
}



add_action('do_meta_boxes', 'trt_slider_image_box');

function trt_slider_image_box() {
	remove_meta_box( 'postimagediv', 'slider', 'side' );
	add_meta_box('postimagediv', __('Slide Image', 'Triton'), 'post_thumbnail_meta_box', 'slider', 'normal', 'high');
}


//TRITON get the first image of the post Function
function trt_get_images($overrides = '', $exclude_thumbnail = false)
{
    return get_posts(wp_parse_args($overrides, array(
        'numberposts' => -1,
        'post_parent' => get_the_ID(),
        'post_type' => 'attachment',
        'post_mime_type' => 'image',
        'order' => 'ASC',
        'exclude' => $exclude_thumbnail ? array(get_post_thumbnail_id()) : array(),
        'orderby' => 'menu_order ID'
    )));
}


//Custom Excerpt Length
function trt_excerptlength_teaser($length) {
    return 33;
}
function trt_excerptlength_index($length) {
    return 12;
}
function trt_excerptmore($more) {
    return '...';
}

function trt_excerpt($length_callback='', $more_callback='') {
    global $post;
    if(function_exists($length_callback)){
        add_filter('excerpt_length', $length_callback);
    }
    if(function_exists($more_callback)){
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>'.$output.'</p>';
    echo $output;
}

//TRITON COMMENTS
function trt_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
      <div class="comment-body-top"></div>
     <div id="comment-<?php comment_ID(); ?>" class="comment-body">
      <div class="comment-author vcard">
      <div class="avatar"><?php echo get_avatar($comment,$size='58' ); ?></div>

         <?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
      </div>
      <div class="comment-meta commentmetadata">
              <a class="comm_date"><?php printf(get_comment_date()) ?></a>
        <a class="comm_time"><?php printf( get_comment_time()) ?></a>
        </div>
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.', 'Triton') ?></em>
         <br />
      <?php endif; ?>

      <div class="org_comment"><?php comment_text() ?>
      	<div class="comm_meta_reply">
        <div class="comm_reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div>
        <div class='comm_edit'><?php edit_comment_link(__('Edit', 'triton'),'  ','') ?></div></div>
     </div>
     
     </div>
<?php
        }
		
//TRITON TRACKBACKS & PINGS
function trt_ping($comment, $args, $depth) {
 
$GLOBALS['comment'] = $comment; ?>
	
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
   <div class="comment-body-top"></div>
     <div id="comment-<?php comment_ID(); ?>" class="comment-body">
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.', 'Triton') ?></em>
         <br />
      <?php endif; ?>

      <div class="org_ping">
      	<?php printf(__('<cite class="citeping">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
	  	<?php comment_text() ?>
            <div class="comment-meta commentmetadata">
            <a class="comm_date"><?php printf(get_comment_date()) ?></a>
            <a class="comm_time"><?php printf( get_comment_time()) ?></a>
            <div class='comm_edit'><?php edit_comment_link(__('Edit', 'triton'),'  ','') ?></div></div>
     </div>
     </div>
     
     
<?php }

if (isset($_GET['page']) && $_GET['page'] == 'trt_option') {
add_action('admin_print_scripts', 'trt_admin_scripts');
add_action('admin_print_styles', 'trt_admin_styles');
}


include(TEMPLATEPATH . '/lib/script/pagination.php');
include(TEMPLATEPATH . '/lib/includes/shortcodes.php');
include(TEMPLATEPATH . '/lib/includes/widgets.php');
include(TEMPLATEPATH . '/lib/includes/control_panel.php'); 
?>
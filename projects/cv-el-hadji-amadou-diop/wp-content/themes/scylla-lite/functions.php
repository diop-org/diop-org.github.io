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
		'primary' => __( 'Primary Navigation', 'scylla' ),
		'footer_menu' => __( 'Footer Navigation', 'scylla' )
	) );

//SIDEBAR
function scl_widgets_init(){
	register_sidebar(array(
	'name'          => __('Sidebar'),
	'id'            => 'sidebar',
	'description'   => 'Sidebar',
	'before_widget' => '<li id="%1$s" class="widget %2$s"><div class="widget_top"></div><div class="widget_wrap">',
	'after_widget'  => '</div><div class="widget_bottom"></div>',
	'before_title'  => '<h3 class="widgettitle">',
	'after_title'   => '</h3>'
	));
}

add_action( 'widgets_init', 'scl_widgets_init' );


//Add Custom Slider Post
add_action('init', 'scl_slider_register');
 
function scl_slider_register() {
 
	$labels = array(
		'name' => _x('Slider', 'post type general name'),
		'singular_name' => _x('Slider Item', 'post type singular name'),
		'add_new' => _x('Add New', 'Slider item'),
		'add_new_item' => __('Add New Slide'),
		'edit_item' => __('Edit Slides'),
		'new_item' => __('New Slider'),
		'view_item' => __('View Sliders'),
		'search_items' => __('Search Sliders'),
		'menu_icon' => get_stylesheet_directory_uri() . 'images/article16.png',
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
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
		'register_meta_box_cb' => 'scl_add_meta'
	  ); 
 
	register_post_type( 'slider' , $args );
}
//Slider Link Meta Box
add_action("admin_init", "scl_add_meta");
 
function scl_add_meta(){
  add_meta_box("scl_credits_meta", "Link", "scl_credits_meta", "slider", "normal", "low");
}
 
function scl_credits_meta() {
  global $post;
  $custom = get_post_custom($post->ID, 'slide_link', true);
  $slide_link = get_post_meta( $post->ID, 'slide_link', true );
  ?>
  <p>
  <input type="text" name="slide_link" value="<?php if( $slide_link ) { echo $slide_link; } ?>" style="width:400px" /></p>
  <?php
}
//Save Slider Link Value
add_action('save_post', 'scl_save_details');

function scl_save_details($post_id){
  global $post;
if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
    return $post_id;
	if ( !current_user_can( 'edit_post', $post_id ) )
		return $post_id;
}
	$post = get_post($post_id);
    if( $post->post_type == "slider" ) {
        if( isset($_POST['slide_link']) ) { update_post_meta( $post->ID, 'slide_link', $_POST['slide_link'] );}

    }
}

add_action('do_meta_boxes', 'scl_slider_image_box');

function scl_slider_image_box() {
	remove_meta_box( 'postimagediv', 'slider', 'side' );
	add_meta_box('postimagediv', __('Slide Image'), 'post_thumbnail_meta_box', 'slider', 'normal', 'high');
}

//SCYLLA get the first image of the post Function
function scl_get_images($overrides = '', $exclude_thumbnail = false)
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
function scl_excerptlength_teaser($length) {
    return 27;
}
function scl_excerptlength_index($length) {
    return 12;
}
function scl_excerptmore($more) {
    return '...';
}

function scl_excerpt($length_callback='', $more_callback='') {
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


//Load Java Scripts to header
function scl_head_js() { 
if ( !is_admin() ) {
wp_enqueue_script('jquery');
wp_enqueue_script('Scylla',get_template_directory_uri().'/js/scylla.js');
wp_enqueue_script('other',get_template_directory_uri().'/js/other.js');

	$option =  get_option('scl_options');
    if($option['scl_slider']== "Easyslider") { 
    wp_enqueue_script('EasySlider',get_template_directory_uri().'/js/easyslider.js');
     }
    
    if($option["scl_diss_fbx"] == "1"){
    } else { 
	wp_enqueue_script('fancybox_js',get_template_directory_uri().'/js/fancybox.js');
	}
	if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
}
}
add_action('wp_enqueue_scripts', 'scl_head_js');


//Load Slider Speed Control

add_action('wp_footer', 'scl_load_js');
 
function scl_load_js() { ?>
	<?php $option =  get_option('scl_options'); ?>
    <?php if($option['scl_slider']== "Easyslider") { ?>
    <script type="text/javascript">
		/* <![CDATA[ */
    jQuery(function(){
	jQuery("#slider").easySlider({
		auto: true,
		continuous: true,
		pause: <?php echo $option['scl_slider_speed'] ?>
		});
	});
	/* ]]> */
	</script>
    <?php } else { ?> 
    <?php } ?> 
<?php }





//SCYLLA COMMENTS
function scl_comment($comment, $args, $depth) {
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
         <em><?php _e('Your comment is awaiting moderation.') ?></em>
         <br />
      <?php endif; ?>

      <div class="org_comment"><?php comment_text() ?>
      	<div class="comm_meta_reply">
        <div class="comm_reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div>
        <div class="comm_edit"><?php edit_comment_link(__('Edit'),'  ','') ?></div></div>
     </div>
     
     </div>
<?php
        }
		
//SCYLLA TRACKBACKS & PINGS
function scl_ping($comment, $args, $depth) {
 
$GLOBALS['comment'] = $comment; ?>
	
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
   <div class="comment-body-top"></div>
     <div id="comment-<?php comment_ID(); ?>" class="comment-body">
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.') ?></em>
         <br />
      <?php endif; ?>

      <div class="org_ping">
      	<?php printf(__('<cite class="citeping">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
	  	<?php comment_text() ?>
            <div class="comment-meta commentmetadata">
            <a class="comm_date"><?php printf(get_comment_date()) ?></a>
            <a class="comm_time"><?php printf( get_comment_time()) ?></a>
            <div class="comm_edit"><?php edit_comment_link(__('Edit'),'  ','') ?></div></div>
     </div>
     </div>
     
     
<?php }
if (isset($_GET['page']) && $_GET['page'] == 'scylla_option') {
add_action('admin_print_scripts', 'scylla_admin_scripts');
add_action('admin_print_styles', 'scylla_admin_styles');
}


include(TEMPLATEPATH . '/lib/script/pagination.php'); 
include(TEMPLATEPATH . '/lib/includes/widgets.php'); 
include(TEMPLATEPATH . '/lib/includes/shortcodes.php');  
include(TEMPLATEPATH . '/lib/includes/control_panel.php'); 	
?>
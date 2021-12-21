<?php	
	add_theme_support('automatic-feed-links');
	if ( ! isset( $content_width ) )
	$content_width = 620;
	
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'epione' ),
	) );

	if (function_exists('register_sidebar') )
	register_sidebar(array(
	'name' => 'Sidebar',
	'before_widget' => '<li class="nostyle"><div class="pop_top"></div></li><li id="%1$s" class="widget %2$s">',
	'after_widget' => '</li><li class="nostyle"><div class="pop_bottom"></div></li>'
	));



function the_thumb($size = "medium", $add = "") {
global $wpdb, $post;
$thumb = $wpdb->get_row("SELECT ID, post_title FROM {$wpdb->posts} WHERE post_parent = {$post->ID} AND post_mime_type LIKE 'image%' ORDER BY menu_order");
if(!empty($thumb)) {
$image = image_downsize($thumb->ID, $size);
print "<img class='ep_thumb' src='{$image[0]}' alt='{$thumb->post_title}' {$add} />";
}
}


function wpe_excerptlength_teaser($length) {
    return 45;
}
function wpe_excerptlength_index($length) {
    return 12;
}
function wpe_excerptmore($more) {
    return '...';
}

function wpe_excerpt($length_callback='', $more_callback='') {
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


function ep_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
      <div class="comment-body-top"></div>
     <div id="comment-<?php comment_ID(); ?>" class="comment-body">
      <div class="comment-author vcard">
      <div class="avatar"><?php echo get_avatar($comment,$size='58',$default='<path_to_url>' ); ?></div>

         <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
      </div>
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.') ?></em>
         <br />
      <?php endif; ?>

      <div class="org_comment"><?php comment_text() ?>
      	<div class="comment-meta commentmetadata">
        <a class="comm_date"><?php printf(get_comment_date()) ?></a>
        <a class="comm_time"><?php printf( get_comment_time()) ?></a>
        <div class="comm_reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div>
        <div class="comm_edit"><?php edit_comment_link(__('Edit'),'  ','') ?></div></div>
     </div>
     
     </div>
<?php
        }

function ep_ping($comment, $args, $depth) {
 
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


function custom_login() { 
echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_directory').'/custom-login/custom-login.css" />';
echo '<script src="'.get_bloginfo('url').'/wp-includes/js/jquery/jquery.js?ver=1.4.2" type="text/javascript"></script>';
echo '<script type="text/javascript" src="' . get_bloginfo('template_directory') . '/js/font.js"></script>';
echo '<script type="text/javascript" src="' . get_bloginfo('template_directory') . '/js/epione.js"></script>';
echo '<script type="text/javascript" src="' . get_bloginfo('template_directory') . '/js/other.js"></script>';
echo '<div id="logo"><a href="'.get_bloginfo('url').'">'.get_bloginfo('name').'</a></div';

 
}
add_action('login_head', 'custom_login');
?>
<?php
$themename = "Epione";
$shortname = "ep";
$ep_categories_obj = get_categories('hide_empty=0');
$ep_categories = array();
foreach ($ep_categories_obj as $ep_cat) {
	$ep_categories[$ep_cat->cat_ID] = $ep_cat->category_nicename;
}
$categories_tmp = array_unshift($ep_categories, "Select a category:");	
$number_entries = array("Select a Number:","1","2","3","4","5","6","7","8","9","10" );
$options = array(
array(
"type" => "open",
"id" => $shortname."_temp",
"std" => ""
),


array(
"name" => "Styles",
"type" => "select",
"id" => $shortname."_style",
"desc" => "Select a style from the list",
"options" => array("Ruby","Aqua","Nature","Sunset","Beauty"),
"std" => "Ruby"
),

array(
"name" => "Slider Category",
"desc" => "Select  the category for slider",
"id" => $shortname."_slider_cat",
"type" => "select",
"std" => "Select a category",
"options" => $ep_categories),

array(
"name" => "Slider Posts Count",
"desc" => "How many posts you want to show in slider?",
"id" => $shortname."_slider_count",
"type" => "select",
"std" => "3",
"options" => $number_entries),

array(
"name" => "Hide Social Buttons?",
"type" => "checkbox",
"id" => $shortname."_hide_sc_button",
"std" => "false"
),


array(
"name" => "Facebook Link",
"type" => "text",
"id" => $shortname."_fb",
"desc" => "Your Facebook page Link.",
"std" => "http://www.facebook.com/towfiqi"
),

array(
"name" => "Twitter Link",
"type" => "text",
"id" => $shortname."_twitter",
"desc" => "Your Twitter page Link",
"std" => "http://twitter.com/towfiqi"
),

array(
"name" => "Rss Feed Link",
"type" => "text",
"id" => $shortname."_rss",
"desc" => "Your Feedburner URL",
"std" => "http://feeds2.feedburner.com/example"
),

array(
"name" => "Hide Popular Posts Block?",
"type" => "checkbox",
"id" => $shortname."_hide_pp_block",
"std" => "false"
),

array(
"name" => "Hide Share Buttons From Posts?",
"type" => "checkbox",
"id" => $shortname."_hide_share",
"std" => "false"
),

array(
"type" => "close",
"id" => $shortname."_temp",
"std" => ""
)
);

function mytheme_add_admin() {
global $themename, $shortname, $options;
		$optionvar = array();
    if ( isset($_GET['page']) && $_GET['page'] == basename(__FILE__) )  {
        if ( isset($_REQUEST['action']) && 'save' == $_REQUEST['action'] ) {
foreach ($options as $value) {
  if (isset($_REQUEST[ $value['id'] ])) {
    update_option( $value['id'], $_REQUEST[ $value['id'] ] );
  }
}
 foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] );
						} 
					}
				update_option( $shortname."_options", $optionvar  );
				header("Location: themes.php?page=functions.php&saved=true");
                die;

        } else if( isset($_REQUEST['action']) && 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); }

            header("Location: themes.php?page=functions.php&reset=true");
            die;

        }
    }

    add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {
    global $themename, $shortname, $options, $option_values;
    if ( isset($_REQUEST['saved']) &&  $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( isset($_REQUEST['reset']) &&  $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
?>
<div class="wrap" style="margin:0px 20px; padding:20px 0px 0px;">
<h2><?php _e('Epione Settings') ?></h2>
<form method="post">

<?php foreach ($options as $value) {
switch ( $value['type'] ) {

case "open":
?>
<div style="width:808px; background:#eee; border:1px solid #ddd; padding:20px; overflow:hidden; display: block; margin: 0px 0px 30px;">

<?php break;

case "close":
?>

</div>

<?php break;

case "misc":
?>
<div style="width:808px; background:#fffde2; border:1px solid #ddd; padding:20px; overflow:hidden; display: block; margin: 0px 0px 30px;">
	<?php echo $value['name']; ?>
</div>
<?php break;

case "title":
?>

<div style="width:810px; height:22px; background:#555; padding:9px 20px; overflow:hidden; margin:0px; font-family:Verdana, sans-serif; font-size:18px; font-weight:normal; color:#EEE;">
	<?php echo $value['name']; ?>
</div>

<?php break;

case "heading":
?>

<div style="width:800px; height:22px; color:#555; padding:9px 0px; overflow:hidden; margin:0px; font-family:Verdana, sans-serif; font-size:21px; font-weight:bold; font-style:normal; border-bottom:solid 2px #666; margin-bottom:15px;">
	<?php echo $value['name']; ?>
</div>

<?php break;

case 'text':
?>

<div style="width:800px; padding:0px 0px 10px; margin:0px 0px 10px; border-bottom:1px solid #ddd; overflow:hidden;">
	<span style="font-family:Arial, sans-serif; font-size:16px; font-weight:bold; color:#444; display:block; padding:5px 0px; width:350px; float:left;">
		<?php echo $value['name']; ?>
	</span>

	<input style="width:200px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'] )); } else { echo stripslashes($value['std']); } ?>" />
	<br/>
	<span style="font-family:Arial, sans-serif; font-size:11px; font-weight:bold; color:#444; display:block; padding:5px 0px; width:350px; float:left;">
		<?php echo $value['desc']; ?>
	</span>
</div>


<?php
break;


case 'text2':
?>

<div style="width:460px; padding:0px 0px 10px; margin:0px 0px 10px; border-bottom:1px solid #ddd; overflow:hidden; float:right;">
	<span style="font-family:Arial, sans-serif; font-size:16px; font-weight:bold; color:#444; display:block; padding:5px 0px; width:auto; float:left;">
	</span>
	<input style="width:200px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'] )); } else { echo stripslashes($value['std']); } ?>" />
	<br/>
	<span style="font-family:Arial, sans-serif; font-size:11px; font-weight:bold; color:#444; display:block; padding:5px 0px; width:350px; float:left;">
		<?php echo $value['desc']; ?>
	</span>
</div>


<?php
break;

case 'textarea':
?>

<div style="width:808px; padding:0px 0px 10px; margin:0px 0px 10px; border-bottom:1px solid #ddd; overflow:hidden;">
	<span style="font-family:Arial, sans-serif; font-size:16px; font-weight:bold; color:#444; display:block; padding:5px 0px; width:350px; float:left;">
		<?php echo $value['name']; ?>
	</span>
	<textarea name="<?php echo $value['id']; ?>" style="width:600px; height:120px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'] )); } else { echo stripslashes($value['std']); } ?></textarea>
	<br/>
	<span style="font-family:Arial, sans-serif; font-size:11px; font-weight:bold; color:#444; display:block; padding:5px 0px; width:350px; float:left;">
		<?php echo $value['desc']; ?>
	</span>
</div>

<?php
break;
/*Ralph Damiano*/
case 'select':
?>

<div style="width:600px; padding:0px 0px 10px; margin:0px 0px 10px; border-bottom:1px solid #ddd; overflow:hidden;">
	<span style="font-family:Arial, sans-serif; font-size:16px; font-weight:bold; color:#444; display:block; padding:5px 0px; width:350px; float:left;">
		<?php echo $value['name']; ?>

	</span>
	<select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select>
	<br/>
	<span style="font-family:Arial, sans-serif; font-size:11px; font-weight:bold; color:#444; display:block; padding:5px 0px; width:350px; float:left;">
		<?php echo $value['desc']; ?>
	</span>
</div>

<?php
break;

case "checkbox":
?>

<div style="width:600px; padding:0px 0px 0px; margin:0px 0px 0px; overflow:hidden; float:left; margin-bottom:20px;">
	<span style="font-family:Arial, sans-serif; font-size:16px; font-weight:bold; color:#444; display:block; padding:5px 0px; width:350px; float:left;">
		<?php echo $value['name']; ?>
	</span>
	<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
	<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
	<br/>
	<span style="font-family:Arial, sans-serif; font-size:11px; font-weight:bold; color:#444; display:block; padding:5px 0px; width:200px; float:left;">
	</span>
</div>


<?php break;

} 
}
?>
<p class="submit">
<input name="save" type="submit" value="Save changes" />
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>

<?php
}
add_action('admin_menu', 'mytheme_add_admin');?>
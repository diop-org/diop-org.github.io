<?php
include_once(TEMPLATEPATH . '/inc/banner.php');
if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
		'name'=>'Home Sidebar',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<div class="heading"><h2>',
        'after_title' => '</h2></div>',
    ));
    register_sidebar(array(
		'name'=>'single Sidebar',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<div class="heading"><h2>',
        'after_title' => '</h2></div>',
    ));
} 

function blogtxt_date_classes($t, &$c, $p = '') {
	$t = $t + (get_option('gmt_offset') * 3600);
	$c[] = $p . 'y' . gmdate('Y', $t);
	$c[] = $p . 'm' . gmdate('m', $t);
	$c[] = $p . 'd' . gmdate('d', $t);
	$c[] = $p . 'h' . gmdate('h', $t);
}
function theme_init(){
	load_theme_textdomain('js-o4w', get_template_directory() . '/languages');
}

function js_o4w_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   	<?php $countComments = 1; ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
      	<span class="comments_posted_top"></span>
     <div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
	<p class="message_head"><cite><?php comment_author_link();?></cite>

	<span class="timestamp"><?php comment_date('y/m/d H:i') ?></span>

	</p>
			

<div class="message_body">
			<div class="avatarbg">
			<?php echo get_avatar( get_comment_author_email(), '36' ); ?>
			</div>
			<?php echo comment_text();?>
			<div class="reply">
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</div>

			<?php if ($comment->comment_approved == '0') : ?>
			(Your comment is awaiting moderation.)
			<?php endif; ?>
</div>


     </div></div>
<?php
        }
?>
<?php
$themename = "Js O4w";
$shortname = "jowtheme";
$options = array (
	array(    "name" => __("Theme Options", "js-o4w"),
        "type" => "title"),

array(    "type" => "open"),

array(  "name" => __("Navigation Bar display", 'js-o4w'),
        "desc" => __("You can choose to display a list of CATEGORIES or a list of PAGES in the navigation bar. (Default is PAGES)", 'js-o4w'),
        "id" => $shortname."_navi_list",
        "type" => "select",
        "options" => array("Pages", "Categories"),
        "std" => "Pages"),
		
array(  "name" => __("Rss Url", "js-o4w"),
        "desc" => __("Put your full rss subscribe address here.(with http://)", "js-o4w"),
        "id" => $shortname."_rss_url",
        "type" => "text",
        "std" => __("", "js-o4w")),

array(  "name" => __("twitter Url", "js-o4w"),
        "desc" => __("Put your full twitter address here.(with http:// , leave it blank for display none.)", "js-o4w"),
        "id" => $shortname."_tw_url",
        "type" => "text",
        "std" => __("", "js-o4w")),
		
array(  "name" => __("facebook Url", "js-o4w"),
        "desc" => __("Put your full facebook address here.(with http:// , leave it blank for no display none.)", "js-o4w"),
        "id" => $shortname."_fb_url",
        "type" => "text",
        "std" => __("", "js-o4w")),
		

array(    "type" => "close")

);


function mytheme_add_admin() {

    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {

        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                header("Location: themes.php?page=functions.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); }

            header("Location: themes.php?page=functions.php&reset=true");
            die;

        }
    }

    add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';

?>
<div class="wrap">
<h2><?php echo $themename; ?> settings</h2>

<form method="post">

<?php foreach ($options as $value) {
switch ( $value['type'] ) {

case "open":
?>
<table width="100%" border="0" style="background-color:#eef5fb; padding:10px;">

<?php break;

case "close":
?>

</table><br/>

<?php break;

case "title":
?>
<table width="100%" border="0" style="background-color:#dceefc; padding:5px 10px;"><tr>
    <td colspan="2"><h3 style="font-family:Georgia,'Times New Roman',Times,serif;"><?php echo $value['name']; ?></h3></td>
</tr>

<?php break;

case 'text':
?>

<tr>
    <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
    <td width="80%"><input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" /></td>
</tr>

<tr>
    <td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
break;

case 'textarea':
?>

<tr>
    <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
    <td width="80%"><textarea name="<?php echo $value['id']; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?></textarea></td>

</tr>

<tr>
    <td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
break;

case 'select':
?>
<tr>
    <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
    <?php $isOptionSelected = false; ?>
    <td width="80%"><select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; $isOptionSelected = true; } elseif ($option == $value['std'] && !$isOptionSelected ) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select></td>
</tr>

<tr>
    <td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
break;

case "checkbox":
?>
    <tr>
    <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
        <td width="80%"><?php if(get_settings($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
                </td>
    </tr>

    <tr>
        <td><small><?php echo $value['desc']; ?></small></td>
   </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php         break;

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
<!-- donation -->
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
	<div class="wrap" style="background:#DCEEFC; margin-bottom:1em;">

		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row">Donation</th>
					<td>
						If you feel my work is useful and want to support the development of more free resources, you can donate me. Thank you very much!
						<br />
						<input type="hidden" name="cmd" value="_s-xclick"/>
						<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
						"/>
						<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" name="submit" alt="PayPal - The safer, easier way to pay online!"/>
						<img alt="" src="https://www.paypal.com/en_US/i/scr/pixel.gif"/>
					</td>
				</tr>
			</tbody>
		</table>

	</div>
</form>
<?php
}
add_action('admin_menu', 'mytheme_add_admin');
add_action ('init', 'theme_init');
?>
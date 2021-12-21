<?php
/*
Copyright (c) 2010 MobilizeToday.com, Mobile Web Solutions Inc.

Support: http://www.mobilizetoday.com/wordpress-themes/mobius/

This file is part of the Mobius WordPress Theme.
*/
?>
<?php
automatic_feed_links();

$content_width = 670;
 
// Register sidebar
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'before_widget' => '<div id="%1$s" class="part widget %2$s"><div class="sm-slide-block inactive">',
		'before_title' => '<div class="sm-title"><h4>',
		'after_title' => '</h4><a href="javascript:void(null)" class="sm-open-close">Close block</a></div><div class="sm-block"><div>',
		'after_widget' => '</div></div></div><div class="clear"></div></div>',
	));
}

// Theme options
$themename = 'M&ouml;bius';
$shortname = 'mobius';
$options = array (
	array( 
	"name" => $themename." Options",
	"type" => "title"),

	array( "type" => "open"),
 
	array( "name" => "Color theme",
		"desc" => "Switch between different schemas",
		"id" => $shortname."_current_css",
		"type" => "select",
		"options" => array("amethyst", "rain-forest", "sky-blue"),
		"std" => ""),

	array( "name" => "Show twitter icon",
		"desc" => "Display twitter icon on site",
		"id" => $shortname."_show_twitter",
		"type" => "checkbox",
		"std" => false),

	array( "name" => "Twitter icon URL",
		"desc" => "",
		"id" => $shortname."_twitter_url",
		"type" => "text",
		"std" => ""),	

	array( "name" => "Show facebook icon",
		"desc" => "Display facebook icon on site",
		"id" => $shortname."_show_facebook",
		"type" => "checkbox",
		"std" => false),

	array( "name" => "Facebook icon URL",
		"desc" => "",
		"id" => $shortname."_facebook_url",
		"type" => "text",
		"std" => ""),	

	array( "name" => "Show RSS icon",
		"desc" => "Display RSS icon on site",
		"id" => $shortname."_show_rss",
		"type" => "checkbox",
		"std" => false),
		
	array( "name" => "Show sidebar in mobile version",
		"desc" => "Display or hide sidebar in mobile version",
		"id" => $shortname."_show_sidebar",
		"type" => "checkbox",
		"std" => false),
		
	array( "type" => "close")
);

function mobius_add_admin() {
	global $themename, $shortname, $options;
	if ( @$_GET['page'] == basename(__FILE__) ) {
		if ( 'save' == @$_REQUEST['action'] ) {
			foreach ($options as $value) {
				update_option( @$value['id'], @$_REQUEST[ @$value['id'] ] ); }
					foreach ($options as $value) {
						if( isset( $_REQUEST[ @$value['id'] ] ) ) { update_option( @$value['id'], $_REQUEST[ @$value['id'] ]  ); } else { delete_option( @$value['id'] ); } }
						header("Location: themes.php?page=functions.php&saved=true");
						die;
 
		} else if( 'reset' == @$_REQUEST['action'] ) {
 
			foreach ($options as $value) {
			delete_option( $value['id'] ); }
 
	header("Location: themes.php?page=functions.php&reset=true");
	die;
	}
}

add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

add_action( 'parse_request', 'mobius_custom_wp_request' );
function mobius_custom_wp_request( $wp ) 
{
	$screens = array('sky-blue' => 1,'rain-forest' => 2,'amethyst' => 3); 
	if( !empty($_GET['mobile']) && isset($screens[$_GET['mobile']])) 
	{
		# get theme options
		header( 'Content-Type: text/css' );
		require dirname( __FILE__ ) . '/css/mobile.php';
		require dirname( __FILE__ ) . '/css/mobile-'.$_GET['mobile'].'.php';		
	    exit;
	}	
}

function mytheme_admin() {
	global $themename, $options;
	if ( @$_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
	if ( @$_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
?>
<div class="wrap">
<h2><?php echo $themename; ?> Settings</h2>

<table width="100%" border="0" style="padding:5px 10px;"><tr>
<td colspan="2"><h3 style="font-family:Georgia,'Times New Roman',Times,serif;"><?php echo $value['name']; ?></h3></td>
</tr>
<tr>
<td>If you like this theme and want it to be even better as well as to see new FREE mobile compatible themes from MobilizeToday.com, you are welcome to donate.</td>
<td
<form method="post" action="https://www.paypal.com/cgi-bin/webscr">
<div>
<input type="hidden" value="_s-xclick" name="cmd"/>
<input type="hidden" value="LPEQ5VUBRJSLA" name="hosted_button_id"/>
<input type="image" alt="PayPal - The safer, easier way to pay online!" name="submit" src="http://www.mobilizetoday.com/images/donate.gif"/>
<img height="1" width="1" src="https://www.paypal.com/en_US/i/scr/pixel.gif" alt=""/>
</div>
</form>
</td>
</tr>
</table>

<form method="post">
<?php foreach ($options as $value) {
switch ( $value['type'] ) {
case "open":
?>
<table width="100%" border="0" style="padding:10px;">
<?php break;
case "close":
?>
</table><br />
<?php break;
case "title":
?>
<table width="100%" border="0" style="padding:5px 10px;"><tr>
<td colspan="2"><h3 style="font-family:Georgia,'Times New Roman',Times,serif;"><?php echo $value['name']; ?></h3></td>
</tr>
<?php break;
case 'text':
?>
<tr>
<td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="80%"><input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" /></td>
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
<td width="80%"><textarea name="<?php echo $value['id']; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?></textarea></td>
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
<td width="80%"><select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select></td>
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
<td width="80%"><?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
</td>
</tr>
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
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

add_action('admin_menu', 'mobius_add_admin');

// Disable gallery default WP style
add_filter('gallery_style', create_function('$a', 'return " <div class=\'gallery\'>";'));

// Custom comments code
function mobius_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
		<?php echo get_avatar($comment,$size='48' ); ?>
		</div>
		<cite class="fn"><?php comment_author_link(); ?>:</cite> 
		
		<div class="p">
	<?php if ($comment->comment_approved == '0') : ?>
		<em><?php _e('Your comment is awaiting moderation.') ?></em>
		<br />
	<?php endif; ?>

	<?php comment_text() ?>
			<p><span class="comment-time"><?php echo comment_date('d.m.Y');?> <?php comment_time('H:i'); ?> <?php echo comment_reply_link(array( 'depth' =>
   $depth, 'max_depth' => $args['max_depth'] ));  ?>   <?php edit_comment_link(); ?>
</span></p>

		</div>
	</div>
<?php
}

// Custom search widget
function mobius_search_form($form) {
	$form = '<div class="sm-title"><h4>Search</h4><a href="javascript:void(null)" class="sm-open-close">Close block</a>					</div>
					<div class="sm-block">
						<div><form method="get" action="' . get_option('home') . '/" >
	<fieldset>
	<input type="text" value="' . attribute_escape(apply_filters('the_search_query', get_search_query())) . '" name="s" id="s" />
	<input type="submit" class="submit" id="searchsubmit" value="'.attribute_escape('Search').'" />
	</fieldset>
	</form>';
return $form;
}
add_filter('get_search_form', 'mobius_search_form');

// Custom password-protected form
function mobius_password_form($form) {
	$subs = array(
		'#<form(.*?)>#' => '<form$1><fieldset>',
		'#<p><label(.*?)>Password:#' => '',
		'#</p>#' => '',
		'#</label>#' => '',
		'#<p>This post is password protected. To view it please enter your password below:#' => '<p>This post is password protected. To view it please enter your password below:</p><ul>',
		'#<input(.*?)type="password"(.*?) />#' => '<li><label class="caption">Password</label><div class="form-row row-first"> <input$1type="password" /></div></li>',
		'#<input type="submit" name="Submit" value="Submit" />#' => '<li><input type="submit" value="Submit" class="submit" /></li>',
		'#</form(.*?)>#' => '</ul></fieldset></form><div class="clear"></div>'
	);
	echo preg_replace(array_keys($subs), array_values($subs), $form);
}

add_filter('the_password_form', 'mobius_password_form');

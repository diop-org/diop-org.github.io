<?php
if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Sidebar',
'before_widget' => '<div class="widget-top"></div><div class="widget">',
'after_widget' => '</div><div class="widget-bot"></div>',
'before_title' => '<h3 class="widgettitle">',
'after_title' => '</h3>',
));

/*Start of Theme Options*/
 
$themename = "Breathe";
$shortname = "breathe";
$options = array (
 
array( "name" => "Breathe Theme Options",
	"type" => "title"),
 
array( "type" => "open"),

// Site Title Settings

array(    "name" => "Blog Title Font Family",
		"id" => $shortname."_blog_title_font_family",
		"type" => "select",
		"std" => "Arial Black",
		"options" => array("Arial Black", "georgia,times,serif", "arial,helvetica,sans-serif", "verdana,lucida,sans-serif","tahoma,geneva,sans-serif", "rockwell,georgia,serif","cambria,georgia,serif"),
		"desc" => "Default: Aerial Black. Choose a set of fonts for the site title at the top of the page."),

array(    "name" => "Blog Title Color",
		"id" => $shortname."_blog_title_color",
		"type" => "text",
		"std" => "#000000",
		"desc" => "Default: #000000. Find color codes <a href='http://www.htmlcolorcodes.org'>here</a>. "),

array(    "name" => "Blog Title Size",
		"id" => $shortname."_blog_title_size",
		"type" => "text",
		"std" => "48px",
		"desc" => "Default: 48px. "),

array(    "name" => "Tagline Font Family",
		"id" => $shortname."_tag_title_font_family",
		"type" => "select",
		"std" => "arial, helvetica, sans-serif;",
		"options" => array("arial,helvetica,sans-serif", "georgia,times,serif", "verdana,lucida,sans-serif", "tahoma,geneva,sans-serif", "rockwell,georgia,serif", "cambria,georgia,serif"),
		"desc" => "Default: Arial, helvetica, sans-serif. Choose a set of fonts for the site title at the top of the page."),

array(    "name" => "Tagline Title Color",
		"id" => $shortname."_tag_title_color",
		"type" => "text",
		"std" => "#df1104",
		"desc" => "Default: #df1104. Find color codes <a href='http://www.htmlcolorcodes.org'>here</a>. "),

array(    "name" => "Tagline Title Size",
		"id" => $shortname."_tag_title_size",
		"type" => "text",
		"std" => "30px",
		"desc" => "Default: 30px. "),

 

// Welcome Settings

array(    "name" => "Display welcome message",
		"id" => $shortname."_welcome",
		"type" => "select",
		"std" => "yes",
		"options" => array("yes", "no"),
		"desc" => "Select yes to show a welcome message at the top of the front page."),

array(    "name" => "Welcome Message",
        "desc" => "Enter something as your welcome message.",
        "id" => $shortname."_welcome_message",
        "std" => "Welcome to my site.",
        "type" => "textarea"),
        

// Navigation - hide pages

array(    "name" => "Hide Pages Navigation",
		"id" => $shortname."_hide_pages",
		"type" => "select",
		"std" => "no",
		"options" => array("no", "yes"),
		"desc" => "By selecting yes, you will remove the pages navigation in the top bar."),


// Advertising

	
array(    "name" => "Advertising Top",
		"id" => $shortname."_ads_top",
		"type" => "select",
		"std" => "no",
		"options" => array("no", "yes"),
		"desc" => "Select yes to show advertising at the top of every post and page."),

array(    "name" => "Advertisng Code Top",
        "desc" => "Enter your Advertising code here e.g. Google Javascript.",
        "id" => $shortname."_ads_code_top",
        "std" => "",
        "type" => "textarea"),

array(    "name" => "Advertising Bottom",
		"id" => $shortname."_ads_bottom",
		"type" => "select",
		"std" => "no",
		"options" => array("no", "yes"),
		"desc" => "Select yes to show advertising at the bottom of every post and page."),

array(    "name" => "Advertisng Code Bottom",
        "desc" => "Enter your Advertising code here.",
        "id" => $shortname."_ads_code_bottom",
        "std" => "",
        "type" => "textarea"),

// Picture 

		array(    "name" => "Header Picture Option",
		"id" => $shortname."_head_pic_option",
		"type" => "select",
		"std" => "Ours",
		"options" => array("Ours", "Custom"),
		"desc" => "You can use the picture of the mountains at the top of the page or if you have a Custom Image/Logo you'd like to use, you can enter the URL below."),

array(    "name" => "Header Picture",
		"id" => $shortname."_head_pic_url",
		"std" => "images/header.jpg",
		"type" => "text",
		"help" => "Upload your custom logo image (logo width should not exceed 950px; height should not exceed 200px;), and enter the URL for the file location. (e.g. http://www.yoursite.com/images/logo.gif)"),


 
array( "type" => "close")
 
);

/*Option Page formatting */
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
<h2><?php echo $themename; ?> Theme Settings</h2>

<p style="width:70%;"><strong>Welcome to the Settings page for my Wordpress Theme Breathe</strong> A lot of time and effort has gone into the development of this theme so if you were inclined feel free to <a href="https://www.paypal.com/au/cgi-bin/webscr?cmd=_flow&SESSION=8ZRNBHAMremZVHihfqD-55ZKA46I6pn4QX802a-2vesEKhW1Qx-op1uAilW&dispatch=5885d80a13c0db1f22d2300ef60a6759516e590e949da361fd1b680561e9552a">donate</a> a couple of bucks my way. </p>

<p style="width:70%;"><strong>Below are a number of settings that will help you change the look and feel of the theme without having to change any code. The default settings are listed under each option so you can change back back to the original look if you would like.</a>).</p>

<p style="width:70%;"><strong>If you run into trouble and need some support there is a <a href="http://www.paulcracknell.net/forum"> Support forum</a> that can be accessed from my site <a href="http://www.paulcracknell.net">www.paulcracknell.net</a> </p>

<p style="width:70%;"><strong>By clicking on 'Save Changes' - ALL theme settings will be saved.</strong></p>

 
<form method="post">
 
<?php foreach ($options as $value) {
switch ( $value['type'] ) {
 
case "open":
?>
<table width="100%" border="0" style="background-color:#eef5fb; padding:10px;">
 
<?php break;
 
case "close":
?>
 
</table><br />
 
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
<td width="80%"><textarea name="<?php echo $value['id']; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo  stripslashes(get_settings( $value['id'] ) ); } else { echo stripslashes($value['std']); } ?></textarea></td>
 
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
<td width="80%"><select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select></td>
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
<input name="reset" type="submit" value="<?php _e('Delete all Data and Reset to Default Settings'); ?>" />
<input type="hidden" name="action" value="reset" />
</p>
</form>

<?php
}
function mytheme_wp_head() { ?>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.php"  type="text/css" />
<?php }

add_action('wp_head', 'mytheme_wp_head');

add_action('admin_menu', 'mytheme_add_admin');

// End options 




//Do not enter anything below this.
?>
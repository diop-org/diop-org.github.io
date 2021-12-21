<?php

$themename = "WP Perfect";
$shortname = "td";
$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array();
foreach ($categories as $category_list ) {
       $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}

array_unshift($wp_cats, "Choose a category");

$options = array (

array( "name" => $themename." Options",
	"type" => "title"),

array( "name" => "General",
	"type" => "section"),

array( "type" => "open"),

array( "name" => "Custom Favicon",
	"desc" => "A favicon is a 16x16 pixel icon that represents your site; paste the URL to a .ico image that you want to use as the image.",
	"id" => $shortname."_favicon",
	"type" => "text",
	"std" => get_bloginfo('url') ."/favicon.ico"),

array( "name" => "Show Author Profile Box ?",
	"desc" => "Check this option if you want to show author profile box below post.",
	"id" => $shortname."_check_author",
	"type" => "checkbox",
	"std" => ""),

array( "name" => "Author Profile Box Text",
	"desc" => "Insert the text for your author profile box here. You can also insert HTML tags.",
	"id" => $shortname."_author_text",
	"type" => "textarea",
	"std" => ""),

array( "type" => "close"),

array( "name" => "Header",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Show Custom Logo",
	"desc" => "Check this option if you want to show custom logo",
	"id" => $shortname."_logo_check",
	"type" => "checkbox",
	"std" => ""),

array( "name" => "Logo URL",
	"desc" => "Insert the path to your logo image",
	"id" => $shortname."_logo_path",
	"type" => "text",
	"std" => ""),

array( "name" => "Show 468x60 Header Ad ?",
	"desc" => "Check this option if you want to show header ad",
	"id" => $shortname."_check468",
	"type" => "checkbox",
	"std" => ""),

array( "name" => "468x60 Ad Banner",
	"desc" => "Insert the path to your ad banner",
	"id" => $shortname."_468adimage",
	"type" => "text",
	"std" => ""),

array( "name" => "468x60 Ad Link",
	"desc" => "Insert the link to your ad",
	"id" => $shortname."_468adlink",
	"type" => "text",
	"std" => ""),

array( "name" => "Show Google Link Ads Menu",
	"desc" => "Check this option if you want to show secondary menu below main navigation. Secondary menu is used to display Google link ads.",
	"id" => $shortname."_sec_menu_check",
	"type" => "checkbox",
	"std" => ""),

array( "name" => "Google Link Ads Code",
	"desc" => "Insert the code of your Google link ads here. Recommended format is 728x15 with background color code #B7D6F0.",
	"id" => $shortname."_sec_menu_code",
	"type" => "textarea",
	"std" => ""),

array( "type" => "close"),
array( "name" => "Sidebar - Social Widget",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Show Social Widget",
	"desc" => "Check this option if you want to show social widget in the sidebar",
	"id" => $shortname."_checksocial",
	"type" => "checkbox",
	"std" => ""),

array( "name" => "RSS Feed",
	"desc" => "Insert your Feedburner ID",
	"id" => $shortname."_rssfeed",
	"type" => "text",
	"std" => ""),

array( "name" => "Email Subscription",
	"desc" => "Insert your Feedburner ID",
	"id" => $shortname."_email",
	"type" => "text",
	"std" => ""),

array( "name" => "Facebook",
	"desc" => "Insert your Facebook ID",
	"id" => $shortname."_facebook",
	"type" => "text",
	"std" => ""),

array( "name" => "Twitter",
	"desc" => "Insert your Twitter ID",
	"id" => $shortname."_twitter",
	"type" => "text",
	"std" => ""),

array( "name" => "Delicious",
	"desc" => "Insert your Delicious ID",
	"id" => $shortname."_delicious",
	"type" => "text",
	"std" => ""),

array( "type" => "close"),
array( "name" => "Sidebar - 125x125 Ads",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Show Sidebar Ads ?",
	"desc" => "Check this option if you want to show sidebar ads",
	"id" => $shortname."_check125",
	"type" => "checkbox",
	"std" => ""),

array( "name" => "Ad1 Link",
	"desc" => "Insert the link for ad1",
	"id" => $shortname."_ad1link",
	"type" => "text",
	"std" => ""),

array( "name" => "Ad1 Path",
	"desc" => "Insert the path to ad1 banner",
	"id" => $shortname."_ad1path",
	"type" => "text",
	"std" => get_bloginfo('template_directory') ."/images/125X125.png"),

array( "name" => "Ad2 Link",
	"desc" => "Insert the link for ad2",
	"id" => $shortname."_ad2link",
	"type" => "text",
	"std" => ""),

array( "name" => "Ad2 Path",
	"desc" => "Insert the path to ad2 banner",
	"id" => $shortname."_ad2path",
	"type" => "text",
	"std" => get_bloginfo('template_directory') ."/images/125X125.png"),

array( "name" => "Ad3 Link",
	"desc" => "Insert the link for ad3",
	"id" => $shortname."_ad3link",
	"type" => "text",
	"std" => ""),

array( "name" => "Ad3 Path",
	"desc" => "Insert the path to ad3 banner",
	"id" => $shortname."_ad3path",
	"type" => "text",
	"std" => get_bloginfo('template_directory') ."/images/125X125.png"),

array( "name" => "Ad4 Link",
	"desc" => "Insert the link for ad4",
	"id" => $shortname."_ad4link",
	"type" => "text",
	"std" => ""),

array( "name" => "Ad4 Path",
	"desc" => "Insert the path to ad4 banner",
	"id" => $shortname."_ad4path",
	"type" => "text",
	"std" => get_bloginfo('template_directory') ."/images/125X125.png"),

array( "type" => "close"),
array( "name" => "Footer",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Show Footer Widgets ?",
	"desc" => "Check this option if you want to show footer widgets",
	"id" => $shortname."_footer_widgets",
	"type" => "checkbox",
	"std" => ""),

array( "name" => "Google Analytics Code",
	"desc" => "You can paste your Google Analytics or other tracking code in this box. This will be automatically added to the footer.",
	"id" => $shortname."_ga_code",
	"type" => "textarea",
	"std" => ""),	

array( "type" => "close")

);

function mytheme_add_admin() {

global $themename, $shortname, $options;

if ( isset($_GET['page']) == basename(__FILE__) ) {

	if ( 'save' == isset($_REQUEST['action']) ) {

		foreach ($options as $value) {
		update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

foreach ($options as $value) {
	if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

	header("Location: themes.php?page=theme-options.php&saved=true");
die;

}
else if( 'reset' == isset($_REQUEST['action'] ) ) {

	foreach ($options as $value) {
		delete_option( $value['id'] ); }

	header("Location: admin.php?page=functions.php&reset=true");
die;

}
}

add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}

function mytheme_add_init() {
$file_dir=get_bloginfo('template_directory');
wp_enqueue_style("functions", $file_dir."/functions/functions.css", false, "1.0", "all");
wp_enqueue_script("rm_script", $file_dir."/js/rm_script.js", false, "1.0");  
}

function mytheme_admin() {

global $themename, $shortname, $options;
$i=0;

if ( isset ($_REQUEST['saved']) ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';

if ( isset ($_REQUEST['reset']) ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';

?>

<div class="wrap rm_wrap">
<h2><?php echo $themename; ?> Settings</h2>

<div class="rm_opts">
<form method="post">

<?php foreach ($options as $value) {
switch ( $value['type'] ) {

case "open":
?>

<?php break;

case "close":
?>

</div>
</div>
<br />

<?php break;

case "title":
?>
<p>To easily use the <?php echo $themename;?> theme, you can use the menu below.</p>

<?php break;

case 'text':
?>

<div class="rm_input rm_text">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" />
<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>

</div>
<?php
break;

case 'textarea':
?>

<div class="rm_input rm_textarea">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id']) ); } else { echo $value['std']; } ?></textarea>
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>

</div>

<?php
break;

case 'select':
?>

<div class="rm_input rm_select">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
<?php foreach ($value['options'] as $option) { ?>
		<option <?php if (get_option( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
</select>

	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>
<?php
break;

case "checkbox":
?>

<div class="rm_input rm_checkbox">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />

	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>
<?php break;

case "section":

$i++;

?>

<div class="rm_section">

<div class="rm_title"><h3><img src="<?php bloginfo('template_directory')?>/functions/images/trans.png" class="inactive" alt="""><?php echo $value['name']; ?></h3><span class="submit"><input name="save<?php echo $i; ?>" type="submit" value="Save changes" />
</span><div class="clearfix"></div></div>

<div class="rm_options">

<?php break;

}
}
?>

<input type="hidden" name="action" value="save" />
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>

</div> 

<?php
}
?>
<?php
add_action('admin_init', 'mytheme_add_init');
add_action('admin_menu', 'mytheme_add_admin');
?>
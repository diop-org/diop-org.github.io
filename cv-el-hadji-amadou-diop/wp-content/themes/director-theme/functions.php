<?php
function get_dir_config($var) {
	require("dir_config.php");
	if(array_key_exists($var,$dir_config)) {
		return $dir_config[$var];
	}
	else {
		return false;
	}
}
//Theme Name
$themename = "Director";
//prefix 
$shortname = "theme_";
//Array
?>
<?php
/** Director options */
class DirectorOptions {
	function getOptions() {
		$options = get_option('director_options');
		if (!is_array($options)) {
			$options['twitter_icon'] = false;
			$options['twitter_nick'] = '';
			$options['facebook_icon'] = false;
			$options['facebook_url'] = '';
			$options['feed'] = false;
			$options['feed_url'] = '';
			update_option('director_options', $options);
		}
		return $options;
	}
	function add() {
		if(isset($_POST['director_save'])) {
			$options = DirectorOptions::getOptions();
			
			// Twitter icon
			if ($_POST['twitter_icon']) {
				$options['twitter_icon'] = (bool)true;
			} else {
				$options['twitter_icon'] = (bool)false;
			}
			$options['twitter_nick'] = stripslashes($_POST['twitter_nick']);
			
			// Facebook icon
			if ($_POST['facebook_icon']) {
				$options['facebook_icon'] = (bool)true;
			} else {
				$options['facebook_icon'] = (bool)false;
			}
			$options['facebook_url'] = stripslashes($_POST['facebook_url']);
			
			// Custom Feed
			if ($_POST['feed']) {
				$options['feed'] = (bool)true;
			} else {
				$options['feed'] = (bool)false;
			}
			$options['feed_url'] = stripslashes($_POST['feed_url']);

			update_option('director_options', $options);

		} else {
			DirectorOptions::getOptions();
		}

		add_theme_page(__('Director Options', 'director'), __('Director Options', 'director'), 'edit_themes', basename(__FILE__), array('DirectorOptions', 'display'));
	}

	function display() {
		$options = DirectorOptions::getOptions();
		
    ?>

<form action="#" method="post" enctype="multipart/form-data" name="director_form" id="director_form">
	<div class="wrap">
		<h2><?php _e('Director Options', 'director'); ?></h2>
		
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><?php _e('Twitter Icon', 'director'); ?></th>
				  <td>
						<label>
							<input name="twitter_icon" type="checkbox" value="checkbox" <?php if($options['twitter_icon']) echo "checked='checked'"; ?> />
							 <?php _e('Add Twitter Icon --> ', 'director'); ?>
						</label>
						<?php _e('Your Twitter Username:', 'director'); ?>
						<input type="text" name="twitter_nick" id="twitter_nick" class="code" size="30" value="<?php echo sanitize_user($options['twitter_nick']); ?>">
			      </td>
				</tr>
			</tbody>
		</table>
		
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><?php _e('Facebook', 'director'); ?></th>
				  <td>
						<label>
							<input name="facebook_icon" type="checkbox" value="checkbox" <?php if($options['facebook_icon']) echo "checked='checked'"; ?> />
							 <?php _e('Add Facebook Icon --> ', 'director'); ?>
						</label>
						<?php _e('Type the URL of your Facebook Profile:', 'director'); ?>
						<input type="text" name="facebook_url" id="facebook_url" class="code" size="30" value="<?php echo clean_url($options['facebook_url']); ?>">
			      </td>
				</tr>
			</tbody>
		</table>
		
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><?php _e('Custom Feed', 'director'); ?></th>
					<td>
						<label>
							<input name="feed" type="checkbox" value="checkbox" <?php if($options['feed']) echo "checked='checked'"; ?> />
							 <?php _e('Custom feed --> ', 'director'); ?>
						</label>
						 <?php _e('Type the URL of your custom Feed:', 'director'); ?> <input type="text" name="feed_url" id="feed_url" class="code" size="50" value="<?php echo clean_url($options['feed_url']); ?>">
						 <ul>For example, you can add the URL of your Feedburner Feed. http://feeds.feedburner.com/YourFeedburnerName</ul>
						<br/>
					</td>
				</tr>
			</tbody>
		</table>

		<p class="submit">
			<input class="button-primary" type="submit" name="director_save" value="<?php _e('Save Changes', 'director'); ?>" />
		</p>
	</div>
</form>


<div class="wrap" style="background:#E3E3E3;">
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row">Donation</th>
					<td>
						If you find my Themes useful and you want to support the development of more Wordpress Themes, you can buy me a Coffee. :)
						<br />
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="0" height="0">
</form>
					</td>
				</tr>
			</tbody>
		</table>
</form>
<?php
	}
}

function get_the_avatars_with_link_to_authors(){
	$authors = get_users_of_blog();

		foreach ($authors as $author){
			$author_data = get_userdata($author->user_id);
			$author_nicename = $author_data->user_nicename;
			$author_displayname = $author_data->display_name;

			$link .= '<li><a href="' . get_author_posts_url($author_data->ID) . '" title="' . sprintf( __( "Ver post de %s" ), $author_displayname ) . '">' . get_avatar($author_data->ID,$size = '64') . '</a></li>';
		}

	return $link;
}
// register functions
add_action('admin_menu', array('DirectorOptions', 'add'));
if ( function_exists('register_sidebar') ){
register_sidebar( array(
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
   	'after_widget'  => '</div>',
	'before_title' => '<h5 class="widgettitle">',
	'after_title' => '</h5><div class="widgetcontent">'
) );
}
?>
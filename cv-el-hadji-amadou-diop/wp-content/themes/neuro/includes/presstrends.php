<?php
// Add PressTrends Option
add_action('admin_menu', 'presstrends_theme_menu');

function presstrends_theme_menu() {
	add_theme_page('PressTrends', 'PressTrends', 'manage_options', 'presstrends_theme_options', 'presstrends_theme_options');
}

function presstrends_theme_options() {
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
	?>
	<form action="options.php" method="post">
	    <?php settings_fields('presstrends_theme_opt'); ?>
	    <?php do_settings_sections('presstrends_top'); ?>
	    <p class="submit">
	        <input name="Submit" type="submit" value="<?php esc_attr_e('Update'); ?>" />
	    </p>
	</form>
<?php
}

// PressTrends Option Settings
add_action('admin_init', 'presstrends_theme_init');

function presstrends_theme_init(){
	register_setting( 'presstrends_theme_opt', 'presstrends_theme_opt');
	add_settings_section('presstrends_top', '', 'presstrends_top_text', 'presstrends_top');
	add_settings_field('presstrends_opt_in', 'Activate PressTrends?', 'presstrends_opt_string', 'presstrends_top', 'presstrends_top');
}

// PressTrends Section Text
function presstrends_top_text() {
    echo '<p style="width:190px;float:left;"><img src="http://presstrends.io/images/logo.png"/></p><p style="width:500px;float:left;color:#777;padding-top:2px;"><b>PressTrends</b> helps theme authors build better themes and provide awesome support by retrieving aggregated stats. PressTrends also provides a <a href="http://wordpress.org/extend/plugins/presstrends/" title="PressTrends Plugin for WordPress" target="_blank">plugin</a> that delivers stats on how your site is performing against the web and similar sites like yours. <a href="http://presstrends.io" title="PressTrends" target="_blank">Learn more…</a></p>';
}

// PressTrends Opt-In Option
function presstrends_opt_string() {
    $current_key = get_option('presstrends_theme_opt');
    $opt = $current_key['activated'];
	if($opt == 'on') {
	    echo "<input id='presstrends_opt_in' name='presstrends_theme_opt[activated]' checked type='checkbox' />";
	} else {
	    echo "<input id='presstrends_opt_in' name='presstrends_theme_opt[activated]' type='checkbox' />";
	}
}

// Add PressTrends Pointer
function be_password_pointer_enqueue( $hook_suffix ) {
	$enqueue = false;

	$dismissed = explode( ',', (string) get_user_meta( get_current_user_id(), 'dismissed_wp_pointers', true ) );

	if ( ! in_array( 'activate_presstrends', $dismissed ) ) {
		$enqueue = true;
		add_action( 'admin_print_footer_scripts', 'be_password_pointer_print_admin_bar' );
	}

	if ( $enqueue ) {
		wp_enqueue_style( 'wp-pointer' );
		wp_enqueue_script( 'wp-pointer' );
	}
}
add_action( 'admin_enqueue_scripts', 'be_password_pointer_enqueue' );

function be_password_pointer_print_admin_bar() {
	$pointer_content  = '<h3>' . 'Activate PressTrends' . '</h3>';
	$pointer_content .= '<p>' . 'Help theme authors build better themes and provide awesome support by retrieving aggregated stats.' . '</p>';

?>
<script type="text/javascript">
//<![CDATA[
jQuery(document).ready( function($) {
	$('#menu-appearance').pointer({
		content: '<?php echo $pointer_content; ?>',
		position: 'bottom',
		pointerWidth: 300,
		close: function() {
			$.post( ajaxurl, {
					pointer: 'activate_presstrends',
					action: 'dismiss-wp-pointer'
			});
		}
	}).pointer('open');
});
//]]>
</script>
<?php
}

// Start of Presstrends Magic
function presstrends() {

// PressTrends Account API Key
$api_key = 'zwhgyc1lnt56hki8cpwobb47bblas4er226b';

// Start of Metrics
global $wpdb;
$data = get_transient( 'presstrends_data' );
if (!$data || $data == ''){
$api_base = 'http://api.presstrends.io/index.php/api/sites/update/api/';
$url = $api_base . $api_key . '/';
$data = array();
$count_posts = wp_count_posts();
$count_pages = wp_count_posts('page');
$comments_count = wp_count_comments();
$theme_data = get_theme_data(get_stylesheet_directory() . '/style.css');
$plugin_count = count(get_option('active_plugins'));
$all_plugins = get_plugins();
foreach($all_plugins as $plugin_file => $plugin_data) {
$plugin_name .= $plugin_data['Name'];
$plugin_name .= '&';}
$posts_with_comments = $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->prefix}posts WHERE post_type='post' AND comment_count > 0");
$comments_to_posts = number_format(($posts_with_comments / $count_posts->publish) * 100, 0, '.', '');
$pingback_result = $wpdb->get_var('SELECT COUNT(comment_ID) FROM '.$wpdb->comments.' WHERE comment_type = "pingback"');
$data['url'] = stripslashes(str_replace(array('http://', '/', ':' ), '', site_url()));
$data['posts'] = $count_posts->publish;
$data['pages'] = $count_pages->publish;
$data['comments'] = $comments_count->total_comments;
$data['approved'] = $comments_count->approved;
$data['spam'] = $comments_count->spam;
$data['pingbacks'] = $pingback_result;
$data['post_conversion'] = $comments_to_posts;
$data['theme_version'] = $theme_data['Version'];
$data['theme_name'] = $theme_data['Name'];
$data['site_name'] = str_replace( ' ', '', get_bloginfo( 'name' ));
$data['plugins'] = $plugin_count;
$data['plugin'] = urlencode($plugin_name);
$data['wpversion'] = get_bloginfo('version');
foreach ( $data as $k => $v ) {
$url .= $k . '/' . $v . '/';}
$response = wp_remote_get( $url );
set_transient('presstrends_data', $data, 60*60*24);}
}

$current_key = get_option('presstrends_theme_opt');
$opt = $current_key['activated'];
if($opt == 'on') {
    add_action('admin_init', 'presstrends');
}
?>
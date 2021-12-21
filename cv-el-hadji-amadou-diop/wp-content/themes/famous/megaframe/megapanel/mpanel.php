<?php /*
 License: GNU General Public License v3.0
 License URI: http://www.gnu.org/licenses/gpl-3.0.html
 Author: MegaThemes (http://www.megathemes.com)
*/

defined('WP_ADMIN')
or die('no direct access');

// Theme Activation Redirect
if ( is_admin() && isset($_GET['activated']) && $pagenow == 'themes.php' )
	wp_redirect( 'themes.php?page=mFrame' );

function mframe_admin_options_page()
{
	global $mframe;
	?>

<form class="ui-panel" action="/">
<div class="ui-head">
 <ul>
  <li><a id="tab1" href="#tab-1"><span><?php _e( 'Home', 'mframe' ); ?></span></a></li>
  <?php mframe_admin_tabs( $mframe ); ?>
 </ul>
</div>
<div class="ui-body">
 <div id="tab-1" class="home">
  <a href="<?php mframe_option( 'url-upgrade', 1 ); ?>" class="block upgrade"><?php echo sprintf( __( 'Upgrade this theme today for just <span class="price">%s</span> and get access to extra features.', 'mframe' ), mframe_option( 'price-upgrade' )); ?></a>
  <a href="<?php mframe_option( 'order-url', 1 ); ?>" class="block upgrade-all"><?php echo sprintf( __( 'Access all of MegaThemes.com amazing
collection of themes for just <span class="price">%s</span>', 'mframe' ), mframe_option( 'price-pro' )); ?></a>
 </div>
<div class="ui-main">
 <?php mframe_admin_build_options( $mframe ); ?>
</div>
</div>

<div class="ui-foot">
 <div class="ver"><?php echo sprintf( "Framework v%s Theme v%s", mframe_option( 'version-panel' ), mframe_option( 'version-theme' )); ?></div>
</div>

<input type="hidden" name="action" value="save_theme_options" />
<?php wp_nonce_field( 'theme_options_data', 'security' ); ?>
</form>

<?php if (!defined( 'DEF_PRO' )) { ?>
<script type="text/javascript">
	jQuery("div.option.pro input, div.option.pro select, div.option.pro textarea").attr("disabled", "disabled");
</script>
<?php }

}

function mframe_admin_menu()
{
	add_theme_page( __( mframe_option( 'theme-name' ) . ' Options', 'mframe' ), __( mframe_option( 'theme-name' ) . ' Options', 'mframe' ), 'edit_theme_options', 'mFrame', 'mframe_admin_options_page');
}

if ( isset( $_GET['page']) && $_GET['page'] == 'mFrame' )
	add_action( 'admin_init', 'mframe_init' );

add_action( 'admin_menu', 'mframe_admin_menu' );

function mframe_theme_options_save_ajax()
{
	check_ajax_referer('theme_options_data', 'security');

	$data = $_POST;
	unset( $data['security'], $data['action']);

	global $mframe;
	$old = mframe_option( 'style' );
	$new = $data['style'];

	if ( $new !== $old )
	{
		$backup = mframe_option( 'style' . $new );
		foreach ( (array) $mframe['skins'][$new] as $name => $value )
			if ( isset( $data[$name]))
			{
				$data[$name] !== $mframe['skins'][$old][$name] ? $data['style' . $old][$name] = $data[$name] : '';
				$data[$name] = isset( $backup[$name]) ? $backup[$name] : $value;
				$response['skins'][$name] = $data[$name];
			}
	}

	$filter = new RecursiveIteratorIterator( new RecursiveArrayIterator( $mframe['options']), RecursiveIteratorIterator::SELF_FIRST );

	foreach ( $filter as $name => $value )
	{
		if ( isset( $data[$name]) && isset( $value['type'] ))
			switch ( $value['type'])
			{
				case 'xtext' :
					$data[$name] = intval( $data[$name]);
					$response['options'][$name] = $data[$name];
				break;

				case 'textarea' : case 'text' : case 'mtext' : case 'ltext' :
					$data[$name] = stripslashes( wp_filter_post_kses( $data[$name]));
					$response['options'][$name] = $data[$name];
				break;

				default :
					$data[$name] = $data[$name];
				break;
			}
	}

	$data['contact-form-email'] = !is_email( $data['contact-form-email']) ? 'Invalid Email' : $data['contact-form-email'];
	$response['options']['contact-form-email'] = $data['contact-form-email'];

	echo json_encode( $response );

	update_option( 'mpanel_' . mframe_option( 'theme-name' ), $data );
	die();
}
add_action('wp_ajax_save_theme_options', 'mframe_theme_options_save_ajax');

if ( isset( $_GET['reset']) && $_GET['reset'] == true )
{
	delete_option( 'mpanel_' . mframe_option( 'theme-name' ));
	wp_redirect( 'themes.php?page=mFrame' );
}
?>
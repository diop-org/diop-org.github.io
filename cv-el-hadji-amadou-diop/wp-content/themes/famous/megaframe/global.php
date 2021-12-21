<?php /*
 License: GNU General Public License v3.0
 License URI: http://www.gnu.org/licenses/gpl-3.0.html
 Author: MegaThemes (http://www.megathemes.com)
*/

defined('ABSPATH')
or die('no direct access');

if ( mframe_option( 'layout' ) == 'wide' )
	$content_width = 970;
else
	$content_width = 632;

// This theme styles the visual editor with editor-style.css to match the theme style.

add_action( 'after_setup_theme', array( 'mFrame', 'init' ));
add_action( 'after_setup_theme', array( 'mFrame', 'loader' ));

if ( defined( 'WP_ADMIN' ) && current_user_can( 'manage_options' ))
{
	require get_template_directory() . '/megaframe/megapanel/mpanel.php';
}

class mFrame
{
	var $mframe = array();
	var $options = array();

	function __construct()
	{
		global $mframe;

		$this->mframe = $mframe;
		$this->options = get_option( 'mpanel_' . get_current_theme());
		$this->style = (int) isset( $this->options['style']) ? $this->options['style'] : $mframe['globals']['style'];
	}

	function defaults( $key )
	{
		switch( $key )
		{
			case 'style':
				return $this->style;

			case 'imgdir':
				return get_template_directory_uri() . '/images/style' . $this->style . '/';

			case 'theme-name':
				return get_current_theme();

			case 'theme-base':
				return basename( get_template_directory_uri());

			case 'nobgimage':
				//return $this->options['color-bg'] != '' && $this->options['color-bg'] != $this->mframe['defaults']['color-bg'] ? true : false;
				return false;

			case 'logo-image':
				return mframe_option('imgdir') . 'logo.png';

			case 'logo-image-w':
				list( $width ) = getimagesize( get_template_directory() . '/images/style' . $this->style . '/logo.png' );
				return $width ? $width : $this->mframe['globals']['logo-image-w'];

			case 'logo-image-h':
				list( $width, $height ) = getimagesize( get_template_directory() . '/images/style' . $this->style . '/logo.png' );
				return $height ? $height : $this->mframe['globals']['logo-image-h'];

			case 'favicon':
				return get_template_directory_uri() . '/images/favicon.ico';

			default:
				return @$this->mframe['defaults'][$key];
		}
	}

	function init()
	{
		if ( file_exists( get_template_directory() . '/pro.php' ))
		{
			define( 'DEF_PRO', 1 );
		}
		// Enable theme translations
		load_theme_textdomain( 'mFrame', $langpath = get_template_directory() . '/megaframe/lang' );
		@include_once $langpath . '/' . get_locale() . '.php';

		// Enable post thumbnails support
		add_theme_support( 'post-thumbnails' );

		// Enable posts and comments RSS feed head links
		add_theme_support( 'automatic-feed-links' );

		// Disable default gallery style settings
		add_filter( 'use_default_gallery_style', '__return_false' );

		add_action( 'wp_footer', array( 'mFrameDisplay', 'footer' ));

		// Register menus
		register_nav_menu( 'topmenu', 'Top Menu' );

		// Sidebar positions
		register_sidebar(array(
			'id'	=> 'home',
			'name'	=> 'Home Sidebar',
			'description'	=> 'Widgets in this area will appear in the home sidebar.',
			'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<h3>',
			'after_title'	=> '</h3>',
		));

		register_sidebar(array(
			'id'	=> 'sidebar',
			'name'	=> 'Right Sidebar',
			'description'	=> 'Widgets in this area will appear in the right sidebar.',
			'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<h3>',
			'after_title'	=> '</h3>',
		));

		register_sidebar(array(
			'id'	=> 'footer1',
			'name'	=> 'Footer Column 1',
			'description'	=> 'Footer Left Column Widgets',
			'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<h3>',
			'after_title'	=> '</h3>',
		));

		register_sidebar(array(
			'id'	=> 'footer2',
			'name'	=> 'Footer Column 2',
			'description'	=> 'Footer Middle Column Widgets',
			'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<h3>',
			'after_title'	=> '</h3>',
		));

		register_sidebar(array(
			'id'	=> 'footer3',
			'name'	=> 'Footer Column 3',
			'description'	=> 'Footer Right Column Widgets',
			'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<h3>',
			'after_title'	=> '</h3>',
		));
	}

	function loader()
	{
		global $mframe;
		global $pagenow;

		if ( defined( 'WP_ADMIN' ))
		{
			$dirs = array( 'megapanel/js', 'widgets' );

			require_once get_template_directory() . '/megaframe/megapanel/inc/functions.php';
			require_once get_template_directory() . '/megaframe/inc/backend.php';
		}
		else
		{
			$dirs = array( 'js', 'widgets' );

			require_once get_template_directory() . '/megaframe/inc/classes.php';
			require_once get_template_directory() . '/megaframe/inc/functions.php';

			wp_enqueue_script( 'comment-reply' );
			wp_enqueue_style( 'mframe.style', get_template_directory_uri() . '/style.css' );
			wp_enqueue_style( 'mframe.global', get_template_directory_uri() . '/css/global.css' );

			// Auto Load Google Fonts
			foreach ( $mframe['typography'] as $field => $data )
			{
				$data = mframe_option( $field );
				if ( !isset( $data['styles'])) $data['styles'] = array();
				if ( in_array( $data['family'], mframe_option( 'fonts-google' )))
					$fonts[] = $data['family'] . ':Normal,' . ( in_array( 'Bold', $data['styles']) ? 'Bold' : '' );
			}
			if ( !empty( $fonts ))
				wp_enqueue_style( 'mframe.fonts.google', 'http://fonts.googleapis.com/css?family=' . str_replace( ' ', '+' ,implode( '|', $fonts )));

			// Auto Load Styles
			$handle = opendir( get_template_directory() . '/css' );

			while ( $name = readdir( $handle ))
				if ( !in_array( $name, array( '.', '..', '.svn', 'global.css', 'custom.css', 'flash.css' )))
					wp_enqueue_style( 'mframe.' . $name, get_template_directory_uri() . '/css/' . $name . mframe_preview( $name ));
			closedir( $handle );

			wp_enqueue_style( 'mframe.custom', get_template_directory_uri() . '/css/custom.css' );
		}

		// Auto Load Scripts
		foreach ( (array) $dirs as $dir )
		{
			$path = get_template_directory() . "/megaframe/$dir";

			if ( is_dir( $path ) && $handle = opendir( $path ))
			{
				if ( in_array( $dir, array( 'megapanel/js', 'js' )))
				{
					if (( !defined( 'WP_ADMIN' ) && $pagenow !== 'wp-login.php' ) || ( isset( $_GET['page']) && $_GET['page'] == 'mFrame' ))
					{
						wp_enqueue_script( 'jquery' );
						wp_enqueue_script( 'jquery-ui-tabs' );
						wp_enqueue_script( 'swfobject' );
						wp_register_script( 'mframe.cufon', get_template_directory_uri() . '/megaframe/js/cufon.js' );
						wp_enqueue_script( 'mframe.cufon' );

						while ( $name = readdir( $handle ))
						{
							if ( !in_array( $name, array( '.', '..', '.svn', 'cufon.js' )))
							{
								wp_register_script( 'mframe.' . $name, get_template_directory_uri() . "/megaframe/$dir/$name" );
								wp_enqueue_script( 'mframe.' . $name );
							}
						}
						wp_localize_script( 'mframe.scripts.js', 'mframe', array( 'ajax' => admin_url( 'admin-ajax.php' )));
					}
				}
				else
				{
					while ( $name = readdir( $handle ))
						if ( !in_array( $name, array( '.', '..', '.svn' )))
							require_once $path . "/$name";
				}
				closedir( $handle );
			}
		}
	}
}

function mframe( $key, $data )
{
	global $mframe;

	switch( $key )
	{
		case 'skins':
			$mframe['defaults'] = array_merge( $mframe['globals'], $mframe['typography'], $data[mframe_option('style')] );
			$mframe['skins'] = $data;
			break;

		default:
			$mframe[$key] = $data;
			break;
	}
}

function mframe_display( $method = '', $args = array(), $echo = false )
{
	$classname = defined( 'WP_ADMIN' ) ? 'mFrameDisplay' : 'mFrameDisplay';
	$mframe = new $classname();

	if( $echo )
		echo $mframe->$method( $args );
	else
		return $mframe->$method( $args );
}

function mframe_enable( $key = '', $args = '' )
{
	$classname = defined( 'WP_ADMIN' ) ? 'mFrameDisplay' : 'mFrameDisplay';
	$mframe = new $classname();
	return $mframe->toggle( $key, $args );
}

function mframe_option( $key = '', $print = false )
{
	$mframe = new mFrame();

	$output = isset($mframe->options[ $key ]) ? $mframe->options[ $key ] : $mframe->defaults( $key );

	if ( $print == true )
		echo $output;
	else
		return $output;
}

?>
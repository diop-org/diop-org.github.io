<?php /*
 License: GNU General Public License v3.0
 License URI: http://www.gnu.org/licenses/gpl-3.0.html
 Author: MegaThemes (http://www.megathemes.com)
*/

defined('ABSPATH')
or die('no direct access');

function mframe_widget( $name = '', $args = array() )
{
	global $post;

	switch ( $name )
	{
		case 'posts' :
			$title = $args['type'] == 'comment_count' ? mframe_option('widget-posts-title2') : mframe_option('widget-posts-title1');
			$class = 'one';
			$defcase = array(
				'type'	=> 'date',
				'catid' => 0,
				'count' => mframe_option('widget-posts-count')
			);
			break;

		case 'comments' :
			$title = mframe_option('widget-comments-title');
			$class = 'one';
			$defcase = array(
				'count'	=> mframe_option('widget-comments-count')
			);
			break;

		case 'tweets' :
			$title = mframe_option('widget-tweets-title');
			$class = 'one';
			$defcase = array(
				'user'	=> mframe_option('twitterid'),
				'count' => mframe_option('widget-tweets-count')
			);
			break;

		case 'follow' :
			$title = mframe_option('widget-follow-title');
			$class = 'one';
			break;

		case 'newsletter' :
			$title = mframe_option('widget-newsletter-title');
			$class = 'one';
			$defcase = array(
				'service' => mframe_option('widget-newsletter-service'),
				'list'	=> mframe_option('mclist')
			);
			break;

		case 'contact' :
			$title = mframe_option('contact-form-title');
			$class = 'one';
			break;

		case 'search' :
			$title = mframe_option('widget-search-title');
			$class = 'one';
			break;

		case 'categories' :
			$title = mframe_option('widget-categories-title');
			$class = 'one';
			break;

		case 'archives' :
			$title = mframe_option('widget-archives-title');
			$class = 'one';
			break;

		case 'calendar' :
			$title = mframe_option('widget-calendar-title');
			$class = 'one';
			break;

		case 'register' :
			$title = mframe_option('widget-register-title');
			$class = 'one';
			break;

		case 'login' :
			$title = mframe_option('widget-login-title');
			$class = 'one';
			break;
	}

	$defbase = array(
		'post'			=> $post,
		'title'			=> __( $title, 'mframe' ),
		'before_widget'	=> '<div class="widget ' . $class . ' widget_' . $name . '">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h3>',
		'after_title'	=> '</h3>'
	);

	unset( $title );

	if( !isset( $defcase )) $defcase = array();

	$defaults = $defcase + $defbase;

	$args = wp_parse_args( $args, $defaults );

	foreach( $args as $key => $value ) { $args[$key] = !empty( $args[$key] ) ? $args[$key] : $defaults[$key]; }

	extract( $args, EXTR_SKIP );

	echo $before_widget . $before_title . $title . $after_title;
	include get_template_directory() . "/theme/widgets/$name.php";
	echo $after_widget;
}

// PRE Tag Filter
function mframe_pre_filter( $content )
{
	return preg_replace( '~(<pre\b[^>]*>)(.*?)(</pre>)~ise', '"$1" . esc_attr( "$2" ) . "$3"', $content );
}
add_filter( 'the_content', 'mframe_pre_filter', 1, 1 );

// New Excerpt Length
function mframe_excerpt_length( $length )
{
	return mframe_option( 'excerpt-length' );
}
add_filter( 'excerpt_length', 'mframe_excerpt_length' );

// New Excerpt More
function mframe_excerpt_more( $more )
{
	return ' ...';
}
add_filter( 'excerpt_more', 'mframe_excerpt_more' );

function mframe_load_prettyphoto( $content )
{
	global $post;
	$pattern = "/<a(.*?)href=('|\")([^>]*).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>(.*?)<\/a>/i";
	$replacement = '<a$1href=$2$3.$4$5 rel="prettyPhoto"$6>$7</a>';
	$content = preg_replace( $pattern, $replacement, $content );
	return $content;
}
add_filter( 'the_content', 'mframe_load_prettyphoto' );
add_filter( 'get_comment_text', 'mframe_load_prettyphoto' );

function mframe_avatar( $avatar )
{
	return str_replace( 'alt', 'title', $avatar );
}
add_filter( 'get_avatar', 'mframe_avatar' );

function mframe_css( $ID )
{
	$defaults = array(
		'color'		=> mframe_option( 'color-' . $ID ),
		'bold'		=> 'normal',
		'height' 	=> 'normal',
		'underline'	=> 'none',
		'italic'	=> 'normal',
		'capitalize'=> 'none',
		'uppercase'	=> 'none'
	);

	$args = mframe_option( 'typography-' . $ID );

	if ( isset( $args['styles']))
		foreach ( $args['styles'] as $key => $value )
			$args[strtolower($value)] = strtolower($value);

	unset( $args['styles']);
	$args = wp_parse_args( $args, $defaults );
	extract( $args, EXTR_SKIP );

	$output = "font-weight: $bold;";
	$output .= "font-size: $size;";
	$output .= "font-family: $family, serif;";
	$output .= "line-height: $height;";
	$output .= "color: $color;";
	$output .= "text-decoration: $underline;";
	$output .= "font-style: $italic;";
	$output .= 'text-transform: ' . ( $capitalize !== 'none' ? $capitalize : $uppercase ) . ';';

	return $output;
}

function mframe_preview( $file = '' )
{
	$file = pathinfo( $file, PATHINFO_EXTENSION );

	if (( $file === 'php' || $file === '' ) && ( isset($_GET['preview']) && $_GET['preview'] == 1 ))
		return '?preview=1&template=' . mframe_option( 'theme-base' ) . '&stylesheet=' . mframe_option( 'theme-base' ) . '&';
}
?>
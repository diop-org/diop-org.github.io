<?php /*
 License: GNU General Public License v3.0
 License URI: http://www.gnu.org/licenses/gpl-3.0.html
 Author: MegaThemes (http://www.megathemes.com)
*/

defined('ABSPATH')
or die('no direct access');

class mFrame_Login_Widget
extends WP_Widget
{
	function mFrame_Login_Widget()
	{
		parent::WP_Widget(
			'mframe-login', __( '8. MegaThemes - Login', 'mframe' ), array(
				'classname'		=> 'one widget_login',
				'description'	=> __( 'Login widget', 'mframe' )
			)
		);
	}

	function update( $new, $instance )
	{
		$instance['title'] = trim( stripslashes( wp_filter_nohtml_kses( $new['title'])));

		return $instance;
	}

	function widget( $args, $instance )
	{
		$args['title'] = $instance['title'];

		mframe_widget( 'login', $args );
	}

	function form( $instance )
	{
		$defaults = array(
			'title' => mframe_option( 'widget-login-title' )
		);
		$instance = wp_parse_args( $instance, $defaults );
		foreach( $instance as $key => $value ) { $instance[$key] = !empty( $instance[$key] ) ? $instance[$key] : $defaults[$key]; }

		echo '<p>';
		echo '<label for="' . $this->get_field_id( 'title' ) . '">' . __( 'Title', 'mframe' ) . ':';
		echo '<input type="text" name="' . $this->get_field_name( 'title' ) . '" value="' . esc_attr( $instance['title']) . '" id="' . $this->get_field_id( 'title' ) . '" class="widefat" />';
		echo '</label>';
		echo '</p>';
	}
}
register_widget( 'mFrame_Login_Widget' );
?>
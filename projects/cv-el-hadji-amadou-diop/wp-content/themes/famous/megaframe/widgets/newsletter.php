<?php /*
 License: GNU General Public License v3.0
 License URI: http://www.gnu.org/licenses/gpl-3.0.html
 Author: MegaThemes (http://www.megathemes.com)
*/

defined('ABSPATH')
or die('no direct access');

class mFrame_Newsletter_Widget
extends WP_Widget
{
	function mFrame_Newsletter_Widget()
	{
		parent::WP_Widget(
			'mframe-newsletter', __( '5. MegaThemes - Newsletter', 'mframe' ), array(
				'classname'		=> 'one widget_newsletter',
				'description'	=> __( 'Newsletter widget', 'mframe' )
			)
		);
	}

	function update( $new, $instance )
	{
		$instance['title']	= trim( stripslashes( wp_filter_nohtml_kses( $new['title'])));
		$instance['service']= $new['service'];
		$instance['list']	= trim( stripslashes( wp_filter_nohtml_kses( $new['list'])));

		return $instance;
	}

	function widget( $args, $instance )
	{
		$args['title']	= $instance['title'];
		$args['service']= $instance['service'];
		$args['list']	= $instance['list'];

		mframe_widget( 'newsletter', $args );
	}

	function form( $instance )
	{
		$defaults = array(
			'title'		=> mframe_option( 'widget-newsletter-title' ),
			'service'	=> mframe_option( 'widget-newsletter-service' ),
			'list'		=> mframe_option( 'mclist' )
		);
		$instance = wp_parse_args( $instance, $defaults );
		foreach( $instance as $key => $value ) { $instance[$key] = !empty( $instance[$key] ) ? $instance[$key] : $defaults[$key]; }

		echo '<p>';
		echo '<label for="' . $this->get_field_id( 'title' ) . '">' . __( 'Title', 'mframe' ) . ':';
		echo '<input type="text" name="' . $this->get_field_name( 'title' ) . '" value="' . esc_attr( $instance['title']) . '" id="' . $this->get_field_id( 'title' ) . '" class="widefat" />';
		echo '</label>';
		echo '</p>';

		echo '<p>';
		echo '<label for="' . $this->get_field_id( 'service' ) . '">' . __( 'Service', 'mframe' ) . ':';
		echo '<select name="' . $this->get_field_name( 'service' ) . '" id="' . $this->get_field_id( 'service' ) . '" class="widefat">';
		echo '<option value="mc"' . selected( $instance['service'], 'mc', 0 ) . '>MailChimp</option>';
		echo '<option value="fb"' . selected( $instance['service'], 'fb', 0 ) . '>FeedBurner</option>';
		echo '</select>';
		echo '</label>';
		echo '</p>';

		echo '<p>';
		echo '<label for="' . $this->get_field_id( 'list' ) . '">' . __( 'List ID', 'mframe' ) . ':';
		echo '<input type="text" name="' . $this->get_field_name( 'list' ) . '" value="' . esc_attr( $instance['list']) . '" id="' . $this->get_field_id( 'list' ) . '" class="widefat" />';
		echo '</label>';
		echo '</p>';
	}
}
register_widget( 'mFrame_Newsletter_Widget' );
?>
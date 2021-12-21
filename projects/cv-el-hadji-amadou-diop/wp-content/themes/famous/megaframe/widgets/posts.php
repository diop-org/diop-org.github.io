<?php /*
 License: GNU General Public License v3.0
 License URI: http://www.gnu.org/licenses/gpl-3.0.html
 Author: MegaThemes (http://www.megathemes.com)
*/

defined('ABSPATH')
or die('no direct access');

class mFrame_Posts_Widget
extends WP_Widget
{
	function mFrame_Posts_Widget()
	{
		parent::WP_Widget(
			'mframe-posts', __( '1. MegaThemes - Recent / Popular Posts', 'mframe' ), array(
				'classname'		=> 'one widget_posts',
				'description'	=> __( 'Recent &amp; popular posts widget', 'mframe' )
		));
	}

	function update( $new, $instance )
	{
		$instance['title']	= $new['type'] == $instance['type'] ? trim( stripslashes( wp_filter_nohtml_kses( $new['title']))) : '';
		$instance['type']	= $new['type'];
		$instance['catid']	= intval( $new['catid']);
		$instance['count']	= intval( $new['count']);

		return $instance;
	}

	function widget( $args, $instance )
	{
		$args['title']	= $instance['title'];
		$args['type']	= $instance['type'];
		$args['catid']	= $instance['catid'];
		$args['count']	= $instance['count'];

		mframe_widget( 'posts', $args );
	}

	function form( $instance )
	{
		$defaults = array(
			'title'	=> $instance['type'] == 'comment_count' ? mframe_option( 'widget-posts-title2' ) : mframe_option( 'widget-posts-title1' ),
			'type'	=> 'date',
			'catid'	=> 0,
			'count'	=> mframe_option( 'widget-posts-count' )
		);
		$instance = wp_parse_args( $instance, $defaults );
		foreach( $instance as $key => $value ) { $instance[$key] = !empty( $instance[$key] ) ? $instance[$key] : $defaults[$key]; }

		echo '<p>';
		echo '<label for="' . $this->get_field_id( 'title' ) . '">' . __( 'Title', 'mframe' ) . ':';
		echo '<input type="text" name="' . $this->get_field_name( 'title' ) . '" value="' . esc_attr( $instance['title']) . '" id="' . $this->get_field_id( 'title' ) . '" class="widefat" />';
		echo '</label>';
		echo '</p>';

		echo '<p>';
		echo '<label for="' . $this->get_field_id( 'type' ) . '">' . __( 'Type', 'mframe' ) . ':';
		echo '<select name="' . $this->get_field_name( 'type' ) . '" id="' . $this->get_field_id( 'type' ) . '" class="widefat">';
		echo '<option value="date"' . selected( $instance['type'], 'date', 0 ) . '>Recent Posts</option>';
		echo '<option value="comment_count"' . selected( $instance['type'], 'comment_count', 0 ) . '>Popular Posts</option>';
		echo '</select>';
		echo '</label>';
		echo '</p>';

		echo '<p>';
		echo '<label for="' . $this->get_field_id( 'catid' ) . '">' . __( 'Category', 'mframe' ) . ':';

		wp_dropdown_categories( array( 'name' => $this->get_field_name( 'catid' ), 'id' => $this->get_field_id( 'catid' ), 'class' => 'widefat', 'show_option_all' => __( 'All', 'mframe' ), 'hierarchical' => 1, 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'selected' => $instance['catid']));

		echo '</label>';
		echo '</p>';

		echo '<p>';
		echo '<label for="' . $this->get_field_id( 'count' ) . '">' . __( 'Number of posts', 'mframe' ) . ':';
		echo '<input type="text" name="' . $this->get_field_name( 'count' ) . '" value="' . $instance['count'] . '" id="' . $this->get_field_id( 'count' ) . '" class="widefat" />';
		echo '</label>';
		echo '</p>';
	}
}
register_widget( 'mFrame_Posts_Widget' );
?>
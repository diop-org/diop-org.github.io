<?php /*
 License: GNU General Public License v3.0
 License URI: http://www.gnu.org/licenses/gpl-3.0.html
 Author: MegaThemes (http://www.megathemes.com)
*/

defined('ABSPATH')
or die('no direct access');

class mFrameDisplay
extends mFrame
{
	var $options = array();

	function __construct()
	{
		parent::__construct();
	}

	function nav( $args = '' )
	{
		$defaults = array( 'menu' => '', 'container' => 'div', 'container_class' => 'menu', 'container_id' => '', 'menu_class' => 'menu', 'menu_id' => '',
		'echo' => true, 'fallback_cb' => 'wp_page_menu', 'before' => '', 'after' => '', 'link_before' => '', 'link_after' => '',
		'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', 'depth' => 0, 'walker' => '', 'theme_location' => 'topmenu', 'show_home' => true );

		$args = wp_parse_args( $args, $defaults );

		wp_nav_menu( $args );
	}

	function slider( $type = '' )
	{
		switch( $type )
		{
			case 'auto' :
				return array(
				'posts_per_page'		=> mframe_option( 'slider-count' ),
				'orderby'				=> mframe_option( 'slider-order' ),
				mframe_option( 'slider-pull-pages' ) ? 'post__in' : 'cat' => mframe_option( 'slider-pull-pages' ) ? mframe_option( 'slider-pages' ) == array(0) ? 0 : mframe_option( 'slider-pages' ) : mframe_option( 'slider-cats' ),
				'post_type'				=> mframe_option( 'slider-pull-pages' ) ? 'page' : 'post',
				'ignore_sticky_posts'	=> 1
				);
			break;

			case 'custom-jquery' : case 'custom-flash' :
				$images = explode( "\n", mframe_option( 'slider-images' ));

				if ( mframe_option( 'slider-randomize' ))
					shuffle( $images );

				$output = $type == 'custom-flash' ? 'xml' : 'html';
				foreach ( (array) $images as $img )
					mframe_display( 'thumb', array( 'size' => 'large', 'output' => $output, 'custom' => $img, 'nothumb' => 'large', 'tip' => false ));
			break;
		}
	}

	function postmeta( $args = '' )
	{
		if( mframe_option( 'show-posted-by' ) || mframe_option( 'show-posted-in' ) || mframe_option( 'show-posted-on' ))
			echo '<div class="meta ' . implode( ' ', $args ) . '"><label>' . __( 'Posted', 'mframe' ) . '</label>';

		if( mframe_option( 'show-posted-by' ) && in_array( 'author', $args ))
		{
			echo '<span class="by">' . __( ' by ', 'mframe' ) . '</span>'; the_author_posts_link();
		}
		if( mframe_option( 'show-posted-in' ) && in_array( 'category', $args ))
		{
			echo '<span class="in">' . __( ' in ', 'mframe' ) . '</span>'; the_category(', ');
		}
		if( mframe_option( 'show-posted-on' ))
		{
			if( in_array( 'date', $args ))
			{
				echo '<span class="on">' . __( ' on ', 'mframe' ) . '</span>'; the_time( 'F j, Y' );
			}
			if( in_array( 'time', $args ))
			{
				echo '<span class="at">' . __( ' at ', 'mframe' ) . '</span>'; the_time();
			}
		}
		if( mframe_option( 'show-posted-by' ) || mframe_option( 'show-posted-in' ) || mframe_option( 'show-posted-on' ))
			echo '</div>';
	}

	function thumb( $args = '' )
	{
		$defaults = array( 'size' => 'small', 'output' => 'html', 'custom' => '', 'nothumb' => 'small', 'tip' => true, 'classes' => array( 'thumb' ));

		$args = wp_parse_args( $args, $defaults );

		extract( $args, EXTR_SKIP );

		if ( !empty( $custom ))
		{
			$src = $custom;
		}
		else
		if ( has_post_thumbnail())
		{
			$src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id()), 'full', false );
			$src = $src[0];
		}
		else
		if ( get_post_meta( get_the_id(), 'thumbnail', true ))
		{
			$src = get_post_meta( get_the_id(), 'thumbnail', true );
		}
		else
		if ( substr_count( get_the_content(), '<img' ))
		{
			$doc = new DOMDocument();
			@$doc->loadHTML( get_the_content());
			$images = simplexml_import_dom( $doc )->xpath( '//img' );
			$img = $images[0];
			$src = $img['src'];
		}
		else
		{
			$src = get_template_directory_uri() . '/images/nothumb-' . $nothumb . '.png';
		}

		if ( is_array( $size ))
		{
			$width = $size[0];
			$height = $size[1];
		}
		else
		{
			$width = mframe_option( 'thumb-' . $size . '-w' );
			$height = mframe_option( 'thumb-' . $size . '-h' );

			$classes[] = $size;
		}

		if ( $tip == true ) $classes[] = 'tip';
		$class = implode( ' ', $classes );

		if ( mframe_option( 'timthumb' ))
			$src = get_template_directory_uri() . '/thumb.php?src=' . $src . '&amp;w=' . $width . '&amp;h=' . $height . '&amp;zc=1';

		if ( $output == 'html' )
			echo '<img class="' . $class . '" src="' . $src . '" alt="' . get_the_title() . '" title="' . get_the_title() . '" width="' . $width . '" height="' . $height . '" />';
		else
		if ( $output == 'xml' )
			echo '<Image Source="' . $src . '"></Image>';
	}

	function pages( $args = false )
	{
		global $wp_query, $wp_rewrite;

		if( is_single() )
		{
			paginate_comments_links(array('type' => 'plain', 'end_size' => 3, 'mid_size' => 2));
		}
		else
		{
			$current = $wp_query->query_vars['paged'] > 1 ? $wp_query->query_vars['paged'] : 1;

			$pagination = array(
				'base'		=> $wp_rewrite->using_permalinks() ? user_trailingslashit(trailingslashit(remove_query_arg('s',get_pagenum_link(1))) . 'page/%#%/', 'paged') : @add_query_arg('paged','%#%'),
				'add_args'	=> !empty($wp_query->query_vars['s']) ? array('s'=>get_query_var('s')) : '',
				'total'		=> $wp_query->max_num_pages,
				'current'	=> $current,
				'end_size'	=> 2,
				'mid_size'	=> 2,
				'type'		=> 'plain',
				'format'	=> '',
			);

			echo paginate_links( $pagination );
		}
	}

	function comment( $comment, $args, $depth )
	{
		$GLOBALS['comment'] = $comment;

		include get_template_directory() . '/theme/comment.php';
	}

	function footer()
	{
		mframe_option( 'hook-footer', 1 );
	}

	function comment_links( $comment, $args, $depth )
	{
		if ( $comment->comment_approved == '0' )
			echo '<em>' . __( 'Your comment is awaiting moderation.', 'mframe' ) . '</em>';

		comment_reply_link( wp_parse_args( $args, array( 'depth' => $depth )));
		edit_comment_link( __( 'Edit', 'mframe' ), '', '' );
	}

	function comments_link( $post )
	{
		if (!empty($post->post_password))
		{
			echo '<a href="' . get_permalink() . '" class="link-comments">' . __( 'Passworded', 'mframe' ) . '</a>';
		}
		else
		{
			comments_popup_link( __( 'No Comments', 'mframe' ), '1 ' . __( 'Comment', 'mframe' ), '% ' . __( 'Comments', 'mframe' ), 'link-comments',  __( 'Comments Off', 'mframe' ) );
		}
	}

	function bookmarks()
	{
		foreach ( (array) $this->mframe['globals']['bookmarks'] as $title => $link )
		{
			$name = strtolower( $title );

			if( $user = mframe_option( "{$name}id" ))
			{
				$link .= $name == 'facebook' && is_numeric( $user ) ? 'profile.php?id=' . $user : $user;

				echo '<li><a href="' . $link . '" title="' . $title . '" class="' . $name . ' tip" target="_blank">' . $title . '</a></li>';
			}
		}
	}

	function ads( $pos = '' )
	{
		if( $pos == 'side' && !( is_home() || is_archive() || is_search() ))
			return false;

		if( mframe_option( "adbox-$pos" ))
			echo '<div class="adbox ad-' . $pos . '">' . mframe_option( "adbox-$pos" ) . '</div>';
	}

	function toggle( $key = '', $args = '' )
	{
		switch( $key )
		{
			case 'location' :
				$defaults = array( 'location' => array() );
				$args = wp_parse_args( $args, $defaults );
				extract( $args, EXTR_SKIP );
				if(
					is_front_page() && in_array( 'home', $location )
					OR is_home() && in_array( 'blog', $location ) && !is_front_page()
					OR is_search() && in_array( 'search', $location )
					OR is_archive() && in_array( 'archive', $location ) && !is_category()
					OR is_category() && in_array( 'category', $location )
					OR is_single() && in_array( 'post', $location )
					OR is_page() && in_array( 'page', $location )
					&& !is_page_template( 'template-home.php' ) && !is_page_template( 'template-blog.php' ) && !is_page_template( 'template-onecolumn.php' )
					OR is_page_template( 'template-home.php' ) && in_array( 'template-home', $location )
					OR is_page_template( 'template-blog.php' ) && in_array( 'template-blog', $location )
					OR is_page_template( 'template-onecolumn.php' ) && in_array( 'template-onecolumn', $location )
				)
				return true;
				break;
		}
	}
}
?>
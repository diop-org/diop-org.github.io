<?php
if (function_exists('register_sidebar')) {

	register_sidebar(array(
		'name' => 'Sidebar',
		'id'   => 'sidebar',
		'description'   => 'This is a widgetized area.',
		'before_widget' => '<div class="sidebar-box">',
		'after_widget'  => '</div><!--sidebar-box ends-->',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	));

}


function diabolique_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div class="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 80 ); ?>
			<?php printf( __( '%s <span class="says">says:</span>', 'diabolique' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php _e( 'Your comment is awaiting moderation.', 'diabolique' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				
				printf( __( '%1$s at %2$s', 'diabolique' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'diabolique' ), ' ' );
			?>
		</div><!-- comment-meta -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'diabolique' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'diabolique'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}


if (function_exists('add_theme_support')) {
   add_theme_support('post-thumbnails');
   add_theme_support('nav-menus'); // For Beta and RC versions of WP 3.0
   add_theme_support('menus'); // For the final release version of WP 3.0
   add_theme_support('automatic-feed-links');
}


register_nav_menus( array(
      'primary' => __( 'Primary Navigation'),
) );

?>
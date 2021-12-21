<?php
		switch ( $comment->comment_type )
		{
			case 'pingback' : case 'trackback' :
				?>

    <li class="ping"><?php _e( 'Pingback:', 'mframe' ); ?> <?php comment_author_link(); edit_comment_link( __( '(Edit)', 'mframe' ), ' ' );

			break;

			default :
				?>

    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
     <?php echo get_avatar( $comment, $args['avatar_size'], '', $comment->comment_author ); ?>
     <div class="author"><h3><?php comment_author(); ?></h3></div>
     <div class="date"><?php comment_date('d/m/Y'); ?></div>
     <div class="website"><?php comment_author_url_link( __( 'Website', 'mframe' ), '', ''); ?></div>
     <div class="text" id="comment-<?php comment_ID(); ?>"><?php comment_text(); ?></div>
     <div class="links"><?php self::comment_links( $comment, $args, $depth ); ?></div><?php

			break;
		}
?>
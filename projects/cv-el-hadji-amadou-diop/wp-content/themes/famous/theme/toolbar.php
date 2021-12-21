   <?php if ( mframe_option( 'show-comment-link' ) || mframe_option( 'show-share' ) || mframe_option( 'show-read-more' ))
   { ?>
   <div class="toolbar-shadow"></div>
   <div class="toolbar">
    <?php if ( mframe_option( 'show-comment-link' )) mframe_display( 'comments_link', $post );

	if ( mframe_option( 'show-share' ))
	{
     if ( !defined( 'a2a' )) : ?>
     <script type="text/javascript" src="http://static.addtoany.com/menu/page.js"></script>
     <?php define( 'a2a', 1 ); endif; ?>
     <a class="link-share a2a_dd" href="http://www.addtoany.com/share_save"><?php _e( 'Share', 'mframe' ); ?></a>
     <script type="text/javascript">
		a2a_config.linkname = '<?php the_title(); ?>';
		a2a_config.linkurl = '<?php the_permalink(); ?>';
		a2a.init('page');
     </script><?php
	}

	if ( mframe_option( 'show-read-more' ))
	{ ?>
     <a href="<?php echo get_permalink() . ( is_single() ? '#respond' : '#more-' . get_the_ID() ); ?>" class="link-more" rel="nofollow"><?php echo is_single() ? __( 'Leave Reply', 'mframe' ) : __( 'Read More', 'mframe' ); ?></a><?php
	} ?>
   </div><?php
   } ?>
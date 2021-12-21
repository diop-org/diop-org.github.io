<?php get_header(); ?>

<div id="header" class="wrap">
 <h1><?php _e( 'Blog', 'mframe' ) ?> // <span><?php _e( 'Latest news and discussions', 'mframe' ); ?></span></h1>
</div>

<div id="content" class="wrap">
 <div id="main"><?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div id="post-<?php the_ID(); ?>" class="post">

   <div class="title">
    <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
    <?php if ( mframe_option( 'show-posted-on' )) { ?>
    <div class="date">
     <span class="day"><?php the_time('d'); ?></span>
     <span class="month"><?php the_time('M'); ?><br /><?php the_time('Y'); ?></span>
    </div><?php } edit_post_link( __( 'Edit', 'mframe' ), '<div class="edit">', '</div>'); ?>
   </div>

   <div class="entry"><?php

	mframe_display( 'postmeta', array( 'author', 'category' )); ?>
	<a href="<?php echo wp_get_attachment_url( $post->ID ); ?>"><?php echo wp_get_attachment_image( $post->ID, 'medium' ); ?></a>
    <?php wp_link_pages('before=<p class="clear">&after=</p>');

	// Only pings are open
	if (!('open' == $post-> comment_status) && ('open' == $post->ping_status))
        echo '<p class="rules">' . __( 'Responses are currently closed, but you can <a href="' . get_trackback_url() . '" rel="trackback">trackback</a> from your own site.', 'mframe' ) . '</p>';

	// Comments are open, pings are not
	elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status))
        echo '<p class="rules">' . __( 'You can skip to the end and leave a response. Pinging is currently not allowed.', 'mframe' ) . '</p>';

	// Neither comments, nor pings are open
	elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status))
        echo '<p class="rules">' . __( 'Both comments and pings are currently closed.', 'mframe' ) . '</p>';

	if ( mframe_option( 'show-tags' )) the_tags( '<div class="tags">' . __( 'Tags: ', 'mframe' ), ', ', '</div>' ); ?>

   </div>
   <?php get_template_part( 'theme/toolbar' ); ?>

   <div class="alignleft" style="margin-top: 15px;"><?php previous_image_link( '', '&laquo; Previous Image'); echo '   &#8734;   '; next_image_link( '', 'Next Image &raquo;');  ?></div>
   <div class="alignright" style="margin-top: 15px;"><?php previous_post_link( '%link', 'Back to gallery &raquo;' ); ?></div>

  </div><?php endwhile; if ( mframe_option( 'show-comments' )) comments_template(); endif; ?>

 </div>
 <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
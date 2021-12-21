  <?php if ( mframe_option( 'pages-above-posts' )) { ?><div class="pages"><?php mframe_display( 'pages' ); ?></div><?php } ?>

  <?php if ( have_posts()) : $i = 1; while ( have_posts()) : the_post(); ?>

  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

   <div class="title">
    <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo get_the_title() == '' ? 'No Title' : get_the_title(); ?></a></h2>
    <?php if ( mframe_option( 'show-posted-on' )) { ?>
    <div class="date">
     <span class="day"><?php the_time( 'd' ); ?></span>
     <span class="month"><?php the_time( 'M' ); ?><br /><?php the_time( 'Y' ); ?></span>
    </div><?php } edit_post_link( __( 'Edit', 'mframe' ), '<div class="edit">', '</div>' ); ?>
   </div>

   <div class="entry"><?php
    mframe_display( 'postmeta', array( 'author', 'category' ));

    if ( mframe_option( 'thumb-medium-show' ))
		if ( mframe_enable( 'location', array( 'location' => mframe_option( 'thumb-medium-location' ))))
			mframe_display( 'thumb', array( 'size' => 'medium', 'nothumb' => 'medium', 'tip' => false ));

    mframe_option( 'show-excerpt' ) ? the_excerpt() : the_content(); wp_link_pages('before=<p class="clear">&after=</p>');

    if ( mframe_option( 'show-tags' )) the_tags( '<div class="tags">' . __( 'Tags: ', 'mframe' ), ', ', '</div>' ); ?>
   </div>
   <?php get_template_part( 'theme/toolbar' ); ?>
   <?php if ( $i == mframe_option( 'adbox-posts-position' )) mframe_display( 'ads', 'posts' ); ?>

  </div><?php $i++; endwhile; else: get_template_part( 'theme/404' ); endif; ?>

  <?php if ( mframe_option( 'pages-below-posts' )) { ?><div class="pages"><?php mframe_display( 'pages' ); ?></div><?php } ?>
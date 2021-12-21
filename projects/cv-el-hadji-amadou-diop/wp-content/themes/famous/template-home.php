<?php /* Template Name: Home */ get_header(); ?>

<?php get_template_part( 'theme/action-boxes' ); ?>

<div id="content" class="wrap">
 <div id="main" style="width: 632px;"><?php

	if ( mframe_option( 'summary-show' ))
	{ ?>

  <div id="summary" class="post page">
   <div class="entry"><?php

		if ( mframe_option( 'summary-source-page' ))
		{
			$query = new WP_Query( 'posts_per_page=1&post_type=page&page_id=' . mframe_option( 'summary-page' ));
			while ( $query->have_posts()) : $query->the_post(); ?>

    <h2><?php the_title(); ?></h2>
    <?php the_content();

			endwhile; wp_reset_postdata();
		}
		else
		{ ?>

    <h2><?php mframe_option( 'summary-title', 1 ); ?></h2>
    <p><?php mframe_option( 'summary-text', 1 ); ?></p><?php

		} ?>

   </div>
  </div><?php

	}

  if ( mframe_option( 'feature-boxes-show' )) get_template_part( 'theme/feature-boxes' );
  if ( mframe_option( 'front-blog-show' )) get_template_part( 'loop' ); ?>

 </div>
 <div id="side" class="widgetized">
  <?php if ( !dynamic_sidebar( 'home' )) { mframe_widget( 'newsletter' ); mframe_widget( 'calendar' ); mframe_widget( 'register' ); } ?>
 </div>
</div>

<?php get_footer(); ?>
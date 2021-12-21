   <ul><?php
   $query = new WP_Query( 'ignore_sticky_posts=1&orderby=' . $type . '&cat=' . $catid . '&posts_per_page=' . $count );
   while ( $query->have_posts() ) : $query->the_post(); ?>

    <li>
     <?php mframe_display( 'thumb' ); ?>

     <div class="title"><a href="<?php the_permalink(); ?>"><?php echo substr(get_the_title(), 0, 40); ?>...</a></div>
     <span class="date"><?php the_time('F j, Y'); ?></span><span class="comments"><?php mframe_display( 'comments_link', $query->post ); ?></span>
    </li><?php endwhile; wp_reset_postdata(); ?>

   </ul>
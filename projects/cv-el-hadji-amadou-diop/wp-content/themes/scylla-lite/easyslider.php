<?php $option =  get_option('scl_options'); ?>
<div id="slider">
        <ul>
        <?php $loop = new WP_Query( array( 'post_type' => 'slider', 'posts_per_page' => $option['scl_num_sld'] ) ); ?>
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
         <li> 
         <div class="slider-content">
            <?php the_title( '<h2 class="entry-title"><a href="' . get_post_meta($post->ID, 'slide_link', TRUE) . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' ); ?>
                <a href="<?php echo get_post_meta($post->ID, 'slide_link', TRUE); ?>"><?php the_excerpt(); ?></a>
            </div>  
        <?php the_post_thumbnail(); ?>
            </li>
        <?php endwhile; ?>
        </ul>
</div>
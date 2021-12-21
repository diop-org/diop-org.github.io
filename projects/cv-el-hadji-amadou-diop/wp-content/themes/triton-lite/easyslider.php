<?php $option =  get_option('trt_options'); ?>
<div id="slider" class="easyslider">
        <ul>
        <?php $loop = new WP_Query( array( 'post_type' => 'slider', 'posts_per_page' => $option['trt_num_sld'] ) ); ?>
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
         <li> 
         <div class="slider-content">
         <?php $trtdata = get_post_meta($post->ID, 'trt_slide_link', TRUE); ?>
            <?php the_title( '<h2 class="entry-title"><a href="' . $trtdata . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' ); ?>
                <a href="<?php echo $trtdata; ?>"><?php the_excerpt(); ?></a>
            </div>  
        <?php the_post_thumbnail(); ?>
            </li>
        <?php endwhile; ?>
        </ul>
</div>
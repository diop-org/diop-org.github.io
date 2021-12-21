<?php global $theme; ?>
    
    <div <?php post_class('post post-box clearfix'); ?> id="post-<?php the_ID(); ?>">
    
        <h2 class="title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'themater' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        
        <div class="postmeta-primary">

            <span class="meta_date"><?php echo get_the_date(); ?></span>
            
            <?php if(comments_open( get_the_ID() ))  {
                    ?> &nbsp; <span class="meta_comments"><?php comments_popup_link( __( 'No comments', 'themater' ), __( '1 Comment', 'themater' ), __( '% Comments', 'themater' ) ); ?></span><?php
                }
            ?> 
        </div>
        
        <div class="entry clearfix">
            
            <?php
                if(has_post_thumbnail())  {
                    ?>
                    <div class="featured-image-container"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a></div><?php  
                }
            ?>
             <p>
                <?php
                  echo $theme->shorten(get_the_excerpt(), '32');
                ?>
             </p>

        </div>
        
        <?php if($theme->display('read_more')) { ?>
        <div class="readmore">
            <a href="<?php the_permalink(); ?>#more-<?php the_ID(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'themater' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php $theme->option('read_more'); ?></a>
        </div>
        <?php } ?>
        
    </div><!-- Post ID <?php the_ID(); ?> -->
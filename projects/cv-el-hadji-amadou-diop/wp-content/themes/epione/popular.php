<?php if(get_option('ep_hide_pp_block')) { ?>
<?php } else { ?>
<div class="pop_top"></div><ul class="popular"><li>
                <h2>Popular Posts</h2>
                <ul>
                <?php query_posts(array('orderby' => 'comment_count','posts_per_page'=>3)); ?>
                <?php if(have_posts()): ?><?php while(have_posts()): ?><?php the_post(); ?>
                <li>
                <?php
				$content = $post->post_content;
				$searchimages = '~<img [^>]* />~';				
				preg_match_all( $searchimages, $content, $pics );
				
				$iNumberOfPics = count($pics[0]);
				if ( $iNumberOfPics > 0 ) { ?>
                

                    <?php the_thumb('thumbnail');?>
                    <?php } else { ?>
                    <div class="pop_frame"></div>
                     <?php } ?>
                    <a class="poptitle" href="<?php the_permalink();?>"><?php the_title(); ?></a>
                    <?php wpe_excerpt('wpe_excerptlength_index', 'wpe_excerptmore'); ?>

                    
				<?php endwhile ?>
                <?php endif ?>
                <?php wp_reset_query(); ?></li>
                                
                </ul>
                </li></ul>
<div class="pop_bottom"></div>
<?php } ?>
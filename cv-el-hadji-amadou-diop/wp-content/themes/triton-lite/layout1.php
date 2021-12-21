<?php $option =  get_option('trt_options'); ?>
<div class="lay1">

                   <?php if(have_posts()): ?><?php while(have_posts()): ?><?php the_post(); ?>
                <div <?php post_class(); ?> id="post-<?php the_ID(); ?>"> 
                
                <div class="post_image">
                     <!--CALL TO POST IMAGE-->
                    <?php if ( has_post_thumbnail() ) : ?>
                    <div class="imgwrap">
						<?php if($option["trt_diss_date"] == "1"){ ?><?php } else { ?>
                        <div class="date_meta"><?php the_time('d'); ?>. <?php the_time('m'); ?>. <?php the_time('Y'); ?></div>
                        <div class="block_comm"><?php if (!empty($post->post_password)) { ?>
                <?php } else { ?><div class="comments"><?php comments_popup_link( __('0 Comment', 'Triton'), __('1 Comment', 'Triton'), __('% Comment', 'Triton'), '', __('Off' , 'Triton')); ?></div><?php } ?></div>
                        <?php } ?>
                        
                    <a href="<?php the_permalink();?>"><?php the_post_thumbnail('medium'); ?></a></div>
                    
                    <?php elseif($photo = trt_get_images('numberposts=1', true)): ?>
    
                    <div class="imgwrap">
						<?php if($option["trt_diss_date"] == "1"){ ?><?php } else { ?>
                        <div class="date_meta"><?php the_time('d'); ?>. <?php the_time('m'); ?>. <?php the_time('Y'); ?></div>
                        <div class="block_comm"><?php if (!empty($post->post_password)) { ?>
                <?php } else { ?><div class="comments"><?php comments_popup_link( __('0 Comment', 'Triton'), __('1 Comment', 'Triton'), __('% Comment', 'Triton'), '', __('Off' , 'Triton')); ?></div><?php } ?></div>
                        <?php } ?>
                        
                	<a href="<?php the_permalink();?>"><?php echo wp_get_attachment_image($photo[0]->ID ,'medium'); ?></a></div>
                
                    <?php else : ?>
                    
                    <div class="imgwrap">
						<?php if($option["trt_diss_date"] == "1"){ ?><?php } else { ?>
                        <div class="date_meta"><?php the_time('d'); ?>. <?php the_time('m'); ?>. <?php the_time('Y'); ?></div>
                        <div class="block_comm"><?php if (!empty($post->post_password)) { ?>
                <?php } else { ?><div class="comments"><?php comments_popup_link( __('0 Comment', 'Triton'), __('1 Comment', 'Triton'), __('% Comment', 'Triton'), '', __('Off' , 'Triton')); ?></div><?php } ?></div>
                        <?php } ?>
                        
                    <a href="<?php the_permalink();?>"><img src="<?php echo get_template_directory_uri(); ?>/images/blank_img.png" alt="<?php the_title_attribute(); ?>" class="trt_thumbnail"/></a></div>   
                             
                    <?php endif; ?>

                </div>
                <div class="post_content">
                    <h2 class="postitle"><a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                    <?php trt_excerpt('trt_excerptlength_teaser', 'trt_excerptmore'); ?> 
                    <a class="read_mor" href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>"><?php _e('Read More &rarr;', 'triton'); ?></a>
                </div>
                        </div>
            <?php endwhile ?> 

            <?php endif ?>

	</div>
                     <div class="lay1_page"><?php if (function_exists("trt_paginate")) {
                trt_paginate();
                 } ?>  </div><div class="hidden_nav"><?php paginate_links(); ?></div>
<br style="clear:both" />


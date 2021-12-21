<?php $option =  get_option('scl_options'); ?>
<div id="content"> 
        <!--Slider-->
        <div id="slide_wrap">
        <?php if($option["scl_diss_rbn"] == "1"){ ?><?php } else { ?><div class="ribbon"><?php echo $option['scl_rbn_txt'] ?></div><?php } ?>
        <?php if($option['scl_slider']== "Easyslider") { ?>
        <?php get_template_part('easyslider'); ?>
        <?php }?>
        </div>

       
        <!--POSTS-->
        <div id="posts">
        
            <div id="lay1">
            <?php if(have_posts()): ?><?php while(have_posts()): ?><?php the_post(); ?>
                <div <?php post_class(); ?> id="post-<?php the_ID(); ?>"> 
                
            <!--THE Date Badge-->    
            <?php if($option["scl_diss_date"] == "1"){ ?>
        	<?php } else { ?> 

        	<div class="date"><div class="date_content"><?php the_time('dS'); ?> <?php the_time('M'); ?><span><?php the_time('Y'); ?></span></div></div>		
			<?php }?>
                
                <div class="post_image">
                     <!--CALL TO POST IMAGE-->
                    <?php if ( has_post_thumbnail() ) : ?>
                    <div class="imgwrap"><a href="<?php the_permalink();?>"><?php the_post_thumbnail('medium'); ?></a></div>
                    
                    <?php elseif($photo = scl_get_images('numberposts=1', true)): ?>
    
                    <div class="imgwrap">
                	<a href="<?php the_permalink();?>"><?php echo wp_get_attachment_image($photo[0]->ID ,'medium'); ?></a></div>
                
                    <?php else : ?>
                    
                    <div class="imgwrap"><a href="<?php the_permalink();?>"><img src="<?php echo get_template_directory_uri(); ?>/images/blank_img.png" alt="<?php the_title_attribute(); ?>" class="thumbnail"/></a></div>   
                             
                    <?php endif; ?>

                </div>
                
                
                <div class="post_content">
                    <h2 class="postitle"><a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                    <?php scl_excerpt('scl_excerptlength_teaser', 'scl_excerptmore'); ?>
                </div>
                
                <div class="post_meta"><div class="block_comm"><?php if (!empty($post->post_password)) { ?>
        	<?php } else { ?><div class="comments"><?php comments_popup_link('0 <span>Comm</span>', '1 <span>Comm</span>', '% <span>Comm</span>', '', __('Off')); ?></div><?php } ?></div></div>
                
                </div>
                
             <?php endwhile ?>
            <?php if (function_exists("scylla_paginate")) {
                scylla_paginate();
                 } ?>   
            <?php endif ?>
            </div>
            
        </div>
</div>

    <!--Sidebar-->
<?php get_sidebar(); ?>
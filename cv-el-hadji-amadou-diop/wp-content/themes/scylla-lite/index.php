<?php $option =  get_option('scl_options'); ?>
<?php get_header(); ?>


     <?php if ( is_home() ) { ?>
        <!--Content-->
        <?php if( empty($option['scl_lay'])) { ?>
        <?php get_template_part('layout1');?>
    	<?php }?>
        <?php if($option['scl_lay']== "Layout 1") { ?>
        <?php get_template_part('layout1');?>
    	<?php }?>
        <?php if($option['scl_lay']== "Layout 2") { ?>
        <?php get_template_part('layout2');?>
    	<?php }?>
    
    <?php } else { ?>
<div id="content">

          <!--THE POST-->
            <?php if(have_posts()): ?><?php while(have_posts()): ?><?php the_post(); ?>
                <div <?php post_class(); ?> id="post-<?php the_ID(); ?>"> 
            <!--THE Date Badge-->    
            <?php if($option["scl_diss_date"] == "1"){ ?>
        	<?php } else { ?> 

        	<div class="date"><div class="date_content"><?php the_time('dS'); ?> <?php the_time('M'); ?><span><?php the_time('Y'); ?></span></div></div>		
			<?php }?>

                   <div class="post_content">
                    <h2 class="postitle"><a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                    <div class="single_metainfo">by <?php the_author(); ?></div>
                    <?php the_content(); ?>
                    <?php wp_link_pages('<p class="pages"><strong>'.__('Pages:').'</strong> ', '</p>', 'number'); ?>
                </div> 
                
                <!--Post Footer-->
                <div class="edit"><?php edit_post_link(); ?></div>
                <div class="post_foot">
                    <div class="post_meta">
                    <div class="post_cat"><?php _e('Category' , 'Scylla'); ?> : <?php the_category(', '); ?></div>
                    
                    <?php if( has_tag() ) { ?><div class="post_tag"><?php _e('Tags' , 'Scylla'); ?> : <?php the_tags(' '); ?></div><?php } else { ?><?php } ?>
                    </div>
                    
                    <div class="block_comm"><?php if (!empty($post->post_password)) { ?>
                <?php } else { ?><div class="comments"><?php comments_popup_link('0 <span>Comm</span>', '1 <span>Comm</span>', '% <span>Comm</span>', '', __('Off')); ?></div><?php } ?></div>
               
               </div>
                   
           		</div>
                <?php endwhile ?>
                 <?php if (function_exists("scylla_paginate")) {
                scylla_paginate();
                 } ?>   
                 <div class="hidden_nav"><?php posts_nav_link(); ?></div>
            <?php endif ?>    

</div> 
        
    <!--Sidebar-->
    <?php get_sidebar(); ?> 
<?php } ?> 
<?php get_footer(); ?>
<?php
/*
Template Name: Page with No Sidebar
*/
?>
<?php get_header(); ?>

	<!--Content-->
    <div id="content3">
        
        <!--POSTS-->
        <div id="posts" class="single_page_post">

          <!--THE POST-->
            <?php if(have_posts()): ?><?php while(have_posts()): ?><?php the_post(); ?>
                <div <?php post_class(); ?> id="post-<?php the_ID(); ?>"> 
                 
                   <div class="post_content">
                    <h2 class="postitle"><a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                    <?php the_content(); ?>
                    <?php wp_link_pages('<p class="pages"><strong>'.__('Pages:').'</strong> ', '</p>', 'number'); ?>
                </div> 
                
                    <!--Post Footer-->
                    <div class="edit"><?php edit_post_link(); ?></div>
                    <?php if (get_comments_number()==0) { ?>
                    <?php } else { ?>
                    <div class="post_foot">
                        
                        <div class="block_comm"><?php if (!empty($post->post_password)) { ?>
                    <?php } else { ?><div class="comments"><?php comments_popup_link('0 <span>Comm</span>', '1 <span>Comm</span>', '% <span>Comm</span>', '', __('Off')); ?></div><?php } ?></div>
                   
                   </div>
                   <?php }?>
                   
           		</div>
                <div class="comments_template"><?php comments_template('',true); ?></div>
                <?php endwhile ?>
            <?php endif ?>     
            
        </div>
        
    </div>
    
    
    
<?php get_footer(); ?>
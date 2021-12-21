<?php $option =  get_option('scl_options'); ?>
<?php get_header(); ?>

	<!--Content-->
    <div id="content">
        
        <!--POSTS-->
        <div id="posts" class="single_page_post">

          <!--THE POST-->
            <?php if(have_posts()): ?><?php while(have_posts()): ?><?php the_post(); ?>
                <div <?php post_class(); ?> id="post-<?php the_ID(); ?>"> 
                 <div class="date"><div class="date_content"><?php the_time('dS'); ?> <?php the_time('M'); ?><span><?php the_time('Y'); ?></span></div></div>
                   <div class="post_content">
                    <h2 class="postitle"><a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                    <div class="single_metainfo">by <?php the_author(); ?></div>
                    <?php the_content(); ?>
                    <?php wp_link_pages('<p class="pages"><strong>'.__('Pages:').'</strong> ', '</p>', 'number'); ?>
                </div> <div style="clear:both"></div>
                
                <!--Post Footer-->
                <div class="edit"><?php edit_post_link(); ?></div>
                <div class="post_foot">
                    <div class="post_meta">
                    <div class="post_cat"><?php _e('Category' , 'Scylla'); ?> : <?php the_category(', '); ?></div>
                    
                    <?php if( has_tag() ) { ?><div class="post_tag"><?php _e('Tags' , 'Scylla'); ?> : <?php the_tags(' '); ?></div><?php } else { ?><?php } ?>
                    </div>
                    
                    <div class="block_comm2"><?php if (!empty($post->post_password)) { ?>
                <?php } else { ?><div class="comments"><?php comments_popup_link('0 <span>Comm</span>', '1 <span>Comm</span>', '% <span>Comm</span>', '', __('Off')); ?></div><?php } ?></div>
               
               </div>
                   
           		</div>
                <!--Share This-->
                <?php if($option["scl_diss_sss"] == "1"){ ?><?php } else { ?>
                <?php get_template_part('share_this');?>
                 <?php } ?>

                <?php endwhile ?>
                
               <div class="comments_template"><?php comments_template('',true); ?></div>   
            <?php endif ?>
            
        </div>
        
    </div>
    
    <!--Sidebar-->
    <?php get_sidebar(); ?>
<?php get_footer(); ?>
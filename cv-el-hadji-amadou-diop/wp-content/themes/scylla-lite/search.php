<?php get_header(); ?>

<div id="content">

<div class="search_term"><h2 class="postsearch"><?php printf( __( 'Search Results for: %s', 'scylla' ), '<span>' . esc_html( get_search_query() ) . '</span>'); ?></h2>
            <a class="search_count"><?php _e('Total posts found for', 'scylla'); ?> <?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = esc_html($s, 1); $count = $allsearch->post_count; _e('', 'scylla'); _e('<span class="search-terms">"', 'scylla'); echo $key; _e('"</span>', 'scylla'); _e(' &mdash; ', 'scylla'); echo $count . ''; wp_reset_query(); ?></a>
            </div>


          <!--THE POST-->
            <?php if(have_posts()): ?><?php while(have_posts()): ?><?php the_post(); ?>
                <div <?php post_class(); ?> id="post-<?php the_ID(); ?>"> 
                 <div class="date"><div class="date_content"><?php the_time('dS'); ?> <?php the_time('M'); ?><span><?php the_time('Y'); ?></span></div></div>
                   <div class="post_content">
                    <h2 class="postitle"><a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                    <div class="single_metainfo">by <?php the_author(); ?></div>
                    <?php the_excerpt(); ?>
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
            <?php endif ?>    

</div> 
        
    <!--Sidebar-->
    <?php get_sidebar(); ?> 

<?php get_footer(); ?>
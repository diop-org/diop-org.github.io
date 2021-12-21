<?php get_header(); ?>
<?php $option =  get_option('trt_options'); ?>

<!--CONTENT-->
<div id="content">

<div class="center">

    <div class="search_term"><h2 class="postsearch"><?php printf( __( 'Search Results for: %s', 'triton' ), '<span>' . esc_html( get_search_query() ) . '</span>'); ?></h2>
            <a class="search_count"><?php _e('Total posts found for', 'triton'); ?> <?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = esc_html($s, 1); $count = $allsearch->post_count; _e('', 'triton'); _e('<span class="search-terms">"', 'triton'); echo $key; _e('"</span>', 'triton'); _e(' &mdash; ', 'triton'); echo $count . ''; wp_reset_query(); ?></a>
            </div>
            
        <?php if( empty($option['trt_lay'])) { ?>
        <?php get_template_part('layout1');?>
    	<?php }?>
        <?php if($option['trt_lay']== "Layout 1") { ?>
        <?php get_template_part('layout1');?>
    	<?php }?> 
    
        </div> 
</div>
</div>

<?php get_footer(); ?>
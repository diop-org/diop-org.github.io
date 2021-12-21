<?php $option =  get_option('trt_options'); ?>
<?php get_header(); ?>

<!--CONTENT-->
<div id="content">

<div class="center">
    <div id="posts" class="single_page_post">
    <div class="post_wrap">
              <!--THE POST-->
                <?php if(have_posts()): ?><?php while(have_posts()): ?><?php the_post(); ?>
                    <div <?php post_class(); ?> id="post-<?php the_ID(); ?>"> 
                     
                       <div class="post_content">
                        <h2 class="postitle"><a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                        <?php if($option["trt_diss_date"] == "1"){ ?><?php } else { ?>
                        <div class="single_metainfo">On <?php the_time( get_option('date_format') ); ?> by <?php the_author(); ?></div>
                        <?php } ?>
                        
                        <?php the_content(); ?>
                        <div style="clear:both"></div>
                        <?php wp_link_pages('<p class="pages"><strong>'.__('Pages:').'</strong> ', '</p>', 'number'); ?>
                    
                    
                    <!--Post Footer-->
                    <div class="post_foot">
                    <?php if($option["trt_diss_cats"] == "1"){ ?><?php } else { ?>
                        <div class="post_meta">
                        <div class="post_cat"><?php _e('Category' , 'Triton'); ?> : <?php the_category(', '); ?></div>
                        
                        <?php if( has_tag() ) { ?><div class="post_tag"><?php _e('Tags' , 'Triton'); ?> : <?php the_tags(' '); ?></div><?php } else { ?><?php } ?>
                        </div>
                       <?php } ?> 
                        
                   </div><div class="edit"><?php edit_post_link(); ?></div>

                    
                    
                    </div> 
                    

                       
                    </div>
                <!--Share This-->
                <?php if($option["trt_diss_sss"] == "1"){ ?><?php } else { ?>
                <?php get_template_part('share_this');?>
                 <?php } ?>
    
                    <?php endwhile ?>
                    
                   <div class="comments_template"><?php comments_template('',true); ?></div>   
                <?php endif ?>
                
            </div>
</div>
    <?php get_sidebar(); ?>
</div>
</div>




<?php get_footer(); ?>
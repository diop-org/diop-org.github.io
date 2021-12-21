<?php
/*
Template Name: Left Sidebar
*/
?>

<?php get_header(); ?>

<!--CONTENT-->
<div id="content" class="left_sidebar">

<div class="center">
<!--Sidebar-->
<?php get_sidebar(); ?>
 <!--POSTS-->   
    <div id="posts" class="single_page_post">
    <div class="post_wrap">
              <!--THE POST-->
                <?php if(have_posts()): ?><?php while(have_posts()): ?><?php the_post(); ?>
                    <div <?php post_class(); ?> id="post-<?php the_ID(); ?>"> 
                     
                       <div class="post_content">
                        <h2 class="postitle"><a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                        
                        <?php the_content(); ?>
                        <?php wp_link_pages('<p class="pages"><strong>'.__('Pages:').'</strong> ', '</p>', 'number'); ?>
                    
                    <!--Post Footer-->
<div class="edit"><?php edit_post_link(); ?></div><div style="clear:both"></div>
                    
                    </div> 
                    

                       
                    </div>
    
                    <?php endwhile ?>
                    
                   <div class="comments_template"><?php comments_template('',true); ?></div>   
                <?php endif ?>
                
            </div>
</div>
    
</div>
</div>




<?php get_footer(); ?>
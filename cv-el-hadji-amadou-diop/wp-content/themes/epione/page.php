<?php get_header(); ?>

<!--CONTENT-->
<div id="content">
	<div id="posts">    
            <?php if(have_posts()): ?><?php while(have_posts()): ?><?php the_post(); ?>
            <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">            
            <div class="postbg_top">
                <div class="comments"><?php comments_popup_link('0', '1', '%', '', __('Off')); ?></div>
                <div class="edit"><?php edit_post_link(); ?></div>
            </div>

				<div class="postcontent">                

                    <h2 class="postitle"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
                    <?php the_content(); ?>
                    <?php wp_link_pages('<p class="pages"><strong>'.__('Pages:').'</strong> ', '</p>', 'number'); ?>
                
                </div>
    		<div class="postbg_bottom"></div>
			</div>
            <div class="comments_template"><?php comments_template('',true); ?></div>
				<?php endwhile ?>
                <?php endif ?>

    </div>
</div>
<!--CONTENT END-->


<!--SIDEBAR-->
<div id="not_home_s">
<?php get_sidebar(); ?>
</div>
<!--SIDEBAR END-->

</div>
<!--Footer-->
<?php get_footer(); ?>
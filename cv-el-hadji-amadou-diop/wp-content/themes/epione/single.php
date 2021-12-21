<?php get_header(); ?>

<!--CONTENT-->
<div id="single_content">
	<div id="posts">    
            <?php if(have_posts()): ?><?php while(have_posts()): ?><?php the_post(); ?>
            <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">            
            <div class="postbg_top">
            <?php if (!empty($post->post_password)) { ?>
        	<?php } else { ?><div class="comments"><?php comments_popup_link('0', '1', '%', '', __('Off')); ?></div><?php } ?>
                <div class="edit"><?php edit_post_link(); ?></div>
            </div>

				<div class="postcontent">                 
                <div class="post_content">
                    <h2 class="postitle"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
                    <?php the_content(); ?>
                    <?php wp_link_pages('<p class="pages"><strong>'.__('Pages:').'</strong> ', '</p>', 'number'); ?>
                    <div class="post_meta">
                    <div class="author"><?php the_author(); ?></div>
                    <div class="date_meta"><?php the_date(); ?></div>
                    <div class="category_meta"><?php the_category(', '); ?></div>
                    <div class="tags"><?php the_tags(' '); ?> </div>
                    </div>
                </div>
                
                </div>
    		<div class="postbg_bottom"></div>
            
				<?php if(get_option('ep_hide_share')) { ?>
        		<?php } else { ?>
                <div class="social_links">
				<?php get_template_part( 'social' ); ?>
                  </div>
				<?php } ?>
                
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
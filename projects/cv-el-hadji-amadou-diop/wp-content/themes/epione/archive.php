<?php get_header(); ?>

<!--CONTENT-->
<div id="content">
	<div id="posts">    
            <?php if(have_posts()): ?><?php while(have_posts()): ?><?php the_post(); ?>
            <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">            
            <div class="postbg_top">
            <?php if (!empty($post->post_password)) { ?>
        	<?php } else { ?><div class="comments"><?php comments_popup_link('0', '1', '%', '', __('Off')); ?></div><?php } ?>
                <div class="edit"><?php edit_post_link(); ?></div>
            </div>

				<div class="postcontent">
                <?php
				$content = $post->post_content;
				$searchimages = '~<img [^>]* />~';				
				preg_match_all( $searchimages, $content, $pics );
				
				$iNumberOfPics = count($pics[0]);
				if ( $iNumberOfPics > 0 ) { ?>

				<?php the_thumb('medium'); ?>
                <?php } else { ?>
                <div class="imgframe"></div>
                 <?php } ?>

                 
                <div class="post_content">
                    <h2 class="postitle"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
                    <?php the_excerpt(); ?>
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
                <div class="social_links">
                <a class="read" title="Read the rest of this post" href="<?php the_permalink(); ?>">read more</a>
                  </div>
			</div>
				<?php endwhile ?>
                <div class="navigation">
                    <div class="nxt_page"><?php previous_posts_link('New Entries »', 0); ?></div>
                    <div class="prv_page"><?php next_posts_link('« Old Entries', '0') ?></div>
                 </div>  
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
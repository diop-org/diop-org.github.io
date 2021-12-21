<?php get_header(); ?>
    
    <div class="content-wrapper blog">
        <?php get_sidebar(); ?>
        
        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class('pagepost'); ?>>

            <h2 class="post-title">
                <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
            </h2>
            
            <div class="metalinks">
                <span class="by">by <?php the_author_posts_link(); ?></span>
                <span class="date">on <a href="<?php the_permalink() ?>"><?php the_time('m/d/Y'); ?></a></span>
                <?php comments_popup_link('0', '1', '%', 'comment_bubble'); ?> <?php edit_post_link('Edit', '| ', ''); ?> 
            </div>            
            
            <div class="entry">
                <?php the_content(); ?>
                <?php edit_post_link('+ Edit', '', ''); ?>
            </div>
            
            <?php wp_link_pages(); ?>
            
            <?php comments_template('', true); ?> 
                        
    	</div>
        
        <?php endwhile; ?>
        <?php endif; ?>
    </div>
            
<?php get_footer(); ?>
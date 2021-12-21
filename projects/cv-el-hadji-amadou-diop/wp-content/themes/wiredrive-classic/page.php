<?php get_header(); ?>
    
    <div class="content-wrapper">
        <?php get_sidebar(); ?>
        
        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class('pagepost'); ?>>
            
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
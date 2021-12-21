<?php get_header(); ?>
 <div id="content">
			<?php if(have_posts()):?> 
                  
                <?php while(have_posts()):the_post();?>
                    
                    <div class="post">
                    
                        <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>				
                        <div class="entry-date"><?php the_time('F jS, Y') ?></div>		 	
                        <div class="entry-content">
                            <?php the_content(); ?>
                            <?php wp_link_pages(); ?>
                            <?php edit_post_link('Edit', '<p>', '</p>'); ?> 
                        </div>				
                        <div class="entry-meta">Posted by <?php the_author(); ?> under <?php the_category(', ') ?> with <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?> <br /><?php the_tags(); ?></div>
                    
                    </div>
                    
                <?php endwhile; ?>
                
                <div class="navigation"><?php posts_nav_link(); ?></div>
                
            <?php endif; ?>
            
         </div> <!--/content-->
<?php get_sidebar(); ?>  
<?php get_rightsidebar(); ?>  
<?php get_bottom(); ?>
<?php get_footer(); ?>

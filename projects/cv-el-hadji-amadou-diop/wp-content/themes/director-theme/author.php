<?php get_header(); ?>
<div class="middle_single"><!-- Single Archive Page Starts -->
		<?php
			if(isset($_GET['author_name'])) :
			$curauth = get_userdatabylogin($author_name);
			else :
			$curauth = get_userdata(intval($author));
			endif;
		?>
		<?php if (have_posts()) : ?>
	<div class="posttop"></div>
        <h3 class="author">Author Archives | <?php echo $curauth->nickname; ?></h3>
		<div class="postbot"></div>
		<div class="posttop"></div>
		<div class="post_blog"><!-- Single Post -->
           
		   <ul>
           <?php printf( __( '%s', 'libra' ), get_the_avatars_with_link_to_authors() ) ?><?php echo $curauth->nickname; ?> - This author has written <?php the_author_posts(); ?> posts on <a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></p>
           </ul>
		   
			</div><!--/box-->
			<div class="postbot"></div>
			<?php while (have_posts()) : the_post(); ?>		

	            <div class="posttop"></div>
                <div class="post box" id="post-<?php the_ID(); ?>">
                
                    <h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                    
                    <div class="date-comments">
                        <p class="fl"><?php the_time('l, F j, Y'); ?></p>
                        <p class="fr"><span class="comments"></span><?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?></p>
                    </div>

                    <p><?php echo strip_tags(get_the_excerpt(), '<a><strong>'); ?></p>

                    <span class="continue"><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>">Continue reading...</a></span>    				

                </div><!--/post-->
            <div class="postbot"></div>

		<?php endwhile; ?>
		
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>		
	
	<?php endif; ?>							

		</div><!--/col1-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
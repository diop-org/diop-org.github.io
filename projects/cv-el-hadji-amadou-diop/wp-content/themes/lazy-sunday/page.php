<?php
/**
 * @package Lazy Sunday
 */

get_header(); ?>

	<div id="content" class="content">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="title-header">
				<h2 class="page_title">
					<?php the_title(); ?>
				</h2>
			</div>
			<div class="entry">

				<?php the_content( __( 'Read the rest of this entry' , 'lazy-sunday' ) . ' &raquo;'); ?>
				
				<?php wp_link_pages(array('before' => '<p class="clear"><strong>' . __( 'Pages:' , 'lazy-sunday' ) . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			</div>
				
			<?php edit_post_link( __( 'Edit this entry', 'lazy-sunday' ), '<p class="clear">', '</p>'); ?>
			
            <?php if ( comments_open() ) comments_template(); ?>
		</div>
		<?php endwhile; endif; ?>    
    
	</div>

<?php get_footer(); ?>
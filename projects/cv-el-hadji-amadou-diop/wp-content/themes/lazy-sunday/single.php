<?php
/**
 * @package Lazy Sunday
 */

get_header();
?>

	<div id="content" class="content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
		</div>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class="title-header">
				<h2 class="page_title"><?php the_title(); ?></h2>
				<div class="post-date">
					<small><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to' , 'lazy-sunday' ) ?> <?php the_title_attribute(); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a></small>
				</div>
			</div>

			<div class="entry">
			
				<?php the_content( __( 'Read the rest of this entry' , 'lazy-sunday' ) . ' &raquo;'); ?>

				<?php wp_link_pages(array('before' => '<p class="clear"><strong>' . __( 'Pages:' , 'lazy-sunday' ) . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

				<?php the_tags('<p class="postmetadata clear">' . __( 'Tags:' , 'lazy-sunday' ) . ' ', ', ', '</p>'); ?>

				<p class="postmetadata clear">
					<?php _e( 'Posted in' , 'lazy-sunday' ) ?> <?php the_category(', ') ?> | 
					<?php edit_post_link( __( 'Edit', 'lazy-sunday' ), '', ' | '); ?> 
					<?php comments_popup_link( __('No Comments' , 'lazy-sunday' ) . " &#187;", __('1 Comment' , 'lazy-sunday' ) . " &#187;", __('% Comments' , 'lazy-sunday' ) . " &#187;" ); ?>
				</p>

			</div>
		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<div class="title-header">
			<h2 class="page_title"><?php _e( 'Not Found' , 'lazy-sunday' ) ?></h2>
		</div>
		<p class="aligncenter"><?php _e( 'Sorry, no posts matched your criteria.', 'lazy-sunday' ) ?></p>
		<?php get_search_form(); ?>

<?php endif; ?>

	</div>

<?php get_footer(); ?> 

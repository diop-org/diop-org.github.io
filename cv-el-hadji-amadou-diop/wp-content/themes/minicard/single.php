<?php
	if ($_GET['ajax']==true) :
?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); $visit = get_post_meta($post->ID, 'link', true); ?>
			
			<div class="post ajax-post">
				<h1><?php if ($visit) echo '<a href="'.$visit.'" title="Visit" rel="nofollow">'; ?><?php the_title(); ?><?php if ($visit) echo '</a>'; ?></h1>
				<?php
					the_content();
				?>
				<div class="clear"></div>
			</div>
			
		<?php endwhile; endif; ?>
<?php
	else :
?>

	<?php get_header(); ?>
	
	<div id="mainContent">
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<div class="post">
				<h1><?php the_title(); ?></h1>
				<?php
				if (function_exists('the_post_thumbnail') && has_post_thumbnail()) :
					echo '<a href="'.get_permalink($post->ID).'" class="post_thumbnail">';
					the_post_thumbnail();
					echo '</a>';
				endif; 
				?>	
				<p class="meta"><?php if ( comments_open() ) : ?><span class="comment"><a href="<?php echo get_permalink($post->ID); ?>#comments"><?php comments_number('<strong>0</strong>', '<strong>1</strong>', '<strong>%</strong>'); ?></a></span><?php endif; ?><strong class="user"><?php the_author_posts_link(); ?></strong> &bull; <span class="date"><?php the_time('jS M Y'); ?></span> &bull; <span class="cat"><?php if (function_exists('parentless_categories')) parentless_categories(','); else the_category( ', ', 'multiple' ); ?></span><?php the_tags(' &bull; <span class="tag">', ', ', '</span>'); ?></p>
				<?php
					the_content();
				?>
				<div class="clear"></div>
				<?php wp_link_pages(); ?> 
			</div>
		
			<?php comments_template(); ?>
		
		<?php endwhile; else: ?>
			<p><?php _e('Sorry, no posts matched your criteria.', 'minicard'); ?></p>
		<?php endif; ?>
		
		<div style="clear:both"></div>
	
	</div>
	
	<?php get_footer(); ?>

<?php endif; ?>
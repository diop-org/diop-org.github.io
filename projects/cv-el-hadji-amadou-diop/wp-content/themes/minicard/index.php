<?php
	if ( is_home() ) :
	
		$post_obj = $wp_query->get_queried_object();
		$post_ID = $post_obj->ID;

		$show_on_front = get_option( 'show_on_front'); // does the front page display the latest posts or a static page
		$page_on_front = get_option( 'page_on_front' ); // if it shows a page, what page
		$page_for_posts = get_option( 'page_for_posts' );
	
		// while the current page isn't the home page and it has a parent
		if ( $show_on_front == 'page' ) {
			// Using static pages
			if ($page_on_front > 0 ) { 
				// Do nothing 
			} elseif ( $post_ID != $page_for_posts ) {
				// No homepage set so show ours
				include('template_home.php');
				exit;
			}
		} elseif ( $show_on_front == 'posts' ) {
			// Not a static home - show our homepage template
			include('template_home.php');
			exit;
		}
	endif;
?>

<?php get_header(); ?>

<div id="mainContent">
	
<?php if (is_search()) : ?>		
		<h1 class="title"><?php _e('Search Results:', 'minicard'); ?> &ldquo;<?php the_search_query(); ?>&rdquo; <?php if (get_query_var('paged')) echo ' &mdash; '.__('Page','minicard').' '.$doctitle[] =  get_query_var('paged'); ?></h1>
<?php endif; ?>

<?php if (have_posts()) : $full_post = get_option('full_post'); while (have_posts()) : the_post(); ?>

	<div class="post">
		<h2><a href="<?php echo get_permalink($post->ID); ?>"><?php the_title(); ?></a></h2>
		<?php
		if (function_exists('the_post_thumbnail') && has_post_thumbnail()) :
			echo '<a href="'.get_permalink($post->ID).'" class="post_thumbnail">';
			the_post_thumbnail();
			echo '</a>';
		endif; 
		?>	
		<p class="meta"><?php if ( comments_open() ) : ?><span class="comment"><a href="<?php echo get_permalink($post->ID); ?>#comments"><?php comments_number('<strong>0</strong>', '<strong>1</strong>', '<strong>%</strong>'); ?></a></span><?php endif; ?><strong class="user"><?php the_author_posts_link(); ?></strong> &bull; <span class="date"><?php the_time('jS M Y'); ?></span> &bull; <span class="cat"><?php if (function_exists('parentless_categories')) parentless_categories(','); else the_category( ', ', 'multiple' ); ?></span><?php the_tags(' &bull; <span class="tag">', ', ', '</span>'); ?></p>
		<?php
			if ($full_post == 'yes' ) the_content(); else the_excerpt();
		?>
		<div class="clear"></div>
	</div>
	
<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.', 'minicard'); ?></p>
<?php endif; ?>

<div class="paging">
	<?php if (is_search()) : ?>
		<div style="float:right;"><?php next_posts_link(__('Next Results &raquo;','minicard')) ?></div>
		<div style="float:left;"><?php previous_posts_link(__('&laquo; Previous Results','minicard')) ?></div>
	<?php else: ?>
		<div style="float:right;"><?php next_posts_link(__('Next Posts &raquo;','minicard')) ?></div>
		<div style="float:left;"><?php previous_posts_link(__('&laquo; Previous Posts','minicard')) ?></div>
	<?php endif; ?>
</div>
<div class="clear"></div>

</div><!-- End MainContent -->

<?php get_footer(); ?>
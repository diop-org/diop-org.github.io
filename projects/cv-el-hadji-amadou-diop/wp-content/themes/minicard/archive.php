<?php get_header(); ?>

<div id="mainContent">

<?php if (have_posts()) : ?>

		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		<?php
		/* If this is a category archive */ 
		if (is_category()) { ?>
			<h1 class="title"><?php _e('Archive for the &ldquo;', 'minicard'); ?><?php single_cat_title(); ?><?php _e('&rdquo; category', 'minicard'); ?> <?php if (get_query_var('paged')) echo ' &mdash; '.__('Page', 'minicard').' '.get_query_var('paged'); ?></h1>
		<?php /* If this is a tag archive */ 
		} elseif( is_tag() ) { ?>
		<h1 class="title"><?php _e('Posts Tagged &ldquo;', 'minicard'); ?><?php single_tag_title(); ?><?php _e('&rdquo;', 'minicard'); ?> <?php if (get_query_var('paged')) echo ' &mdash; '.__('Page', 'minicard').' '.get_query_var('paged'); ?></h1>
		<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h1 class="title"><?php _e('Archive for', 'minicard'); ?> <?php the_time('F jS, Y'); ?> <?php if (get_query_var('paged')) echo ' &mdash; '.__('Page', 'minicard').' '.get_query_var('paged'); ?></h1>
		<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h1 class="title"><?php _e('Archive for', 'minicard'); ?> <?php the_time('F, Y'); ?> <?php if (get_query_var('paged')) echo ' &mdash; '.__('Page', 'minicard').' '.get_query_var('paged'); ?></h1>
		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h1 class="title"><?php _e('Archive for', 'minicard'); ?> <?php the_time('Y'); ?> <?php if (get_query_var('paged')) echo ' &mdash; '.__('Page', 'minicard').' '.get_query_var('paged'); ?></h1>
		<?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h1 class="title"><?php 
		global $wp_query;
		$curauth = $wp_query->get_queried_object();
		echo ucwords($curauth->nickname); 
		?><?php _e("\'s Author Archive", 'minicard'); ?> <?php if (get_query_var('paged')) echo ' &mdash; Page '.get_query_var('paged'); ?></h1>
		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h1 class="title"><?php _e('Blog Archives', 'minicard'); ?> <?php if (get_query_var('paged')) echo ' &mdash; '.__('Page', 'minicard').' '.get_query_var('paged'); ?></h1>
		<?php } ?>

	<?php $full_post = get_option('full_post'); while (have_posts()) : the_post(); ?>
	
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
		<div style="float:right;"><?php next_posts_link(__('Next Posts &raquo;', 'minicard')) ?></div>
		<div style="float:left;"><?php previous_posts_link(__('&laquo; Previous Posts', 'minicard')) ?></div>
</div>
<div class="clear"></div>

</div>

<?php get_footer(); ?>
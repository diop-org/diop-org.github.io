<?php get_header(); ?>

	<div id="main-content">

			
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<div id="page-<?php the_ID() ?>">
					<h2 class="entry-title"><?php the_title(); ?></h2>
					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
					</div>
					
					<?php if(iz_page_child()) : ?>
						<p class="subpage"> <?php iz_pagechild_list(); ?></p>
					<?php endif; ?>
				</div>
				
				<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
					
				<?php comments_template(); ?>
					
	<?php endwhile; else: ?>
	
		<div id="c404" class="content-box">
			<div class="box-inner">
				<h2 class="entry-title">Not any page is Founded</h2>
				<div class="entry-content">
					<p>Sorry, but you are looking for something that isn't here. You can search again by using <a href="#searchform-404">this form</a>...</p>
					<form id="searchform-404" class="blog-search clearfix" method="get" action="<?php bloginfo('home') ?>">
						<p><input id="s-404" name="s" class="text" type="text" value="<?php the_search_query() ?>" size="40" /><input class="submit" type="submit" value="Search" /></p>
					</form>
				</div>
			</div>
		</div>
		
	<?php endif; ?>

	
	</div>
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>

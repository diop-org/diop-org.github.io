<?php get_header(); ?>

<div id="main-content">
		
		<h2 class="page-title">Search Result for &quot;<?php echo $s; ?>&quot;</h2>
		<h3 class="c-result"><?php echo count($posts); ?> results found</h3>
			
		<?php if (have_posts()) : ?>
		
				<?php while ( have_posts() ) : the_post() ?>
				
			<div class="<?php iz_post_class(); ?>" id="post-<?php the_ID() ?>">
				<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent link to <?php the_title_attribute('echo=0') ?>"><?php the_title() ?></a></h2>
				<div class="entry-content">
				<?php
					$iz_opt = get_option('iz_purityofsoul');
					
					if ($iz_opt['search-page-excerpt'])
					{
						the_excerpt(); 
				?>
			</div>
			<p class="permalink">
				<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent link to <?php the_title_attribute('echo=0') ?>">Continue Reading >></a>
			</p>
				<?php
					}
					else
					{
						the_content();
				?>
			</div>
				<?php } ?>
				
			</div>	
						
		<?php endwhile; ?>
			
		
	<?php else : ?>

		<div id="c404">

				<h2 class="entry-title">No Result</h2>
				<div class="entry-content">
					<p>Your search did not return any results.</p>
					<p>Please try again with other keyword.</p>
					<form id="searchform-404" class="blog-search clearfix" method="get" action="<?php bloginfo('home') ?>">
						<p><input id="s-404" name="s" class="text" type="text" value="<?php the_search_query() ?>" size="40" /><input class="submit" type="submit" value="Search" /></p>
					</form>
				</div>

		</div>

		<?php endif; ?>
						
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
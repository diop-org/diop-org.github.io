<?php get_header() ?>


	<div id="main-content">
	
<?php the_post() ?>

<?php if (is_day()) : ?>

	<h2 class="page-title">Daily Archives : <?php the_time('F jS, Y'); ?></h2>
	
<?php elseif (is_month()) : ?>
	
	<h2 class="page-title">Monthly Archives : <?php the_time('F, Y'); ?></h2>
	
<?php elseif (is_year()) : ?>
	
	<h2 class="page-title">Yearly Archives : <?php the_time('Y'); ?></h2>

<?php elseif (is_category()) : ?>
	
	<h2 class="page-title">Archive for the &#8216;<strong><?php single_cat_title(); ?></strong>&#8217; Category</h2>
	
<?php elseif (is_author()) : ?>
	
	<h2 class="page-title">Author Archives</h2>
	
<?php elseif (is_tag()) : ?>

	<h2 class="page-title">Tag Archives</h2>
	
<?php else : ?>
	
	<h2 class="page-title">Blog Archives</h2>
	
<?php endif; ?>

<?php rewind_posts() ?>
	
<?php if (have_posts()) : ?>
		<?php while ( have_posts() ) : the_post() ?>
		<div class="<?php iz_post_class(); ?>" id="post-<?php the_ID(); ?>">	
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent link to <?php the_title_attribute('echo=0'); ?>"><?php the_title(); ?></a></h2>
			<ul class="post-info">
				<li class="entry-date">
					<strong>Published on : </strong>
					<abbr class="published" title="<?php the_time('c'); ?>">
						<em class="day"><?php the_time('d'); ?></em> 
						<em class="month"><?php the_time('F'); ?></em> 
						<em class="year"><?php the_time('y'); ?></em>
					</abbr>
				</li>
				<li class="post-author">
					<strong>by : </strong>
					<address class="author vcard">
						<?php the_author_posts_link(); ?>
					</address>
				</li>
				<li class="post-cat">
					<strong>in : </strong>
					<?php iz_get_category(); ?>
				</li>
				<li class="post-cc">
					<strong>Comments : </strong>
					<?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?>
				</li>
			</ul>
			<div class="entry-content">
				<?php
					$iz_opt = get_option('iz_purityofsoul');
					
					if ($iz_opt['archive-page-excerpt'])
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
			<h2 class="entry-title">Not any post is Founded</h2>
			<div class="entry-content">
				<p>Sorry, but you are looking for something that isn't here. You can search again by using <a href="#searchform-404">this form</a>...</p>
				<form id="searchform-404" class="blog-search clearfix" method="get" action="<?php bloginfo('home') ?>">
					<p><input id="s-404" name="s" class="text" type="text" value="<?php the_search_query() ?>" size="40" /><input class="submit" type="submit" value="Search" /></p>
				</form>
			</div>
		</div>

	<?php endif;?>
		
		<div id="nav-below" class="clearfix">
			<div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'sandbox' )) ?></div>
			<div class="nav-next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'sandbox' )) ?></div>
		</div>
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
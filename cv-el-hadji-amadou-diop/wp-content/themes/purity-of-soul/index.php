<?php get_header(); ?>
	<div id="main-content">
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
					
					if ($iz_opt['front-page-excerpt'])
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
	
		<div id="c404" class="content-box">
			<h2>Not any post is Founded</h3>
			<?php get_search_form(); ?>
		</div>
	
	<?php endif;?>
		
		<div id="nav-below" class="clearfix">
			<div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'sandbox' )) ?></div>
			<div class="nav-next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'sandbox' )) ?></div>
		</div>
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
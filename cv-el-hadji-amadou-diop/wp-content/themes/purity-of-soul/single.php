<?php get_header(); ?>

<div id="main-content">
			
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="<?php iz_post_class(); ?>">	
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
				<?php the_content(); ?>
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			</div>
			<p class="post-tag">
				<?php iz_the_tags(); ?>
			</p>
							
			<p class="note">
				You can follow any responses to this entry through the <?php comments_rss_link('RSS 2.0'); ?> feed.

				<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
				// Both Comments and Pings are open ?>
				You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.

				<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
				// Only Pings are Open ?>Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.

				<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
				// Comments are open, Pings are not ?>
				You can skip to the end and leave a response. Pinging is currently not allowed.

				<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
				// Neither Comments, nor Pings are open ?>
				Both comments and pings are currently closed.
				<?php } edit_post_link('Edit this entry.','',''); ?>
			</p>
		</div>	

		<?php comments_template(); ?>


<?php endwhile; else: ?>
		<div id="c404">
			<h2 class="entry-title">Not any post is Founded</h2>
			<div class="entry-content">
				<p>Sorry, but you are looking for something that isn't here. You can search again by using <a href="#searchform-404">this form</a>...</p>
				<form id="searchform-404" class="blog-search clearfix" method="get" action="<?php bloginfo('home') ?>">
					<p><input id="s-404" name="s" class="text" type="text" value="<?php the_search_query() ?>" size="40" /><input class="submit" type="submit" value="Search" /></p>
				</form>
			</div>

		</div>

<?php endif; ?>
	
	</div>
	

<?php get_sidebar() ?>

<?php get_footer() ?>

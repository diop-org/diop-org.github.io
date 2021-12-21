<?php get_header(); ?>


<div id="content"><a name="content"></a>
<?php if (have_posts()) : ?>
		<h2 class="pagetitle">Search Results</h2>
<?php while (have_posts()) : the_post(); ?>
<div class="single" id="post-<?php the_ID(); ?>">
<div class="title">

<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
<div class="date"> <span class="clock">  <?php the_time(' F - j - Y - l '); ?></span> <span class="comm"><?php comments_popup_link('ADD COMMENTS', '1 COMMENT', '% COMMENTS'); ?></span> </div>	
</div>

<div class="cover">
<div class="entry">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				
</div>

</div>

<div class="singleinfo">
					<div class="category"><?php the_category(', '); ?> </div>
				
</div>


</div>

		<?php endwhile; ?>

 <div id="navigation">
		<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>  
</div>

	<?php else : ?>


<h1>Not Found</h1>


<div class="cover">
<div class="entry">
		<p>Sorry, no post matched your criteria. Try a different search?</p>
				
</div>

</div>
<?php endif; ?>

</div>


<?php get_sidebar(); ?>
<?php get_footer(); ?>
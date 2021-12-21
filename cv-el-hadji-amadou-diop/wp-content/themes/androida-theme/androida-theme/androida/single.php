<?php get_header(); ?>

<div id="content">

<?php if (have_posts()) : ?>

<?php while (have_posts()) : the_post(); ?>
<div class="single" id="post-<?php the_ID(); ?>">
<div class="title">

<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
<div class="date"><span class="author">Posted by <?php the_author(); ?></span> <span class="clock">  <?php the_time(' F - j - Y - l '); ?></span>  </div>	
</div>

<div class="cover">
<div class="entry">

	<?php the_content('Read the rest of this entry &raquo;'); ?>
	
	<div class="clear"></div>
			
</div>

</div>

<div class="singleinfo">
	<div class="category"><?php the_category(', '); ?> </div>
			
</div>


</div>


<div class="clear"> </div>

<?php comments_template(); ?>
	<?php endwhile; else: ?>

		<h1 class="title">Not Found</h1>
		<p>I'm Sorry,  you are looking for something that is not here. Try a different search.</p>

<?php endif; ?>

</div>


<?php get_sidebar(); ?>
<?php get_footer(); ?>
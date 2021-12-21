<?php get_header(); ?>



<div id="content"><a name="content"></a>
<?php if (have_posts()) : ?>

<?php while (have_posts()) : the_post(); ?>
<div class="single" id="post-<?php the_ID(); ?>">
<div class="title">

<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
<div class="date"> <span class="clock">  <?php the_time(' F - j - Y - l '); ?></span>  </div>	
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



		<?php endwhile; endif; ?>
	</div>		

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
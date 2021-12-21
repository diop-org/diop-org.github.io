<?php get_header(); ?>


<div id="main" class="content">
<div id="left_side">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="post">

<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a> 
</h2>


<div class="entry">
<div class="indexfeature"><?php the_post_thumbnail(array(180,180)); ?></div>
<?php the_content(); ?>
</div>
<div class="clearboth">&nbsp;</div>

</div>

	<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>
		

<?php else : ?>
<div class="post">
		<h2>Not Found</h2>
		<p>Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>
</div>
<?php endif; ?>


</div>

<?php get_footer(); ?>
<?php get_header(); ?>

<?php get_sidebar(); ?>





<div id="content">

<?php
// loop
if (have_posts()) :
?>

<?php while (have_posts()) : the_post(); ?>

<div class="post" <?php post_class(); ?>>

<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Fixed link <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

<div class="text">


<?php the_content('Read more >'); ?>
<div class="clear"> </div><!--clear-->

<?php comments_template(); ?>



</div><!--text-->

<div class="clear"> </div><!--clear-->

</div><!--post-->


<?php endwhile; // end of loop
?>

<div style="display:inline">
<div style="float:left"><?php next_posts_link('< Older Entries') ?></div>
<div style="float:right"><?php previous_posts_link('Newer Entries >') ?></div>
</div>

<?php else : ?>
<h2 >Not found</h2>
<?php endif; ?>

</div><!--content ends-->


<?php get_footer(); ?>
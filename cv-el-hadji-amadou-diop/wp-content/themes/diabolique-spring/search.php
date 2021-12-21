<?php get_header(); ?>

<?php get_sidebar(); ?>



<div id="content">

<span class="result"><h2>Search Result:</h2></span>
<?php if (have_posts()) : ?>

<?php while (have_posts()) : the_post(); ?>
<div class="post">
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Link <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
<div class="text">

<?php the_content('Read more >'); ?>

</div><!--text-->

<?php include (TEMPLATEPATH . "/info.php"); ?>


<div class="clear">

</div>


</div><!--post ends-->

<?php endwhile; ?>


<?php else : ?>
<span class="result"><h2>Not found</h2></span>
<?php endif; ?>

</div><!--content ends-->

<?php get_footer(); ?>
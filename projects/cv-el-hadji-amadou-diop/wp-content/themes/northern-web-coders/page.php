<?php
get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<section class="column-full">

<article <?php post_class(); ?>>
<h3 class="storytitle" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(''); ?></a></h3>
<section class="meta">
<?php edit_post_link(__('Edit This', 'nwc')); ?>
</section>

<?php the_content(__('(more...)', 'nwc')); ?>

</article> 
 
<?php comments_template(); ?>

</section>  


<?php endwhile; else: ?>

<?php endif; ?>

<?php get_footer(); ?>
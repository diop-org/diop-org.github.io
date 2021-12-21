<?php
get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<section class="column-full">

<article <?php post_class(); ?>>
<h3 class="storytitle" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(''); ?></a></h3>

<section class="meta">
<?php edit_post_link(__('Edit This', 'nwc')); ?>
<ul>
<li><?php printf(_e("Publish on:", 'nwc')); ?> <a href="<?php the_permalink() ?>" rel="bookmark"><?php echo the_time("l - d F Y"); ?></a></li>
<li><?php printf(_e("Categories:", 'nwc')); ?> <?php the_category(', ') ?> <?php the_tags(__('Tags:&nbsp;', 'nwc'), ' , ' , ''); ?></li>
</ul>
</section>

<?php the_content(__('(more...)', 'nwc')); ?>

</article>

</section>


<?php endwhile; else: ?>

<section class="column-full">
<article id="nopost">
<p><strong><?php _e('Sorry, no posts matched your criteria.'); ?></strong></p>
</article>
</section>

<?php endif; ?>

<section id="pagenav">
<?php posts_nav_link(' - ') ?>
</section>

<?php get_footer(); ?>
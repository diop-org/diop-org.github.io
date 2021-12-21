<?php
get_header();
?>


<?php $i =(''); ?>

<section class="column-left">
<?php if (have_posts()) : while(have_posts()) : $i++; if(($i % 2) == 0) : $wp_query->next_post(); else : the_post(); ?>

<article <?php post_class() ?> id="post-<?php the_ID(); ?>">    
<h3 class="storytitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
<?php
if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) {
the_post_thumbnail();
}
?>
<section class="meta">
<?php edit_post_link(__('Edit This', 'nwc')); ?>
<ul>
<li><?php printf(_e("Publish on:", 'nwc')); ?> <a href="<?php the_permalink() ?>" rel="bookmark"><?php echo the_time("l - d F Y"); ?></a></li>
<li><?php printf(_e("Categories:", 'nwc')); ?> <?php the_category(', ') ?> <?php the_tags(__('Tags:&nbsp;', 'nwc'), ' , ' , ''); ?></li>
</ul>
</section>
<?php the_content(__('(more...)', 'nwc')); ?>
<section class="commentlink">
<?php wp_link_pages(); ?>
<?php comments_popup_link(__('No Comments', 'nwc'), __('1 Comment', 'nwc'), __('% Comments', 'nwc'), '', __('Comments are closed.', 'nwc') ); ?>
</section>
</article>

<?php endif; endwhile; else: ?>
<?php endif; ?>
</section>

<?php $i = 0; rewind_posts(); ?>

<section class="column-right">
<?php if (have_posts()) : while(have_posts()) : $i++; if(($i % 2) !== 0) : $wp_query->next_post(); else : the_post(); ?>
<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
<h3 class="storytitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
<?php
if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) {
the_post_thumbnail();
}
?>
<section class="meta">
<?php edit_post_link(__('Edit This', 'nwc')); ?>
<ul>
<li><?php printf(_e("Publish on:", 'nwc')); ?> <a href="<?php the_permalink() ?>" rel="bookmark"><?php echo the_time("l - d F Y"); ?></a></li>
<li><?php printf(_e("Categories:", 'nwc')); ?> <?php the_category(', ') ?> <?php the_tags(__('Tags:&nbsp;', 'nwc'), ' , ' , ''); ?></li>
</ul>
</section>
<?php the_content(__('(more...)', 'nwc')); ?>
<section class="commentlink">
<?php wp_link_pages(); ?>
<?php comments_popup_link(__('No Comments', 'nwc'), __('1 Comment', 'nwc'), __('% Comments', 'nwc'), '', __('Comments are closed.', 'nwc') ); ?>
</section>
</article>

<?php endif; endwhile; else: ?>
<?php endif; ?>
</section>

<?php comments_template(); ?>

<section id="pagenav">
<?php posts_nav_link(' - ') ?>
</section>

<?php get_footer(); ?>

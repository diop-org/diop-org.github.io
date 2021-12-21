<?php get_header(); ?><?php get_sidebar(); ?>


<div id="content">

<?php
// loop
if (have_posts()) :
?>

<?php while (have_posts()) : the_post(); ?>

<div class="post">


<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Fixed link <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
<br /><span class="author">by <?php the_author() ?></span></h2>


<div class="text">

<?php the_content('<h5><p>Read more &#187;</p></h5>'); ?>
<div class="clear"> </div><!--clear-->

<div style="float:right"><h6><p><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p></h6></div>
</div><!--text-->

<?php get_template_part('info'); ?>


<div class="clear"> </div>

</div><!--post-->


<?php endwhile; // end of loop
?>

<div style="display:inline">
<div style="float:left"><span class="white"><?php next_posts_link('&#171; Older Entries') ?></span>
</div>
<div style="float:right"><span class="white"><?php previous_posts_link('Newer Entries &#187;') ?></span>
</div>

<?php else : ?>
<h2 >Not found</h2>
<?php endif; ?>


</div><!--content ends-->

<div class="clear">


</div>
</div>
<?php get_footer(); ?>
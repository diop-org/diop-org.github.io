<?php get_header(); ?>

<?php get_sidebar(); ?>



	<div id="content">


<?php is_tag(); ?>
<?php if (have_posts()) : ?>
<?php $post = $posts[0]; ?>

<?php /* archive category headline */ if (is_category()) { ?>
<span class="archive"><h2>Archive for <?php single_cat_title(); ?></h2></span>
<?php /* Header for tags archive */ } elseif( is_tag() ) { ?>
<span class="archive"><h2>Tags ‘</h2><?php single_tag_title();
?>’</span>
<?php  } elseif (is_day()) { ?>
<span class="archive"><h2>Archive for day <?php the_time('F jS, Y'); ?></h2></span>

<?php  } elseif (is_month()) { ?>
<span class="archive"><h2>Archive for <?php the_time('F, Y'); ?></h2></span>
<?php  } elseif (is_year()) { ?>
<span class="archive"><h2>Archive for: <?php the_time('Y'); ?></h2></span>
<?php  } elseif (is_author()) { ?>
<span class="archive"><h2>Author's Archive</h2></span>

<?php  } elseif (isset($_GET['paged']) &&
!empty($_GET['paged'])) { ?>
<span class="archive"><h2>Blog Archive</h2></span>
<?php } ?>
<?php while (have_posts()) : the_post(); ?>

<div class="post" <?php post_class(); ?>>
<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Link <?php the_title_attribute(); ?>"><?php the_title();
?></a>
<br /><span class="author">by <?php the_author() ?></span></h2>
<div class="text">

<?php the_content('<h5><p>Read more &#187;</p></h5>'); ?>
<div class="clear"> </div><!--clear-->

<div style="float:right"><h6><p><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p></h6></div>

</div><!--text-->

<?php get_template_part('info'); ?>

<div class="clear">
</div>


</div><!--post-->


<?php endwhile; ?>

<div style="display:inline">
<div style="float:left"><span class="white"><?php next_posts_link('&#171; Older Entries') ?></span>
</div>
<div style="float:right"><span class="white"><?php previous_posts_link('Newer Entries &#187;') ?></span>
</div>
<?php else : ?>

<h2>Not found</h2>
<?php endif; ?>




	</div><!--content ends-->
<div class="clear">
</div>
</div>
<?php get_footer(); ?>
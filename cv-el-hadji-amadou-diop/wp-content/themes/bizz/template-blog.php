<?php
/**
 * @package WordPress
 * @subpackage bizz Theme
 * Template Name: Blog
 */
?>

<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div id="page-heading">
	<h1><?php the_title(); ?></h1>		
</div>

<?php endwhile; ?>
<?php endif; ?>


<div class="post clearfix">

<?php
    //query posts
        query_posts(
            array(
            'post_type'=> 'post',
            'paged'=>$paged
        ));
    ?>
	<?php if (have_posts()) : ?>              
        	<?php get_template_part( 'loop', 'entry') ?>                	
    <?php endif; ?>       
	<?php if (function_exists("pagination")) { pagination(); } ?>

</div>


<?php get_sidebar(); ?>
<?php get_footer(); ?>
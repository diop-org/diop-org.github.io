<?php
/**
 * @package WordPress
 * @subpackage bizz Theme
 */
?>

<?php get_header(); ?>


<div id="page-heading">
	<?php
        $term =	$wp_query->queried_object;
        echo '<h1 class="page-title">'.$term->name.'</h1>';
    ?>		
</div>

<?php if (have_posts()) : ?>
    
	<div class="post full-width clearfix">

    <div id="portfolio-description">
    	 <?php echo category_description( ); ?>
    </div> 
    
    <div id="portfolio-wrap" class="clearfix">
    
        <?php
        while (have_posts()) : the_post();
        //get portfolio thumbnail
        $thumbail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'portfolio-thumb');
        ?>
        
        <?php if ( has_post_thumbnail() ) {  ?>
 		<div class="portfolio-item">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo $thumbail[0]; ?>" height="<?php echo $thumbail[2]; ?>" width="<?php echo $thumbail[1]; ?>" alt="<?php echo the_title(); ?>" /></a>
		<div class="portfolio-item-details">
	   		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h2><?php echo the_title(); ?></h2></a>
            <?php echo excerpt('15'); ?>
       	</div>
    </div>
        <?php } ?>
        
        <?php endwhile; ?>
          
    </div>
    
	<?php if (function_exists("pagination")) { pagination($additional_loop->max_num_pages); } wp_reset_query(); ?>

	<?php endif; ?>
</div>
<?php get_footer(); ?>
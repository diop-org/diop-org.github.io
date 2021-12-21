<?php
/**
 * @package WordPress
 * @subpackage bizz Theme
 */
?>
<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>   

<div id="page-heading">
	<h2><?php _e('Portfolio','bizz');?></h2>
    
    <div id="single-portfolio-nav" class="clearfix"> 
			<div id="single-nav-left"><?php next_post_link('%link', '&larr; Next', FALSE); ?></div>
			<div id="single-nav-right"><?php previous_post_link('%link', 'Previous &rarr;', FALSE); ?></div>
	</div>
    
</div>

<div class="post full-width clearfix">

<div id="single-portfolio" class="clearfix">

		<div id="single-portfolio-left">
        
        <?php
		//get full-sized image
		$full_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full-size');
		?>
		<a href="<?php echo $full_img[0]; ?>" class="prettyphoto-link" title="<?php the_title(); ?>"><?php the_post_thumbnail('portfolio-single'); ?></a>
            
        </div>
        
        <div id="single-portfolio-right">
        
        	<h1><?php the_title(); ?></h1>
            
            <?php
			//get terms
			$terms = get_the_term_list( get_the_ID(), 'portfolio_cats' );
			?>
            
            <?php if($terms) { ?>
            <div id="single-portfolio-meta">
            	<?php _e('Posted Under','bizz'); ?>: <?php echo $terms; ?>
            </div>
            <?php } ?>
            
			<?php the_content(); ?>
            <div class="clear"></div>
        
        
        </div>
  
</div>   
</div>
        
        
<?php endwhile; ?>
<?php endif; ?>	
<?php get_footer(); ?>
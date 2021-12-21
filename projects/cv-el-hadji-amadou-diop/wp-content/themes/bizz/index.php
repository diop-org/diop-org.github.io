<?php
/**
 * @package WordPress
 * @subpackage bizz Theme
 */
$options = get_option( 'bizz_theme_settings' );
?>
<?php get_header(' '); ?>

<div class="home-wrap clearfix">

<!-- Homepage Slider -->
<?php get_template_part( 'includes/nivo' ) ?>  

<?php if($options['home_tagline'] !='') { ?>
<div id="home-tagline">
	<?php echo $options['home_tagline'] ?>
</div>
<?php } ?>


<!-- Homepage Highlights -->
<?php
//get post type ==> hp highlights
	global $post;
	$args = array(
		'post_type' =>'hp_highlights',
		'numberposts' => '-1'
	);
	$portfolio_posts = get_posts($args);
?>
<?php if($portfolio_posts) { ?>        


<div id="home-highlights" class="clearfix">
	<?php
	$count=0;
	foreach($portfolio_posts as $post) : setup_postdata($post);
	$count++;
	?>
    
    <div class="hp-highlight <?php if($count == '3') { echo 'highlight-last'; } ?>">
    <h2><?php the_title(); ?></h2>
	<?php the_content(); ?>
    </div>
    
    <?php
	if($count == '3') { echo '<div class="clear"></div>'; $count=0; }
    endforeach; ?>

</div>
<!-- END #home-projects -->      	
<?php } ?>


<!-- Recent Portfolio Items -->
<?php
//get post type ==> portfolio
	global $post;
	$args = array(
		'post_type' =>'portfolio',
		'numberposts' => '4'
	);
	$portfolio_posts = get_posts($args);
?>
<?php if($portfolio_posts) { ?>        


<div id="home-projects" class="clearfix">

	<h2 class="home-projects-heading"><span><?php _e('Recent Work','bizz'); ?></span></h2>

	<?php
	$count=0;
	foreach($portfolio_posts as $post) : setup_postdata($post);
	$count++;
	//get portfolio thumbnail
	$thumbail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'portfolio-thumb');
	?>
    
    <?php if ( has_post_thumbnail() ) {  ?>
    <div class="portfolio-item <?php if($count == '4') { echo 'no-margin'; } ?>">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo $thumbail[0]; ?>" height="<?php echo $thumbail[2]; ?>" width="<?php echo $thumbail[1]; ?>" alt="<?php echo the_title(); ?>" /></a>
		<div class="portfolio-item-details">
	   		<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo the_title(); ?></a></h2>
            <?php echo excerpt('15'); ?>
       	</div>
    </div>
    <?php } ?>
    
    <?php
	if($count == '4') { echo '<div class="clear"></div>'; $count=0; }
    endforeach; ?>

</div>
<!-- END #home-projects -->      	
<?php } ?>



</div>
<!-- END home-wrap -->   
<?php get_footer(' '); ?>
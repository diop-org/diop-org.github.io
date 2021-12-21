<?php
/*
/**
 * The main front page file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
?>
<?php get_header(); ?>
<div class="container_24">
<!--Start Slide Wrapper-->
<div class="grid_24 slider_wrapper">
  <!--Start Slider-->
  <div id="slides">
    <div class="slide slides_container"  >
      <!--Start Slider-->
      <div>
        <?php if ( inkthemes_get_option('inkthemes_slideimage1') !='' ) {  ?>
        <img  src="<?php echo inkthemes_get_option('inkthemes_slideimage1'); ?>" alt=""/>
        <?php }  else {  ?>
        <img  src="<?php echo get_template_directory_uri(); ?>/images/img-1.jpg" alt=""/>
        <?php } ?>
        <div class="caption conference">
          <?php if ( inkthemes_get_option('inkthemes_slideheading1') !='' ) {  ?>
          <h2><a href="<?php if ( inkthemes_get_option('inkthemes_slidelink1') !='' ) { echo inkthemes_get_option('inkthemes_slidelink1'); } ?>" class="readmore"><?php echo stripslashes(inkthemes_get_option('inkthemes_slideheading1')); ?></a></h2>
          <?php }  else {  ?>
          <h2><a href="#"><?php _e( 'Elegancy at its best', 'dzonia' ); ?></a></h2>
          <?php } ?>
          <?php if ( inkthemes_get_option('inkthemes_slidedescription1') !='' ) {  ?>
          <p><?php echo stripslashes(inkthemes_get_option('inkthemes_slidedescription1')); ?></p>
          <?php }  else {  ?>
          <p><?php _e( 'Set the description  for the Top Feature Section from the Themes Options Panel. Its really very simple and easy to customize the entire wordpress front page using the simple and easy to use themes options panel.', 'dzonia' ); ?></p>
          <?php } ?>
        </div>
      </div>
      <!--End Slider-->
    </div>
    <div class="slider_pag"></div>
  </div>
  <!--End Slider-->
</div>
<!--End Slider wrapper-->
<div class="clear"></div>
<!--Start Home content wrapper-->
<div class="grid_24 home_content_wrapper">
  <!--Start Home content-->
  <div class="home_content">
    <div class="home_text">
      <center>
        <?php if ( inkthemes_get_option('inkthemes_mainheading') !='' ) {  ?>
        <h1><?php echo stripslashes(inkthemes_get_option('inkthemes_mainheading')); ?></h1>
        <?php } else { ?>
        <h1><?php _e( '"Set this Home Page Heading Text easily using the Themes Options Panel"', 'dzonia' ); ?></h1>
        <?php } ?>
      </center>
    </div>
      <hr/>
      <div class="clear"></div>	
    <!--Start Featured content-->
    <div class="featured_content">
	      <!--Start Column three-->
      <div class="column-three">
        <!--Start col3-->
        <div class="col3">
          <!--Start inner area-->
          <div class="inner_area">
            <?php if ( inkthemes_get_option('inkthemes_headline1') !='' ) {  ?>
            <h2><a href="<?php if ( inkthemes_get_option('inkthemes_link1') !='' ) { echo inkthemes_get_option('inkthemes_link1'); } else { echo "#"; } ?>"><?php echo stripslashes(inkthemes_get_option('inkthemes_headline1')); ?></a></h2>
            <?php } else { ?>
            <h2><a href="#"><?php _e('Client Needs','dzonia'); ?></a></h2>
            <?php } ?>
            <?php if ( inkthemes_get_option('inkthemes_wimg1') !='' ) {  ?>
            <a href="<?php echo inkthemes_get_option('inkthemes_link1'); ?>"><img src="<?php echo inkthemes_get_option('inkthemes_wimg1'); ?>" class="featured_img"  alt="fearured image" /></a>
            <?php } else { ?>
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/featured-img1.jpg" class="featured_img"  alt="fearured image" /></a>
            <?php } ?>
            <?php if ( inkthemes_get_option('inkthemes_feature1') !='' ) {  ?>
            <p><?php echo stripslashes(inkthemes_get_option('inkthemes_feature1')); ?></p>
            <?php } else { ?>
            <p><?php _e('Varius dui, quis posuere nibh mollis quis. Mauris omma rhoncus porttitor. Maecenas et euismod is elit. Nulla lus libero, ultrices','dzonia'); ?></p>
            <?php } ?>
            <a class="read_more" href="<?php if ( inkthemes_get_option('inkthemes_link1') !='' ) { echo inkthemes_get_option('inkthemes_link1'); } else { echo "#"; } ?>"><?php _e('read more','dzonia'); ?></a> </div>
          <!--End inner area-->
        </div>
        <!--End col3-->
        <!--Start col3-->
        <div class="col3">
          <!--Start inner area-->
          <div class="inner_area">
            <?php if ( inkthemes_get_option('inkthemes_headline2') !='' ) {  ?>
            <h2><a href="<?php if ( inkthemes_get_option('inkthemes_link2') !='' ) { echo inkthemes_get_option('inkthemes_link2'); } else { echo "#"; } ?>"><?php echo stripslashes(inkthemes_get_option('inkthemes_headline2')); ?></a></h2>
            <?php } else { ?>
            <h2><a href="#"><?php _e('Our Products','dzonia'); ?></a></h2>
            <?php } ?>
            <?php if ( inkthemes_get_option('inkthemes_fimg2') !='' ) {  ?>
            <a href="<?php echo inkthemes_get_option('inkthemes_link2'); ?>"><img src="<?php echo inkthemes_get_option('inkthemes_fimg2'); ?>" class="featured_img"  alt="fearured image" /></a>
            <?php } else { ?>
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/featured-img2.jpg" class="featured_img"  alt="fearured image" /></a>
            <?php } ?>
            <?php if ( inkthemes_get_option('inkthemes_feature2') !='' ) {  ?>
            <p><?php echo stripslashes(inkthemes_get_option('inkthemes_feature2')); ?></p>
            <?php } else { ?>
            <p><?php _e('Varius dui, quis posuere nibh mollis quis. Mauris omma rhoncus porttitor. Maecenas et euismod is elit. Nulla lus libero, ultrices','dzonia'); ?></p>
            <?php } ?>
            <a class="read_more" href="<?php if ( inkthemes_get_option('inkthemes_link2') !='' ) { echo inkthemes_get_option('inkthemes_link2'); } else { echo "#"; } ?>">read more</a> </div>
          <!--End inner area-->
        </div>
        <!--End col3-->
        <!--Start col3-->
        <div class="col3 last">
          <!--Start inner area-->
          <div class="inner_area">
            <?php if ( inkthemes_get_option('inkthemes_headline3') !='' ) {  ?>
            <h2><a href="<?php if ( inkthemes_get_option('inkthemes_link3') !='' ) { echo inkthemes_get_option('inkthemes_link3'); } else { echo "#"; } ?>"><?php echo stripslashes(inkthemes_get_option('inkthemes_headline3')); ?></a></h2>
            <?php } else { ?>
            <h2><a href="#"><?php _e('Our Models','dzonia'); ?></a></h2>
            <?php } ?>
            <?php if ( inkthemes_get_option('inkthemes_fimg3') !='' ) {  ?>
            <a href="<?php echo inkthemes_get_option('inkthemes_link3'); ?>"><img src="<?php echo inkthemes_get_option('inkthemes_fimg3'); ?>" class="featured_img"  alt="fearured image" /></a>
            <?php } else { ?>
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/featured-img3.jpg" class="featured_img"  alt="fearured image" /></a>
            <?php } ?>
            <?php if ( inkthemes_get_option('inkthemes_feature3') !='' ) {  ?>
            <p><?php echo stripslashes(inkthemes_get_option('inkthemes_feature3')); ?></p>
            <?php } else { ?>
            <p><?php _e('Varius dui, quis posuere nibh mollis quis. Mauris omma rhoncus porttitor. Maecenas et euismod is elit. Nulla lus libero, ultrices','dzonia'); ?></p>
            <?php } ?>
            <a class="read_more" href="<?php if ( inkthemes_get_option('inkthemes_link3') !='' ) { echo inkthemes_get_option('inkthemes_link3'); } else { echo "#"; } ?>">read more</a> </div>
          <!--End inner area-->
        </div>
        <!--End col3-->
      </div>
      <!--End Column three-->
      <!--End Featured content-->
	  <div class="clear"></div>
    </div>
    <!--End Home content-->
  </div>
</div>
<?php get_footer(); ?>

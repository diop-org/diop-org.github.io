<?php get_header(); ?>
<div class="inner">
    <div class="container">
   <?php if(of_get_option('feature_cat_style') == 'full') { ?>
<?php if(of_get_option('cat_feature_on')) { ?>
   <?php include TEMPLATEPATH . '/feature-full.php'; ?>
<?php } ?>
   <?php } ?>
    
    <div class="main">
<?php the_breadcrumb(); ?>
   <?php if(of_get_option('feature_cat_style') == 'default') { ?>
<?php if(of_get_option('cat_feature_on')) { ?>
   <?php include TEMPLATEPATH . '/feature.php'; ?>
<?php } ?>
   <?php } ?>
<?php if(of_get_option('cat_lv_on')) { ?>
    <?php include TEMPLATEPATH . '/latest-video.php'; ?>
<?php } ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php cat_article(); ?>
<?php endwhile; ?>
<?php  else:  ?>
<!-- Else in here -->
<?php  endif; ?>
<?php mom_pagination(); ?>
<?php wp_reset_query(); ?>
    </div> <!--End Main-->
    <?php get_sidebar(); ?>
    </div> <!--End Container-->
 <?php get_footer(); ?>
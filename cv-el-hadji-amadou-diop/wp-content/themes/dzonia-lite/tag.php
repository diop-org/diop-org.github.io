<?php
/**
 * The template used to display Tag Archive pages
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
get_header(); ?>
<!--Start Page navi bg-->
<div class="page_navi_bg">
    <!--Start Container-->
    <div class="container_24">
        <div class="grid_24">
            <!--Start Page navi-->
          <div class="page_navi"><?php if (function_exists('inkthemes_breadcrumbs')) inkthemes_breadcrumbs(); ?> </div>
            <!--End Page navi-->
        </div>
    </div>
    <!--End Container-->
</div>
<!--End Page navi bg-->
<!--Start Container-->
<div class="container_24">
    <!--Start  content wrapper-->
    <div class="grid_24 content_wrapper">
        <div class="grid_18 alpha">
            <!--Start Content-->
            <div class="content">
                <h1><?php printf( __( 'Tag Archives: %s', 'dzonia' ), '' . single_cat_title( '', false ) . '' );?></h1>
                    <?php get_template_part( 'loop', 'index' ); ?>
                        <div class="clear"></div>  
                        <nav id="nav-single"> <span class="nav-previous">
                        <?php previous_post_link('%link', __('<span class="meta-nav">&larr;</span> Previous Post ', 'dzonia')); ?>
                            </span> <span class="nav-next">
                            <?php next_post_link('%link', __('Next Post <span class="meta-nav">&rarr;</span>', 'dzonia')); ?>
                            </span> </nav>
 
            </div>
            <!--End Content-->
        </div>
        <div class="grid_6 omega">
    <?php get_sidebar(); ?>
        </div>
    </div>
    <!--End Content Wrapper-->
<?php get_footer(); ?>
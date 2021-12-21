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
 * 
 */
?>
<?php get_header(); ?>
<!--Start Contetn wrapper-->
<div class="grid_24 content_wrapper">
    <!--Start Content-->
    <div class="content">
        <!--Start Slider Wrapper-->
        <div class="slider_wrapper">
            <div id="main" class="container">   
                <?php if (inkthemes_get_option('inkthemes_featureimg') != '') { ?>
                     <img src="<?php echo inkthemes_get_option('inkthemes_featureimg'); ?>"/>
                <?php } else { ?>
                     <img src="<?php echo get_template_directory_uri(); ?>/images/slideimg.jpg"/>
                <?php } ?>

            </div>
            <div class="slider_shadow"></div>
        </div>
        <!--End Slider wrapper-->
        <div class="clear"></div>
        <!--Start Feature content-->
        <div class="feature_content">
            <div class="one_third">
                <div class="wrap">
                    <h2>
                        <?php if (inkthemes_get_option('inkthemes_headline1') != '') { ?>
                            <?php echo stripslashes(inkthemes_get_option('inkthemes_headline1')); ?>
                        <?php } else { ?>
                            <?php _e( 'Four Different Skins', 'themia' ); ?>
                        <?php } ?>
                    </h2>
                    <?php if (inkthemes_get_option('inkthemes_img1') != '') { ?>
                        <img src="<?php echo inkthemes_get_option('inkthemes_img1'); ?>" alt="feature image"/>
                    <?php } else { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/featureimg-1.png"/>
                    <?php } ?>
                    <p>
                        <?php if (inkthemes_get_option('inkthemes_feature1') != '') { ?>
                            <?php echo stripslashes(inkthemes_get_option('inkthemes_feature1')); ?>
                        <?php } else { ?>
                            <?php _e( 'Our affiliate program pays out some of the biggest commissions available in the  mium WordPress', 'themia' ); ?>
                        <?php } ?>
                    </p>
                    <a href="<?php echo inkthemes_get_option('inkthemes_link1'); ?>" class="read_more"><?php _e( 'read more.....', 'themia' ); ?></a> </div>
            </div>
            <div class="one_third">
                <div class="wrap">
                    <h2>
                        <?php if (inkthemes_get_option('inkthemes_headline2') != '') { ?>
                            <?php echo stripslashes(inkthemes_get_option('inkthemes_headline2')); ?>
                        <?php } else { ?>
                            <?php _e( 'Amazing Shortcodes', 'themia' ); ?>
                        <?php } ?>
                    </h2>
                    <?php if (inkthemes_get_option('inkthemes_img2') != '') { ?>
                        <img src="<?php echo inkthemes_get_option('inkthemes_img2'); ?>" alt="feature image"/>
                    <?php } else { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/featureimg-2.png"/>
                    <?php } ?>
                    <p>
                        <?php if (inkthemes_get_option('inkthemes_feature2') != '') { ?>
                            <?php echo stripslashes(inkthemes_get_option('inkthemes_feature2')); ?>
                        <?php } else { ?>
                            <?php _e( 'Our affiliate program pays out some of the biggest commissions available in the  mium WordPress.', 'themia' ); ?>
                        <?php } ?>
                    </p>
                    <a href="<?php echo inkthemes_get_option('inkthemes_link2'); ?>" class="read_more"><?php _e( 'read more.....', 'themia' ); ?></a> </div>
            </div>
            <div class="one_third last">
                <div class="wrap">
                    <h2>
                        <?php if (inkthemes_get_option('inkthemes_headline3') != '') { ?>
                            <?php echo stripslashes(inkthemes_get_option('inkthemes_headline3')); ?>
                        <?php } else { ?>
                            <?php _e( 'Full Localisation Support', 'themia' ); ?>
                        <?php } ?>
                    </h2>
                    <?php if (inkthemes_get_option('inkthemes_img3') != '') { ?>
                        <img src="<?php echo inkthemes_get_option('inkthemes_img3'); ?>" alt="feature image"/>
                    <?php } else { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/featureimg-3.png"/>
                    <?php } ?>
                    <p>
                        <?php if (inkthemes_get_option('inkthemes_feature3') != '') { ?>
                            <?php echo stripslashes(inkthemes_get_option('inkthemes_feature3')); ?>
                        <?php } else { ?>
                            <?php _e( 'Our affiliate program pays out some of the biggest commissions available in the  mium WordPress.', 'themia' ); ?>
                        <?php } ?>
                    </p>
                    <a href="<?php echo inkthemes_get_option('inkthemes_link3'); ?>" class="read_more"><?php _e( 'read more.....', 'themia' ); ?></a> </div>
            </div>
        </div>
        <div class="clear"></div>
        <!--End Feature content-->
    </div>
    <!--End Content-->
</div>
<!--End Content wrapper-->
<div class="clear"></div>
</div>
<!--End Container-->
<!--Start Testimonial bg-->
<!--End Testimonial bg-->
<?php get_footer(); ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php 
$settings = new Wiredrive_Theme_Settings();
$fonts = $settings->getFonts();
$options = $settings->getOptions();
if ($options['tracking_code'] != '') {
    echo $options['tracking_code'];
} 
?>
<?php wp_head();?>
</head>
<body <?php body_class($options['menu_functionality']); ?>>
    <div id="container">
    
        <?php if ( is_front_page() ) :?>
        <div id="tagline"><p><?php bloginfo('description'); ?></p></div>
        <?php endif;?>
            
        <div id="header-wrapper">
            <div id="header"> 
                <?php 
                $headerImage = get_header_image();
                if(!empty($headerImage)) :
                ?>
                    <div id="logo">
                		<a href="<?php echo home_url(); ?>"><img src="<?php header_image(); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a>       
                    </div>
                <?php endif; ?>                
        
                <?php get_template_part('top-menu'); ?>
                
                <div class="clearer" style="clear:both;"></div>
            </div>           
        </div>    
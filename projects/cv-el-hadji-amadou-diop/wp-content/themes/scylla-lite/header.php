<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<?php $option =  get_option('scl_options'); ?>

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<?php wp_enqueue_style('customfont',get_template_directory_uri().'/fonts/'.$option['scl_fonts'].'.css'); ?> 
 
<!--SKIN Switch-->
<?php if(( isset( $option['scl_style'] ) && $option['scl_style']== "Default")) { ?>
    <?php get_template_part('skin1'); ?>
<?php }?>
<?php if(( isset( $option['scl_style'] ) && $option['scl_style']== "Spring")) { ?>
    <?php get_template_part('skin2'); ?>
<?php }?>
<?php if(( isset( $option['scl_style'] ) && $option['scl_style']== "Vintage")) { ?>
    <?php get_template_part('skin3'); ?>
<?php }?>
<?php if(( isset( $option['scl_style'] ) && $option['scl_style']== "Corporate")) { ?>
    <?php get_template_part('skin4'); ?>
<?php }?>

    <?php if($option["scl_diss_fbx"] == "1"){ ?>
    <?php } else { ?> 
    <?php wp_enqueue_style('fancybox_css',get_template_directory_uri().'/css/fancybox.css'); ?> 
    <?php } ?>

    <?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>

</head>


<body <?php body_class(); ?>>

<!--[if lte IE 6]><script src="<?php get_template_directory_uri(); ?>/ie6/warning.js"></script><script>window.onload=function(){e("<?php get_template_directory_uri(); ?>/ie6/")}</script><![endif]-->

<div class="pattern">
<div class="wrapper">


<!--HEADER-->
<div id="header">

<!--Social Share-->
<?php if($option["scl_hide_social"] == "1"){ ?>
<?php } else { ?>
<div class="social_wrap">
    <div class="social">
        <ul>
            <?php if($option["scl_hide_fb"] == "1"){ ?><?php } else { ?><li class="soc_fb"><a title="Facebook"  href="<?php echo $option['scl_fb_url'] ?>">Facebook</a></li><?php } ?>  
            <?php if($option["scl_hide_tw"] == "1"){ ?><?php } else { ?><li class="soc_tw"><a title="Twitter" href="<?php echo $option['scl_tw_url'] ?>">Twitter</a></li><?php } ?> 
            <?php if($option["scl_hide_ms"] == "1"){ ?><?php } else { ?><li class="soc_ms"><a title="Myspace"  href="<?php echo $option['scl_ms_url'] ?>">Myspace</a></li><?php } ?> 
            <?php if($option["scl_hide_ytb"] == "1"){ ?><?php } else { ?><li class="soc_ytb"><a title="Youtube"  href="<?php echo $option['scl_ytb_url'] ?>">Youtube</a></li><?php } ?> 
            <?php if($option["scl_hide_flckr"] == "1"){ ?><?php } else { ?><li class="soc_flkr"><a title="Flickr"  href="<?php echo $option['scl_flckr_url'] ?>">Flickr</a></li><?php } ?>
            <?php if($option["scl_hide_rss"] == "1"){ ?><?php } else { ?><li class="soc_rss"><a title="Rss Feed"  href="<?php echo $option['scl_rss_url'] ?>">RSS</a></li><?php } ?>
        </ul>
    </div>
</div>
<?php } ?>  


<!--LOGO-->
<div id="logo">
<h1><a class="text_logo" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
<?php if($option["scl_description"] == "1"){ ?><div class="desc"><?php bloginfo('description')?></div><?php } else { ?><?php } ?>
</div>

</div>
<!--TOPMENU-->
<div id="menu_wrap"><div id="topmenu"><?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?></div></div>
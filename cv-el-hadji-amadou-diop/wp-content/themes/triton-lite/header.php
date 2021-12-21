<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<?php $option =  get_option('trt_options'); ?>

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
   
   <?php if($option["trt_lft_logo"] == "1"){ ?>
	<style>#logo h1 a, .desc { text-align:left;}</style>
   <?php } ?>
<?php wp_enqueue_style('triton_customfont',get_template_directory_uri().'/fonts/'.$option['trt_fonts'].'.css'); ?>
<?php get_template_part('colors');?>

	<?php //comments_popup_script(); // off by default ?>
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
     
</head>


<body <?php body_class(); ?>>

<!--[if lte IE 6]><script src="<?php get_template_directory_uri(); ?>/ie6/warning.js"></script><script>window.onload=function(){e("<?php get_template_directory_uri(); ?>/ie6/")}</script><![endif]-->
<div class="pattern">

<!--TOPMENU-->
<div id="masthead">
	<div class="fake">
    <div class="center">
   	 <div id="menu_wrap"><div class="center"><div id="topmenu"><?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?></div><br style="clear:both" /></div></div>
     
     
     <!--Social Share-->
<?php if($option["trt_hide_social"] == "1"){ ?>
<?php } else { ?>
<div class="social_wrap">
    <div class="social">
        <ul>
            <?php if(($option["trt_hide_fb"] == "1") || (($option["trt_fb_url"] == ""))){ ?><?php } else { ?><li class="soc_fb"><a title="Facebook"  href="<?php echo $option['trt_fb_url'] ?>">Facebook</a></li><?php } ?>  
            <?php if(($option["trt_hide_tw"] == "1") || (($option["trt_tw_url"] == ""))){ ?><?php } else { ?><li class="soc_tw"><a title="Twitter" href="<?php echo $option['trt_tw_url'] ?>">Twitter</a></li><?php } ?> 
            <?php if(($option["trt_hide_ms"] == "1") || (($option["trt_ms_url"] == ""))){ ?><?php } else { ?><li class="soc_ms"><a title="Myspace"  href="<?php echo $option['trt_ms_url'] ?>">Myspace</a></li><?php } ?> 
            <?php if(($option["trt_hide_ytb"] == "1") || (($option["trt_ytb_url"] == ""))){ ?><?php } else { ?><li class="soc_ytb"><a title="Youtube"  href="<?php echo $option['trt_ytb_url'] ?>">Youtube</a></li><?php } ?> 
            <?php if(($option["trt_hide_flckr"] == "1") || (($option["trt_flckr_url"] == ""))){ ?><?php } else { ?><li class="soc_flkr"><a title="Flickr"  href="<?php echo $option['trt_flckr_url'] ?>">Flickr</a></li><?php } ?>
            <?php if(($option["trt_hide_rss"] == "1") || (($option["trt_rss_url"] == ""))){ ?><?php } else { ?><li class="soc_rss"><a title="Rss Feed"  href="<?php echo $option['trt_rss_url'] ?>">RSS</a></li><?php } ?>
            <?php if(($option["trt_hide_gplus"] == "1") || (($option["trt_gplus_url"] == ""))){ ?><?php } else { ?><li class="soc_plus"><a title="Google Plus"  href="<?php echo $option['trt_gplus_url'] ?>">Google Plus</a></li><?php } ?>
        </ul>
    </div>
</div>
<?php } ?>
    </div>
    </div>
</div>

<!--HEADER-->
<div id="header">
    <div class="center">
    	<!--LOGO-->
       
        <div id="logo">
        <h1><a class="text_logo" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
        <?php if($option["trt_description"] == "1"){ ?><?php } else { ?><div class="desc"><?php bloginfo('description')?></div><?php } ?>
        </div>
    </div>
</div>

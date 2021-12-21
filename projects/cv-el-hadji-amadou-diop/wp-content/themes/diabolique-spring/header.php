<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?>   <?php }
?> <?php wp_title(); ?></title>



<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

<?php        
$dir = get_bloginfo('template_directory');
wp_enqueue_style("Style", $dir."/style.css", false, "1.0");
?>


<!--[if lte IE 7]>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/ie7.css" type="text/css" media="all" />
<![endif]-->



  <!--[if lt IE 7]>
  <div style='border: 1px solid #F7941D; background: #FEEFDA; text-align: center; clear: both; height: 75px; position: relative;'>
    <div style='position: absolute; right: 3px; top: 3px; font-family: courier new; font-weight: bold;'><a href='#' onclick='javascript:this.parentNode.parentNode.style.display="none"; return false;'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-cornerx.jpg' style='border: none;' alt='Close this notice'/></a></div>
    <div style='width: 640px; margin: 0 auto; text-align: left; padding: 0; overflow: hidden; color: black;'>
      <div style='width: 75px; float: left;'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-warning.jpg' alt='Warning!'/></div>
      <div style='width: 275px; float: left; font-family: Arial, sans-serif;'>
        <div style='font-size: 14px; font-weight: bold; margin-top: 12px;'>You are using an outdated browser</div>
        <div style='font-size: 12px; margin-top: 6px; line-height: 12px;'>For a better experience using this site, please upgrade to a modern web browser.</div>
      </div>
      <div style='width: 75px; float: left;'><a href='http://www.firefox.com' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-firefox.jpg' style='border: none;' alt='Get Firefox 3.5'/></a></div>
      <div style='width: 75px; float: left;'><a href='http://www.browserforthebetter.com/download.html' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-ie8.jpg' style='border: none;' alt='Get Internet Explorer 8'/></a></div>
      <div style='width: 73px; float: left;'><a href='http://www.apple.com/safari/download/' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-safari.jpg' style='border: none;' alt='Get Safari 4'/></a></div>
      <div style='float: left;'><a href='http://www.google.com/chrome' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-chrome.jpg' style='border: none;' alt='Get Google Chrome'/></a></div>
    </div>
  </div>
  <![endif]-->


<?php  
wp_enqueue_script('jquery');       
$dir = get_bloginfo('template_directory');
wp_enqueue_script("Search", $dir."/js/search.js", false, "1.0");
wp_enqueue_script("Cufon", $dir."/js/cufon.js", false, "1.0");
wp_enqueue_script("Sansation", "http://diaboliquedesign.googlecode.com/files/Sansation.font.js", false, "1.0"); 
?>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div id="main">

<div id="header">
<div id="logo"><h1><a href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
</div><!--logo ends-->




<div id="icons">
<a href="<?php bloginfo('url'); ?>"><img src="http://i789.photobucket.com/albums/yy175/diaboliquedesign/black%20icons/icon_home.png" alt="Home" width="60" height="60" /></a>

<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;amp;t=<?php the_title(); ?>" rel="nofollow" title="Share on Facebook."><img src="http://i789.photobucket.com/albums/yy175/diaboliquedesign/black%20icons/icon_facebook.png" alt="Facebook" width="60" height="60" /></a>

<a href="http://twitter.com/home/?status=<?php the_title(); ?> : <?php the_permalink(); ?>" rel="nofollow" title="Tweet this!"><img src="http://i789.photobucket.com/albums/yy175/diaboliquedesign/black%20icons/icon_twitter.png" alt="Twitter" width="60" height="60" /></a>

<a href="http://digg.com/submit?phase=2&amp;amp;url=<?php the_permalink(); ?>&amp;amp;title=<?php the_title(); ?>" rel="nofollow" title="Digg this!"><img src="http://i789.photobucket.com/albums/yy175/diaboliquedesign/black%20icons/icon_digg.png" alt="Digg" width="60" height="60" /></a>

<a href="http://del.icio.us/post?url=<?php the_permalink(); ?>&amp;amp;title=<?php the_title(); ?>" rel="nofollow" title="Bookmark on Delicious."><img src="http://i789.photobucket.com/albums/yy175/diaboliquedesign/black%20icons/icon_delicious.png" alt="Delicious" width="60" height="60" /></a>

<a href="<?php bloginfo('rss2_url'); ?>"><img src="http://i789.photobucket.com/albums/yy175/diaboliquedesign/black%20icons/icon_rss.png" alt="RSS" width="60" height="60" /></a>
</div><!--icons ends-->



</div><!--header ends-->





<div id="container">
<div id="top">
<ul>
<div id="headline"><li class="just-another"><?php bloginfo('description'); ?></li>

</div><!--headline ends-->
<div id="search"><?php get_search_form(); ?></div><!--search ends-->
</ul>
</div><!--top ends-->

<div class="clear"></div>

<div id="general">

<div id="ad1"></div>

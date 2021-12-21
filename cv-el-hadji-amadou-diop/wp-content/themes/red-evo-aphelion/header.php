<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">

	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" /> 
	
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
     <?php wp_enqueue_script("jquery"); ?>

	<?php wp_head(); ?>
    
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/styleswitcher.js"></script>
    <link href="<?php bloginfo('stylesheet_directory'); ?>/css/alarge.css" rel="alternate stylesheet" type="text/css" media="screen" title="alarge"/>
<link href="<?php bloginfo('stylesheet_directory'); ?>/css/amedium.css" rel="alternate stylesheet" type="text/css" media="screen" title="amedium"/>
<link href="<?php bloginfo('stylesheet_directory'); ?>/css/asmall.css" rel="alternate stylesheet" type="text/css" media="screen" title="asmall"/>
<?php
/* This code retrieves all our admin options. */
global $options;
foreach ($options as $value) {
	if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
?>
<?php 	if ($rea_color_theme) { ?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/<?php echo $rea_color_theme;?>.css" type="text/css" media="screen" />
<?php } ?>

  
<script type="text/javascript">
var $j = jQuery.noConflict();

$j(function(){
//toggle message_body
	$j(".collapse-head").click(function(){
		$j(this).next("ul").slideToggle(500)
		return false;
	});
	$j(".collapse-head").click(function(){
		$j(this).next("div").slideToggle(500)
		return false;
	});
});
</script>
    <!--[if lte IE 6]>
<style type="text/css">
a#sitename1, a.btnicon, .bgbottom{
	behavior: url("<?php bloginfo('stylesheet_directory'); ?>/js/iepngfix.htc");
}

#user4{
margin-right:1px;
}
</style>
<![endif]-->

</head>
<body>
<div id="wrapper" class="width_<?php echo $rea_width_style;?>">
	<div id="heading">
	  <h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
<p class="tagline"><?php bloginfo('description'); ?></p> 

	   <div id="buttons"><a href="#" id="alarge" class="btnicon" title="<?php _e('Extra large')?>" onclick="setActiveStyleSheet('alarge'); return false;"><?php _e('Extra large')?></a><a href="#" id="amedium" class="btnicon" title="<?php _e('Large')?>" onclick="setActiveStyleSheet('amedium'); return false;"><?php _e('Large')?></a><a href="#" id="asmall" class="btnicon" title="<?php _e('Normal')?>" onclick="setActiveStyleSheet('asmall'); return false;"><?php _e('Normal')?></a></div>

	</div><!--heading-->
	<div id="header"><div class="bgleft"><div class="bgright"><div class="bgbl">
		
		<div id="user3">
		<ul><?php wp_list_pages('depth=1&title_li='); ?> </ul> 
		</div><!--user3-->
	
		<div id="top">
		  <ul> 
    <?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar(1) ) : ?>
        <li><h3>About</h3>  This is the top bar widget. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis quis ipsum magna, sit amet ultricies nulla. Phasellus justo neque, interdum sed porta tempus, dapibus eu augue. Curabitur quis dolor ac nunc accumsan ultricies. Praesent et diam orci, id tincidunt massa. Nunc ut tortor turpis.</li> 
    <?php endif; ?> 
    </ul>
		</div><!--top-->
		
	</div></div></div></div><!--header-->
	
	<div id="container"><div class="bgright"><div class="bg">
	
	  <div id="user4"><div class="bgright4"><div class="bg4">
      <!--search code starts-->
	   <form method="get" id="searchform" action="<?php bloginfo('home'); ?>"> 
            <div> 
            <input type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" size="15" /> 
            <input name="submit" type="image" id="searchsubmit" value="Search" src="<?php bloginfo('stylesheet_directory');?>/images/search.png"/> 
            <div class="clear"></div>
            </div> 
        </form> 
        <!--search ends-->
	  </div></div></div><!--search-->
	  <div id="content">
	  	<div class="middlewrap" id="middlewrap">
	  	   <div class="middle" id="middlenarrow"><div class="middlebg">
			 <div id="component">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<?php 
global $options;
foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } }
?>
 <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
 <title><?php if (is_single() || is_page() || is_archive()) : ?><?php wp_title('',true); ?> | <?php bloginfo('name'); ?><?php else : ?><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?><?php endif; ?></title>
 <?php if(is_single()){?>
 <link rel="canonical" href="<?php echo get_permalink($post->ID);?>" />
 <?php } ?>

 <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<?php if(!empty($jowtheme_rss_url)) : ?>
 <link title="RSS 2.0" type="application/rss+xml" href="<?php echo $jowtheme_rss_url; ?>" rel="alternate" />
<?php else: ?>
 <link title="RSS 2.0" type="application/rss+xml" href="<?php bloginfo('rss2_url'); ?>" rel="alternate" />
<?php endif; ?>
 <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
 <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?> 
 <?php wp_head(); ?>	
</head>
<body>

<div id="wrapper" class="encadre">
	<div class="tl"></div>
	<div class="tr"></div>

    	<div id="header">
			<div id="social">
				<div class="rss">
					<?php if(!empty($jowtheme_rss_url)) : ?>
					<a href="<?php echo $jowtheme_rss_url; ?>" title="Subscribe this site."></a>
					<?php else: ?>
					<a href="<?php bloginfo('rss2_url'); ?>" title="Subscribe this site."></a>
					<?php endif; ?>
				</div>
				
				<?php if(!empty($jowtheme_tw_url)) : ?>
				<div class="twitter">
				<a href="<?php echo $jowtheme_tw_url; ?>" title="Follow me on twitter."></a>
				</div>
				<?php endif; ?>
							
				<?php if(!empty($jowtheme_fb_url)) : ?>
				<div class="fb">
				<a href="<?php echo $jowtheme_fb_url; ?>" title="Poke me on facebook."></a>
				</div>
				<?php endif; ?>
				
			</div>
        </div> <!--header ends-->
		<div id="headerlogo">	
		<a href="<?php echo get_settings('home') ?>/" id="logo" title="<?php bloginfo('name'); ?>" class="replace"><span><?php bloginfo('name'); ?></span></a>
		
		
        <form id="search_form" method="get" action="<?php bloginfo('home') ?>">
        	<p><input id="s" name="s" type="text" size="21" value="<?php _e('Type your word here...', 'js-o4w'); ?>" onfocus="if (this.value == '<?php _e('Type your word here...', 'js-o4w'); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Type your word here...', 'js-o4w'); ?>';}" />
            	<input type="submit" id="submit-s" value="" /></p>
        </form> <!--form ends-->
</div>
        <div id="banner">
        </div> <!--banner ends-->
        
        <div id="navigation">
        	<ul>
			<?php if ($jowtheme_navi_list == "Pages") {
			include (TEMPLATEPATH . '/navi-list.php'); }?>
			<?php if ($jowtheme_navi_list == "Categories") {
			wp_list_categories('orderby=name&show_count=0&title_li=&hierarchical=0'); }?>
        	</ul>
        </div> <!--navigation ends-->
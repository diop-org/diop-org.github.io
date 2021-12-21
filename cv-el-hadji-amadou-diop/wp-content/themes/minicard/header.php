<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

	<title><?php 
		if (function_exists('themeslice_title_tag')) : 
			themeslice_title_tag(); 
		else : 
			wp_title('&laquo;', true, 'right');
			bloginfo('name'); 
		endif;
	?></title>
	
	<meta name="viewport" content="width=device-width" />
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/js/jquery.fancybox/jquery.fancybox.css" type="text/css" media="screen" />
	<!--[if IE 7]><link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/hacks/hack7.css" type="text/css" /><![endif]-->
	<!--[if IE 6]><link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/hacks/hack6.css" type="text/css" /><![endif]-->
	
	<?php
		$mtheme = get_option('minicard_theme');
		$mtheme_p = get_option('minicard_theme_p');
		if (!$mtheme_p) $mtheme_p = 'burst.jpg';
		if ($mtheme_p=='burst.jpg') $mtheme_repeat = 'no-repeat'; else $mtheme_repeat = 'repeat';
		if ($mtheme) {
			echo '<link rel="stylesheet" href="'.get_bloginfo('template_url').$mtheme.'/style.css" type="text/css" media="screen" />';
			echo '
				<style type="text/css">
					body {
						background-image: url('.get_bloginfo('template_url').''.$mtheme.'/images/bg/'.$mtheme_p.');
						background-repeat:'.$mtheme_repeat.';
					}
				</style>
			';
		} else {
			echo '
				<style type="text/css">
					body {
						background-image: url('.get_bloginfo('template_url').'/images/bg/'.$mtheme_p.');
						background-repeat: '.$mtheme_repeat.';
					}
				</style>
			';
		}
	?>

	<?php wp_enqueue_script('jquery'); wp_head(); ?>
	
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.fancybox/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.fancybox/jquery.fancybox-1.2.1.pack.js"></script>	
	<script type="text/javascript">
	/* <![CDATA[ */
		jQuery.noConflict();
		(function($) { 
			$(function() {
			
				<?php if (get_option('main_nav_ajax')=='yes') : ?>
							
				// Main Nav Ajax Stuff
				$('#mainNav a').click(function(){
					var url = $(this).attr('href');
					
					$("#content").slideUp('',function(){
						$(this).load( url + " #content .inner", function() {
							$(this).slideDown();
						})
					});
					
					$('#mainNav li').removeClass('current_page_item current_page_parent current_page_ancestor');
					$(this).parent().addClass('current_page_item');
					return false;
				});
				
				<?php endif; ?>
				
				// Lightbox
				$("a.lightbox, .gallery-item a").fancybox({ 
					'zoomOpacity'			: true,
					'overlayShow'			: true,
					'zoomSpeedIn'			: 500,
					'zoomSpeedOut'			: 500,
					'easingIn'				: 'easeOutBack',
					'easingOut'				: 'easeInBack'
					}); 
				$(".text-lightbox").fancybox({ 
					'zoomOpacity'			: true,
					'overlayShow'			: true,
					'hideOnContentClick'	: false,
					'padding'				: 18,
					'callbackOnShow'		: function(){
							$('#fancy_title').hide();
						}
					});
					
				// Feed AJAX
				<?php if (file_exists(TEMPLATEPATH.'/premium/feed_head.js')) include(TEMPLATEPATH.'/premium/feed_head.js'); ?>				
			});
		})(jQuery);
	/* ]]> */
	</script>	
	
</head>
<body>
<div id="wrapper">

	<div class="vcard" id="header">
	
		<img class="photo" src="<?php if ($photo_url = get_option('photo_url')) echo $photo_url; else echo get_bloginfo('template_url').get_option('minicard_theme').'/images/photo.png'; ?>" alt="Photo" height="64" width="64" />
		
		<?php if (is_home() || is_front_page()) : ?>
			<h1 id="name"><a href="<?php echo get_option('home'); ?>/" class="fn url"><?php echo get_bloginfo('name'); ?></a></h1>
		<?php else : ?>
			<div id="name"><a href="<?php echo get_option('home'); ?>/" class="fn url"><?php echo get_bloginfo('name'); ?></a></div>			
		<?php endif; ?>
		<p class="title"><?php bloginfo('description'); ?></p>

		<?php
			$vcard_email = get_option('vcard_email');
			$vcard_org = get_option('vcard_org');
			$vcard_street = get_option('vcard_street');
			$vcard_locality = get_option('vcard_locality');
			$vcard_region = get_option('vcard_region');
			$vcard_postal_code = get_option('vcard_postal_code');
			$vcard_country = get_option('vcard_country');
			$vcard_tel = get_option('vcard_tel');
			
			if ($vcard_email || $vcard_org || $vcard_street || $vcard_locality || $vcard_region || $vcard_postal_code || $vcard_country || $vcard_tel) :
			echo '<dl class="contact_details">';

			if ($vcard_email) echo '
				<dt>Email</dt>
				<dd>'.encode_email($vcard_email, '', 'email', 'mailto:').'</dd>';
			if ($vcard_org) echo '
				<dt>Org</dt>
				<dd class="org">'.$vcard_org.'</dd>';
			if ($vcard_street || $vcard_locality || $vcard_region || $vcard_postal_code || $vcard_country) {
				echo '<dt>Address</dt>
				<dd class="adr">';
				
					 if ($vcard_street) echo '<span class="street-address">'.$vcard_street.'</span><br/>';
					 if ($vcard_locality) echo '<span class="locality">'.$vcard_locality.'</span><br/>';
					 if ($vcard_region) echo '<span class="region">'.$vcard_region.'</span><br/>';
					 if ($vcard_postal_code) echo '<span class="postal-code">'.$vcard_postal_code.'</span><br/>';
					 if ($vcard_country) echo '<span class="country-name">'.$vcard_country.'</span>';
				
				echo '</dd>';
			}
			if ($vcard_tel) echo '
				<dt>Phone</dt>
				<dd class="tel">'.$vcard_tel.'</dd>';

			echo '</dl>';
			endif;
		
		echo '<div class="clear"></div>';
		
		if (get_option('vcard_enable')=='yes') {
		
			echo '<a href="http://feeds.technorati.com/contacts/'.get_bloginfo('url').'" class="dlvcard"><img src="'.get_bloginfo('template_url').get_option('minicard_theme').'/images/vcard.png" alt="Download vCard" width="46" height="38" title="Download vCard" /></a>'; 
		}
		?>

	</div>
	<div class="clear"></div>
	<div id="mainNav">
		<?php
			if (function_exists('wp_nav_menu')) :
				add_filter( 'wp_nav_menu_items', 'minicard_menu_search_box', 1, 2 );
				wp_nav_menu( array( 'container' => '', 'depth' => 1, 'fallback_cb' => 'minicard_page_menu' ));
			else :
				minicard_page_menu();
			endif;
		?>
		<div class="clear"></div>
	</div>
	<div id="content_wrapper"><div id="content"><div class="inner">
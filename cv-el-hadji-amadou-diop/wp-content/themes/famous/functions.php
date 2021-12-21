<?php /*
 License: GNU General Public License v3.0
 License URI: http://www.gnu.org/licenses/gpl-3.0.html
 Author: MegaThemes (http://www.megathemes.com)
*/

defined('ABSPATH')
or die('no direct access');

include get_template_directory() . '/megaframe/global.php';

mframe( 'globals', array(
	// Globals
	'version-theme'				=> '2.0',
	'version-panel'				=> '1.0',
	'url-upgrade'				=> 'http://www.megathemes.com/famous/#order',
	'url-forums'				=> 'http://www.megathemes.com/forums/',
	'url-themes-free'			=> 'http://www.megathemes.com/category/LFT/feed/',
	'url-themes-new'			=> 'http://www.megathemes.com/category/OLT/feed/',
	'order-url'					=> 'http://www.megathemes.com/themes',
	'price-upgrade'				=> '$9.47',
	'price-pro'					=> '$19.47',

	'thumb-small-w'				=> 28,
	'thumb-small-h'				=> 28,
	'thumb-medium-w'			=> 622,
	'thumb-medium-h'			=> 280,
	'thumb-large-w'				=> 939,
	'thumb-large-h'				=> 320,

	'logo-image-support'		=> true,
	'logo-image-w'				=> 143,
	'logo-image-h'				=> 31,
	'logo-text'					=> get_bloginfo( 'name' ),

	'fonts-cufon'				=> array( 'Liberation Sans' ),
	'fonts-websafe'				=> array( 'Arial' ),
	'fonts-google'				=> array( 'Oswald', 'Yanone Kaffeesatz', 'Abel', 'PT Sans' ),

	'thumb-medium-show'			=> 0,
	'thumb-medium-location'		=> array( 'home', 'blog', 'category', 'archive' ),
	'layout'					=> 'left',
	'style'						=> 0,
	'show-feeds'				=> 1,
	'show-login'				=> 1,
	'show-posted-by'			=> 1,
	'show-posted-in'			=> 1,
	'show-posted-on'			=> 1,
	'show-tags'					=> 1,
	'show-excerpt'				=> 0,
	'excerpt-length'			=> 55,
	'show-comment-link'			=> 1,
	'show-share'				=> 1,
	'show-read-more'			=> 1,
	'show-comments'				=> 1,


	'mcapi' => '',
	'mclist' => '',
	'feedburnerid' => '',
	'twitterid' => '',
	'facebookid' => '',
	'flickrid' => '',
	'diggid' => '',
	'deliciousid' => '',
	'youtubeid' => '',
	'yahooid' => '',
	'stumbleuponid' => '',
	'index-cats' => '',
	'adbox-posts' => '',
	'adbox-side' => '',
	'hook-footer' => '',
	
	// Widgets
	'widget-posts-title1'		=> 'Recent Posts',
	'widget-posts-title2'		=> 'Popular Posts',
	'widget-posts-count'		=> 3,

	'widget-comments-title'		=> 'Recent Comments',
	'widget-comments-count'		=> 3,

	'widget-tweets-title'		=> 'Latest Tweets',
	'widget-tweets-count'		=> 3,

	'widget-follow-title'		=> 'Follow Us',

	'widget-newsletter-title'	=> 'Newsletter',
	'widget-newsletter-service'	=> 'fb',

	'widget-register-title'		=> 'Registration',
	'widget-register-text'		=> 'If you don\'t have an account yet, you can register below.',
	'widget-register-text-alt'	=> 'Registration is currently closed.',

	'widget-login-title'		=> 'Login',
	'widget-login-text'			=> 'If you have an account with us, you can safely login with the form below.',
	'widget-login-text-alt'		=> 'You are already logged in.',

	'widget-calendar-title'		=> 'Calendar',
	'widget-archives-title'		=> 'Archive',
	'widget-categories-title'	=> 'Categories',
	'widget-search-title'		=> 'Search',

	// MegaPanel
	'pages-above-posts'			=> 0,
	'pages-below-posts'			=> 1,
	'pages-above-comms'			=> 0,
	'pages-below-comms'			=> 1,

	'adbox-posts-position'		=> 2,
	'adbox-posts-align'			=> 'center',
	'adbox-side-position'		=> 'top',

	'front-on'					=> 1,
	'index-offset'				=> 0,
	'timthumb'					=> 0,

	'slider-show'				=> 1,
	'slider-location'			=> array( 'home', 'blog', 'category', 'archive' ),
	'slider-type-flash'			=> 1,
	'slider-hover-pause'		=> 1,
	'slider-animation'			=> 'fade',
	'slider-speed'				=> 1,
	'slider-timeout'			=> 6,
	'slider-auto-pull'			=> 0,
	'slider-count'				=> 5,
	'slider-order'				=> 'date',
	'slider-pull-pages'			=> 0,
	'slider-cats'				=> 0,
	'slider-pages'				=> array(0),
	'slider-randomize'			=> 0,
	'slider-images'				=> "./wp-content/themes/famous/images/sampledata/slide1.png\r\n./wp-content/themes/famous/images/sampledata/slide2.png\r\n./wp-content/themes/famous/images/sampledata/slide3.png\r\n./wp-content/themes/famous/images/sampledata/slide4.png\r\n./wp-content/themes/famous/images/sampledata/slide5.png\r\n./wp-content/themes/famous/images/sampledata/slide6.png",

	'front-action1-title'		=> 'Media ready',
	'front-action1-text'		=> 'Famous supports not only images but video too and some other media types. See examples of these features in the <a href="#">portfolio section</a>.',
	'front-action2-title'		=> '2 Slideshow options',
	'front-action2-text'		=> 'Famous has 2 header styles built in each easily editable and highly customizable.<br /><a href="index.html">jQuery</a>, <a href="index2.html">Flash</a>.',
	'front-action3-title'		=> '2 Skins to choose',
	'front-action3-text'		=> 'We have 2 colour schemes to choose from!<br /><a href="../style-1/index.html">Skin 1</a>, <a href="../style-2/index.html">Skin 2</a>.',

	'front-feature1-text'		=> 'Sed eleifend cursus felis, ac volutpat lorem ultrices porttitor. Phasellus eget ipsum vitae metus rhoncus faucibus ut eget mi. Pellentesque et diam massa.',
	'front-feature1-title'		=> 'Functional Cross-Browser',
	'front-feature1-image'		=> './wp-content/themes/famous/images/sampledata/feature1.png',
	'front-feature1-link'		=> 'http://',

	'front-feature2-text'		=> 'Sed eleifend cursus felis, ac volutpat lorem ultrices porttitor. Phasellus eget ipsum vitae metus rhoncus faucibus ut eget mi. Pellentesque et diam massa.',
	'front-feature2-title'		=> 'A random news title',
	'front-feature2-image'		=> './wp-content/themes/famous/images/sampledata/feature2.png',
	'front-feature2-link'		=> 'http://',

	'front-feature3-text'		=> 'Sed eleifend cursus felis, ac volutpat lorem ultrices porttitor. Phasellus eget ipsum vitae metus rhoncus faucibus ut eget mi. Pellentesque et diam massa.',
	'front-feature3-title'		=> 'We now support flash',
	'front-feature3-image'		=> './wp-content/themes/famous/images/sampledata/feature3.png',
	'front-feature3-link'		=> 'http://',

	'front-feature4-text'		=> 'Sed eleifend cursus felis, ac volutpat lorem ultrices porttitor. Phasellus eget ipsum vitae metus rhoncus faucibus ut eget mi. Pellentesque et diam massa.',
	'front-feature4-title'		=> 'Every detail is important',
	'front-feature4-image'		=> './wp-content/themes/famous/images/sampledata/feature4.png',
	'front-feature4-link'		=> 'http://',

	'summary-show'				=> 1,
	'summary-source-page'		=> 0,
	'summary-page'				=> 0,
	'summary-text'				=> 'Sed eleifend cursus felis, ac volutpat lorem ultrices porttitor. Phasellus eget ipsum vitae metus rhoncus faucibus ut eget mi. Pellentesque et diam massa. Sed condimentum ante ac turpis ornare vestibulum. Maecenas sapien tellus, pretium vel pulvinar ut, scelerisque sed purus. Vivamus bibendum turpis at nisl dapibus porta. Pellentesque quis metus nec sapien condimentum vulputate eget sit amet sapien. Mauris pellentesque risus bibendum risus suscipit id molestie felis lacinia. Fusce orci ipsum, interdum sed sodales sed, blandit sit amet dui. Phasellus faucibus metus a dolor iaculis nec venenatis magna dictum.',
	'summary-title'				=> 'What makes us different to everybody else?',
	'feature-boxes-show'		=> 1,
	'front-blog-show'			=> 0,

	'contact-form-title'		=> 'Contact our team',
	'contact-form-text'			=> 'Get in touch with our 24/7 support team regarding any issues you may have.',
	'contact-form-email'		=> get_option( 'admin_email' ),

	'bookmarks' => array(
		'Feedburner'			=> 'http://feeds.feedburner.com/',			'Twitter'			=> 'http://twitter.com/',
		'Facebook'				=> 'http://www.facebook.com/',				'Flickr'			=> 'http://www.flickr.com/photos/',
		'Digg'					=> 'http://digg.com/',						'Delicious'			=> 'http://www.delicious.com/',
		'YouTube'				=> 'http://www.youtube.com/user/',			'Yahoo'				=> 'http://profiles.yahoo.com/',
		'StumbleUpon'			=> 'http://www.stumbleupon.com/stumbler/',
	),
));

mframe( 'typography', array(
		'typography-text'		=> array( 'family' => 'Arial',				'size' => '14px'											),
		'typography-logo'		=> array( 'family' => 'Liberation Sans',	'size' => '27px',	'height' => '25px',	'styles' => array( 'Bold' )),
		'typography-h1'			=> array( 'family' => 'Liberation Sans',	'size' => '28px'											),
		'typography-h2'			=> array( 'family' => 'Liberation Sans',	'size' => '24px'											),
		'typography-h3'			=> array( 'family' => 'Liberation Sans',	'size' => '24px'											),
		'typography-h4'			=> array( 'family' => 'Liberation Sans',	'size' => '18px'											),
		'typography-h5'			=> array( 'family' => 'Liberation Sans',	'size' => '14px'											),
		'typography-h6'			=> array( 'family' => 'Liberation Sans',	'size' => '11px',	'styles' => array( 'Uppercase' )		),
		'typography-h3-popup'	=> array( 'family' => 'Yanone Kaffeesatz',	'size' => '30px'											)
));

mframe( 'skins', array(
	array(
		'name'					=> 'Sky Blue',		'pre-color'				=> '#6fabc6',		'cat-desc-color'		=> '#222222',
		'color-bg'				=> '#e8eef1',		'pre-border'			=> '#abc7d4',		'post-date-border'		=> '#c8d0dc',
		'color-text'			=> '#8b9cae',		'blockquote-border'		=> '#c7d1dd',		'post-day-color'		=> '#c8d0dc',
		'color-text-shade'		=> '#ffffff',													'post-month-color'		=> '#c8d0dc',
		'color-link'			=> '#fc4700',		'cat-active-hover'		=> '#000000',		'toolbar-separator'		=> '#acbec5',
		'color-link-hover'		=> '#ff8400',		'cat-active-bg'			=> '#e8eef1',		'toolbar-border'		=> '#cbdae1',
													'side-link-hline'		=> '#CBDAE1',		'toolbar-bgcolor'		=> 'transparent',
		'color-h1-head'			=> '#000000',		'side-text-shadow'		=> '#ffffff',		'comment-back'			=> '#edf5f9',
		'color-h1-head-alt'		=> '#90a8b1',													'comment-back-odd'		=> '#ffffff',
		'color-h2-actions'		=> '#343b42',
		'color-h3-side'			=> '#343b42',
		'color-h1'				=> '#000000',
		'color-h2'				=> '#343b42',		'footer-bgcolor'		=> '#24282a',		'comment-border'		=> '#cbdae1',
		'color-h3'				=> '#343b42',		'footer-link-color'		=> '#ffffff',		
		'color-h4'				=> '#000000',		'footer-ahover-border'	=> '#999999',
		'color-h5'				=> '#343b42',		'footer-text-shadow'	=> '#000000',		'img-back'				=> '#e0ebef',
		'color-h6'				=> '#343b42',		'footer-h3-color'		=> '#ffffff',		'img-back-over'			=> '#c8e5f0',
													'footer-img-back'		=> '#24282a',		'img-border-color'		=> '#adccde',
		'color-logo'			=> '#ffffff',		'footer-img-back-over'	=> '#2c3032',
		'nav-color'				=> '#cae4ed',		'footer-img-border'		=> '#383c3e',		'post-table-head-color'	=> '#3a4346',
		'nav-active'			=> '#ffffff',		'footer-hline'			=> '#383c3e',		'post-table-border'		=> '#ced9dd',
		'nav-bgcolor'			=> '#25282c',		'footer-hline-sub'		=> '#151819',		'post-table-bgcolor'	=> '#ffffff',
		'nav-border'			=> '#31363b',		'footer-text-shadow'	=> '#000000',		'post-table-text-color'	=> '#4f6b72',
		'nav-border-alt'		=> 'transparent',
		'subnav-color'			=> '#baced6',		'hline'					=> '#cbdae1',
		'subnav-bgcolor'		=> '#222428',		'hline-sub'				=> '#ffffff',
		'subnav-text-shadow'	=> '#000000',		'page-link-border'		=> '#cbdae1',
		'subnav-hover-bgcolor'	=> '#191b1e',		'page-link-hover-back'	=> '#ffffff',
		
		'popup-bg'				=> '#e3eef2',		'popup-border'			=> '#cddfe5'
	),
	array(
		'name'					=> 'White',			'pre-color'				=> '#6fabc6',		'cat-desc-color'		=> '#222222',
		'color-bg'				=> '#ffffff',		'pre-border'			=> '#abc7d4',		'post-date-border'		=> '#c8d0dc',
		'color-text'			=> '#8b9cae',		'blockquote-border'		=> '#c7d1dd',		'post-day-color'		=> '#c8d0dc',
		'color-text-shade'		=> '#ffffff',													'post-month-color'		=> '#c8d0dc',
		'color-link'			=> '#9b968b',		'cat-active-hover'		=> '#000000',		'toolbar-separator'		=> '#acbec5',
		'color-link-hover'		=> '#b49552',		'cat-active-bg'			=> '#e8eef1',		'toolbar-border'		=> '#cbdae1',
													'side-link-hline'		=> '#d6d6d6',		'toolbar-bgcolor'		=> '#e7e9ea',
		'color-h1-head'			=> '#000000',		'side-text-shadow'		=> '#ffffff',		'comment-back'			=> '#eff1f3',
		'color-h1-head-alt'		=> '#a3aaac',													'comment-back-odd'		=> '#ffffff',
		'color-h2-actions'		=> '#343b42',
		'color-h3-side'			=> '#343b42',
		'color-h1'				=> '#000000',
		'color-h2'				=> '#343b42',		'footer-bgcolor'		=> '#eceeef',		'comment-border'		=> '#ccd2d6',
		'color-h3'				=> '#343b42',		'footer-link-color'		=> '#9b968b',		
		'color-h4'				=> '#000000',		'footer-ahover-border'	=> '#999999',
		'color-h5'				=> '#343b42',		'footer-text-shadow'	=> '#ffffff',		'img-back'				=> '#e5eaeb',
		'color-h6'				=> '#343b42',		'footer-h3-color'		=> '#000000',		'img-back-over'			=> '#ffffff',
													'footer-img-back'		=> '#e5eaeb',		'img-border-color'		=> '#ccd2d6',
		'color-logo'			=> '#4f585c',		'footer-img-back-over'	=> '#ffffff',
		'nav-color'				=> '#4f585c',		'footer-img-border'		=> '#ccd2d6',		'post-table-head-color'	=> '#3a4346',
		'nav-active'			=> '#000000',		'footer-hline'			=> '#bdd2da',		'post-table-border'		=> '#ced9dd',
		'nav-bgcolor'			=> '#e7ecee',		'footer-hline-sub'		=> '#ffffff',		'post-table-bgcolor'	=> '#ffffff',
		'nav-border'			=> '#d8d8d8',		'footer-text-shadow'	=> '#ffffff',		'post-table-text-color'	=> '#4f6b72',
		'nav-border-alt'		=> '#ffffff',
		'subnav-color'			=> '#95a6ad',		'hline'					=> '#cbdae1',
		'subnav-bgcolor'		=> '#e0e6e9',		'hline-sub'				=> '#ffffff',
		'subnav-text-shadow'	=> '#ffffff',		'page-link-border'		=> '#cbdae1',
		'subnav-hover-bgcolor'	=> '#ffffff',		'page-link-hover-back'	=> '#ffffff',
		
		'popup-bg'				=> '#eaeaea',		'popup-border'			=> '#d9d9d9'
	),
));

mframe( 'options', array(
	'Settings' => array(
		'Global Elements' => array(

			'heading-header'			=> array( 'name' => 'Header'												),

			'logo-image-support'		=> array( 'name' => 'Image Logo Support',			'type' => 'onoff',
				'sub-options' => array(
					'logo-image'		=> array( 'name' => 'Image Logo URL',				'type' => 'file',		'ext' => '*.jpg;*.gif;*.png'	),
					'logo-image-h'		=> array( 'name' => 'Logo Height (px)',				'type' => 'xtext',		'class' => 'wide'		),
				),

				'sub-options-off' => array(
					'logo-text'			=> array( 'name' => 'Text Logo Content',			'type' => 'text',		'class' => 'wide'	)
				)
			),
			'logo-image-w'				=> array( 'name' => 'Logo Width (px)',				'type' => 'xtext',		'class' => 'wide'),

			'favicon'					=> array( 'name' => 'Favicon URL','pro'=>'pro',		'type' => 'file',		'ext' => '*.ico'	),
			'show-feeds'				=> array( 'name' => 'Feeds Popup',					'type' => 'onoff',		'class' => 'wide'	),
			'show-login'				=> array( 'name' => 'Login Popup','pro'=>'pro',		'type' => 'onoff',		'class' => 'wide'	),
			
			'heading-footer'			=> array( 'name' => 'Footer' ),

			//'show-footer'				=> array( 'name' => 'Footer Bar',						'type' => 'onoff',	'class' => 'wide'	),
			//'show-copyright'			=> array( 'name' => 'Copyright','pro'=>'pro',						'type' => 'onoff',	'class' => 'wide',
				//'sub-options' => array(
				
				//'copyright-text'			=> array( 'name' => 'Copyright Text',					'type' => 'textarea'						)
				
				//)
			//),

			'heading-images'			=> array( 'name' => 'Images' ),

			'timthumb'					=> array( 'name' => 'TimThumb Support','pro'=>'pro',				'type' => 'onoff',	'class' => 'wide'		),
			'thumb-small-w'				=> array( 'name' => 'Small Thumbnail Width (px)','pro'=>'pro',	'type' => 'xtext',	'class' => 'wide'		),
			'thumb-small-h'				=> array( 'name' => 'Small Thumbnail Height (px)','pro'=>'pro',	'type' => 'xtext',	'class' => 'wide'		),

			'heading-misc'				=> array( 'name' => 'Misc' ),

			'mcapi'						=> array( 'name' => 'MailChimp API Key','pro'=>'pro',			'type' => 'text',	'class' => 'wide'		),
			'mclist'					=> array( 'name' => 'MailChimp List ID','pro'=>'pro',			'type' => 'text',	'class' => 'wide'		),
			
			'heading-pagination'		=> array( 'name' => 'Social Media' ),

			'feedburnerid'				=> array( 'name' => 'FeedBurner',					'type' => 'text'		),
			'twitterid'					=> array( 'name' => 'Twitter',						'type' => 'text'		),
			'facebookid'				=> array( 'name' => 'Facebook',						'type' => 'text'		),
			'flickrid'					=> array( 'name' => 'Flickr',						'type' => 'text'		),
			'diggid'					=> array( 'name' => 'Digg',							'type' => 'text'		),
			'deliciousid'				=> array( 'name' => 'Delicious',					'type' => 'text'		),
			'youtubeid'					=> array( 'name' => 'Youtube',						'type' => 'text'		),
			'yahooid'					=> array( 'name' => 'Yahoo',						'type' => 'text'		),
			'stumbleuponid'				=> array( 'name' => 'StumbleUpon',					'type' => 'text'		),

		),

		'Skins, Colors &amp; Typography' => array(

			'heading-skins'				=> array( 'name' => 'Skins'																					),

			'style'						=> array( 'name' => 'Theme Skins','pro'=>'pro',		'type' => 'skins',		'class' => 'wide'				),

			'heading-colors'			=> array( 'name' => 'Colors'																				),

			//'color-bg'					=> array( 'name' => 'Background',					'type' => 'color',		'class' => 'wide'				),
			'color-text-shade'			=> array( 'name' => 'Text Shadow',					'type' => 'color',		'class' => 'wide'				),
			'color-link'				=> array( 'name' => 'Link',							'type' => 'color',		'class' => 'wide'				),
			'color-link-hover'			=> array( 'name' => 'Link Hover',					'type' => 'color',		'class' => 'wide'				),
			'color-h1-head'				=> array( 'name' => 'Head Title',					'type' => 'color',		'class' => 'wide'				),
			'color-h1-head-alt'			=> array( 'name' => 'Head Subtitle',				'type' => 'color',		'class' => 'wide'				),
			'color-h2-actions'			=> array( 'name' => 'Action Boxes Title',			'type' => 'color',		'class' => 'wide'				),
			'color-h3-side'				=> array( 'name' => 'Sidebar Widget Title',			'type' => 'color',		'class' => 'wide'				),

			'heading-typography'		=> array( 'name' => 'Typography &amp; Colors'																),

			'logo'						=> array( 'name' => 'Text Logo',					'type' => 'typography',	'class' => 'wide'				),
			'text'						=> array( 'name' => 'Text',							'type' => 'typography',	'class' => 'wide'				),
			'h1'						=> array( 'name' => 'H1',							'type' => 'typography',	'class' => 'wide'				),
			'h2'						=> array( 'name' => 'H2',							'type' => 'typography',	'class' => 'wide'				),
			'h3'						=> array( 'name' => 'H3',							'type' => 'typography',	'class' => 'wide'				),
			'h4'						=> array( 'name' => 'H4',							'type' => 'typography',	'class' => 'wide'				),
			'h5'						=> array( 'name' => 'H5',							'type' => 'typography',	'class' => 'wide'				),
			'h6'						=> array( 'name' => 'H6',							'type' => 'typography',	'class' => 'wide'				),
		),

		'SlideShow' => array(

			'heading-slider'					=> array( 'name' => 'SlideShow'																		),

			'slider-show'						=> array( 'name' => 'SlideShow',						'type' => 'onoff',		'class' => 'wide',

				'sub-options' => array(

					'slider-location'			=> array( 'name' => 'SlideShow Location',				'type' => 'multiselect','class' => 'wide',

						'options' => array(
											'Home' => 'home',
											'Blog' => 'blog',
											'Category' => 'category',
											'Archive' => 'archive',
											'Search' => 'search',
											'Post' => 'post',
											'Page' => 'page',
											'Template (Home)' => 'template-home',
											'Template (Blog)' => 'template-blog',
											'Template (One Column)' => 'template-onecolumn'
											)
					),

					'heading-slider-style'		=> array( 'name' => 'SlideShow Style'																),

					'slider-type-flash'			=> array( 'name' => 'Flash SlideShow',					'type' => 'onoff',		'class' => 'wide',

						'sub-options' => array(
						),

						'sub-options-off' => array(

							'slider-hover-pause'=> array( 'name' => 'Pause on Hover',					'type' => 'onoff',		'class' => 'wide'	),

							'slider-animation'	=> array( 'name' => 'Animation','pro'=>'pro',			'type' => 'select',		'class' => 'wide',

								'options' => array(
													'Fade' => 'fade',
													'Fade Zoom' => 'fadeZoom',
													'Scroll Down' => 'scrollDown',
													'Scroll Left' => 'scrollLeft',
													'Shuffle' => 'shuffle',
													'Toss' => 'toss',
													'Turn Left' => 'turnLeft',
													'Uncover' => 'uncover',
													'Wipe' => 'wipe',
													'Zoom' => 'zoom'
													)
							),

							'slider-speed'		=> array( 'name' => 'Animation Speed (seconds)',		'type' => 'xtext',		'class' => 'wide'	)
						)
					),

					'slider-timeout'			=> array( 'name' => 'Transition Time (seconds)',		'type' => 'xtext',		'class' => 'wide'	),

					'heading-slider-source'		=> array( 'name' => 'SlideShow Source'																),

					'slider-auto-pull'			=> array( 'name' => 'Auto Pull Slides',					'type' => 'onoff',

						'sub-options' => array(

							'slider-count'		=> array( 'name' => 'Number of Slides',					'type' => 'xtext',		'class' => 'wide'	),

							'slider-order'		=> array( 'name' => 'Order Slides By',					'type' => 'select',		'class' => 'wide',

								'options' => array(
													'Date' => 'date',
													'Random' => 'rand',
													'Popularity' => 'comment_count'
													)
							),

							'slider-pull-pages'	=> array( 'name' => 'Pull From Pages',					'type' => 'onoff',		'class' => 'wide',

								'sub-options' => array(

									'slider-pages'	=> array( 'name' => 'Select Pages','pro'=>'pro',					'type' => 'multi-pagelist',	'class' => 'wide'	)
								),

								'sub-options-off' => array(

									'slider-cats'	=> array( 'name' => 'Select a Category',			'type' => 'catlist',	'class' => 'wide'	)
								)
							)
						),

						'sub-options-off' => array(

							'slider-randomize'	=> array( 'name' => 'Randomize Slides Order',			'type' => 'onoff',		'class' => 'wide'	),

							'slider-images'		=> array( 'name' => 'Enter SlideShow Image URLs',		'type' => 'textarea',	'class' => 'wide'	)
						)
					)
				)
			)
		),

		'Blog Pages' => array(

			'heading-blog-pages'		=> array( 'name' => 'Blog Pages' ),

			'index-cats'				=> array( 'name' => 'Exclude a Category From Blog',	'pro'=>'pro',	'type' => 'catlist',	'class' => 'wide'	),
			'index-offset'				=> array( 'name' => 'Offset Blog Posts','pro'=>'pro',				'type' => 'xtext',		'class' => 'wide'	),
			'layout'					=> array( 'name' => 'Layout',										'type' => 'select',		'class' => 'wide',

				'options' => array(
									'Left' => 'left',
									'Right' => 'right',
									'Full Width' => 'wide'
				)
			),

			'heading-content'			=> array( 'name' => 'Content'																			),
			'show-posted-by'			=> array( 'name' => 'Author Stamp','pro'=>'pro',						'type' => 'onoff',		'class' => 'wide'		),
			'show-posted-in'			=> array( 'name' => 'Categories Stamp',					'type' => 'onoff',		'class' => 'wide'		),
			'show-posted-on'			=> array( 'name' => 'Date Stamp',						'type' => 'onoff',		'class' => 'wide'		),
			'show-tags'					=> array( 'name' => 'Tags Stamp',						'type' => 'onoff',		'class' => 'wide'		),

			'show-excerpt'				=> array( 'name' => 'Generate Excerpts','pro'=>'pro',				'type' => 'onoff',		'class' => 'wide',
			
				'sub-options' => array(

					'excerpt-length'	=> array( 'name' => 'Excerpt Words',			'type' => 'xtext',		'class' => 'wide'				)
				)
			),

			'thumb-medium-show'			=> array( 'name' => 'Generate Thumbnails','pro'=>'pro',	'type' => 'onoff',		'class' => 'wide',
			
				'sub-options' => array(

					'thumb-medium-location'	=> array( 'name' => 'Thumbnails Location',	'type' => 'multiselect','class' => 'wide',

						'options' => array(
											'Home' => 'home',
											'Blog' => 'blog',
											'Category' => 'category',
											'Archive' => 'archive',
											'Search' => 'search',
											'Template (Home)' => 'template-home',
											'Template (Blog)' => 'template-blog'
											)
					),
					'thumb-medium-w'		=> array( 'name' => 'Medium Thumbnail Width (px)','pro'=>'pro',	'type' => 'xtext',	'class' => 'wide'		),
					'thumb-medium-h'		=> array( 'name' => 'Medium Thumbnail Height (px)','pro'=>'pro','type' => 'xtext',	'class' => 'wide'		),
				)
			),

			'heading-toolbar'			=> array( 'name' => 'ToolBar'																			),
			'show-comment-link'			=> array( 'name' => 'Comment Link',						'type' => 'onoff',		'class' => 'wide'		),
			'show-share'				=> array( 'name' => 'Share Link',						'type' => 'onoff',		'class' => 'wide'		),
			'show-read-more'			=> array( 'name' => 'Read More Link','pro'=>'pro',					'type' => 'onoff',		'class' => 'wide'		),

			'heading-comments'			=> array( 'name' => 'Comments'																			),
			'show-comments'				=> array( 'name' => 'Display Comments','pro'=>'pro',					'type' => 'onoff',		'class' => 'wide'		),

			'heading-pagination'		=> array( 'name' => 'Pagination Links'																	),

			'pages-above-posts'			=> array( 'name' => 'Above Posts',						'type' => 'onoff',		'class' => 'wide'		),
			'pages-below-posts'			=> array( 'name' => 'Below Posts',						'type' => 'onoff',		'class' => 'wide'		),
			'pages-above-comms'			=> array( 'name' => 'Above Comments',					'type' => 'onoff',		'class' => 'wide'		),
			'pages-below-comms'			=> array( 'name' => 'Below Comments',					'type' => 'onoff',		'class' => 'wide'		),
		),

		'Front Page' => array(

			'heading-front-general'		=> array( 'name' => 'Front Page',						'desc' => 'Enable or disable custom front page layout elements'			),

			'front-on'					=> array( 'name' => 'Show Front Page',					'type' => 'onoff',		'class' => 'wide'	),
			
			'heading-action-boxes'		=> array( 'name' => 'Action Boxes'																	),

			'front-action1-text'		=> array( 'name' => 'Box 1 Content',					'type' => 'textarea',	'class' => 'wide'	),
			'front-action1-title'		=> array( 'name' => 'Box 1 Title',						'type' => 'ltext',		'class' => 'wide'	),
			'front-action2-text'		=> array( 'name' => 'Box 2 Content',					'type' => 'textarea',	'class' => 'wide'	),
			'front-action2-title'		=> array( 'name' => 'Box 2 Title',						'type' => 'ltext',		'class' => 'wide'	),
			'front-action3-text'		=> array( 'name' => 'Box 3 Content',					'type' => 'textarea',	'class' => 'wide'	),
			'front-action3-title'		=> array( 'name' => 'Box 3 Title',						'type' => 'ltext',		'class' => 'wide'	),

			'heading-front-summary'		=> array( 'name' => 'Front Page Summary'															),

			'summary-show'				=> array( 'name' => 'Summary',							'type' => 'onoff',		'class' => 'wide',

				'sub-options' => array(

					'summary-source-page'	=> array( 'name' => 'Pull Summary From a Page',		'type' => 'onoff',		'class' => 'wide',

						'sub-options' => array(

							'summary-page'	=> array( 'name' => 'Select a Page','pro'=>'pro',				'type' => 'pagelist',	'class' => 'wide'	)
						),

						'sub-options-off' => array(

							'summary-text'	=> array( 'name' => 'Summary Content',				'type' => 'textarea',	'class' => 'wide'	),
							'summary-title'	=> array( 'name' => 'Summary Title',				'type' => 'ltext',		'class' => 'wide'	)
						)
					)
				)
			),

			'heading-feature-boxes'		=> array( 'name' => 'Feature Boxes'																),

			'feature-boxes-show'		=> array( 'name' => 'Feature Boxes',					'type' => 'onoff',		'class' => 'wide',

				'sub-options' => array(

					'front-feature1-text'	=> array( 'name' => 'Feature 1 Content',			'type' => 'textarea',	'class' => 'wide'	),
					'front-feature1-title'	=> array( 'name' => 'Feature 1 Title',				'type' => 'ltext',		'class' => 'wide'	),
					'front-feature1-image'	=> array( 'name' => 'Feature 1 Image',				'type' => 'file',		'ext' => '*.jpg;*.png;*.gif'	),
					'front-feature1-link'	=> array( 'name' => 'Feature 1 Link',				'type' => 'ltext',		'class' => 'wide'	),

					'front-feature2-text'	=> array( 'name' => 'Feature 2 Content',			'type' => 'textarea',	'class' => 'wide'	),
					'front-feature2-title'	=> array( 'name' => 'Feature 2 Title',				'type' => 'ltext',		'class' => 'wide'	),
					'front-feature2-image'	=> array( 'name' => 'Feature 2 Image',				'type' => 'file',		'ext' => '*.jpg;*.png;*.gif'	),
					'front-feature2-link'	=> array( 'name' => 'Feature 2 Link',				'type' => 'ltext',		'class' => 'wide'	),

					'front-feature3-text'	=> array( 'name' => 'Feature 3 Content',			'type' => 'textarea',	'class' => 'wide'	),
					'front-feature3-title'	=> array( 'name' => 'Feature 3 Title',				'type' => 'ltext',		'class' => 'wide'	),
					'front-feature3-image'	=> array( 'name' => 'Feature 3 Image',				'type' => 'file',		'ext' => '*.jpg;*.png;*.gif'	),
					'front-feature3-link'	=> array( 'name' => 'Feature 3 Link',				'type' => 'ltext',		'class' => 'wide'	),

					'front-feature4-text'	=> array( 'name' => 'Feature 4 Content',			'type' => 'textarea',	'class' => 'wide'	),
					'front-feature4-title'	=> array( 'name' => 'Feature 4 Title',				'type' => 'ltext',		'class' => 'wide'	),
					'front-feature4-image'	=> array( 'name' => 'Feature 4 Image',				'type' => 'file',		'ext' => '*.jpg;*.png;*.gif'	),
					'front-feature4-link'	=> array( 'name' => 'Feature 4 Link',				'type' => 'ltext',		'class' => 'wide'	)
				)
			),

			'heading-front-blog'		=> array( 'name' => 'Blog Posts'																	),

			'front-blog-show'			=> array( 'name' => 'Blog Posts','pro'=>'pro',						'type' => 'onoff',		'class' => 'wide'	)
		),

		'Contact Page' => array(

			'heading-contact'			=> array( 'name' => 'Contact Form'																	),
			'contact-form-title'		=> array( 'name' => 'Contact Form Title','pro'=>'pro',				'type' => 'ltext',		'class' => 'wide'	),
			'contact-form-text'			=> array( 'name' => 'Contact Form Text','pro'=>'pro',				'type' => 'textarea',	'class' => 'wide'	),
			'contact-form-email'		=> array( 'name' => 'Contact Form Email','pro'=>'pro',				'type' => 'ltext',		'class' => 'wide'	),
		),
	),
	//'Settings' => array(

	//),
	'Ad Manager' => array(
		'Global' => array(

			'heading-adbox-posts'		=> array( 'name' => 'Add Block Between Posts',		'desc' => 'Paste your banner / text ad block in this box. It will be displayed between posts at your chosen position.' ),

			'adbox-posts'				=> array( 'name' => 'Banner / Text Ad Code',		'type' => 'textarea'	),
			'adbox-posts-position'		=> array( 'name' => 'Show After Post Number',		'type' => 'xtext'		),
			'adbox-posts-align'			=> array( 'name' => 'Alignment',					'options' => array( 'Left' => 'left', 'Center' => 'center', 'Right' => 'right' )),

			'heading-adbox-side'		=> array( 'name' => 'Sidebar Add Block',			'desc' => 'Paste your banner / text ad block in this box. It will be displayed at the top or bottom of the sidebar.' ),

			'adbox-side'				=> array( 'name' => 'Banner / Text Ad Code',		'type' => 'textarea'	),
			'adbox-side-position'		=> array( 'name' => 'Sidebar Ad Position',			'options' => array( 'Top' => 'top', 'Bottom' => 'bottom' )),
		),
		'Integration' => array(

			'heading-pagination'		=> array( 'name' => 'Integration',					'desc' => 'Paste your Google Analytics or other tracking code in this box. It will be automatically added to the footer.' ),

			'hook-footer'				=> array( 'name' => 'Footer Hook',					'type' => 'textarea'	),
		),
	),
));

?>
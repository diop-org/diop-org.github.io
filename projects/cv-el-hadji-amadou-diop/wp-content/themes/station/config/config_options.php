<?php

function get_option_array(){
	
	$default_options = array(
	
		'header_and_nav' => array(
			
				'custom_header' => array(
					'default' => THEME_IMAGES.'/stationpro-logo.png',
					'version_set_default' => 'pro',
					'type' => 'image_url',
					'imagepreview' => '200',
					'title' => 'Custom Header Image',						
					'shortexp' => 'Input Full URL to your custom header or logo image.',
					'exp' => 'Optional way to replace "heading" and "description" text for your website ' . 
							 'with an image.'
					),
				'enable_drop_down' => array(
						'version' => 'pro',
						'default' => false,
						'type' => 'check',
						'inputlabel' => 'Enable Drop Down Navigation?',
						'title' => 'Drop Down Navigation',						
						'shortexp' => 'Enable universal drop down navigation',
						'exp' => 'Checking this option will create drop down menus for all child pages when ' . 
								 'users hover over main navigation items.'
				 	),
				'hide_sub_header' => array(
						'version' => 'pro',
						'default' => false,
						'type' => 'check',
						'inputlabel' => 'Hide Sub Header?',
						'title' => 'Hide Static Sub Header (Subnav)',						
						'shortexp' => 'Removes the sub header that includes the subnav.',
						'exp' => 'This option can remove redundancy in navigation when using drop downs. Be ' . 
								 'careful as this option might inadvertantly make your site harder and less ' . 
								 'intuitive to navigate.'
					),
				'subnav_categories' => array(
						'default' => '',
						'type' => 'text',
						'inputlabel' => 'Category Subnav Items (Comma Seperated)',
						'title' => 'Index (Posts Page) Categories List',						
						'shortexp' => 'Enter Category IDs to show specific categories in the subnav area on the ' .
									  'posts page.',
						'exp' => 'This option will show category links on the posts page and categories pages. ' . 
								 'Enter category IDs seperated by commas.<br/><br/>For example, <strong>12, 8, 21</strong> ' .
								 'for categories with those IDs in WordPress.'
					),
				'hidesearch' => array(
						'version' => 'pro',
						'default' => false,
						'type' => 'check',
						'inputlabel' => 'Hide search on top of theme?',
						'title' => 'Hide Search',						
						'shortexp' => 'Remove the search field from the top of theme (in sub header and top of sidebar)',
						'exp' => 'Removes the search field from the sub nav and sidebar.'
				),
				
				'rsslink' => array(
						'default' => true,
						'type' => 'check',
						'inputlabel' => 'Display the Blog RSS icon and link?',
						'title' => 'News/Blog RSS Icon',
						'shortexp' => 'Places News/Blog RSS icon in your header',
						'exp' => ''
					),
				'facebooklink' => array(
						'version' => 'pro',
						'default' => '',
						'type' => 'text',
						'inputlabel' => 'Your Facebook Profile URL',
						'title' => 'Facebook Profile Link',
						'shortexp' => 'Places Facebook icon in your header',
						'exp' => ''
					),
				'twitterlink' => array(
						'version' => 'pro',
						'default' => '',
						'type' => 'text',
						'inputlabel' => 'Your Twitter Profile URL',
						'title' => 'Twitter Profile Link',
						'shortexp' => 'Places Twitter icon in your header',
						'exp' => 'This is the full URL not just the username.'
					),
				'linkedinlink' => array(
						'version' => 'pro',
						'default' => '',
						'type' => 'text',
						'inputlabel' => 'Your LinkedIn Profile URL',
						'title' => 'LinkedIn Profile Link',
						'shortexp' => 'Places LinkedIn icon in your header',
						'exp' => ''
					),
				'youtubelink' => array(
						'version' => 'pro',
						'default' => '',
						'type' => 'text',
						'inputlabel' => 'Your YouTube Profile URL',
						'title' => 'YouTube Profile Link',
						'shortexp' => 'Places YouTube icon in your header',
						'exp' => ''
					),
				'myspacelink' => array(
						'version' => 'pro',
						'default' => '',
						'type' => 'text',
						'inputlabel' => 'Your MySpace Profile URL',
						'title' => 'MySpace Profile Link',
						'shortexp' => 'Places MySpace icon in your header',
						'exp' => ''
					)
			),
		'pages_and_posts' => array(
				'pagetitles' => array(
						'default' => false,
						'type' => 'check',
						'inputlabel' => 'Show WP titles on pages?',
						'title' => 'WP Page Titles',						
						'shortexp' => 'Show default WordPress titles on pages.',
						'exp' => 'This option adds the default titles that you set for pages in the admin.'
					),
				'authorinfo' => array(
						'version' => 'pro',
						'default' => '',
						'type' => 'check',
						'inputlabel' => 'Show author info in posts?',
						'title' => 'Author Info',						
						'shortexp' => 'Show author information on the bottom of posts.',
						'exp' => 'This option adds a small "about the author" box on the bottom of posts.'
				),
				'pl_postthumbs' => array(
						'version' => 'pro',
						'default' => 'all',
						'type' => 'radio',
						'selectvalues' => array(
							'blog' => 	'Only on blog pages and search',
							'single'=>	'Only on single post pages',
							'all' => 	'All blog/post pages',
							'hide' => 	'Don\'t show',
						),
						'title' => 'Post Thumbnail Placement',
						'shortexp' => 'Where should the theme use post thumbnails?',
						'exp' => 'You can choose between on the blog or articles page, on single posts, or both.'
				),
				'pl_postexcerpts' => array(
						'version' => 'pro',
						'default' => 'blog',
						'type' => 'radio',
						'selectvalues' => array(
							'blog' => 	'Only on blog pages and search',
							'single'=>	'Only on single post pages',
							'all' => 	'All blog/post pages',
							'hide' => 	'Don\'t show',
						),
						'title' => 'Post Excerpt Placement',
						'shortexp' => 'Where should the theme use post excerpts?',
						'exp' => 'This option helps you control where post excerpts are displayed.<br/><br/> <strong>About:</strong> Excerpts are small summaries of articles filled out when creating a post.'
				),
				'pl_postcontent' => array(
						'version' => 'pro',
						'default' => 'single',
						'type' => 'radio',
						'selectvalues' => array(
							'single' => 'Show full content on single pages only',
							'all'=>'Show full content on all blog pages',
						),
						'title' => 'Full Post Content Placement',
						'shortexp' => 'Where should the theme place the full content of posts?',
						'exp' => 'Choose where the full content of posts is displayed. Choose between all posts pages or just single post pages (i.e. posts pages can just show excerpts or titles).'
				),
				'featureblog' => array(
						'version' => 'pro',
						'default' => false,
						'type' => 'check',
						'inputlabel' => 'Show feature template on posts page?',
						'title' => 'Features On Blog/Posts Page',
						'shortexp' => 'Show the features template on your blog or posts page.',
						'exp' => 'Select this option to show features on your main posts or blog page.'
				),
				'post_footer_link' => array(
						'version' => 'pro',
						'default' => 'leave_response',
						'type' => 'select',
						'selectvalues' => array(
							'post_link'=>'Point Link To Post "Single" Page',
							'leave_response' => 'Point Link To Post Responses',
							'hide' => 'Hide Link On Posts Pages',
							'always_social' => 'Show Sharing Or "Meme" Links Instead'
						),
						'inputlabel' => 'Select Post Footer Link Location',
						'title' => 'Post Footer Link On Posts Page',						
						'shortexp' => 'Where should the post footer link point to?',
						'exp' => "This option allows you to choose where the post footer link points to."
					),
				'post_footer_text' => array(
						'default' => 'Leave A Response',
						'type' => 'text',
						'inputlabel' => 'Post Footer Link Text',
						'title' => 'Post Footer Link Text',						
						'shortexp' => 'The text for the post footer link',
						'exp' => "This sets the text for the link on the bottom of posts on pages where multiple posts are shown."
					),
				'metacolor' => array(
						'version' => 'pro',
						'default' => '',
						'type' => 'text_small',
						'inputlabel' => 'Hex Code:',
						'title' => 'Post Meta Bar Background Color',						
						'shortexp' => 'The background color of your post meta bar',
						'exp' => 'This option controls the background color of the bar with category, date, and ' . 
								 'author in posts.'
					
				),
				'metacolortext' => array(
						'version' => 'pro',
						'default' => '',
						'type' => 'text_small',
						'inputlabel' => 'Hex Code:',
						'title' => 'Post Meta Bar Text Color',						
						'shortexp' => 'The text color in your post meta bar',
						'exp' => 'This option controls the text color in the bar with category, date, and author in posts'
				),
				'metacolorlink' => array(
						'version' => 'pro',
						'default' => '',
						'type' => 'text_small',
						'inputlabel' => 'Hex Code:',
						'title' => 'Post Meta Bar Link Color',						
						'shortexp' => 'The link color in your post meta bar',
						'exp' => 'This option controls the link color in the bar with category, date, and author in posts'
				),
				'post_footer_social_text' => array(
						'default' => 'If you enjoyed this article, please consider sharing it!',
						'type' => 'text',
						'inputlabel' => 'Post Footer Social Links Text',
						'title' => 'Post Footer Social Links Text',						
						'shortexp' => 'The text next to your social icons',
						'exp' => "Set the text next to your social links shown on single post pages or on all " . 
								 "posts pages if the post footer link is set to 'always sharing links'."
				),
				'post_footer_share_links' => array(
						'default' => '',
						'type' => 'check_multi',
						'selectvalues'=> array(
							'share_facebook'=> array('inputlabel'=>'Facebook Sharing Icon', 'default'=> true),
							'share_twitter'=> array('inputlabel'=>'Twitter Sharing Icon', 'default'=> true),
							'share_delicious' => array('inputlabel'=>'Del.icio.us Sharing Icon', 'default'=> false),
							'share_mixx' => array('inputlabel'=>'Mixx Sharing Icon', 'default'=> false),
							'share_digg' => array('inputlabel'=>'Digg Sharing Icon', 'default'=> true),
							'share_stumbleupon' => array('inputlabel'=>'StumbleUpon Sharing Icon', 'default'=> false)
						),
						'inputlabel' => 'Select Which Share Links To Show',
						'title' => 'Post Footer Sharing Icons',						
						'shortexp' => 'Select Which To Show',
						'exp' => "Select which icons you would like to show in your post footer when sharing " . 
								 "links are shown."
			    )
			),
		
				'sidebar_options' => array(
					'sidebar_layout' => array(
						'version' => 'pro',
						'default' => 'right',
						'type' => 'radio',
						'selectvalues' => array(
							'right' => 'Right Sidebar',
							'left' => 'Left Sidebar',
						),
						'inputlabel' => 'Select Global Sidebar Position (optional)',
						'title' => 'Sidebar Position',
						'shortexp' => 'Select the default sidebar position',
						'exp' => 'Choose a left or right sidebar for your site'
					),
				'the_sidebar' => array(
						'version' => 'pro',
						'default' => 'default',
						'type' => 'radio',
						'selectvalues'=> array(
							'default'=> 'Main Sidebar',
							'secondary' => 'Secondary Sidebar',
							'short' => 'Short Sidebar'
						),
						'inputlabel' => 'Select Sidebar (optional)',
						'title' => 'Default Sidebar',
						'shortexp' => 'Select the default and posts page sidebar mode',
						'exp' => 'Each sidebar has its own visual style. See the theme demo for examples of each.'
					),
				'greeting' => array(
						'default' => "Hi! Welcome to ".SITENAME."!",
						'type' => 'text',
						'inputlabel' => 'Greeting Text',
						'title' => 'Welcome Heading',
						'shortexp' => 'Your main greeting heading in the sidebar',
						'exp' => 'The greeting title text on your site. Format with HTML (e.g. paragraph tags, ' . 
								 'line breaks, img tags etc..)'
				),
				'welcomemessage' => array(
						'default' => "Thanks for dropping by! Feel free to join the discussion by leaving " . 
									 "comments, and stay updated by subscribing to the <a href='".RSSURL."'>RSS feed</a>.",
						'layout' => 'full',
						'type' => 'textarea',
						'inputlabel' => 'Your Welcome Message',
						'title' => 'Welcome Message',
						'shortexp' => 'Insert your welcome message',
						'exp' => 'The welcome text (underneath your greeting) on your site. Format with HTML (e.g. ' . 
								 'paragraph tags, line breaks, img tags etc..)'
				),
				'sidebar_no_default' => array(
						'version' => 'pro',
						'default' => '',
						'type' => 'check',
						'inputlabel' => 'Hide Sidebars When Empty (no widgets)',
						'title' => 'Remove Default Sidebars When Empty',
						'shortexp' => 'Hide default sidebars when sidebars have no widgets in them',
						'exp' => 'This allows you to remove sidebars completely when they have no widgets in them.'
				)
				
			),
		'footer_options' => array(
				'bottom_sidebars' => array(
						'version' => 'pro',
						'default' => true,
						'type' => 'check',
						'inputlabel' => 'Show widgetized columns above footer?',
						'title' => 'Show sidebars above footer ("morefoot area")',
						'shortexp' => 'Show the three widgetized sidebars above your footer',
						'exp' => 'This enables three widgetized sidebars above your footer that can be ' .
								 'customized in the appearance > widgets panel in the admin'
				),
				'footer_logo' => array(
						'version' => 'pro',
						'default' => THEME_IMAGES.'/logo-station-small.png',
						'type' => 'image_url',
						'imagepreview' => '80',
						'inputlabel' => 'Footer logo Image Url',
						'title' => 'Footer Logo',
						'shortexp' => 'Show a logo in the footer',
						'exp' => 'Add the full url of an image for use in the footer. Recommended size: 140px by 140px.'
				),
				'twitfooter' => array(
						'version' => 'pro',
						'default' => true,
						'type' => 'check',
						'inputlabel' => 'Show twitter entry above footer',
						'title' => 'Twitter Entry in Footer',
						'shortexp' => 'Show a Twitter entry above your footer',
						'exp' => 'Shows the latest tweet above your footer.<br/><br/> <strong>Note:</strong> Your twitter account must be added underneath global options.'
				),
				'terms' => array(
						'default' => '&copy; '.date('Y').' '.SITENAME,
						'type' => 'textarea',
						'inputlabel' => 'Terms line in footer:',
						'title' => 'Site Terms Statement',
						'shortexp' => 'A line in your footer for "terms and conditions text" or similar',
						'exp' => "It's sometimes a good idea to give your users a terms and conditions " .
								 "statement so they know how they should use your service or content."
				)
			),
		'text_options' => array(
				'fontreplacement' => array(
						'version' => 'pro',
						'default' => true,
						'type' => 'check',
						'inputlabel' => 'Use Cufon font replacement?',
						'title' => 'Use Cufon Font Replacement',
						'shortexp' => 'Use a special font replacement technique for certain text',
						'exp' => 'Cufon is a special technique for allowing you to use fonts outside of the 10 or so "web-safe" fonts. <br/><br/>' .
								 'This theme is equipped to use it.  Select this option to enable it. Visit the <a href="http://cufon.shoqolate.com/generate/">Cufon site</a>.'
				),
				'font_file' => array(
						'version' => 'pro',
						'default' => THEME_JS.'/sansation.font.js',
						'type' => 'text',
						'inputlabel' => 'Cufon replacement font file URL',
						'title' => 'Replacement Font File URL',
						'shortexp' => 'The font file used to replace text.',
						'exp' => 'Use the <a href="http://cufon.shoqolate.com/generate/">Cufon site</a> to generate a font file for use with this theme.  Place it in your theme folder and add the full URL to it here. The default font is Goudy.'
				),
				'replace_font' => array(
						'version' => 'pro',
						'default' => '.site-title a, .fcontent .fsub, .fcontent .ftitle, .fboxtitle h3, #morefoot h3, h3.greeting, .pagetitle',
						'type' => 'text',
						'layout' => 'full',
						'inputlabel' => 'Additional elements for font replacement',
						'title' => 'Additional CSS elements for font replacement',
						'shortexp' => 'Add selectors of elements you would like replaced (comma separated).',
						'exp' => 'Use standard CSS selectors (separated by commas) to replace them with your Cufon font.<br/> Note: Font replacement must be enabled.'
				),
				'headercolor' => array(
						'default' => '',
						'type' => 'text_small',
						'inputlabel' => 'Hex Code',
						'title' => 'Text Header Color (H1,H2, etc...)',
						'shortexp' => 'Change the color of your titles and subtitles',
						'exp' => 'Use "hex" colors. For example #000000 for black, #3399CC for light blue, ' . 
								 'etc... Visit <a href="http://html-color-codes.com/">this site</a> for a reference.'
				),
				'linkcolor' => array(
						'default' => '',
						'type' => 'text_small',
						'inputlabel' => 'Hex Code:',
						'title' => 'Text Link Color',						
						'shortexp' => 'Change the default color of your links as well as other similar elements.',
						'exp' => 'Same as above'
				),
				'linkcolor_hover' => array(
						'default' => '',
						'type' => 'text_small',
						'inputlabel' => 'Hex Code:',
						'title' => 'Text Link Hover Color',						
						'shortexp' => 'Change the default color of your links when users hover over them.',
						'exp' => 'Same as above'
				)
			),
		'global_options' => array(
				'colorscheme' => array(
						'version' => 'pro',
						'default' => 'bggrey',
						'type' => 'radio',
						'selectvalues' => array(
							'bgred'=>'Red',
							'bgorange' => 'Orange',
							'bggreen' => 'Green',
							'bgpink' => 'Pink',
							'bgyellow' => 'Yellow',
							'nobg' => 'None (Black)',
							'bggrey' => 'Grey (Default)',
							'bgblue' => 'Blue'
						),
						'title' => 'Default Theme Color Scheme',
						'shortexp' => 'Choose the default color scheme for the theme',
						'exp' => 'This will also always be the color of the blog/posts page. You can change color scheme for individual pages in page options.'
				),
				'favicon' => array(
					'default' => CORE_IMAGES."/favicon-pagelines.ico",
					'type' => 'image_url',
					'imagepreview' => '16',
					'title' => 'Favicon Image',						
					'shortexp' => 'Input Full URL to favicon image ("favicon.ico" image file)',
					'exp' => 'Enter the full URL location of your custom "favicon" which is visible in ' .
							 'browser favorites and tabs (typically called favicon.ico ).'
				),
				'twittername' => array(
						'default' => '',
						'type' => 'text',
						'inputlabel' => 'Your Twitter Username',
						'title' => 'Twitter Feed',
						'shortexp' => 'Places your Twitter feed in your site',
						'exp' => 'This places your Twitter feed on the site. Leave blank if you want to hide or not use.'
				),
				'no_wp_format' => array(
						'version' => 'pro',
						'default' => false,
						'type' => 'check',
						'inputlabel' => 'Remove default WP formatting?',
						'title' => 'WordPress Auto-Formatting',
						'shortexp' => 'Prevent WordPress from adding "br" and "p" tags in content',
						'exp' => 'By default WordPress will attempt to add "br" and "p" tags in your content. If you feel more comfortable adding these elements in yourself, you can select this option.'
				),
				'google_ie' => array(
						'default' => false,
						'type' => 'check',
						'inputlabel' => 'Include Google IE Compatibility Script?',
						'title' => 'Google IE Compatibility Fix',
						'shortexp' => 'Include a Google JS script that fixes problems with IE.',
						'exp' => 'More info on this can be found <a href="http://code.google.com/p/ie7-js/">here</a>.'
				),				
				'touchicon' => array(
					'version' => 'pro',
					'default' => '',
					'type' => 'image_url',
					'imagepreview' => '57',
					'title' => 'Apple Touch Image',						
					'shortexp' => 'Input Full URL to Apple touch image (.jpg, .gif, .png)',
					'exp' => 'Enter the full URL location of your Apple Touch Icon which is visible when ' .
							 'your users set your site as a <strong>webclip</strong> in Apple Iphone and ' . 
							 'Touch Products. It is an image approximately 57px by 57px in either .jpg, ' .
							 '.gif or .png format.'
				)
			),
		'custom_code' => array(
				'partner_link' => array(
						'default' => '',
						'type' => 'text',
						'inputlabel' => 'Enter Partner Link',
						'title' => 'PageLines Partner Link',
						'shortexp' => 'Change your PageLines footer link to a partner link',
						'exp' => 'If you are a <a href="http://www.pagelines.com/partners">PageLines Partner</a> enter your custom link here and the footer link will become a partner or affiliate link. (Do not include HTML)'
					),
				'customcss' => array(
						'version' => 'pro',
						'default' => 'body{}',
						'type' => 'textarea',
						'layout' => 'full',
						'inputlabel' => 'CSS Rules',
						'title' => 'Custom CSS',
						'shortexp' => 'Insert custom CSS styling here (this will override any default styling)',
						'exp' => '<div class="theexample">Example:<br/> <strong>body{<br/> &nbsp;&nbsp;color:  #3399CC;<br/>&nbsp;&nbsp;line-height: 20px;<br/>&nbsp;&nbsp;font-size: 11px<br/>}</strong></div>Enter CSS Rules to change the style of your site.<br/><br/> A lot can be accomplished by simply changing the default styles of the "body" tag such as "line-height", "font-size", or "color" (as in text color).'
					),
				'headerscripts' => array(
						'version' => 'pro',
						'default' => '',
						'type' => 'textarea',
						'layout' => 'full',
						'inputlabel' => 'Headerscripts Code',
						'title' => 'Header Scripts',
						'shortexp' => 'Scripts inserted directly before the end of the HTML &lt;head&gt; tag',
						'exp' => ''
					),
				'footerscripts' => array(
						'default' => '',						
						'type' => 'textarea',
						'layout' => 'full',
						'inputlabel' => 'Footerscripts Code or Analytics',
						'title' => 'Footer Scripts &amp; Analytics',
						'shortexp' => 'Any footer scripts including Google Analytics',
						'exp' => ""
					),
				'asynch_analytics' => array(
						'version' => 'pro',
						'default' => '',						
						'type' => 'textarea',
						'layout' => 'full',
						'inputlabel' => 'Asynchronous Analytics',
						'title' => 'Asynchronous Analytics',
						'shortexp' => 'Placeholder for Google asynchronous analytics. Goes underneath "body" tag.',
						'exp' => ""
					),
				'hide_introduction' => array(
						'version' => 'pro',
						'default' => '',
						'type' => 'check',
						'inputlabel' => '',
						'wp_option' => true,
						'inputlabel' => 'Hide the introduction?',
						'title' => 'Show Theme Introduction',
						'shortexp' => 'Uncheck this option to show theme introduction.',
						'exp' => ""
					)
			)
	
		
	);
	
	if(!get_option('hide_introduction') && VPRO){
		$welcome = array(
		
				'welcome' => array(
						'theme_introduction' => array(
								'default' => '',
								'type' => 'text_content',
								'inputlabel' => '',

								'layout' => 'full',
								'title' => 'Thanks for buying '.THEMENAME."!",
								'shortexp' => 'We mean it, <strong>thanks a ton for supporting us</strong>.',
								'exp' => '<p><img style="width: 200px; padding: 5px;background: #eee" class="alignright border" src="'.THEME_ROOT.'/screenshot.png" /><strong style="">Getting Started With Your New Pro Theme</strong></p>'.
								'<p>PageLines has created tons of features and options for you to take advantage of. Here are a few tips to get you started...<br/><small>(Note: This theme intro can be removed below.)</small></p><ul>'.
								'<li><strong>Support</strong> <p>For help getting started, we offer our pro customers tons of support including <a href="http://www.pagelines.com/docs" target="_blank">docs</a>, <a href="http://www.pagelines.com/blog" target="_blank">videos</a>, and the <a href="http://www.pagelines.com/forum" target="_blank">forum</a>.<br/> You can also visit our <a href="http://www.pagelines.com/support/">support page</a> for more info.</p></li> ' .
										'<li><strong>Theme Options and Feature Setup</strong> <p>This panel (theme options) is where you will start the customization of your theme. Also check out "feature setup" panel where you can set up everything in your feature-page templates.</p></li>' .
										'<li><strong>Page Templates</strong> <p>PageLines has created several page templates for you to choose from when creating new pages. This is how you will add elements like the feature pages, and carousel. When you create new pages, you will find these on the right hand sidebar.</p> <p>Find more information about PageLines page templates in the <a href="http://www.pagelines.com/docs">docs</a>. </p></li>' .
										'<li><strong>Page/Post Options</strong> <p>There are several more options that you will find on the bottom of the page when creating new WP pages and posts. These allow you to set options specifically related to that page or post.  <br/><small>Note: create and save the page or post before setting these options.</small></p></li>' .
										'<li><strong>Plugins</strong> <p>Although our themes are universally plugin compatible, we have added "advanced" graphical/functional support for several WordPress plugins.</p><p> It\'s your responsibility to install and activate each plugin, which can be done through "<strong>plugins</strong>" &gt; "<strong>Add New</strong>" or through the <strong>developers site</strong> (e.g. CForms).</p><p>Pre-configured plugins:</p><ul>'.
										'<li><p><a href="http://www.deliciousdays.com/cforms-plugin/" target="_blank">CFormsII</a> - Advanced contact forms that can be used for creating mailing lists, etc..</p></li>'.
										'<li><p><a href="http://wordpress.org/extend/plugins/wp125/" target="_blank">WP125</a> - Used to show 125px by 125px ads or images in your sidebar.</p></li>'.
										'<li><p><a href="http://eightface.com/wordpress/flickrrss/" target="_blank">FlickrRSS</a> - Shows pictures from your Flickr Account in your sidebars or in the carousel page template.</p></li>'.
										'<li><p><a href="http://wordpress.org/extend/plugins/nextgen-gallery/" target="_blank">NextGen-Gallery</a> - Allows you to create image galleries with special effects.  Use this in the carousel template.</p></li>'.
										
										'<li><p><a href="http://wordpress.org/extend/plugins/wp-pagenavi/" target="_blank">Wp-PageNavi</a> - Creates "paginated" post navigation.. (i.e. the numbers on the bottom of the posts list that allow you to navigate between pages of posts).</p></li>'.
										'</ul></li>'.
										'<li><strong>Widgets and Dynamic Layout</strong> <p>To make it super easy to customize your layout, we have added tons of sidebars and widget areas.  You can find and set these up under "<strong>appearance</strong>" &gt; "<strong>widgets</strong>"</p> <p>Find more information about this themes widget areas in the <a href="http://www.pagelines.com/docs">docs</a>. </p></li>' .
										'</ul>' .
										'<br/><h3>That\'s it for now! Have fun and good luck.</h3>'
							),
						'hide_introduction' => array(
								'default' => '',
								'type' => 'check',
								'inputlabel' => '',
								'wp_option' => true,
								'inputlabel' => 'Hide the introduction',
								'title' => 'Remove This Theme Introduction',
								'shortexp' => 'Remove this introduction from the admin.',
								'exp' => "This introduction can be added back under the 'custom code' tab (once hidden)..."
							),
					)
			);
	}else{$welcome = array();}
	
	$customoptions = array();
	
	$optionarray = array_merge($welcome, $default_options, $customoptions);
	
	return $optionarray;
}

?>
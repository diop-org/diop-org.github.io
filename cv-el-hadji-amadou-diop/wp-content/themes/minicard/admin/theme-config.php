<?php

################################################################################
// Set up menus within the wordpress admin sections
################################################################################

function wp_minicard_menu() { 		
	// Add a new top-level menu:
	    add_menu_page(__('MiniCard','minicard'), __('MiniCard','minicard'), 6, basename(__FILE__) , 'wp_minicard_admin', get_bloginfo('template_url').'/admin/menu_icon.png');
	// Add submenus to the custom top-level menu:
		add_submenu_page(basename(__FILE__), __('MiniCard Options','minicard'),  __('Options','minicard') , 6, basename(__FILE__) , 'wp_minicard_admin');
		add_submenu_page(basename(__FILE__), __('Instructions','minicard') , __('Instructions','minicard') , 6, 'minicard_instructions', 'wp_minicard_instructions');;
}
add_action('admin_menu', 'wp_minicard_menu');

################################################################################
// Init our options
################################################################################

$message = '';
if (file_exists(TEMPLATEPATH.'/premium/feed.php')) {
	// Premium
	$message = __('The options below are used to configure the theme.','minicard');
	$minicardthemes = __('Default|Black|Grey|Pink|Blue-Anvil Blue|Helveticard','minicard');
	$minicardthemes_dir = '|/premium/themes/black|/premium/themes/grey|/premium/themes/pink|/premium/themes/bablue|/premium/themes/helveticard';
	$minicardthemes_feed = array(__('Main Feed (Premium Theme Only)','minicard'), array(
				array('show_footer_feeds', 'yes' , __('Show Feed?','minicard'),'','yesno'),
				array('home_feed_title', __('What I\'m Saying','minicard'), __('Feed title:','minicard'),'',''),
				array('home_feed_limit', '10', __('Max Items shown:','minicard'),'',''),
				array('home_feed', '', __('Feed URLs:','minicard'),__('Add RSS feed urls for the main feed (appears on all pages). Use the format: Source Name|Source URL|Feed URL. One per line.','minicard'),'textarea'),	
				array('twitter_username', '', __('Twitter Username:','minicard'),__('(optional) Enter your twitter username if you are showing a twitter feed and want to remove your name from the beginning of tweets.','minicard'),''),		
				)
			);
} else {
	// Basic
	$message = __('The options below are used to configure the theme.','minicard').' '.__('Upgrade to the premium version of MiniCard to help support the author, get more sub-themes, and enable the main feed functionality.','minicard');
	$minicardthemes = __('Default','minicard');
	$minicardthemes_dir = '';	
	$minicardthemes_feed = array(__('Main Feed (Premium Theme Only)','minicard'), array());
}

// Options = name, default, label, hint, rules
$minicard_options = (
	array( 
		array(__('MiniCard Theme','minicard'), array(			
			array('minicard_theme', '', __('Colour Scheme/Theme:','minicard'), '' ,'select_options', $minicardthemes,$minicardthemes_dir),
			array('minicard_theme_p', '', __('Background Pattern:','minicard'),__('Stripes created by http://www.stripegenerator.com/ &amp; tartans by http://www.tartanmaker.com/. Magic!','minicard'),'select_options',__('Burst|Diagonal Stripe|Horizontal Stripe|Vertical Stripe|Tartan','minicard'),'burst.jpg|d_stripe.png|h_stripe.png|v_stripe.png|tartan.png')
			)
		),
		array(__('General theme options','minicard'), array(			
			array('photo_url', '', __('Photo URL:','minicard'),__('Please enter the url of your photo to show in the header. 64x64px will be forced in the html.','minicard'),''),
			array('portfolio_cat_id', '', __('Portfolio Category ID:','minicard'),__('If you want to display your portfolio on the homepage, enter its category here. Portfolio items show the first image in the post gallery as the thumbnail by default. You can also use these custom fields: <code>link</code> - Link to portfolio item, <code>gallery_limit</code> - Limit images shown in the gallery lightbox, <code>thumbnail</code> - Override the thumbnail with one of your choosing.','minicard'),''),
			array('portfolio_items', '6', __('Portfolio items:','minicard'),__('Number of Portfolio items to show.','minicard'),''),
			array('copyright_notice', __('Copyright 2009 &copy;','minicard'), __('Copyright notice for footer.','minicard'),'',''),
			array('main_nav_ajax','yes',__('Use AJAX for main navigation:','minicard'),'','yesno'),
			array('exclude_ids', '', __('Exclude pages from main navigation:','minicard'),__('Please list the ids separated by commas. Not needed if using WordPress nav menus.','minicard'),''),
			array('enable_search', 'no', __('Enable search?','minicard'),__('Shows a search box on the nav bar.','minicard'),'yesno'),
			array('footer_include_ids', '', __('Include pages in footer navigation:','minicard'),__('Please list the ids separated by commas.','minicard'),''),
			array('full_post', 'no', __('Show full post in blog?','minicard'),__('Choose yes to show the full post in your blog (if it does not have an excerpt or the &lt;!--more--&gt; tag).','minicard'),'yesno'),
			)
		),
		array('hCard/vCard', array(	
			array('vcard_enable', 'yes', __('Show vCard download link:','minicard'),'','yesno'),		
			array('vcard_email', '', __('Email address:','minicard'),__('Optional. This address will be munged to make it harder for spammers to obtain it. Be aware - there could still be a risk of spam emails.','minicard'),''),
			array('vcard_org', '', __('Org:','minicard'),__('Optional','minicard'),''),
			array('vcard_street', '', __('Street address:','minicard'),__('Optional','minicard'),''),
			array('vcard_locality', '', __('Locality:','minicard'), __('Optional. e.g. city name','minicard'),''),
			array('vcard_region', '', __('Region:','minicard'),__('Optional. e.g. state','minicard'),''),
			array('vcard_postal_code', '', __('Postal Code:','minicard'), __('Optional.','minicard'),''),
			array('vcard_country', '', __('Country:','minicard'),__('Optional','minicard'),''),
			array('vcard_tel', '', __('Tel:','minicard'),__('Optional','minicard'),''),
			)
		),
		$minicardthemes_feed,
		array(__('Social Networks','minicard'), array(			
			array('social_aim', '', __('AIM:','minicard'),'',''),
			array('social_bebo', '', __('BEBO:','minicard'),'',''),
			array('social_blogger', '', __('Blogger:','minicard'),'',''),
			array('social_brightkite', '', __('Brightkite:','minicard'),'',''),
			array('social_delicious', '', __('Delicious:','minicard'),'',''),
			array('social_designfloat', '', __('Design Float:','minicard'),'',''),
			array('social_designmoo', '', __('Design Moo:','minicard'),'',''),
			array('social_deviantart', '', __('DeviantArt:','minicard'),'',''),
			array('social_digg', '', __('Digg:','minicard'),'',''),
			array('social_dopplr', '', __('Dopplr:','minicard'),'',''),
			array('social_ember', '', __('Ember:','minicard'),'',''),
			array('social_facebook', '', __('Facebook:','minicard'),'',''),
			array('social_flickr', '', __('Flickr:','minicard'),'',''),
			array('social_foursquare', '', __('Foursquare:','minicard'),'',''),
			array('social_friendfeed', '', __('FriendFeed:','minicard'),'',''),
			array('social_googlebuzz', '', __('GoogleBuzz:','minicard'),'',''),
			array('social_googletalk', '', __('GoogleTalk:','minicard'),'',''),
			array('social_gowalla', '', __('Gowalla:','minicard'),'',''),
			array('social_ilike', '', __('iLike:','minicard'),'',''),
			array('social_lastfm', '', __('LastFM:','minicard'),'',''),
			array('social_linkedin', '', __('LinkedIn:','minicard'),'',''),
			array('social_meetuporg', '', __('Meetup.org:','minicard'),'',''),
			array('social_mixx', '', __('Mixx:','minicard'),'',''),
			array('social_mobileme', '', __('MobileMe:','minicard'),'',''),
			array('social_myspace', '', __('MySpace:','minicard'),'',''),
			array('social_newsvine', '', __('NewsVine:','minicard'),'',''),
			array('social_picasa', '', __('Picasa:','minicard'),'',''),
			array('social_plurk', '', __('Plurk:','minicard'),'',''),
			array('social_posterous', '', __('Posterous:','minicard'),'',''),
			array('social_readernaut', '', __('Readernaut:','minicard'),'',''),
			array('social_reddit', '', __('Reddit:','minicard'),'',''),
			array('social_skype', '', __('Skype:','minicard'),'',''),			
			array('social_stumbleupon', '', __('Stumbleupon:','minicard'),'',''),
			array('social_tumblr', '', __('Tumblr:','minicard'),'',''),
			array('social_twitter', '', __('Twitter:','minicard'),'',''),
			array('social_viddler', '', __('Viddler:','minicard'),'',''),
			array('social_vimeo', '', __('Vimeo:','minicard'),'',''),
			array('social_virb', '', __('Virb:','minicard'),'',''),
			array('social_wordpress', '', __('WordPress:','minicard'),'',''),
			array('social_xing', '', __('Xing:','minicard'),'',''),
			array('social_yahoobuzz', '', __('Yahoo Buzz:','minicard'),'',''),
			array('social_yelp', '', __('Yelp:','minicard'),'',''),
			array('social_youtube', '', __('You Tube:','minicard'),'','')
			)
		),
		array('Custom Social Networks', array(	
			array('social_custom', '', __('Links:','minicard'),__('Add extra social networks. Use the format: <code>Link Text|URL|Icon URL</code>. One per line.','minicard'),'textarea')	
			)
		)
	)
);
	
foreach($minicard_options as $section) {
	foreach($section[1] as $option) {
		add_option($option[0], $option[1]);
	}
}

function wp_minicard_admin_css() {
	?>
	<style type="text/css">
		<!--
			#minicard_form h3 {
				background: #E3E3E3;
				padding: 12px;
				margin-bottom: 0 !important
			}
			#minicard_form .minicard_section {
				border: 1px solid #E3E3E3;
				padding: 0 6px
			}
			#minicard_form table {				
				margin-top: 0 !important;
				border-collapse: collapse;
				border-bottom: 2px solid #F9F9F9;
			}
			#minicard_form table td, #minicard_form table th {
				padding: 12px 6px;
				border-bottom: 1px solid #E3E3E3
			}
			#minicard_form .message {
				padding: 12px;
				border: 2px dashed #98BFE6;
				background: #EAF2FA;
				line-height: 23px;
				font-weight: bold;
			}
		-->
	</style>
	<?php
}
add_action('admin_head', 'wp_minicard_admin_css');
	
function wp_minicard_admin() {

	global $minicard_options;

	if ($_POST['save_minicard_options']) {
	
		foreach($minicard_options as $section) {
			foreach($section[1] as $option) {
				update_option($option[0], stripslashes($_POST[$option[0]]));
			}
		}

		/* Sucess */
		echo '<div id="message" class="updated fade"><p><strong>'.__('Theme Options Saved','minicard').'</strong></p></div>';
	}
	?>

	<div class="wrap">
		<h2><?php _e('Theme Options', 'minicard'); ?></h2>
		<form method="post" action="admin.php?page=theme-config.php" id="minicard_form">
			<p class="submit message" style="text-align:right"><span style="float:left;text-align:left;"><?php global $message; echo $message; ?></span> <input type="submit" value="<?php _e('Save Changes', 'minicard'); ?>" name="save_minicard_options" /></p>
			<?php	
			foreach($minicard_options as $section) {
				echo '<h3>'.$section[0].'</h3><div class="minicard_section"><table cellspacing="0" cellpadding="0" class="form-table">';
				
				if ($section[0]=='Social Networks') {
					echo '<div style="border-bottom:1px solid #E3E3E3; padding: 4px">';
					echo '<p>'.__('Enter the full URL <em>or</em>:','minicard').'</p>';
					echo '<ul style="margin-left:20px">';
					echo '<li>'.__('<strong>Different link text/html:</strong> Enter the text and the URL separated by a pipe e.g. <code>My Link Text|http://test.com</code></li>','minicard');
					echo '<li>'.__('<strong>Multiple links:</strong> Separate each link with a comma e.g. <code>http://test.com, My Link Text|http://test2.com</code></li>','minicard');					
					echo '</ul>';
					echo '</div>';
				}
				foreach($section[1] as $option) {
					echo '<tr valign="top">';
					
					echo '<th><label for="'.$option[0].'">'.$option[2].'</label></th><td>';
					
					if ($option[4]=='yesno') {
						$yes = '';
						$no = '';
						if (get_option($option[0])=='yes') $yes='selected="selected"'; else $no='selected="selected"';
						echo '<select name="'.$option[0].'">
							<option value="yes" '.$yes.'>'.__('Yes','minicard').'</option>
							<option value="no" '.$no.'>'.__('No','minicard').'</option>
						</select>';
					} elseif ($option[4]=='textarea') {
						echo '<textarea id="'.$option[0].'" name="'.$option[0].'" cols="50" rows="6">'.htmlspecialchars(get_option($option[0])).'</textarea>';
					} elseif ($option[4]=='select_options') {
						$selected = '';
						echo '<select name="'.$option[0].'">';
						
						$names = explode('|', $option[5]);
						$values = explode('|', $option[6]);
						$selected = get_option($option[0]);
						
						$loop = 0;
						
						if ($names) {
							foreach ($names as $name) {
	
								echo '<option value="'.$values[$loop].'" ';
								
								if ($selected==$values[$loop]) echo 'selected="selected"';
							
								echo '>'.$name.'</option>';
								
								$loop++;
							}
						}
						echo '</select>';
					} else {
						echo '<input type="text" id="'.$option[0].'" name="'.$option[0].'" size="50" value="'.htmlspecialchars(get_option($option[0])).'" />';
					}
					
					if ($option[3]) echo '<br/><span class="setting-description">'.$option[3].'</span>';
					
					echo '</td></tr>';
				}
				echo '</table></div><div class="clear"></div>';
			}
			?>
			<p class="submit" style="text-align:right"><input type="submit" value="<?php _e('Save Changes', 'minicard'); ?>" name="save_minicard_options" /></p>
		</form>
	</div>
	<script type="text/javascript">
	/* <![CDATA[ */
		jQuery.noConflict();
		(function($) { 
			$(function() {
				
				$('.minicard_section').hide();
				$('#minicard_form h3').css({
					'cursor':'pointer'
				}).hover(function() {
					$(this).css({	'background-color' : '#ddd'	});
				}, function() {
					$(this).css({	'background-color' : '#E3E3E3'	});
				});
				$('#minicard_form h3').click(function(){
					$(this).next('.minicard_section:eq(0)').slideToggle();
				});
				
			});
		})(jQuery);
	/* ]]> */
	</script>
	<?php
}




function wp_minicard_instructions() {
	
	?><div class="wrap">
		<h2><?php _e('Usage Instructions', 'minicard'); ?></h2>
		<p><?php _e('Congratulations on obtaining the MiniCard WordPress Theme. These instructions should hopefully allow you to get the most out of your theme.', 'minicard'); ?></p>
		
		<h3><?php _e('MiniCard Options', 'minicard'); ?></h3>
		<p><?php _e('The MiniCard Options page (available in WordPress admin) allows you to customise the theme\'s features. Most of the options are self explanatory, however some of the more advanced options are described below.', 'minicard'); ?></p>
		<ol>			
			<li><?php _e('<em>hCard/vCard</em> - These options let you set your contact details which can be saved by the user as a vCard. Details are shown on the page in hCard format which is a microformat - http://microformats.org/wiki/hcard.', 'minicard'); ?></li>			
			<li><?php _e('<em>Main Feed (Premium Theme Only):</em> - This allows you to show several feeds in the footer area all condensed into one. Feed URLS should be added one per line, in the format: <code>Source Name|Source URL|Feed URL</code>. E.g. <code>Blue Anvil|http://blue-anvil.com|http://feeds.feedburner.com/blueanvilblog</code>', 'minicard'); ?></li>			
		</ol>
		
		<h3><?php _e('Portfolio Usage', 'minicard'); ?></h3>
		<p><?php _e('MiniCard theme allows you to feature some work in the footer - to do this you need to set up a portfolio category, enter the category\'s ID on the MiniCard Options page, and then create some posts. Portfolio posts can contain the follow custom fields:', 'minicard'); ?></p>
		<ul>
			<li><?php _e('<em>link</em> If this is a website, or has a URL, enter the url here. When viewing the portfolio item the title will link here.', 'minicard'); ?></li>
			<li><?php _e('<em>thumbnail</em> - URL to thumbnail for the portfolio item - should be 206x150. If this is not set, the first attched image will be used instead.', 'minicard'); ?></li>
			<li><?php _e('<em>gallery_limit</em> - How many items to display in the item\'s gallery (if there are 3 images for example, and this is set to 2, the last image will be left out).', 'minicard'); ?></li>
		</ul>
		<p><?php _e('You can also use WordPress 2.9/3.0\'s post thumbnails to set the thumbnail image.', 'minicard'); ?></p>
	</div>
	<?php
	
}
?>
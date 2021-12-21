<?php
error_reporting(0);
//*************** Include style.css in Header ********

// Getting Option From DB *****************************	
$acx_si_theme = get_option('acx_si_theme');
$acx_si_credit = get_option('acx_si_credit');
$acx_si_display = get_option('acx_si_display');
$acx_si_twitter = get_option('acx_si_twitter');
$acx_si_facebook = get_option('acx_si_facebook');
$acx_si_youtube = get_option('acx_si_youtube');
$acx_si_linkedin = get_option('acx_si_linkedin');
$acx_si_gplus = get_option('acx_si_gplus');
$acx_si_pinterest = get_option('acx_si_pinterest');
$acx_si_feed = get_option('acx_si_feed');
$acx_si_icon_size = get_option('acx_si_icon_size');
// *****************************************************
function enqueue_acx_si_style()
{
	wp_enqueue_style ( 'acx-si-style', plugins_url('style.css', __FILE__) );
}	add_action( 'wp_print_styles', 'enqueue_acx_si_style' );

// Check Credit Link
function check_acx_credit($yes,$no)
{ 	$acx_si_credit = get_option('acx_si_credit');
	if($acx_si_credit != "no") { echo $yes; } else { echo $no; } 
}

// Options Value Checker
function acx_option_value_check($option_name,$yes,$no)
{ 	$acx_si_option_set = get_option($option_name);
	if ($acx_si_option_set != "") { echo $yes; } else { echo $no; }
}
function acurax_si_simple($theme)
{

	// Getting Globals *****************************	
	global $acx_si_theme, $acx_si_credit, $acx_si_display , $acx_si_twitter, $acx_si_facebook, $acx_si_youtube, 		
	$acx_si_linkedin, $acx_si_gplus, $acx_si_pinterest, $acx_si_feed, $acx_si_icon_size;
	// *****************************************************
	if ($theme == "") { $acx_si_touse_theme = $acx_si_theme; } else { $acx_si_touse_theme = $theme; }
		//******** MAKING EACH BUTTON LINKS ********************
		if	($acx_si_twitter == "") { $twitter_link = ""; } else 
		{
			$twitter_link = "<a href='http://www.twitter.com/". $acx_si_twitter ."' target='_blank'>" . "<img src=" . 
			plugins_url('images/themes/'. $acx_si_touse_theme .'/twitter.png', __FILE__) . " border='0'></a>";
		}
		if	($acx_si_facebook == "") { $facebook_link = ""; } else 
		{
			$facebook_link = "<a href='". $acx_si_facebook ."' target='_blank'>" . "<img src=" . plugins_url('images/themes/'
			. $acx_si_touse_theme .'/facebook.png', __FILE__) . " border='0'></a>";
		}
		if	($acx_si_gplus == "") { $gplus_link = ""; } else 
		{
			$gplus_link = "<a href='". $acx_si_gplus ."' target='_blank'>" . "<img src=" . plugins_url('images/themes/'. 
			$acx_si_touse_theme .'/googleplus.png', __FILE__) . " border='0'></a>";
		}
		if	($acx_si_pinterest == "") { $pinterest_link = ""; } else 
		{
			$pinterest_link = "<a href='". $acx_si_pinterest ."' target='_blank'>" . "<img src=" . plugins_url(
			'images/themes/'. $acx_si_touse_theme .'/pinterest.png', __FILE__) . " border='0'></a>";
		}
		if	($acx_si_youtube == "") { $youtube_link = ""; } else 
		{
			$youtube_link = "<a href='". $acx_si_youtube ."' target='_blank'>" . "<img src=" . plugins_url('images/themes/'. 
			$acx_si_touse_theme .'/youtube.png', __FILE__) . " border='0'></a>";
		}
		if	($acx_si_linkedin == "") { $linkedin_link = ""; } else 
		{
			$linkedin_link = "<a href='". $acx_si_linkedin ."' target='_blank'>" . "<img src=" . plugins_url('images/themes/'
			. $acx_si_touse_theme .'/linkedin.png', __FILE__) . " border='0'></a>";
		}
		if	($acx_si_feed == "") { $feed_link = ""; } else 
		{
			$feed_link = "<a href='". $acx_si_feed ."' target='_blank'>" . "<img src=" . plugins_url('images/themes/'
			. $acx_si_touse_theme .'/feed.png', __FILE__) . " border='0'></a>";
		}
		$social_icon_array_order = get_option('social_icon_array_order');
	$social_icon_array_order = unserialize($social_icon_array_order);
	foreach ($social_icon_array_order as $key => $value)
	{
		if ($value == 0) { echo $twitter_link; } 

		else if ($value == 1) { echo $facebook_link; } 

		else if ($value == 2) { echo $gplus_link; } 

		else if ($value == 3) { echo $pinterest_link; } 

		else if ($value == 4) { echo $youtube_link; } 

		else if ($value == 5) { echo $linkedin_link; } 
		
		else if ($value == 6) { echo $feed_link; }
	}
} //acurax_si_simple()

function acx_theme_check_wp_head() {
	$template_directory = get_template_directory();
	// If header.php exists in the current theme, scan for "wp_head"
	$file = $template_directory . '/header.php';
	if (is_file($file)) {
		$search_string = "wp_head";
		$file_lines = @file($file);
		
		foreach ($file_lines as $line) {
			$searchCount = substr_count($line, $search_string);
			if ($searchCount > 0) {
				return true;
			}
		}
		
		// wp_head() not found:
		echo "<div class=\"highlight\" style=\"width: 99%; margin-top: 10px; margin-bottom: 10px; border: 1px solid darkred;\">" . "Your theme needs to be fixed for plugins to work (Especially Floating Social Media Icon). To fix your theme, use the <a href=\"theme-editor.php\">Theme Editor</a> to insert <code>&lt;?php wp_head(); ?&gt;</code> just before the <code>&lt;/head&gt;</code> line of your theme's <code>header.php</code> file." . "</div>";
	}
} // theme check 
add_action('admin_notices', 'acx_theme_check_wp_head');


function acx_theme_check_wp_footer() {
	$template_directory = get_template_directory();
	
	// If footer.php exists in the current theme, scan for "wp_footer"
	$file = $template_directory . '/footer.php';
	if (is_file($file)) {
		$search_string = "wp_footer";
		$file_lines = @file($file);
		
		foreach ($file_lines as $line) {
			$searchCount = substr_count($line, $search_string);
			if ($searchCount > 0) {
				return true;
			}
		}
		
		// wp_footer() not found:
		echo "<div class=\"highlight\" style=\"width: 99%; margin-top: 10px; margin-bottom: 10px; border: 1px solid darkred;\">" . "Your theme needs to be fixed for plugins to work (Especially Floating Social Media Icon). To fix your theme, use the <a href=\"theme-editor.php\">Theme Editor</a> to insert <code>&lt;?php wp_footer(); ?&gt;</code> just before the <code>&lt;/body&gt;</code> line of your theme's <code>footer.php</code> file." . "</div>";
	}
} add_action('admin_notices', 'acx_theme_check_wp_footer');

function acurax_icons()
{
	global $acx_si_theme, $acx_si_credit, $acx_si_display , $acx_si_twitter, $acx_si_facebook, $acx_si_youtube, 		
	$acx_si_linkedin, $acx_si_gplus, $acx_si_pinterest, $acx_si_feed, $acx_si_icon_size;
			
	if($acx_si_twitter != "" || $acx_si_facebook != "" || $acx_si_youtube != "" || $acx_si_linkedin != ""  || 
	$acx_si_pinterest != "" || $acx_si_gplus != "" || $acx_si_feed != "")
	{
	//*********************** STARTED DISPLAYING THE ICONS ***********************
		echo "\n\n\n<!-- Starting Icon Display Code For Social Media Icon From Acurax International www.acurax.com -->\n";
		echo "<div id='divBottomRight' align='center'>";
		acurax_si_simple();		
		echo "</div>\n";
		echo "<!-- Ending Icon Display Code For Social Media Icon From Acurax International www.acurax.com -->\n\n\n";
	//*****************************************************************************
	} // Chking null fields
	
} // Ending acurax_icons();

// Setting X Y values for javascript
$x = -170;
$y = -60;
function acx_load_floating_js()
{ 
	global $x;
	global $y;

	//*************** STARTING PUMBING JAVASCIRPT *******************************
	echo "\n\n\n<!-- Starting Javascript For Social Media Icon From Acurax International www.acurax.com -->\n";	
	$acx_si_icon_size = get_option('acx_si_icon_size');
	////////////////////////////////////////////////////////////////////////////
	//STARTING CROSS CHECK			    $count,$icon_size,$set_value  
	function acx_si_check_loaded_count($count,$icon_size,$set_x_value,$set_y_value)
	{
		// Defining Values To Use
		$acx_si_icon_size = get_option('acx_si_icon_size'); // Getting Value From DB :)
		$acx_si_twitter = get_option('acx_si_twitter');
		$acx_si_facebook = get_option('acx_si_facebook');
		$acx_si_youtube = get_option('acx_si_youtube');
		$acx_si_linkedin = get_option('acx_si_linkedin');
		$acx_si_feed = get_option('acx_si_feed');
		$acx_si_gplus = get_option('acx_si_gplus');
		$acx_si_pinterest = get_option('acx_si_pinterest');
		$count_check = 0;
		$l1 = 0;
		$l2 = 0;
		$l3 = 0;
		$l4 = 0;
		$l5 = 0;
		$l6 = 0;
		$l7 = 0;
		if ($acx_si_twitter != "") { $l1 = 1; }
		if ($acx_si_facebook != "") { $l2 = 1; }
		if ($acx_si_youtube != "") { $l3 = 1; }
		if ($acx_si_linkedin != "") { $l4 = 1; }
		if ($acx_si_gplus != "") { $l5 = 1; }
		if ($acx_si_pinterest != "") { $l6 = 1; }
		if ($acx_si_feed != "") { $l7 = 1; }
		$count_check = $l1 + $l2 + $l3 + $l4 + $l5 + $l6 + $l7;
		if ($acx_si_icon_size == $icon_size && $count_check == $count)
		{
			global $x;
			global $y;
			$x = $set_x_value;
			$y = $set_y_value;
		}
	} // ENDING THE FUNCTION TO CROS CHECK

	/**************************************************************************
	CONDITIONS STARTING HERE  
	if X Decreases then move to Right
	If Y Decreases then Move to Down
	***************************************************************************/
	// Icon Size 16 Starts Here
	// acx_si_check_loaded_count($count,$icon_size,$set_x_value,$set_y_value);
	acx_si_check_loaded_count(1,16,-170,-35);
	acx_si_check_loaded_count(2,16,-170,-35);
	acx_si_check_loaded_count(3,16,-170,-35);
	acx_si_check_loaded_count(4,16,-170,-35);
	acx_si_check_loaded_count(5,16,-170,-35);
	acx_si_check_loaded_count(6,16,-170,-35);
	acx_si_check_loaded_count(7,16,-170,-35);
	// *********************************
	// Icon Size 25 Starts Here
	// acx_si_check_loaded_count($count,$icon_size,$set_x_value,$set_y_value);
	acx_si_check_loaded_count(1,25,-160,-50);
	acx_si_check_loaded_count(2,25,-160,-50);
	acx_si_check_loaded_count(3,25,-160,-50);
	acx_si_check_loaded_count(4,25,-160,-50);
	acx_si_check_loaded_count(5,25,-160,-50);
	acx_si_check_loaded_count(6,25,-180,-50);
	acx_si_check_loaded_count(7,25,-180,-50);
	// *********************************
	// Icon Size 32 Starts Here
	// acx_si_check_loaded_count($count,$icon_size,$set_x_value,$set_y_value);
	acx_si_check_loaded_count(1,32,-170,-55);
	acx_si_check_loaded_count(2,32,-170,-55);
	acx_si_check_loaded_count(3,32,-170,-55);
	acx_si_check_loaded_count(4,32,-170,-55);
	acx_si_check_loaded_count(5,32,-190,-70);
	acx_si_check_loaded_count(6,32,-160,-80);
	acx_si_check_loaded_count(7,32,-160,-80);
	// *********************************
	// Icon Size 40 Starts Here
	// acx_si_check_loaded_count($count,$icon_size,$set_x_value,$set_y_value);
	acx_si_check_loaded_count(1,40,-170,-65);
	acx_si_check_loaded_count(2,40,-170,-65);
	acx_si_check_loaded_count(3,40,-170,-65);
	acx_si_check_loaded_count(4,40,-170,-105);
	acx_si_check_loaded_count(5,40,-170,-105);
	acx_si_check_loaded_count(6,40,-170,-105);
	acx_si_check_loaded_count(7,40,-170,-145);
	// *********************************
	// Icon Size 48 Starts Here
	// acx_si_check_loaded_count($count,$icon_size,$set_x_value,$set_y_value);
	acx_si_check_loaded_count(1,48,-170,-75);
	acx_si_check_loaded_count(2,48,-170,-75);
	acx_si_check_loaded_count(3,48,-170,-75);
	acx_si_check_loaded_count(4,48,-170,-120);
	acx_si_check_loaded_count(5,48,-170,-120);
	acx_si_check_loaded_count(6,48,-170,-120);
	acx_si_check_loaded_count(7,48,-170,-175);
	// *********************************
	// Icon Size 55 Starts Here
	// acx_si_check_loaded_count($count,$icon_size,$set_x_value,$set_y_value);
	acx_si_check_loaded_count(1,55,-170,-80);
	acx_si_check_loaded_count(2,55,-170,-80);
	acx_si_check_loaded_count(3,55,-170,-135);
	acx_si_check_loaded_count(4,55,-170,-135);
	acx_si_check_loaded_count(5,55,-190,-135);
	acx_si_check_loaded_count(6,55,-190,-135);
	acx_si_check_loaded_count(7,55,-190,-200);
	// *********************************
	/**************************************************************************
	CONDITIONS ENDING HERE
	***************************************************************************/
	?>
	<script type="text/javascript">
	var ns = (navigator.appName.indexOf("Netscape") != -1);
	var d = document;
	var px = document.layers ? "" : "px";
	function JSFX_FloatDiv(id, sx, sy)
	{
		var el=d.getElementById?d.getElementById(id):d.all?d.all[id]:d.layers[id];
		window[id + "_obj"] = el;
		if(d.layers)el.style=el;
		el.cx = el.sx = sx;el.cy = el.sy = sy;
		el.sP=function(x,y){this.style.left=x+px;this.style.top=y+px;};
		el.flt=function()
		{
			var pX, pY;
			pX = (this.sx >= 0) ? 0 : ns ? innerWidth : 
			document.documentElement && document.documentElement.clientWidth ? 
			document.documentElement.clientWidth : document.body.clientWidth;
			pY = ns ? pageYOffset : document.documentElement && document.documentElement.scrollTop ? 
			document.documentElement.scrollTop : document.body.scrollTop;
			if(this.sy<0) 
			pY += ns ? innerHeight : document.documentElement && document.documentElement.clientHeight ? 
			document.documentElement.clientHeight : document.body.clientHeight;
			this.cx += (pX + this.sx - this.cx)/8;this.cy += (pY + this.sy - this.cy)/8;
			this.sP(this.cx, this.cy);
			setTimeout(this.id + "_obj.flt()", 40);
		}
		return el;
	}
	 JSFX_FloatDiv("divBottomRight", <?php echo $x; ?>, <?php echo $y; ?>).flt();
	</script>
	<?php echo "<!-- Ending Javascript Code For Social Media Icon From Acurax International www.acurax.com -->\n\n\n";
} 	if ($acx_si_display == "auto" || $acx_si_display == "both") 
	{
		add_action('wp_footer', 'acx_load_floating_js',101);
	}

// Starting Footer PBL
function pbl_footer() 
{
	global $acx_si_theme, $acx_si_credit, $acx_si_display , $acx_si_twitter, $acx_si_facebook, $acx_si_youtube, 		
	$acx_si_linkedin, $acx_si_gplus, $acx_si_pinterest, $acx_si_feed;

	//********** CHECKING CREDIT LINK STATUS ******************
	if($acx_si_twitter != "" || $acx_si_facebook != "" || $acx_si_youtube != "" || $acx_si_linkedin != ""  || $acx_si_pinterest != "" || $acx_si_gplus != "" || $acx_si_feed != "")
	{
		if($acx_si_credit == "yes") 
		{ 
			echo "<div style='text-align:center;color:gray;font-family:arial;font-size:11px;text-decoration:none;'>";
			$acx_get_url = "http://";
			$acx_get_url .= $_SERVER['HTTP_HOST'];
			$acx_get_url .= $_SERVER['REQUEST_URI'];
			$x = strlen($acx_get_url);
			if(($x % 10) == 0)
			{
			echo "<a href='http://www.acurax.com/products/floating-social-media-icon-plugin-wordpress/' target='_blank' 
			title='Social Media Wordpress plugin' 
			style='text-align:center;color:gray;font-family:arial;font-size:11px;text-decoration:none;'>Animated Social 
			Media Icons</a> Powered by <a href='http://www.acurax.com/services/blog-design.php?utm_source=blink&utm_medium=link&utm_campaign=footer' target='_blank' 
			title='Wordpress Development Company' 
			style='text-align:center;color:gray;font-family:arial;font-size:11px;text-decoration:none;'>Acurax Wordpress 
			Development Company</a>";
			} else if(($x % 9) == 0)
			{
			echo "<a href='http://www.acurax.com/products/floating-social-media-icon-plugin-wordpress/' target='_blank' 
			title='Floating Social Media Wordpress plugin' 
			style='text-align:center;color:gray;font-family:arial;font-size:11px;text-decoration:none;'>Floating Social 
			Media Icons</a> Powered by <a href='http://www.acurax.com/services/blog-design.php?utm_source=blink&utm_medium=link&utm_campaign=footer' target='_blank' title='Blog 
			Design Company' 
			style='text-align:center;color:gray;font-family:arial;font-size:11px;text-decoration:none;'>Acurax Blog 
			Designing Company</a>";
			} else if(($x % 8) == 0)
			{
			echo "<a href='http://www.acurax.com/products/floating-social-media-icon-plugin-wordpress/' target='_blank' 
			title='Social Media Plugin' 
			style='text-align:center;color:gray;font-family:arial;font-size:11px;text-decoration:none;'>Social Media 
			Integration</a> Powered by <a href='http://www.acurax.com/services/blog-design.php?utm_source=blink&utm_medium=link&utm_campaign=footer' target='_blank' title='Web 
			Design Company' 
			style='text-align:center;color:gray;font-family:arial;font-size:11px;text-decoration:none;'>Acurax Wordpress 
			Theme Designers</a>";
			} else if(($x % 7) == 0)
			{
			echo "<a href='http://www.acurax.com/products/floating-social-media-icon-plugin-wordpress/' target='_blank' 
			title='Social Media Wordpress plugin' 
			style='text-align:center;color:gray;font-family:arial;font-size:11px;text-decoration:none;'>Social Media 
			Icons</a> Powered by <a href='http://www.acurax.com/services/web-designing.php?utm_source=blink&utm_medium=link&utm_campaign=footer' target='_blank' title='Affordable 
			Website Designer' 
			style='text-align:center;color:gray;font-family:arial;font-size:11px;text-decoration:none;'>Acurax Website 
			Design Expert</a>";
			} else if(($x % 6) == 0)
			{
			echo "<a href='http://www.acurax.com/products/floating-social-media-icon-plugin-wordpress/' target='_blank' 
			title='SocialMedia Wordpress plugin' 
			style='text-align:center;color:gray;font-family:arial;font-size:11px;text-decoration:none;'>Social Media 
			Icons</a> Powered by <a href='http://www.acurax.com/services/web-development.php?utm_source=blink&utm_medium=link&utm_campaign=footer' target='_blank' title='Web 
			Development Company' 
			style='text-align:center;color:gray;font-family:arial;font-size:11px;text-decoration:none;'>Acurax Web 
			Development Company</a>";
			} else if(($x % 5) == 0)
			{
			echo "<a href='http://www.acurax.com/products/floating-social-media-icon-plugin-wordpress/' target='_blank' 
			title='Social Media Wordpress plugin' 
			style='text-align:center;color:gray;font-family:arial;font-size:11px;text-decoration:none;'>Social Media 
			Icons</a> Powered by <a href='http://www.acurax.com/services/website-redesign.php?utm_source=blink&utm_medium=link&utm_campaign=footer' target='_blank' title='Website 
			Redesign Experts' 
			style='text-align:center;color:gray;font-family:arial;font-size:11px;text-decoration:none;'>Acurax Website 
			Redesign Experts</a>";
			} else if(($x % 4) == 0)
			{
			echo "<a href='http://www.acurax.com/products/floating-social-media-icon-plugin-wordpress/' target='_blank' 
			title='Social Media Wordpress plugin' 
			style='text-align:center;color:gray;font-family:arial;font-size:11px;text-decoration:none;'>Social Media 
			Icons</a> Powered by <a 
			href='http://www.acurax.com/social-media-marketing-optimization/social-profile-design.php?utm_source=blink&utm_medium=link&utm_campaign=footer' target='_blank' 
			title='Social Profile Design Experts' 
			style='text-align:center;color:gray;font-family:arial;font-size:11px;text-decoration:none;'>Acurax Social 
			Profile Design Experts</a>";
			} else if(($x % 3) == 0)
			{
			echo "<a href='http://www.acurax.com/products/floating-social-media-icon-plugin-wordpress/' target='_blank' 
			title='Social Media Wordpress plugin' 
			style='text-align:center;color:gray;font-family:arial;font-size:11px;text-decoration:none;'>Social Media 
			Icons</a> Powered by <a href='http://www.acurax.com/' target='_blank' title='Wordpress Development Company' 
			style='text-align:center;color:gray;font-family:arial;font-size:11px;text-decoration:none;'>Acurax Wordpress 
			Development Company</a>";
			} else if(($x % 2) == 0)
			{
			echo "<a href='http://www.acurax.com/products/floating-social-media-icon-plugin-wordpress/' target='_blank' 
			title='Social Media Wordpress plugin' 
			style='text-align:center;color:gray;font-family:arial;font-size:11px;text-decoration:none;'>Social Media 
			Icons</a> Powered by <a href='http://www.acurax.com/services/web-designing.php?utm_source=blink&utm_medium=link&utm_campaign=footer' target='_blank' title='Web Design 
			Company' style='text-align:center;color:gray;font-family:arial;font-size:11px;text-decoration:none;'>Acurax Web 
			Design Company</a>";
			} else if(($x % 1) == 0)
			{
			echo "<a href='http://www.acurax.com/products/floating-social-media-icon-plugin-wordpress/' target='_blank' 
			title='Social Media Wordpress plugin' 
			style='text-align:center;color:gray;font-family:arial;font-size:11px;text-decoration:none;'>Animated Social 
			Media Icons</a> Powered by <a href='http://www.acurax.com/services/wordpress-designing-experts.php?utm_source=blink&utm_medium=link&utm_campaign=footer' 
			target='_blank' 
			title='Wordpress Development Company' 
			style='text-align:center;color:gray;font-family:arial;font-size:11px;text-decoration:none;'>Acurax Wordpress 
			Development Company</a>";
			} else 
			{
			echo "<a href='http://www.acurax.com/products/floating-social-media-icon-plugin-wordpress/' target='_blank' 
			title='Social Media Wordpress plugin' 
			style='text-align:center;color:gray;font-family:arial;font-size:11px;text-decoration:none;'>Social Media 
			Icons</a> Powered by <a href='http://www.acurax.com/services/online-store-design-development.php?utm_source=blink&utm_medium=link&utm_campaign=footer' target='_blank' 
			title='Ecommerce Design Expert' 
			style='text-align:center;color:gray;font-family:arial;font-size:11px;text-decoration:none;'>Acurax Ecommerce 
			Design Expert</a>";
			}
			// Ending Crediting
			echo "</div>";
		} 
	}

} add_action('wp_footer', 'pbl_footer'); // pbl_footer

function extra_style_acx_icon()
{
	global $acx_si_icon_size;
	global $acx_si_display;
		echo "\n\n\n<!-- Starting Styles For Social Media Icon From Acurax International www.acurax.com -->\n<style type='text/css'>\n";
		echo "#divBottomRight img \n{\n";
		echo "width: " . $acx_si_icon_size . "px; \n}\n";
		
			if ($acx_si_display == "manual") 
			{
				echo "#divBottomRight \n{\n";
				echo "min-width:0px; \n";
				echo "position: static; \n}\n";
			}
			
		echo "</style>\n<!-- Ending Styles For Social Media Icon From Acurax International www.acurax.com -->\n\n\n\n";
}	add_action('admin_head', 'extra_style_acx_icon'); // ADMIN
	add_action('wp_head', 'extra_style_acx_icon'); // PUBLIC 

function acx_si_admin_style()  // Adding Style For Admin
{
	echo '<link rel="stylesheet" type="text/css" href="' .plugins_url('style_admin.css', __FILE__). '">';
}	add_action('admin_head', 'acx_si_admin_style'); // ADMIN

	$acx_si_display = get_option('acx_si_display');
if	($acx_si_display == "auto" || $acx_si_display == "both") 
{
	add_action('wp_footer', 'acurax_icons',100);
}
$acx_si_sc_id = 0; // Defined to assign shortcode unique id
function DISPLAY_ACURAX_ICONS_SC($atts)
{
	global $acx_si_display, $acx_si_icon_size, $acx_si_sc_id;
	extract(shortcode_atts(array(
	"theme" => '',
	"size" => $acx_si_icon_size,
	"autostart" => 'false'
	), $atts));
	if ($theme > ACX_SOCIALMEDIA_TOTAL_THEMES) { $theme = ""; }
	if (!is_numeric($theme)) { $theme = ""; }
	if ($size > 55) { $size = $acx_si_icon_size; }
	if (!is_numeric($size)) { $size = $acx_si_icon_size; }
	if ($acx_si_display != "auto" || $acx_si_display == "both") 
	{
		
		$acx_si_sc_id = $acx_si_sc_id + 1;
		ob_start();
		echo "<style>\n";
		echo "#short_code_si_icon img \n {";
		echo "width:" . $size . "px; \n}\n";
		echo ".scid-" . $acx_si_sc_id . " img \n{\n";
		echo "width:" . $size . "px !important; \n}\n";
		echo "</style>";
		echo "<div id='short_code_si_icon' align='center' class='scid-" . $acx_si_sc_id . "'>";
		acurax_si_simple($theme);
		echo "</div>";
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	} 
	else echo "<!-- Select Display Mode as Manual To Show The Acurax Social Media Icons -->";
} // DISPLAY_ACURAX_ICONS_SC

function DISPLAY_ACURAX_ICONS()
{
		global $acx_si_display, $acx_si_icon_size;;
	if ($acx_si_display != "auto" || $acx_si_display == "both") 
	{
		echo "\n\n\n<!-- Starting Styles For Social Media Icon (PHP CODE) From Acurax International www.acurax.com 
		-->\n<style 
		type='text/css'>\n";
		echo "#short_code_si_icon img \n{\n";
		echo "width: " . $acx_si_icon_size . "px; \n}\n";
		echo "</style>\n<!-- Ending Styles For Social Media Icon (PHP CODE) From Acurax International www.acurax.com 
		-->\n\n\n\n";
		echo "<div id='short_code_si_icon' align='center'>";
		acurax_si_simple();
		echo "</div>";
	} 
	else echo "<!-- Select Display Mode as Manual To Show The Acurax Social Media Icons -->";
} // DISPLAY_ACURAX_ICONS

			
function acx_not_auto()
{
	echo "<!-- Select Display Mode as Manual To Show The Acurax Social Media Icons -->";
}
if	($acx_si_display != "auto" || $acx_si_display == "both") 
{
	add_shortcode( 'DISPLAY_ACURAX_ICONS', 'DISPLAY_ACURAX_ICONS_SC' ); // Defining Shortcode to show Social Media Icon
}
else
{
	add_shortcode( 'DISPLAY_ACURAX_ICONS', 'acx_not_auto' ); // Defining Shortcode to show Select Manual
}


function acx_si_custom_admin_js()
{
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script('jquery-ui-sortable');
}	add_action( 'admin_enqueue_scripts', 'acx_si_custom_admin_js' );



// wp-admin Notices >> Finish Upgrade
function acx_si_pluign_upgrade_not_finished()
{
    echo '<div class="error">
		  <p><b>Thanks for updating Floating Social Media Icon plugin... You need to visit <a href="admin.php?page=Acurax-Social-Icons-Settings">Plugin\'s Settings Page</a> to Complete the Updation Process - <a href="admin.php?page=Acurax-Social-Icons-Settings">Click Here Visit Social Icon Plugin Settings</a></b></p>
		  </div>';
}
$total_arrays = 7; // Number Of Services
$social_icon_array_order = get_option('social_icon_array_order');
$social_icon_array_order = unserialize($social_icon_array_order);
$social_icon_array_count = count($social_icon_array_order); 
if ($social_icon_array_count < $total_arrays) 
{
	add_action('admin_notices', 'acx_si_pluign_upgrade_not_finished',1);
}

// wp-admin Notices >> Plugin not configured
function acx_si_pluign_not_configured()
{
    echo '<div class="error">
	<p><b>Floating Social Media Icon Plugin is not configured. You need to configure your social media profile URL\'s 
		  to start showing the Floating Social Media Icons - <a href="admin.php?page=Acurax-Social-Icons-Settings">Click 
		  here to configure</a></b></p>
		  </div>';
}
if ($social_icon_array_count == $total_arrays) 
{
if ($acx_si_twitter == "" && $acx_si_facebook == "" && $acx_si_youtube == "" && $acx_si_linkedin == ""  && $acx_si_pinterest == "" && $acx_si_gplus == "" && $acx_si_feed == "")
{
	add_action('admin_notices', 'acx_si_pluign_not_configured',1);
} // Chking If Plugin Not Configured
} // Chking $social_icon_array_count == $total_arrays

// wp-admin Notices >> Plugin not configured
function acx_si_pluign_promotion()
{
    echo '<div id="acx_td" class="error" style="background: none repeat scroll 0pt 0pt infobackground; border: 1px solid inactivecaption; padding: 5px;line-height:16px;">
	<p>It looks like you have been enjoying using Floating Social Media Icon plugin from <a href="http://www.acurax.com?utm_source=plugin&utm_medium=thirtyday&utm_campaign=thirtyday" title="Acurax Web Designing Company" target="_blank">Acurax</a> for atleast 30 days.Would you consider upgrading to <a href="http://www.acurax.com/products/floating-social-media-icon-plugin-wordpress/?utm_source=plugin&utm_medium=thirtyday&utm_campaign=thirtyday" title="Premium Floating Social Media Icon" target="_blank">premium version</a> to enjoy more features and help support continued development of the plugin? - You can also support us by giving us a website design, redesign, social media project or by spreading the world about this plugin. Thank you for using the plugin</p>
	<p>
	<a href="http://wordpress.org/extend/plugins/floating-social-media-icon/" class="button" style="color:black;text-decoration:none;padding:5px;margin-right:4px;" target="_blank">Rate it 5★\'s on wordpress</a>
	<a href="https://twitter.com/share?url=http://www.acurax.com/products/floating-social-media-icon-plugin-wordpress/&text=I Use Floating SocialMedia Icon from @acuraxdotcom on wordpress and you should too -" class="button" style="color:black;text-decoration:none;padding:5px;margin-right:4px;" target="_blank">Tell Your Followers</a>
	<a href="http://clients.acurax.com/cart.php?gid=8&utm_source=plugin&utm_medium=thirtyday&utm_campaign=thirtyday" class="button" style="color:black;text-decoration:none;padding:5px;margin-right:4px;" target="_blank">Order Premium Version</a>
	<a href="admin.php?page=Acurax-Social-Icons-Premium&td=hide" class="button" style="color:black;text-decoration:none;padding:5px;margin-right:4px;margin-left:20px;">Don\'t Show This Again</a>
</p>
		  
		  </div>';
}
$acx_si_installed_date = get_option('acx_si_installed_date');
if ($acx_si_installed_date=="") { $acx_si_installed_date = time();}
if($acx_si_installed_date < ( time() - 2952000 ))
{
if (get_option('acx_si_td') != "hide")
{
add_action('admin_notices', 'acx_si_pluign_promotion',1);
}
}


// Starting Widget Code
class Acx_Social_Icons_Widget extends WP_Widget
{
    // Register the widget
    function Acx_Social_Icons_Widget() 
	{
        // Set some widget options
        $widget_options = array( 'description' => 'Allow users to show Social Media Icons From Floating Social Media Icon 
		Plugin', 'classname' => 'acx-social-icons-desc' );
        // Set some control options (width, height etc)
        $control_options = array( 'width' => 300 );
        // Actually create the widget (widget id, widget name, options...)
        $this->WP_Widget( 'acx-social-icons-widget', 'Acx Social Icons', $widget_options, $control_options );
    }

    // Output the content of the widget
    function widget($args, $instance) 
	{
        extract( $args ); // Don't worry about this

        // Get our variables
        $title = apply_filters( 'widget_title', $instance['title'] );
		$icon_size = $instance['icon_size'];
		$icon_theme = $instance['icon_theme'];

        // This is defined when you register a sidebar
        echo $before_widget;

        // If our title isn't empty then show it
        if ( $title ) 
		{
            echo $before_title . $title . $after_title;
        }
		echo "<style>\n";
		echo "." . $this->get_field_id('widget') . " img \n{\n";
		echo "width:" . $icon_size . "px; \n}\n";
		echo "</style>";
		echo "<div id='acurax_si_simple' align='center' class='" . $this->get_field_id('widget') . "'>";
		acurax_si_simple($icon_theme);
		echo "</div>";
        // This is defined when you register a sidebar
        echo $after_widget;
    }

	// Output the admin options form
	function form($instance) 
	{
		$total_themes = ACX_SOCIALMEDIA_TOTAL_THEMES;
		$total_themes = $total_themes + 1;
		// These are our default values
		$defaults = array( 'title' => 'Social Media Icons','icon_size' => '32' );
		// This overwrites any default values with saved values
		$instance = wp_parse_args( (array) $instance, $defaults );
		?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
				<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" 
				value="<?php echo $instance['title']; ?>" type="text" class="widefat" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('icon_size'); ?>"><?php _e('Icon Size:'); ?></label>
				<select class="widefat" name="<?php echo $this->get_field_name('icon_size'); ?>" id="<?php echo $this
				->get_field_id('icon_size'); ?>">
				<option value="16"<?php if ($instance['icon_size'] == "16") { echo 'selected="selected"'; } ?>>16px X 16px </
				option>
				<option value="25"<?php if ($instance['icon_size'] == "25") { echo 'selected="selected"'; } ?>>25px X 25px </
				option>
				<option value="32"<?php if ($instance['icon_size'] == "32") { echo 'selected="selected"'; } ?>>32px X 32px </
				option>
				<option value="40"<?php if ($instance['icon_size'] == "40") { echo 'selected="selected"'; } ?>>40px X 40px </
				option>
				<option value="48"<?php if ($instance['icon_size'] == "48") { echo 'selected="selected"'; } ?>>48px X 48px </
				option>
				<option value="55"<?php if ($instance['icon_size'] == "55") { echo 'selected="selected"'; } ?>>55px X 55px </
				option>
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('icon_theme'); ?>"><?php _e('Icon Theme:'); ?></label>
				<select class="widefat" name="<?php echo $this->get_field_name('icon_theme'); ?>" id="<?php echo $this
				->get_field_id('icon_theme'); ?>">
				<option value=""<?php if ($instance['icon_theme'] == "") { echo 
				'selected="selected"'; } ?>>Default Theme Design</option>
				<?php
				for ($i=1; $i < $total_themes; $i++)
				{
					?>
					<option value="<?php echo $i; ?>"<?php if ($instance['icon_theme'] == $i) { echo 
					'selected="selected"'; } ?>>Theme Design <?php echo $i; ?> </option>
					<?php
				}	?>
				</select>
			</p>
		<?php
	}

	// Processes the admin options form when saved
	function update($new_instance, $old_instance) 
	{
		// Get the old values
		$instance = $old_instance;

		// Update with any new values (and sanitise input)
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['icon_size'] = strip_tags( $new_instance['icon_size'] );
		$instance['icon_theme'] = strip_tags( $new_instance['icon_theme'] );
		return $instance;
	}
} add_action('widgets_init', create_function('', 'return register_widget("Acx_Social_Icons_Widget");'));
// Ending Widget Codes
function acurax_optin()
{ ?>
<br>
<div class="widefat" align="center" style="width: 425px; padding: 10px; margin-left: auto; margin-right: auto;">
<script>
function verify_fields()
{
var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
var address = document.subscription.xyz_em_email.value;
if(reg.test(address) == false) {
alert("Please check whether the email is correct.");
return false;
}else{
document.subscription.submit();
}
}
</script>
<style>
#acx_optin
{
    background: url("<?php echo plugins_url('images/social_media.jpg', __FILE__); ?>") repeat scroll 0 0 transparent;
    height: 227px;
    position: relative;
    width: 425px;
}
#xyz_em_email
{
    background: none repeat scroll 0 0 white;
    border: medium none;
    height: 21px;
    left: 195px;
    position: absolute;
    top: 141px;
    width: 203px;
}
#xyz_em_name
{
    background: none repeat scroll 0 0 white;
    border: medium none;
    height: 21px;
    left: 195px;
    position: absolute;
    top: 99px;
    width: 203px;
}
#xyz_em_submit
{
    background: none repeat scroll 0 0 transparent;
    border: 0 none;
    color: white;
    cursor: pointer;
    font-family: arial;
    font-size: 1px;
    height: 24px;
    left: 281px;
    position: absolute;
    top: 180px;
    width: 120px;
}
</style><a name="cheat-sheet">
<div id="acx_optin"></a>
<form method="POST" name="subscription" action="http://www.acurax.com/acx_images/plugins/newsletter-manager/subscription.php">
<input  name="xyz_em_name" id="xyz_em_name" type="text" value="
<?php global $current_user; get_currentuserinfo(); 
if ($current_user->user_firstname != "" || $current_user->user_lastname != "") 
{
	echo $current_user->user_firstname . " " . $current_user->user_lastname; 
} 
else if ($current_user->display_name != "admin" && $current_user->display_name != "Admin" && $current_user->display_name != "administrator") 
{
	echo $current_user->display_name;
} else if ($current_user->user_login != "admin" && $current_user->user_login != "administrator" && $current_user->user_login != "Admin") 
{
	echo $current_user->user_login;	
}
?>
"/>
<input  name="xyz_em_email" id="xyz_em_email" type="text" value="
<?php global $current_user; get_currentuserinfo(); 
	echo $current_user->user_email; 
?>
"/>
<input name="htmlSubmit"  id="xyz_em_submit" class="button-primary" type="submit" value="." onclick="javascript: if(!verify_fields()) return false; "  />
</form>
</div>			
</div>
<?php } 
function socialicons_comparison($ad)
{
$ad_1 = '
</hr>
<div align="center">
<br>
<h1>Free and Premium Comparison:</h2>
<table id="comparison" cellspacing="0" style="margin-right:auto;margin-left:auto;">
<tr class="title">
<td class="label">Features</td>
<td class="feature_free">Free</td>
<td class="feature_paid" style="border-right:0px;">Premium</td>
</tr>

<tr>
<td class="label">Automatic/Manual Integration</td>
<td class="feature_free"><div id="c_tick"></div> <!-- c_tick --></td>
<td class="feature_paid" style="border-right:0px;"><div id="c_tick"></div> <!-- c_tick --></td>
</tr>

<tr>
<td class="label">Option to select/define icon design</td>
<td class="feature_free"><div id="c_tick"></div> <!-- c_tick --></td>
<td class="feature_paid" style="border-right:0px;"><div id="c_tick"></div> <!-- c_tick --></td>
</tr>

<tr>
<td class="label">Option to select/define icon size</td>
<td class="feature_free"><div id="c_tick"></div> <!-- c_tick --></td>
<td class="feature_paid" style="border-right:0px;"><div id="c_tick"></div> <!-- c_tick --></td>
</tr>

<tr>
<td class="label">Seperate Icon Style/Size for each Shortcode</td>
<td class="feature_free"><div id="c_tick"></div> <!-- c_tick --></td>
<td class="feature_paid" style="border-right:0px;"><div id="c_tick"></div> <!-- c_tick --></td>
</tr>

<tr>
<td class="label">Seperate Icon Style/Size for each Widget</td>
<td class="feature_free"><div id="c_tick"></div> <!-- c_tick --></td>
<td class="feature_paid" style="border-right:0px;"><div id="c_tick"></div> <!-- c_tick --></td>
</tr>

<tr>
<td class="label">Reorder Icons</td>
<td class="feature_free"><div id="c_tick"></div> <!-- c_tick --></td>
<td class="feature_paid" style="border-right:0px;"><div id="c_tick"></div> <!-- c_tick --></td>
</tr>

<tr>
<td class="label">Widget Support</td>
<td class="feature_free"><div id="c_tick"></div> <!-- c_tick --></td>
<td class="feature_paid" style="border-right:0px;"><div id="c_tick"></div> <!-- c_tick --></td>
</tr>

<tr>
<td class="label">Multiple Widget Support</td>
<td class="feature_free"><div id="c_tick"></div> <!-- c_tick --></td>
<td class="feature_paid" style="border-right:0px;"><div id="c_tick"></div> <!-- c_tick --></td>
</tr>

<tr>
<td class="label">Shortcode Support</td>
<td class="feature_free"><div id="c_tick"></div> <!-- c_tick --></td>
<td class="feature_paid" style="border-right:0px;"><div id="c_tick"></div> <!-- c_tick --></td>
</tr>

<tr>
<td class="label">Multiple Shortcode Instance Support</td>
<td class="feature_free"><div id="c_tick"></div> <!-- c_tick --></td>
<td class="feature_paid" style="border-right:0px;"><div id="c_tick"></div> <!-- c_tick --></td>
</tr>

<tr>
<td class="label" style="font-weight: bold; text-align: left; color: black; background: none repeat scroll 0pt 0pt YellowGreen;">More Sharp Quality Icons</td>
<td class="feature_free"><div id="c_cross"></div></td>
<td class="feature_paid" style="border-right:0px;"><div id="c_tick"></div> <!-- c_tick --></td>
</tr>

<tr>
<td class="label" style="font-weight: bold; text-align: left; color: black; background: none repeat scroll 0pt 0pt YellowGreen;">Multiple Floating Animation</td>
<td class="feature_free"><div id="c_cross"></div></td>
<td class="feature_paid" style="border-right:0px;"><div id="c_tick"></div> <!-- c_tick --></td>
</tr>

<tr>
<td class="label" style="font-weight: bold; text-align: left; color: black; background: none repeat scroll 0pt 0pt YellowGreen;">Configure Animation Repeat Interval</td>
<td class="feature_free"><div id="c_cross"></div></td>
<td class="feature_paid" style="border-right:0px;"><div id="c_tick"></div> <!-- c_tick --></td>
</tr>

<tr>
<td class="label" style="font-weight: bold; text-align: left; color: black; background: none repeat scroll 0pt 0pt YellowGreen;">Animation Repeat Interval Based On Time</td>
<td class="feature_free"><div id="c_cross"></div></td>
<td class="feature_paid" style="border-right:0px;"><div id="c_tick"></div> <!-- c_tick --></td>
</tr>

<tr>
<td class="label" style="font-weight: bold; text-align: left; color: black; background: none repeat scroll 0pt 0pt YellowGreen;">Animation Repeat Interval Based on Page Views</td>
<td class="feature_free"><div id="c_cross"></div></td>
<td class="feature_paid" style="border-right:0px;"><div id="c_tick"></div> <!-- c_tick --></td>
</tr>

<tr>
<td class="label" style="font-weight: bold; text-align: left; color: black; background: none repeat scroll 0pt 0pt YellowGreen;">Animation Repeat Interval Based On Page Views and Time (both)</td>
<td class="feature_free"><div id="c_cross"></div></td>
<td class="feature_paid" style="border-right:0px;"><div id="c_tick"></div> <!-- c_tick --></td>
</tr>

<tr>
<td class="label" style="font-weight: bold; text-align: left; color: black; background: none repeat scroll 0pt 0pt YellowGreen;">Ajax Based Settings Page</td>
<td class="feature_free"><div id="c_cross"></div></td>
<td class="feature_paid" style="border-right:0px;"><div id="c_tick"></div> <!-- c_tick --></td>
</tr>

<tr>
<td class="label" style="font-weight: bold; text-align: left; color: black; background: none repeat scroll 0pt 0pt YellowGreen;">Set whether the icons to link profile/share</td>
<td class="feature_free"><div id="c_cross"></div></td>
<td class="feature_paid" style="border-right:0px;"><div id="c_tick"></div> <!-- c_tick --></td>
</tr>

<tr>
<td class="label" style="font-weight: bold; text-align: left; color: black; background: none repeat scroll 0pt 0pt YellowGreen;">Easy to configure</td>
<td class="feature_free"><div id="c_cross"></div></td>
<td class="feature_paid" style="border-right:0px;"><div id="c_tick"></div> <!-- c_tick --></td>
</tr>

<tr>
<td class="label" style="font-weight: bold; text-align: left; color: black; background: none repeat scroll 0pt 0pt YellowGreen;">Icon Placement Width Setting (allows to configure how many icons in 1 row)</td>
<td class="feature_free"><div id="c_cross"></div></td>
<td class="feature_paid" style="border-right:0px;"><div id="c_tick"></div> <!-- c_tick --></td>
</tr>

<tr>
<td class="label" style="font-weight: bold; text-align: left; color: black; background: none repeat scroll 0pt 0pt YellowGreen;">Seperate Icon function for each Widget</td>
<td class="feature_free"><div id="c_cross"></div></td>
<td class="feature_paid" style="border-right:0px;"><div id="c_tick"></div> <!-- c_tick --></td>
</tr>

<tr>
<td class="label" style="font-weight: bold; text-align: left; color: black; background: none repeat scroll 0pt 0pt YellowGreen;">Advanced PHP Code Support</td>
<td class="feature_free"><div id="c_cross"></div></td>
<td class="feature_paid" style="border-right:0px;"><div id="c_tick"></div> <!-- c_tick --></td>
</tr>

<tr>
<td class="label" style="font-weight: bold; text-align: left; color: black; background: none repeat scroll 0pt 0pt YellowGreen;">Advanced Shortcode Support</td>
<td class="feature_free"><div id="c_cross"></div></td>
<td class="feature_paid" style="border-right:0px;"><div id="c_tick"></div> <!-- c_tick --></td>
</tr>

<tr>
<td class="label" style="font-weight: bold; text-align: left; color: black; background: none repeat scroll 0pt 0pt YellowGreen;">Seperate Icon function for each Shortcode</td>
<td class="feature_free"><div id="c_cross"></div></td>
<td class="feature_paid" style="border-right:0px;"><div id="c_tick"></div> <!-- c_tick --></td>
</tr>

<tr>
<td class="label" style="font-weight: bold; text-align: left; color: black; background: none repeat scroll 0pt 0pt YellowGreen;">Can Configure Floating Start Position</td>
<td class="feature_free"><div id="c_cross"></div></td>
<td class="feature_paid" style="border-right:0px;"><div id="c_tick"></div> <!-- c_tick --></td>
</tr>

<tr>
<td class="label" style="font-weight: bold; text-align: left; color: black; background: none repeat scroll 0pt 0pt YellowGreen;">Can Configure Floating End Position</td>
<td class="feature_free"><div id="c_cross"></div></td>
<td class="feature_paid" style="border-right:0px;"><div id="c_tick"></div> <!-- c_tick --></td>
</tr>

</table><br>
<div id="ad_fsmi_2_button_order">
<a href="http://clients.acurax.com/cart.php?gid=8&utm_source=plugin_settings&utm_medium=banner&utm_campaign=plugin_yellow_order" target="_blank"><div id="ad_fsmi_2_button_order_link"></div></a></div> <!-- ad_fsmi_2_button_order --> <br>
<div id="ad_fsmi_2_button_payments">
<a href="http://clients.acurax.com/cart.php?gid=8&utm_source=plugin_settings&utm_medium=banner&utm_campaign=plugin_payments_banner" target="_blank"><div id="ad_fsmi_2_button_payments_link"></div></a> </div>
<br></div>';
$ad_2='<div id="ad_fsmi_2"> <a href="http://clients.acurax.com/cart.php?gid=8&utm_source=plugin_settings&utm_medium=banner&utm_campaign=plugin_enjoy" target="_blank"><div id="ad_fsmi_2_button"></div></a> </div> <!-- ad_fsmi_2 --><br>
<div id="ad_fsmi_2_button_order">
<a href="http://clients.acurax.com/cart.php?gid=8&utm_source=plugin_settings&utm_medium=banner&utm_campaign=plugin_yellow_order" target="_blank"><div id="ad_fsmi_2_button_order_link"></div></a></div> <!-- ad_fsmi_2_button_order --> <br>
<div id="ad_fsmi_2_button_payments">
<a href="http://clients.acurax.com/cart.php?gid=8&utm_source=plugin_settings&utm_medium=banner&utm_campaign=plugin_payments_banner" target="_blank"><div id="ad_fsmi_2_button_payments_link"></div></a> </div>';
if($ad=="") { echo $ad_2; } else if ($ad == 1) { echo $ad_1; } else if ($ad == 2) { echo $ad_2; } 
}

?>
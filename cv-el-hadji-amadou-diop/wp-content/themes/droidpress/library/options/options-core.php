<?php   

/* 
	Options	Core
	Author: Tyler Cunningham
	Establishes the core theme options settings.
	Copyright (C) 2011 CyberChimps
	Version 2.0
	
	Portions of this code written by Blogatize http://blogatize.net
	License: GNU General Public License v2.0
	License URI: http://www.gnu.org/licenses/gpl-2.0.html  
*/

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' ); 


/* Initialize plugin options to white list our options */  
function theme_options_init() {

	global $themename, $themeslug, $options;
	
	register_setting( $themeslug.'_options', ''.$themename.'', 'theme_options_validate' );
	 

	wp_register_script($themeslug.'jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"), false, '1.4.4');
    wp_register_script($themeslug.'jqueryui', get_template_directory_uri(). '/library/js/jquery-ui.js');
    wp_register_script($themeslug.'jquerycookie', get_template_directory_uri(). '/library/js/jquery-cookie.js');
    wp_register_script($themeslug.'cookie', get_template_directory_uri(). '/library/js/cookie.js');
    wp_register_script($themeslug.'color', get_template_directory_uri(). '/library/js/jscolor/jscolor.js');
    wp_register_style($themeslug.'css', get_template_directory_uri(). '/library/options/theme-options.css');
}

// Add scripts and stylesheet

function enqueue_scripts() {

	global $themename, $themeslug, $options;
	
    wp_enqueue_script($themeslug.'jquery');
    wp_enqueue_script($themeslug.'jqueryui');
    wp_enqueue_script($themeslug.'jquerycookie');
    wp_enqueue_script($themeslug.'cookie');
    wp_enqueue_script($themeslug.'color');
}
    
 function enqueue_styles() {
 
 	global $themename, $themeslug, $options;
      
    wp_enqueue_style($themeslug.'css');  
}

$name = "DroidPress";
$template_url = get_template_directory_uri();


/* Load up the menu page */
 
function theme_options_add_page() {
global $name, $shortname, $options;
  $page = add_theme_page($name." Settings", "".$name."", 'edit_theme_options', 'theme_options', 'theme_options_do_page');  

  add_action('admin_print_scripts-' . $page, 'enqueue_scripts');
  add_action('admin_print_styles-' . $page, 'enqueue_styles');  
 
}

/* Include select arrays */

	require_once ( get_template_directory() . '/library/options/options-select.php' );

/* End select arrays */

/* Include options functions */

	require_once ( get_template_directory() . '/library/options/options-functions.php' );

/* End options functions */

/* Include options tabs */

	require_once ( get_template_directory() . '/library/options/options-tabs.php' );

/* End options tabs */

/* Create the options page */

function theme_options_do_page() {
	global $name, $shortname, $optionlist, $select_font, $select_featured_images;
  

	if ( ! isset( $_REQUEST['updated'] ) ) {
		$_REQUEST['updated'] = false; 
} 
  if( isset( $_REQUEST['reset'] )) { 
            global $wpdb;
            $query = "DELETE FROM $wpdb->options WHERE option_name LIKE 'droidpress'";
            $wpdb->query($query);
            
            die;
     } 
   
?>

<div class="wrap">

<br />
<div class="titletext">DroidPress</div>
<br />
<div class="upgrade"><a href="http://cyberchimps.com/droidpresspro/" target="_blank">Upgrade to DroidPress Pro</a> Pro includes a featured posts section, a feature slider, post formats support, and more.</div>
<br />
<?php if ( false !== $_REQUEST['updated'] ) { ?>
		<?php echo '<div id="message" class="updated fade" style="float:left;"><p><strong>'.$name.' settings saved</strong></p></div>'; ?>
    
    <?php } if( isset( $_REQUEST['reset'] )) { echo '<div id="message" class="updated fade"><p><strong>'.$name.' settings reset</strong></p></div>'; } ?>  
				


  <form method="post" action="options.php" enctype="multipart/form-data">
  
    <p class="submit" style="clear:left;float: right;">
				<input type="submit" class="button-primary" value="Save Settings" />   
	</p>
	
	<div class="menu">
	<ul>
		<li><a href="http://cyberchimps.com/store/" target="_blank">CyberChimps Store</a></li>
		<li><a href="http://cyberchimps.com/support/" target="_blank">Support</a></li>
		<li><a href="http://cyberchimps.com/droidpress/docs/">Docs</a></li>
		<li><a href="http://cyberchimps.com/forum/" target="_blank">Forum</a></li>
		<li><a href="http://twitter.com/#!/cyberchimps" target="_blank">Twitter</a></li>
		<li><a href="http://www.facebook.com/CyberChimps" target="_blank">Facebook</a></li>
	</ul>
	</div>

      
    <div id="tabs" style="clear:both;">   
    <ul class="tabNavigation">
        <li><a href="#tab1"><span>General</span></a></li>
        <li><a href="#tab2"><span>Design</span></a></li>
        <li><a href="#tab3"><span>Blog</span></a></li>
        <li><a href="#tab4"><span>Social</span></a></li>       
    
    </ul>
    
    <div class="tabContainer">
		
			<?php settings_fields( 'dp_options' ); ?>
			<?php $options = get_option( 'droidpress' ); ?>

			<table class="form-table">   

<?php
/* Include options case */

	require_once ( get_template_directory() . '/library/options/options-case.php' );

/* End options case */
?>       

      </div>  
      <div id="top"><a href='#TOP'><img src="<?php echo get_template_directory_uri() ;?>/images/options/top.png" /></a>
      </div>
      <div style="text-align: left;padding: 5px;"><a href="http://cyberchimps.com/" target="_blank"><img src="<?php echo get_template_directory_uri() ;?>/images/options/cyberchimpsmini.png" /></a></div>
    
    </div>    
</form>
    
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
<small>WARNING THIS RESTORES ALL DEFAULTS</small>
</p>
</form>
	</div>
	
	<?php
}

/* Include options validate */

	require_once ( get_template_directory() . '/library/options/options-validate.php' );

/* End options validate */

/* Redirect after activation */

if ( is_admin() && isset($_GET['activated'] ) && $pagenow ==	"themes.php" )
	wp_redirect( 'themes.php?page=theme_options' );
	
/* Redirect after resetting theme options */

if ( isset( $_REQUEST['reset'] ))
  wp_redirect( 'themes.php?page=theme_options' );
  
?>
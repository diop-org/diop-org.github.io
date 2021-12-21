<?php
/**
Plugin Name: Triton Settings
Description: Theme Options for Triton
Author: Towfiq I.
Version: 1.0
Author URI: http//towfiqi.com
*/

// Hook for adding admin menus
add_action('admin_menu', 'trt_add_option_page');
if ( isset( $_GET['page'] ) && $_GET['page'] == 'trt_option' ) {
	$file_dir=get_bloginfo('template_directory');
	wp_enqueue_style("trt_functions", $file_dir."/css/control_panel.css", false, "1.0", "all");
	wp_enqueue_script('trt_colorpicker',get_template_directory_uri().'/js/colorpicker.js');
	wp_enqueue_script("trt_script", $file_dir."/js/control_panel.js", false);
}

function trt_admin_scripts() {
$file_dir=get_bloginfo('template_directory');
wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
}

function trt_admin_styles() {
wp_enqueue_style('thickbox');
}

function trt_add_option_page(){

add_theme_page('Triton Lite Theme Options','Triton Lite Options','edit_theme_options','trt_option','trt_theme_option');

register_setting('trt_theme_options','trt_options','trt_validate_options');

}

function trt_theme_option(){

	//This will show any settings error or success message
	$error = get_settings_errors('trt_options');
	
	if(!empty($error)){
	echo '<div id="message" class="updated fade"><strong>';
	echo '<h3>The following errors are found</h3><ol>';
	foreach($error as $e){
	echo '<li>'.$e[message].'</li>';
	}
	echo '</ol></strong></div>';
	
	}else{
	echo '<div id="message" class="updated fade"><p><strong>Triton Settings saved.</strong></p></div>';
	}

?>
<title></title>

<div class='wrap'>
<div id="tabs" class="options">
<div id="control_panel_header"><div id="control_logo"><a>Triton <?php _e('Options', 'triton');?></a></div>
   <ul>
     <li class="tab_gen"><a href="#tab-1">General</a></li>
     <li class="tab_stl"><a href="#tab-2">Style</a></li>
     <li class="tab_front"><a href="#tab-3">Front page</a></li>
     <li class="tab_sldr"><a href="#tab-4">Slider</a></li>
     <li class="tab_misc"><a href="#tab-5">Misc.</a></li>
     <li class="tab_comm"><a href="#tab-6">Documentation</a></li>
     <li class="tab_abt"><a href="#tab-7">About</a></li>
     <li class="tab_upg"><a href="#tab-8">Upgrade</a></li>
   </ul>
</div>

<form method="post" action="options.php">
			
			<!--this settings_fields function will generate the wordpress nonce security check as hidden inputs-->
            <!--this will make sure that values are send from this admin page and not from others -->
			<?php settings_fields('trt_theme_options'); ?>
			
			<?php $options = get_option('trt_options'); ?>
            <div id="tab_gen">
                <div class="tab" id="tab-1">
                    <div class="tab_sub_menu">
                    <ul><li><a href="#sub_gen">Appearance</a></li><li><a href="#sub_logo">Header Settings</a></li><li><a href="#sub_foot">Footer</a></li></ul>
                    </div>
                  <div class="tab_option" id="sub_gen">         

                
                <h4><label>Pattern</label></h4>
                
                <p class="divider">
                <label>Select a background pattern</label>
                <?php
                
                $items = array("no_pattern", "pattern1", "pattern2");
                
                echo "<select name='trt_options[trt_patterns]'>";
                foreach($items as $item) {
                    ?>
<option value="<?php echo $item; ?>" <?php selected( $options['trt_patterns'], $item ); ?> /><?php echo $item; ?></option>
<?php
                }
                echo "</select>";
                
                ?>
                </p>

                
                <h4><label>Font</label></h4>
                <p class="divider">
                <label>Select a font from the list</label>
                <?php
                
                $items = array("Lora", "Arial","Lobster");
                
                echo "<select name='trt_options[trt_fonts]'>";
                foreach($items as $item) {
                    ?>
<option value="<?php echo $item; ?>" <?php selected( $options['trt_fonts'], $item ); ?> /><?php echo $item; ?></option>
<?php
                }
                echo "</select>";
                
                ?>
                </p>

                
                </div>
                
                <div class="tab_option" id="sub_logo">         
                <h3><label>Header Settings</label></h3>
                
                <p class="divider">
                <label style=" font-size:12px; margin:5px 0px;">Align Logo to left</label>
                <input name="trt_options[trt_lft_logo]" type="checkbox" value="1" <?php checked( $options['trt_lft_logo'], 1); ?> />
                
                </p>
                
                
                <h4><label>Site Description Settings</label> </h4>
                <p class="divider">
                <label style=" font-size:12px; margin:5px 0px;">Hide Site Discription Under Logo</label>
                <input name="trt_options[trt_description]" type="checkbox" value="1" <?php checked( $options['trt_description'], 1); ?> />
                
                </p>           
                
                
                </div>
                
                <div class="tab_option" id="sub_foot">
                
                <h4><label>Footer</label></h4>
                
                <p class="divider">
                <label style=" font-size:12px; margin:5px 0px;">Disable Midrow Widgets</label>
                <input name="trt_options[trt_diss_ftw]" type="checkbox" value="1" <?php checked( $options['trt_diss_ftw'], 1); ?> />
                
                </p>
                        
                
                <p class="divider"><label>Footer Text</label><br />
                <textarea class="intro_text" name="trt_options[trt_foot]" rows="5" cols="50"><?php echo esc_textarea($options['trt_foot']); ?></textarea>
                </p>
                

                </div>


                </div>
           </div>
           
           <div id="tab_stl">
                <div class="tab" id="tab-2">
                    <div class="tab_sub_menu">
                    <ul><li><a href="#sub_elm">Color Management</a></li></ul>
                    </div>
                    
            <div class="tab_option" id="sub_elm">      
            
            <!--FONT COLOR SETTINGS-->
            
            <h3>Fonts Color</h3>

            <p class="divider">   
            <label>Primary Font Color</label>
           <input id="primtxt_color" type="text" name="trt_options[trt_primtxt_color]" value="<?php 
                
                if(empty($options['trt_primtxt_color'])){
                echo '7F7F7F';
                }else{
                echo $options['trt_primtxt_color'];} ?>" style="width:120px" />
            </p>

            
				<p class="submit" style="float:left;">
                <input id="reset" value="reset" />
				</p>
                </div>

                
                </div>
            </div>
           
           
                
           <div id="tab_front">
                <div class="tab" id="tab-3">
                    <div class="tab_sub_menu">
                    <ul><li><a href="#sub_lay">Layout Settings</a></li><li><a href="#sub_social">Social</a></li></ul>
                    </div>
                    
                 <div class="tab_option" id="sub_lay">         
                <h4><label>Select a Layout</label></h4>
                
                <p class="divider">
                
				<?php
                $items = array("Layout 1");
                
                echo "<select name='trt_options[trt_lay]'>";
                foreach($items as $item) {
                    ?>
<option value="<?php echo $item; ?>" <?php selected( $options['trt_lay'], $item ); ?> /><?php echo $item; ?></option>
<?php
                }
                echo "</select>";
                
                ?>
                </p>
                
                </div>
                
                  <div class="tab_option" id="sub_social">         
                <h4><label>Social</label></h4>
                
                <p class="divider">
                <label>Hide all the Social Icons</label>
                            <input name="trt_options[trt_hide_social]" type="checkbox" value="1" <?php checked( $options['trt_hide_social'], 1); ?> /></p>
                            
            <p class="divider">
            <label>Facebook url</label>
            <input type="text" name="trt_options[trt_fb_url]" value="<?php echo $options['trt_fb_url']; ?>" style="width:300px" />
<br /> 
            <small>Hide Facebook Icon</small>
			<input name="trt_options[trt_hide_fb]" type="checkbox" value="1" <?php checked( $options['trt_hide_fb'], 1); ?> /></p>
            
            <p class="divider">
            <label>Twitter url</label>
            <input type="text" name="trt_options[trt_tw_url]" value="<?php echo $options['trt_tw_url']; ?>" style="width:300px" />
<br />            
            <small>Hide Twitter Icon</small>
			<input name="trt_options[trt_hide_tw]" type="checkbox" value="1" <?php checked( $options['trt_hide_tw'], 1); ?> /></p>
            
   			<p class="divider">
            <label>Myspace url </label>
            <input type="text" name="trt_options[trt_ms_url]" value="<?php echo $options['trt_ms_url']; ?>" style="width:300px" />
<br />                       
            <small>Hide Myspace Icon</small>
			<input name="trt_options[trt_hide_ms]" type="checkbox" value="1" <?php checked( $options['trt_hide_ms'], 1); ?> /></p>
            
            <p class="divider">
            <label>Youtube url</label>
            <input type="text" name="trt_options[trt_ytb_url]" value="<?php echo $options['trt_ytb_url']; ?>" style="width:300px" />
<br />
            <small>Hide Youtube Icon</small>
			<input name="trt_options[trt_hide_ytb]" type="checkbox" value="1" <?php checked( $options['trt_hide_ytb'], 1); ?> /></p>
            
            
            <p class="divider">
            <label>Flickr url</label>
            <input type="text" name="trt_options[trt_flckr_url]" value="<?php echo $options['trt_flckr_url']; ?>" style="width:300px" /><br />
 
            <small>Hide Flickr Icon</small>
			<input name="trt_options[trt_hide_flckr]" type="checkbox" value="1" <?php checked( $options['trt_hide_flckr'], 1); ?>> /></p>
            
            <p class="divider">
            <label>RSS url</label>
            <input type="text" name="trt_options[trt_rss_url]" value="<?php 
                
                if(empty($options['trt_rss_url'])){
                echo ''.home_url().'/?feed=rss2';
                }else{
                echo $options['trt_rss_url'];} ?>" style="width:300px" /><br />
			 <small>Hide RSS Icon</small>
			<input name="trt_options[trt_hide_rss]" type="checkbox" value="1" <?php checked( $options['trt_hide_rss'], 1); ?> /></p>
            
            
            <p class="divider">
            <label>Google Plus url</label>
            <input type="text" name="trt_options[trt_gplus_url]" value="<?php echo $options['trt_gplus_url']; ?>" style="width:300px" /><br />
 
            <small>Hide Google Plus Icon</small>
			<input name="trt_options[trt_hide_gplus]" type="checkbox" value="1" <?php checked( $options['trt_hide_gplus'], 1); ?> /></p>
            
            <br />

                </div>
                
                
                </div>
            </div>
                
                
            <div id="tab_sldr">
                <div class="tab" id="tab-4">
                    <div class="tab_sub_menu">
                    <ul><li><a href="#sub_sldr">Slider Options</a></li></ul>
                    </div>
                  <div class="tab_option" id="sub_sldr">         
                <h4><label>Slider</label></h4>
                
                <p class="divider">
                <label>Select a Slider from the list</label>
                <?php
                
                $items = array( "Easyslider", "Disable Slider");
                
                echo "<select name='trt_options[trt_slider]'>";
                foreach($items as $item) {
                    ?>
<option value="<?php echo $item; ?>" <?php selected( $options['trt_slider'], $item ); ?> /><?php echo $item; ?></option>
<?php
                }
                echo "</select>";
                
                ?><br />
                
                </p>
                
                <p class="divider">
                <label>Slider Speed</label>
                <input type="text" name="trt_options[trt_slider_speed]" value="<?php 
                
                if(empty($options['trt_slider_speed'])){
                echo '3000';
                }else{
                echo $options['trt_slider_speed'];} 
                
                ?>" style="width:100px" />
                </p>
                
                <p class="divider">
                <label>Number of Slides</label>
                <?php
                
                $items = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10");
                
                echo "<select name='trt_options[trt_num_sld]'>";
                foreach($items as $item) {
                    ?>
<option value="<?php echo $item; ?>" <?php selected( $options['trt_num_sld'], $item ); ?> /><?php echo $item; ?></option>
<?php
                }
                echo "</select>";
                
                ?>
                </p>

                
                </div></div>
            </div>
            
            
            
            <div id="tab_misc">
                <div class="tab" id="tab-5">
                    <div class="tab_sub_menu">
                    <ul>
                    <li><a href="#sub_post">Post Settings</a></li>
                    <li><a href="#sub_plug">Plugins</a></li>
                    </ul>
                    </div>
                    
                  <div class="tab_option" id="sub_post">         
                
                <h4><label>Post Page Settings</label></h4>

                <p class="divider">
                <label style=" font-size:12px; margin:5px 0px;">Disable Social Share</label>
                <input name="trt_options[trt_diss_sss]" type="checkbox" value="1" <?php checked( $options['trt_diss_sss'], 1); ?> />
                
                </p>

                
                </p>
                
                <p class="divider">
                <label style=" font-size:12px; margin:5px 0px;">Hide Author Name &amp; Date</label>
                <input name="trt_options[trt_diss_date]" type="checkbox" value="1" <?php checked( $options['trt_diss_date'], 1); ?> />
                
                </p>
                
                <p class="divider">
                <label style=" font-size:12px; margin:5px 0px;">Hide Category &amp; Tags</label>
                <input name="trt_options[trt_diss_cats]" type="checkbox" value="1" <?php checked( $options['trt_diss_cats'], 1); ?> />
                
                </p>
                
                
                </div>
                
                <div class="tab_option" id="sub_plug"> 
                <h4><label>Plugins</label> </h4>

                <p class="divider">
                <label style=" font-size:12px; margin:5px 0px;">Disable Fancybox Plugin</label>
                <input name="trt_options[trt_diss_fbx]" type="checkbox" value="1" <?php checked( $options['trt_diss_fbx'], 1); ?> />
                
                </p>
             
                </div>
                
                
                
                </div>
            </div>
            
            <div id="tab_comm">
                <div class="tab" id="tab-6">
                    <div class="tab_sub_menu">
                    <ul>
                    <li><a href="#sub_comm">Slider Setup</a></li>
                    <li><a href="#sub_log">Widgets</a></li>
                    <li><a href="#sub_shrt">Shortcodes</a></li>
                    <li><a href="#sub_misc">Miscellaneous</a></li>
                    </ul>
                    </div>
                    
                  <div class="tab_option" id="sub_comm">         
                	<h3>Setting Up The Slider</h3>
                    <p>Triton comes with unique and easy to use slider. To set up slider go to Slider> Add New</p>
                    <img class="alignright" style="" src="<?php echo get_template_directory_uri(); ?>/images/defaults/image021.gif" alt="slider_menu" />
                	<p><strong>In the "Add New Slide" page there are 4 Boxes:</strong></p>
                    <img style="" src="<?php echo get_template_directory_uri(); ?>/images/defaults/image023.jpg" alt="slider_menu" />
                    <div style=""></div>
                    <p><strong>Title:</strong> Enter the title of the slide in the first post.</p>

<p><strong>Slide Image:</strong> Upload the image of the slide in this box. Click on "Set featured image". A pop-up window will appear. Click on Select files button and select your slide image. After uploading the file click on the "Use as featured image" button.<br />
For Easyslider - The dimension of your slider image should be 960px by 300px.<br />
</p>

<p><strong>Excerpt:</strong> Write the slide description here. Keep it within 2 lines.</p>

<p><strong>Link:</strong> Set the link of the slide here. This link will be integrated with slide's title. The link can be internal or external. If you want to link a slide to one of your posts, put the link of the post here.</p>
                
                  </div>
                
                
                <div class="tab_option" id="sub_log">
                <h3>Triton Widgets</h3>
                
                <img src="<?php echo get_template_directory_uri(); ?>/images/defaults/widgets.jpg" alt="widgets" />


<h4>1. Featured Posts</h4>
<p>Featured Posts displays specified number of posts from a specified category in your sidebars. The Options for this widget are:<br />
<strong>Title:</strong> Set the title of the widget.<br />
<strong>Category of Posts:</strong> Select the category of the featured posts<br />
<strong>Number of Posts:</strong> Default is 3; increase the number if you want more than 3 posts to show up in the widget.</p>


<h4>2. Popular Posts</h4>
<p>Popular Posts widget displays number of popular posts in the sidebar. There are two options to set:<br />
<strong>Title:</strong> Set the title of the widget.<br />
<strong>Number of Posts:</strong> Default is 3; increase the number if you want more than 3 posts to show up in the widget.</p>



<h4>3. Random Posts</h4>
<p>Random Posts widget displays number of random posts in the sidebar. There are two options to set:<br />
<strong>Title:</strong> Set the title of the widget.<br />
<strong>Number of Posts:</strong> Default is 3; increase the number if you want more than 3 posts to show up in the widget.</p>

                
                </div>
                
                <div class="tab_option" id="sub_shrt">
                <h3>Triton Shortcodes</h3>        
                <ul style="float:left; margin-bottom:20px;">
				<li>Quotes</li>
				<li>Youtube Video Shortcode</li>
				<li>Vimeo Video Shortcode</li>
				<li>Facebook Like Button</li>    
                <li>Custom Button</li>
				</ul>
                <img class="alignright" style=" width:400px; height:auto;" src="<?php echo get_template_directory_uri(); ?>/images/defaults/image025.jpg" alt="slider_menu" /> 
                
                <h3 style="clear:both;">Shortcodes Usage</h3>
                
                <h3>Custom Button Shortcode</h3>
                
                <p>Write your button text and select the text then click the <img src="<?php echo get_template_directory_uri(); ?>/images/defaults/image026.png" alt="quote" /> button. It will Produce this:<br />
                
                [button url="http://www.google.com"]Button Text[/button]<br />
				
                Change the value of the url from http://www.google.com to your own url.
                
                </p>
                

                <h3>Quote Shortcode</h3>
Click the quote <img src="<?php echo get_template_directory_uri(); ?>/images/defaults/image051.png" alt="quote" /> icon in the post editor to add quote.<br />
[quote]Your quote.[/quote]
                    
                    
                   <h3>Facebook like Button</h3>
                   To add facebook like button click on the <img src="<?php echo get_template_directory_uri(); ?>/images/defaults/image070.png" alt="adsense" />  button, this will add [fblike]
                   
                   <h3>Youtube Video Shortcode</h3>
                   Click on the <img src="<?php echo get_template_directory_uri(); ?>/images/defaults/image066.png" alt="youtube" /> button to add youtube video.<br />
                   [youtube width="640" height="385" video_id=""]<br />
                   In width set the width and in height set the height of your video. The default is 640x385 . In video Id put your youtube video ID.
                   
                   <h3>Vimeo Video Shortcode</h3>
                   Click the <img src="<?php echo get_template_directory_uri(); ?>/images/defaults/image068.png" alt="vimeo" /> button to add vimeo video.<br />
					[vimeo width="640" height="385" video_id=""]<br />
In width set the width and in height set the height of your video. The default is 640x385. In video Id put your youtube video ID.
                                    
                                
                </div>
                
                <div class="tab_option" id="sub_misc"> 
                
                   <h3>The Post Thumbnails</h3>
                   <p>The post thumbnails of Triton works this way: If a post doesn't have a "Featured Image" set, it will search for attached Image of the post and  display it, if the post doesn't have an attached image too the default blank image will be displayed.<br /><br />
                   
                   To set the Featured Image of a post go to Post edtior page and at the right side of the post editor, you will find the Featured Image box. Upload the featured Image and click "use as featured image" link after uploading.
                   </p>
                        
                	<h3>Setting Up The Menu</h3>
                   <p>One of the coolest new features in WordPress 3.0 is the custom navigation menus built into the WordPress core. </p>
                   
                   <p>Triton has two menu poisitions:</p>
                   <ol>
                    <li>Primary Navigation</li>
                    <li>Footer Navigation</li>
                    </ol>
                   
                   <p>Don Campbell <a target="_blank" style=" color:#21759B;" href="http://www.expand2web.com/blog/wordpress-30-custom-navigation-menus-video/">Described How to setup your own menu using the Wordpress 3 Menu feature</a>. 
                   
                   </p><br />

                   
                   <h3>Setting Up The Page Templates</h3>
                   <p>Triton has 3 Page Templates:</p>
                   <ol>
                    <li>Contact Page</li>
                    <li>Page with Left Sidebar</li>
                    <li>Page with No Sidebar</li>
                    </ol>
                   <p>You can select page templates only for Pages. To set up page template for a page in the page editor on the right side you will find a box called "Page Attributes". Select any one from the 3 templates from the <b>Template</b> drop-down menu.<br /><br />
                   <small><b>Note:</b>The Contact page does not require any 3rd party plugin or anything. Just select the page template and when people sends messgae through the contact form it will be sent directly to your email(the one you used to setup wordpress) within seconds.</small>
                   
                   </p> 
                   
                
                  </div>
                
                
                </div>
            </div> 
            
            <div id="tab_abt">
            <div class="tab" id="tab-7">
                    <div class="tab_sub_menu">
                    <ul>
                    <li><a href="#sub_theme">About the Theme</a></li>
                    <li><a href="#sub_dev">About Developer</a></li>
                    </ul>
                    </div>
                    
                  <div class="tab_option" id="sub_theme">
                  <h4><label>About the theme</label></h4>
            <p>Triton is a wordpress 3 theme with awesome skins, fonts, slider, layouts &amp; easy to use theme option panel.</p>
            <ul style="margin-top:10px; margin-left:10px; list-style-type:circle;">
            <li style="float:none; background:none; border:none; padding:0; margin:0; display:list-item;"><a style=" color:#21759B;" href="http://www.towfiqi.com/triton-lite-free-wordpress-theme.html" target="_blank">Triton Lite(Free)</a></li>
            <li style="float:none; background:none; border:none; padding:0; margin:0; display:list-item;"><a style=" color:#21759B;" href="http://www.towfiqi.com/triton-pro-wordpress-theme.html" target="_blank">Triton  Pro(Commercial)</a></li>
            </ul>
            
                        <p>Both of the themes are licensed under <a style=" color:#21759B;" href="http://www.gnu.org/licenses/old-licenses/gpl-2.0.html">GNU General Public License v2 </a></p>
                	</div>
                
                <div class="tab_option" id="sub_dev">        
                 <h4><label>About Developer </label></h4>
                 <strong>Towfiq I. </strong><br />
                 This Theme is designed and devloped by <a style=" color:#21759B;" href="http://www.towfiqi.com/">Towfiq I.</a><br />
            
            <p>For update and support refer to any of these pages:
            <ul>
            <li><a style=" color:#21759B;" target="_blank" href="http://www.facebook.com/pages/Towfiq-I/180981878579536">Facebook</a></li>
            <li><a style=" color:#21759B;" target="_blank" href="http://www.twitter.com/towfiqi">Twitter</a></li>
            <li><a style=" color:#21759B;" target="_blank" href="http://www.towfiqi.com/">Website</a></li>
            </ul>
            </p>
            
			</div>
            
            
                
                </div>
                
                </div>

            
<div id="tab_upg">
                <div class="tab" id="tab-8">
                    <div class="tab_sub_menu">
                    <ul>
                    <li><a href="#sub_feat">Triton PRO Features</a></li>
                    <li><a href="#sub_get">Upgrade to PRO</a></li>
                    </ul>
                    </div>
                    
                  <div class="tab_option" id="sub_feat">
                  <h4><label>Triton PRO Features </label></h4>
                  <p>Here are the features comparison between Triton Lite and Triton PRO</p>
 <table id="compare" border="1" cellpadding="0" cellspacing="0">
<tbody>
<tr class="head">
<td valign="top" ></td>
<td valign="top" class="lite_top" ><p><b>Triton Lite</b></p></td>
<td valign="top" class="pro_top" ><p><b>Triton PRO</b></p></td>
</tr>

<tr>
<td valign="top" class="feat" ><p><b>Skins</b></p></td>
<td valign="top" class="lite" ><p>0</p></td>
<td valign="top" class="pro" ><p><strong>Unlimited</strong><br />
<small>(Ability to change the color of almost all the elements)</small></p></td>
</tr>

<tr>
<td valign="top" class="feat" ><p><b>Custom Background</b></p></td>
<td valign="top" class="lite" ><p class="no">NO</p></td>
<td valign="top" class="pro" ><p class="yes">YES</p></td>
</tr>

<tr>
<td valign="top" class="feat" ><p><b>Fonts</b></p></td>
<td valign="top" class="lite" ><p>3</p></td>
<td valign="top" class="pro" ><p><strong>12</strong></p></td>
</tr>

<tr>
<td valign="top" class="feat" ><p><b>Patterns</b></p></td>
<td valign="top" class="lite" ><p>2</p></td>
<td valign="top" class="pro" ><p><strong>8</strong></p></td>
</tr>

<tr>
<td valign="top" class="feat" ><p><b>Layouts</b></p></td>
<td valign="top" class="lite" ><p>1</p></td>
<td valign="top" class="pro" ><p><strong>3</strong></p></td>
</tr>

<tr>
<td valign="top" class="feat" ><p><b>Slider</b></p></td>
<td valign="top" class="lite" ><p>1</p></td>
<td valign="top" class="pro" ><p><strong>2</strong></p></td>
</tr>

<tr>
<td valign="top" class="feat" ><p><b>Shortcodes</b></p></td>
<td valign="top" class="lite" ><p>5</p></td>
<td valign="top" class="pro" ><p><strong>20</strong></p></td>
</tr>

<tr>
<td valign="top" class="feat" ><p><b>Widgets</b></p></td>
<td valign="top" class="lite" ><p>3</p></td>
<td valign="top" class="pro" ><p><strong>8</strong></p></td>
</tr>


<tr>
<td valign="top" class="feat" ><p><b>Widget Areas</b></p></td>
<td valign="top" class="lite" ><p>Sidebar Widgets/ Middle Row Widgets/ Footer Widgets</p></td>
<td valign="top" class="pro" ><p>Sidebar Widgets/ Middle Row Widgets/ Footer Widgets</p></td>
</tr>

<tr>
<td valign="top" class="feat" ><p><b>Menu</b></p></td>
<td valign="top" class="lite" ><p>1 Menu Positions/ 3 Level Drop-down Menu</p></td>
<td valign="top" class="pro" ><p>1 Menu Positions/ 3 Level Drop-down Menu</p></td>
</tr>

<tr>
<td valign="top" class="feat" ><p><b>Page Templates</b></p></td>
<td valign="top" class="lite" ><p>3</p></td>
<td valign="top" class="pro" ><p>3</p></td>
</tr>

<tr>
<td valign="top" class="feat" ><p><b>Upload LOGO</b></p></td>
<td valign="top" class="lite" ><p class="no">NO</p></td>
<td valign="top" class="pro" ><p class="yes">YES</p></td>
</tr>

<tr>
<td valign="top" class="feat" ><p><b>Social Share buttons/Numbered Page Navigation</b></p></td>
<td valign="top" class="lite" ><p class="yes">YES</p></td>
<td valign="top" class="pro" ><p class="yes">YES</p></td>
</tr>


<tr>
<td valign="top" class="feat" ><p><b>Related Posts</b></p></td>
<td valign="top" class="lite" ><p class="no">NO</p></td>
<td valign="top" class="pro" ><p class="yes">YES</p></td>
</tr>


<tr>
<td valign="top" class="feat" ><p><b>Google Analytics <br />
Integration</b></p></td>
<td valign="top" class="lite" ><p class="no">NO</p></td>
<td valign="top" class="pro" ><p class="yes">YES</p></td>
</tr>


<tr>
<td valign="top" class="feat" ><p><b>Threaded comments/Separated Comments &amp; Trackbacks</b></p></td>
<td valign="top" class="lite" ><p class="yes">YES</p></td>
<td valign="top" class="pro" ><p class="yes">YES</p></td>
</tr>

<tr>
<td valign="top" class="feat" ><p><b>IE6 Browser Upgrade Alert!</b></p></td>
<td valign="top" class="lite" ><p class="yes">YES</p></td>
<td valign="top" class="pro" ><p class="yes">YES</p></td>

</tr>

<tr>
<td valign="top" class="feat" ><p><b>Fancy lightbox</b></p></td>
<td valign="top" class="lite" ><p class="yes">YES</p></td>
<td valign="top" class="pro" ><p class="yes">YES</p></td>
</tr>

<tr>
<td valign="top" class="feat" ><p><b>Full Email support</b></p></td>
<td valign="top" class="lite" ><p class="no">NO</p></td>
<td valign="top" class="pro" ><p class="yes">YES</p></td>
</tr>

<tr>
<td valign="top" class="feat" ><p><b>Forum support</b></p></td>
<td valign="top" class="lite" ><p class="no">NO</p></td>
<td valign="top" class="pro" ><p class="yes">YES</p></td>
</tr>

</tbody>
</table>

                 

             
                	</div>
                
                <div class="tab_option" id="sub_get">        
                 <h4><label>Upgrade to Triton PRO </label></h4>
<p>You are currently using Triton Lite. <a style="color:#a53c2e;" href="http://www.towfiqi.com/triton-pro-wordpress-theme.html" target="_blank">Upgrade</a> to Triton PRO</p>
                
                </div>
                
                </div>
                </div>            
           	
            <p class="submit">
			<input type="submit" value="<?php _e('Save Changes', 'Triton') ?>" />
			</p>

</form>


</div></div>
<?php

}

function trt_validate_options($trt_options){
//start checking options

//sanitise input fields, make sure no html tags!
$trt_options['trt_slider_speed'] = wp_filter_nohtml_kses($trt_options['trt_slider_speed']);
$trt_options['trt_fb_url'] = wp_filter_nohtml_kses($trt_options['trt_fb_url']);
$trt_options['trt_tw_url'] = wp_filter_nohtml_kses($trt_options['trt_tw_url']);
$trt_options['trt_ms_url'] = wp_filter_nohtml_kses($trt_options['trt_ms_url']);
$trt_options['trt_ytb_url'] = wp_filter_nohtml_kses($trt_options['trt_ytb_url']);
$trt_options['trt_flckr_url'] = wp_filter_nohtml_kses($trt_options['trt_flckr_url']);
$trt_options['trt_rss_url'] = wp_filter_nohtml_kses($trt_options['trt_rss_url']);
$trt_options['trt_gplus_url'] = wp_filter_nohtml_kses($trt_options['trt_gplus_url']);
$trt_options['trt_logo'] = wp_filter_nohtml_kses($trt_options['trt_logo']);
$trt_options['trt_fav'] = wp_filter_nohtml_kses($trt_options['trt_fav']);
$trt_options['trt_foot'] = wp_filter_nohtml_kses($trt_options['trt_foot']);
$trt_options['trt_mid_color'] = wp_filter_nohtml_kses($trt_options['trt_mid_color']);
$trt_options['trt_head_color'] = wp_filter_nohtml_kses($trt_options['trt_head_color']);
$trt_options['trt_foot_color'] = wp_filter_nohtml_kses($trt_options['trt_foot_color']);


$trt_options['trt_primtxt_color'] = wp_filter_nohtml_kses($trt_options['trt_primtxt_color']);



//Hide Social Sanitizing!
if ( ! isset( $trt_options['trt_hide_social'] ) )
$trt_options['trt_hide_social'] = null;
$trt_options['trt_hide_social'] = ( $trt_options['trt_hide_social'] == 1 ? 1 : 0 );	
//Twitter Sanitizing!
if ( ! isset( $trt_options['trt_hide_tw'] ) )
$trt_options['trt_hide_tw'] = null;
$trt_options['trt_hide_tw'] = ( $trt_options['trt_hide_tw'] == 1 ? 1 : 0 );
//Facebook Sanitizing!
if ( ! isset( $trt_options['trt_hide_fb'] ) )
$trt_options['trt_hide_fb'] = null;
$trt_options['trt_hide_fb'] = ( $trt_options['trt_hide_fb'] == 1 ? 1 : 0 );
//Myspace Sanitizing!
if ( ! isset( $trt_options['trt_hide_ms'] ) )
$trt_options['trt_hide_ms'] = null;
$trt_options['trt_hide_ms'] = ( $trt_options['trt_hide_ms'] == 1 ? 1 : 0 );
//RSS Sanitizing!
if ( ! isset( $trt_options['trt_hide_rss'] ) )
$trt_options['trt_hide_rss'] = null;
$trt_options['trt_hide_rss'] = ( $trt_options['trt_hide_rss'] == 1 ? 1 : 0 );
//Flickr Sanitizing!
if ( ! isset( $trt_options['trt_hide_flckr'] ) )
$trt_options['trt_hide_flckr'] = null;
$trt_options['trt_hide_flckr'] = ( $trt_options['trt_hide_flckr'] == 1 ? 1 : 0 );
//Youtube Sanitizing!
if ( ! isset( $trt_options['trt_hide_ytb'] ) )
$trt_options['trt_hide_ytb'] = null;
$trt_options['trt_hide_ytb'] = ( $trt_options['trt_hide_ytb'] == 1 ? 1 : 0 );
//Google Plus Sanitizing!
if ( ! isset( $trt_options['trt_hide_gplus'] ) )
$trt_options['trt_hide_gplus'] = null;
$trt_options['trt_hide_gplus'] = ( $trt_options['trt_hide_gplus'] == 1 ? 1 : 0 );

//Disable Default Logo Sanitizing!
if ( ! isset( $trt_options['trt_diss_logo'] ) )
$trt_options['trt_diss_logo'] = null;
$trt_options['trt_diss_logo'] = ( $trt_options['trt_diss_logo'] == 1 ? 1 : 0 );
//Disable Post Social Share Sanitizing!
if ( ! isset( $trt_options['trt_diss_sss'] ) )
$trt_options['trt_diss_sss'] = null;
$trt_options['trt_diss_sss'] = ( $trt_options['trt_diss_sss'] == 1 ? 1 : 0 );

//Disable Fancybox Plugin Sanitizing!
if ( ! isset( $trt_options['trt_diss_fbx'] ) )
$trt_options['trt_diss_fbx'] = null;
$trt_options['trt_diss_fbx'] = ( $trt_options['trt_diss_fbx'] == 1 ? 1 : 0 );

//Disable Midrow Sanitizing!
if ( ! isset( $trt_options['trt_diss_ftw'] ) )
$trt_options['trt_diss_ftw'] = null;
$trt_options['trt_diss_ftw'] = ( $trt_options['trt_diss_ftw'] == 1 ? 1 : 0 );

//Disable Blog Description!
if ( ! isset( $trt_options['trt_description'] ) )
$trt_options['trt_description'] = null;
$trt_options['trt_description'] = ( $trt_options['trt_description'] == 1 ? 1 : 0 );
//Align Logo to Left!
if ( ! isset( $trt_options['trt_lft_logo'] ) )
$trt_options['trt_lft_logo'] = null;
$trt_options['trt_lft_logo'] = ( $trt_options['trt_lft_logo'] == 1 ? 1 : 0 );
//Hide Date and Author name
if ( ! isset( $trt_options['trt_diss_date'] ) )
$trt_options['trt_diss_date'] = null;
$trt_options['trt_diss_date'] = ( $trt_options['trt_diss_date'] == 1 ? 1 : 0 );
//Hide Date and tags
if ( ! isset( $trt_options['trt_diss_cats'] ) )
$trt_options['trt_diss_cats'] = null;
$trt_options['trt_diss_cats'] = ( $trt_options['trt_diss_cats'] == 1 ? 1 : 0 );

//do checking for all options

return $trt_options;

}
?>
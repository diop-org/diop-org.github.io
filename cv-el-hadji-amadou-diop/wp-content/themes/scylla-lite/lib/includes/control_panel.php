<?php
/**
Plugin Name: Scylla Settings
Description: Theme Options for Scylla
Author: Towfiq I.
Version: 1.7
Author URI: http//towfiqi.com
*/

// Hook for adding admin menus
add_action('admin_menu', 'scl_add_option_page');
if ( isset( $_GET['page'] ) && $_GET['page'] == 'scl_option' ) {
	$file_dir=get_bloginfo('template_directory');
	wp_enqueue_style("functions", $file_dir."/css/control_panel.css", false, "1.0", "all");
	wp_enqueue_script("scl_script", $file_dir."/js/control_panel.js", false);
}

function scl_admin_scripts() {
$file_dir=get_bloginfo('template_directory');
wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
}

function scl_admin_styles() {
wp_enqueue_style('thickbox');
}

function scl_add_option_page(){

add_theme_page('Scylla Lite Theme Options','Scylla Lite Options','edit_theme_options','scl_option','scl_theme_option');

register_setting('scl_theme_options','scl_options','scl_validate_options');

}

function scl_theme_option(){

	//This will show any settings error or success message
	$error = get_settings_errors('scl_options');
	
	if(!empty($error)){
	echo '<div id="message" class="updated fade"><strong>';
	echo '<h3>The following errors are found</h3><ol>';
	foreach($error as $e){
	echo '<li>'.$e[message].'</li>';
	}
	echo '</ol></strong></div>';
	
	}else{
	echo '<div id="message" class="updated fade"><p><strong>Scylla Settings saved.</strong></p></div>';
	}

?>
<div class='wrap'>
<div id="tabs" class="options">
<div id="control_panel_header"><div id="control_logo"><a>Scylla <?php _e('Options', 'scylla');?></a></div>
   <ul>
     <li class="tab_gen"><a href="#tab-1">General</a></li>
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
			<?php settings_fields('scl_theme_options'); ?>
			
			<?php $options = get_option('scl_options'); ?>
            <div id="tab_gen">
                <div class="tab" id="tab-1">
                    <div class="tab_sub_menu">
                    <ul><li><a href="#sub_gen">Appearance</a></li><li><a href="#sub_foot">Footer</a></li></ul>
                    </div>
                  <div class="tab_option" id="sub_gen">         
                <h4><label>Skin</label></h4>
                
                <p class="divider">
                <label>Select a skin from the list</label>
                <?php
                
                $items = array("Default", "Spring", "Vintage", "Corporate");
                
                echo "<select name='scl_options[scl_style]'>";
                foreach($items as $item) {
                    ?>
<option value="<?php echo $item; ?>" <?php selected( $options['scl_style'], $item ); ?> /><?php echo $item; ?></option>
<?php
                }
                echo "</select>";
                
                ?>
                
                </p>
                
    
 

                
                <h4><label>Pattern</label></h4>
                
                <p class="divider">
                <label>Select a background pattern</label>
                <?php
                
                $items = array("pattern1", "pattern2");
                
                echo "<select name='scl_options[scl_patterns]'>";
                foreach($items as $item) {
                    ?>
<option value="<?php echo $item; ?>" <?php selected( $options['scl_patterns'], $item ); ?> ><?php echo $item; ?></option>
<?php
                }
                echo "</select>";
                
                ?>
                </p>

                
                <h4><label>Font</label></h4>
                <p class="divider">
                <label>Select a font from the list</label>
                <?php
                
                $items = array("Arial", "Lobster", "Yanone_kaffeesatz");
                
                echo "<select name='scl_options[scl_fonts]'>";
                foreach($items as $item) {
                    ?>
<option value="<?php echo $item; ?>" <?php selected( $options['scl_fonts'], $item ); ?> ><?php echo $item; ?></option>
<?php
                }
                echo "</select>";
                
                ?>
                </p>

                
                </div>
                
                
                <div class="tab_option" id="sub_foot">
                        
                <h4><label>Footer</label></h4>
                <p class="divider"><label>Footer Text</label><br />
                <textarea class="intro_text" name="scl_options[scl_foot]" rows="5" cols="50"><?php echo esc_textarea($options['scl_foot']); ?></textarea>
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
                $items = array("Layout 1", "Layout 2");
                
                echo "<select name='scl_options[scl_lay]'>";
                foreach($items as $item) {
                    ?>
<option value="<?php echo $item; ?>" <?php selected( $options['scl_lay'], $item ); ?> ><?php echo $item; ?></option>
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
                            <input name="scl_options[scl_hide_social]" type="checkbox" value="1" <?php if (isset($options['scl_hide_social'])) {checked('1', $options['scl_hide_social']);		} ?> /></p>
                            
            <p class="divider">
            <label>Facebook url</label>
            <input type="text" name="scl_options[scl_fb_url]" value="<?php echo esc_attr( $options['scl_fb_url']); ?>" style="width:300px" />
<br /> 
            <small>Hide Facebook Icon</small>
			<input name="scl_options[scl_hide_fb]" type="checkbox" value="1" <?php if (isset($options['scl_hide_fb'])) {checked('1', $options['scl_hide_fb']);		} ?> /></p>
            
            <p class="divider">
            <label>Twitter url</label>
            <input type="text" name="scl_options[scl_tw_url]" value="<?php echo esc_attr( $options['scl_tw_url']); ?>" style="width:300px" />
<br />            
            <small>Hide Twitter Icon</small>
			<input name="scl_options[scl_hide_tw]" type="checkbox" value="1" <?php if (isset($options['scl_hide_tw'])) {checked('1', $options['scl_hide_tw']);		} ?> /></p>
            
   			<p class="divider">
            <label>Myspace url </label>
            <input type="text" name="scl_options[scl_ms_url]" value="<?php echo esc_attr($options['scl_ms_url']); ?>" style="width:300px" />
<br />                       
            <small>Hide Myspace Icon</small>
			<input name="scl_options[scl_hide_ms]" type="checkbox" value="1" <?php if (isset($options['scl_hide_ms'])) {checked('1', $options['scl_hide_ms']);		} ?> /></p>
            
            <p class="divider">
            <label>Youtube url</label>
            <input type="text" name="scl_options[scl_ytb_url]" value="<?php echo esc_attr($options['scl_ytb_url']); ?>" style="width:300px" />
<br />
            <small>Hide Youtube Icon</small>
			<input name="scl_options[scl_hide_ytb]" type="checkbox" value="1" <?php if (isset($options['scl_hide_ytb'])) {checked('1', $options['scl_hide_ytb']);		} ?> /></p>
            
            
            <p class="divider">
            <label>Flickr url</label>
            <input type="text" name="scl_options[scl_flckr_url]" value="<?php echo esc_attr($options['scl_flckr_url']); ?>" style="width:300px" /><br />
 
            <small>Hide Flickr Icon</small>
			<input name="scl_options[scl_hide_flckr]" type="checkbox" value="1" <?php if (isset($options['scl_hide_flckr'])) {checked('1', $options['scl_hide_flckr']);		} ?> /></p>
            
            <p class="divider">
            <label>RSS url</label>
            <input type="text" name="scl_options[scl_rss_url]" value="<?php 
                
                if(empty($options['scl_rss_url'])){
                echo esc_attr(''.home_url().'/?feed=rss2');
                }else{
                echo esc_attr($options['scl_rss_url']);} ?>" style="width:300px" /><br />
			 <small>Hide RSS Icon</small>
			<input name="scl_options[scl_hide_rss]" type="checkbox" value="1" <?php if (isset($options['scl_hide_rss'])) {checked('1', $options['scl_hide_rss']);		} ?> /></p><br />

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
                
                $items = array( "Easyslider");
                
                echo "<select name='scl_options[scl_slider]'>";
                foreach($items as $item) {
                    ?>
<option value="<?php echo $item; ?>" <?php selected( $options['scl_slider'], $item ); ?> ><?php echo $item; ?></option>
<?php
                }
                echo "</select>";
                
                ?><br />
                <small>Only For layout 1 &amp; 2</small>
                </p>
                
                <p class="divider">
                <label>Slider Speed</label>
                <input type="text" name="scl_options[scl_slider_speed]" value="<?php 
                
                if(empty($options['scl_slider_speed'])){
                echo esc_attr('3000');
                }else{
                echo esc_attr($options['scl_slider_speed']);} 
                
                ?>" style="width:100px" />
                </p>
                
                <p class="divider">
                <label>Number of Slides</label>
                <?php
                
                $items = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10");
                
                echo "<select name='scl_options[scl_num_sld]'>";
                foreach($items as $item) {
?>
<option value="<?php echo $item; ?>" <?php selected( $options['scl_num_sld'], $item ); ?> ><?php echo $item; ?></option>
<?php
                }
                echo "</select>";
                
                ?>
                </p>
                
                <p class="divider">
                <label>Ribbon Text</label>
                <input type="text" name="scl_options[scl_rbn_txt]" value="<?php 
                
                if(empty($options['scl_rbn_txt'])){
                echo esc_attr('Featured');
                }else{
                echo esc_attr($options['scl_rbn_txt']);} 
                
                ?>" style="width:100px" />
                </p>
                
                <p class="divider">
                <label>Disable Ribbon </label>
                <input name="scl_options[scl_diss_rbn]" type="checkbox" value="1" <?php if (isset($options['scl_diss_rbn'])) {checked('1', $options['scl_diss_rbn']);		} ?> /></p>
    
                
                </div></div>
            </div>
            
            
            
            <div id="tab_misc">
                <div class="tab" id="tab-5">
                    <div class="tab_sub_menu">
                    <ul>
                    <li><a href="#sub_post">Post Settings</a></li>
                    <li><a href="#sub_plug">Other</a></li>
                    </ul>
                    </div>
                    
                  <div class="tab_option" id="sub_post">         
                
                <h4><label>Post Page Settings</label></h4>
                <p class="divider">
                <label style=" font-size:12px; margin:5px 0px;">Disable Date Badge</label>
                <input name="scl_options[scl_diss_date]" type="checkbox" value="1" <?php if (isset($options['scl_diss_date'])) {checked('1', $options['scl_diss_date']);		} ?> />
                
                </p>

                <p class="divider">
                <label style=" font-size:12px; margin:5px 0px;">Disable Social Share</label>
                <input name="scl_options[scl_diss_sss]" type="checkbox" value="1" <?php if (isset($options['scl_diss_sss'])) {checked('1', $options['scl_diss_sss']);		} ?> />
                
                </p>

                
                </p>

                
                
                </div>
                
                <div class="tab_option" id="sub_plug"> 
                <h4><label>Plugins</label> </h4>

                <p class="divider">
                <label style=" font-size:12px; margin:5px 0px;">Disable Fancybox Plugin</label>
                <input name="scl_options[scl_diss_fbx]" type="checkbox" value="1" <?php if (isset($options['scl_diss_fbx'])) {checked('1', $options['scl_diss_fbx']);		} ?> />
                
                </p>
                
                <h4><label>Site Description Settings</label> </h4>
                <p class="divider">
                <label style=" font-size:12px; margin:5px 0px;">Show Site Discription Under Logo</label>
                <input name="scl_options[scl_description]" type="checkbox" value="1" <?php if (isset($options['scl_description'])) {checked('1', $options['scl_description']);	} ?> />
                
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
                    <p>Scylla comes with unique and easy to use slider. To set up slider go to Slider> Add New</p>
                    <img class="alignright" style="" src="<?php echo get_template_directory_uri(); ?>/images/defaults/image021.gif" alt="slider_menu" />
                	<p><strong>In the "Add New Slide" page there are 4 Boxes:</strong></p>
                    <img style="" src="<?php echo get_template_directory_uri(); ?>/images/defaults/image023.jpg" alt="slider_menu" />
                    <div style=""></div>
                    <p><strong>Title:</strong> Enter the title of the slide in the first post.</p>

<p><strong>Slide Image:</strong> Upload the image of the slide in this box. Click on "Set featured image". A pop-up window will appear. Click on Select files button and select your slide image. After uploading the file click on the "Use as featured image" button.<br />
For Layout -1 &amp; 2 The dimension of your slider image should be 625px by 250px.<br />
For layout 4 the Image height should be 560 and the width can be of any size<br />
For layout 5 use image 640 x 480px , 800 x 600 px , 1024 x 768px etc..
</p>

<p><strong>Excerpt:</strong> Write the slide description here. Keep it within 2 lines.</p>

<p><strong>Link:</strong> Set the link of the slide here. This link will be integrated with slide's title. The link can be internal or external. If you want to link a slide to one of your posts, put the link of the post here.</p>
                
                  </div>
                
                
                <div class="tab_option" id="sub_log">
                <h3>Scylla Widgets</h3>
                
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
                <h3>Scylla Shortcodes</h3>        
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
                   <p>The post thumbnails of Scylla works this way: If a post doesn't have a "Featured Image" set, it will search for attached Image of the post and  display it, if the post doesn't have an attached image too the default blank image will be displayed.<br /><br />
                   
                   To set the Featured Image of a post go to Post edtior page and at the right side of the post editor, you will find the Featured Image box. Upload the featured Image and click "use as featured image" link after uploading.
                   </p>
                        
                	<h3>Setting Up The Menu</h3>
                   <p>One of the coolest new features in WordPress 3.0 is the custom navigation menus built into the WordPress core. </p>
                   
                   <p>Scylla has two menu poisitions:</p>
                   <ol>
                    <li>Primary Navigation</li>
                    <li>Footer Navigation</li>
                    </ol>
                   
                   <p>Don Campbell <a target="_blank" style=" color:#21759B;" href="http://www.expand2web.com/blog/wordpress-30-custom-navigation-menus-video/">Described How to setup your own menu using the Wordpress 3 Menu feature</a>. 
                   
                   </p><br />

                   
                   <h3>Setting Up The Page Templates</h3>
                   <p>Scylla has 3 Page Templates:</p>
                   <ol>
                    <li>Contact Page</li>
                    <li>Page with Left Sidebar</li>
                    <li>Page with Right Sidebar</li>
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
            <p>Scylla is a wordpress 3 theme with awesome skins, fonts, slider, layouts &amp; easy to use theme option panel. </p>
            <ul style="margin-top:10px; margin-left:10px; list-style-type:circle;">
            <li style="float:none; background:none; border:none; padding:0; margin:0; display:list-item;"><a style=" color:#21759B;" href="http://www.towfiqi.com/scylla-lite-free-wordpress-theme.html" target="_blank">Scylla Lite(Free)</a></li>
            <li style="float:none; background:none; border:none; padding:0; margin:0; display:list-item;"><a style=" color:#21759B;" href="http://www.towfiqi.com/scylla-pro-wordpress-theme.html" target="_blank">Scylla  Pro(Commercial)</a></li>
            </ul>
            
                        <p>Both of the themes are licensed under <a style=" color:#21759B;" href="http://www.gnu.org/licenses/old-licenses/gpl-2.0.html">GNU General Public License v2 </a></p>
                	</div>
                
                <div class="tab_option" id="sub_dev">        
                 <h4><label>About Developer </label></h4>
                 <strong>Towfiq I. </strong><br />
                 This Theme is designed and devloped by <a style=" color:#21759B;" href="http://www.towfiqi.com/">Towfiq I.</a><br />
            
            <p>For update and support refer to any these pages:
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
                    <li><a href="#sub_feat">ScyllaPRO Features</a></li>
                    <li><a href="#sub_get">Upgrade to PRO</a></li>
                    </ul>
                    </div>
                    
                  <div class="tab_option" id="sub_feat">
                  <h4><label>Scylla PRO Features </label></h4>
                  <p>Here are the features comparison between Scylla Lite and Scylla PRO</p>
 <table id="compare" border="1" cellpadding="0" cellspacing="0">
<tbody>
<tr class="head">
<td valign="top" ></td>
<td valign="top" class="lite" ><p><b>Scylla Lite</b></p></td>
<td valign="top" class="pro" ><p><b>Scylla PRO</b></p></td>
</tr>

<tr>
<td valign="top" class="feat" ><p><b>Skins</b></p></td>
<td valign="top" class="lite" ><p>4</p></td>
<td valign="top" class="pro" ><p><strong>Unlimited</strong><br />
<small>(Ability to change the color of every element)</small></p></td>
</tr>

<tr>
<td valign="top" class="feat" ><p><b>Fonts</b></p></td>
<td valign="top" class="lite" ><p>3</p></td>
<td valign="top" class="pro" ><p><strong>12</strong></p></td>
</tr>

<tr>
<td valign="top" class="feat" ><p><b>Patterns</b></p></td>
<td valign="top" class="lite" ><p>2</p></td>
<td valign="top" class="pro" ><p><strong>10</strong></p></td>
</tr>

<tr>
<td valign="top" class="feat" ><p><b>Layouts</b></p></td>
<td valign="top" class="lite" ><p>2</p></td>
<td valign="top" class="pro" ><p><strong>5</strong></p></td>
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
<td valign="top" class="lite" ><p>Sidebar Widget</p></td>
<td valign="top" class="pro" ><p>Sidebar + Footer Widget(Sticky)</p></td>
</tr>

<tr>
<td valign="top" class="feat" ><p><b>Menu</b></p></td>
<td valign="top" class="lite" ><p>2 Menu Positions/ 3 Level Drop-down Menu</p></td>
<td valign="top" class="pro" ><p>2 Menu Positions/ 3 Level Drop-down Menu</p></td>
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
                 <h4><label>Upgrade to Scylla PRO </label></h4>
<p>You are currently using Scylla Lite. <a style="color:#5bcd23;" href="http://www.towfiqi.com/scylla-pro-wordpress-theme.html" target="_blank">Upgrade</a> to Scylla PRO</p>
                
                </div>
                
                </div>
                </div>
            
            
            
           	
            <p class="submit">
			<input type="submit" value="<?php _e('Save Changes') ?>" />
			</p>

</form>


</div></div>
<?php

}

function scl_validate_options($scl_options){
//start checking options

//sanitise input fields, make sure no html tags!
$scl_options['scl_slider_speed'] = wp_filter_nohtml_kses($scl_options['scl_slider_speed']);
$scl_options['scl_fb_url'] = esc_url($scl_options['scl_fb_url']);
$scl_options['scl_tw_url'] = esc_url($scl_options['scl_tw_url']);
$scl_options['scl_ms_url'] = esc_url($scl_options['scl_ms_url']);
$scl_options['scl_ytb_url'] = esc_url($scl_options['scl_ytb_url']);
$scl_options['scl_flckr_url'] = esc_url($scl_options['scl_flckr_url']);
$scl_options['scl_rss_url'] = esc_url($scl_options['scl_rss_url']);
$scl_options['scl_foot'] = wp_filter_nohtml_kses($scl_options['scl_foot']);
$scl_options['scl_rbn_txt'] = wp_filter_nohtml_kses($scl_options['scl_rbn_txt']);
$scl_options['scl_foot'] = wp_filter_post_kses( $scl_options['scl_foot'] );



//Hide Social Sanitizing!
if ( ! isset( $scl_options['scl_hide_social'] ) )
$scl_options['scl_hide_social'] = null;
$scl_options['scl_hide_social'] = ( $scl_options['scl_hide_social'] == 1 ? 1 : 0 );	
//Twitter Sanitizing!
if ( ! isset( $scl_options['scl_hide_tw'] ) )
$scl_options['scl_hide_tw'] = null;
$scl_options['scl_hide_tw'] = ( $scl_options['scl_hide_tw'] == 1 ? 1 : 0 );
//Facebook Sanitizing!
if ( ! isset( $scl_options['scl_hide_fb'] ) )
$scl_options['scl_hide_fb'] = null;
$scl_options['scl_hide_fb'] = ( $scl_options['scl_hide_fb'] == 1 ? 1 : 0 );
//Myspace Sanitizing!
if ( ! isset( $scl_options['scl_hide_ms'] ) )
$scl_options['scl_hide_ms'] = null;
$scl_options['scl_hide_ms'] = ( $scl_options['scl_hide_ms'] == 1 ? 1 : 0 );
//RSS Sanitizing!
if ( ! isset( $scl_options['scl_hide_rss'] ) )
$scl_options['scl_hide_rss'] = null;
$scl_options['scl_hide_rss'] = ( $scl_options['scl_hide_rss'] == 1 ? 1 : 0 );
//Flickr Sanitizing!
if ( ! isset( $scl_options['scl_hide_flckr'] ) )
$scl_options['scl_hide_flckr'] = null;
$scl_options['scl_hide_flckr'] = ( $scl_options['scl_hide_flckr'] == 1 ? 1 : 0 );
//Youtube Sanitizing!
if ( ! isset( $scl_options['scl_hide_ytb'] ) )
$scl_options['scl_hide_ytb'] = null;
$scl_options['scl_hide_ytb'] = ( $scl_options['scl_hide_ytb'] == 1 ? 1 : 0 );

//Disable Date Badge Sanitizing!
if ( ! isset( $scl_options['scl_diss_date'] ) )
$scl_options['scl_diss_date'] = null;
$scl_options['scl_diss_date'] = ( $scl_options['scl_diss_date'] == 1 ? 1 : 0 );
//Disable Post Social Share Sanitizing!
if ( ! isset( $scl_options['scl_diss_sss'] ) )
$scl_options['scl_diss_sss'] = null;
$scl_options['scl_diss_sss'] = ( $scl_options['scl_diss_sss'] == 1 ? 1 : 0 );
//Disable Fancybox Plugin Sanitizing!
if ( ! isset( $scl_options['scl_diss_fbx'] ) )
$scl_options['scl_diss_fbx'] = null;
$scl_options['scl_diss_fbx'] = ( $scl_options['scl_diss_fbx'] == 1 ? 1 : 0 );
//Disable Ribbon!
if ( ! isset( $scl_options['scl_diss_rbn'] ) )
$scl_options['scl_diss_rbn'] = null;
$scl_options['scl_diss_rbn'] = ( $scl_options['scl_diss_rbn'] == 1 ? 1 : 0 );
//Disable Blog Description!
if ( ! isset( $scl_options['scl_description'] ) )
$scl_options['scl_description'] = null;
$scl_options['scl_description'] = ( $scl_options['scl_description'] == 1 ? 1 : 0 );

//do checking for all options

return $scl_options;

}
?>
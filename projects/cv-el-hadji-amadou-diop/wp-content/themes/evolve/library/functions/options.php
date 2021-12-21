<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function evolve_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_theme_data(STYLESHEETPATH . '/style.css');
	$themename = $themename['Name'];
	$themename = preg_replace("/\W/", "", strtolower($themename) );
	
	$evolve_settings = get_option('evolve');
	$evolve_settings['id'] = $themename;
	update_option('evolve', $evolve_settings);
	
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function evolve_options() {
	
	// Pull all the categories into an array
	$options_categories = array();  
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
    	$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}
		
// If using image radio buttons, define a directory path
  $imagepath = get_template_directory_uri() . '/library/functions/images/';
  $imagepathfolder = get_template_directory_uri() . '/library/media/images/';
  $evlshortname = "evl";
  $template_url = get_template_directory_uri();
		
	$options = array();
  
  
// Layout

	$options[] = array( "name" => $evlshortname."-tab-1", "id" => $evlshortname."-tab-1",
	"type" => "open-tab");

 
	
	$options[] = array(
		"name" => __( 'Select a layout', 'evolve'  ),
		"desc" => __( 'Select main content and sidebar alignment.', 'evolve'  ),
		"id" => $evlshortname."_layout",
		"std" => "2cl",
		"type" => "images",
		"options" => array(
			'1c' => $imagepath . '1c.png',
			'2cl' => $imagepath . '2cl.png',
			'2cr' => $imagepath . '2cr.png',
			'3cm' => $imagepath . '3cm.png',
			'3cr' => $imagepath . '3cr.png',
      '3cl' => $imagepath . '3cl.png'
			)
		);
    
 $options[] = array(
		"name" => __( 'Width', 'evolve'  ),
		"desc" => __( '<strong>Fixed</strong> = 960px / <strong>Fluid</strong> = 99% width of browser window', 'evolve'  ),
		"id" => $evlshortname."_width_layout",
		"std" => "fixed",
		"type" => "select",
		"options" => array(
			'fixed' => __( 'Fixed &nbsp;&nbsp;&nbsp;(default)', 'evolve'  ),
			'fluid' => __( 'Fluid', 'evolve'  )
			)
		); 
    
    
$options[] = array(  "name" => __( 'Number of widget cols in header', 'evolve'  ),
        "desc" => __( 'Select how many header widget areas you want to display.', 'evolve'  ),
        "id" => $evlshortname."_widgets_header",
        "type" => "images",
        "std" => "disable",
        "options" => array(
			  'disable' => $imagepath . '1c.png',
			  'one' => $imagepath . 'header-widgets-1.png',
        'two' => $imagepath . 'header-widgets-2.png',
        'three' => $imagepath . 'header-widgets-3.png',         
        'four' => $imagepath . 'header-widgets-4.png',
        ));      
    
    
    
$options[] = array(  "name" => __( 'Number of widget cols in footer', 'evolve'  ),
        "desc" => __( 'Select how many footer widget areas you want to display.', 'evolve'  ),
        "id" => $evlshortname."_widgets_num",
        "type" => "images",
        "std" => "disable",
        "options" => array(
			  'disable' => $imagepath . '1c.png',
			  'one' => $imagepath . 'footer-widgets-1.png',
        'two' => $imagepath . 'footer-widgets-2.png',
        'three' => $imagepath . 'footer-widgets-3.png',         
        'four' => $imagepath . 'footer-widgets-4.png',
        ));      
    
  $options[] = array( "name" => $evlshortname."-tab-1", "id" => $evlshortname."-tab-1",
	"type" => "close-tab" );    
  
  
  
// Posts

$options[] = array( "name" => $evlshortname."-tab-2", "id" => $evlshortname."-tab-2",
	"type" => "open-tab"); 
 


$options[] = array(  "name" => __( 'Number of articles per row on home and archive pages - \'post boxes\'', 'evolve'  ),
        "desc" => __( 'Option <strong>2</strong> or <strong>3</strong> is recommended to use with disabled <strong>Sidebar(s)</strong> or enabled <strong>Fluid</strong> width', 'evolve'  ),
        "id" => $evlshortname."_post_layout",
        "type" => "images",
        "std" => "one",
	      "options" => array(
			   'one' => $imagepath . 'one-post.png',
			   'two' => $imagepath . 'two-posts.png',
         'three' => $imagepath . 'three-posts.png',
		   	));
        
$options[] = array(  "name" => __( 'Enable post excerpts with thumbnails', 'evolve'  ),
        "desc" => __( 'Check this box if you want to display post excerpts with post thumbnails on one column posts', 'evolve'  ),
        "id" => $evlshortname."_excerpt_thumbnail",
        "type" => "checkbox",
        "std" => "0");         

$options[] = array(  "name" => __( 'Enable post author avatar', 'evolve'  ),
        "desc" => __( 'Check this box if you want to display post author avatar', 'evolve'  ),
        "id" => $evlshortname."_author_avatar",
        "type" => "checkbox",
        "std" => "1");  
        
$options[] = array(  "name" => __( 'Post meta header placement', 'evolve'  ),
        "desc" => __( 'Choose placement of the post meta header - Date, Author, Comments', 'evolve'  ),
        "id" => $evlshortname."_header_meta",
        "type" => "select",
        "std" => "single_archive",
        "options" => array(
			   'single_archive' => __( 'Single posts + Archive pages &nbsp;&nbsp;&nbsp;(default)', 'evolve'  ),
			   'single' => __( 'Single posts', 'evolve'  ),
         'disable' => __( 'Disable', 'evolve'  )
		   	));  
        
$options[] = array(  "name" => __( '\'Share This\' buttons placement', 'evolve'  ),
        "desc" => __( 'Choose placement of the \'Share This\' buttons', 'evolve'  ),
        "id" => $evlshortname."_share_this",
        "type" => "select",
        "std" => "single",
        "options" => array(
			   'single' => __( 'Single posts &nbsp;&nbsp;&nbsp;(default)', 'evolve'  ),
			   'single_archive' => __( 'Single posts + Archive pages', 'evolve'  ),
         'all' => __( 'All pages', 'evolve'  ),
         'disable' => __( 'Disable', 'evolve'  )
		   	));   
        
$options[] = array(  "name" => __( 'Position of previous/next posts links', 'evolve'  ),
        "desc" => __( 'Choose the position of the <strong>Previous/Next Post</strong> links', 'evolve'  ),
        "id" => $evlshortname."_post_links",
        "type" => "select",
        "std" => "after",
        "options" => array(
			  'after' => __( 'After posts &nbsp;&nbsp;&nbsp;(default)', 'evolve'  ),
			  'before' => __( 'Before posts', 'evolve'  ),
        'both' => __( 'Both', 'evolve'  )
        )); 
        
$options[] = array(  "name" => __( 'Display Similar posts', 'evolve'  ),
        "desc" => __( 'Choose if you want to display <strong>Similar posts</strong> in articles', 'evolve'  ),
        "id" => $evlshortname."_similar_posts",
        "type" => "select",
        "std" => "disable",
        "options" => array(
			  'disable' => __( 'Disable &nbsp;&nbsp;&nbsp;(default)', 'evolve'  ),
			  'category' => __( 'Match by categories', 'evolve'  ),
        'tag' => __( 'Match by tags', 'evolve'  )
        ));                              
 
$options[] = array( "name" => $evlshortname."-tab-2", "id" => $evlshortname."-tab-2",
	"type" => "close-tab" );   


// Subscribe buttons

$options[] = array( "name" => $evlshortname."-tab-3", "id" => $evlshortname."-tab-3",
	"type" => "open-tab");


// RSS Feed
  
$options[] = array(  "name" => __( 'RSS Feed', 'evolve'  ),
        "desc" => __( 'Insert custom RSS Feed URL, e.g. <strong>http://feeds.feedburner.com/Example</strong>', 'evolve'  ),
        "id" => $evlshortname."_rss_feed",
        "type" => "text",
        "std" => ""); 

// Newsletter

$options[] = array(  "name" => __( 'Newsletter', 'evolve'  ),
        "desc" => __( 'Insert custom newsletter URL, e.g. <strong>http://feedburner.google.com/fb/a/mailverify?uri=Example&amp;loc=en_US</strong>', 'evolve'  ),
        "id" => $evlshortname."_newsletter",
        "type" => "text",
        "std" => "");  

// Facebook

$options[] = array(  "name" => __( 'Facebook', 'evolve'  ),
        "desc" => __( 'Insert your Facebook ID. If your Facebook page is <strong>http://facebook.com/Example</strong>, insert only <strong>Example</strong>', 'evolve'  ),
        "id" => $evlshortname."_facebook",
        "type" => "text",
        "std" => "");  

// Twitter
 
$options[] =  array(  "name" => __( 'Twitter', 'evolve'  ),
        "desc" => __( 'Insert your Twitter ID. If your Twitter page is <strong>http://twitter.com/username</strong>, insert only <strong>username</strong>', 'evolve'  ),
        "id" => $evlshortname."_twitter_id",
        "type" => "text",
        "std" => "");  


// MySpace

$options[] = array(  "name" => __( 'MySpace', 'evolve'  ),
        "desc" => __( 'Insert your MySpace ID. If your MySpace page is <strong>http://myspace.com/username</strong>, insert only <strong>username</strong>', 'evolve'  ),
        "id" => $evlshortname."_myspace",
        "type" => "text",
        "std" => "");  

// Skype

$options[] = array(  "name" => __( 'Skype', 'evolve'  ),
        "desc" => __( 'Insert your Skype ID, e.g. <strong>username</strong>', 'evolve'  ),
        "id" => $evlshortname."_skype",
        "type" => "text",
        "std" => "");  

// YouTube

$options[] = array(  "name" => __( 'YouTube', 'evolve'  ),
        "desc" => __( 'Insert your YouTube ID. If your YouTube page is <strong><strong>http://youtube.com/user/Username</strong></strong>, insert only <strong>Username</strong>', 'evolve'  ),
        "id" => $evlshortname."_youtube",
        "type" => "text",
        "std" => "");  

// Flickr

$options[] = array(  "name" => __( 'Flickr', 'evolve'  ),
        "desc" => __( 'Insert your Flickr ID. If your Flickr page is <strong>http://flickr.com/photos/example</strong>, insert only <strong>example</strong>', 'evolve'  ),
        "id" => $evlshortname."_flickr",
        "type" => "text",
        "std" => "");  

// LinkedIn

$options[] = array(  "name" => __( 'LinkedIn', 'evolve'  ),
        "desc" => __( 'Insert your LinkedIn profile URI, e.g. <strong>http://ca.linkedin.com/pub/your-name/3/859/23b</strong>', 'evolve'  ),
        "id" => $evlshortname."_linkedin",
        "type" => "text",
        "std" => "");
        
// Google Plus

$options[] = array(  "name" => __( 'Google Plus', 'evolve'  ),
        "desc" => __( 'Insert your Google Plus profile ID, e.g. <strong>114573636521805298702</strong>', 'evolve'  ),
        "id" => $evlshortname."_googleplus",
        "type" => "text",
        "std" => "");  

$options[] = array( "name" => $evlshortname."-tab-3", "id" => $evlshortname."-tab-3",
	"type" => "close-tab" );  


// Header content

$options[] = array( "name" => $evlshortname."-tab-4", "id" => $evlshortname."-tab-4",
	"type" => "open-tab");


$options[] = array( "name" => __( 'Custom logo', 'evolve'  ),
        "desc" => __( 'Upload a logo for your theme, or specify an image URL directly.', 'evolve'  ),
        "id" => $evlshortname."_header_logo",
        "type" => "upload",
        "std" => "");         
        
$options[] = array(  "name" => __( 'Logo position', 'evolve'  ),
        "desc" => __( 'Choose the position of your custom logo', 'evolve'  ),
        "id" => $evlshortname."_pos_logo",
        "type" => "select",
        "std" => "left",
        "options" => array(
			  'left' => __( 'Left &nbsp;&nbsp;&nbsp;(default)', 'evolve'  ),
			  'right' => __( 'Right', 'evolve'  ),
        'disable' => __( 'Disable', 'evolve'  )
        )); 
        
$options[] = array(  "name" => __( 'Disable Blog Title', 'evolve'  ),
        "desc" => __( 'Check this box if you don\'t want to display title of your blog', 'evolve'  ),
        "id" => $evlshortname."_blog_title",
        "type" => "checkbox",
        "std" => "0");    
        
$options[] = array(  "name" => __( 'Blog Tagline position', 'evolve'  ),
        "desc" => __( 'Choose the position of blog tagline', 'evolve'  ),
        "id" => $evlshortname."_tagline_pos",
        "type" => "select",
        "std" => "next",
        "options" => array(
			  'next' => __( 'Next to blog title &nbsp;&nbsp;&nbsp;(default)', 'evolve'  ),
			  'above' => __( 'Above blog title', 'evolve'  ),
        'under' => __( 'Under blog title', 'evolve'  ),
        'disable' => __( 'Disable', 'evolve'  )         
        ));     
        
$options[] = array(  "name" => __( 'Home page header content', 'evolve'  ),
        "desc" => "",
        "id" => $evlshortname."_home_header_content",
        "type" => "select",
        "std" => "search_social",
        "options" => array(
			  'search_social' => __( 'Search Field + Subscribe Buttons &nbsp;&nbsp;&nbsp;(default)', 'evolve'  ),
			  'post_search_social' => __( 'Recent Posts + Search Field + Subscribe Buttons', 'evolve'  ),
        'disable' =>__( 'Disable', 'evolve'  )
        ));  
        
$options[] = array(  "name" => __( 'Single post header content', 'evolve'  ),
        "desc" => "",
        "id" => $evlshortname."_single_header_content",
        "type" => "select",
        "std" => "search_social",
        "options" => array(
			  'search_social' => __( 'Search Field + Subscribe Buttons &nbsp;&nbsp;&nbsp;(default)', 'evolve'  ),
			  'post_search_social' => __( 'Recent Posts + Search Field + Subscribe Buttons', 'evolve'  ),
        'disable' =>__( 'Disable', 'evolve'  )
        )); 
        
$options[] = array(  "name" => __( 'Archives and other pages header content', 'evolve'  ),
        "desc" => "",
        "id" => $evlshortname."_archives_header_content",
        "type" => "select",
        "std" => "search_social",
        "options" => array(
			  'search_social' => __( 'Search Field + Subscribe Buttons &nbsp;&nbsp;&nbsp;(default)', 'evolve'  ),
			  'post_search_social' => __( 'Recent Posts + Search Field + Subscribe Buttons', 'evolve'  ),
        'disable' =>__( 'Disable', 'evolve'  )
        ));              
        
$options[] = array(  "name" => __( 'Slideshow', 'evolve'  ),
        "desc" => __( 'To enable a slideshow the <strong>Recent Posts + Search Field + Subscribe Buttons</strong> option must be enabled', 'evolve'  ),
        "id" => $evlshortname."_header_slider",
        "type" => "select",
        "std" => "disable",
        "options" => array(
			  'disable' => __( 'Disable &nbsp;&nbsp;&nbsp;(default)', 'evolve'  ),
			  'normal' => __( 'Normal', 'evolve'  ),
        'slow' => __( 'Slow', 'evolve'  ),
        'fast' => __( 'Fast', 'evolve'  )
        ));    

$options[] = array( "name" => $evlshortname."-tab-4", "id" => $evlshortname."-tab-4",
	"type" => "close-tab" ); 


// Footer content

$options[] = array( "name" => $evlshortname."-tab-5", "id" => $evlshortname."-tab-5",
	"type" => "open-tab");


$options[] = array(  "name" => __( 'Custom footer', 'evolve'  ),
        "desc" => __( 'Available <strong>HTML</strong> tags and attributes:<br /><br /> <code> &lt;b&gt; &lt;i&gt; &lt;a href="" title=""&gt; &lt;blockquote&gt; &lt;del datetime=""&gt; <br /> &lt;ins datetime=""&gt; &lt;img src="" alt="" /&gt; &lt;ul&gt; &lt;ol&gt; &lt;li&gt; <br /> &lt;code&gt; &lt;em&gt;  &lt;strong&gt; &lt;div&gt; &lt;span&gt; &lt;h1&gt; &lt;h2&gt; &lt;h3&gt; &lt;h4&gt; &lt;h5&gt; &lt;h6&gt; <br /> &lt;table&gt; &lt;tbody&gt; &lt;tr&gt; &lt;td&gt; &lt;br /&gt; &lt;hr /&gt;</code>', 'evolve'  ),
        "id" => $evlshortname."_footer_content",
        "type" => "textarea",
        "std" => "");

$options[] = array( "name" => $evlshortname."-tab-5", "id" => $evlshortname."-tab-5",
	"type" => "close-tab" ); 


// Styles

$options[] = array( "id" => $evlshortname."-tab-6",
	"type" => "open-tab");

$options[] = array(  "name" => __( 'Blog Title font', 'evolve'  ),
        "desc" => __( 'Select the typography you want for your blog title. * non web-safe font.', 'evolve'  ),
        "id" => $evlshortname."_title_font",
        "type" => "typography",
        "std" => array('size' => '55px', 'face' => 'myriad pro','style' => 'bold','color' => '#4AA4D8')
        );
        
$options[] = array(  "name" => __( 'Content font', 'evolve'  ),
        "desc" => __( 'Select the typography you want for your blog content. * non web-safe font.', 'evolve'  ),
        "id" => $evlshortname."_content_font",
        "type" => "typography",
        "std" => array('size' => '13px', 'face' => 'myriad pro','style' => 'normal','color' => '#333333')
        );       

$options[] = array( "name" => $evlshortname."-tab-6", "id" => $evlshortname."-tab-6",
	"type" => "close-tab" ); 


// Navigation

$options[] = array( "id" => $evlshortname."-tab-7",
	"type" => "open-tab");

$options[] = array(  "name" => __( 'Disable main menu', 'evolve'  ),
        "desc" => __( 'Check this box if you don\'t want to display main menu', 'evolve'  ),
        "id" => $evlshortname."_main_menu",
        "type" => "checkbox",
        "std" => "0");

$options[] = array(  "name" => __( 'Position of navigation links', 'evolve'  ),
        "desc" => __( 'Choose the position of the <strong>Older/Newer Posts</strong> links', 'evolve'  ),
        "id" => $evlshortname."_nav_links",
        "type" => "select",
        "std" => "after",
        "options" => array(
			  'after' => __( 'After posts &nbsp;&nbsp;&nbsp;(default)', 'evolve'  ),
			  'before' => __( 'Before posts', 'evolve'  ),
        'both' => __( 'Both', 'evolve'  )
        ));   
        
$options[] = array(  "name" => __( 'Position of \'Back to Top\' button', 'evolve'  ),
        "desc" => "",
        "id" => $evlshortname."_pos_button",
        "type" => "select",
        "std" => "disable",
        "options" => array(
			  'disable' => __( 'Disable &nbsp;&nbsp;&nbsp;(default)', 'evolve'  ),
			  'left' => __( 'Left', 'evolve'  ),
        'right' => __( 'Right', 'evolve'  ),
        'middle' => __( 'Middle', 'evolve'  )
        ));                
        
$options[] = array( "name" => $evlshortname."-tab-7", "id" => $evlshortname."-tab-7",
	"type" => "close-tab" ); 


// Ads Spaces  

$options[] = array( "name" => $evlshortname."-tab-8", "id" => $evlshortname."-tab-8",
	"type" => "open-tab");

$options[] = array(  "name" => __( 'Theme4Press Affiliate ID', 'evolve'  ),
        "desc" => __( 'Insert your Theme4Press Affiliate ID. Get one <a href=\'http://theme4press.com/affiliates\' target=\'_blank\'><strong>here</strong></a>.', 'evolve'  ),
        "id" => $evlshortname."_affiliate_id",
        "type" => "text",
        "std" => ""); 
        
$options[] = array(  "name" => __( 'Ad Space 1 - Header Top', 'evolve'  ),
        "desc" => __( 'Insert an ads code here to display in the <strong>Header Top</strong>
        recommended max. ads width 468px', 'evolve'  ),
        "id" => $evlshortname."_space_1",
        "type" => "textarea",
        "std" => "");  
        
$options[] = array(  "name" => __( 'Ad Space 2 - Header Bottom', 'evolve'  ),
        "desc" => __( 'Insert an ads code here to display in the <strong>Header Bottom</strong>
        recommended max. ads width 960px', 'evolve'  ),
        "id" => $evlshortname."_space_2",
        "type" => "textarea",
        "std" => "");
        
$options[] = array(  "name" => __( 'Ad Space 3 - Sidebar 1 Top', 'evolve'  ),
        "desc" => __( 'Insert an ads code here to display in the <strong>Sidebar 1 Top</strong>
        recommended max. ads width 300px', 'evolve'  ),
        "id" => $evlshortname."_space_3",
        "type" => "textarea",
        "std" => ""); 
        
$options[] = array(  "name" => __( 'Ad Space 4 - Sidebar 1 Bottom', 'evolve'  ),
        "desc" => __( 'Insert an ads code here to display in the <strong>Sidebar 1 Bottom</strong>
        recommended max. ads width 300px', 'evolve'  ),
        "id" => $evlshortname."_space_4",
        "type" => "textarea",
        "std" => "");   
        
$options[] = array(  "name" => __( 'Ad Space 5 - Sidebar 2 Top', 'evolve'  ),
        "desc" => __( 'Insert an ads code here to display in the <strong>Sidebar 2 Top</strong>
        recommended max. ads width 300px', 'evolve'  ),
        "id" => $evlshortname."_space_5",
        "type" => "textarea",
        "std" => ""); 
        
$options[] = array(  "name" => __( 'Ad Space 6 - Sidebar 2 Bottom', 'evolve'  ),
        "desc" => __( 'Insert an ads code here to display in the <strong>Sidebar 2 Bottom</strong>
        recommended max. ads width 300px', 'evolve'  ),
        "id" => $evlshortname."_space_6",
        "type" => "textarea",
        "std" => ""); 
        
$options[] = array(  "name" => __( 'Ad Space 7 - Post Top', 'evolve'  ),
        "desc" => __( 'Insert an ads code here to display in the <strong>Post Top</strong>
        recommended max. ads width 600px', 'evolve'  ),
        "id" => $evlshortname."_space_7",
        "type" => "textarea",
        "std" => ""); 
        
$options[] = array(  "name" => __( 'Ad Space 8 - Post Bottom', 'evolve'  ),
        "desc" => __( 'Insert an ads code here to display in the <strong>Post Bottom</strong>
        recommended max. ads width 600px', 'evolve'  ),
        "id" => $evlshortname."_space_8",
        "type" => "textarea",
        "std" => ""); 
        
$options[] = array(  "name" => __( 'Ad Space 9 - Footer', 'evolve'  ),
        "desc" => __( 'Insert an ads code here to display in the <strong>Footer</strong>
        recommended max. ads width 960px', 'evolve'  ),
        "id" => $evlshortname."_space_9",
        "type" => "textarea",
        "std" => "");        

$options[] = array( "name" => $evlshortname."-tab-8", "id" => $evlshortname."-tab-8",
	"type" => "close-tab" );   




// General Styling


$options[] = array( "name" => $evlshortname."-tab-10", "id" => $evlshortname."-tab-10",
	"type" => "open-tab");     


$options[] = array(  "name" => __( 'Main colors', 'evolve'  ),
        "desc" => __( 'Color scheme of header, footer and links', 'evolve'  ),
        "id" => $evlshortname."_main_color",
        "type" => "images",
        "std" => "grey_blue",
        "options" => array(
			  'grey_blue' => $imagepathfolder . 'header-footer.jpg',
			  'light_grey_blue' => $imagepathfolder . '/light-grey-blue/header-footer.jpg',
        'green_yellow' => $imagepathfolder . '/green-yellow/header-footer.jpg',
        'red_yellow' => $imagepathfolder . '/red-yellow/header-footer.jpg',
        'pink_purple' => $imagepathfolder . '/pink-purple/header-footer.jpg',
        'light_blue' => $imagepathfolder . '/light-blue/header-footer.jpg',
        'brown_yellow' => $imagepathfolder . '/brown-yellow/header-footer.jpg'
        )); 


$options[] = array(  "name" => "Enable Boxed Layout & Custom Background",
        "desc" => "Check this box if you want to enable boxed layout with a custom background",
        "id" => $evlshortname."_custom_background",
        "type" => "checkbox",
        "std" => "0");
        
        
$options[] = array(  "name" => "Disable background images",
        "desc" => "Check this box if you don't want to display background images - 'nacked mode'",
        "id" => $evlshortname."_back_images",
        "type" => "checkbox",
        "std" => "0");  


$options[] = array(  "name" => "Menu color",
        "desc" => "Background color of main menu",
        "id" => $evlshortname."_menu_back",
        "type" => "images",
        "std" => "light",
        "options" => array(
			  'light' => $imagepathfolder . '/light-grey-blue/header-footer.jpg',
			  'dark' => $imagepathfolder . 'header-footer.jpg'
        )); 

$options[] = array(  "name" => "Content color",
        "desc" => "Background color of content",
        "id" => $evlshortname."_content_back",
        "type" => "images",
        "std" => "light",
        "options" => array(
			    'light' => $imagepathfolder . '/light-grey-blue/header-footer.jpg',
			  'dark' => $imagepathfolder . 'header-footer.jpg'
        ));

$options[] = array(  "name" => "Custom CSS",
        "desc" => '<strong>For advanced users only</strong>: insert custom CSS, default <a href="'.$template_url.'/style.css" target="_blank">style.css</a> file',
        "id" => $evlshortname."_css_content",
        "type" => "textarea",
        "std" => "");   
        

$options[] = array( "name" => $evlshortname."-tab-10", "id" => $evlshortname."-tab-10",
	"type" => "close-tab" );  



// Themes Page


$options[] = array( "name" => $evlshortname."-tab-9", "id" => $evlshortname."-tab-9",
	"type" => "open-tab");  
  
$options[] = array( "name" => "t4pthemes", "id" => "t4pthemes", "type" => "t4pthemes"); 

$options[] = array( "name" => $evlshortname."-tab-9", "id" => $evlshortname."-tab-9",
	"type" => "close-tab" ); 
 
 
							
return $options;
}
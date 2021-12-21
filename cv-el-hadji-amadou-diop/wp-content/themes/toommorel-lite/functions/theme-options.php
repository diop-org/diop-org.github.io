<?php
add_action('init','of_options');
if (!function_exists('of_options')) {
function of_options(){
// VARIABLES
$themename = get_theme_data(STYLESHEETPATH . '/style.css');
$themename = $themename['Name'];
$shortname = "of";
// Populate OptionsFramework option in array for use in theme
global $of_options;
$of_options = get_option('of_options');
//Stylesheet Reader
$alt_stylesheets = array("green" => "green","blue" => "blue","pink" => "pink");
// Test data
$test_array = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
// Multicheck Array
$multicheck_array = array("one" => "French Toast", "two" => "Pancake", "three" => "Omelette", "four" => "Crepe", "five" => "Waffle");
// Multicheck Defaults
$multicheck_defaults = array("one" => "1","five" => "1");
// Background Defaults
$background_defaults = array('color' => '', 'image' => '', 'repeat' => 'repeat','position' => 'top center','attachment'=>'scroll');
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
$imagepath = get_stylesheet_directory_uri() . '/images/';
$options = array();
$options[] = array( "name" => "General Settings",
"type" => "heading");
$options[] = array( "name" => "Custom Logo",
"desc" => "Choose your own logo. Optimal Size: 170px Wide by 30px Height",
"id" => "inkthemes_logo",
"type" => "upload");
$options[] = array( "name" => "Custom Favicon",
"desc" => "Specify a 16px x 16px image that will represent your website's favicon.",
"id" => "inkthemes_favicon",
"type" => "upload");
$options[] = array( "name" => "Google Analytic Code",
"desc" => "Paste your Google Analytics (or other) tracking code here.",
"id" => "inkthemes_analytics",
"std" => "",
"type" => "textarea"); 
$options[] = array( "name" => "Body Background Image",
"desc" => "Select image to change your website background",
"id" => "inkthemes_bodybg",
"std" => "",
"type" => "upload"); 				
//****=============================================================================****//
//****-----------This code is used for creating slider settings--------------------****//							
//****=============================================================================****//						
$options[] = array( "name" => "Home Top Section",
"type" => "heading");
$options[] = array( "name" => "Top Section Image",
"desc" => "Choose Image for your Top Section. Optimal Size: 450px x 350px",
"id" => "inkthemes_slideimage1",
"type" => "upload");
$options[] = array( "name" => "Top Section Heading",
"desc" => "Enter the Heading for Top Section",
"id" => "inkthemes_slideheading1",
"std" => "",
"type" => "text");
$options[] = array( "name" => "Top Section Description",
"desc" => "Description for Top Section",
"id" => "inkthemes_slidedescription1",
"std" => "",
"type" => "textarea");
$options[] = array( "name" => "Top Section Button Text",
"desc" => "Enter the text for the button",
"id" => "inkthemes_slidebuttontext1",
"std" => "",
"type" => "text");
$options[] = array( "name" => "Top Section Button Link",
"desc" => "Enter the Link URL for button in Top Section",
"id" => "inkthemes_slidelink1",
"std" => "",
"type" => "text");
//****=============================================================================****//
//****-----------This code is used for creating home page feature content----------****//							
//****=============================================================================****//	
$options[] = array( "name" => "Home Page Settings",
"type" => "heading"); 
$options[] = array( "name" => "Home Page Intro",
"desc" => "Enter your heading text for home page",
"id" => "inkthemes_mainheading",
"std" => "",
"type" => "text");										
//***Code for first column***//
$options[] = array( "name" => "First Feature Heading",
"desc" => "Enter your heading line for first column",
"id" => "inkthemes_headline1",
"std" => "Our Products",
"type" => "text");
$options[] = array( "name" => "First Feature Content",
"desc" => "Enter your feature content for column first",
"id" => "inkthemes_feature1",
"std" => "Record conversations, interviews, speeches, performances, and the sounds of nature with iTalk, one of the most popular digital recording apps ever.",
"type" => "textarea");								
$options[] = array( "name" => "First Feature Link",
"desc" => "Enter your link for feature column first",
"id" => "inkthemes_link1",
"std" => "",
"type" => "text");							

//***Code for second column***//	
$options[] = array( "name" => "Second Feature Heading",
"desc" => "Enter your heading line for second column",
"id" => "inkthemes_headline2",
"std" => "Our Services",
"type" => "text");
$options[] = array( "name" => "Second Feature Content",
"desc" => "Enter your feature content for column second",
"id" => "inkthemes_feature2",
"std" => "Information on Emerging Technologies & impact on business & society. Unlike other systems, Ion Torrent's technology promises to improve in step with World. ",
"type" => "textarea");
$options[] = array( "name" => "Second Feature Link",
"desc" => "Enter your link for feature column second",
"id" => "inkthemes_link2",
"std" => "",
"type" => "text");	
//***Code for third column***//	
$options[] = array( "name" => "Third Feature Heading",
"desc" => "Enter your heading line for third column",
"id" => "inkthemes_headline3",
"std" => "Our Clients",
"type" => "text");
$options[] = array( "name" => "Third Feature Content",
"desc" => "Enter your feature content for third column",
"id" => "inkthemes_feature3",
"std" => "Anonymous Hacks NATO, Hackers Deface Anonymous Site Tablet Sales Show Hope for Microsoft Google Announces AdWords Business Credit Card for Public.",
"type" => "textarea");
$options[] = array( "name" => "Third Feature Link",
"desc" => "Enter your link for feature column third",
"id" => "inkthemes_link3",
"std" => "",
"type" => "text");	

//***Code for fourth column***//	
$options[] = array( "name" => "Fourth Feature Heading",
"desc" => "Enter your heading line for fourth column",
"id" => "inkthemes_headline4",
"std" => "Client Needs",
"type" => "text");	
$options[] = array( "name" => "Fourth Feature Content",
"desc" => "Enter your feature content for fourth column",
"id" => "inkthemes_feature4",
"std" => "Technology Site Planners (TECH SITE) specializes in providing evaluation, design, construction, and post-construction services for mission critical.",
"type" => "textarea");								
$options[] = array( "name" => "Fourth Feature link",
"desc" => "Enter your link for feature column fourth",
"id" => "inkthemes_link4",
"std" => "",
"type" => "text");	
//Featured Images
$options[] = array( "name" => "First Feature Image",
"desc" => "Choose image for your feature column first. Optimal size 198px x 115px",
"id" => "inkthemes_fimg1",
"std" => "",
"type" => "upload");
$options[] = array( "name" => "Second Feature Image",
"desc" => "Choose image for your feature column second. Optimal size 198px x 115px",
"id" => "inkthemes_fimg2",
"std" => "",
"type" => "upload");
$options[] = array( "name" => "Third Feature Image",
"desc" => "Choose image for your feature column thrid. Optimal size 198px x 115px",
"id" => "inkthemes_fimg3",
"std" => "",
"type" => "upload");
$options[] = array( "name" => "Fourth Feature Image",
"desc" => "Choose image for your feature column fourth. Optimal size 198px x 115px",
"id" => "inkthemes_fimg4",
"std" => "",
"type" => "upload");
$options[] = array( "name" => "Tagline",
"desc" => "Enter the main heading",
"id" => "inkthemes_tagline",
"std" => "",
"type" => "text");
$options[] = array( "name" => "Tagline Button Text",
"desc" => "Enter the main heading",
"id" => "inkthemes_taglinebuttontext",
"std" => "",
"type" => "text");
$options[] = array( "name" => "Tagline Button Link",
"desc" => "Enter the main heading",
"id" => "inkthemes_taglinebuttonlink",
"std" => "",
"type" => "text");
//****=============================================================================****//
//****-----------This code is used for creating color styleshteet options----------****//							
//****=============================================================================****//				
$options[] = array( "name" => "Styling Options",
"type" => "heading");                                                      
$options[] = array( "name" => "Theme Stylesheet",
"desc" => "Select your themes alternative color scheme.",
"id" => "inkthemes_altstylesheet",
"std" => "green",
"type" => "select",
"options" => $alt_stylesheets); 
$options[] = array( "name" => "Custom CSS",
"desc" => "Quickly add some CSS to your theme by adding it to this block.",
"id" => "inkthemes_customcss",
"std" => "",
"type" => "textarea");			
//****=============================================================================****//
//****-----------This code is used for creating Footer Settings--------------------****//							
//****=============================================================================****//						
$options[] = array( "name" => "Social Network Icons",
"type" => "heading");
$options[] = array( "name" => "Delicious URL",
"desc" => "Enter your Delicious URL if you have one",
"id" => "inkthemes_delicious",
"std" => "",
"type" => "text"); 					
$options[] = array( "name" => "LinkedIn URL",
"desc" => "Enter your Twitter URL if you have one",
"id" => "inkthemes_linkedin",
"std" => "",
"type" => "text"); 					
$options[] = array( "name" => "Facebook URL",
"desc" => "Enter your Facebook URL if you have one",
"id" => "inkthemes_facebook",
"std" => "",
"type" => "text"); 					
$options[] = array( "name" => "Twitter URL",
"desc" => "Enter your Twitter URL if you have one",
"id" => "inkthemes_twitter",
"std" => "",
"type" => "text"); 
$options[] = array( "name" => "RSS Feed URL",
"desc" => "Enter your RSS Feed URL if you have one",
"id" => "inkthemes_rss",
"std" => "",
"type" => "text");	
update_option('of_template',$options); 					  
update_option('of_themename',$themename);   
update_option('of_shortname',$shortname);
}
}
?>

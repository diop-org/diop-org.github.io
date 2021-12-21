<?php

add_action('init', 'of_options');
if (!function_exists('of_options')) {

    function of_options() {
// VARIABLES
        $themename = get_theme_data(get_template_directory() . '/style.css');
        $themename = $themename['Name'];
        $shortname = "of";
// Populate OptionsFramework option in array for use in theme
        global $of_options;
        $of_options = inkthemes_get_option('of_options');
        //Option for on off
        $full_col = array("on" => "On", "off" => "Off");
        $cols_three = array("on" => "On", "off" => "Off");
//Stylesheet Reader
        $alt_stylesheets = array("none" => "none", "green" => "green", "blue" => "blue", "black" => "black", "darkcyan" => "darkcyan", "magenta" => "magenta", "orange" => "orange", "red" => "red", "yellow" => "yellow");
// Test data
        $test_array = array("one" => "One", "two" => "Two", "three" => "Three", "four" => "Four", "five" => "Five");
// Multicheck Array
        $multicheck_array = array("one" => "French Toast", "two" => "Pancake", "three" => "Omelette", "four" => "Crepe", "five" => "Waffle");
// Multicheck Defaults
        $multicheck_defaults = array("one" => "1", "five" => "1");
// Background Defaults
        $background_defaults = array('color' => '', 'image' => '', 'repeat' => 'repeat', 'position' => 'top center', 'attachment' => 'scroll');
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
        $imagepath = get_template_directory_uri() . '/images/';
        $options = array();
        $options[] = array("name" => "General Settings",
            "type" => "heading");
        //Cuscom Logo
        $options[] = array("name" => "Custom Logo",
            "desc" => "Choose your own logo. Optimal Size: 170px Wide by 30px Height",
            "id" => "inkthemes_logo",
            "type" => "upload");
        //Custom Favicon
        $options[] = array("name" => "Custom Favicon",
            "desc" => "Specify a 16px x 16px image that will represent your website's favicon.",
            "id" => "inkthemes_favicon",
            "type" => "upload");
        //Google Analytic
        $options[] = array("name" => "Google Analytic Code",
            "desc" => "Paste your Google Analytics (or other) tracking code here.",
            "id" => "inkthemes_analytics",
            "std" => "",
            "type" => "textarea");
//****=============================================================================****//
//****-----------This code is used for creating slider settings--------------------****//							
//****=============================================================================****//						
        $options[] = array("name" => "Home Top Section",
            "type" => "heading");
        //First slider
        $options[] = array("name" => "Top Section Image",
            "desc" => "Choose Image for your Top Section. Optimal Size: 950px x 350px",
            "id" => "inkthemes_slideimage1",
            "type" => "upload");
        $options[] = array("name" => "Top Section Caption Heading",
            "desc" => "Enter the Heading for Top Section Caption",
            "id" => "inkthemes_slideheading1",
            "std" => "",
            "type" => "textarea");
        $options[] = array("name" => "Top Section Caption Description",
            "desc" => "Enter description for Top Section Caption",
            "id" => "inkthemes_slidedescription1",
            "std" => "",
            "type" => "textarea");
        $options[] = array("name" => "Top Section Link",
            "desc" => "Enter the Link URL for Top Section",
            "id" => "inkthemes_slidelink1",
            "std" => "",
            "type" => "text");
//****=============================================================================****//
//****-----------This code is used for creating home page feature content----------****//							
//****=============================================================================****//	
        $options[] = array("name" => "Home Page Settings",
            "type" => "heading");
        //Home page main heading
        $options[] = array("name" => "Home Page Heading Text",
            "desc" => "Enter your heading text for home page",
            "id" => "inkthemes_mainheading",
            "std" => "",
            "type" => "textarea");
//****====================================================================****//
//****-----This code is used for homepage first featured section----------****//							
//****====================================================================****//
        $options[] = array("name" => "Homepage Featured Section",
            "type" => "heading");
        //First fearure heading  
        $options[] = array("name" => "First Feature Heading",
            "desc" => "Enter your heading line for first feature area",
            "id" => "inkthemes_headline1",
            "std" => "",
            "type" => "textarea");
        //First feature image
        $options[] = array("name" => "First Feature Image",
            "desc" => "Choose image for your first feature area. Optimal size 284px x 123px",
            "id" => "inkthemes_wimg1",
            "std" => "",
            "type" => "upload");
        //First feature content
        $options[] = array("name" => "First Feature Content",
            "desc" => "Enter your feature content for first column",
            "id" => "inkthemes_feature1",
            "std" => "",
            "type" => "textarea");
        //First feature link
        $options[] = array("name" => "First Feature Read More Link",
            "desc" => "Enter your link for first feature area.",
            "id" => "inkthemes_link1",
            "std" => "",
            "type" => "text");
//***Code for second column***//
        //Second feature heading
        $options[] = array("name" => "Second Feature Heading",
            "desc" => "Enter your heading line for second feature area.",
            "id" => "inkthemes_headline2",
            "std" => "",
            "type" => "textarea");
        //Second feature image
        $options[] = array("name" => "Second Feature Image",
            "desc" => "Choose image for your second feature area. Optimal size 284px x 123px.",
            "id" => "inkthemes_fimg2",
            "std" => "",
            "type" => "upload");
        //Second feature content
        $options[] = array("name" => "Second Feature Content",
            "desc" => "Enter your feature content for column second.",
            "id" => "inkthemes_feature2",
            "std" => "",
            "type" => "textarea");
        //Second feature link
        $options[] = array("name" => "Second Feature Read More Link",
            "desc" => "Enter your link for column second feature area.",
            "id" => "inkthemes_link2",
            "std" => "",
            "type" => "text");
//***Code for third column***//	
        //Third feature heading
        $options[] = array("name" => "Third Feature Heading",
            "desc" => "Enter your heading line for third column feature area.",
            "id" => "inkthemes_headline3",
            "std" => "",
            "type" => "textarea");
        //Third feature image
        $options[] = array("name" => "Third Feature Image",
            "desc" => "Choose image for your column thrid feature area. Optimal size 284px x 123px.",
            "id" => "inkthemes_fimg3",
            "std" => "",
            "type" => "upload");
        //Third feature content
        $options[] = array("name" => "Third Feature Content",
            "desc" => "Enter your content for third column feature area.",
            "id" => "inkthemes_feature3",
            "std" => "",
            "type" => "textarea");
        //Third feature link
        $options[] = array("name" => "Third Feature Read More Link",
            "desc" => "Enter your link for column third feature area.",
            "id" => "inkthemes_link3",
            "std" => "",
            "type" => "text");
//****=============================================================================****//
//****-----------This code is used for creating color styleshteet options----------****//							
//****=============================================================================****//				
        $options[] = array("name" => "Styling Options",
            "type" => "heading");
        $options[] = array("name" => "Custom CSS",
            "desc" => "Quickly add some CSS to your theme by adding it to this block.",
            "id" => "inkthemes_customcss",
            "std" => "",
            "type" => "textarea");
//****=============================================================================****//
//****-----------This code is used for creating Footer Settings--------------------****//							
//****=============================================================================****//						
        $options[] = array("name" => "Social Network Icons",
            "type" => "heading");
        $options[] = array("name" => "Linkedin URL",
            "desc" => "Enter your Linkedin URL if you have one",
            "id" => "inkthemes_linked",
            "std" => "",
            "type" => "text");
        $options[] = array("name" => "Flickr URL",
            "desc" => "Enter your Flickr URL if you have one",
            "id" => "inkthemes_flickr",
            "std" => "",
            "type" => "text");
        $options[] = array("name" => "Facebook URL",
            "desc" => "Enter your Facebook URL if you have one",
            "id" => "inkthemes_facebook",
            "std" => "",
            "type" => "text");
        $options[] = array("name" => "Digg URL",
            "desc" => "Enter your Digg URL if you have one",
            "id" => "inkthemes_digg",
            "std" => "",
            "type" => "text");
        $options[] = array("name" => "Youtube URL",
            "desc" => "Enter your Youtube URL if you have one",
            "id" => "inkthemes_youtube",
            "std" => "",
            "type" => "text");
         $options[] = array("name" => "Twitter URL",
            "desc" => "Enter your Twitter URL if you have one",
            "id" => "inkthemes_twitter",
            "std" => "",
            "type" => "text");
          $options[] = array("name" => "Stumbleupon URL",
            "desc" => "Enter your Stumbleupon URL if you have one",
            "id" => "inkthemes_stumble",
            "std" => "",
            "type" => "text");
           $options[] = array("name" => "Skype URL",
            "desc" => "Enter your Skype URL if you have one",
            "id" => "inkthemes_skype",
            "std" => "",
            "type" => "text");
        inkthemes_update_option('of_template', $options);
        inkthemes_update_option('of_themename', $themename);
        inkthemes_update_option('of_shortname', $shortname);
    }
}
?>

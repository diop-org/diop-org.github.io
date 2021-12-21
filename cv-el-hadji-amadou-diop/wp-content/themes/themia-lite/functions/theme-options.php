<?php

add_action('init', 'inkthemes_options');
if (!function_exists('inkthemes_options')) {

    function inkthemes_options() {
        // VARIABLES
        $themename = get_theme_data(get_template_directory() . '/style.css');
        $themename = $themename['Name'];
        $shortname = "of";
        // Populate OptionsFramework option in array for use in theme
        global $of_options;
        $of_options = inkthemes_get_option('of_options');

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

        $options = array(
            array("name" => "General Settings",
                "type" => "heading"),
            array("name" => "Custom Logo",
                "desc" => "Choose your own logo. Optimal Size: 160px Wide by 30px Height",
                "id" => "inkthemes_logo",
                "type" => "upload"),
            array("name" => "Custom Favicon",
                "desc" => "Specify a 16px x 16px image that will represent your website's favicon.",
                "id" => "inkthemes_favicon",
                "type" => "upload"),
            array("name" => "Tracking Code",
                "desc" => "Paste your Google Analytics (or other) tracking code here.",
                "id" => "inkthemes_analytics",
                "std" => "",
                "type" => "textarea"),
//****=============================================================================****//
//****-----------This code is used for creating home page feature content----------****//							
//****=============================================================================****//	
            array("name" => "Home Page Settings",
                "type" => "heading"),
            array("name" => "Top Feature Image",
                "desc" => "Choose a image for top feature. Optimal size: 928px x 355px",
                "id" => "inkthemes_featureimg",
                "std" => "",
                "type" => "upload"),
            //***Code for first column***//
            array("name" => "First Feature Heading",
                "desc" => "Enter your heading line one",
                "id" => "inkthemes_headline1",
                "std" => "",
                "type" => "textarea"),
            array("name" => "First Feature Image",
                "desc" => "Upload image for your feature column one",
                "id" => "inkthemes_img1",
                "std" => "",
                "type" => "upload"),
            array("name" => "First Feature Content",
                "desc" => "Paste your feature content here... you can also put embed html code but the html
							content should not exceed the maximum width size. Any content of maximum width is 272px.",
                "id" => "inkthemes_feature1",
                "std" => "",
                "type" => "textarea"),
            array("name" => "First Feature link",
                "desc" => "Enter your link for feature content column one",
                "id" => "inkthemes_link1",
                "std" => "",
                "type" => "text"),
            //***Code for second column***//						
            array("name" => "Second Feature Heading",
                "desc" => "Enter your heading line second",
                "id" => "inkthemes_headline2",
                "std" => "",
                "type" => "textarea"),
            array("name" => "Second Feature Image",
                "desc" => "Upload image for your feature column second",
                "id" => "inkthemes_img2",
                "std" => "",
                "type" => "upload"),
            array("name" => "Second Feature Content",
                "desc" => "Paste your feature content here... you can also put embed html code but the html
							content should not exceed the maximum width size. Any content of maximum width is 272px.",
                "id" => "inkthemes_feature2",
                "std" => "",
                "type" => "textarea"),
            array("name" => "Second Feature link",
                "desc" => "Enter your link for feature content column second",
                "id" => "inkthemes_link2",
                "std" => "",
                "type" => "text"),
            //***Code for third column***//						
            array("name" => "Third Feature Heading",
                "desc" => "Enter your heading line third",
                "id" => "inkthemes_headline3",
                "std" => "",
                "type" => "textarea"),
            array("name" => "Third Feature Image",
                "desc" => "Upload image for your feature column third",
                "id" => "inkthemes_img3",
                "std" => "",
                "type" => "upload"),
            array("name" => "Third Feature Content",
                "desc" => "Paste your feature content here... you can also put embed html code but the html
							content should not exceed the maximum width size. Any content of maximum width is 272px.",
                "id" => "inkthemes_feature3",
                "std" => "",
                "type" => "textarea"),
            array("name" => "Third Feature link",
                "desc" => "Enter your link for feature content column third",
                "id" => "inkthemes_link3",
                "std" => "",
                "type" => "text"));
        inkthemes_update_option('of_template', $options);
        inkthemes_update_option('of_themename', $themename);
        inkthemes_update_option('of_shortname', $shortname);
    }

}
?>

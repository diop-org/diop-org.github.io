<?php

/* 
	Options	Tabs
	Author: Tyler Cuningham
	Establishes the theme options tabs.
	Copyright (C) 2011 CyberChimps
	Version 2.0
	
*/

$shortname = $themeslug;

$optionlist = array (

array( "id" => $shortname,
	"type" => "open-tab"),

array( "type" => "open"),
array( "type" => "close"),

array( "type" => "close-tab"),

// General

array( "id" => "tab1",
	"type" => "open-tab"),

array( "type" => "open"),
   

array( "name" => "Help",  
    "desc" => "",  
    "id" => $shortname."_general_faq",  
    "type" => "general_faq",  
    "std" => ""),
        
array( "name" => "Custom Favicon",  
    "desc" => "A favicon is a 16x16 pixel icon that represents your site; paste the URL to a .ico image that you want to use as the image",  
    "id" => $shortname."_favicon",  
    "type" => "upload2",  
    "std" => ""),

array( "name" => "Google Analytics Code",  
    "desc" => "You can paste your Google Analytics or other tracking code in this box. This will be automatically be added to the footer.",  
    "id" => $shortname."_ga_code",  
    "type" => "textarea",  
    "std" => ""),  

array( "name" => "Footer Copyright",  
    "desc" => "Enter Copyright text used on the right side of the footer. It can be HTML (default is your blog title)",  
    "id" => $shortname."_footer_text",  
    "type" => "textarea",  
    "std" => ""),
    
array( "type" => "close"),

array( "type" => "close-tab"),

//Design

array( "id" => "tab2",
	"type" => "open-tab"),
 
array( "type" => "open"),

array( "name" => "Help",  
    "desc" => "",  
    "id" => $shortname."_design_faq",  
    "type" => "design_faq",  
    "std" => ""),
    
array( "name" => "Choose a Font:",  
    "desc" => "(Default is Arial)",  
    "id" => $shortname."_font",  
    "type" => "select2",  
    "std" => ""),

array( "name" => "Link Color",  
    "desc" => "Use the color picker to select the site link color",  
    "id" => $shortname."_link_color",  
      "type" => "color2",  
    "std" => "false"),

array( "type" => "close"),
array( "type" => "close-tab"),

//Blog

array( "id" => "tab3",
	"type" => "open-tab"),
 
array( "type" => "open"),

array( "name" => "Help",  
    "desc" => "",  
    "id" => $shortname."_blog_faq",  
    "type" => "blog_faq",  
    "std" => ""),

array( "name" => "",  
    "desc" => "",  
    "id" => $shortname."_blog_title",  
    "type" => "blog_title",  
    "std" => ""),
    
array( "name" => "Hide Post Icons",  
    "desc" => "Check this box to hide the post format icons.",  
    "id" => $shortname."_hide_post_icons",  
      "type" => "checkbox",  
    "std" => "false"),    

array( "name" => "Post Excerpts",  
    "desc" => "Use the following options to control excerpts.",  
    "id" => $shortname."_excerpts",  
      "type" => "excerpts",  
    "std" => "false"),

array( "name" => "Featured Images",  
    "desc" => "Use the following options to control featured image alignment and size.",  
    "id" => $shortname."_featured_images",  
      "type" => "featured",  
    "std" => "false"),

array( "name" => "Hide Post Elements",  
    "desc" => "Use the following checkboxes to hide various post elements.",  
    "id" => $shortname."_hide_post_elements",  
    "type" => "post",  
    "std" => "false"),

array(  "name" => "Show Facebook Like Button",
	"desc" => "Check this box to show the Facebook Like Button on blog posts",
	"id" => $shortname."_show_fb_like",
	"type" => "checkbox",
	"std" => "false"),  
	
array(  "name" => "Show Google +1 button",
	"desc" => "Check this box to show the Google +1 Button on blog posts",
	"id" => $shortname."_show_gplus",
	"type" => "checkbox",
	"std" => "false"),  
	    
array( "name" => "",  
    "desc" => "",  
    "id" => $shortname."_seo_title",  
    "type" => "seo_title",  
    "std" => ""),
    
array( "name" => "Home Description",  
    "desc" => "Enter the META description of your homepage here.",  
    "id" => $shortname."_home_description",  
    "type" => "textarea",  
    "std" => ""),
    
array( "name" => "Home Keywords",  
    "desc" => "Enter the META keywords of your homepage here (separated by commas).",  
    "id" => $shortname."_home_keywords",  
    "type" => "textarea2",  
    "std" => ""),
    
array( "name" => "Optional Home Title",  
    "desc" => "Enter an alternative title of your homepage here (default is site tagline).",  
    "id" => $shortname."_home_title",  
    "type" => "text2",  
    "std" => ""),

array( "type" => "close"),
array( "type" => "close-tab"),

// Social

array( "id" => "tab4",
	"type" => "open-tab"),
 
array( "type" => "open"),

array( "name" => "Help",  
    "desc" => "",  
    "id" => $shortname."_social_faq",  
    "type" => "social_faq",  
    "std" => ""),

array( "name" => "Facebook URL",  
    "desc" => "Enter your Facebook page URL for the Facebook social icon.",  
    "id" => $shortname."_facebook",  
    "type" => "facebook",  
    "std" => "http://facebook.com/"),

array( "name" => "Twitter URL",  
    "desc" => "Enter your Twitter URL for Twitter social icon.",  
    "id" => $shortname."_twitter",  
    "type" => "twitter",  
    "std" => "http://twitter.com/"),
    
array( "name" => "Google Plus URL",  
    "desc" => "Enter your Google Plus url (we recommend using the http://gplus.to/ shortener).",  
    "id" => $shortname."_gplus",  
    "type" => "gplus",  
    "std" => "https://plus.google.com/"),
    
array( "name" => "LinkedIn URL",  
    "desc" => "Enter your LinkedIn URL for the LinkedIn social icon.",  
    "id" => $shortname."_linkedin",  
    "type" => "linkedin",  
    "std" => "http://linkedin.com/"),  
    
array( "name" => "YouTube URL",  
    "desc" => "Enter your YouTube URL for the YouTube social icon.",  
    "id" => $shortname."_youtube",  
    "type" => "youtube",  
    "std" => "http://youtube.com/"),  
    
array( "name" => "Google Maps URL",  
    "desc" => "Enter your Google Maps URL for the Google Maps social icon.",  
    "id" => $shortname."_googlemaps",  
    "type" => "googlemaps",  
    "std" => "http://google.com/maps/"),  

array( "name" => "Email",  
    "desc" => "Enter your contact email address for email social icon.",  
    "id" => $shortname."_email",  
    "type" => "email",  
    "std" => "no@way.com"),
    
array( "name" => "Custom RSS Link",  
    "desc" => "Enter Feedburner URL, or leave blank for default RSS feed.",  
    "id" => $shortname."_rsslink",  
    "type" => "rss",  
    "std" => ""),   
     
array( "type" => "close"),

array( "type" => "close-tab"),

);  

?>
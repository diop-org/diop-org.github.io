<?php
global $theme_default_options;
$theme_default_options = array(
	
	'theme_header_show_headline'	=>	1,
	'theme_header_show_slogan'	=>	1,
	
	'theme_menu_showHome'	=>	1,
	'theme_menu_highlight_active_categories'	=>	1,
	'theme_menu_homeCaption'	=>	<<<EOL
Home
EOL
,
	
	'theme_menu_trim_title'=> 1,
	'theme_menu_trim_len'=> 45,
	'theme_submenu_trim_len'=> 40,

	'theme_menu_depth'	=>	0,
	'theme_menu_source'	=>	'Pages',
	
	'theme_vmenu_depth'	=>	1,
	'theme_vmenu_source'	=>	'Categories',
	
	'theme_sidebars_style_default'	=>	'block',
	'theme_sidebars_style_secondary'	=>	'block',
	'theme_sidebars_style_top'	=>	'block',
	'theme_sidebars_style_bottom'	=>	'block',
	'theme_sidebars_style_footer'	=>	'simple',
	
	'theme_metadata_use_featured_image_as_thumbnail'	=>	1,
	'theme_metadata_thumbnail_auto'	=>	0,
	'theme_metadata_thumbnail_width'	=>	128,
	'theme_metadata_thumbnail_height'	=>	128,

	'theme_metadata_separator'	=>	' | ',
	'theme_metadata_excerpt_auto'	=>	0,
	'theme_metadata_excerpt_min_remainder'	=>	5,
	'theme_metadata_excerpt_words'	=>	40,
	'theme_show_tags_on_404_page' => 0,
	'theme_show_tags_title_on_404_page' => __('Tag Cloud', THEME_NS),
	'theme_show_random_posts_on_404_page' => 0,
	'theme_show_random_posts_title_on_404_page' => __('Random posts', THEME_NS),
	'theme_comment_use_smilies' => 0,
	'theme_allow_comments' => 1,

	'theme_metadata_excerpt_use_tag_filter'	=>	0,
	'theme_metadata_excerpt_allowed_tags'	=> 'a, abbr, blockquote, b, cite, pre, code, em, label, i, p, strong, ul, ol, li, h1, h2, h3, h4, h5, h6, object, param, embed',

	'theme_top_single_navigation'	=>	1,
	'theme_bottom_single_navigation'	=>	0,
	'theme_single_navigation_trim_title'	=>	1,
	'theme_single_navigation_trim_len'	=>	80,
	
	'theme_home_top_posts_navigation'	=>	0,
	'theme_top_posts_navigation'	=>	1,
	'theme_bottom_posts_navigation'	=>	1,
	'theme_attachment_size' => 600,
	'theme_footer_content'	=>	<<<EOL
<br />
<br />

<p style="float: left; margin: 0 20px"><a href="#"><img width="48" height="48" alt="" src="feed.png" style="margin-right: 10px; cursor: text;" /></a><a href="#"><img width="48" height="48" alt="" src="flickr1.png" style="margin-right: 10px;" /></a><img width="48" height="48" alt="" src="facebook1.png" style="margin-right: 10px;" /><a href="#"></a><a href="#"></a><a href="#"><img width="48" height="48" alt="" src="picasa.png" style="margin-right: 20px;" /></a></p>

<ul>
    <li style="float:left;width:200px; margin-left: 170px">
        <p style="font: 17px Arial; color:#FFFFFF;">ElectrIX</p><br />

        <ul>
            <li><a href="#">Sign Up</a></li>

            <li><a href="#">Community</a></li>

            <li><a href="#">Offers</a></li>
        </ul>
    </li>

    <li style="float:left;width:200px;">
        <p style="font: 17px Arial; color:#FFFFFF;">Location</p><br />

        <ul>
            <li><a href="#">About Us</a></li>

            <li><a href="#">Locations</a></li>

            <li><a href="#">Contacts</a></li>
        </ul>
    </li>

    <li style="float:left;">
        <p style="font: 17px Arial; color:#FFFFFF;">Your Area</p><br />

        <ul>
            <li><a href="#">Login</a></li>

            <li><a href="#">Support</a></li>

            <li><a href="#">Careers</a></li>
        </ul>
    </li>
</ul><br clear="all" />

<p style="margin: 0 20px">Copyright © 2011 All Rights Reserved.</p><br />
<br />
<br />
EOL
,
	'theme_posts_headline_tag' => 'h1',
	'theme_posts_slogan_tag' => 'h2',
	'theme_posts_article_title_tag' => 'h2',
	'theme_posts_widget_title_tag' => 'h3',

	'theme_single_headline_tag' => 'div',
	'theme_single_slogan_tag' => 'div',
	'theme_single_article_title_tag' => 'h1',
	'theme_single_widget_title_tag' => 'div'
);

global $theme_default_meta_options;
$theme_default_meta_options = array(
	'theme_show_in_menu'	=>	1,
	'theme_show_as_separator'	=>	0,
	'theme_title_in_menu'	=>	'',
	'theme_show_page_title'	=>	1,
	'theme_show_post_title'	=>	1,
	'theme_widget_styles'	=>	'default'
);

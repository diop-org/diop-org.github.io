<?php
/*
@package WordPress
@subpackage Desire
*/
?>
<?php
$desire_shortname = 'desire';
require(get_template_directory().'/inc/theme-settings.php');
$options = desire_get_options();
require(get_template_directory().'/inc/Mobile_Detect.php');
$device = new Mobile_Detect();
if($device->isMobile() and $options['mobile_friendly']) {
    $isMobile = true;
    $mobileWidth = 380;
} else {
    $isMobile = false;
    $mobileWidth = $options['content_width'];
}
if(!$isMobile)
    $content_width = $options['content_width'];
else
    $content_width = $mobileWidth;
define('DESIRE_WRAPPER_WIDTH',desire_wrapper_width());
define('DESIRE_HEADER_HEIGHT',150);
define('DESIRE_SLIDER_HEIGHT',300);
define('HEADER_TEXTCOLOR', 'FFFFFF');
define('HEADER_IMAGE', '%s/images/headers/header1.jpg');
define('HEADER_IMAGE_WIDTH', DESIRE_WRAPPER_WIDTH);
define('HEADER_IMAGE_HEIGHT', DESIRE_HEADER_HEIGHT);

add_action('after_setup_theme','desire_theme_setup');

if(!function_exists('desire_theme_setup')):
function desire_theme_setup() {
    global $options;
    load_theme_textdomain('desire', get_template_directory() . '/languages');
    $locale = get_locale();
    $locale_file = get_template_directory() . "/languages/$locale.php";
    if(is_readable($locale_file))
        require_once($locale_file);
    add_editor_style();
    add_theme_support('automatic-feed-links');
    register_nav_menu('primary', __('Primary Menu','desire'));
    add_theme_support('post-formats', array('link', 'gallery', 'status', 'video', 'quote', 'image'));
    add_theme_support('post-thumbnails');
    add_image_size('slide-img',DESIRE_WRAPPER_WIDTH, 9999);
    add_image_size('recent-img',48, 48);
    add_image_size('featured-img',$options['content_width'], 9999);
    add_image_size('magazine-img',200,9999);
    add_filter('wp_page_menu_args', 'desire_page_menu_args');
    add_filter('use_default_gallery_style', '__return_false');
    add_action('widgets_init', 'desire_widgets_init');
    add_action('widgets_init','desire_theme_widgets');
    add_action('wp_head','desire_load_styles');
    add_action('wp_head','desire_load_head_scripts');
    add_action('wp_head','desire_load_footer_scripts');
    add_action('init', 'desire_init_custom_post');
    add_filter('excerpt_more', 'desire_auto_excerpt_more');
    add_filter('get_the_excerpt', 'desire_custom_excerpt_more');
    add_theme_support('custom-header', array('random-default' => true));
    add_custom_image_header('desire_header_style','desire_admin_header_style');
    register_default_headers(array(
        'header1' => array(
            'url' => '%s/images/headers/header1.jpg',
            'thumbnail_url' => '%s/images/headers/header1-thumbnail.jpg',
            'description' => __('Header 1','desire')
        ),
        'header2' => array(
            'url' => '%s/images/headers/header2.jpg',
            'thumbnail_url' => '%s/images/headers/header2-thumbnail.jpg',
            'description' => __('Header 2','desire')
        )
    ));
}
endif;

function desire_widgets_init() {
    register_sidebar(array(
	'name' => __('Main Sidebar', 'desire'),
	'id' => 'sidebar-1',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => "</div>",
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
    ));

    register_sidebar(array(
	'name' => __('Footer Widget Area 1', 'desire'),
	'id' => 'sidebar-2',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => "</div>",
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
    ));

    register_sidebar(array(
	'name' => __('Footer Widget Area 2', 'desire'),
	'id' => 'sidebar-3',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => "</div>",
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
    ));

    register_sidebar(array(
	'name' => __('Footer Widget Area 3', 'desire'),
	'id' => 'sidebar-4',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => "</div>",
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
    ));
}

function desire_footer_sidebar_class() {
    $count = 0;
    if (is_active_sidebar('sidebar-2'))
        $count++;
    if (is_active_sidebar('sidebar-3'))
        $count++;
    if (is_active_sidebar('sidebar-4'))
        $count++;
    $class = '';
    switch ($count) {
        case '1':
            $class = 'footer-widget-one clearfix';
            break;
        case '2':
            $class = 'footer-widget-two clearfix';
            break;
        case '3':
            $class = 'footer-widget-three clearfix';
            break;
    }
    if($class)
        echo 'class="'.$class.'"';
}

function desire_theme_widgets() {
    $widgets = array('widgets/widget-tabbed-content.php');
    $widgets = apply_filters('desire_theme_widgets', $widgets);
    foreach ($widgets as $w) {
        locate_template($w, true);
    }
}

function desire_wrapper_width() {
    global $options, $isMobile, $mobileWidth;
    if(!$isMobile)
        $wrapper_width = $options['content_width'] + $options['sidebar_width'] + 75;
    else
        $wrapper_width = $mobileWidth + 25;
    return $wrapper_width;
}

function desire_sidebar_padding() {
    global $options;
    if($options['sidebar_layout'] == 'one-left-sidebar') {
        $padding =  'padding: 25px 0 0 25px;';
    } else {
        $padding = 'padding: 25px 25px 0 0;';
    }
    return $padding;
}

function desire_load_head_scripts() {
    global $options;
    $scripts = '';
    $scripts .= '<script type="text/javascript" src="'.get_template_directory_uri().'/js/theme-head.js"></script>'."\n";
    echo $scripts;
}

function desire_load_footer_scripts() {
    global $options;
    $scripts = '';
    if($options['enable_slideshow']) {
	$scripts .= '<script type="text/javascript" src="'.get_template_directory_uri().'/inc/slider/slider.js"></script>'."\n";
	$scripts .= '<script type="text/javascript">'."\n";
	$scripts .= "\t".'jQuery(document).ready(function() { slideShow('.($options['slide_interval']*1000).'); });'."\n";
	$scripts .= '</script>'."\n";
    }
    echo $scripts;
}

function desire_load_styles() {
    global $options, $isMobile;
    $style = '';
    if($options['favicon_image'] != "") $style .= '<link rel="shortcut icon" href="'.$options['favicon_image'].'"/>'."\n";
    $style .= '<!--[if IE]>'."\n";
    $style .= "\t".'<link rel="stylesheet" type="text/css" media="all" href="'.get_template_directory_uri().'/ie.css" />'."\n";
    $style .= '<![endif]-->'."\n";
    $style .= '<link rel="stylesheet" type="text/css" media="all" href="'.get_template_directory_uri().'/colors/'.$options['color_scheme'].'/colors.css" />'."\n";
    if($options['enable_slideshow'])
        $style .= '<link rel="stylesheet" type="text/css" media="all" href="'.get_template_directory_uri().'/inc/slider/slider.css" />'."\n";
    $style .= '<style>'."\n";
    $style .= '#wrapper { width: '.DESIRE_WRAPPER_WIDTH.'px; }'."\n";
    $style .= "\t".'#header { height: '.DESIRE_HEADER_HEIGHT.'px; }'."\n";
    $style .= "\t".'.logo-image { max-height: '.(DESIRE_HEADER_HEIGHT-30).'px; max-width: '.(DESIRE_HEADER_HEIGHT-30).'px; }'."\n";
    $style .= desire_custom_background();
    $style .= "\t".'ul.slideshow { width: '.DESIRE_WRAPPER_WIDTH.'px; height: '.DESIRE_SLIDER_HEIGHT.'px; }'."\n";
    $style .= "\t".'#slideshow-caption { width: '.DESIRE_WRAPPER_WIDTH.'px; }'."\n";
    $style .= "\t".'#container { width: '.$options['content_width'].'px; padding: 25px 25px 0 25px; }'."\n";
    if($isMobile)
        $style .= "\t".'#container { width: 88% !important; padding: 25px 25px 0 25px; }'."\n";
    $style .= "\t".'.sidebar { width: '.$options['sidebar_width'].'px; '.desire_sidebar_padding().' }'."\n";
    $style .= "\t".'.entry-content, .widget { font-family: '.$options['content_font'].'; }'."\n";
    $style .= "\t".'.entry-title, .widget-title { font-family: '.$options['title_font'].'; }'."\n";
    $style .= '</style>'."\n";
    echo $style;
}

function desire_header_style() {
    global $options;
    ?>
    <style type="text/css">
	#header { background: url(<?php header_image(); ?>) repeat; }
	#header .site-title, #header .site-title a, #header .site-desc { color: #<?php echo get_header_textcolor(); ?>; text-shadow: none; }
	#header .site-title { font-size: 30px; font-family: Georgia, serif; font-style: italic; font-weight: 700; }
        #header .site-desc { font-size: 12px; margin-top: 8px; }
        <?php
        if('blank' == get_header_textcolor()):
        ?>
        #header .site-title, #header .site-desc { display: none; }
        <?php endif; ?>
    </style>
    <?php
}

function desire_admin_header_style() {
    global $options;
    ?>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/fonts/stylesheet.css" />
    <style type="text/css">
	#headimg { width: <?php echo HEADER_IMAGE_WIDTH; ?>px; height: <?php echo HEADER_IMAGE_HEIGHT; ?>px; background-repeat: repeat; background-color: #777; }
	#headimg h1 { font-size: 30px; font-family: Georgia, serif; font-style: italic; font-weight: 700; margin: 45px 0 0 20px; padding: 0; line-height: 1; text-shadow: none; }
	#headimg h1 a { text-decoration: none; }
        #headimg #desc { font-family: Helvetica, Arial, sans-serif; font-size: 12px; text-shadow: none; margin: 8px 0 0 20px; }
    </style>
    <?php
}

function desire_custom_background() {
    global $options;
    $style = '';
    if($options['background_image'] != '') {
	$style .= "\t".'body { background-image: url('.$options['background_image'].'); }'."\n";
	$style .= "\t".'body { background-repeat: '.$options['background_repeat'].'; }'."\n";
	$style .= "\t".'body { background-position: '.$options['background_position'].'; }'."\n";
	$style .= "\t".'body { background-attachment: '.$options['background_scroll'].'; }'."\n";
    }
    $style .= "\t".'body { background-color: #'.$options['background_color'].'; }'."\n";
    return $style;
}

function desire_page_menu_args($args) {
    $args['show_home'] = false;
    $args['menu_class'] = 'main-menu';
    return $args;
}

function desire_auto_excerpt_more($more) {
    global $options;
    return '<p><a class="more-link" href="'.esc_url(get_permalink()).'">' . __('Read more <span class="more-sep">[+]</span>', 'desire') . '</a></p>';
}

function desire_custom_excerpt_more($output) {
    global $options;
    if (has_excerpt() && ! is_attachment()) {
        $output .= '<p><a class="more-link" href="'.esc_url(get_permalink()).'">' . __('Read more <span class="more-sep">[+]</span>', 'desire') . '</a></p>';
    }
    return $output;
}

function desire_posted_on() {
    $posted_on = '<a class="entry-date" href="'.esc_url(get_permalink()).'" title="'.esc_attr(get_the_time()).'" rel="bookmark">'.date_i18n(get_option('date_format'), strtotime(esc_html(get_the_date()))).'</a> ';
    $posted_on .= '<a class="entry-author" href="'.esc_url(get_author_posts_url(get_the_author_meta('ID'))).'" title="'.__('View all posts by ','desire').get_the_author().'" rel="author">'.get_the_author().'</a>';
    echo $posted_on;
}

function desire_theme_utility() {
    $utility_text = "";
    $categories_list = get_the_category_list(__(', ', 'desire'));
    $tag_list = get_the_tag_list('', __(', ', 'desire'));
    if($categories_list != "")
        $utility_text = __('Posted in ','desire').$categories_list;
    if($tag_list != "")
        $utility_text = __('Tagged as ','desire').$tag_list;
    if($categories_list != "" and $tag_list != "")
        $utility_text = __('Posted in ','desire').$categories_list.__(' and tagged as ','desire').$tag_list;

    if($utility_text != "") {
        echo '<div class="entry-utility">';
        echo $utility_text;
        echo '</div>';
    }
}

/*
 * Adds custom post types: Slide & Portfolio
 */
function desire_init_custom_post() {
    desire_custom_post('slide');
}

function desire_custom_post($name) {
    $post_type_args = array(
        'labels' => array(
            'name' => _x(ucwords($name), 'post type general name', 'desire'),
            'singular_name' => _x(ucwords($name), 'post type singular name', 'desire'),
            'add_new' => _x('Add New '.ucwords($name),ucwords($name), 'desire'),
            'add_new_item' => __('Add New '.ucwords($name), 'desire'),
            'edit_item' => __('Edit '.ucwords($name), 'desire'),
            'new_item' => __('New '.ucwords($name), 'desire'),
            'view_item' => __('View '.ucwords($name), 'desire'),
            'search_items' => __('Search '.ucwords($name).'s', 'desire'),
            'not_found' =>  __('No '.ucwords($name).'s found', 'desire'),
            'not_found_in_trash' => __('No '.ucwords($name).'s found in Trash', 'desire'),
            'parent_item_colon' => ''
        ),
        'public' => true,
        'exclude_from_search' => true,
        'supports' => array('title','thumbnail','editor')
    );
    register_post_type($name,$post_type_args);
}

function desire_slider_posts() {
    global $options;
    if($options['enable_automatic_slideshow']) $type = 'post'; else $type = 'slide';
    $entries = desire_get_posts($options['slideshow_count'],200,$type,'slide-img');
    if(is_front_page() and $options['enable_slideshow']) {
        if($type == 'post' or wp_count_posts('slide','')->publish > 1) {
            echo '<div class="slideshow-container">';
            echo '<ul class="slideshow">';
            $first = true;
            foreach($entries as $entry) {
                if($first) $class='class="show"'; else $class = '';
                echo '<li '.$class.'><a href="'.$entry['permalink'].'">'.$entry['thumbnail'].'</a></li>';
                $first = false;
            }
            echo '</ul>';
            echo '</div>';
        }
    }
}

function desire_get_recent_posts($number) {
    $entries = desire_get_posts($number,50,'post','recent-img');
    $output = "";
    foreach($entries as $entry) {
        $output .= '<div class="recent-entry clearfix">';
        $output .= '<a title="'.$entry['title'].'" class="recent-thumb" href="'.$entry['permalink'].'">'.$entry['thumbnail'].'</a>';
        $output .= '<div class="recent-info"><h4><a href="'.$entry['permalink'].'">'.$entry['title'].'</a></h4><p>'.$entry['excerpt'].'</p></div>';
        $output .= '</div>';
    }
    echo $output;
}

function desire_get_recent_comments($number, $avatarsize = 48) {
    $args = array('number' => $number);
    $comments = get_comments($args);
    $output = "";
    foreach($comments as $comment) {
        $commentemail = $comment->comment_author_email;
        $commentavatar = get_avatar($commentemail,$avatarsize);
        $commentid = $comment->comment_ID;
        $commentdesc = desire_trim_words(get_comment_excerpt($commentid),50);
        $commentpostid = $comment->comment_post_ID;
        $posturl = get_permalink($commentpostid);
        $output .= '<div class="recent-entry clearfix">';
        $output .= '<a title="'.__('Comment on ','desire').get_the_title($commentpostid).'" class="recent-thumb" href="'.$posturl.'#comment-'.$commentid.'">'.$commentavatar.'</a>';
        $output .= '<div class="recent-info"><a title="'.__('Comment on ','desire').get_the_title($commentpostid).'" href="'.$posturl.'#comment-'.$commentid.'">'.$commentdesc.'</a></div>';
        $output .= '</div>';
    }
    echo $output;
}

function desire_get_pagination($range = 4){
    global $paged, $wp_query;
    if ( !$max_page ) {
        $max_page = $wp_query->max_num_pages;
    }
    if($max_page > 1){
        echo '<div class="navigation clearfix">'."\n";
        if(!$paged){
            $paged = 1;
        }
        if($paged != 1){
            echo "<a href=" . get_pagenum_link(1) . ">".__('First','desire')."</a>";
        }
        previous_posts_link(' &laquo; ');
        if($max_page > $range){
            if($paged < $range){
                for($i = 1; $i <= ($range + 1); $i++){
                    echo "<a href='" . get_pagenum_link($i) ."'";
                    if($i==$paged) echo " class='current'";
                    echo ">".number_format_i18n($i)."</a>";
                }
            }
            elseif($paged >= ($max_page - ceil(($range/2)))){
                for($i = $max_page - $range; $i <= $max_page; $i++){
                    echo "<a href='" . get_pagenum_link($i) ."'";
                    if($i==$paged) echo " class='current'";
                    echo ">".number_format_i18n($i)."</a>";
                }
            }
            elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
                for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){
                    echo "<a href='" . get_pagenum_link($i) ."'";
                    if($i==$paged) echo " class='current'";
                    echo ">".number_format_i18n($i)."</a>";
                }
            }
        }
        else{
            for($i = 1; $i <= $max_page; $i++){
                echo "<a href='" . get_pagenum_link($i) ."'";
                if($i==$paged) echo " class='current'";
                echo ">".number_format_i18n($i)."</a>";
            }
        }
        next_posts_link(' &raquo; ');
        if($paged != $max_page){
            echo " <a href=" . get_pagenum_link($max_page) . ">".__('Last','desire')."</a>";
        }
        echo '</div>'."\n";
    }
}

function desire_breadcrumbs() {
    $delimiter = '<span class="sep">//</span>';
    $home = __('Home','desire'); // text for the 'Home' link
    $before = '<span class="current">'; // tag before the current crumb
    $after = '</span>'; // tag after the current crumb
    if (!is_home() && !is_front_page() || is_paged()) {
        echo '<div id="crumbs">';
        global $post;
        $homeLink = home_url();
        echo '<a href="'.$homeLink.'">'.$home.'</a> '.$delimiter.' ';
        if (is_category()) {
            global $wp_query;
            $cat_obj = $wp_query->get_queried_object();
            $thisCat = $cat_obj->term_id;
            $thisCat = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);
            if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' '.$delimiter.' '));
            echo $before.__('Archive by category','desire').' "'.single_cat_title('', false).'"'.$after;
        } elseif (is_day()) {
            echo '<a href="'.get_year_link(get_the_time('Y')).'">'.get_the_time('Y').'</a> '.$delimiter.' ';
            echo '<a href="'.get_month_link(get_the_time('Y'),get_the_time('m')).'">'.get_the_time('F').'</a> '.$delimiter.' ';
            echo $before.get_the_time('d').$after;
        } elseif (is_month()) {
            echo '<a href="'.get_year_link(get_the_time('Y')).'">'.get_the_time('Y').'</a> '.$delimiter.' ';
            echo $before.get_the_time('F').$after;
        } elseif (is_year()) {
            echo $before.get_the_time('Y').$after;
        } elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<a href="'.$homeLink.'/'.$slug['slug'].'/">'.$post_type->labels->singular_name.'</a> '.$delimiter.' ';
                echo $before.get_the_title().$after;
            } else {
                $cat = get_the_category(); $cat = $cat[0];
                echo get_category_parents($cat, TRUE, ' '.$delimiter.' ');
                echo $before.get_the_title().$after;
            }
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $post_type = get_post_type_object(get_post_type());
            echo $before.$post_type->labels->singular_name.$after;
        } elseif (is_attachment()) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' '.$delimiter.' ');
            echo '<a href="'.get_permalink($parent).'">'.$parent->post_title.'</a> '.$delimiter.' ';
            echo $before.get_the_title().$after;
        } elseif (is_page() && !$post->post_parent) {
            echo $before.get_the_title().$after;
        } elseif (is_page() && $post->post_parent) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a href="'.get_permalink($page->ID).'">'.get_the_title($page->ID).'</a>';
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            foreach ($breadcrumbs as $crumb) echo $crumb.' '.$delimiter.' ';
                echo $before.get_the_title().$after;
        } elseif (is_search()) {
            echo $before.__('Search results for','desire').' "'.get_search_query().'"'.$after;
        } elseif (is_tag()) {
            echo $before.__('Posts tagged','desire').' "'.single_tag_title('', false).'"'.$after;
        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo $before.__('Articles posted by','desire').' '.$userdata->display_name.$after;
        } elseif (is_404()) {
            echo $before.__('Error 404','desire').' '. $after;
        }
        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ' (';
            echo __('Page','desire').' '.get_query_var('paged');
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ')';
        }
        echo '</div>';
    }
}

function desire_social_links() {
    global $options;
    $output = '';
    if(trim($options['facebook_user']) != '') $output .= '<a class="social-links" href="http://www.facebook.com/'.$options['facebook_user'].'"><img src="'.get_template_directory_uri().'/images/social_icons/facebook.png"/></a>';
    if(trim($options['facebook_user']) != '') $output .= '<a class="social-links" href="http://www.twitter.com/'.$options['twitter_user'].'"><img src="'.get_template_directory_uri().'/images/social_icons/twitter.png"/></a>';
    if($options['enable_rss']) $output .= '<a class="social-links" href="'.get_bloginfo('rss2_url').'"><img src="'.get_template_directory_uri().'/images/social_icons/rss.png"/></a>';
    return $output;
}

function desire_get_posts($number=5, $excerpt_length=50, $post_type='', $class='') { //$size is an array of height & width
    $args = 'numberposts='.$number;
    $output = array();
    if($post_type != '')
        $args .= '&post_type='.$post_type;
    $entries = get_posts($args);
    foreach($entries as $entry) {
        setup_postdata($entry);
        $postid = $entry->ID;
        $posttitle = $entry->post_title;
        $postdate = $entry->post_date;
        $postlink = get_permalink($entry->ID);
        $postexcerpt = desire_trim_words(get_the_excerpt(),$excerpt_length);
        $postcontent = $entry->post_content;
        $postcategory = get_the_category($postid);
        $postcategory = $postcategory[0]->cat_name;
        $comment_count = $entry->comment_count;
        $postthumb = desire_post_image($postid,$posttitle,$postexcerpt,$postcontent,$class);
        array_push($output, array('id' => $postid, 'title' => $posttitle, 'date' => $postdate, 'permalink' => $postlink, 'excerpt' => $postexcerpt, 'content' => $postcontent, 'category' => $postcategory, 'thumbnail' => $postthumb, 'comment_count' => $comment_count));
    }
    return $output;
}

function desire_post_image($postid, $posttitle='', $postexcerpt = '', $postcontent = '', $class = '') {
    global $options;
    if($class == 'slide-img') {
	$width = DESIRE_WRAPPER_WIDTH;
        $height = 'auto';
    } elseif($class == 'featured-img') {
	$width = $options['content_width'];
        $height = 'auto';
    } elseif($class == 'recent-img') {
	$width = 48;
        $height = '48px';
    } elseif($class == 'magazine-img') {
	$width = 200;
        $height = 'auto';
    }
    if(has_post_thumbnail($postid)) {
	$thumb_attr = array(
	    'alt' => trim(strip_tags($postexcerpt)),
	    'title' => trim(strip_tags($posttitle))
	);
        return get_the_post_thumbnail($postid,$class,$thumb_attr);
    } else {
        $url = desire_automatic_image($postcontent,$class);
        if(trim($url) != '')
	    return '<img src="'.$url.'" title="'.strip_tags($posttitle).'" alt="'.strip_tags($postexcerpt).'" style="width:'.$width.'px; height: '.$height.';"/>';
        else
            return "";
    }
}

function desire_automatic_image($content, $class = '') {
    global $options;
    if(preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i',$content, $matches) > 0) {
        $pos1 = strpos($matches[0],'src=');
        $newUrl = substr_replace($matches[0],"",0,$pos1);
        $newUrl = str_replace('src="','',$newUrl);
        $imgUrl = $newUrl;
    } else if($class != 'featured-img' and $class != 'magazine-img')
        $imgUrl = get_template_directory_uri().'/colors/'.$options['color_scheme'].'/images/default-'.$class.'.jpg';
    else $imgUrl = '';
    return $imgUrl;
}

if(!function_exists('desire_list_comments')):
function desire_list_comments($comment, $args, $depth) {
    global $isMobile;
    $GLOBALS['comment'] = $comment;
    switch ($comment->comment_type):
        case 'pingback':
        case 'trackback':
    ?>
        <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
        <div class="comment-ping">
            <h3 class="comment-author"><?php comment_author_link(); ?></h3>
            <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>"><?php printf(__('%1$s at %2$s','desire'), get_comment_date(),  get_comment_time()); ?></a><?php edit_comment_link(__('Edit','desire'),', ',''); ?>
        </div>
    <?php
            break;
            default:
    ?>
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
            <div id="comment-<?php comment_ID(); ?>">
                <?php if($isMobile) $avatar_size = 32; else $avatar_size = 48; ?>
                <div class="comment-avatar"><?php echo get_avatar($comment, $avatar_size); ?></div>
                <div class="comment-meta">
                    <h3 class="comment-author"><?php echo get_comment_author_link(); ?></h3>
                    <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>"><?php printf(__('%1$s at %2$s','desire'), get_comment_date(),  get_comment_time()); ?></a><?php edit_comment_link(__('Edit','desire'),', ',''); ?>
                </div>
                <?php if ($comment->comment_approved == '0') : ?>
                <div class="comment-status"><?php _e('Your comment is awaiting moderation','desire'); ?></div>
                <?php endif; ?>
                <div class="comment-content"><?php comment_text(); ?></div>
                <div class="comment-info">
                    <?php comment_reply_link(array_merge($args, array('reply_text' => __('Reply', 'desire'), 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                </div>
            </div>
    <?php
        break;
    endswitch;
}
endif;

function desire_trim_words($str, $n, $delim='...') {
    $len = strlen($str);
    if ($len > $n) {
        preg_match('/(.{' . $n . '}.*?)\b/', $str, $matches);
        return rtrim($matches[1]) . $delim;
    } else {
        return $str;
    }
}
?>
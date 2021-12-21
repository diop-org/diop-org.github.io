<?php
/*
@package WordPress
@subpackage Desire
*/
?>
<?php
/* Dropdown values */
$desire_font_list = array(
    'Helvetica, Arial, sans-serif' => array('value' => 'Helvetica, Arial, sans-serif', 'label' => __('Helvetica, Arial','desire')),
    'Verdana, Geneva, sans-serif' => array('value' => 'Verdana, Geneva, sans-serif', 'label' => __('Verdana','desire')),
    'Georgia, serif' => array('value' => 'Georgia, serif', 'label' => __('Georgia','desire')),
);

$desire_site_title_font_list = array(
    '"RockSaltRegular"' => array('value' => '"RockSaltRegular"', 'label' => __('Rock Salt','desire')),
    'Helvetica, Arial, sans-serif' => array('value' => 'Helvetica, Arial, sans-serif', 'label' => __('Helvetica, Arial','desire')),
    'Georgia, serif' => array('value' => 'Georgia, serif', 'label' => __('Georgia','desire')),
);

$desire_image_repeat = array(
    'repeat' => array('value' => 'repeat', 'label' => __('Repeat','desire')),
    'repeat-x' => array('value' => 'repeat-x', 'label' => __('Repeat X','desire')),
    'repeat-y' => array('value' => 'repeat-y', 'label' => __('Repeat Y','desire')),
    'no-repeat' => array('value' => 'no-repeat', 'label' => __('No Repeat','desire')),
);

$desire_image_position = array(
    'top left' => array('value' => 'top left', 'label' => __('Top Left','desire')),
    'top right' => array('value' => 'top right', 'label' => __('Top Right','desire')),
    'top center' => array('value' => 'top center', 'label' => __('Top Center','desire')),
    'bottom left' => array('value' => 'bottom left', 'label' => __('Bottom Left','desire')),
    'bottom right' => array('value' => 'bottom right', 'label' => __('Bottom Right','desire')),
    'bottom center' => array('value' => 'bottom center', 'label' => __('Bottom Center','desire')),
    'center left' => array('value' => 'center left', 'label' => __('Center Left','desire')),
    'center right' => array('value' => 'center right', 'label' => __('Center Right','desire')),
    'center center' => array('value' => 'center center', 'label' => __('Center Center','desire')),
);

$desire_background_scroll = array(
    'scroll' => array('value' => 'scroll', 'label' => __('Scroll','desire')),
    'fixed' => array('value' => 'fixed', 'label' => __('Fixed','desire')),
);

$desire_color_scheme = array(
    'light' => array('value' => 'light', 'label' => __('Light','desire'), 'bgcolor' => 'f5f5f5'),
    'dark' => array('value' => 'dark', 'label' => __('Dark','desire'), 'bgcolor' => '222222'),
);

$desire_sidebar_layout = array(
    'one-right-sidebar' => array('value' => 'one-right-sidebar', 'label' => __('One right sidebar','desire')),
    'one-left-sidebar' => array('value' => 'one-left-sidebar', 'label' => __('One left sidebar','desire')),
);

$desire_blog_style = array(
    'standard' => array('value' => 'standard', 'label' => __('Standard','desire')),
    'magazine' => array('value' => 'magazine', 'label' => __('Magazine','desire')),
);

function desire_content_font_list() {
    global $desire_font_list;
    return apply_filters('desire_content_font_list', $desire_font_list);
}

function desire_title_font_list() {
    global $desire_font_list;
    return apply_filters('desire_title_font_list', $desire_font_list);
}

function desire_site_title_font_list() {
    global $desire_site_title_font_list;
    return apply_filters('desire_site_title_font_list', $desire_site_title_font_list);
}

function desire_background_repeat() {
    global $desire_image_repeat;
    return apply_filters('desire_background_repeat', $desire_image_repeat);
}

function desire_background_position() {
    global $desire_image_position;
    return apply_filters('desire_background_position', $desire_image_position);
}

function desire_background_scroll() {
    global $desire_background_scroll;
    return apply_filters('desire_background_scroll', $desire_background_scroll);
}

function desire_color_scheme() {
    global $desire_color_scheme;
    return apply_filters('desire_color_scheme', $desire_color_scheme);
}

function desire_sidebar_layout() {
    global $desire_sidebar_layout;
    return apply_filters('desire_sidebar_layout', $desire_sidebar_layout);
}

function desire_blog_style() {
    global $desire_blog_style;
    return apply_filters('desire_blog_style', $desire_blog_style);
}
?>
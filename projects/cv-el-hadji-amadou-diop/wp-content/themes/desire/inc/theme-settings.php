<?php
/*
@package WordPress
@subpackage Desire
*/
?>
<?php
/* THEME SETTINGS PAGE */
require(get_template_directory().'/inc/theme-dropdowns.php');

$desire_tab_list = array(
    'typography' => array('value' => 'typography', 'label' => __('Typography','desire')),
    'background' => array('value' => 'background', 'label' => __('Background','desire')),
    'logo' => array('value' => 'logo', 'label' => __('Logo','desire')),
    'layout' => array('value' => 'layout', 'label' => __('Layout','desire')),
    'slideshow' => array('value' => 'slideshow', 'label' => __('Slideshow','desire')),
    'blog' => array('value' => 'blog', 'label' => __('Blog','desire')),
    'social' => array('value' => 'social', 'label' => __('Social','desire')),
);

add_action('admin_init', 'desire_init_options');
add_filter('option_page_capability_'.$desire_shortname.'_options', 'desire_options_page_capability');
add_action('admin_menu', 'desire_activate_options');

function desire_settings_tabs() {
    global $desire_tab_list;
    return apply_filters('desire_settings_tabs', $desire_tab_list);
}

function desire_enqueue_scripts($hook_suffix) {
    global $desire_shortname;
    wp_enqueue_script('jquery'); //Adding the JQuery script
    wp_enqueue_script('media-upload'); //Adding the media upload script
    wp_enqueue_script('thickbox'); //Adding the thickbox script for media upload
    wp_enqueue_style('thickbox'); //Adding the thickbox stylesheet for media upload
    wp_enqueue_script($desire_shortname.'_color_picker', get_template_directory_uri() . '/inc/jquery-colorpicker/jscolor.js', false, false);
    wp_enqueue_script($desire_shortname.'_admin_js', get_template_directory_uri() . '/inc/theme-settings.js', array('jquery'), false);
    wp_enqueue_style($desire_shortname.'_admin_css', get_template_directory_uri() . '/inc/theme-settings.css', false, false, 'all');
}

function desire_get_options() {
    global $desire_shortname;
    return get_option($desire_shortname.'_options', desire_default_options());
}

function desire_init_options() {
    global $desire_shortname;
    if(false === desire_get_options()) add_option($desire_shortname.'_options', desire_default_options());
    register_setting($desire_shortname.'_options', $desire_shortname.'_options', 'desire_validate_options');
}

function desire_options_page_capability($capability) {
    return 'edit_theme_options';
}

function desire_activate_options() {
    global $desire_shortname;
    $desire_theme_page = add_theme_page(__(ucwords($desire_shortname).' Settings','desire'), __(ucwords($desire_shortname).' Settings','desire'), 'edit_theme_options', 'desire_theme_options', 'desire_render_options_page');
    if(!$desire_theme_page) return;
    add_action('admin_print_styles-' . $desire_theme_page, 'desire_enqueue_scripts');
}

function desire_default_options() {
    $default_options = array(
        'content_font' => 'Helvetica, Arial, sans-serif',
        'title_font' => 'Helvetica, Arial, sans-serif',
        'sidebar_layout' => 'one-right-sidebar',
        'color_scheme' => 'light',
        'content_width' => 570,
        'sidebar_width' => 200,
		'mobile_friendly' => true,
        'enable_slideshow' => true,
        'enable_automatic_slideshow' => true,
        'slideshow_count' => 5,
		'slide_interval' => 3,
        'logo_image' => '',
        'favicon_image' => '',
        'background_color' => 'DDDDDD',
        'background_image' => '',
        'background_repeat' => 'repeat',
        'background_position' => 'top left',
        'background_scroll' => 'fixed',
        'blog_style' => 'standard',
        'show_excerpts' => false,
        'show_featured' => false,
        'show_breadcrumbs' => true,
        'show_search' => true,
		'show_page_meta' => true,
		'show_single_utility' => true,
		'facebook_user' => '',
        'twitter_user' => '',
        'enable_rss' => true,
    );
    return apply_filters('desire_default_options', $default_options);
}

function desire_render_options_page() {
    global $desire_shortname;
    if(isset($_POST['desire_reset_button'])) {
        delete_option($desire_shortname.'_options');
        add_settings_error($desire_shortname.'_options',$desire_shortname.'_reset_options','Default settings restored','updated');
    }
    ?>
    <div class="wrap">
        <div class="icon32" id="icon-options-general"></div>
        <h2 class="theme-title"><?php _e(ucwords($desire_shortname).' Settings','desire'); ?></h2>
        <hr class="line"/>
        <div class="theme-credit">
            <p><strong><?php _e('This theme is designed and developed by ','desire'); ?><a href="http://www.nischalmaniar.com"><?php _e('Nischal Maniar','desire'); ?></a></strong></p>
            <p>
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" style="margin-top:10px;">
                    <input type="hidden" name="cmd" value="_s-xclick">
                    <input type="hidden" name="hosted_button_id" value="5GY3AWKND3GTC">
                    <input style="vertical-align: middle;" type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="<?php _e('PayPal - The safer, easier way to pay online!','desire'); ?>">
                    <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                    <label style="margin-left:5px;"><strong><?php _e('Feel free to donate as an appreciation for my time and effort to develop this theme','desire'); ?></strong></label>
                </form>
            </p>
        </div>

        <?php settings_errors(); ?>

        <?php $count = 1; ?>
        <?php foreach (desire_settings_tabs() as $tab) { if($count == 1) $class = " current-tab"; else $class = ""; ?>
        <div id="settings-tab-<?php echo $tab['value']; ?>" class="settings-tab<?php echo $class; ?>">
            <?php echo $tab['label']; ?>
        </div>
        <?php $count++; } ?>
        <br />
        <form class="settings-form" method="post" id="theme-settings-form" action="options.php">
            <?php
                settings_fields($desire_shortname.'_options');
                $options = desire_get_options();
                $default_options = desire_default_options();
            ?>
            <div class="settings-section current-section" id="settings-typography">
                <table>
                    <tr>
                        <td><label><?php _e('Content','desire'); ?>:</label></td>
                        <td>
                            <?php _e('Font family','desire'); ?>
                            <select name="<?php echo $desire_shortname; ?>_options[content_font]">
                                <?php foreach (desire_content_font_list() as $content_font) { ?>
                                    <option value="<?php echo $content_font['value']; ?>" <?php selected($options['content_font'], $content_font['value']); ?>><?php echo $content_font['label']; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label><?php _e('Title','desire'); ?>:</label></td>
                        <td>
                            <?php _e('Font family','desire'); ?>
                            <select name="<?php echo $desire_shortname; ?>_options[title_font]">
                                <?php foreach (desire_title_font_list() as $title_font) { ?>
                                    <option value="<?php echo $title_font['value']; ?>" <?php selected($options['title_font'], $title_font['value']); ?>><?php echo $title_font['label']; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="settings-section" id="settings-background">
                <table>
                    <tr>
                        <td><label><?php _e('Background Color','desire'); ?>:</label></td>
                        <td>
                            <input id="bgcolorfield" type="text" name="<?php echo $desire_shortname; ?>_options[background_color]" class="color" value="<?php echo esc_attr($options['background_color']); ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td><label><?php _e('Background Image','desire'); ?>:</label></td>
                        <td>
                            <input type="text" name="<?php echo $desire_shortname; ?>_options[background_image]" class="img_field" id="background-upload" size="36" value="<?php echo esc_attr($options['background_image']); ?>"/>
                            <input id="background-upload-button" type="button" class="upload_img button-secondary" value="<?php _e('Upload Backgound Image','desire'); ?>" />
                        </td>
                        <td>
                            <span id="background-upload-error" class="field-error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label><?php _e('Background Repeat','desire'); ?>:</label></td>
                        <td>
                            <select name="<?php echo $desire_shortname; ?>_options[background_repeat]">
                                <?php foreach (desire_background_repeat() as $background_repeat) { ?>
                                    <option value="<?php echo $background_repeat['value']; ?>" <?php selected($options['background_repeat'], $background_repeat['value']); ?>><?php echo $background_repeat['label']; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label><?php _e('Background Position','desire'); ?>:</label></td>
                        <td>
                            <select name="<?php echo $desire_shortname; ?>_options[background_position]">
                                <?php foreach (desire_background_position() as $background_position) { ?>
                                    <option value="<?php echo $background_position['value']; ?>" <?php selected($options['background_position'], $background_position['value']); ?>><?php echo $background_position['label']; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label><?php _e('Background Scroll','desire'); ?>:</label></td>
                        <td>
                            <select name="<?php echo $desire_shortname; ?>_options[background_scroll]">
                                <?php foreach (desire_background_scroll() as $background_scroll) { ?>
                                    <option value="<?php echo $background_scroll['value']; ?>" <?php selected($options['background_scroll'], $background_scroll['value']); ?>><?php echo $background_scroll['label']; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label><?php _e('Color Scheme','desire'); ?>:</label></td>
                        <td>
                            <?php foreach (desire_color_scheme() as $color_scheme) { ?>
                                <input class="settings-radio" type="radio" name="<?php echo $desire_shortname; ?>_options[color_scheme]" value="<?php echo $color_scheme['value']; ?>" <?php checked($options['color_scheme'], $color_scheme['value']); ?>><img class="settings-radio-img" src="<?php echo get_template_directory_uri(); ?>/inc/images/image_bg.png" style="background-color: #<?php echo $color_scheme['bgcolor']; ?>;"/>
                            <?php } ?>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="settings-section" id="settings-logo">
                <table>
                    <tr>
                        <td style="vertical-align:top; padding-top:10px;"><label><?php _e('Logo Image','desire'); ?>:</label></td>
                        <td>
                            <input type="text" name="<?php echo $desire_shortname; ?>_options[logo_image]" class="img_field" id="logo-upload" size="36" value="<?php echo esc_attr($options['logo_image']); ?>"/>
                            <input id="logo-upload-button" type="button" class="upload_img button-secondary" value="<?php _e('Upload Logo Image','desire'); ?>" />
                            <p class="form-field-meta"><?php _e('For best results upload a 150 x 150 pixels size image','desire'); ?></p>
                        </td>
                        <td style="vertical-align:top; padding-top:10px;">
                            <span id="logo-upload-error" class="field-error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top; padding-top:10px;"><label><?php _e('Favicon Image','desire'); ?>:</label></td>
                        <td>
                            <input type="text" name="<?php echo $desire_shortname; ?>_options[favicon_image]" class="img_field" id="favicon-upload" size="36" value="<?php echo esc_attr($options['favicon_image']); ?>"/>
                            <input id="favicon-upload-button" type="button" class="upload_img button-secondary" value="<?php _e('Upload Favicon Image','desire'); ?>" />
                            <p class="form-field-meta"><?php _e('Favicon image cannot exceed more than 16 x 16 pixels in size','desire'); ?></p>
                        </td>
                        <td style="vertical-align:top; padding-top:10px;">
                            <span id="favicon-upload-error" class="field-error"></span>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="settings-section" id="settings-layout">
                <table>
                    <tr>
                        <td><label><?php _e('Sidebar Layout','desire'); ?>:</label></td>
                        <td>
                            <?php foreach (desire_sidebar_layout() as $sidebar_layout) { ?>
                                <input class="settings-radio" type="radio" name="<?php echo $desire_shortname; ?>_options[sidebar_layout]" value="<?php echo $sidebar_layout['value']; ?>" <?php checked($options['sidebar_layout'], $sidebar_layout['value']); ?>><img class="settings-radio-img" src="<?php echo get_template_directory_uri(); ?>/inc/images/<?php echo $sidebar_layout['value']; ?>.png"/>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label><?php _e('Content Width','desire'); ?>:</label></td>
                        <td>
                            <input type="text" class="number_field" id="content-width" name="<?php echo $desire_shortname; ?>_options[content_width]" value="<?php echo esc_attr($options['content_width']); ?>"/>
                            <span id="content-width-error" style="margin-left:5px;" class="field-error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label><?php _e('Sidebar Width','desire'); ?>:</label></td>
                        <td>
                            <input type="text" class="number_field" id="sidebar-width" name="<?php echo $desire_shortname; ?>_options[sidebar_width]" value="<?php echo esc_attr($options['sidebar_width']); ?>"/>
                            <span id="sidebar-width-error" style="margin-left:5px;" class="field-error"></span>
                        </td>
                    </tr>
		    <tr>
                        <td><label><?php _e('Mobile friendly layout ?','desire'); ?>:</label></td>
                        <td>
                            <input type="checkbox" name="<?php echo $desire_shortname; ?>_options[mobile_friendly]" value="true" <?php checked(true,$options['mobile_friendly']); ?> />
                        </td>
                    </tr>
                </table>
            </div>

            <div class="settings-section" id="settings-slideshow">
                <table>
                    <tr>
                        <td><label><?php _e('Display post slideshow on front page ?','desire'); ?>:</label></td>
                        <td>
                            <input type="checkbox" name="<?php echo $desire_shortname; ?>_options[enable_slideshow]" value="true" <?php checked(true,$options['enable_slideshow']); ?> />
                        </td>
                    </tr>
                    <tr>
                        <td><label><?php _e('Automatically using existing posts for slideshow ?','desire'); ?>:</label></td>
                        <td>
                            <input type="checkbox" name="<?php echo $desire_shortname; ?>_options[enable_automatic_slideshow]" value="true" <?php checked(true,$options['enable_automatic_slideshow']); ?> />
                            <span style="margin-left:10px;"><?php _e('If you do not want to automatically generate the slideshow, then add new slide items from the "Slide" section in the sidebar','desire'); ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label><?php _e('Number of slides','desire'); ?>:</label></td>
                        <td>
                            <input type="text" class="number_field" id="slides-number" name="<?php echo $desire_shortname; ?>_options[slideshow_count]" value="<?php echo esc_attr($options['slideshow_count']); ?>"/>
                            <span id="slides-number-error" style="margin-left:5px;" class="field-error"></span>
                        </td>
                    </tr>
		    <tr>
                        <td><label><?php _e('Interval between each slide (in seconds)','desire'); ?>:</label></td>
                        <td>
                            <input type="text" class="number_field" id="slides-interval" name="<?php echo $desire_shortname; ?>_options[slide_interval]" value="<?php echo esc_attr($options['slide_interval']); ?>"/>
                            <span id="slides-interval-error" style="margin-left:5px;" class="field-error"></span>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="settings-section" id="settings-blog">
                <table>
                    <tr>
                        <td><label><?php _e('Blog Style','desire'); ?>:</label></td>
                        <td>
                            <select name="<?php echo $desire_shortname; ?>_options[blog_style]">
                                <?php foreach (desire_blog_style() as $blog_style) { ?>
                                    <option value="<?php echo $blog_style['value']; ?>" <?php selected($options['blog_style'], $blog_style['value']); ?>><?php echo $blog_style['label']; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label><?php _e('Show excerpts for non-single templates ?','desire'); ?>:</label></td>
                        <td>
                            <input type="checkbox" name="<?php echo $desire_shortname; ?>_options[show_excerpts]" value="true" <?php checked(true,$options['show_excerpts']); ?> />
                        </td>
                    </tr>
                    <tr>
                        <td><label><?php _e('Show featured image for non-single templates ?','desire'); ?>:</label></td>
                        <td>
                            <input type="checkbox" name="<?php echo $desire_shortname; ?>_options[show_featured]" value="true" <?php checked(true,$options['show_featured']); ?> />
                        </td>
                    </tr>
                    <tr>
                        <td><label><?php _e('Show breadcrumbs ?','desire'); ?>:</label></td>
                        <td>
                            <input type="checkbox" name="<?php echo $desire_shortname; ?>_options[show_breadcrumbs]" value="true" <?php checked(true,$options['show_breadcrumbs']); ?> />
                        </td>
                    </tr>
                    <tr>
                        <td><label><?php _e('Show default search box ?','desire'); ?>:</label></td>
                        <td>
                            <input type="checkbox" name="<?php echo $desire_shortname; ?>_options[show_search]" value="true" <?php checked(true,$options['show_search']); ?> />
                        </td>
                    </tr>
		    <tr>
                        <td><label><?php _e('Show meta information for pages ?','desire'); ?>:</label></td>
                        <td>
                            <input type="checkbox" name="<?php echo $desire_shortname; ?>_options[show_page_meta]" value="true" <?php checked(true,$options['show_page_meta']); ?> />
                        </td>
                    </tr>
		    <tr>
                        <td><label><?php _e('Show categories & tags for posts ?','desire'); ?>:</label></td>
                        <td>
                            <input type="checkbox" name="<?php echo $desire_shortname; ?>_options[show_single_utility]" value="true" <?php checked(true,$options['show_single_utility']); ?> />
                        </td>
                    </tr>
                </table>
            </div>

            <div class="settings-section" id="settings-social">
                <p><?php _e('Enter only your username','desire'); ?></p>
                <table>
                    <tr>
                        <td><label><?php _e('Facebook','desire'); ?>:</label></td>
                        <td>
                            <img style="vertical-align: middle;" src="<?php echo get_template_directory_uri(); ?>/inc/images/facebook.png"/>
                            <input type="text" class="social-field" id="facebook-user" name="<?php echo $desire_shortname; ?>_options[facebook_user]" value="<?php echo esc_attr($options['facebook_user']); ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td><label><?php _e('Twitter','desire'); ?>:</label></td>
                        <td>
                            <img style="vertical-align: middle;" src="<?php echo get_template_directory_uri(); ?>/inc/images/twitter.png"/>
                            <input type="text" class="social-field" id="twitter-user" name="<?php echo $desire_shortname; ?>_options[twitter_user]" value="<?php echo esc_attr($options['twitter_user']); ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td><label><?php _e('Show RSS ?','desire'); ?>:</label></td>
                        <td>
                            <img style="vertical-align: middle;" src="<?php echo get_template_directory_uri(); ?>/inc/images/rss.png"/>
                            <input type="checkbox" name="<?php echo $desire_shortname; ?>_options[enable_rss]" value="true" <?php checked(true,$options['enable_rss']); ?> />
                        </td>
                    </tr>
                </table>
            </div>
            <?php submit_button(); ?>
        </form>
        <form class="form" method="post" id="reset-form" style="text-align: right; margin-top: 10px;" onsubmit="return confirmAction()">
                <input type="submit" class="button-secondary" name="desire_reset_button" id="desire_reset_button" value="<?php _e('Reset Settings','desire'); ?>" />
            </form>
    </div>
    <?php
}

function desire_validate_options($input) {
    global $desire_shortname;
    $output = $defaults = desire_default_options();

    //Validating dropdowns and radio options
    if (isset($input['content_font']) && array_key_exists($input['content_font'], desire_content_font_list()))
	$output['content_font'] = $input['content_font'];
    if (isset($input['title_font']) && array_key_exists($input['title_font'], desire_title_font_list()))
	$output['title_font'] = $input['title_font'];
    if (isset($input['background_repeat']) && array_key_exists($input['background_repeat'], desire_background_repeat()))
	$output['background_repeat'] = $input['background_repeat'];
    if (isset($input['background_position']) && array_key_exists($input['background_position'], desire_background_position()))
	$output['background_position'] = $input['background_position'];
    if (isset($input['background_scroll']) && array_key_exists($input['background_scroll'], desire_background_scroll()))
	$output['background_scroll'] = $input['background_scroll'];
    if (isset($input['sidebar_layout']) && array_key_exists($input['sidebar_layout'], desire_sidebar_layout()))
	$output['sidebar_layout'] = $input['sidebar_layout'];
    if (isset($input['color_scheme']) && array_key_exists($input['color_scheme'], desire_color_scheme()))
	$output['color_scheme'] = $input['color_scheme'];
    if (isset($input['blog_style']) && array_key_exists($input['blog_style'], desire_blog_style()))
	$output['blog_style'] = $input['blog_style'];

    //Validating Color Boxes
    if(desire_validate_color($input['background_color']))
        $output['background_color'] = $input['background_color'];

    //Validating Image fields
    if(trim($input['background_image'] == "") or desire_validate_image_url($input['background_image']))
        $output['background_image'] = $input['background_image'];
    else
        add_settings_error($desire_shortname.'_options', 'invalid-background-image', 'Invalid background image URL', 'error');
    if(trim($input['logo_image'] == "") or desire_validate_image_url($input['logo_image']))
        $output['logo_image'] = $input['logo_image'];
    else
        add_settings_error($desire_shortname.'_options', 'invalid-logo-image', 'Invalid logo image URL', 'error');
    if(trim($input['favicon_image'] == "") or desire_validate_image_url($input['favicon_image'])) {
        if(desire_validate_image_size($input['favicon_image'],16,16))
            $output['favicon_image'] = $input['favicon_image'];
        else
            add_settings_error($desire_shortname.'_options', 'invalid-favicon-size', __('Favicon size cannot exceed 16 x 16 pixels','desire'), 'error');
    } else {
        add_settings_error($desire_shortname.'_options', 'invalid-favicon-image', 'Invalid favicon image URL', 'error');
    }

    //Validating number fields
    if(desire_validate_number($input['content_width'],400,1000)) {
        $output['content_width'] = $input['content_width'];
    } else {
        add_settings_error($desire_shortname.'_options', 'invalid-content-width', 'Content width should be a number and should be in the range from 400 to 1000 pixels', 'error');
    }
    if(desire_validate_number($input['sidebar_width'],100,350)) {
        $output['sidebar_width'] = $input['sidebar_width'];
    } else {
        add_settings_error($desire_shortname.'_options', 'invalid-sidebar-width', 'Sidebar width should be a number and should be in the range from 100 to 350 pixels', 'error');
    }
    if(desire_validate_number($input['slideshow_count'],1,20)) {
        $output['slideshow_count'] = $input['slideshow_count'];
    } else {
        add_settings_error($desire_shortname.'_options', 'invalid-slideshow-count', 'Number of slides should be a number and should be in the range from 1 to 20', 'error');
    }
    if(desire_validate_number($input['slide_interval'],1,20)) {
        $output['slide_interval'] = $input['slide_interval'];
    } else {
        add_settings_error($desire_shortname.'_options', 'invalid-slide-interval', 'Slide Interval should be a number and should be in the range from 1 to 20', 'error');
    }

    //Validating Social site usernames
    if(desire_validate_social_user($input['facebook_user']) or trim($input['facebook_user']) == "")
        $output['facebook_user'] = $input['facebook_user'];
    else
        add_settings_error($desire_shortname.'_options', 'invalid-facebook-user', 'Invalid facebook username', 'error');
    if(desire_validate_social_user($input['twitter_user']) or trim($input['twitter_user']) == "")
        $output['twitter_user'] = $input['twitter_user'];
    else
        add_settings_error($desire_shortname.'_options', 'invalid-twitter-user', 'Invalid twitter username', 'error');

    //Validating all the checkboxes
    $chkboxinputs = array('enable_slideshow','enable_automatic_slideshow','mobile_friendly','show_excerpts','show_featured','show_breadcrumbs','show_search','show_page_meta','show_single_utility','enable_rss');
    foreach($chkboxinputs as $chkbox) {
        if (!isset($input[$chkbox]))
            $input[$chkbox] = null;
        $output[$chkbox] = ($input[$chkbox] == true ? true : false);
    }

    return apply_filters('desire_validate_options', $output, $input, $defaults);
}

/* Supporting validation functions */
function desire_validate_color($color) {
    $exp = "/([A-Za-z0-9])/";
    if(!preg_match($exp,$color))
        return false;
    else
        return true;
}

function desire_validate_image_url($url) {
    $exp = "/^https?:\/\/(.)*\.(jpg|png|gif|ico)$/i";
    if(!preg_match($exp,$url))
        return false;
    else
        return true;
}

function desire_validate_image_size($url,$width,$height) {
    $size = getimagesize($url);
    if($size[0] > $width or $size[1] > $height)
        return false;
    else
        return true;
}

function desire_validate_number($value,$min,$max) {
    if(is_numeric($value)) {
        $value = intval($value);
        if($value < $min or $value > $max)
            return false;
        else
            return true;
    } else return false;
}

function desire_validate_social_user($user) {
    $exp = "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*$/";
    if(!preg_match($exp,$user))
        return false;
    else
        return true;
}

function desire_validate_email($email) {
    if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
        return false;
    }

    $email_array = explode("@", $email);
    $local_array = explode(".", $email_array[0]);
    for ($i = 0; $i < sizeof($local_array); $i++) {
        if(!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&
        ?'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$",
        $local_array[$i])) {
            return false;
        }
    }

    if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) {
        $domain_array = explode(".", $email_array[1]);
        if (sizeof($domain_array) < 2) {
            return false;
        }
        for ($i = 0; $i < sizeof($domain_array); $i++) {
            if(!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|
            ?([A-Za-z0-9]+))$",
            $domain_array[$i])) {
                return false;
            }
        }
    }
    return true;
}
?>
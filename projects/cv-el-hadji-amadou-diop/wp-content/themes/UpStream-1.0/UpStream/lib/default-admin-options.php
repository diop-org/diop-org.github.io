<?php
/**
 * Setting the default admin theme options and menus
*/

    /*********************************************
     * General Options
     *********************************************
    */

        // General Settings
        $this->admin_option('General',
            'Logo Source', 'themater_logo_source', 
            'callback', 'image', 
            array('callback' =>'themater_logo_source')
        );
        
        $this->admin_option('General', 
            'Logo Image Wrap', 'themater_logo_iamge_wrap', 
            'raw', '<div id="themater_logo_image">', 
            array('display'=>'clean')
        );
            
        $this->admin_option('General', 
            'Logo Image', 'logo', 
            'imageupload', get_template_directory_uri()  . "/images/logo.png", 
            array('display' => 'minimal', 'help' => "Enter the full url to your logo image or upload now.")
        );
        
        $this->admin_option('General', 
            'Logo Image Wrap End', 'themater_logo_iamge_wrap_end', 
            'raw', '</div>', 
            array('display'=>'clean')
        );
        
        $this->admin_option('General', 
            'Logo Text Wrap', 'themater_logo_text_wrap', 
            'raw', '<div id="themater_logo_text">', 
            array('display'=>'clean')
        );
            
        $this->admin_option('General',
            'Site Title', 'site_title', 
            'text', get_bloginfo('name'),
            array('display'=>'inline')
        );
        
        $this->admin_option('General',
            'Site Description', 'site_description', 
            'text', '', 
            array('display'=>'inline')
        );
        
        $this->admin_option('General', 
            'Logo Text Wrap End', 'themater_logo_text_wrap_end', 
            'raw', '</div>', 
            array('display'=>'clean')
        );
            
        $this->admin_option('General', 
            'Favicon', 'favicon', 
            'imageupload', get_template_directory_uri() . "/images/favicon.png", 
            array('help' => "Enter the full url to your favicon file. Leave it blank if you don't want to use a favicon.")
        );
        
        $this->admin_option('General',
            'Contact Form Email', 'contact_form_email', 
            'text', get_option('admin_email'),
            array('display' => 'extended', 'help' => 'The messages submitted from the contact form will be sent to this email address.')
        );
        
    
    /*********************************************
     * Layout Options
     *********************************************
    */
 
        $this->admin_option('Layout',
            '"Read More" Text', 'read_more', 
            'text', 'Read More'
        );
        
        
        $this->admin_option('Layout', 
            'Featured Image Options', 'featured_image_settings', 
            'content', ''
        );
        
        $this->admin_option('Layout', 
            'Featured Image Options Homepage', 'featured_image_settings_homepage', 
            'raw', '<b>&raquo;</b> Options for the featured images in the loop ( homepage, category pages, tag pages, search results and archive pages ).<br /><br />'
        );
        
        $this->admin_option('Layout',
            'Image Width', 'featured_image_width', 
            'text', '200', 
            array('display'=>'inline', 'style'=>'width: 100px;', 'suffix'=>' px.')
        );
        
        $this->admin_option('Layout',
            'Image Height', 'featured_image_height', 
            'text', '160', 
            array('display'=>'inline', 'style'=>'width: 100px;', 'suffix'=>' px.')
        );
        
        $this->admin_option('Layout',
            'Image Position', 'featured_image_position', 
            'radio', 'alignleft', 
            array('options'=>array('alignleft' => 'Left', 'alignright'=> 'Right', 'aligncenter'=>'Center') , 'display'=>'inline')
        );
        
        $this->admin_option('Layout', 
            'Featured Image Options Single', 'featured_image_settings_single', 
            'raw', '<b>&raquo;</b> Options for the featured image in the single post and single page.<br /><br />'
        );
        
        $this->admin_option('Layout',
            'Image Width', 'featured_image_width_single', 
            'text', '300', 
            array('display'=>'inline', 'style'=>'width: 100px;', 'suffix'=>' px.')
        );
        
        $this->admin_option('Layout',
            'Image Height', 'featured_image_height_single', 
            'text', '225', 
            array('display'=>'inline', 'style'=>'width: 100px;', 'suffix'=>' px.')
        );
        
        $this->admin_option('Layout',
            'Image Position', 'featured_image_position_single', 
            'radio', 'alignleft', 
            array('options'=>array('alignleft' => 'Left', 'alignright'=> 'Right', 'aligncenter'=>'Center') , 'display'=>'inline')
        );
        
        $this->admin_option('Layout', 
            'Custom Footer Text', 'footer_custom_text', 
            'textarea', '', 
            array('help' => 'Add your custom footer text. Will override the default theme generated text.', 'display'=>'extended-top', 'style'=>'height: 140px;')
        );

    /*********************************************
     * Integration
     *********************************************
    */
        $this->admin_option('Integration',
            'RSS Feed URL', 'rss_url', 
            'text', '', 
            array('help' => 'Enter your custom RSS Feed URL, Feedburner or other.', 'display'=>'extended-top')
        );
        
        $this->admin_option('Integration',
            'Custom CSS', 'custom_css', 
            'textarea', '', 
            array('help' => 'Any code you add here will appear in the head section of every page of your site. Add only the css code without &lt;style&gt;&lt;/style&gt; style blocks, they are auto inserted.', 'display'=>'extended-top', 'style'=>'height: 180px;')
        );
        
        $this->admin_option('Integration',
            'Head Code', 'head_code', 
            'textarea', '', 
            array('help' => 'Any code you add here will appear in the head section, just before &lt;/head&gt; of every page of your site.', 'display'=>'extended-top', 'style'=>'height: 180px;')
        );
        
        $this->admin_option('Integration',
            'Footer Code', 'footer_code', 
            'textarea', '', 
            array('help' => 'Any code you add here will appear just before &lt;/body&gt; tag of every page of your site.', 'display'=>'extended-top', 'style'=>'height: 180px;')
        );
        
    
   /*********************************************
     * Ads
     *********************************************
    */

    $this->admin_option('Ads', 
        'Header Banner', 'header_banner', 
        'textarea', '', 
        array('help' => 'Enter your 468x60 px. ad code. You may use any html code here, including your 468x60 px Adsense code.', 'style'=>'height: 120px;')
    ); 
    
    /*********************************************
     * Reset Options
     *********************************************
    */
    
    $this->admin_option('Reset Options',
        'Reset Theme Options', 'reset_options', 
        'content', '
        <div id="fp_reset_options" style="margin-bottom:40px; display:none;"></div>
        <div style="margin-bottom:40px;"><a class="button-primary tt-button-red" onclick="if (confirm(\'All the saved settings will be lost! Do you really want to continue?\')) { themater_form(\'admin_options&do=reset\', \'fpForm\',\'fp_reset_options\',\'true\'); } return false;">Reset Options Now</a></div>', 
        array('help' => 'Reset the theme options to default values. <span style="color:red;"><strong>Note:</strong> All the previous saved settings will be lost!</span>', 'display'=>'extended-top')
    );
    
    /*********************************************
     * Support
     *********************************************
    */
    $get_theme_data = get_theme_data(TEMPLATEPATH . '/style.css');
    $this->admin_option('Support',
        'Support', 'support',
        'raw', '<ul>
        <li><strong>Theme:</strong> ' . $get_theme_data['Name'] . ' ' . $get_theme_data['Version']  .' </li>
        <li><strong>Theme Author:</strong> <a href="' . $get_theme_data['AuthorURI'] . '" target="_blank">' . $get_theme_data['Author'] . '</a></li>
        <li><strong>Theme Homepage:</strong> <a href="' . $get_theme_data['URI'] . '" target="_blank">' . $get_theme_data['URI'] . '</a></li>
        <li><strong>Support Forums:</strong> <a href="' . $get_theme_data['AuthorURI'] . '/forum/" target="_blank">' . $get_theme_data['AuthorURI'] . '/forum/</a></li>
        </ul>'
    );
    
    $the_theme_slug_url =  str_replace(' ', '-', trim(strtolower($get_theme_data['Name'])));
    $this->admin_option('General',
        'Link Free Version', 'link_free', 
        'raw', '<div class="tt-notice">You can buy this theme without footer links online at <a href="' . $get_theme_data['AuthorURI'] . '/buy/?theme=' . $the_theme_slug_url . '" target="_blank">' . $get_theme_data['AuthorURI'] . '/buy/?theme=' . $the_theme_slug_url . '</a><br />Upgrading is easy. You will NOT lose your current settings or already made customizations.</div>', 
        array('priority' => '1')
    ); //the_theme_slug_url
    
    
    /*********************************************
     * FUNCTIONS
     *********************************************
    */
        
    function themater_logo_source()
    {
        global $theme;
        $get_logo_source = $theme->get_option('themater_logo_source');
        $logo_sources = array('image'=> 'Logo Image', 'text'=> 'Custom Text');
        
        foreach($logo_sources as $key=>$val) {
            $logo_source_selected = $get_logo_source == $key ? 'checked="checked"' : '';
            ?>
            <div id="select_logo_source_<?php echo $key; ?>" class="tt_radio_button_container">
                <input type="radio" name="themater_logo_source" value="<?php echo $key; ?>" <?php echo $logo_source_selected; ?> id="logo_source_id_<?php echo $key; ?>" /> <a href="javascript:themater_logo_source_js('<?php echo $key; ?>');" class="tt_radio_button"><?php echo $val; ?></a>
            </div>
            <?php
        }
        ?>
            <script type="text/javascript">
                function themater_logo_source_js(source)
                {
                    $thematerjQ("#themater_logo_image").hide();
                    $thematerjQ("#select_logo_source_image a").removeClass('tt_radio_button_current');
                    $thematerjQ("#select_logo_source_image").find(":radio").removeAttr("checked");
                    
                    $thematerjQ("#themater_logo_text").hide();
                    $thematerjQ("#select_logo_source_text a").removeClass('tt_radio_button_current');
                    $thematerjQ("#select_logo_source_text").find(":radio").removeAttr("checked");
                    
                    
                    $thematerjQ("#themater_logo_"+source+"").fadeIn();
                    $thematerjQ("#select_logo_source_"+source+" a").addClass('tt_radio_button_current');
                    $thematerjQ("#select_logo_source_"+source+"").find(":radio").attr("checked","checked");
                }
                jQuery(document).ready(function(){
                    themater_logo_source_js('<?php echo $get_logo_source; ?>');
                });
                
            </script>
        <?php
    }
    
?>
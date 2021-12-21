<?php
class Wiredrive_Theme_Settings
{
	private $defaults = array();
	private $options = array();
	private $optionsNs = 'wd_classic';

	public function __construct()
	{
		/*
         * Set up default values for plugin
         */
		$this->defaults = array(
			'site_alignment'         => '0 auto',
			'menu_position'          => 'left',
			'menu_functionality'     => 'block-menu',
			'page_titles'            => 'block',
			'menu_font'              => 'Corben',
			'menu_font_size'         => '14',
			'title_font'             => 'Corben',
			'title_font_size'        => '21',
			'body_font'              => 'Corben',
			'body_font_size'         => '12',
			'header_color'           => '#f0f0f0',
            'container_color'        => '#f0f0f0',
            'footer_color'           => '#f0f0f0',
            'main_menu_font_color'   => '#222222',
            'sub_menu_font_color'    => '#222222',
            'body_font_color'        => '#222222',
            'footer_font_color'      => '#222222',
            'link_font_color'        => '#ca0000',
            'link_hover_font_color'  => '#ff0000',
            'twitter_link'           => '',
            'facebook_link'          => '',
            'tracking_code'          => '',
            'footer_code'            => ''            
		);

		/*
		 * Get options saved to the database
		 */
		$this->options = get_option($this->optionsNs);

	}

    // Font varibles
    public function getFonts() {
    
        $font['Lekton'] = array('name' => 'Lekton',
                                'css' => 'Lekton',
                                'family' => "'Lekton', Helvetica, Arial, sans-serif");
        
        $font['LektonBold'] = array('name' => 'Lekton Bold',
                                    'css' => 'Lekton:bold',
                                    'weight' => '700',
                                    'family' => "'Lekton', Helvetica, Arial, sans-serif");
    
        $font['Bentham'] = array('name' => 'Bentham',
                                    'css' => 'Bentham',
                                    'weight' => '400',
                                    'family' => "'Bentham', Helvetica, Arial, sans-serif");  
    
        $font['Arvo'] = array('name' => 'Arvo',
                                    'css' => 'Arvo',
                                    'weight' => '400',
                                    'family' => "'Arvo', Helvetica, Arial, sans-serif");
    
        $font['AnonymousPro'] = array('name' => 'Anonymous Pro',
                                    'css' => 'Anonymous+Pro',
                                    'weight' => '400',
                                    'family' => "'Anonymous Pro', Helvetica, Arial, sans-serif");
    
        $font['AnonymousProBold'] = array('name' => 'Anonymous Pro Bold',
                                    'css' => 'Anonymous+Pro:bold',
                                    'weight' => '700',
                                    'family' => "'Anonymous Pro', Helvetica, Arial, sans-serif");                                
    
        $font['DroidSans'] = array('name' => 'Droid Sans',
                                    'css' => 'Droid+Sans',
                                    'weight' => '400',
                                    'family' => "'Droid Sans', Helvetica, Arial, sans-serif");
                                    
        $font['DroidSansBold'] = array('name' => 'Droid Sans Bold',
                                    'css' => 'Droid+Sans:bold',
                                    'weight' => '700',
                                    'family' => "'Droid Sans', serif");                                
    
        $font['DroidSerif'] = array('name' => 'Droid Serif',
                                    'css' => 'Droid+Serif',
                                    'weight' => '400',
                                    'family' => "'Droid Serif', Helvetica, Arial, sans-serif");
    
        $font['DroidSerifBold'] = array('name' => 'Droid Serif Bold',
                                    'css' => 'Droid+Serif:bold',
                                    'weight' => '700',
                                    'family' => "'Droid Serif', Helvetica, Arial, sans-serif");                                 
    
        $font['CrimsonText'] = array('name' => 'Crimson Text',
                                    'css' => 'Crimson+Text',
                                    'weight' => '400',
                                    'family' => "'Crimson Text', serif");
    
        $font['Nobile'] = array('name' => 'Nobile',
                                    'css' => 'Nobile',
                                    'weight' => '400',
                                    'family' => "'Nobile', Helvetica, Arial, sans-serif"); 
    
        $font['NobileBold'] = array('name' => 'Nobile Bold',
                                    'css' => 'Nobile:bold',
                                    'weight' => '700',
                                    'family' => "'Nobile', Helvetica, Arial, sans-serif");                                  
    
        $font['Inconsolata'] = array('name' => 'Inconsolata',
                                    'css' => 'Inconsolata',
                                    'weight' => '400',
                                    'family' => "'Inconsolata', Helvetica, Arial, sans-serif"); 
    
        $font['InconsolataBold'] = array('name' => 'Inconsolata Bold',
                                    'css' => 'Inconsolata:bold',
                                    'weight' => '700',
                                    'family' => "'Inconsolata', Helvetica, Arial, sans-serif");                                        
    
        $font['AllertaStencil'] = array('name' => 'Allerta Stencil',
                                    'css' => 'Allerta+Stencil',
                                    'weight' => '400',
                                    'family' => "'Allerta Stencil', Helvetica, Arial, sans-serif");  
    
        $font['Corben'] = array('name' => 'Corben',
                                    'css' => 'Corben',
                                    'weight' => '400',
                                    'family' => "'Corben', Helvetica, Arial, sans-serif"); 
    
        $font['Copse'] = array('name' => 'Copse',
                                    'css' => 'Copse',
                                    'weight' => '400',
                                    'family' => "'Copse', Helvetica, Arial, sans-serif"); 
    
        $font['Helvetica'] = array('name' => 'Helvetica',
                                    'css' => '',
                                    'weight' => '400',
                                    'family' => "Helvetica, Arial, sans-serif");    
    
        $font['HelveticaBold'] = array('name' => 'Helvetica Bold',
                                    'css' => '',
                                    'weight' => '700',
                                    'family' => "Helvetica, Arial, sans-serif");                                                                                                  
                                                                                                                                                                                                                                                                  
        return $font;
    }
    
	/**
	 * Get Options
	 * Return all the options for the plugin that are stored in the 
	 * database
	 *
	 * @return array
	 */
    public function getOptions() {

        $options = array();
        foreach($this->defaults as $option=>$value) {
            $options[$option] = $this->getValue($option);
        }
        
        return $options;
    }


	/**
	 * Wiredrive Classic Options Init
	 * Register our settings. Add the settings section, and settings fields
	 */
	public function options_init()
	{
	   
        // Load color picker script
        $file_dir = get_template_directory_uri();
        wp_enqueue_style('farbtastic');
        wp_enqueue_script('farbtastic');
        wp_enqueue_script("wd-classic-script", $file_dir."/js/theme-options.js", false, "1.0"); 
        
        wp_register_style('wd-classic-admin-style', $file_dir."/css/admin-style.css");
        wp_enqueue_style( 'wd-classic-admin-style');

        
		register_setting($this->optionsNs,
			$this->optionsNs,
			array($this, 'options_validate')
		);
        
    /*
     * Page Section
     */
		add_settings_section('page_section',
			'Page Structure',
			array($this, 'section_text'),
			__FILE__
		);
        
        // Site Alignment
		add_settings_field('site_alignment',
			'Site Alignment',
			array($this, 'site_alignment'),
			__FILE__,
			'page_section'
		);

        // Menu position
		add_settings_field('menu_position',
			'Menu Alignment',
			array($this, 'menu_position'),
			__FILE__,
			'page_section'
		);

        // Menu functionality
		add_settings_field('menu_functionality',
			'Menu Functionality',
			array($this, 'menu_functionality'),
			__FILE__,
			'page_section'
		);		

        // Page Titles
		add_settings_field('page_titles',
			'Show page titles?',
			array($this, 'page_titles'),
			__FILE__,
			'page_section'
		);
    /*
     * Font Section
     */	
        add_settings_section('font_section',
			'Fonts',
			array($this, 'section_text'),
			__FILE__
		);
        
        // Menu Font Choice
		add_settings_field('menu_font',
			'Select a font for the sites menus',
			array($this, 'menu_font'),
			__FILE__,
			'font_section'
		);
        
        // Menu Font Size
		add_settings_field('menu_font_size',
			'What size do you want the menu font to be? Default is 14px',
			array($this, 'menu_font_size'),
			__FILE__,
			'font_section'
		);
		
		// Title Font Choice
		add_settings_field('title_font',
			'Select a font for the sites titles',
			array($this, 'title_font'),
			__FILE__,
			'font_section'
		);
		
        // Title Font Size
		add_settings_field('title_font_size',
			'What size do you want the title font to be? Default is 21px',
			array($this, 'title_font_size'),
			__FILE__,
			'font_section'
		);

		// Body Font Choice
		add_settings_field('body_font',
			'Select a font for the sites body copy',
			array($this, 'body_font'),
			__FILE__,
			'font_section'
		);
		
        // Body Font Size
		add_settings_field('body_font_size',
			'What size do you want the body font to be? Default is 12px',
			array($this, 'body_font_size'),
			__FILE__,
			'font_section'
		);				

    /*
     * Page Colors
     */
		add_settings_section('page_colors_section',
			'Page Colors',
			array($this, 'section_text'),
			__FILE__
		);


        // Header Color
		add_settings_field('header_color',
			'The color used for the header. If left empty, the header will be transparent.',
			array($this, 'header_color'),
			__FILE__,
			'page_colors_section'
		);		
			

        // Container Color
		add_settings_field('container_color',
			'The color used for the container. If left empty, the container will be transparent.',
			array($this, 'container_color'),
			__FILE__,
			'page_colors_section'
		);		
				
        // Footer Color
		add_settings_field('footer_color',
			'The color used for the footer. If left empty, the footer will be transparent.',
			array($this, 'footer_color'),
			__FILE__,
			'page_colors_section'
		);
		
		
		
    /*
     * Page Colors
     */
		add_settings_section('link_colors_section',
			'Link and Font Colors',
			array($this, 'section_text'),
			__FILE__
		);

        // Main Menu Font Color
		add_settings_field('main_menu_font_color',
			'The color used for the main menu.',
			array($this, 'main_menu_font_color'),
			__FILE__,
			'link_colors_section'
		);

        // Sub Menu Font Color
		add_settings_field('sub_menu_font_color',
			'The color used for the sub menu.',
			array($this, 'sub_menu_font_color'),
			__FILE__,
			'link_colors_section'
		);

        // Body Font Color
		add_settings_field('body_font_color',
			'The color used for the body font.',
			array($this, 'body_font_color'),
			__FILE__,
			'link_colors_section'
		);

        // Footer Font Color
		add_settings_field('footer_font_color',
			'The color used for the footer font.',
			array($this, 'footer_font_color'),
			__FILE__,
			'link_colors_section'
		);

        // Link Font Color
		add_settings_field('link_font_color',
			'The color used for the link font.',
			array($this, 'link_font_color'),
			__FILE__,
			'link_colors_section'
		);					
		
        // Link Hover Color
		add_settings_field('link_hover_font_color',
			'The color used for the link hover font.',
			array($this, 'link_hover_font_color'),
			__FILE__,
			'link_colors_section'
		);

    /*
     * Social Media
     */
		add_settings_section('social_section',
			'Social Media',
			array($this, 'section_text'),
			__FILE__
		);
		
        // Twitter Link
		add_settings_field('twitter_link',
			'Link to your Twitter page, <strong>with http://</strong>. It will be shown in the footer. Leaving it blank will keep the Twitter icon suppressed.',
			array($this, 'twitter_link'),
			__FILE__,
			'social_section'
		);											


        // Facebook Link
		add_settings_field('facebook_link',
			'Link to your Facebook page, <strong>with http://</strong>. It will be shown in the footer. Leaving it blank will keep the Facebook icon suppressed.',
			array($this, 'facebook_link'),
			__FILE__,
			'social_section'
		);
		

    /*
     * Tracking Code
     */
		add_settings_section('tracking_section',
			'Analytics/Tracking Code',
			array($this, 'section_text'),
			__FILE__
		);

        // Tracking Code
		add_settings_field('tracking_code',
			'You can paste your Google Analytics or other website tracking code in this box. This will be automatically added to the head of every page.',
			array($this, 'tracking_code'),
			__FILE__,
			'tracking_section'
		);
		

    /*
     * Footer Code
     */
		add_settings_section('footer_section',
			'Footer Code',
			array($this, 'section_text'),
			__FILE__
		);

        // Tracking Code
		add_settings_field('footer_code',
			'You can paste the code you want to appear in the footer here. It accepts all valid HTML code. The area is 830px wide by 60px heigh.',
			array($this, 'footer_code'),
			__FILE__,
			'footer_section'
		);				
								
    }

	/**
	 * Section Text
	 * Defaults to main_section on plugin page
	 */
	function section_text() { }

	/**
	 * Wiredrive Options Add
	 * Add sub page to the Settings Menu
	 */
	public function options_add_page()
	{
		  add_theme_page('Theme Options',
		                 'Theme Options',
		                 'administrator', 
		                 __FILE__, 
		                 array($this, 'options_page')
		                 );
	}

	/**
	 * Site Alignment
	 * input type      : radio
	 * name            : site_alignment
	 */
	public function site_alignment()
	{
	    $options = array('0' => 'Left',
	                     '0 auto' => 'Center'
	                     );
		$site_alignment = $this->getValue('site_alignment');
		echo $this->radioInput($site_alignment,'site_alignment', $options);
	}



	/**
	 * Site Alignment
	 * input type      : radio
	 * name            : menu_position
	 */
	public function menu_position()
	{
	    $options = array('left' => 'Left',
	                     'top' => 'Top'
	                     );
		$menu_position = $this->getValue('menu_position');
		echo $this->radioInput($menu_position,'menu_position', $options);
	}
	

	/**
	 * Menu Functionality
	 * input type      : radio
	 * name            : menu_functionality
	 */
	public function menu_functionality()
	{
	    $options = array('block-menu' => 'Block',
	                     'drop-down' => 'Drop Down'
	                     );
		$menu_functionality = $this->getValue('menu_functionality');
		echo $this->radioInput($menu_functionality,'menu_functionality', $options);
	}


	/**
	 * Page Titles 
	 * input type      : radio
	 * name            : page_titles
	 */
	public function page_titles()
	{
	    $options = array('block' => 'Yes',
	                     'none' => 'No'
	                     );
		$page_titles = $this->getValue('page_titles');
		echo $this->radioInput($page_titles,'page_titles', $options);
	}


	
	/**
	 * Menu Font
	 * input type      : select
	 * name            : page_titles
	 */
	public function menu_font()
	{
	    $options = $this->getFonts();
	    
		$menu_font = $this->getValue('menu_font');
		echo $this->fontInput($menu_font,'menu_font', $options);
	}	



	/**
	 * Menu Font Size
	 * input type      : textbox
	 * name            : menu_font_size
	 */
	public function menu_font_size()
	{   
        $menu_font_size = $this->getValue('menu_font_size');
        echo $this->textboxInput($menu_font_size,'menu_font_size', 'px');
	}	



	/**
	 * Title Font
	 * input type      : select
	 * name            : title_font
	 */
	public function title_font()
	{
	    $options = $this->getFonts();
	    
		$title_font = $this->getValue('title_font');
		echo $this->fontInput($title_font,'title_font', $options);
	}



	/**
	 * Title Font Size
	 * input type      : textbox
	 * name            : title_font_size
	 */
	public function title_font_size()
	{   
        $title_font_size = $this->getValue('title_font_size');
        echo $this->textboxInput($title_font_size,'title_font_size', 'px');
	}
	
		

	/**
	 * Body Font
	 * input type      : select
	 * name            : body_font
	 */
	public function body_font()
	{
	    $options = $this->getFonts();
	    
		$body_font = $this->getValue('body_font');
		echo $this->fontInput($body_font,'body_font', $options);
	}



	/**
	 * Body Font Size
	 * input type      : textbox
	 * name            : body_font_size
	 */
	public function body_font_size()
	{   
        $body_font_size = $this->getValue('body_font_size');
        echo $this->textboxInput($body_font_size,'body_font_size', 'px');
	}
	
	
	
	/**
	 * Header Color
	 * input type      : textbox with colorpicker
	 * name            : header_color
	 */
	public function header_color()
	{   
        $header_color = $this->getValue('header_color');
        echo $this->textboxInputColorpicker($header_color,'header_color');
	}	
	
	
	
	/**
	 * Container Color
	 * input type      : textbox with colorpicker
	 * name            : container_color
	 */
	public function container_color()
	{   
        $container_color = $this->getValue('container_color');
        echo $this->textboxInputColorpicker($container_color,'container_color');
	}	
	
	
	/**
	 * Footer Color
	 * input type      : textbox with colorpicker
	 * name            : footer_color
	 */
	public function footer_color()
	{   
        $footer_color = $this->getValue('footer_color');
        echo $this->textboxInputColorpicker($footer_color,'footer_color');
	}	



	/**
	 * Main Menu Font Color
	 * input type      : textbox with colorpicker
	 * name            : main_menu_font_color
	 */
	public function main_menu_font_color()
	{   
        $main_menu_font_color = $this->getValue('main_menu_font_color');
        echo $this->textboxInputColorpicker($main_menu_font_color,'main_menu_font_color');
	}
	
	
	
	/**
	 * Sub Menu Font Color
	 * input type      : textbox with colorpicker
	 * name            : sub_menu_font_color
	 */
	public function sub_menu_font_color()
	{   
        $sub_menu_font_color = $this->getValue('sub_menu_font_color');
        echo $this->textboxInputColorpicker($sub_menu_font_color,'sub_menu_font_color');
	}



	/**
	 * Body Font Color
	 * input type      : textbox with colorpicker
	 * name            : body_font_color
	 */
	public function body_font_color()
	{   
        $body_font_color = $this->getValue('body_font_color');
        echo $this->textboxInputColorpicker($body_font_color,'body_font_color');
	}
	
	
	
	/**
	 * Footer Font Color
	 * input type      : textbox with colorpicker
	 * name            : footer_font_color
	 */
	public function footer_font_color()
	{   
        $footer_font_color = $this->getValue('footer_font_color');
        echo $this->textboxInputColorpicker($footer_font_color,'footer_font_color');
	}
	
	
	
	/**
	 * Link Font Color
	 * input type      : textbox with colorpicker
	 * name            : link_font_color
	 */
	public function link_font_color()
	{   
        $link_font_color = $this->getValue('link_font_color');
        echo $this->textboxInputColorpicker($link_font_color,'link_font_color');
	}
	
	
	
	/**
	 * Link Hover Font Color
	 * input type      : textbox with colorpicker
	 * name            : link_hover_font_color
	 */
	public function link_hover_font_color()
	{   
        $link_hover_font_color = $this->getValue('link_hover_font_color');
        echo $this->textboxInputColorpicker($link_hover_font_color,'link_hover_font_color');
	}	
	

	/**
	 * Twitter Link
	 * input type      : textbox
	 * name            : twitter_link
	 */
	public function twitter_link()
	{   
        $twitter_link = $this->getValue('twitter_link');
        echo $this->textboxInput($twitter_link,'twitter_link');
	}
	
	
		
	/**
	 * Facebook Link
	 * input type      : textbox
	 * name            : facebook_link
	 */
	public function facebook_link()
	{   
        $facebook_link = $this->getValue('facebook_link');
        echo $this->textboxInput($facebook_link,'facebook_link');
	}
		
	
	/**
	 * Tracking/Analytics Code
	 * input type      : textbox
	 * name            : tracking_code
	 */
	public function tracking_code()
	{   
        $tracking_code = $this->getValue('tracking_code');
        echo $this->textareaInput($tracking_code,'tracking_code');
	}
	
	
	/**
	 * Footer Code
	 * input type      : textbox
	 * name            : footer_code
	 */
	public function footer_code()
	{   
        $tracking_code = $this->getValue('footer_code');
        echo $this->textareaInput($tracking_code,'footer_code');
	}	
	
		

	/**
	 * Options Page
	 * Display the admin options page
	 */
	public function options_page()
	{
?>
	<div class="wd-classic-settings wrap">
		<div class="icon32" id="icon-options-general"><br></div>
		<h2>Wiredrive Classic Settings</h2>
		You can config the theme's appearance below.
		<form action="options.php" method="post">
		<?php settings_fields($this->optionsNs); ?>
		<?php do_settings_sections(__FILE__); ?>
		<p class="submit">
			<input name="Submit" type="submit" class="button-primary" 
			 value="Save Changes" />
		</p>
		</form>
	</div>
<?php
	}




    /**
     * Get Values
     * Get the values stored in the database
     * fallback to defaults with they are not set
     *
	 * @var options array
	 * @return array
	 */
	private function getValue($option)
	{
	
		if (isset($this->options[$option])) {
			return $this->options[$option];
		}

		return $this->defaults[$option];
	}



	/**
	 * Text Box Input
	 * Format input box with options color wheel
	 * @var $value string
	 * @var $inputName string
	 * @var $showColorPicker bool
	 * @var $showComment bool
	 *
	 * @return string
	 * 
	 */
	private function textboxInput($value,$inputName,$showComment = false)
    {

	   	$str = "<input id='". $inputName . "'";
		$str .= "name='". $this->optionsNs ."[". $inputName . "]' size='10' type='text' value='" .
		          $value . "' />";
		          
        if ($showComment !== false) {
		   $str .=  "<label for='". $inputName . "'>". $showComment ."</label>";	
		}

		$str .= "</div>";
		
		
		return $str;
    }


	/**
	 * Radio Button Input
	 */
    public function radioInput($value, $inputName, $items)
	{
   
		foreach ($items as $key => $item) {
			$checked = '';
			if ($value == $key) {
				$checked = 'checked="checked"';
			}
            
			echo "<label><input ".
				$checked. " value='" .
				$key . "' name=\"". 
				$this->optionsNs ."[". $inputName ."]\" type='radio' /> " .
				$item . "</label><br />";
		}
		
	}
	
	public function fontInput($value, $inputName, $items, $showComment = false) 
	{
	   
    	$str  = '<div class="options_input options_select">';
    	
    	if($showComment !== false) {
    	   $str .= "<div class=". $inputName .">". $showComment ."</div>";
    	}
	
    	$str .= '<span class="labels"><label for="'. $inputName .'"></label></span>';
    	$str .= '<select name="'. $this->optionsNs .'['. $inputName .']" id="'. $inputName .'">';
	   
        foreach ($items as $key=>$option) {
            $str .= '<option value="'. $key .'"';
            if ($value == $key) { 
                $str .= 'selected="selected"'; 
            }
            $str .= '>'.$option['name'] . '</option>';
        }

        
        $str .= '</select>';
        $str .= '</div>';
        
        return $str;
	}

    public function textareaInput($value,$inputName,$showComment = false)
    {

	   	$str = "<textarea id='". $inputName . "'";
		$str .= "name='". $this->optionsNs ."[". $inputName . "]' rows='16' cols='50' />". $value ."</textarea>";
		          
        if ($showComment !== false) {
		   $str .=  "<label for='". $inputName . "'>". $showComment ."</label>";	
		}

		$str .= "</div>";
		
		
		return $str;
    }

    
    /**
	 * Text Box Input
	 * Format input box with options color wheel
	 * @var $value string
	 * @var $inputName string
	 * @var $showColorPicker bool
	 * @var $showComment bool
	 *
	 * @return string
	 * 
	 */
	private function textboxInputColorpicker($value,$inputName,$showComment = false)
    {

        $str  =  "<div class='wd-classic-color-input-wrap'>";
	   	$str .= "<input id='". $inputName . "'";
        $str .= "class='wd-colorpicker' ";
		$str .= "name='". $this->optionsNs ."[". $inputName . "]' size='10' type='text' value='" .
		          $value . "' style='background-color: ". $value .";' />";
        $str .= "<span class='wd-classic-color-button'></span>";
        $str .= "<div class='wd-classic-color-picker-wrap ". $inputName ."'></div>";
        
        if ($showComment !== false) {
		   $str .=  "<span>". $showComment ."</span>";	
		}
		
		$str .= "</div>";
		
		return $str;
    }
    
    
    
    /**
	 * Options Validate
	 * Validate user data for some/all of your input fields
	 *
	 * @var input array
	 * @return array
	 */
	public function options_validate($input)
	{
		/*
		 * Filter textbox option fields to prevent HTML tags
		 */
 		$clean['site_alignment']            = wp_filter_nohtml_kses($input['site_alignment']);
 		$clean['menu_position']             = wp_filter_nohtml_kses($input['menu_position']);
 		$clean['menu_functionality']        = wp_filter_nohtml_kses($input['menu_functionality']); 		
 		$clean['page_titles']               = wp_filter_nohtml_kses($input['page_titles']);
        $clean['menu_font']                 = wp_filter_nohtml_kses($input['menu_font']);
        $clean['menu_font_size']            = wp_filter_nohtml_kses($input['menu_font_size']);
        $clean['title_font']                = wp_filter_nohtml_kses($input['title_font']);
        $clean['title_font_size']           = wp_filter_nohtml_kses($input['title_font_size']);
        $clean['body_font']                 = wp_filter_nohtml_kses($input['body_font']);
        $clean['body_font_size']            = wp_filter_nohtml_kses($input['body_font_size']);
        $clean['header_color']              = wp_filter_nohtml_kses($input['header_color']);
        $clean['container_color']           = wp_filter_nohtml_kses($input['container_color']);
        $clean['footer_color']              = wp_filter_nohtml_kses($input['footer_color']);
        $clean['main_menu_font_color']      = wp_filter_nohtml_kses($input['main_menu_font_color']);        
        $clean['sub_menu_font_color']       = wp_filter_nohtml_kses($input['sub_menu_font_color']);        
        $clean['body_font_color']           = wp_filter_nohtml_kses($input['body_font_color']);        
        $clean['footer_font_color']         = wp_filter_nohtml_kses($input['footer_font_color']);        
        $clean['link_font_color']           = wp_filter_nohtml_kses($input['link_font_color']);        
        $clean['link_hover_font_color']     = wp_filter_nohtml_kses($input['link_hover_font_color']);        
        $clean['twitter_link']              = wp_filter_nohtml_kses($input['twitter_link']);        
        $clean['facebook_link']             = wp_filter_nohtml_kses($input['facebook_link']);        
        $clean['tracking_code']             = $input['tracking_code'];
        $clean['footer_code']             	= $input['footer_code'];
        
		return $clean;
	}


}
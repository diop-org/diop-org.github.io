<?php
/**
 * 
 *
 *  API for creating and using PageLines sections
 *
 *
 *  @package PageLines Core
 *  @subpackage Sections
 *  @since 4.0
 *
 */
class PageLinesSection {

	var $id;		// Root id for section.
	var $name;		// Name for this section.
	var $settings;	// Settings for this section
	var $base_dir;  // Directory for section
	var $base_url;  // Directory for section
	var $builder;  	// Show in section builder
	
	/**
	 * PHP5 constructor
	 *
	 */
	function __construct( $name = null, $id = null, $settings = array(), $base = null ) {
		$defaults = array(
				'type' 				=> 'standard',
				'workswith'		 	=> array('standard'),
				'description' 		=> null, 
				'folder' 			=> $id,
				'init_file' 		=> $id .'.php',
				'required'			=> false
				
			);
		
		$this->settings = wp_parse_args( $settings, $defaults );
		
		
		$this->id = empty($id) ? strtolower(get_class($this)) : strtolower($id);
		$this->name = $name;
		$this->type = $this->settings['type'];
		
		$this->base_dir = empty($base) ? THEME_SECTIONS.'/'.$this->settings['folder'] : TEMPLATEPATH . $base;
		$this->base_url = empty($base) ? SECTION_ROOT.'/'.$this->settings['folder'] : THEME_ROOT . $base;
	}

	/** Echo the section content.
	 *
	 * Subclasses should over-ride this function to generate their section code.
	 *
	 */
	function section_template() {
		die('function PageLinesSection::section_template() must be over-ridden in a sub-class.');
	}

	function before_section(){?>
		<?php if($this->type == 'main'):?>
			<div id="<?php echo $this->id;?>" class="copy fix">
		<?php elseif($this->type == 'sidebar'):?>
			<ul id="<?php echo $this->id;?>" class="sidebar_widgets fix">
		<?php else:?>
		<div id="<?php echo $this->id;?>" class="container fix">
			<div class="texture">
				<div class="content">
					<div class="content-pad">
		<?php endif;?>
<?php }

	function after_section(){?>
		<?php if($this->type == 'main'):?>
				<div class="clear"></div>
			</div>
		<?php elseif($this->type == 'sidebar'):?>
			</ul>
		<?php else:?>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</div>
		<?php endif;?>
<?php }
	
	function section_persistent(){}
	
	function section_head(){}
	
	function section_options(){}
	
	function section_scripts(){}


}
/********** END OF SECTION CLASS  **********/

/**
 * Singleton that registers and instantiates PageLinesSection classes.
 *
 * @package PageLines Core
 * @subpackage Sections
 * @since 4.0
 */
class PageLinesSectionFactory {
	var $sections  = array();

	function __contruct() { }

	function register($section_class) {
		$this->sections[$section_class] = new $section_class();
	}

	function unregister($section_class) {
		if ( isset($this->sections[$section_class]) )
			unset($this->sections[$section_class]);
	}

}

/**
 * Registers and loads the section files
 *
 * @package PageLines Core
 * @subpackage Sections
 * @since 4.0
 */
function pagelines_register_section($section_class, $section_folder, $init_file = null){
	global $pl_section_factory;

	if(!isset($init_file) && !strpos($init_file, '.php')) $init_file = $section_folder.'.php';
	if(!strpos($init_file, '.php')) $init_file = $init_file.'.php';

	$section_init_file = THEME_SECTIONS.'/'.$init_file;
	$section_init_folder = THEME_SECTIONS.'/'.$section_folder.'/'.$init_file;

		try{
			if(!file_exists($section_init_file) && !file_exists($section_init_folder)){ 
				throw new Exception($init_file); 
			}
			if(file_exists($section_init_file)) include($section_init_file);
		 	else include($section_init_folder);
		} catch(Exception $e){
			echo '<h4>Oops, we have a little problem...</h4>';
			echo 'We could\'t find the file: <strong>'.$e->getMessage().'</strong><br />';
			echo 'We looked for it here:  <strong>'.$section_init_file.'</strong><br/> and here: <strong>'.$section_init_folder.'</strong><br /><br/>';
			echo 'And we need it to register: '.$section_class;
		  exit();
		}

	$pl_section_factory->register($section_class);	
}

/**
 * Prints the persistent PHP for sections.
 *
 * @package PageLines Core
 * @subpackage Sections
 * @since 4.0
 */
function load_section_persistent(){
	global $pl_section_factory;
	
	foreach($pl_section_factory->sections as $section){
		$section->section_persistent();
	}

}

function load_section_options($optionset = null, $location = 'bottom'){
	global $pl_section_factory;
	
	$load_options = array();
	
	foreach($pl_section_factory->sections as $section){
		$section_options = $section->section_options($optionset, $location);
		if(is_array($section_options)){
			$load_options = array_merge($load_options, $section_options);
		}
	}

	return $load_options;
}







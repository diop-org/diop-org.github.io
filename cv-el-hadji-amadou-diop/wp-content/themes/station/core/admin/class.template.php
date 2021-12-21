<?php
/**
 * 
 *
 *  PageLines Template Class
 *
 *
 *  @package PageLines Core
 *  @subpackage Sections
 *  @since 4.0
 *
 */
class PageLinesTemplate {

	var $id;		// Root id for section.
	var $name;		// Name for this section.
	var $settings;	// Settings for this section
	
	var $layout;	// Layout type selected
	var $sections = array(); // HTML sections/effects for the page
	
	
	/**
	 * PHP5 constructor
	 *
	 */
	function __construct() {
		$this->template_map = $this->get_template_map();
		$this->template_type = $this->get_page_template();
		$this->main_type = $this->set_main_type();
		
	
		$this->setup_section_areas();
	}
	
	function set_main_type(){

		if(is_page() || is_404()){
			return 'main-page';
		} else { 
			return 'main-'.$this->template_type;
		}
	}
	
	/*
		TODO Account for different types of loads. e.g sidebar2 should only load if it is shown in the layout.
	*/
	
	function setup_section_areas(){

		$section_area_map = load_section_areas();
		$this->all_template_sections = array();
		
		foreach($section_area_map as $section_area_id => $section_area_info){
			
			
			if($section_area_info['load'] == 'template'){
				$this->$section_area_id = $this->get_sections($this->template_type);
			} elseif($section_area_info['load'] == 'main') {
				$this->$section_area_id = $this->get_sections($this->main_type);
			} else {
				$this->$section_area_id = $this->get_sections($section_area_id);
			}
			if(is_array($this->$section_area_id)) $this->all_template_sections = array_merge($this->all_template_sections, $this->$section_area_id);
			
		}
		
	}
	
	function hook_and_print_sections(){
		
		$section_area_map = load_section_areas();
		
		foreach($section_area_map as $section_area_id => $section_area_info){
			
			add_action($section_area_info['hook'], array(&$this, 'print_section_html'));
			
		}
	}

	function print_section_html($section_area_id){
		global $pl_section_factory;

		if(!is_array( $this->$section_area_id )) return;
		
		foreach($this->$section_area_id as $section){
			if(is_object($pl_section_factory->sections[$section])){
				$pl_section_factory->sections[$section]->before_section();
				$pl_section_factory->sections[$section]->section_template();
				$pl_section_factory->sections[$section]->after_section();
			}
		}
	}
	

	
	function get_sections($section_area){
		if(isset($this->template_map[$section_area]['sections'])) return $this->template_map[$section_area]['sections'];
		else return array();
	}

/*
	TODO setup a filter that allows us to identify the template, without preventing loading of the default template; if the identified template isn't setup in the 'templates config'
*/

	function get_page_template(){
		global $post;
		
		if(is_404() || !have_posts()){ return '404';}
		if(is_home()){ return 'posts';}
		elseif(is_single()){return 'single';}
		elseif(is_page_template()){
			return str_replace('.php', '', get_post_meta($post->ID,'_wp_page_template',true));
		}else{return 'default';}
		
	}
	
	function update_template_config($map){
		
		foreach(default_template_map() as $template_name => $template_value){
			if(!isset($map[$template_name])){
				$map[$template_name] = $template_value;
			}
		
			$map[$template_name]['name'] = $template_value['name'];	
			$map[$template_name]['type'] = $template_value['type'];	
		}
		
		return $map;
		
	}
	
	function get_template_map(){
		
		// Get Section / Layout Map
		if(get_option('pagelines_template_map')){
			$map = get_option('pagelines_template_map');
			return $this->update_template_config($map);
			
		}else{
			$defaultmap = default_template_map();
			return $defaultmap;
		}
	}
	
	function reset_templates_to_default(){
		update_option('pagelines_template_map', default_template_map());
	}

	function print_template_section_headers(){

		global $pl_section_factory;
		try{
			if(!is_array($this->all_template_sections)){ 
				throw new Exception('The "'.$this->template.'" template didn\'t return any sections.<br/> This could be because this templates set of template sections is broken due to an error.'); 
			}
			
			foreach($this->all_template_sections as $section){
				if(!is_object($pl_section_factory->sections[$section])){
					throw new Exception('The selected section: '.$section.' isn\'t a section or hasn\'t been registered correctly'); 
				}
				
				$pl_section_factory->sections[$section]->section_head();
			}
		} catch(Exception $e){
			echo '<h4>We have a little problem...</h4>';
			echo $e->getMessage();
		  exit();
		}
		
	}
	

	
	function print_template_section_scripts(){

		global $pl_section_factory;

		foreach($this->all_template_sections as $section){

			if(is_object($pl_section_factory->sections[$section])){
				
				$section_scripts = $pl_section_factory->sections[$section]->section_scripts();
				
				
				if(is_array( $section_scripts )){
					
					foreach( $section_scripts as $js_id => $js_atts){
						
						$defaults = array(
								'version' => '1.0',
								'dependancy' => null,
								'footer' => true
							);

						$parsed_js_atts = wp_parse_args($js_atts, $defaults);
						
						wp_register_script($js_id, $parsed_js_atts['file'], $parsed_js_atts['dependancy'], $parsed_js_atts['version'], true);

						wp_print_scripts($js_id);

					}

				}
			}

		}
	}
	


}
/////// END OF TEMPLATE CLASS ////////


/**
 * PageLines Template Object 
 * @global object $pagelines_template
 * @since 4.0.0
 */
function build_pagelines_template(){	
	global $pagelines_template;

	$pagelines_template = new PageLinesTemplate;	
}

/**
 * Save Site Template Map
 *
 * @since 4.0.0
 */
function save_template_map($templatemap){	
	update_option('pagelines_template_map', $templatemap);
}

/**
 * AJAX Saving Of Site Template Map
 *
 * @since 4.0.0
 */
add_action('wp_ajax_pagelines_save_sortable', 'ajax_save_template_map');

function ajax_save_template_map() {
	global $wpdb; // this is how you get access to the database

	$whatever = $_GET;
	
	$templatemap = $_GET['templatemap'];
	$selected_template = $_GET['template'];
	$section_order = $_GET['orderdata'];

	parse_str($section_order);
	
	$templatemap[$selected_template]['sections'] = $section;
	
	save_template_map($templatemap);
	
	echo true;

	die();
}






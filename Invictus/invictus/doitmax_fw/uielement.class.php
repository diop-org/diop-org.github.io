<?php

/**
 * Abstraction of enhancing post-types in Wordpress
 * 
 * This class delivers a simple way to enhance all
 * the post types in Wordpress so that it is more like
 * a CMS than ever!
 * 
 * @author Markus Thömmes (merguez@semantifiziert.de)
 * @copyright Copyright 2010, Markus Thömmes
 * @version 1.0
 * @since 10.09.2010
 * 
 */

if(!class_exists('UIElement')) {
class UIElement {
	/**
     * Contains the type of posts this page is hooked into
     * @var string
     */
	protected $type;
	
	/**
     * Contains all arguments needed to build the frame
     * @var array
     */
	protected $args;
	
	/**
     * Contains all the information needed to build the form structure of the page
     * @var array
     */
	protected $boxes;
	
	/**
     * Constructs a new object
	 *
     * @param string $type contains the type this UIElement is hooked into
     */
	public function __construct($type) {
		if(is_object($type)) {
			$this->type = $type->type_name;
		} else {
			$this->type = $type;
		}
		add_action('save_post', array($this, 'save'));
	}
	
	/**
     * Adds a Metabox to your page
	 *
	 * Possible keys within $args:
	 *  > id (string) - Just a unique id
	 *  > title (string) - The title of the frame
	 *  > context (string) (optional) - defines the context of the box
	 *  > priority (string) (optional) - defines the priority of the box
	 *
     * @param array $args contains everything needed to build the field
     */
	public function createMetabox($args) {
		$this->args = $args;
		add_action('admin_menu',array($this, 'renderUI'));
	}
	
	/**
     * Switches the CustomImage box from the side to the middle
	 *
	 * Possible keys within $args:
	 *  > id (string) - Just a unique id
	 *  > title (string) - The title of the frame
	 *
     * @param array $args contains everything needed to build the field
     */
	public function switchCustomImage($args) {
		$this->args = $args;
		add_action('do_meta_boxes', array($this, 'renderThumbnailBox'));
	}
	
	/**
     * Adds an input field to the current page
	 *
	 * Possible keys within $args:
	 *  > id (string) - This is what you need to get your variable from the database
	 *  > label (string) - Describes your field very shortly
	 *  > desc (string) (optional) - Further description for this element
	 *  > standard (string) - This is the standard value of your input
	 *  > size (integer) (optional) - The size of your input 
	 *
     * @param array $args contains everything needed to build the field
     */
	public function addInput($args) {
		$args['type'] = 'input';
		$this->boxes[] = $args;
	}
	
	/**
     * Adds a hidden input field to the current page
	 *
	 * Possible keys within $args:
	 *  > id (string) - This is what you need to get your variable from the database
	 *  > standard (string) - This is the standard value of your input
	 *
     * @param array $args contains everything needed to build the field
     */
	public function addHidden($args) {
		$defaults = array(
			'desc' => "",
			'label' => ""
		);
		$args = array_merge($defaults, $args);				
		$args['type'] = 'hidden';
		$this->boxes[] = $args;
	}	
	
	/**
     * Adds a textarea to the current page
	 *
	 * Possible keys within $args:
	 *  > id (string) - This is what you need to get your variable from the database
	 *  > label (string) - Describes your field very shortly
	 *  > desc (string) (optional) - Further description for this element
	 *  > standard (string) (optional) - This is the standard value of your field
	 *  > rows (integer) (optional) - The number of rows you want to have, standard: 5
	 *  > cols (integer) (optional) - The number of cols you want to have, standard: 30
	 *  > width (integer) (optional) - How wide should the textarea be?, standard:500
	 *
     * @param array $args contains everything needed to build the field
     */
	public function addTextarea($args) {
		$defaults = array(
			'rows' => 5,
			'cols' => 30,
			'width' => 500,
		);
		$args = array_merge($defaults, $args);
		$args['type'] = 'textarea';
		$this->boxes[] = $args;
	}
	
	/**
     * Adds a TinyMCE editor to the current page
	 *
	 * Possible keys within $args:
	 *  > id (string) - This is what you need to get your variable from the database
	 *  > label (string) - Describes your field very shortly
	 *  > desc (string) (optional) - Further description for this element
	 *  > standard (string) (optional) - This is the standard value of your input
	 *
     * @param array $args contains everything needed to build the field
     */
	public function addEditor($args) {
		$args['type'] = 'editor';
		$this->boxes[] = $args;
	}
	
	/**
     * Adds a checkbox to the current page
	 *
	 * Possible keys within $args:
	 *  > id (string) - This is what you need to get your variable from the database
	 *  > label (string) - Describes your field very shortly
	 *  > desc (string) - Further description for this element
	 *  > standard (bool) - Define wether the checkbox should be checked our unchecked
	 *
     * @param array $args contains everything needed to build the field
     */
	public function addCheckbox($args) {
		$args['type'] = 'checkbox';
		$this->boxes[] = $args;
	}

	/**
     * Adds a multi-checkbox to the current page
	 *
	 * Possible keys within $args:
	 *  > id (string) - This is what you need to get your variable from the database
	 *  > label (string) - Describes your field very shortly
	 *  > desc (string) - Further description for this element
	 *  > standard (bool) - Define wether the checkbox should be checked our unchecked
	 *  > options (array) - An array containing the options to choose from, written in this style: LABEL => VALUE
	 *
     * @param array $args contains everything needed to build the field
     */
	public function addMultiCheckbox($args) {
		$args['type'] = 'multi_checkbox';
		$this->boxes[] = $args;
	}
	
	public function addMultiGalleryCheckbox($args) {
		$args['type'] = 'multi_gallery_checkbox';
		$this->boxes[] = $args;
	}
	
	public function addSortableGalleryCheckbox($args) {
		$args['type'] = 'sortable_gallery_checkbox';
		$this->boxes[] = $args;
	}	
	
	
	/**
     * Adds checkboxes for choosing the sidebar to the current page
	 *
	 * Possible keys within $args:
	 *  > id (string) - This is what you need to get your variable from the database
	 *  > label (string) - Describes your field very shortly
	 *  > desc (string) - Further description for this element
	 *  > standard (bool) - Define wether the checkbox should be checked our unchecked
	 *  > options (array) - An array containing the options to choose from, written in this style: LABEL => VALUE
	 *
     * @param array $args contains everything needed to build the field
     */
	public function addSidebarCheckbox($args) {
		$defaults = array(
			'desc' => "",
		);
		$args = array_merge($defaults, $args);		
		$args['type'] = 'sidebar_checkbox';
		$this->boxes[] = $args;
	}	
	
	/**
     * Adds radiobuttons field to the current page
	 *
	 * Possible keys within $args:
	 *  > id (string) - This is what you need to get your variable from the database
	 *  > label (string) - Describes your field very shortly
	 *  > standard (string) - Define which of the options should be checked if there is nothing in the database
	 *  > options (array) - An array containing the options to choose from, written in this style: LABEL => VALUE
	 *
     * @param array $args contains everything needed to build the field
     */
	public function addRadiobuttons($args) {
		$args['type'] = 'radio';
		$this->boxes[] = $args;
	}
	
	/**
     * Adds a dropdown field to the current page
	 *
	 * Possible keys within $args:
	 *  > id (string) - This is what you need to get your variable from the database
	 *  > label (string) - Describes your field very shortly
	 *  > desc (string) (optional) - Describes your field very shortly
	 *  > standard (string) - Define which of the options should be checked if there is nothing in the database
	 *  > options (array) - An array containing the options to choose from, written in this style: LABEL => VALUE
	 *
     * @param array $args contains everything needed to build the field
     */
	public function addDropdown($args) {
		$args['type'] = 'dropdown';
		$this->boxes[] = $args;
	}
	
	/**
     * Adds a slider to the current page
	 *
	 * Possible keys within $args:
	 *  > id (string) - This is what you need to get your variable from the database
	 *  > label (string) - Describes your field very shortly
	 *  > standard (integer|array) (optional) - The starting position of your slider, if it is an array, a range slider is build
	 *  > max (integer) (optional) - The maximum value of your slider
	 *  > min (integer) (optional) - The minimum value of your slider
	 *  > step (integer) (optional) - The stepsize of your slider
	 *
     * @param array $args contains everything needed to build the field
     */
	public function addSlider($args) {
		$default = array(
			'standard' => 0,
			'max' => 100,
			'min' => 0,
			'step' => 1,
		);
		$args = array_merge($default,$args);
		$args['type'] = 'slider';
		$this->boxes[] = $args;
	}
	
	/**
     * Adds a datepicker to the current page
	 *
	 * Possible keys within $args:
	 *  > id (string) - This is what you need to get your variable from the database
	 *  > label (string) - Describes your field very shortly
	 *  > desc (string) (optional) - Describes your field very shortly
	 *  > standard (string) (optional) - The standard date in the format: MM/DD/YYYY
	 *
     * @param array $args contains everything needed to build the field
     */
	public function addDate($args) {
		$args['type'] = 'date';
		if(isset( $args['standard'] ) )	$date = explode('/', $args['standard']);
		if(isset($date[2])) $args['standard'] = mktime(0,0,0,$date[0],$date[1],$date[2]);
		$this->boxes[] = $args;
	}
	
	/**
     * Adds a button to uploade an image to the current page
	 *
	 * Possible keys within $args:
	 *  > id (string) - This is what you need to get your variable from the database
	 *  > label (string) - Describes your field very shortly
	 *  > desc (string) - Further description for this element
	 *  > standard (bool) - Define wether the checkbox should be checked our unchecked
	 *
     * @param array $args contains everything needed to build the field
     */
	public function addUploadImage($args) {
		$args['type'] = 'upload_image';
		$this->boxes[] = $args;
	}
	
	public function addSingleImage($args) {
		$args['type'] = 'single_image';
		$this->boxes[] = $args;
	}	

	public function addGallery($args) {
		$args['type'] = 'gallery';
		$this->boxes[] = $args;
	}
	
	/**
     * Adds a alert to the current page
	 *
	 * Possible keys within $args:
	 *  > id (string) - This is what you need to get your variable from the database
	 *  > label (string) - Describes your field very shortly
	 *
     * @param array $args contains everything needed to build the field
     */
	public function addAlert($args) {
		$default = array(
			'class' => 'info',
		);
		$args = array_merge($default,$args);
		$args['type'] = 'alert';
		$this->boxes[] = $args;
	}
	
	/**
     * Adds a grouping to the current page
	 *
	 * Possible keys within $args:
	 *  > id (string) - This is what you need to get your variable from the database
	 *  > label (string) - Describes your field very shortly
	 *
     * @param array $args contains everything needed to build the field
     */
	public function addGroupOpen($args) {
		$default = array(
			'class' => 'group',
			'isExpert' => 'false',
			'float' => false
		);
		$args['type'] = 'group_open';
		$args = array_merge($default,$args);
		$this->boxes[] = $args;
	}
	
	public function addGroupClose($args) {
		$default = array(
			'class' => 'group',
		);
		$args['type'] = 'group_close';
		$args = array_merge($default,$args);
		$this->boxes[] = $args;		
	}	
	
	
	// get the type of the UI element
	public function getType(){
		return $this->type;
	}
	
	/**
     * Adds an expert grouping to the current page
	 *
	 * Possible keys within $args:
	 *  > id (string) - This is what you need to get your variable from the database
	 *  > label (string) - Describes your field very shortly
	 *
     * @param array $args contains everything needed to build the field
     */
	public function addExpertOpen($args) {
		$default = array(
			'class' => 'expert',
		);
		$args['type'] = 'expert_open';
		$args = array_merge($default,$args);
		$this->boxes[] = $args;
	}
	
	public function addExpertClose($args) {
		$default = array(
			'class' => 'group',
		);
		$args['type'] = 'expert_close';
		$args = array_merge($default,$args);
		$this->boxes[] = $args;		
	}		
	
	/**
     * Renders the interface
	 * @access private
     */
	public function renderUI() {
		$default = array(
			'context' => 'normal',
			'priority' => 'high',
		);
		$this->args = array_merge($default, $this->args);
		if(function_exists('add_meta_box')) {
			add_meta_box($this->args['id'], $this->args['title'], array($this, 'outputHTML'), $this->type, $this->args['context'], $this->args['priority']);
		}
	}
	
	/**
     * Switches the CustomImage box
	 * @access private
     */
	public function renderThumbnailBox() {
		remove_meta_box('postimagediv', $this->type, 'side');
		add_meta_box('postimagediv', $this->args['title'], 'post_thumbnail_meta_box', $this->type);
	}
	
	public function getTemplate($post_id){
		$custom_fields = get_post_custom_values('_wp_page_template', $post_id);
		return $custom_fields[0];
	}

	/**
     * Outputs all the HTML needed for the new elements
	 * @access private
     */
	public function outputHTML($post) {
		
		global $wp_pages, $wp_cats, $wp_gal_cats, $piecemaker_transitions_array, $box;
		
		wp_nonce_field( plugin_basename(__FILE__), $this->type.'_noncename' );
		
		$output = '<style type="text/css" media="screen">.editorcontainer { border:1px solid #DEDEDE; width: 100%}</style>
				 	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/base/jquery-ui.css" rel="stylesheet" />
					<script type="text/javascript">var safe = jQuery</script>
					<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
					<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/jquery-ui.min.js"></script>';

		if(count($this->boxes) > 0) {
			
			foreach($this->boxes as $box) {
						
				if( !isset( $box['standard'] ) ){					
					$box['standard'] = "";
				}
				
				$try = add_post_meta($post->ID, $box['id'], $box['standard'], true);				
				$data = get_post_meta($post->ID, $box['id'], true);
				
				// is this field hidden by default?
				$hidden =  isset( $box['display'] ) && $box['display'] === false ? " max_hidden" : "";	

				$hidden_field = "";
				$depend_container = "";
				
				if( isset($box['dependency']) && $box['dependency'] != "" ){
					if(is_array($box['dependency'])){
						$box['dependency'] = implode(',', $box['dependency']);
					}
					$depend_container = "max_meta_dependency ";
					$hidden_field .= '<input type="hidden" class="max_dependency" value="' . $box['dependency'] . '" />';
				}

				if( $box['type'] != "group_open" && $box['type'] != "group_close" ){
					
					$output .= '<div class="max_meta_box max_meta_box_' . $box['type'] . '">';
					$output .= '<div id="max_' . $box['id'] . '" class="max_meta_row ' . $depend_container . 'max_'.$box['type']. $hidden .'">';
					
					$output .= $hidden_field;
					
					// add the label if type is not an alert
					if( $box['type'] != "alert" && @$box['float'] !== true ){
						$output .= '<label for="'.$box['id'].'">'.$box['label'].'</label>';
					}		
			
					// add the form control container
					$output .= '<div class="max_form_container">';
					
					// add the description if type is not an alert
					if($box['type'] != "alert" && @$box['float'] !== true ){
						$output .= '<span class="max_description">'.@$box['desc'].'</span>';
					}
		
					$output .= '<div class="max_control">
									<span class="max_style_holder max_style_'.$box['type'].'">';					
				}
			
					switch($box['type']) {						

						// Group opener
						case 'group_open':
							$clearfix= "";
							$float = "";
							if(isset( $box['float'] ) && $box['float'] === true){
								$float = " max_float_box";
								$clearfix = "clearfix ";
							}
						
							$output .= '<div class="'. $clearfix . 'max_meta_box max_meta_box_' . $box['type'] . $float . '">';					
							$output .= '<div id="max_' . $box['id'] . '" class="' . $clearfix . $depend_container . 'max_'.$box['type']. $hidden .'">';
							if(isset( $box['float'] ) && $box['float'] === true){
								$output .= '<div class="max_meta_row">';
								$output .= '<div class="max_'.$box['type'].'_header">';
								$output .= '<label for="'.$box['id'].'">'.$box['label'].'</label>';
								$output .= '<span class="max_description">'.$box['desc'].'</span>';
								$output .= '</div>';
							}
							if( $box['isExpert'] === true ){
								$output .= '<div class="max_expert_link_row">';
								$output .= '<a href="javascript:void(0)" class="max_expert_link"><span class="icon"></span>' . $box['expertText'] .' <span>(<span class="num">0</span> Options)</span><span class="load"></span></a>';
								$output .= '<div class="max_expert_box" style="display: none;">';
							}							
							$output .= $hidden_field;
							
							$box['float'] = false;
							
						break;

						// Group closer
						case "group_close":
							$output .= '</div>'; // end of max_meta_row
							$output .= '</div>'; // end of max_meta_box
							if(isset( $box['float'] ) && $box['float'] === true){
								$output .= '</div>';
							}
											
							if( @$box['isExpert'] === true ){
								$output .= '</div>';
								$output .= '</div>';
							}							
						break;
						
						// creates the alert box with class, label and description
						case 'alert':					
							$data = htmlspecialchars(stripslashes($data));
							$output .= '<div class="max_alert max_alert_' . $box['class'] . '"><h4>'.$box['label'].'</h4>'.$box['desc'].'</div>';
							break;
						
						case 'input':
							$data = htmlspecialchars(stripslashes($data));
							$size = !isset($box['size']) ? "" : 'style="width: ' . $box['size'] . 'px"';
							if(!$data){
								$data = $box['standard'];
							}
							$output .= '<input type="text" class="regular-text max_control_input" name="' . $box['id'] . '" id="' . $box['id'] . '" ' . $size . ' value="' . $data . '" />';
							break;
	
						case 'hidden':
							$data = htmlspecialchars(stripslashes($data));
							if(!$data){
								$data = $box['standard'];
							}
							$output .= '<input type="hidden" class="regular-text max_control_hidden" name="' . $box['id'] . '" id="' . $box['id'] . '" value="' . $data . '" />';
							break;
							
						case 'textarea':
							$data = stripslashes($data);
							$size = !isset($box['size']) ? "" : 'style="width: ' . $box['size'] . 'px"';
							$output .= '<textarea rows="'.$box['rows'].'" cols="'.$box['cols'].'" class="max_control_textarea" name="'.$box['id'].'" ' . $size . ' id="'.$box['id'].'">'.$data.'</textarea>';
							break;
							
						case 'editor':
							$output .= '<div class="editorcontainer"><textarea class="theEditor max_control_textarea" id="'.$box['id'].'" rows="' . $box['rows'] . '" name="'.$box['id'].'">'.$data.'</textarea></div>';
							break;
						
						case 'checkbox':
							if($data == 'true') {
								$checked = 'checked="checked"';
							} else{
								$checked = '';
							}
							$output .= '<input type="checkbox" name="'.$box['id'].'" id="'.$box['id'].'" value="true" '.$checked.' class="max_control_checkbox" /> ';
							break;
	
						case 'multi_checkbox':		
						
							$check_array = get_post_meta($post->ID, $box['id'], true);
	
							if(!is_array($check_array)){
								$check_array = explode(',',$check_array);
							}
					
							foreach($box['options'] as $value => $label) {
								
								$checked = "";
								
								if( in_array($value, $check_array ) ){
									$checked .= ' checked="checked"';
								}						
							
								$output .= '<div class="max_multi_checkbox_row"><input type="checkbox" name="'.$box['id'].'['.$value.']" id="'.$box['id'].'['.$value.']" value="'.$value.'" '.$checked.' class="max_control_checkbox" /> ' . $label . '</div>';
						
							}
						
						break;
						
						case 'sortable_gallery_checkbox':
						
							if( !is_array( get_post_meta($post->ID, $box['id'], true) ) ){
								$term = get_term_by('slug', get_post_meta($post->ID, $box['id'], true), GALLERY_TAXONOMY);
								$selected_cats = array( $term->term_id => $term->term_id );
							}else{
								$selected_cats = get_post_meta($post->ID, $box['id'], true);	
							}						
							
							// make from entries an unique array
							$uniques = array_unique($selected_cats + $box['options']);
							
							// create the new option set
							foreach($uniques as $index => $value){
								$_term = get_term_by('id', $index, GALLERY_TAXONOMY);
								$new_options[$index] = $_term->name;
							}					
																				
							$output .= '<ul id="sortable'.$box['id'].'" class="max_style_sortable_checkbox">';
							foreach($new_options as $taxID => $taxonomy){
								
								$checked = "";
								
								if( in_array($taxID, $selected_cats) ){
									$checked = ' checked="checked"';
								}									
								
								$output .= '<li id="taxonomy_'.$taxID.'">
												<input type="checkbox" name="'.$box['id'].'['.$taxID.']" id="'.$box['id'].'['.$taxID.']" value="'.$taxID.'" '.$checked.' class="max_sortable_checkbox" />&nbsp;'.$taxonomy.'
												<span class="ui-icon ui-icon-grip-dotted-vertical"></span>
											</li>';
							}
							$output .= '</ul>';
							
							$output .= '<script type="text/javascript">
											$( "#sortable'.$box['id'].'" ).sortable({ forcePlaceholderSize: true, placeholder: "ui-state-highlight" });
										</script>';							
							
						break;						
							
						case 'multi_gallery_checkbox':
							
							if( !is_array( get_post_meta($post->ID, $box['id'], true) ) ){
								$term = get_term_by('slug', get_post_meta($post->ID, $box['id'], true), GALLERY_TAXONOMY);
								$selected_cats = array( $term->term_id => $term->term_id );
							}else{
								$selected_cats = get_post_meta($post->ID, $box['id'], true);	
							}
							
							if($box['options'] == 'gallery'){
								$taxonomy_names = get_object_taxonomies( 'gallery' );
							}else{
								$taxonomy_names	= get_categories( array('hirarchical' => 1) );
							}
																
							$hierarchical_taxonomies = array();
							$flat_taxonomies = array();

							if($box['options'] == 'gallery'){

								foreach ( $taxonomy_names as $taxonomy_name ) {
									
									$taxonomy = get_taxonomy( $taxonomy_name );
														
									if ( !$taxonomy->show_ui )
										continue;
						
									if ( $taxonomy->hierarchical )
										$hierarchical_taxonomies[] = $taxonomy;
									else
										$flat_taxonomies[] = $taxonomy;
								}
	
								if ( count( $hierarchical_taxonomies ) ) :
															
									foreach ( $hierarchical_taxonomies as $taxonomy ) :											
																				
										$output .= '<input type="hidden" name="" value="0" />';
										$output .= '<ul class="cat-checklist '.esc_attr( $taxonomy->name ).'-checklist">';
										ob_start();
										wp_terms_checklist( null, array( 'taxonomy' => $taxonomy->name, 'walker' => new max_category_checklist_walker, 'selected_cats' => $selected_cats, 'checked_ontop' => false ) );
										$output .= ob_get_contents();
										ob_end_clean();
										$output .= '</ul>';
								
									endforeach; //$hierarchical_taxonomies as $taxonomy 
								
								endif; // count( $hierarchical_taxonomies ) && !$bulk
							}

							if($box['options'] == 'category'){
								$output .= '<input type="hidden" name="" value="0" />';
								$output .= '<ul class="cat-checklist checklist">';
								ob_start();
								wp_category_checklist( 0, 0, $selected_cats, false, new max_category_checklist_walker, false );
								$output .= ob_get_contents();
								ob_end_clean();
								$output .= '</ul>';								
							}							
																					
						break;
	
						case 'sidebar_checkbox':		
												
							if(!$data){
								$data = $box['standard'];
							}					
							
							$output .= '<div class="max_sidebar_checkbox_row">';
							
							foreach($box['options'] as $value => $label) {
								
								// check active state
								$active = $data == $value ? "active" : "";
								
								$output .= '<span class="holder ' . $active . '">
												<a href="#" rel="' . $value . '" class="change-sidebar ' . $value . '">' . $label . '</a>
												<span class="max_description">' . $label . '</span>
											</span>';
							}
							
							$output .= '<input type="hidden" id="' . $box['id'] . '" name="'.$box['id'].'" value="'.$data.'" class="max_control_hidden" />
										</div>';
							
							break;
							
						case 'radio':
							$output .= '<td>';
							foreach($box['options'] as $label=>$value) {
								if($data == $value) {
									$checked = 'checked="checked"';
								} else {
									$checked = '';
								}
								$output .= '<input type="radio" name="'.$box['id'].'" id="'.$box['id'].'_'.$value.'" value="'.$value.'" '.$checked.' /> <label for="'.$box['id'].'_'.$value.'">'.$label.'</label><br>';
							}
							$output .= '</td>';
							break;
							
						case 'dropdown':
							$output .= '<select name="'.$box['id'].'" id="'.$box['id'].'" class="max_control_select">';
							foreach($box['options'] as $value => $label) {
								if($data == '') {
									$selected = ($box['standard'] == $label) ? 'selected="selected"' : '';
								} elseif($data == $value) {
									$selected = 'selected="selected"';
								} else {
									$selected = '';
								}
								$output .= '<option value="'.$value.'" '.$selected.'>'.$label.'</option>';
							}
							$output .= '</select>';
							break;
							
						case 'slider':
							if(!$data) $data = $box['standard'];
							$show = $data;
							if(is_array($show)) $show = implode('-',$show);
							$output .= '<div style="width: 305px" id="'.$box['id'].'_slider" class="ui-slider"></div>
										<input id="'.$box['id'].'_handle" class="ui-handle" value='.$show.' />
										<input type="hidden" name="'.$box['id'].'" id="'.$box['id'].'" value="'.$show.'" />
										<script type="text/javascript">
											var slider_'.$box['id'].' = jQuery("#'.$box['id'].'_slider").slider({';
																											   
							if(!is_array($data)) {
								$output .= 'value: '.$data.', 
											range: "min",';
							} else {
								$output .= 'range: true,
											values: ['.implode(',',$data).'],';
							}
							$output .= 'step:' .$box['step'].',
										max: '.$box['max'].',
										min: '.$box['min'].',';
										
							if(!is_array($data)) {
								$output .= 'slide: function(e,ui) { 
													jQuery("#'.$box['id'].'_handle").val(ui.value); jQuery("#'.$box['id'].'").val(ui.value); 
												}';
							} else {
								$output .= 'slide: function(e,ui) { 
													jQuery("#'.$box['id'].'_handle").val(ui.values[0]+"-"+ui.values[1]); 
													jQuery("#'.$box['id'].'").val(ui.values[0]+"-"+ui.values[1]); 
												}';
							}
							$output .= '});';
							
							$output .= 'jQuery(document).ready(function() {
											jQuery( "#'.$box['id'].'_handle" ).change(function() {
												if( jQuery(this).val() > '.$box['max'].' ){
													var val = '.$box['max'].';
													jQuery(this).val( val )
												}else{
													var val = jQuery(this).val();
												}								
												jQuery("#'.$box['id'].'").val(val);																   
												slider_'.$box['id'].'.slider( "value", val );
											})
										});';
							
							$output .= '</script>';
							break;
							
						case 'date':
							if(strlen($data) > 0) $data = date('m/d/Y',$data);
							$output .= '<input type="text" name="'.$box['id'].'" id="'.$box['id'].'" value="'.$data.'" class="max_control_date" />
										<script type="text/javascript">jQuery(document).ready(function($) { jQuery("#'.$box['id'].'").datepicker(); })</script>';
							break;
		
						case 'upload_image':
											
							// check image
																									
							$output .= '<div id="max_featured_image_wrap" class="clearfix">';
								
							// fill data array with default values if not exisiting
							if( !isset($data) || !is_array($data) ) {
								$data = array( 0 => array( "imgID" => "", "cropping" => "c" ) );
							}
															
							// data is an array of images						
							foreach( $data as $index => $value ){
								$_img = "";									
								$_img = wp_get_attachment_image( $value['imgID'], "slider-preview" );
								if(!$_img){
									$_img = '<img src="'.MAX_FW_DIR.'admin/images/no_image.jpg" width="237" height="162" />';
								}
							
								$output .= '<div class="clearfix max_meta_box max_image_row">
												<div class="media_upload_image">
													<div class="max_pic_preview">'. $_img .'</div>
													<input type="hidden" class="regular-text media_upload_input" rel="'.$value['imgID'].'" name="'.$box['id'].'[][imgID]" id="'.$box['id'].'_'.$index.'" value="'.$value['imgID'].'" /> 												
													<a id="'.$box['id'].'_'.$index.'_add" href="#'.$post->ID.'" class="max_media_upload button">Browse</a>
													<a href="#'.$post->ID.'" class="max_media_remove max_remove_icon" alt="Delete this image" title="Delete this image">Remove</a>												
												</div>';						
								
								// Create the cropping direction select					
								$output .=  '<div class="clearfix max_meta_subrow">	
											 <h4>Photo cropping direction</h4>
 											 <select id="'.$box['id'].'['.$index.'][cropping]" name="'.$box['id'].'['.$index.'][cropping]" class="max_control_select">';
								
								$cropping_array = array( 'c' => 'Position in the Center (default)',
												't' => 'Align top',
												'tr' => 'Align top right',
												'tl' => 'Align top left',
												'b' => 'Align bottom',
												'br' => 'Align bottom right',
												'bl' => 'Align bottom left',
												'l' => 'Align left',
												'r' => 'Align right'
											   );
								foreach( $cropping_array as $val => $option ){
									if($value['cropping'] == $val){
										$sel = 'selected="selected"';
									}else{
										$sel = "";
									}
									$output .= '<option value="'.$val.'" '.$sel.'>'.$option.'</option>';
								}
								$output .= '</select>';
								$output .= '</div></div>';
							}

							// #max_featured_image_wrap															
							$output .= '<input type="hidden" name="max_featured_hidden" value="9999" />';
							$output .=	'</div>';

						break;
						
						case 'single_image':
						
							$_img = "";									
							$_img = wp_get_attachment_image( $data, "admin-thumbnail" );																								
							
							$output .= '<div class="clearfix max_meta_box max_image_row">
											<div class="media_upload_image">
												<div class="max_pic_preview">'. $_img .'</div>
												<input type="hidden" class="regular-text media_upload_input" rel="'.$data.'" name="'.$box['id'].'" id="'.$box['id'].'" value="'.$data.'" /> 												
												<a id="'.$box['id'].'_add" href="#'.$post->ID.'" class="max_media_upload button">'.$box['button'].'</a>	
												<a id="'.$box['id'].'_remove" href="#'.$post->ID.'" class="media_upload_delete button">x</a>												
											</div>
										</div>';

						break;						
		
						case 'gallery':
							if(strlen($data) > 0) $data = date('m/d/Y',$data);
							$output .= '<div class="clearfix max_meta_box max_gallery_row">';
							$output .= do_shortcode('[gallery itemtag="ul" icontag="li" captiontag="p" link="file" columns="6" size="thumbnail" id="'.$post->ID.'"]');
							$output .= '</div>';					
						break;
		
					}
					
					if( $box['type'] != "group_open" && $box['type'] != "group_close" ){
						$output .= '</span>';
						$output .= '</div>';
						$output .= '<div class="max_clear"></div>'; // clear the container
						$output .= '</div>'; // end of max_form_container
						$output .= '</div>'; // end of max_meta_row
						$output .= '</div>'; // end of max_meta_box						
					}
			}
		}
		$output .= '<input type="hidden" name="'.$this->type.'_noncename" id="'.$this->type.'_noncename" value="'.wp_create_nonce(plugin_basename(__FILE__)).'" />
					<script type="text/javascript">jQuery = safe</script>';
		
		echo $output;
	}
	
	/**
     * Does all the complicated database stuff
	 * @access private
     */
	public function save($post_id) {
		
		if( @!wp_verify_nonce($_POST[$this->type.'_noncename'], plugin_basename(__FILE__))) {
			return $post_id;
		}
		if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return $post_id;
		}
		if('page' == $_POST['post_type']) {
			if(!current_user_can('edit_page', $post_id)) {
				return $post_id;
			}
		} else {
			if(!current_user_can('edit_post', $post_id)) {
				return $post_id;
			}
		}
		
		foreach($this->boxes as $box) {
			
			$nonsave_types = array('open', 'group_open','group_close', 'title', 'documentation', 'alert');

			$data = @$_POST[$box['id']];

			if($box['type'] == 'editor') {
				$data = wptexturize(wpautop($data));
			}
			if( $box['type'] == 'checkbox' ) {
				if($data != 'true') {
					$data = 'false';
				}
			}
			if($box['type'] == 'slider') {
				if(strpos($data, '-') !== false) {
					$data = explode('-',$data);
				}
			}
			if($box['type'] == 'date') {
				$date = explode('/', $data);
				if(isset($date[2])) $data = mktime(0,0,0,$date[0],$date[1],$date[2]);
			}

			
			if($box['type'] == 'upload_image' && $_POST['invictus_photo_slider_select'] != "none" && ( isset($_POST['invictus_featured_image'][0]['imgID'] ) && $_POST['invictus_featured_image'][0]['imgID'] != "" ) ) {
				
				foreach($_POST[$box['id']] as $_index => $_upload_images){

					if(!isset($_upload_images['imgID']) || $_upload_images['imgID'] == ""){
						unset( $_POST[$box['id']][$_index] );
					}
					
				};
			}
					
			if( @!in_array($value['type'], $nonsave_types ) ){
				update_post_meta($post_id, $box['id'], $data);	
			}
			
		}
		
	}
}

/*-----------------------------------------------------------------------------------*/
/* = Creates a new category tree walker to rename the input fields and id's
/*-----------------------------------------------------------------------------------*/

class max_category_checklist_walker extends Walker {
	
	var $tree_type = 'category';
	var $db_fields = array ('parent' => 'parent', 'id' => 'term_id' ); //TODO: decouple this

	function start_lvl(&$output, $depth, $args) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent<ul class='children'>\n";
	}

	function end_lvl(&$output, $depth, $args) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}

	function start_el(&$output, $category, $depth, $args) {

		global $box;

		extract($args);
		if ( empty($taxonomy) )
			$taxonomy = 'category';

		if ( $taxonomy == 'category' )
			$name = 'post_category';

			$css_class = "";

			if(isset($box['imageID']) && $box['imageID'] != "" ){
				$name = $box['id'].'['.$box['imageID'].']'.'['.$category->term_id.']';
			}else{
				$name = $box['id'].'['.$category->term_id.']';				
			}
			
			if(isset($box['hideid']) && $box['hideid'] == 1){
				$id = $category->slug;
			}else{
				if(isset($box['imageID']) && $box['imageID'] != ""){
					$css_class = $category->slug;
					$id = $box['id'].'['.$box['imageID'].']'.'['.$category->term_id.']';
				}else{
					$id = 'in-'.$taxonomy.'-' . $category->term_id;
				}
			}

		$class = in_array( $category->term_id, $popular_cats ) ? ' class="popular-category"' : '';
		$output .= "\n<li id='{$taxonomy}-{$category->term_id}'$class>" . '<label class="selectit"><input value="' . $category->term_id . '" type="checkbox" name="'.$name.'" id="'.$id.'"' . checked( in_array( $category->term_id, $selected_cats ), true, false ) . disabled( empty( $args['disabled'] ), false, false ) . ' class="'.$css_class.'" /> ' . esc_html( apply_filters('the_category', $category->name )) . '</label>';
	}

	function end_el(&$output, $category, $depth, $args) {
		$output .= "</li>\n";
	}
}
}
?>
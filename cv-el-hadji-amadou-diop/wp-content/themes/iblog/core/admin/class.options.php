<?php

/**
 * 
 *
 *  Theme Options Handling for Core 4.0 and newer themes
 *
 *
 *  @package PageLines Core
 *  @subpackage Options
 *  @since 4.0
 *
 */

class PageLinesOptions {

	// BUILD THE PAGELINES OBJECT
		function __construct() {
			$this->update_or_install();
			$this->get_options();	
		}
	
	
	//INITIAL INSTALL OR UPDATING
	function update_or_install(){
		
			//if options aren't set
			if(!get_option('pagelines_options') && !get_option('pagelines_options_redundant')){ 
			
				// first time using this theme in this install so set defaults
				$this->default_features();	
				$this->default_options();
				$this->save_options();
				
			}
		}

	// DEFAULT SETTINGS
	
		function default_options(){
				// admin	
				$this->credlink = "http://www.pagelines.com";
				$this->set_defaults_from_array(get_option_array());	
		}
		
		function default_features(){
		
			$this->features = get_default_features();
			$this->fboxes = get_default_fboxes();
			$this->set_defaults_from_array(get_feature_array());

		}
		

	// GET OPTION FUNCTIONS 
		function get_options() {
		
			if(!get_option('pagelines_options')){ 
				$saved_options = maybe_unserialize(get_option('pagelines_options_redundant'));
				update_option('pagelines_options',get_option('pagelines_options_redundant'));
			}else{ $saved_options = maybe_unserialize(get_option('pagelines_options'));	}
		
			if (!empty($saved_options) && is_object($saved_options)) {
				foreach ($saved_options as $option_name => $value)
					$this->$option_name = stripslashes_deep($value);
			}
			
		}
	
	// UPDATE OPTION FUNCTIONS
		function update_option($name, $data = false){
			$option_value =  isset($_POST[$name]) ? $_POST[$name] : null;
		
			if($data) $this->$name = $data;
			else $this->$name = $option_value;
		}
	
	// SAVE OPTION FUNCTIONS
		function save_options() {
			if(!isset($_GET['activated'])) checkauthority();
			update_option('pagelines_options', $this);
			
			//Redundancy Backup (Hopefully will solve suspected DB problems w some users)
			if(get_option('pagelines_options')){
				update_option('pagelines_options_redundant', $this);
			}
		}
		
		function save_features($postdata){
			
			$this->update_options_from_array(get_feature_array());
			
			if($postdata){
				$this->update_option('features', $postdata['feature']);
				$this->update_option('fboxes', $postdata['fbox']);
			}
			$this->save_options();
			
		}
	
	// RESTORE FUNCTIONS 
		
		function restore_options(){
			//if they get messed up
		
			$this->default_options();
			$this->save_options();	
		}
	
		
		function restore_features(){
		
			$this->default_features();
			$this->save_options();
		}
		
	// RESTORE FROM DATABASE FUNCTIONS	
		function restore_from_backup(){
		
			$this->restore_from_backup_with_array(get_option_array());
			$this->save_options();
		}
		
		function restore_features_from_backup(){
			$this->restore_from_backup_with_array(get_feature_array());
			$this->features = get_option('features');
			$this->fboxes = get_option('fboxes');
			$this->save_options();
		}
	
	// DATABASE BACKUP
		function backup_features($postdata){
			
			$this->save_features($postdata);
			
			$this->backup_from_array(get_feature_array(),$postdata);
	
			update_option('features', $_POST['feature']);
			update_option('fboxes', $_POST['fbox']);
		}

		function backup_options($postdata){
			$this->backup_from_array(get_option_array(), $postdata);
		}
		
	// ARRAY HELPER FUNCTIONS 

		function update_options_from_array($the_array = array()){
			foreach($the_array as $menuitem => $options ){
				foreach($options as $optionid => $o ){
					
					if($o['type']=='check_multi'){
						foreach($o['selectvalues'] as $multi_optionid => $multi_o){
							$this->update_option($multi_optionid);
						}
					}elseif(isset($o['wp_option']) && $o['type'] != 'image_upload'){
						// saves as a regular WP option
						if(isset($_POST[$optionid])) update_option($optionid, $_POST[$optionid]);
					}elseif($o['type'] == 'layout'){
					
						update_option('pagelines_layout_map', $_POST['layout']);
						
						//	print_r(get_option('pagelines_layout_map'));
					}
					else{
						$this->update_option($optionid);
					}
				}
			}		
		}

		function set_defaults_from_array($the_array = array()){
			foreach($the_array as $menuitem => $options ){
				foreach($options as $optionid => $o ){
					if($o['type']=='check_multi'){
						foreach($o['selectvalues'] as $multi_optionid => $multi_o){
							if(isset($multi_o['default'])) $this->$multi_optionid = $multi_o['default'];
						}
					}elseif(isset($o['wp_option'])){
						update_option( $optionid, $o['default']);
					}else{
						if(!VPRO && isset($o['version_set_default']) && $o['version_set_default'] == 'pro') $this->$optionid = null;
						elseif(isset($o['default'])) $this->$optionid = $o['default'];
					}
				}
			}
		}

		function backup_from_array($the_array = array(), $postdata){
			foreach($the_array as $menuitem => $options ){
				foreach($options as $optionid => $o ){
					if($o['type']=='check_multi'){
						foreach($o['selectvalues'] as $multi_optionid => $multi_o){
							if(isset($postdata[$multi_optionid])) update_option($multi_optionid, $postdata[$multi_optionid]);
						}
					}elseif(isset($postdata[$optionid])){update_option($optionid, $postdata[$optionid]);}
				}
			}
		}

		function restore_from_backup_with_array($the_array = array()){
			foreach($the_array as $menuitem => $options ){
				foreach($options as $optionid => $optionfields ){
					if($o['type']=='check_multi'){
						foreach($o['selectvalues'] as $multi_optionid => $multi_o){
							$this->$multi_optionid = get_option($multi_optionid);
						}
					}else{
						$this->$optionid = get_option($optionid);
					}
				}
			}
		}

}

//********* END OF OPTIONS HANDLING CLASS *********//


// ========================================================
// = PageLines Options Functions - (Return Option Values) =
// ========================================================

	function pagelines($option, $post_id = ''){

		if($post_id && get_post_meta($post_id, $option, true) && !is_home()){
			//if option is set for a page/post
			return get_post_meta($post_id, $option, true);
		}else{
			//if not set on page/post return global option.
			global $pagelines; 
			if (is_object($pagelines) && isset($pagelines->$option)){
				return $pagelines->$option;
			} else return false;
		}
	}

	function pagelines_pro($option, $post_id = ''){

		if(VPRO) return pagelines($option, $post_id);
		else return false;
	}


	function e_pagelines($option, $alt = '', $post_id = ''){

		global $pagelines; 
	
		if($post_id && get_post_meta($post_id, $option, true) && !is_home()){
			//if option is set for a page/post
			echo get_post_meta($post_id, $option, true);
		}elseif(isset($pagelines->$option)&&!empty($pagelines->$option)){
			echo $pagelines->$option;
		}else{
			echo $alt;
		}	
	}

	function m_pagelines($option, $post){
		$meta = get_post_meta($post, $option, true);
		if(isset($meta) && !is_home()){
			return $meta;
		}else{
			return false;
		}
	}


	function em_pagelines($option, $post, $alt = ''){
		$post_meta = m_pagelines($option, $post);
	
		if(isset($post_meta)){
			echo $post_meta;
		}else{
			echo $alt;
		}
	}


/**
 * 
 *
 *  Options Layout Class
 *
 *
 *  @package PageLines Core
 *  @subpackage Options
 *  @since 4.0
 *
 */

class PageLinesOptionsLayout {

	/*
		Build The Layout
	*/
		function __construct() {
			$this->build_header();
			$this->build_body();
			$this->build_footer();	
		}
		
		function build_header(){?>
	
		<?php }
		
		function build_body(){?>

		<?php }
		
		function build_footer(){?>

		<?php }
		
		function option_engine(){?>
			
		<?php }
		
		function save_options(){
			
		}


} 
// ===============================
// = END OF OPTIONS LAYOUT CLASS =
// ===============================
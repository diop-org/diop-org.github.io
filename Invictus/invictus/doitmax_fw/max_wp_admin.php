<?php

/*-----------------------------------------------------------------------------------*/
/*	Load needed JS for admin head
/*-----------------------------------------------------------------------------------*/
function max_admin_head() {	
	
?>
			<script type="text/javascript" language="javascript">
			
				jQuery(document).ready(function(){
					
					// Race condition to make sure js files are loaded
					if (typeof AjaxUpload != 'function') { 
						return ++counter < 6 && window.setTimeout(init, counter * 500);
					}			
			
					//AJAX Upload
					jQuery('.image_upload_button').each(function(){
					
						var obj_clicked = jQuery(this);
						var obj_id = jQuery(this).attr('id');	
						new AjaxUpload(obj_id, {
						  action: '<?php echo admin_url("admin-ajax.php"); ?>',
						  name: obj_id, // File upload name
						  data: { // Additional data to send
								action: 'max_ajax_post_action',
								type: 'upload',
								data: obj_id },
						  autoSubmit: true, // Submit file after selection
						  responseType: false,
						  onChange: function(file, extension){},
						  onSubmit: function(file, extension){
								obj_clicked.text('Uploading'); // change button text, when user selects file	
								this.disable(); // If you want to allow uploading only 1 file at time, you can disable upload button
								interval = window.setInterval(function(){
									var text = obj_clicked.text();
									if (text.length < 13){	obj_clicked.text(text + '.'); }
									else { obj_clicked.text('Uploading'); } 
								}, 200);
						  },
						  onComplete: function(file, response) {
						   				   						   
							window.clearInterval(interval);
							obj_clicked.text('Upload Image');	
							this.enable(); // enable upload button
							
							// If there was an error
							if(response.search('Upload Error') > -1){
								var buildReturn = '<span class="upload-error">' + response + '</span>';
								jQuery(".upload-error").remove();
								obj_clicked.parent().after(buildReturn);							
							}
							else{

								var buildReturn = '<img class="hide max-option-image" id="image_'+obj_id+'" src="'+response+'" alt="" />';
		
								jQuery(".upload-error").remove();
								jQuery("#image_" + obj_id).remove();	
								obj_clicked.parent().after(buildReturn);
								jQuery('img#image_'+obj_id).fadeIn();
								obj_clicked.next('span').fadeIn();
								jQuery('#'+obj_clicked.attr('data-rel')).val(response);	
						
							}
						  }
						});
					
					});

					//AJAX Remove (clear option value)
					jQuery('.image_reset_button').click(function(){
					
							var obj_clicked = jQuery(this);
							var obj_id = jQuery(this).attr('id');
							var theID = jQuery(this).attr('title');	
			
							var ajax_url = '<?php echo admin_url("admin-ajax.php"); ?>';
						
							var data = {
								action: 'max_ajax_post_action',
								type: 'image_reset',
								data: theID
							};
							
							jQuery.post(ajax_url, data, function(response) {
								var image_to_remove = jQuery('#image_' + theID);
								var button_to_hide = jQuery('#reset_' + theID);
								image_to_remove.fadeOut(500,function(){ jQuery(this).remove(); });
								button_to_hide.fadeOut();
								jQuery('#'+obj_clicked.attr('data-rel')).val('');							
							});
							
							return false; 
							
						});   	 	
					
			
			
					//Update Message popup
					jQuery.fn.center = function () {
						this.animate({"top":( jQuery(window).height() - this.height() - 200 ) / 2 + jQuery(window).scrollTop() + "px"}, 100);
						this.css({ left: "50%", marginLeft: - this.width() / 2 });
						return this;
					}
					
					jQuery('#max-popup-save').center();
					jQuery('#max-popup-reset').center();
			
					// center save popup on window scroll
					jQuery(window).scroll(function() {			
						jQuery('#max-popup-save').center();
						jQuery('#max-popup-reset').center();			
					});
					
					//Save the form
					jQuery('#max-option-form').submit(function(){
						
						function newValues() {
						  var serializedValues = jQuery("#max-option-form").serialize();
						  return serializedValues;			
						}				
						
						jQuery(":checkbox, :radio").click(newValues);
						jQuery("select").change(newValues);
						jQuery('.ajax-loading').css({ visibility: 'visible', diplay: 'none' }).fadeIn();
						
						var serializedReturn = newValues();
											 
						var ajax_url = '<?php echo admin_url("admin-ajax.php"); ?>';
						
						//var data = {data : serializedReturn};
						
						var data = {
							<?php if(isset($_REQUEST['page']) && $_REQUEST['page'] == 'maxframe'){ ?>
							type: 'options',
							<?php } ?>
							action: 'max_ajax_post_action',
							data: serializedReturn
						};
								
						jQuery.post(ajax_url, data, function(response) {
											
							var success = jQuery('#max-popup-save');
							var loading = jQuery('.ajax-loading');
								loading.fadeOut(250, function(){ 
									jQuery(this).css({ visibility: 'hidden', display: 'block' })
								});  
							success.fadeIn();
							window.setTimeout(function(){ success.fadeOut() }, 2000);
							
						});
								
						return false; 
						
					});   	 	
							
				});			
			
			</script>
		<?php 
		}
		
		
/*-----------------------------------------------------------------------------------*/
/* Load required javascripts for Options Page in admin head
/*-----------------------------------------------------------------------------------*/

function max_load_only() {

	add_action('admin_head', 'max_admin_head');	
	
}
		
/*-----------------------------------------------------------------------------------*/
/* Generate the admin menu
/*-----------------------------------------------------------------------------------*/

add_action('admin_menu', 'max_admin_add_admin');
	
function max_admin_add_admin() {					
	global $themename;				

	$max_page = add_menu_page($themename, $themename, 'administrator', 'maxframe', 'max_theme_admin', MAX_FW_DIR."admin/images/menu_icon.png");	
	
	add_action("admin_print_scripts-$max_page", 'max_load_only');
	add_action("admin_print_styles-$max_page",'max_load_only');	
	
	//add_submenu_page( basename(__FILE__), 'Invictus', 'Settings', 'manage_options', 'maxframe', 'max_theme_admin');	
}
		
/*-----------------------------------------------------------------------------------*/
/* Ajax option save callback
/*-----------------------------------------------------------------------------------*/

add_action('wp_ajax_max_ajax_post_action', 'max_ajax_callback'); 

function max_ajax_callback() {
		
	global $wpdb, $social_array;
				
	$type_to_save = $_POST['type'];
			
	//Uploads
	if($type_to_save == 'upload'){

		$clicked_id = $_POST['data']; // Acts as the name
		$filename = $_FILES[$clicked_id];
				
		$filename['name'] = preg_replace('/[^a-zA-Z0-9._\-]/', '', $filename['name']); 
				
		$override['test_form'] = false;
		$override['action'] = 'wp_handle_upload';    
		$uploaded_file = wp_handle_upload($filename, $override);
				 
		$upload_tracking[] = $clicked_id;
		update_option( $clicked_id.'_value', $uploaded_file['url'] );
						
		if(!empty($uploaded_file['error'])) {echo 'Upload Error: ' . $uploaded_file['error']; }	
		else { echo $uploaded_file['url']; } // Is the Response
		
	} elseif ($type_to_save == 'image_reset') {
					
		$id = $_POST['data'].'_value'; // Acts as the name
		global $wpdb;
		$query = "DELETE FROM $wpdb->options WHERE option_name LIKE '$id'";
		$wpdb->query($query);
			
	} elseif ($type_to_save == 'options') {		
		
		$data = $_POST['data'];		
		parse_str($data, $output);
			
		$themename =  get_option('max_themename');      
		$shortname =  get_option('max_shortname'); 
		$options   =  get_option('max_template');	
						
		foreach ($options as $value) {  
						
			$type = $value['type'];
			$id = $value['id'];
			$old_value = get_option($id);
			$new_value = '';				
					
			$nonsave_types = array('section', 'subhead', 'open', 'close');
						
			if( @!in_array($type, $nonsave_types)){
						
				if( $type == 'socialinput' ){
					foreach($social_array as $s_index => $s_value){
						update_option( MAX_SHORTNAME . '_social_' . $s_index, $output[ MAX_SHORTNAME . '_social_' . $s_index ]  );
					}
				}
								
				if(isset($output[$id])){
					$new_value = $output[$id];
				}
				
				if($new_value == '' && $type == 'checkbox'){ // Checkbox Save					
					$new_value = 'false';					
				}
				elseif ($new_value == 'true' && $type == 'checkbox'){ // Checkbox Save						
					$new_value = 'true';					
				}														
				update_option($id, $new_value);						
			}						
		}
	}
			
	die();
		
} 

/*-----------------------------------------------------------------------------------*/
/*	Custom get_option function with echo function
/*-----------------------------------------------------------------------------------*/

function get_option_max($id, $echo = false){
	global $shortname;
	$option = get_option($shortname."_$id");
  
  	// if echo is set true
	if ($echo)
    	echo $option;
  
	return $option;	
}

/*-----------------------------------------------------------------------------------*/
/*	Get Admin Options Scripts and CSS
/*-----------------------------------------------------------------------------------*/

add_action('admin_enqueue_scripts', 'max_admin_add_init');

function max_admin_add_init($hook) {
	
	if ( $hook == 'post.php' || 
		 $hook == 'media-upload-popup' ||
		 $hook == 'post-new.php' || 
		 @$_REQUEST['page'] == 'max_options' || 
		 @$_REQUEST['page'] == 'maxframe' || 
		 @$_REQUEST['page'] == "photos_mass_posting"
		){
		
		global $fw_dir;
		wp_enqueue_style('functions', MAX_FW_DIR."admin/css/admin.css", false, "1.0", "all");
		wp_enqueue_style('checkbox', MAX_FW_DIR."admin/css/checkbox.css", false, "1.0", "all");
		wp_enqueue_style('thickbox');
		
		wp_enqueue_script('jquery', "http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js");
		wp_enqueue_script('jquery-ui',"http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js");
		
		wp_enqueue_script('jquery-live-query', MAX_FW_DIR.'admin/js/jquery.livequery.min.js', array('jquery'), '1.0' );
		wp_enqueue_script('jquery-color-picker', MAX_FW_DIR.'admin/js/colorpicker.js', array('jquery'));
		wp_enqueue_script('jquery-checkbox', MAX_FW_DIR.'admin/js/jquery.iphone.checkbox.js', array('jquery'));
		wp_enqueue_script('jquery-ajaxupload',MAX_FW_DIR.'/admin/js/ajaxupload.js', array('jquery'));
		wp_enqueue_script('jquery-appendo', MAX_FW_DIR.'admin/js/jquery.appendo.js', array('jquery'), '1.0' );
		
		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
		
		wp_enqueue_script('max_script', MAX_FW_DIR.'admin/js/scripts.js', array('jquery','media-upload','thickbox'), '1.0' );
		
		
	}
	
}

/*-----------------------------------------------------------------------------------*/
/* Add default options after activation
/*-----------------------------------------------------------------------------------*/
if (is_admin() && isset($_GET['activated'] ) ) {

	add_action('admin_head','max_option_setup');
	
	$opt_str = MAX_SHORTNAME.'_theme_activation';
	$theme_activation = get_option($opt_str);
	if(empty($theme_activation)){
		add_option($opt_str, 'true', null, false);
	}else{
		update_option($opt_str, 'true');
	}
	
	header( 'Location: '.admin_url().'admin.php?page=maxframe' ) ;	
	
}

function max_option_setup(){

	global $shortname, $fw_dir;

	//Update EMPTY options
	$max_array = array();
	add_option('max_options',$max_array);

	$template = get_option('max_template');
	$saved_options = get_option('max_options');
	
	$nonsave_types = array('section', 'subhead', 'open', 'close');						
	
	foreach($template as $option) {
		if( @!in_array($type, $nonsave_types)){	
			$id = $option['id'];
			$std = $option['std'];
			$db_option = get_option($id);
			
			if(empty($db_option)){
				
				if(is_array($option['type'])) {
					
					foreach($option['type'] as $child){
						$c_id = $child['id'];
						$c_std = $child['std'];
						update_option($c_id,$c_std);
						$max_array[$c_id] = $c_std; 
					}
					
				} else {
					
					if( $option['type'] == 'checkbox' && $std == 'false' ) {
						$max_array[$id] = 'false';
						update_option($id, 'false');
					}else{
						update_option($id, $std);
						$max_array[$id] = $std;
					}					
					
				}
			}
			else { //So just store the old values over again.
			
				if( $option['type'] == 'checkbox' && $db_option == "" ) {
					$max_array[$id] = 'false';
				}else{
					$max_array[$id] = $db_option;	
				}
				
			}
			
		}
	}
		
	update_option('max_options', $max_array);
}

/*-----------------------------------------------------------------------------------*/
/*	Create the Admin options
/*-----------------------------------------------------------------------------------*/

function max_theme_admin() {

	global $shortname, $fw_dir;

    $options =  get_option('max_template');      
    $themename =  get_option('max_themename');
	
	$i=0;
	
	// check for first launch or theme activation and show the welcome popup
	$theme_activation = get_option(MAX_SHORTNAME.'_theme_activation');
	$first_launch = get_option(MAX_SHORTNAME.'_first_launch');
	
	if( $theme_activation == 'true' || ( $first_launch == 'false' || !$first_launch ) ){
		?>
		
		<script type="text/javascript">
		jQuery(document).ready(function($){
			
			tb_show('', '<?php echo MAX_FW_DIR ?>/includes/activation.inc.php?TB_iframe=true');			
			$("#TB_window,#TB_overlay,#TB_HideSelect").one("unload",killTBUnload);
			
			function killTBUnload(e) {
				e.stopPropagation();
				e.stopImmediatePropagation();
				return false;
			}			
		})
		</script>
			
		<?php
		
		// set options to false to not open the thickbox again
		update_option(MAX_SHORTNAME.'_theme_activation', 'false');
		update_option(MAX_SHORTNAME.'_first_launch', 'true');
		
	}
	?>

	<div id="maxFrame-wrapper">

		<div id="max-popup-save" class="max-save-popup">
			<div class="max-save-save"><?php echo MAX_THEMENAME ?> Options Updated</div>
		</div>
		<div id="max-popup-reset" class="max-save-popup">
			<div class="max-save-reset"><?php echo MAX_THEMENAME ?> Options Reset</div>
		</div>
	
		<div id="maxFrame-admin" class="wrap">
			
			<div id="header">
				<div class="padding">
					<div class="clearfix">
						<div id="icon-options-general" class="icon32"><br></div> 
						<h2>Theme Options</h2>
									
						<ul class="header-links">
							<li><a href="index.php?page=theme-update-notifier">Changelog</a></li>
							<li class="div">&nbsp;|&nbsp;</li>
							<li><a href="<?php echo MAX_DOCUMENTATION_LINK ?>" title="Open Documentation in a new window" target="_blank"><img src="<?php echo MAX_FW_DIR ?>admin/images/icons/icon-info.png" alt="help"/> Help</a></li>
							<li class="div">&nbsp;|&nbsp;</li>
							<li class="icon facebook">
								<a href="http://www.facebook.com/pages/doitmax/120695808006003" title="Follow doitmax on Facebook" target="_blank">
									<img src="<?php echo get_template_directory_uri() ?>/images/social/facebook.png" alt="Facebook"/>
									<span>Follow doitmax on Facebook and receive notifications about updates and new items.</span>
								</a>
							</li>							
							<li class="icon twitter">
								<a href="http://www.twitter.com/doitmax" title="Follow doitmax on Twitter" target="_blank">
									<img src="<?php echo get_template_directory_uri() ?>/images/social/twitter.png" alt="Twitter"/>
									<span>Follow doitmax on Twitter and receive notifications about updates and new items.</span>
								</a>
							</li>
							<li class="icon themeforest">
								<a href="http://themeforest.net/user/doitmax/follow" title="Follow doitmax on themeforest" target="_blank">
									<img src="<?php echo get_template_directory_uri() ?>/images/social/themeforest.png" alt="Themeforest"/>
									<span>Follow doitmax on themeforest and receive notifications about updates and new items.</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
	
			<div id="content_wrap" class="clearfix">
				<form action="" enctype="multipart/form-data" id="max-option-form">			
	
					<div class="info top-info">
						<img src="<?php echo MAX_FW_DIR ?>admin/images/loading.gif" class="ajax-loading ajax-loading-bottom" alt="Saving..." />
						<input type="submit" name="save" class="button-primary  save-options" value="Save All Changes">   					
					</div>			
					<div id="content" class="clearfix">
						<div id="options_tabs" class="ui-tabs">
							<ul class="options_tabs ui-tabs-nav">
								
								<?php foreach ($options as $value) {
									switch ( $value['type'] ) {
										case "section":					
											$i++;					
										?>		
										<li>
											<a href="#option_<?php echo $value['id']; ?>">
												<?php if ($value['icon']){ ?>
												<img src="<?php echo MAX_FW_DIR ?>admin/images/icons/<?php echo $value['icon'] ?>" />											
												<?php } ?>
												<?php echo $value['name']; ?><span></span>
											</a>
											<div id="adminmenushadow"></div>
											<div class="wp-menu-arrow"><div></div></div>
										</li>
										<?php break;
									}
									
								}?>
								
							</ul>
			
							<?php foreach ($options as $value) {
								
								// check, if it is a grouped option
								if( !isset($value['grouped']) || $value['grouped'] === false ){
									if($value['type'] !=  "subhead" && $value['type'] != "open" && $value['type'] != "close" && $value['type'] != "section"){

									?>
									<div id="option_<?php echo $value['id'] ?>" class="clearfix max-option max-<?php echo $value['type'] ?>">
									
										<h3><?php echo $value['name']; ?></h3>
										<div class="section section_<?php echo $value['type'] ?>">
											<div class="element">
										
									<?php
									}
								}							
								
								switch ( $value['type'] ) {
									
									// --> open the option section
									case "open":
									?>
									
									<?php break;
									
									// --> create a subheadline
									case "subhead":
									?>
										
										<div class="max-sub-header">
											<h2>
												<img src="<?php echo $fw_dir ?>admin/images/icons/cog.png" />													
												<?php echo $value['name']; ?>
											</h2>
										</div>
									
									<?php break;								
									
				
									// --> close the option section
									case "close":
									?>
		
										</div>
								
									<?php break;
	
									case 'slider':

										$std =  $value['std'];
										$option_key = $value['id'];
										$saved = get_option( $option_key );
										if(!$saved){
											$saved = $std;
										}
											
										$show = $saved;
												
										if(is_array($show)) $show = implode('-',$show);
										?>
										<div class="max_style_holder max_style_<?php echo $value['type'] ?>">
											<div style="width: 230px" id="<?php echo $value['id'] ?>_slider" class="ui-slider"></div>
											<input type="text" id="<?php echo $value['id'] ?>_handle" class="slide-value ui-handle" value="<?php echo $show ?>">
										</div>
										<input type="hidden" name="<?php echo $value['id'] ?>" id="<?php echo $value['id'] ?>" value="<?php echo $show ?>" />
										<script type="text/javascript">
											jQuery("#<?php echo $value['id'] ?>_slider").slider({
												<?php 
												if(!is_array($saved)) {
													echo 'value: '.$saved.',';
													echo 'range: "min",';
												} else {
													echo 'range: true,';
													echo 'values: ['.implode(',',$saved).'],';
												}
												echo 'step:' .$value['step'].',';
												echo 'max: '.$value['max'].',';
												echo 'min: '.$value['min'].',';
												if(!is_array($saved)) {
													echo 'slide: function(e,ui) { jQuery("#'.$value['id'].'_handle").val(ui.value); jQuery("#'.$value['id'].'").val(ui.value); },';
												} else {
													echo 'slide: function(e,ui) { jQuery("#'.$value['id'].'_handle").val(ui.values[0]+"-"+ui.values[1]); jQuery("#'.$value['id'].'").val(ui.values[0]+"-"+ui.values[1]); },';
												}													
												?>
											});
											
											jQuery( "#<?php echo $value['id'] ?>_handle" ).change(function() {																								   
												if( jQuery(this).val() > <?php echo $value['max'] ?> ){
													var val = <?php echo $value['max'] ?>;
													jQuery(this).val( val )
													jQuery( "#<?php echo $value['id'] ?>" ).val( val );
												}else{
													var val = jQuery(this).val();
													jQuery( "#<?php echo $value['id'] ?>" ).val( val );
												}																								   
												jQuery("#<?php echo $value['id'] ?>_slider").slider( "value", val );
											});
											
										</script>								
									<?php
									break;
	
									// --> Create a text input
									case 'text':
									?>
										<div class="max_style_holder max_style_<?php echo $value['type'] ?>">
											<input class="max_control_input" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" size="<?php echo $value['size']; ?>" />
										</div>								 
									<?php
									break;
									
									// --> Create a textarea input
									case 'textarea':
									?>
										<div class="max_style_holder max_style_<?php echo $value['type'] ?>">
											<textarea class="max_control_textarea" name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows="<?php echo $value['rows']; ?>"><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id']) ); } else { echo $value['std']; } ?></textarea>
										</div>
									<?php
									break;
									
									// --> Create a select input
									case 'select':
									?>
										<div class="max_style_holder max_style_<?php echo $value['type'] ?>">
											<select class="max_control_select" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
											<?php foreach ($value['options'] as $index => $option ) { ?>
												<option value="<?php echo $index ?>" <?php if (get_option( $value['id'] ) == $index) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option>
											<?php } ?>
											</select>
										</div>
									<?php
									break;
									
									// --> Create the font Select 
									case 'font':
																	
										// set font size & line height range
										$_font_sizes = range($value['min'], $value['max']);
										$_line_height = range(1,80);
										
										// get values
										$_font_array= get_option( $value['id'] );
										$_val_font_size 	= $_font_array['font_size'];
										$_val_line_height 	= $_font_array['line_height'];
										$_val_font_family 	= $_font_array['font_family'];
										$_val_font_weight 	= $_font_array['font_weight'];
										$_val_font_color 	= $_font_array['font_color'];
																			
										// standard values is an array
										if(is_array($value['std'])){
											$_std = $value['std'];
										}
										
										if(!$_val_font_size || $_val_font_size == "") $_val_font_size = $_std['font_size'];
										if(!$_val_line_height || $_val_line_height == "") $_val_line_height = $_std['line_height'];
										if(!$_val_font_family || $_val_font_family == "") $_val_font_family = $_std['font_family'];
										if(!$_val_font_weight || $_val_font_weight == "") $_val_font_weight = $_std['font_weight'];
										if(!$_val_font_color || $_val_font_color == "") $_val_font_color = $_std['font_color'];
																		
									?>
										<?php // font size select ?>
										<div id="<?php echo $value['id'] ?>_holder">
											<div class="max_style_holder max_style_select">
												<select class="max_control_select max_control_font_size" name="<?php echo $value['id'] ?>[font_size]" id="<?php echo $value['id'] ?>_font_size">
													<?php 
													foreach($_font_sizes as $_sizes){ 
														$_checked = false;
														if($_sizes == $_val_font_size){
															$_checked = ' selected="selected"';
														}
													?>											
													<option value="<?php echo $_sizes ?>" <?php echo $_checked ?>><?php echo $_sizes ?>px</option>
													<?php } ?>
												</select>
												<span class="font-desc"><?php _e('Font-Size', MAX_SHORTNAME) ?></span>
											</div>
										
											<?php // line height select ?>
											<div class="max_style_holder max_style_select">
												<select class="max_control_select max_control_line_height" name="<?php echo $value['id'] ?>[line_height]" id="<?php echo $value['id'] ?>_line_height">
													<?php 
													foreach($_line_height as $_sizes){ 
														$_checked = false;
														if($_sizes == $_val_line_height){
															$_checked = ' selected="selected"';
														}
													?>											
													<option value="<?php echo $_sizes ?>" <?php echo $_checked ?>><?php echo $_sizes ?>px</option>
													<?php } ?>
												</select>
												<span class="font-desc"><?php _e('Line-Height', MAX_SHORTNAME) ?></span>
											</div>										
										
											<?php // font family select ?>
											<div class="max_style_holder max_style_select">
												<select class="max_control_select max_control_font_family" name="<?php echo $value['id'] ?>[font_family]" id="<?php echo $value['id']; ?>_font_family">
													<option value="<?php echo $_val_font_family ?>" selected="selected"><?php echo $_val_font_family ?></option>
													<option value="off">None (Turn off the Font)</option>
													<?php max_google_font_select() ?>
												</select>
												<span class="font-desc"><?php _e('Font-Family', MAX_SHORTNAME) ?></span>
											</div>
											
											<?php // font weight select ?>
											<div class="max_style_holder max_style_select">
												<select class="max_control_select max_control_font_weight" name="<?php echo $value['id'] ?>[font_weight]" id="<?php echo $value['id'] ?>_font_weight">
													<option value="300" <?php if( $_val_font_weight == 'light') echo ' selected="selected"'; ?>>Light (not all fonts)</option>
													<option value="normal" <?php if( $_val_font_weight == 'normal') echo ' selected="selected"'; ?>>Normal</option>
													<option value="italic" <?php if( $_val_font_weight == 'italic') echo ' selected="selected"'; ?>>Italic</option>
													<option value="bold" <?php if( $_val_font_weight == 'bold') echo ' selected="selected"'; ?>>Bold</option>
													<option value="bold_italic" <?php if( $_val_font_weight == 'bold_italic') echo ' selected="selected"'; ?>>Bold Italic</option>
												</select>
												<span class="font-desc"><?php _e('Font-Weight', MAX_SHORTNAME) ?></span>
											</div>	
											
											<div class="max_style_holder max_style_colorpicker">																		
												<?php // font color input ?>										
												<div id="cp_<?php echo $value['id']; ?>_font_color" class="cp_box">
													<div class="color_display" style="background-color:<?php echo $_val_font_color ?>"></div> 
												</div>												
												<input  maxlength="7" type="text" name="<?php echo $value['id']; ?>[font_color]" id="colorpicker_<?php echo $value['id']; ?>_color" value="<?php echo $_val_font_color ?>" class="cp_input max_control_input max_control_font_color" />
												<span class="font-desc"><?php _e('Color', MAX_SHORTNAME) ?></span>
											</div>
											<script type="text/javascript">
												jQuery(document).ready(function($) { 
												
													function colorPickerTrigger(val){
														var add = "";
														if(val.charAt(0) != '#') add = '#';
														
														jQuery('#cp_<?php echo $value['id']; ?>_font_color div').css({'backgroundColor': add+val });
														jQuery('#colorpicker_<?php echo $value['id']; ?>_color').val(add+val);
														jQuery('#<?php echo $value['id']; ?>_preview .font-preview-text').css({ color: add+val });														
													}
													
													$('#colorpicker_<?php echo $value['id']; ?>_color').ColorPicker({
														onSubmit: function(hsb, hex, rgb, el) {															
															colorPickerTrigger(hex);	
															jQuery(el).ColorPickerHide();															
														},
														onBeforeShow: function () {
															$(this).ColorPickerSetColor(this.value);
															return false;
														},
														onChange: function (hsb, hex, rgb) {
															colorPickerTrigger(hex);															
														}
													}).bind('keyup change', function(){														
														$(this).ColorPickerSetColor(this.value);
														colorPickerTrigger(this.value);														
													});
																
													$('#cp_<?php echo $value['id']; ?>_font_color').next('input').change(function(){
													   $('#cp_<?php echo $value['id']; ?>_font_color div').css({'backgroundColor': $(this).val(), 'backgroundImage': 'none'});
													})
													
												});
											</script>											
										</div>
										
										<?php // the preview ?>									
									
										<div id="<?php echo $value['id']; ?>_preview" class="font-preview preview_<?php get_option_max('color_main',true) ?>">
											<div class="font-preview-text">
												The quick brown fox jumps over the lazy dog
											</div>
										</div>
											
											<?php max_get_google_font( array( $_val_font_family ) ); ?>
												
											<style>
												#<?php echo $value['id']; ?>_preview {
													color: <?php echo $_val_font_color ?>;
													font-family: "<?php echo $_val_font_family ?>"; 
													font-size: <?php echo $_val_font_size ?>px !important;
													line-height: <?php echo $_val_line_height?>px !important;
													<?php if( $_val_font_weight != 'bold_italic'){ ?>
													font-weight: <?php echo $_val_font_weight ?> !important;
													<?php }else{ 
													$_new_font_weight = explode("_", $_val_font_weight);
													?>
													font-weight: <?php echo $_new_font_weight[0] ?>;
													font-style: <?php echo $_new_font_weight[1] ?>;
													<?php } ?>
													padding: 13px;
													margin: 13px 0;
													position: relative;
													height: auto;
												}
												
												#<?php echo $value['id']; ?>_preview .font_preview_text { height: auto; }
											</style>
										
										
										<script type="text/javascript">
											jQuery(document).ready(function() {
												
												jQuery('#<?php echo $value['id']; ?>_holder select').change(function(){ 
												
													var font 		= jQuery('#<?php echo $value['id']; ?>_font_family').val();
													var font_size 	= jQuery('#<?php echo $value['id']; ?>_font_size').val();
													var line_height = jQuery('#<?php echo $value['id']; ?>_line_height').val();
													var font_weight = jQuery('#<?php echo $value['id']; ?>_font_weight').val();
													var font_color 	= jQuery('#<?php echo $value['id']; ?>_font_color').val();													
													var cont_<?php echo $value['id']; ?>_font_family = jQuery('#<?php echo $value['id']; ?>_preview .font-preview-text');

													cont_<?php echo $value['id']; ?>_font_family
														.prepend('<img src="<?php echo MAX_FW_DIR ?>admin/images/icons/loading.gif" />')
														.load("<?php echo MAX_FW_DIR ?>max_font_previewer.php?id=<?php echo $value['id']; ?>&font="+escape(font)+"&font_size="+escape(font_size)+"&line_height="+escape(line_height)+"&font_weight="+escape(font_weight)+"&font_color="+escape(font_color))												
												})
												
											})
										</script>									
										
										<?php 
										break;
										
										// --> Create the Colorpicker
										case "colorpicker" :								
										?>
											<script type="text/javascript">
												jQuery(document).ready(function($) { 
												
													function colorPickerTrigger(val){
														var add = "";
														if(val.charAt(0) != '#') add = '#';
														
														jQuery('#cp_<?php echo $value['id']; ?> div').css({'backgroundColor': add+val });
														jQuery('#colorpicker_<?php echo $value['id']; ?>').val(add+val);												
													}
													
													$('#colorpicker_<?php echo $value['id']; ?>').ColorPicker({
														onSubmit: function(hsb, hex, rgb, el) {															
															colorPickerTrigger(hex);	
															jQuery(el).ColorPickerHide();															
														},
														onBeforeShow: function () {
															$(this).ColorPickerSetColor(this.value);
															return false;
														},
														onChange: function (hsb, hex, rgb) {
															colorPickerTrigger(hex);															
														}
													}).bind('keyup change', function(){														
														$(this).ColorPickerSetColor(this.value);
														colorPickerTrigger(this.value);														
													});
																
													$('#cp_<?php echo $value['id']; ?>').next('input').change(function(){
													   $('#cp_<?php echo $value['id']; ?> div').css({'backgroundColor': $(this).val(), 'backgroundImage': 'none'});
													})
													
												});
											</script>
	
										<div id="cp_<?php echo $value['id']; ?>" class="cp_box">
											<div class="color_display" style="background-color:<?php echo ( get_option($value['id']) != "" ? stripslashes(get_option( $value['id'])) : $value['std'] ) ?>;<?php if ( isset( $value['id'] ) ) { echo 'background-image:none;'; } ?>"></div> 
										</div>		
										<div class="max_style_holder max_style_<?php echo $value['type'] ?>">																		
											<input  maxlength="7" type="text" name="<?php echo $value['id']; ?>" id="colorpicker_<?php echo $value['id']; ?>" value=<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id']) ); } else { echo $value['std']; } ?> class="cp_input max_control_input" />
										</div>

									<?php
									break;
								
									// --> Create a checkbox								
									case "checkbox": 
			
										$std =  $value['std'];
										$option_key = $value['id'];
										$saved = get_option($option_key);										
										
										if(isset($saved)){
											if($saved == 'true'){
												$checked = 'checked="checked"';  
											}else{
												$checked = '';     
											}    									
										}elseif( $std == 'true' ) {
											$checked = 'checked="checked"';
										} else {
											$checked = '';                                                                                    
										}		
															
										
										?>  
										<div class="max_style_holder max_style_<?php echo $value['type'] ?>">
											<input type="checkbox" class="max_control_<?php echo $value['type'] ?>" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
										</div>
	
									<?php
									break;
									
									case "multicheck":
							
										$std =  $value['std'];         
										
										$option_key = $value['id'];
										$saved_std = get_option($option_key);							
										?>				
										<div class="max_style_<?php echo $value['type'] ?>">
											<ul class="cat-checklist gallery-categories-checklist">
											<?php
											foreach($value['options'] as $index => $option) {
												
												if(is_array($saved_std)) 
												{ 	
													  if(in_array($index, $saved_std)){
														 $checked = 'checked="checked"';  
													  } 
													  else{
														  $checked = '';     
													  }    
												} 
												elseif( $std[$i] == "true" ) {
												   $checked = 'checked="checked"';
												}
												else {
													$checked = '';                                                                                    
												}
												?>
												<li><input type="checkbox" class="checkbox max_control_<?php echo $value['type'] ?>" name="<?php echo $option_key ?>[]" id="<?php echo $option_key ?>" value="<?php echo $index ?>" <?php echo $checked ?> />&nbsp;<label><?php echo $option ?></label></li>
												
												<?php
												$i++;
											}
											?>
											</ul>
										</div>
										<?php
									
									break;
									
									case "radio":
							
										$std =  $value['std'];         

										$option_key = $value['id'];
										$saved_std = get_option($option_key);									
										
										?>
										<ul>
										<?php
										foreach($value['options'] as $index => $option) {
											
											$checked = '';
												if($saved_std != '') {
													if ( $saved_std == $index ) { $checked = ' checked'; }
												} else {
													if ($value['std'] == $index) { $checked = ' checked'; }
											}
											
											?>
											<li>
											<input type="radio" class="radio overlay_pattern" name="<?php echo $option_key ?>" id="<?php echo $option_key."_".$index ?>" value="<?php echo $index ?>" <?php echo $checked ?> />
											<?php if ( $value['addtype'] != "" ){
											?>
											<img src="<?php echo $fw_dir ?>admin/images/overlay-<?php echo $index ?>.png" class="radio-overlay" width="20" height="20" />
											<?php
											}?>
											<label><?php echo $option ?></label>
											</li>
											<?php
											$i++;
										}
										?>
										</ul>
									
									<?php									
									break;								
									
									case "upload":								

										$id = $value['id'];												
										$output = '';
										$option_uploaded = get_option($id.'_value');
								
										if ( isset($option_uploaded) && $option_uploaded != "") { 
											$val = get_option($id.'_value'); 
										}else{
											$val = "";
										}										
												
										$output .= '<div class="max_style_holder max_style_'.$value['type'].'">
														<input class="max-input max_control_input" name="'. $value['id'] . '" id="'. $id .'_input" type="text" value="'. stripslashes($val) .'" />
													</div>';
										
										$output .= '<div class="clearfix upload_button_div">';
										$output .= '<span class="button image_upload_button" id="'.$id.'" data-rel="'. $id .'_input">Upload Image</span>';
												
										if(!empty($option_uploaded)) {$hide = '';} else { $hide = 'hide';}
												
										$output .= '<span class="button image_reset_button '. $hide.'" id="reset_'. $id .'" title="' . $id . '" data-rel="'. $id .'_input">Delete current</span>';
										$output .='</div>' . "\n";
										
										if(!empty($option_uploaded)){
											$output .= '<a class="max-uploaded-image" href="'. $option_uploaded . '">';
											$output .= '<img class="max-option-image" id="image_'.$id.'" src="'.$option_uploaded.'" alt="" />';
											$output .= '</a>';
											}
										
												
										echo $output;																				
									break;
									
									// --> Create a checkbox								
									case "socialinput": 
			
										$std =  $value['std'];         
										
										$option_key = $value['id'];
										$saved_std = get_option($option_key);									
										
										foreach($value['options'] as $index => $option) {
											
											if(is_array($saved_std)) 
											{ 	
												  if(in_array($index, $saved_std)){
													 $checked = 'checked="checked"';  
												  } 
												  else{
													  $checked = '';     
												  }    
											} 
											elseif( $std[$i] == "true" ) {
											   $checked = 'checked="checked"';
											}
											else {
												$checked = '';                                                                                    
											}
											?>
											<li class="clearfix">
												<div class="max_social_label">
													<input type="checkbox" class="checkbox" name="<?php echo $option_key ?>[]" id="<?php echo $option_key ?>" value="<?php echo $index ?>" <?php echo $checked ?> />
													<img src="<?php echo get_template_directory_uri() ?>/images/social/<?php echo $index ?>.png" />
													<label><?php echo $option ?></label>
												</div>
												<div class="max_style_holder max_style_<?php echo $value['type'] ?>">
													<input class="socialurl max_control_input" name="<?php echo $shortname ?>_social_<?php echo $index  ?>" id="invictus_social_<?php echo $index ?>" type="text" value="<?php echo stripslashes( get_option( $shortname.'_social_'.$index  )  ); ?>" />
												</div>
											</li>
											<?php
											$i++;
										}
										?>
										</ul>
										
									<?php
									break;								
		
									// --> Create the option section
									case "section":					
										$i++;					
									?>
									
									<div id="option_<?php echo $value['id']; ?>" class="block ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs-hide">
										<input type="hidden" value="<?php echo $value['name']; ?>" name="<?php echo $value['id']; ?>_default">														
									<?php break;
									
								// End switch
								} 
								
								// check, if it is a grouped option
								if( !isset($value['group-close']) || $value['group-close'] === false ){
									if($value['type'] !=  "subhead" && $value['type'] != "open" && $value['type'] != "close" && $value['type'] != "section"){
									?>									
									</div>
									</div>
									<?php
									}
								}								
								
								// Description of each option
								if(isset($value['desc']) && $value['desc'] != ""){
								?>
								<div class="description"><div class="max_description inner"><?php echo $value['desc']; ?></div></div>
								<?php
								}
								
								// check, if it is a grouped option
								if( !isset($value['group-close']) || $value['group-close'] === false ){
									if($value['type'] !=  "subhead" && $value['type'] != "open" && $value['type'] != "close" && $value['type'] != "section"){
									?>									
									</div>
									<?php
									}
								}
														
							// End foreach
							}?>
	
						</div>
					</div>
					<div class="info bottom">
						<input name="reset" type="submit" value="Reset" class="button-secondary reset" />
						<img src="<?php echo MAX_FW_DIR ?>admin/images/loading.gif" class="ajax-loading ajax-loading-bottom" alt="Saving..." />
						<input type="submit" name="save" class="button-primary  save-options" value="Save All Changes">   					
						<input type="hidden" name="action" value="save" />
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php
}

/*-----------------------------------------------------------------------------------*/
/*	Adds a hidden input field to control label of "Insert into post" button.
/*-----------------------------------------------------------------------------------*/

add_filter( 'media_upload_tabs', 'add_media_label_header');

function add_media_label_header($_default_tabs){

	echo("<input class='max_button_label' type='hidden' value='".html_entity_decode($_GET['max_label'])."' />");
	echo("<input class='max_saved_input' type='hidden' value='".html_entity_decode($_GET['max_input'])."' />");	
	
	return $_default_tabs;
}

/*-----------------------------------------------------------------------------------*/
/*	Gets an attachment image (id based) and returns the image url to the javascript.
/*-----------------------------------------------------------------------------------*/

add_action('wp_ajax_max_get_ajax_attachment', 'max_get_ajax_attachment');

if(!function_exists('max_get_ajax_attachment')){

	function max_get_ajax_attachment()
	{
		$attach_id = (int) $_POST['attachment_id'];
		
		$attachment = get_post($attach_id);
		$mime_type = $attachment->post_mime_type;
		
		if (substr($mime_type, 0, 5) == 'video'){
			$output = $attachment->guid;
		}else{
			$output = wp_get_attachment_image($attach_id, "slider-preview");
		}
		die($output);
	}
	
}

/*-----------------------------------------------------------------------------------*/
/*	Adds an Admin menu separator
/*-----------------------------------------------------------------------------------*/

function add_admin_menu_separator($position) {
  global $menu;
  $index = 0;
  foreach($menu as $offset => $section) {
    if (substr($section[2],0,9)=='separator')
      $index++;
    if ($offset>=$position) {
      $menu[$position] = array('','read',"separator{$index}",'','wp-menu-separator');
      break;
    }
  }
}

/*-----------------------------------------------------------------------------------*/
/*	Define new table columns
/*-----------------------------------------------------------------------------------*/

function gallery_edit_columns($columns){
	$columns = array(
		"cb" => "<input type=\"checkbox\" />",
		"img_preview" => "Preview",
		"title" => "Image Title",
		"description" => "Description",
		"posted" => "Date added",
		"gallery-cat" => "Galleries",
	);
	return $columns;
}

/*-----------------------------------------------------------------------------------*/
/*	Create the new table columns
/*-----------------------------------------------------------------------------------*/

function gallery_custom_columns($column){
	global $post;
	switch ($column) {
		case "img_preview":
			$imgUrl = max_get_image_path($post->ID, "thumbnail");
			echo '<img src="'.get_template_directory_uri().'/timthumb.php?src='. $imgUrl .'&amp;h=40"  alt="'.get_the_title().'" />';
		break;		
		case "description":
			the_excerpt();
		break;	
		case "posted":
			echo get_the_date();
		break;
		case "gallery-cat":
			echo get_the_term_list($post->ID, GALLERY_TAXONOMY, '', ', ','');
		break;		
	}
}

add_action("manage_posts_custom_column",  "gallery_custom_columns");
add_filter("manage_edit-gallery_columns", "gallery_edit_columns");

/*-----------------------------------------------------------------------------------*/
/*	Custom Login Logo Support
/*-----------------------------------------------------------------------------------*/

function max_wp_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.get_template_directory_uri().'/images/wp-login-logo.png) !important; }
    </style>';
}

function max_wp_login_url() {
	echo home_url();
}

function max_wp_login_title() {
	echo get_option('blogname');
}

if(get_option_max('custom_login_logo') == 'true') {
	add_action('login_head', 'max_wp_login_logo');
	add_filter('login_headerurl', 'max_wp_login_url');
	add_filter('login_headertitle', 'max_wp_login_title');
}

?>
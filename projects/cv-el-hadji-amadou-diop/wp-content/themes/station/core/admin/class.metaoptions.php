<?php
/**
 * 
 *
 *  PageLines Meta Option Handling
 *
 *
 *  @package PageLines Core
 *  @subpackage Post Types
 *  @since 4.0
 *
 */
class PageLinesMetaOptions {

	var $meta_array = array();	// Controller for drawing meta options
	
	/**
	 * PHP5 constructor
	 *
	 */
	function __construct($meta_array, $settings = array()) {
		$this->meta_array = $meta_array;
		
		$defaults = array(
				
				'id' => 'PageLines-Meta-Options',
				'name' => 'PageLines Custom Options',
				'posttype' => null,
				'location' => 'normal', 
				'priority' => 'high'
			);
		
		$this->settings = wp_parse_args($settings, $defaults); // settings for post type
		
		$this->register_actions();
	
	}
	
	function register_actions(){
		
		
		add_action("admin_menu",  array(&$this, 'add_meta_options_box'));
		add_action('save_post', array(&$this, 'save_meta_options'));
		
	}
	
	function add_meta_options_box(){
		if( function_exists("add_meta_box")){
			add_meta_box($this->settings['id'], $this->settings['name'], "pagelines_meta_options_callback", $this->settings['posttype'], $this->settings['location'], $this->settings['priority'], array( $this ));
		}
	}
	
	function save_meta_options($postID){
		//echo '<pre>';print_r($_POST);echo '</pre>';
		if((isset($_POST['update']) || isset($_POST['save'])) && $_POST['_posttype'] == $this->settings['posttype']){
			foreach($this->meta_array as $optionid => $o){
				$option_value =  isset($_POST[$optionid]) ? $_POST[$optionid] : null;

				if(!empty($option_value) || get_post_meta($postID, $optionid)){
					update_post_meta($postID, $optionid, $option_value );
				}
			}
		}
	}
	
	function draw_meta_options(){
		
		global $post_ID;?>
		<div class="pagelines_pagepost_options">
	<?php foreach($this->meta_array as $optionid => $o): ?>
				<?php if(isset($o['where']) && $o['where'] != $this->settings['posttype']):?><?php else:?>
						<?php if(VPRO || (!VPRO && $o['version'] != 'pro')):?>
						<div class="page_option">

								<?php if($o['type']=='check'):?>
								<p style="">
									<label for="<?php echo $optionid;?>">
										<input class="admin_checkbox" type="checkbox" id="<?php echo $optionid;?>" name="<?php echo $optionid;?>" <?php if(pagelines($optionid, $post_ID)) echo 'checked'; else echo 'unchecked';?> /><strong><?php echo $o['inputlabel'];?></strong>
									</label>
								</p>
								<p><?php echo $o['exp'];?></p>
								<?php elseif($o['type'] == 'textarea'):?>
									
										<div class="option-description">
											<label for="<?php echo $optionid;?>"><strong><?php echo $o['inputlabel'];?></strong></label><br/>
											<small><?php echo $o['exp'];?></small>
										</div>
										<div class="option-inputs">
											<textarea class="html-textarea"  id="<?php echo $optionid;?>" name="<?php echo $optionid;?>" /><?php em_pagelines($optionid, $post_ID); ?></textarea>
										</div>
								
								<?php elseif($o['type'] == 'text'):?>

										<div class="option-description">
											<label for="<?php echo $optionid;?>"><strong><?php echo $o['inputlabel'];?></strong></label><br/>
											<small><?php echo $o['exp'];?></small>
										</div>
										<div class="option-inputs">
											<input type="text" class="html-text"  id="<?php echo $optionid;?>" name="<?php echo $optionid;?>" value="<?php em_pagelines($optionid, $post_ID); ?>" />
										</div>
								<?php elseif($o['type'] == 'select'):?>
										
											<div class="option-description">
												<label for="<?php echo $optionid;?>" class="context"><?php echo $o['inputlabel'];?></label><br/>
												<small><?php echo $o['exp'];?></small>
											</div>
											<div class="option-inputs">
												<select id="<?php echo $optionid;?>" name="<?php echo $optionid;?>">
													<option value="">&mdash;<?php _e("SELECT", TDOMAIN);?>&mdash;</option>

													<?php foreach($o['selectvalues'] as $sval => $stext):?>
														<?php if($o['type']=='select_same'):?>
																<option value="<?php echo $stext;?>" <?php if(m_pagelines($optionid, $post_ID)==$stext) echo 'selected';?>><?php echo $stext;?></option>
														<?php else:?>
																<option value="<?php echo $sval;?>" <?php if(m_pagelines($optionid, $post_ID)==$sval) echo 'selected';?>><?php echo $stext;?></option>
														<?php endif;?>

													<?php endforeach;?>
												</select>
											</div>

								<?php endif;?>
							<div class="clear"></div>
						</div>
						<?php endif; ?>
				<?php endif;?>
			<?php endforeach;?>
			<div class="page_option fix">
					<input type="hidden" name="_posttype" value="<?php echo $this->settings['posttype'];?>" />
					<input id="update" class="button-primary" type="submit" value="<?php _e("Update Options",TDOMAIN); ?>" accesskey="p" tabindex="5" name="update"/>
			</div>
		</div>
			
	
	
	<?php }
		

}
/////// END OF MetaOptions CLASS ////////


function pagelines_meta_options_callback($post, $object){
	// echo '<pre>';
	// print_r($object);
	// echo '</pre>';
	$object['args'][0]->draw_meta_options();
	
}



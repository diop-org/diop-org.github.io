<?php
//register the admin page
add_action('admin_menu', 'pandora_admin_core');
function pandora_admin_core(){
	add_theme_page("Theme", "Pandora Options :)", 'edit_theme_options', 'pandora', "pandora_options_operator");
}

//this function is lead the changing
function pandora_options_operator(){
	//dsiplay pandora options menu
	pandora_admin_menu();
	if (!isset($_REQUEST['pan_subpage'])){
		//save methods for body settings
		if (isset($_REQUEST['save'])){
			if (empty($_POST) || !wp_verify_nonce($_POST['pandora_nonces'],'pandora_nonce_validator')){
			   _e('Sorry, your nonce did not verify.','pandora');
			   exit;
			}
			else{
				if ( !empty($_POST) && check_admin_referer('pandora_nonce_validator','pandora_nonces') ){
					require_once (get_template_directory() . '/setup/admin/body-form/body-php.php');
					pandora_options_validator();
					update_option('pandora_settings', pandora_save_options());
					
					//refresh global variables
					global $pandora_options;
					$pandora_options = pandora_get_options();
				}
			}
		}
		
		//form ui for body settings
		require_once (get_template_directory() . '/setup/admin/body-form/body-html.php');
	}
	elseif ($_REQUEST['pan_subpage'] == 'credits'){
		require_once (get_template_directory() . '/setup/admin/credits/credits.php');
	}
}

function pandora_admin_menu(){
	global $pandora_version;
	global $pandora_siteurl;
	$pandora_themename = "Pandora theme &copy;";
	?><div class="pan_main_board">
		<table>
			<td id="pan_admin_logo">
				<img src="<?php echo get_template_directory_uri() ?>/setup/admin/images/pandora-admin-panel-logo.png" />
			</td>
			<td id="pan_admin_title">
				<h2><?php echo $pandora_themename . " " . __(' Options', 'pandora'); ?></h2>
				<?php echo __( '<h3>Hey, I\'m Pandora. Set up my properities^^</h3><p>I am the version','pandora') .' '. $pandora_version .'. '. __('Have you questions? Visit the <a href="http://belicza.com/wordpress/forum/" target="_blank">support forum</a> or the <a href="http://belicza.com/wordpress/" target="_blank">offical pandora site</a>.<br>I can more. I have navi menubar: <a href="','pandora') . $pandora_siteurl . __('/wp-admin/nav-menus.php">setup here</a> or setup my <a href="','pandora') . $pandora_siteurl . __('/wp-admin/themes.php?page=custom-background">background</a>, also my <a href="','pandora') . $pandora_siteurl . __('/wp-admin/themes.php?page=custom-header">header images</a>.<br />If you want to other styles on your site (Big Blog style, Portal sytle or Clan Page style), you can choose from these in this page.<br />You can choose from 4 Post List sytle (List view, Gallery view, Classic view, Featured view). If you wanna switch off all sidebars please find the Pages/Edit Page/Page Properity tab and choose the Page-1-Col option.<br />You can setup your copyright text and name of the site\'s sikenner and upload new logos, icons on this Pandora Page. It\'s so easy:)</p>', 'pandora' ); ?>
				<?php if (isset($_REQUEST['save'])) { ?> <div style="clear:both;height:10px;"></div> <div class="message-ok"><?php _e('Cool:) Options has been updated!','pandora') ?></div><?php } ?>
			</td>
		<table>
		<div id="pan_admin_menu">
			<ul>
				<li>
					<a href="<?php echo $pandora_siteurl ?>/wp-admin/themes.php?page=pandora"><?php _e('Body', 'pandora') ?></a>
				</li>
				<li>
					<a href="<?php echo $pandora_siteurl ?>/wp-admin/themes.php?page=pandora&pan_subpage=credits"><?php _e('Credits & Help', 'pandora') ?></a>
				</li>
			</ul>
		</div>
	</div><?php
}

function pandora_i_want_to_be_number($number_in_string = '', $allowed_nums, $standard_value, $max){
	if ( preg_match( "/[^".$allowed_nums.".]/", $number_in_string ) ){
		$number_in_string = $standard_value;
	}
	else{
		$number_in_string = intval($number_in_string);
		if ($number_in_string > $max){
			$number_in_string = $max;
		}
	}
	return $number_in_string;
}
 
function pandora_admin_add_init() {  
	$directory_file=get_template_directory_uri();  
	wp_enqueue_style("admin_style", $directory_file."/setup/admin/style.css", false, "1.0", "all");  
}
add_action('admin_init', 'pandora_admin_add_init'); 
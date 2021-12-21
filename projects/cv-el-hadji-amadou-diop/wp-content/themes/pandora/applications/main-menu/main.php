<?php
function pandora_mainmenu_js_register() {
	wp_enqueue_style('pandora_menu', get_template_directory_uri() . '/applications/main-menu/style-big.css', false, '1.0');
	wp_enqueue_script('pandora_js_menu', get_template_directory_uri() . '/applications/main-menu/animation.js', false, '1.0');
}
add_action('init', 'pandora_mainmenu_js_register');

//register for superfish navbar - menu
register_nav_menus(
	array(
	'main-menu' => __('Main menu on the top of the site', 'pandora')
			)
	 );

//register Menu for wp3+ cms
if (function_exists('add_theme_support')) {
    add_theme_support('menus');
}

function pandora_display_main_menu(){
	if ( !is_home() && get_header_image() == "" ){
		?><link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/override.css" type="text/css" /><?php
		$pandora_menu_css = 'nav_menu_page';
	}
	elseif ( !is_home() ){
		?><style type="text/css">
			.nav_menu_index {
				margin-top:30px;
			}
		</style><?php
		$pandora_menu_css = 'nav_menu_index';
	}
	else{
		$pandora_menu_css = 'nav_menu_index';
	}
	?><div class="<?php print $pandora_menu_css ?>">
		<?php pandora_main_menu(); ?>
	</div><?php
}

function pandora_main_menu()
{?>
<div id="navigation">
<?php
     wp_nav_menu( array(
		'theme_location' => 'main-menu', // Setting up the location for the main-menu, Main Navigation.
		'menu_class' => 'pandora-nav', //Adding the class for dropdowns
		'container_id' => 'navwrap', //Add CSS ID to the containter that wraps the menu.
		'fallback_cb' => 'pandora_omg_no_menu', //if wp_nav_menu is unavailable, WordPress displays wp_page_menu function, which displays the pages of your blog.
		)
	);
	
	if (has_nav_menu("main-menu") == true){
		//search button on right side
		get_search_form();
	}
?>

</div><?php
}

function pandora_main_menu_animation()
{
?><script type="text/javascript">


$(document).ready(function(){ 
        $("ul.sf-menu").superfish(); 
    });


</script>
<?php
}

function pandora_omg_no_menu(){
	if(current_user_can('edit_theme_options')){
		?><div class="omg_simple_error"><?php _e( 'Oh my God! You have no menu. No problem! Go to the admin page and click to Menu button and create a new menu! It\'s so easy^^ :::: ', 'pandora' ) ?><a href="<?php echo home_url() ?>/wp-admin/nav-menus.php" title="Menus" rel="home" target="_blank"><?php _e('Click here for set a Menu!','pandora') ?></a><br />
			<a href="<?php echo home_url() ?>/wp-admin/admin.php?page=pandora" title="Pandora Options" rel="admin" target="_blank"><?php _e( '- Don\'t forget you can choose from many options on Pandora Page!', 'pandora' ) ?></a>
		</div><?php
	}
}

?>
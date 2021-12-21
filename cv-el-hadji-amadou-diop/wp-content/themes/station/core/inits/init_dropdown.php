<?php

// ===============================
// = Hook JS Libraries to Footer =
// ===============================
add_action('wp_footer', 'dropdown_js');
function dropdown_js(){
	wp_register_script('dropdown', CORE_JS.'/dropdown.js', 'jquery', '1.0', true);
	wp_print_scripts('dropdown');
}

// =======================
// = Hook Up Stylesheets =
// =======================
add_action('wp_print_styles', 'dropdown_css');

function dropdown_css() {
    $myStyleUrl = PRO_CSS . '/dropdown.css';
    $myStyleFile = PAGELINES_PRO . '/css/dropdown.css';
    if ( file_exists($myStyleFile) ) {
        wp_register_style('dropdown', $myStyleUrl);
        wp_enqueue_style( 'dropdown');
    }
} 


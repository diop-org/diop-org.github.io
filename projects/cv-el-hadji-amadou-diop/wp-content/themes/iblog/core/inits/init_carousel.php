<?php

// ===============================
// = Hook JS Libraries to Footer =
// ===============================
add_action('wp_footer', 'carousel_js');
function carousel_js(){
	wp_register_script('jcarousel', CORE_JS.'/carousel.jcarousellite.js', 'jquery', '1.0', true);
	wp_register_script('mousewheel', CORE_JS.'/carousel.mousewheel.js', 'jquery', '1.0', true);
	wp_print_scripts('jcarousel');
	wp_print_scripts('mousewheel');
}

// ================================
// = Hook Up Carousel Stylesheets =
// ================================
add_action('wp_print_styles', 'carousel_css');

function carousel_css() {
    $myStyleUrl = PRO_CSS . '/carousel.css';
    $myStyleFile = PAGELINES_PRO . '/css/carousel.css';
    if ( file_exists($myStyleFile) ) {
        wp_register_style('carousel', $myStyleUrl);
        wp_enqueue_style( 'carousel');
    }
} 

// ==================================================================================================
// = Hoop the scripts controlling the carousel to the wp_head, so they run after jquery is included =
// ==================================================================================================
add_action('wp_head', 'carousel_script');

function carousel_script(){?>
<script type="text/javascript">
/* <![CDATA[ */
var $j = jQuery.noConflict();

$j(document).ready(function () {
    $j(".thecarousel").jCarouselLite({
        btnNext: ".next",
        btnPrev: ".prev", 
		visible: 9, 
		circular: true, 
		scroll: 6,
		speed: 600,
		mouseWheel: true
	});
});
/* ]]> */
</script>
<?php }
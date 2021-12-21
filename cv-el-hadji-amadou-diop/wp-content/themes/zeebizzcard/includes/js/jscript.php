<?php 
	
add_action('wp_head', 'themezee_include_jscript');
function themezee_include_jscript() {

	// Select Slider Modus
	$options = get_option('themezee_options');
	if(isset($options['themeZee_show_slider']) and $options['themeZee_show_slider'] == 'true') {
		switch($options['themeZee_slider_mode']) {
			case 0:
				$return = "<script type=\"text/javascript\">
				//<![CDATA[
					// Horizontal Slider
					jQuery(document).ready(function($) {
						$('#slideshow')
							.cycle({
							fx: 'scrollHorz',
							speed: 1000,
							next: '#slide_next',
							prev: '#slide_prev',
							timeout: 13000
						});
					});
				//]]>
				</script>";

			break;
			case 1:
				$return = "<script type=\"text/javascript\">
				//<![CDATA[
					// Dropdown Slider
					jQuery(document).ready(function($) {
						$('#slideshow')
							.cycle({
							fx:     'scrollVert',
							speed: 1000,
							next: '#slide_next',
							prev: '#slide_prev',
							timeout: 12000
						});
					});
				//]]>
				</script>";

			break;
			case 2:
				$return = "<script type=\"text/javascript\">
				//<![CDATA[
					// Fade Slider
					jQuery(document).ready(function($) {
						$('#slideshow')
							.cycle({
							fx: 'fade',
							speed: 600,
							next: '#slide_next',
							prev: '#slide_prev',
							timeout: 12000
						});
					});
				//]]>
				</script>";

			break;
			default:
				$return = "<script type=\"text/javascript\">
				//<![CDATA[
					// Horizontal Slider
					jQuery(document).ready(function($) {
						$('#slideshow')
							.cycle({
							fx: 'scrollHorz',
							speed: 1000,
							next: '#slide_next',
							prev: '#slide_prev',
							timeout: 12000
						});
					});
				//]]>
				</script>";
			break;
		}
		echo $return;
	}
}
?>
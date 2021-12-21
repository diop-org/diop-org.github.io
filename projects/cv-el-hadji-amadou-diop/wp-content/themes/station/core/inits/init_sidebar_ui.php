<?php

// ===============================
// = Hook JS Libraries to Footer =
// ===============================
add_action('wp_footer', 'sidebarui_js');
function sidebarui_js(){
	wp_register_script('accordion', CORE_JS.'/jquery-ui.custom.js', 'jquery', '1.0', true);
	wp_print_scripts('accordion');
}

// ==============================
// = Add Control Script To Head =
// ==============================
add_action('wp_head', 'sidebarui_script');
function sidebarui_script(){?>
<script type="text/javascript">
/* <![CDATA[ */
	var $j = jQuery.noConflict();
	
	$j(document).ready(function () {
		<?php if(pagelines('accordionjs')):?>
		$j("#accordion").accordion({ 
			<?php if(pagelines('accordion_active')):?>active: <?php echo pagelines('accordion_active'); ?>,<?php endif;?>
			<?php if(pagelines('accordion_autoheight')):?>autoHeight: true<?php else:?>autoHeight: false<?php endif;?>
		});
		<?php endif;?>
		
		$j("#drag_drop_sidebar").sortable();
		$j("#drag_drop_sidebar").disableSelection();
		
	});	
/* ]]> */
</script>
<?php }
<?php

/**
 * WooThemes Media Library-driven AJAX File Uploader Module (2010-11-05)
 *
 * Slightly modified for use in the Options Framework.
 */

if ( is_admin() ) {
	
	// Load additional css and js for image uploads on the Options Framework page
	$evl_page= 'appearance_page_theme_options';
	add_action( "admin_print_styles-$evl_page", 'evolve_mlu_css', 0 );
	add_action( "admin_print_scripts-$evl_page", 'evolve_mlu_js', 0 );	
}

/**
 * Sets up a custom post type to attach image to.  This allows us to have
 * individual galleries for different uploaders.
 */

if ( ! function_exists( 'evolve_mlu_init' ) ) {
	function evolve_mlu_init () {
		register_post_type( 'evolve', array(
			'labels' => array(
				'name' => __( 'Options Framework Internal Container', 'evolve' ),
			),
			'public' => true,
			'show_ui' => false,
			'capability_type' => 'post',
			'hierarchical' => false,
			'rewrite' => false,
			'supports' => array( 'title', 'editor' ), 
			'query_var' => false,
			'can_export' => true,
			'show_in_nav_menus' => false
		) );
	}
}

/**
 * Media Uploader Using the WordPress Media Library.
 *
 * Parameters:
 * - string $_id - A token to identify this field (the name).
 * - string $_value - The value of the field, if present.
 * - string $_mode - The display mode of the field.
 * - string $_desc - An optional description of the field.
 * - int $_postid - An optional post id (used in the meta boxes).
 *
 * Dependencies:
 * - evolve_mlu_get_silentpost()
 */

if ( ! function_exists( 'evolve_medialibrary_uploader' ) ) {

	function evolve_medialibrary_uploader( $_id, $_value, $_mode = 'full', $_desc = '', $_postid = 0, $_name = '') {
	
		$evolve_settings = get_option('evolve');
		
		// Gets the unique option id
		$option_name = $evolve_settings['id'];
	
		$output = '';
		$id = '';
		$class = '';
		$int = '';
		$value = '';
		$name = '';
		
		$id = strip_tags( strtolower( $_id ) );
		// Change for each field, using a "silent" post. If no post is present, one will be created.
		$int = evolve_mlu_get_silentpost( $id );
		
		// If a value is passed and we don't have a stored value, use the value that's passed through.
		if ( $_value != '' && $value == '' ) {
			$value = $_value;
		}
		
		if ($_name != '') {
			$name = $option_name.'['.$id.']['.$_name.']';
		}
		else {
			$name = $option_name.'['.$id.']';
		}
		
		if ( $value ) { $class = ' has-file'; }
		$output .= '<input id="' . $id . '" class="upload' . $class . '" type="text" name="'.$name.'" value="' . $value . '" />' . "\n";
		$output .= '<input id="upload_' . $id . '" class="upload_button button" type="button" value="' . __( 'Upload', 'evolve' ) . '" rel="' . $int . '" />' . "\n";
		
		if ( $_desc != '' ) {
			$output .= '<span class="evl_metabox_desc">' . $_desc . '</span>' . "\n";
		}
		
		$output .= '<div class="screenshot" id="' . $id . '_image">' . "\n";
		
		if ( $value != '' ) { 
			$remove = '<a href="javascript:(void);" class="mlu_remove button">Remove</a>';
			$image = preg_match( '/(^.*\.jpg|jpeg|png|gif|ico*)/i', $value );
			if ( $image ) {
				$output .= '<img src="' . $value . '" alt="" />'.$remove.'';
			} else {
				$parts = explode( "/", $value );
				for( $i = 0; $i < sizeof( $parts ); ++$i ) {
					$title = $parts[$i];
				}

				// No output preview if it's not an image.			
				$output .= '';
			
				// Standard generic output if it's not an image.	
				$title = __( 'View File', 'evolve' );
				$output .= '<div class="no_image"><span class="file_link"><a href="' . $value . '" target="_blank" rel="external">'.$title.'</a></span>' . $remove . '</div>';
			}	
		}
		$output .= '</div>' . "\n";
		return $output;
	}	
}

/**
 * Uses "silent" posts in the database to store relationships for images.
 * This also creates the facility to collect galleries of, for example, logo images.
 * 
 * Return: $_postid.
 *
 * If no "silent" post is present, one will be created with the type "evolve"
 * and the post_name of "of-$_token".
 *
 * Example Usage:
 * evolve_mlu_get_silentpost ( 'evl_logo' );
 */

if ( ! function_exists( 'evolve_mlu_get_silentpost' ) ) {

	function evolve_mlu_get_silentpost ( $_token ) {
	
		global $wpdb;
		$_id = 0;
	
		// Check if the token is valid against a whitelist.
		// $_whitelist = array( 'evl_logo', 'evl_custom_favicon', 'evl_ad_top_image' );
		// Sanitise the token.
		
		$_token = strtolower( str_replace( ' ', '_', $_token ) );
		
		// if ( in_array( $_token, $_whitelist ) ) {
		if ( $_token ) {
			
			// Tell the function what to look for in a post.
			
			$_args = array( 'post_type' => 'evolve', 'post_name' => 'of-' . $_token, 'post_status' => 'draft', 'comment_status' => 'closed', 'ping_status' => 'closed' );
			
			// Look in the database for a "silent" post that meets our criteria.
			$query = 'SELECT ID FROM ' . $wpdb->posts . ' WHERE post_parent = 0';
			foreach ( $_args as $k => $v ) {
				$query .= ' AND ' . $k . ' = "' . $v . '"';
			} // End FOREACH Loop
			
			$query .= ' LIMIT 1';
			$_posts = $wpdb->get_row( $query );
			
			// If we've got a post, loop through and get it's ID.
			if ( count( $_posts ) ) {
				$_id = $_posts->ID;
			} else {
			
				// If no post is present, insert one.
				// Prepare some additional data to go with the post insertion.
				$_words = explode( '_', $_token );
				$_title = join( ' ', $_words );
				$_title = ucwords( $_title );
				$_post_data = array( 'post_title' => $_title );
				$_post_data = array_merge( $_post_data, $_args );
				$_id = wp_insert_post( $_post_data );
			}	
		}
		return $_id;
	}
}

/**
 * Trigger code inside the Media Library popup.
 */

if ( ! function_exists( 'evolve_mlu_insidepopup' ) ) {

	function evolve_mlu_insidepopup () {
	
		if ( isset( $_REQUEST['is_evolve'] ) && $_REQUEST['is_evolve'] == 'yes' ) {
		
			add_action( 'admin_head', 'evolve_mlu_js_popup' );
			add_filter( 'media_upload_tabs', 'evolve_mlu_modify_tabs' );
		}
	}
}

if ( ! function_exists( 'evolve_mlu_js_popup' ) ) {

	function evolve_mlu_js_popup () {

		$_evl_title = $_REQUEST['evl_title'];
		if ( ! $_evl_title ) { $_evl_title = 'file'; } // End IF Statement
?>
	<script type="text/javascript">
	<!--
	jQuery(function($) {
		
		jQuery.noConflict();
		
		// Change the title of each tab to use the custom title text instead of "Media File".
		$( 'h3.media-title' ).each ( function () {
			var current_title = $( this ).html();
			var new_title = current_title.replace( 'media file', '<?php echo $_evl_title; ?>' );
			$( this ).html( new_title );
		
		} );
		
		// Change the text of the "Insert into Post" buttons to read "Use this File".
		$( '.savesend input.button[value*="Insert into Post"], .media-item #go_button' ).attr( 'value', 'Use this File' );
		
		// Hide the "Insert Gallery" settings box on the "Gallery" tab.
		$( 'div#gallery-settings' ).hide();
		
		// Preserve the "is_evolve" parameter on the "delete" confirmation button.
		$( '.savesend a.del-link' ).click ( function () {
		
			var continueButton = $( this ).next( '.del-attachment' ).children( 'a.button[id*="del"]' );
			var continueHref = continueButton.attr( 'href' );
			continueHref = continueHref + '&is_evolve=yes';
			continueButton.attr( 'href', continueHref );
		
		} );
		
	});
	-->
	</script>
<?php
	}
}

/**
 * Triggered inside the Media Library popup to modify the title of the "Gallery" tab.
 */

if ( ! function_exists( 'evolve_mlu_modify_tabs' ) ) {

	function evolve_mlu_modify_tabs ( $tabs ) {
		$tabs['gallery'] = str_replace( __( 'Gallery', 'evolve' ), __( 'Previously Uploaded', 'evolve' ), $tabs['gallery'] );
		return $tabs;
	}
}
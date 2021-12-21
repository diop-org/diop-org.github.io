<?php

$evlthemename = "EvoLve";

if ( STYLESHEETPATH == TEMPLATEPATH ) {
	define('EVL_URL', TEMPLATEPATH . '/library/functions/');
	define('EVL_DIRECTORY', get_template_directory_uri() . '/library/functions/');
} else {
	define('EVL_URL', STYLESHEETPATH . '/library/functions/');
	define('EVL_DIRECTORY', get_template_directory_uri() . '/library/functions/');
}

require_once( get_template_directory() . '/library/functions/options-framework.php' );
require_once( get_template_directory() . '/library/functions/basic-functions.php' );

?>
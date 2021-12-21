<?php

require_once("../../../../wp-config.php"); 



switch( $_REQUEST['font'] ){
		case  'Arial, Helvetica, sans-serif':
		case  'Verdana, Geneva, sans-serif':
		case  'Tahoma, Geneva, sans-serif':
		case  'Georgia, Times, serif':			
			$font = $_REQUEST['font'].' !important';
		break;
		
		case 'off': 
			$font = 'Arial, Helvetica, sans-serif  !important';
		break;
		
		default:
			max_get_google_font( $_REQUEST['font'] );
			$font = '"'.$_REQUEST['font'].'"  !important';
		break;
}
?>

<style>
#<?php echo $_REQUEST['id']; ?>_preview .font-preview-text {
	font-family: <?php echo $font ?>;
	font-size: <?php echo $_REQUEST['font_size'] ?>px !important;
	line-height: <?php echo $_REQUEST['line_height'] ?>px !important;
	<?php if( $_REQUEST['font_weight'] == 'bold_italic'){
	$_new_font_weight = explode("_", $_REQUEST['font_weight']);
	?>
	font-weight: <?php echo $_new_font_weight[0] ?> !important;
	font-style: <?php echo $_new_font_weight[1] ?> !important;
	<?php } ?>
	<?php if( $_REQUEST['font_weight'] == 'bold' || $_REQUEST['font_weight'] == 300 || $_REQUEST['font_weight'] == 'normal'){ ?>
	font-weight: <?php echo $_REQUEST['font_weight'] ?> !important;
	font-style: normal !important;
	<?php } ?>	
	<?php if( $_REQUEST['font_weight'] == 'italic'){ ?>
	font-weight: normal;
	font-style: <?php echo $_REQUEST['font_weight'] ?> !important;
	<?php } ?>	
}
</style>

The quick brown fox jumps over the lazy dog
<?php /*
 License: GNU General Public License v3.0
 License URI: http://www.gnu.org/licenses/gpl-3.0.html
 Author: MegaThemes (http://www.megathemes.com)
*/

defined('ABSPATH')
or die('no direct access');

function mframe_init()
{
	wp_enqueue_style( 'mframe.panel', get_template_directory_uri() . '/megaframe/megapanel/css/panel.css' );
	wp_enqueue_style( 'mframe.colorpicker', get_template_directory_uri() . '/megaframe/megapanel/css/colorpicker.css' );
	wp_enqueue_style( 'mframe.layout', get_template_directory_uri() . '/megaframe/megapanel/css/layout.css' );
}

function mframe_admin_feeds( $type = '' )
{
	global $mframe;

	//add_filter('wp_feed_cache_transient_lifetime', create_function('$a', 'return 0;'));

	include_once(ABSPATH . WPINC . '/feed.php');

	$url = $type == 'free' ? $mframe['globals']['url-themes-free'] : $mframe['globals']['url-themes-new'];

	if( !is_wp_error( $rss = fetch_feed( $url )))
	{
		$items = $rss->get_items(0, $rss->get_item_quantity(3));

		echo '<ul>';
		foreach ( (array) $items as $item )
		{
			echo '<li>' . $item->get_date('M j') . ': ' . str_replace(array('<p>', '</p>'), '', $item->get_content()) . '</li>';
		}
		echo '</ul>';
	}
}

function mframe_admin_tabs( $mframe )
{
	$i = 2;
	foreach ( (array) $mframe['options'] as $name => $categories )
	{ ?>

  <li><a id="tab<?php echo $i ?>" href="#tab-<?php echo $i++ ?>"><span><?php echo $name ?></span></a></li><?php
	}
}

function mframe_option_loop( $field, $option )
{
	$defaults = array(
		'type' => 'heading',
		'after' => '',
		'desc' => '',
		'ext' => '',
		'size' => '',
		'pro' => '',
		'class' => '',
		'sub-options' => array(),
		'sub-options-off' => array(),
	);
	$option = wp_parse_args( $option, $defaults );

	global $mframe;
	if( !isset( $option['type'] ))
		$option['type'] = 'heading';

	if( isset( $option['options'] ) && $option['type'] != 'multiselect' )
		$option['type'] = 'select';

	$class = '';
	$classes = array();
	$classes[] = 'option';
	$classes[] = 'field-' . $field;
	$classes[] = $option['type'];

	if($option['sub-options'] || $option['sub-options-off']) $classes[] = 'wide';
	if($option['class']) $classes[] = $option['class'];
	if($option['pro']) $classes[] = $option['pro'];

	$class = implode(' ', $classes);

	echo '<div id="field-' . $field . '" class="' . $class . '">';

	echo '<label for="' . $field . '">' . $option['name'] . '</label>';

	switch ( $option['type'] )
	{
		case 'heading' :
			break;

		case 'text' : case 'xtext' : case 'mtext' : case 'ltext' :
			echo '<input type="text" name="' . $field . '" size="20" id="' . $field . '" value="' . esc_attr( stripslashes( mframe_option( "$field" ))) . '" class="'. $option['type'] .'" /> ' . $option['after'];
			break;

		case 'checkbox' :
			echo '<input type="hidden" name="' . $field . '" value="0" />';
			echo '<input type="checkbox" name="' . $field . '" id="' . $field . '" value="1"' . checked( mframe_option( $field ), 1, 0 ) . ' />';
			break;

		case 'textarea' :
			echo '<textarea name="' . $field . '" id="' . $field . '" cols="30" rows="5">' . esc_html( stripslashes( mframe_option("$field"))) . '</textarea>';
			break;

		case 'select' :
			echo '<select name="' . $field . '" id="' . $field . '" class="select">';

			foreach ($option['options'] as $caption => $value)
				echo '<option value="' . $value . '"' . selected( mframe_option( $field ), $value, 0 ) . '>' . $caption . '</option>';

			echo '</select>';
			break;

		case 'multiselect' :
			echo '<select name="' . $field . '[]" id="' . $field . '" class="select" size="4" multiple="multiple">';

			foreach ( $option['options'] as $caption => $value )
				echo '<option value="' . $value . '"' . ( in_array( $value, mframe_option( $field )) ? ' selected="selected"' : '' ) . '>' . $caption . '</option>';

			echo '</select>';
			break;

		case 'onoff' :
			echo '<input type="hidden" name="' . $field . '" value="0" />';
			echo '<input type="checkbox" name="' . $field . '" id="' . $field . '" value="1"' . checked( mframe_option( $field ), 1, 0 ) . ' class="checkbox" />';
			echo '<script type="text/javascript">
jQuery(document).ready(function($)
{
	$("#field-' . $field . ' .iPhoneCheckContainer").first().click(function (h)
	{
		if($("#' . $field . '-sub").hasClass("hidden"))
		{
			$("#' . $field . '-sub-off").hide("fast").addClass("hidden");
			$("#' . $field . '-sub").show("fast").removeClass("hidden");
		}
		else
		{
			$("#' . $field . '-sub").hide("fast").addClass("hidden");
			$("#' . $field . '-sub-off").show("fast").removeClass("hidden");
		}
	});
	if ($("#' . $field . '").is(":checked"))
	{
		$("#' . $field . '-sub-off").addClass("hidden");
	}
	else
	{
		$("#' . $field . '-sub").addClass("hidden");
	}
});
</script>';
			if( is_array( $option['sub-options-off'] ))
			{
				echo '<div id="' . $field . '-sub-off" class="sub-options-off">';

				foreach ( (array) $option['sub-options-off'] as $fieldOff => $optionOff )
				{
					mframe_option_loop( $fieldOff, $optionOff );
				}
				echo '</div>';
			}
			if( is_array( $option['sub-options'] ))
			{
				echo '<div id="' . $field . '-sub" class="sub-options">';

				foreach ( (array) $option['sub-options'] as $fieldOn => $optionOn )
				{
					mframe_option_loop( $fieldOn, $optionOn );
				}
				echo '</div>';
			}
			break;

		case 'file' :
			echo "

<div class=\"uploader\">
<script type=\"text/javascript\" language=\"javascript\">
	jQuery(document).ready(function()
	{
		jQuery('#{$field}-upload').uploadify(
		{
			uploader      : '" . get_template_directory_uri() . "/megaframe/megapanel/images/browse.swf',
			script        : '" . get_template_directory_uri() . "/megaframe/megapanel/inc/upload.php',
			buttonImg     : '" . get_template_directory_uri() . "/megaframe/megapanel/images/browse.png',
			cancelImg     : '" . get_template_directory_uri() . "/megaframe/megapanel/images/cancel.png',
			folder        : '../wp-content/themes/" . mframe_option( 'theme-base' ) . "/images/upload',
			height        : 22, // The height of the flash button
			width         : 71, // The width of the flash button
			fileExt       : '" . $option['ext'] . "',
			fileDesc      : 'Image Files',
			auto          : true,
			onAllComplete : function(event,data)
			{
				filePath = '" . get_template_directory_uri() . "/images/upload/' + fileName;
				jQuery('#{$field}-input').val(filePath);

				var img = new Image();
				img.src = filePath;
				img.onload = function()
				{
					jQuery('#{$field}-w').val(img.width);
					jQuery('#{$field}-h').val(img.height);
				}
			}
		});

		jQuery('#{$field}-input').bind('change',
			function()
			{
				var img = new Image();
				img.src = jQuery('#{$field}-input').val();
				img.onload = function()
				{
					jQuery('#{$field}-w').val(img.width);
					jQuery('#{$field}-h').val(img.height);
				}
			}
		);
	});
</script>
<input type=\"file\" name=\"{$field}-upload\" id=\"{$field}-upload\" />
<input type=\"text\" name=\"{$field}\" id=\"{$field}-input\" class=\"file\" size=\"35\" value=\"" . stripslashes( mframe_option( "$field" )) . "\" />
</div>";
			break;

		case 'pagelist' :
			wp_dropdown_pages( array( 'name' => $field, 'show_option_none' => __( 'All', 'mframe' ), 'option_none_value' => 0, 'selected' => mframe_option( "$field" )));
			break;

		case 'multi-pagelist' :
			mframe_multiselect( 'pages', mframe_option( "$field" ), array( 'name' => $field . '[]', 'show_option_none' => __( 'All', 'mframe' ), 'option_none_value' => 0 ));
			break;

		case 'catlist' :
			wp_dropdown_categories( array( 'name' => $field, 'show_option_all' => __( 'All', 'mframe' ), 'hierarchical' => 1, 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'selected' => mframe_option( "$field" )));
			break;

		case 'multi-catlist' :
			mframe_multiselect( 'cats', mframe_option( "$field" ), array( 'name' => $field . '[]', 'show_option_all' => __( 'All', 'mframe' ), 'hierarchical' => 1, 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1 ));
			break;

		case 'color' :
			echo '<input type="text" name="' . $field . '" maxlength="7" size="' . ( $option['size'] ? $option['size'] : 10 ) . '" id="' . $field . '" value="' . esc_attr( stripslashes( mframe_option( "$field" ) ) ) . '" class="text color" style="background-color: ' . mframe_option("$field") . ';" /> ' . $option['after'];
			break;

		case 'skins' :
			echo '<select name="' . $field . '" id="' . $field . '" class="select">';

			for( $i = 0; $i < count($mframe['skins']); $i++ )
				echo '<option value="' . $i . '"' . selected( mframe_option( $field ), $i, 0 ) . '>' . $mframe['skins'][$i]['name'] . '</option>';

			echo '</select>';
			break;

		case 'typography' :
			$colorfield = 'color-' . $field;
			$field = 'typography-' . $field;
			$defaults = array(
				'color'		=> mframe_option( $colorfield ),
				'height'	=> 'normal',
				'styles'	=> array()
			);
			$args = wp_parse_args( mframe_option( $field ), $defaults );
			extract( $args, EXTR_SKIP );

			echo '<div class="typo-right">';

			echo '<div class="typo-field">';
			echo '<label for="' . $field . '-family">Family</label>';
			echo '<select name="' . $field . '[family]" id="' . $field . '-family" class="select">';
			$args = array_merge( mframe_option( 'fonts-cufon' ), mframe_option( 'fonts-websafe' ), mframe_option( 'fonts-google' ));
			foreach ( $args as $value )
				echo '<option value="' . $value . '"' . selected( $family, $value, 0 ) . '>' . $value . '</option>';
			echo '</select>';
			echo '</div>';

			echo '<div class="typo-field">';
			echo '<label for="' . $colorfield . '">Color</label>';
			echo '<input type="text" name="' . $colorfield . '" value="' . esc_attr( stripslashes( $color )) . '" maxlength="7" id="' . $colorfield . '" class="text color" style="background-color: ' . $color . ';" />';
			echo '</div>';

			echo '<div class="typo-field">';
			echo '<label for="' . $field . '-size">Size</label>';
			echo '<select name="' . $field . '[size]" id="' . $field . '-size" class="select">';
			foreach ( range( 6, 60 ) as $value )
				echo '<option value="' . $value . 'px"' . selected( $size, $value . 'px', 0 ) . '>' . $value . 'px</option>';
			echo '</select>';
			echo '</div>';

			echo '<div class="typo-field">';
			echo '<label for="' . $field . '-height">Line Height</label>';
			echo '<select name="' . $field . '[height]" id="' . $field . '-height" class="select">';
			$args = array( 'Normal' );
			foreach ( $args as $value )
				echo '<option value="' . $value . '"' . selected( $height, $value, 0 ) . '>' . $value . '</option>';
			foreach ( range( 6, 60 ) as $value )
				echo '<option value="' . $value . 'px"' . selected( $height, $value . 'px', 0 ) . '>' . $value . 'px</option>';
			echo '</select>';
			echo '</div>';

			echo '<div class="typo-field">';
			echo '<label for="' . $field . '-styles">Styles</label>';
			echo '<select multiple="multiple" name="' . $field . '[styles][]" id="' . $field . '-styles" class="select" style="height: 4em;">';
			$args = array( 'Bold', 'Italic', 'Underline', 'Capitalize', 'Uppercase' );
			foreach ( $args as $value )
				echo '<option value="' . $value . '"' . ( in_array( $value, $styles ) ? ' selected="selected"' : '' ) . '>' . $value . '</option>';
			echo '</select>';
			echo '</div>';

			echo '</div>' . $option['after'];
			break;
	}
	echo '<small>' . $option['desc'] . '</small>';
	echo '</div>';
}

function mframe_admin_build_options( $mframe )
{
	$i = 2;
	foreach ( (array) $mframe['options'] as $name => $categories )
	{
		echo '<div id="tab-' . $i . '">';
		echo '<ul class="ui-cats">';
		echo '<li><h3>' . $name . '</h3></li>';

		$j = 1;
		foreach ( (array) $categories as $name => $data )
		{
			echo '<li><a href="#options-' . $i .'-' . $j++ . '"><span>' . $name . '</span></a></li>';
		}
		echo '</ul>'; ?>
		<div class="ui-tools">
		 <span class="submit"><input value="<?php _e( 'Save Changes', 'mframe' ); ?>" type="submit" /></span>
		 <span class="submit reset"><input value="<?php _e( 'Reset All', 'mframe' ); ?>" type="button" onclick="javascript: mframe_reset_confirm();" /></span>
		 <?php echo '<div id="save' . $i . '"></div>'; ?>
		 <span id="reset<?php echo $i; ?>" class="submit reset" title="Confirm?" style="display: none;"><input value="<?php _e( 'OK?', 'mframe' ); ?>" type="button" onclick="javascript: mframe_reset();" /></span>
		</div><?php
		echo '<div class="ui-options">';

		$j = 1;
		foreach ( (array) $categories as $name => $data )
		{
			echo '<div id="options-' . $i . '-' . $j++ . '">';

			foreach ( (array) $data as $field => $option )
			{
				mframe_option_loop( $field, $option );
			}
			echo '</div>';
		}
		echo '</div>';
		echo '</div>';

		$i++;
	}
}

function mframe_multiselect( $type = '', $selected = '', $args = '' )
{
	$defaults = array( 'echo' => 0 );
	$args = wp_parse_args( $args, $defaults );
	if ( $type == 'pages' )
		$output = wp_dropdown_pages( $args );
	else
		$output = wp_dropdown_categories( $args );

	$output0 = str_replace( '<select', '<select multiple="multiple" size="8" class="select"', $output );
	$i = 0;

	foreach( $selected as $key => $value )
	{
	$n = $i + 1;
	${'output' . $n} = str_replace( 'value="' . $value . '"', 'value="' . $value . '" selected="selected"', ${'output' . $i} );
	$i++;
	}

	echo ${'output' . $n};
}
?>
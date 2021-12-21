/*
 License: GNU General Public License v3.0
 License URI: http://www.gnu.org/licenses/gpl-3.0.html
 Author: MegaThemes (http://www.megathemes.com)
*/

jQuery(document).ready(
	function($)
	{
		jQuery('.ui-panel, .ui-main > div').tabs({ fx: { opacity: 'toggle', duration: 'fast' }});

		jQuery('.onoff .checkbox').iphoneStyle();

		jQuery("#style").bind("change",
			function()
			{
				jQuery('form.ui-panel').submit();
			}
		);

		jQuery('form.ui-panel').submit(
			function()
			{
				var data = jQuery(this).serialize();

				jQuery.post(ajaxurl, data,
					function(response)
					{
						jQuery('#save2').html('<div class="response"><div class="response_arrow"></div><div class="response_in">Options Saved</div></div>').show();
						jQuery('#save3').html('<div class="response"><div class="response_arrow"></div><div class="response_in">Options Saved</div></div>').show();
						setTimeout('fade_message()', 500);

						var response = jQuery.parseJSON(response);

						jQuery.each(response,
							function(key, val)
							{
								if (key == 'skins')
								{
									jQuery.each(val,
										function(key, val)
										{
											jQuery("#" + key).val(val).css('backgroundColor', val);
										}
									);
								}
								else
								{
									jQuery.each(val,
										function(key, val)
										{
											jQuery("#" + key).val(val);
										}
									);
								}
							}
						);
					}
				);
				return false;
			}
		);
	}
);

function fade_message()
{
	jQuery('#save2').fadeOut(750);
	jQuery('#save3').fadeOut(750);
	clearTimeout();
}

function mframe_reset_confirm()
{
	jQuery('#reset2').fadeIn();
	jQuery('#reset3').fadeIn();
}

function mframe_reset()
{
	window.location='themes.php?page=mFrame&reset=true';
}

jQuery(document).ready(
	function($)
	{
		$('.text.color').ColorPicker({
			onBeforeShow: function () {
				el = this;
				$(el).ColorPickerSetColor(el.value);
			},
			onShow: function (colpkr) {
				$(colpkr).fadeIn(250);
				return false;
			},
			onSubmit: function (hsb, hex, rgb) {
				$(el).val('#' + hex);
				$(el).css('backgroundColor', '#' + hex);
			},
			onChange: function (hsb, hex, rgb) {
				$(el).val('#' + hex);
				$(el).css('backgroundColor', '#' + hex);
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(250);
				return false;
			}
		})
		.bind('keyup', function () {
			$(this).ColorPickerSetColor(this.value);
		});
	}
);
/*
 License: GNU General Public License v3.0
 License URI: http://www.gnu.org/licenses/gpl-3.0.html
 Author: MegaThemes (http://www.megathemes.com)
*/

jQuery(document).ready(function($)
{
	$('body').removeClass('noscript');

	$('#tabs').tabs({ fx: { opacity: 'toggle', duration: 'fast' }});

	$('#nav .menu ul').superfish();

	// add toplevel and sublevel navigation item classes
	$('#nav li a').addClass('toplevel');
	$('#nav li ul a').removeClass('toplevel').addClass('sublevel');

	// prettyPhoto
	$("#nav li a[href^='#feedsbox']").addClass('feeds').attr('rel', 'prettyPhoto');
	$("#nav li a[href^='#loginbox']").addClass('login').attr('rel', 'prettyPhoto');
	$("a[rel^='prettyPhoto']").prettyPhoto({ social_tools: false, default_width: 533 });

	// Tipsy
	$('img.tip, img.avatar, a.tip').tipsy({ gravity: 's', fade: true });
	$('textarea, input[type="text"], input[type="password"]').tipsy({ gravity: 'sw', fade: true, trigger: 'focus', title: 'placeholder' });

	$('form.ajax').submit(
		function()
		{
			el = this;
			var data = jQuery(el).serialize();

			jQuery('.ajaxresponse', el).addClass('loading ajaxloading').hide().html('Processing ...').fadeIn('slow');

			jQuery.post(mframe.ajax, data,
				function(response)
				{
					jQuery('.ajaxresponse', el).removeClass('loading ajaxloading').html(response).show();
				}
			);
			return false;
		}
	);
});

Cufon.replace(
	'#nav .logo a, #nav a.toplevel, #footer h3, h1, h2, h3, h4, h5, h6',
	{
		autoDetect: true, hover: true, textShadow: '#FFFFFF 0px 1px'
	}
);

Cufon.replace(
	'#style0 #nav a.toplevel, #style0 #footer h3',
	{
		autoDetect: true, hover: true, textShadow: '#000000 0px 1px'
	}
);
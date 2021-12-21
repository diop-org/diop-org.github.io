jQuery(function($) {
			var offset = $(".schemes").offset();
			var topPadding = 50;
			jQuery(window).scroll(function() {
				if (jQuery(window).scrollTop() > offset.top) {
					jQuery(".schemes").stop().animate({
						marginTop: $(window).scrollTop() - offset.top + topPadding
					});
				} else {
					jQuery(".schemes").stop().animate({
						marginTop: 0
					});
				};
			});
		});
		jQuery(function($)
			{
				$.stylesheetInit();
				$('.schemes a').bind(
					'click',
					function(e)
					{
						$.stylesheetSwitch(this.getAttribute('rel'));
						return false;
					}
				);
			}
		);

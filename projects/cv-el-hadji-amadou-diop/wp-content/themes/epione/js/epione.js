jQuery(function(){
	jQuery(".topmenu ul li a, .topmenu ul li a, .error a ").textShadow();
	
	jQuery('#logo a').FontEffect({ gradient:true, gradientColor:"#fff", gradientPosition:45, gradientLength:40 });
		jQuery("#slider").easySlider({
		auto: true,
		continuous: true 
	});
	jQuery('.fb_hover, .twitt_hover, .stumble_hover, .delicious_hover, .gbuzz_hover').hover(function(){
		jQuery(this).stop().animate({"opacity":"0"},400);
	}, function(){
		jQuery(this).stop().animate({"opacity":"1"},400);
		});
	
	jQuery('.widgets ul li a').hover(function(){
		jQuery(this).stop().animate({"color":"#fff"},200);
	}, function(){
		jQuery(this).stop().animate({"color":"#898989"},200);		
		});
});

jQuery(function(){
	var easing = 'easeInExpo';
	jQuery('.topmenu ul > li ul.sub-menu, .topmenu ul > li ul.children').css({"display":"none" });
	jQuery('.topmenu ul > li').hoverIntent(function(){
	jQuery(this).find('ul.sub-menu, ul.children').slideDown({ duration: 150, easing: easing});
	}, function(){
	jQuery(this).find('ul.sub-menu, ul.children').slideUp({ duration: 200, easing: easing});	
	});	
});

jQuery(function(){
	jQuery('ul.commentlist .comment, ul.commentlist .pingback, ul.commentlist .trackback, #respond').after('<div class="comment-body-bottom"></div>');
	jQuery('#respond').before('<div class="commentform-body-top"></div>');
	jQuery('.topmenu ul li:first-child ul.sub-menu, .topmenu ul li:first-child ul.children').append('<div class="sub-menu-bottom"></div>');
});

jQuery(function(){
	var easing = 'easeOutBounce';
	jQuery('.follow_fb_link, .follow_twitter_link, .follow_rss_link').css({backgroundPosition: '0px 0px'})
		.mouseover(function(){
			jQuery(this).stop().animate({backgroundPosition:'0 -22px'},200, easing)
		})
		.mouseout(function(){
			jQuery(this).stop().animate({backgroundPosition:'0 0'},200, easing)
		});
});
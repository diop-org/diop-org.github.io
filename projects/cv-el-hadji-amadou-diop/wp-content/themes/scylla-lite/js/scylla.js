/* <![CDATA[ */
//SCYLLA JavaScript 
jQuery(function() {
	jQuery('#lay1 .post:odd, #related ul li:last').css({'marginRight':'0px'});
	jQuery('#sidebar ul li ul li:odd, #footbar ul li ul li:odd').addClass('odd');
	jQuery('#sidebar ul li ul li:even, #footbar ul li ul li:even').addClass('even');

	//MENU Animation
	jQuery('#topmenu ul > li').hoverIntent(function(){
	jQuery(this).find('.sub-menu:first, ul.children:first').slideDown({ duration: 200});
	}, function(){
	jQuery(this).find('.sub-menu:first, ul.children:first').slideUp({ duration: 200});	
	});
	jQuery('#topmenu ul li').not('#topmenu ul li ul li').hover(function(){
	jQuery(this).addClass('menu_hover');
	}, function(){
	jQuery(this).removeClass('menu_hover');	
	});
	

	jQuery('.error_page .post').css({'opacity':'0.7'});
	jQuery('#related:empty').css({'display':'none'});
	
	//SHARE THIS Animation
	jQuery('.social_buttons a').css({"opacity":"0.3"});
	jQuery('.social_buttons a').hoverIntent(function(){
	jQuery(this).stop().animate({'opacity':'1'}, 300);
	}, function(){
	jQuery(this).stop().animate({'opacity':'0.3'}, 300);
	});
	//Sticky POST
	jQuery('.sticky ').each(function(){
	jQuery(this).children().wrapAll('<div class="sticky_bg" />');
	});

	
});


/* ]]> */
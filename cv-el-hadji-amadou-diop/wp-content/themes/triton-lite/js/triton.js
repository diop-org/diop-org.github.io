/* <![CDATA[ */
//TRITON JavaScript 
jQuery(window).load(function($) {
	
	jQuery('#menu-scylla li:first').css({"margin-Left":"0px", "Padding-Left":"0px"})
	//JQUERY MASONRY in Archive page
	jQuery('.lay1').masonry({ itemSelector: '.post, .page' });
	jQuery('.lay1 .post:eq(2), .lay1 .post:eq(5), .lay1 .post:eq(8), .lay1 .post:eq(11), .lay1 .post:eq(14), #midrow .widgets .widget:eq(2)').css({'margin-Right':'0px'});	
	jQuery('.lay1 .post').slice(-3).css({'border':'none'});

	
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
	
	//Layout1 Animations
	jQuery('.lay1 .post .imgwrap').css({'opacity':'0.7'});
	jQuery('.lay1 .post ').hover(function(){
		jQuery(this).find('.imgwrap').stop().animate({'opacity':'1'}, 300);
	}, function(){
		jQuery(this).find('.imgwrap').stop().animate({'opacity':'0.7'}, 300);
	});
	jQuery('.lay1 .post .date_meta').css({'right':'-300px'});
	jQuery('.lay1 .post .block_comm').css({'left':'-200px'});
	jQuery('.lay1 .post ').hover(function(){
		jQuery(this).find('.date_meta').stop().animate({'right':'0px'}, 300);
		jQuery(this).find('.block_comm').stop().animate({'left':'0px'}, 300);
		jQuery(this).find('.read_mor').css({'background':'#ccc'}, 300);
	}, function(){
		jQuery(this).find('.date_meta').stop().animate({'right':'-300px'}, 300);
		jQuery(this).find('.block_comm').stop().animate({'left':'-200px'}, 300);
		jQuery(this).find('.read_mor').css({'background':'#dfdfdf'}, 300);
	});
	
	//Social Buttons Animation
	jQuery('.social_wrap ul li').css({'opacity':'0.4'});
	jQuery('.social_wrap ul li ').hover(function(){
		jQuery(this).stop().animate({'opacity':'1'}, 300);
	}, function(){
		jQuery(this).stop().animate({'opacity':'0.4'}, 300);
	});

//Comment FORM
jQuery('h3#reply-title').after('<div class="comm_break" /><div style="clear:both" />');

		//Shortcode Fix
	jQuery(".lgn_tab p:empty").remove();
	jQuery('.tabli a:eq(0)').attr('href', '#tab-1');
	jQuery('.tabli a:eq(1)').attr('href', '#tab-2');
	jQuery('.tabli a:eq(2)').attr('href', '#tab-3');
	jQuery('.tabli a:eq(3)').attr('href', '#tab-4');	
	jQuery('.tabli a:eq(4)').attr('href', '#tab-5');
	jQuery('.tabli a:eq(5)').attr('href', '#tab-6');
	jQuery('.tabli a:eq(6)').attr('href', '#tab-7');
	jQuery('.tabli a:eq(7)').attr('href', '#tab-8');
	jQuery('.tabli a:eq(8)').attr('href', '#tab-9');
	
	
	jQuery('.lgn_tab div:eq(0)').attr('id', 'tab-1');
	jQuery('.lgn_tab div:eq(1)').attr('id', 'tab-2');
	jQuery('.lgn_tab div:eq(2)').attr('id', 'tab-3');
	jQuery('.lgn_tab div:eq(3)').attr('id', 'tab-4');	
	jQuery('.lgn_tab div:eq(4)').attr('id', 'tab-5');
	jQuery('.lgn_tab div:eq(5)').attr('id', 'tab-6');
	jQuery('.lgn_tab div:eq(6)').attr('id', 'tab-7');
	jQuery('.lgn_tab div:eq(7)').attr('id', 'tab-8');
	jQuery('.lgn_tab div:eq(8)').attr('id', 'tab-9');
				
	jQuery(document).ready(function(){
	jQuery('.tabs-container .lgn_tab div').hide();
	jQuery('.tabs-container .lgn_tab div:first').show();
	jQuery('.tabs li:first').addClass('active');
	jQuery('.tabs li a').click(function(){ 
	jQuery('.tabs li').removeClass('active');
	jQuery(this).parent().addClass('active'); 
	var currentTab = jQuery(this).attr('href'); 
	jQuery('.tabs-container .lgn_tab div').hide();
	jQuery(currentTab).fadeIn();
	return false;
	});
	});
	//Toggle Shortcode
	jQuery('.lgn_toggle_content').hide(); // Hide even though it's already hidden
	jQuery('.trigger').click(function() {
    jQuery('.lgn_toggle_content').slideToggle("fast"); // First click should toggle to 'show'
	  return false;
   });
   	jQuery('.lgn_toggle a').toggle(function(){
	jQuery(this).addClass('down');
	}, function(){
	jQuery(this).removeClass('down');	
	});

});




/* ]]> */
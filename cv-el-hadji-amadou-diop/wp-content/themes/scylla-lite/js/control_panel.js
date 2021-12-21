//Scylla Control Panel 

jQuery(function() {
	jQuery('#control_panel_header ul li a').css({"opacity":"0.6"});
	jQuery('#control_panel_header ul li').hover(function(){
	jQuery(this).find('a').stop().animate({'opacity':'1'}, 200);
	}, function(){
	jQuery(this).find('a').stop().animate({'opacity':'0.6'}, 200);
	});
	
	//Control Panel Tabs
	jQuery('#tabs .tab').hide();
	jQuery('#tabs .tab:first').show();
	jQuery('#control_panel_header ul li:first').addClass('active');
	jQuery('#control_panel_header ul li span, #control_panel_header ul li a').click(function(){ 
	jQuery('#control_panel_header ul li').removeClass('active');
	jQuery(this).parent().addClass('active'); 
	var currentTab = jQuery(this).attr('href'); 
	jQuery('#tabs .tab').hide();
	jQuery(currentTab).fadeIn();
	return false;
	});
	
	//Control Sub-Panel Tabs
	jQuery('#tab_gen .tab .tab_option, #tab_sldr .tab .tab_option, #tab_abt .tab .tab_option, #tab_front .tab .tab_option, #tab_comm .tab .tab_option, #tab_misc .tab .tab_option, #tab_stl .tab .tab_option, #tab_upg .tab .tab_option').hide();
	jQuery('#tab_gen .tab .tab_option:first, #tab_sldr .tab .tab_option:first, #tab_abt .tab .tab_option:first, #tab_front .tab .tab_option:first, #tab_comm .tab .tab_option:first, #tab_misc .tab .tab_option:first, #tab_stl .tab .tab_option:first, #tab_upg .tab .tab_option:first').show();
	jQuery('#tab_gen .tab_sub_menu ul li:first, #tab_sldr .tab_sub_menu ul li:first, #tab_abt .tab_sub_menu ul li:first, #tab_front .tab_sub_menu ul li:first, #tab_comm .tab_sub_menu ul li:first, #tab_misc .tab_sub_menu ul li:first, #tab_stl .tab_sub_menu ul li:first, #tab_upg .tab_sub_menu ul li:first').addClass('active');
	//General Settings Sub-Menu
	jQuery('#tab_gen .tab_sub_menu ul li a').click(function(){ 
	jQuery('#tab_gen .tab_sub_menu ul li').removeClass('active');
	jQuery(this).parent().addClass('active'); 
	var currentTab = jQuery(this).attr('href'); 
	jQuery('#tab_gen .tab .tab_option').hide();
	jQuery(currentTab).fadeIn();
	return false;
	
	});
	
	//Front-Page Settings Sub-Menu
	jQuery('#tab_front .tab_sub_menu ul li a').click(function(){ 
	jQuery('#tab_front .tab_sub_menu ul li').removeClass('active');
	jQuery(this).parent().addClass('active'); 
	var currentTab = jQuery(this).attr('href'); 
	jQuery('#tab_front .tab .tab_option').hide();
	jQuery(currentTab).fadeIn();
	return false;
	
	});
	//Slider Settings Sub-Menu
	jQuery('#tab_sldr .tab_sub_menu ul li a').click(function(){ 
	jQuery('#tab_sldr .tab_sub_menu li').removeClass('active');
	jQuery(this).parent().addClass('active'); 
	var currentTab = jQuery(this).attr('href'); 
	jQuery('#tab_sldr .tab .tab_option').hide();
	jQuery(currentTab).fadeIn();
	return false;
	
	});
	
	//About Settings Sub-Menu
	jQuery('#tab_abt .tab_sub_menu ul li a').click(function(){ 
	jQuery('#tab_abt .tab_sub_menu li').removeClass('active');
	jQuery(this).parent().addClass('active'); 
	var currentTab = jQuery(this).attr('href'); 
	jQuery('#tab_abt .tab .tab_option').hide();
	jQuery(currentTab).fadeIn();
	return false;
	
	});
	//Community Settings Sub-Menu
	jQuery('#tab_comm .tab_sub_menu ul li a').click(function(){ 
	jQuery('#tab_comm .tab_sub_menu li').removeClass('active');
	jQuery(this).parent().addClass('active'); 
	var currentTab = jQuery(this).attr('href'); 
	jQuery('#tab_comm .tab .tab_option').hide();
	jQuery(currentTab).fadeIn();
	return false;
	
	});
	//Miscellaneous Settings Sub-Menu
	jQuery('#tab_misc .tab_sub_menu ul li a').click(function(){ 
	jQuery('#tab_misc .tab_sub_menu li').removeClass('active');
	jQuery(this).parent().addClass('active'); 
	var currentTab = jQuery(this).attr('href'); 
	jQuery('#tab_misc .tab .tab_option').hide();
	jQuery(currentTab).fadeIn();
	return false;
	
	});	
	

	//Style Settings Sub-Menu
	jQuery('#tab_upg .tab_sub_menu ul li a').click(function(){ 
	jQuery('#tab_upg .tab_sub_menu li').removeClass('active');
	jQuery(this).parent().addClass('active'); 
	var currentTab = jQuery(this).attr('href'); 
	jQuery('#tab_upg .tab .tab_option').hide();
	jQuery(currentTab).fadeIn();
	return false;
	
	});
jQuery(".fade").delay(1000).animate({"opacity": "0"},1000);

	

});
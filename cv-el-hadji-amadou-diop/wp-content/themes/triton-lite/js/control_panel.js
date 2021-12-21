//Scylla Control Panel 

jQuery(document).ready(function() {
	jQuery('#upload_image_button').click(function() {
	 formfield = jQuery('#upload_image').attr('name');
	 post_id = jQuery('#post_ID').val();
	 tb_show('', 'media-upload.php?post_id='+2+'&amp;type=image&amp;TB_iframe=true');
	 return false;
	});
	window.send_to_editor = function(html) {
	 imgurl = jQuery('img',html).attr('src');
	 jQuery('#upload_image').val(imgurl);
	 tb_remove();
	}
	});
	
jQuery(".fade").delay(1000).animate({"opacity": "0"},1000);
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
	jQuery('#tab_stl .tab_sub_menu ul li a').click(function(){ 
	jQuery('#tab_stl .tab_sub_menu li').removeClass('active');
	jQuery(this).parent().addClass('active'); 
	var currentTab = jQuery(this).attr('href'); 
	jQuery('#tab_stl .tab .tab_option').hide();
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
	
	//COLORPICKER
	//BG COLOR
	 jQuery('#bg_color').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	},
	})
	.bind('keyup', function(){
		jQuery(this).ColorPickerSetColor(this.value);
	});
	//Primary COLOR
	 jQuery('#prim_color').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	},
	})
	.bind('keyup', function(){
		jQuery(this).ColorPickerSetColor(this.value);
	});
	//Secondary COLOR
	 jQuery('#sec_color').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	},
	})
	.bind('keyup', function(){
		jQuery(this).ColorPickerSetColor(this.value);
	});
	
	

	

	
//FONT COLOR
	//LOGO COLOR
	 jQuery('#logo_color').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	},
	onChange: function (hsb, hex, rgb) {
		jQuery('#color_set .logo, #color_set .not_active').css('color', '#' + hex);
	}
	})
	.bind('keyup', function(){
		jQuery(this).ColorPickerSetColor(this.value);
	});
	//Primary COLOR
	 jQuery('#primtxt_color').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	},
	})
	.bind('keyup', function(){
		jQuery(this).ColorPickerSetColor(this.value);
	});
	//Secondary COLOR
	 jQuery('#sectxt_color').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	},
	})
	.bind('keyup', function(){
		jQuery(this).ColorPickerSetColor(this.value);
	});
	
	//POST TITLE COLOR
	 jQuery('#postt_color').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	},
	})
	.bind('keyup', function(){
		jQuery(this).ColorPickerSetColor(this.value);
	});
	
		//Sidebar Widget Font Color
	 jQuery('#sbwtxt_color').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	},
	})
	.bind('keyup', function(){
		jQuery(this).ColorPickerSetColor(this.value);
	});
	
	//Sidebar Widget Title COLOR
	 jQuery('#sbwtt_txt_color').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	},
	})
	.bind('keyup', function(){
		jQuery(this).ColorPickerSetColor(this.value);
	});
	
	//Footer Widget FONT COLOR
	 jQuery('#ftwtxt_color').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	},
	})
	.bind('keyup', function(){
		jQuery(this).ColorPickerSetColor(this.value);
	});
	
	//Featured Ribbon Widget COLOR
	 jQuery('#feat_txt_color').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	},
	})
	.bind('keyup', function(){
		jQuery(this).ColorPickerSetColor(this.value);
	});
	
	//Date Badge Widget COLOR
	 jQuery('#date_txt_color').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	},
	})
	.bind('keyup', function(){
		jQuery(this).ColorPickerSetColor(this.value);
	});
	
	//Footer Text COLOR
	 jQuery('#trt_foot_txt').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	},
	})
	.bind('keyup', function(){
		jQuery(this).ColorPickerSetColor(this.value);
	});
	
	//Footer Title COLOR
	 jQuery('#trt_foot_tt').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	},
	})
	.bind('keyup', function(){
		jQuery(this).ColorPickerSetColor(this.value);
	});
	
//	RESET BUTTON
	jQuery('#reset').click(function() {
		jQuery('#date_txt_color').attr('value', '444444');
		jQuery('#feat_txt_color').attr('value', 'a53c2e');
		jQuery('#ftwtxt_color').attr('value', '979797');
		jQuery('#sbwtt_txt_color').attr('value', 'ffffff');
		jQuery('#sbwtxt_color').attr('value', '777777');
		jQuery('#postt_color').attr('value', '333333');
		jQuery('#sectxt_color').attr('value', 'a53c2e');
		jQuery('#primtxt_color').attr('value', '7F7F7F');	
		jQuery('#logo_color').attr('value', '171717');
		jQuery('#trt_foot_txt').attr('value', '979797');
		jQuery('#trt_foot_tt').attr('value', 'EDEEF0');
		
		jQuery('#bg_color').attr('value', '171717');
		jQuery('#prim_color').attr('value', 'F4F4F4');
		jQuery('#sec_color').attr('value', '131313');

	  return false;
   });

});


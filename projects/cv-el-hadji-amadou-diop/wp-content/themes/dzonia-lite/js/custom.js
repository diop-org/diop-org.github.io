/*--------DDsmoothmenu Initialization--------*/
ddsmoothmenu.init({
	mainmenuid: "menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
});
//Testimonial crousel lite
jQuery(function() {
   jQuery(".sliderHolder2").jCarouselLite({
		auto: 4500,
		speed: 1000,
		hoverPause: true,
		btnNext: ".next2",
        btnPrev: ".prev2"
	
    });
});
//Fade Images
//Fade images
 jQuery(document).ready(function(){
    jQuery(".featured_content img, .post img, .sidebar .recent_post li img, .sidebar ul li").hover(function() {
      jQuery(this).stop().animate({opacity: "0.5"}, '500');
    },
    function() {
      jQuery(this).stop().animate({opacity: "1"}, '500');
    });
  });
 //Cufon Replacement in heading
  jQuery(document).ready(function() { 
//Cufon.replace('h1')('h2')('h3')('h4')('h5')('h6');
Cufon.replace('h1, h2, h3, h4, h5, h6,.content .post .date li', { fontFamily: 'MankSans-Medium', hover: true });
});
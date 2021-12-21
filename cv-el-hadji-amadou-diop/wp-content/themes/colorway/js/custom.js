//Cufon Replacement
Cufon.replace('h1')('h2')('h3')('h4')('h5')('h6');
//Tipsy	
jQuery(function() {    
    jQuery('.social_logo a').tipsy();
}); 
//Ddsmooth
ddsmoothmenu.init({
	mainmenuid: "menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})
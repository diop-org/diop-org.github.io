function mainmenu(){
jQuery(".pandora-nav ul").css({display: "none"}); // Opera Fix
jQuery(".pandora-nav li").hover(
		function(){
			jQuery(this).find('ul:first').show("normal");
		},
		function(){
			jQuery(this).find('ul:first').css({display: "none"});
		});
}

jQuery(document).ready(function(){					
	mainmenu();
});
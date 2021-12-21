jQuery(document).ready(function(){
	jQuery("ul.sf-menu").superfish({
		delay:       500,                            // one second delay on mouseout 
		animation:   {opacity:"show",height:"show"},  // fade-in and slide-down animation 
		speed:       "fast",                          // faster animation speed 
		autoArrows:  true,                           // disable generation of arrow mark-up 
		dropShadows: true                            // disable drop shadows 
	});
});

jQuery(document).ready(function($){
    
    
    /*
     * Menu Drop Downs
     */
    $('.drop-down .menu > li a, .drop-down .nav > li a').not(':animated').click(function(e) {
		        var subTest = $(this).closest('li').find('.sub-menu, .children').size();
		        if ( subTest >= 1 ) {
                    e.preventDefault();
    
                	// Slide all menus up if any are open (like on an iPhone)	
                	$('.menu > li').removeClass('active');
                	$(this).closest('li')
                	       .find('.sub-menu, .children')
                	       .hide();
            
                    $(this).closest('li')
                           .addClass('active')
                    	   .children('.sub-menu, .children')
                    	   .slideDown('fast');
		        
		        }

    });

    $('.drop-down .menu > li, .drop-down .nav > li').mouseleave(function(){
        $(this).find('.sub-menu, .children')
               .slideUp('fast');
               
        $(this).removeClass('active');
    });
    
    /*
     * Show drop down menu of current page, but only on sidebar
     */
    $('.drop-down #sidebar .current_page_ancestor').find('.children, .sub-menu').show();
    

    /*
     * Position the top menu correctly
     */
	menuHeight = $('.top.menu').outerHeight();
    $('.top.menu').css('margin-top', 0-(menuHeight/2)+'px');
    
});
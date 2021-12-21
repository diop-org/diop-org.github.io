// Init jQuery on page load
$(document).ready(function($) {

	$nav = $( '#navigation' );

	$( '#navigation li a' ).click(function(event){
	
		// hide all tabs
		$( '.container .tab' ).hide();
		
		// remove current class on nav tab
		$nav.find('a').each(function(){ $(this).parent().removeClass( 'current' ) });
		
		// show active tab
		$( $(this).attr( 'href' ) ).show();
		
		// add current class to tab
		$(this).parent().addClass( 'current' );
		
		
		return false;
										 
	});
	
	
});
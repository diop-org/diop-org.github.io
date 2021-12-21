$(function() {
	jQuery(document).ready(function() {
	
	/*-----------------------------------------------------------------------------------*/
	/* Portfolio Filter */
	/*-----------------------------------------------------------------------------------*/
	$('.filter li a').click(function() {
		var ourClass = $(this).attr('class');
		
		$('.filter li').removeClass('active');
		$(this).parent().addClass('active');
		
		if(ourClass == 'all-cats') {
		  $('#portfolio-wrap').children('div.portfolio-item').hide().show();
		}
		else {
		  $('#portfolio-wrap .portfolio-item').hide();
		  $('#portfolio-wrap').children('div.' + ourClass).show();
		}
		
		return false;
	});
	

	}); // end doc ready
}); // end function
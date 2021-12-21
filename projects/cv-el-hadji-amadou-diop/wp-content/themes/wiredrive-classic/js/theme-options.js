jQuery(document).ready(function($) {

    // Add Farbtastic to every color input
    $('.wd-classic-color-input-wrap').each( function() {
        
        var inputID = $(this).children('input').attr('id');
        jQuery('.' + inputID).farbtastic('#' + inputID);

	});
	
    //On click show the color picker
    var colorswatch = false;
	$('.wd-classic-color-button').click(function() {
        $(this).siblings('.wd-classic-color-picker-wrap').show();   
	});

    // If you click on the color picker, then don't close the box.
	$('.farbtastic').mousedown(function() {
		// Oh, the swatch was clicked. Tell the document clicker to abort.
		colorswatch = true;
		return;
	});

	$(document).mousedown(function() {
		// Was the swatch clicked? If so, abort.
		if ( true == colorswatch ) return;
		$('.wd-classic-color-picker-wrap').hide()
	});
	
	//If the color is manually updated, then update the background color
	$('.wd-classic-color-input-wrap input').keyup(function() {
        var color = $(this).val()
        $(this).css('background-color', color);
    });
	
});
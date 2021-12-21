// DROP DOWN BY PAGELINES

var $j = jQuery.noConflict();

$j(document).ready(function () {
	
	$j("ul.dropdown li").hover(function(){

        $j(this).addClass("menuhover");
        $j('ul:first',this).fadeIn("fast");
		//$j('ul:first',this).css('visibility', 'visible');
    }, function(){

        $j(this).removeClass("menuhover");
        $j('ul:first',this).fadeOut("fast");
		//$j('ul:first',this).css('visibility', 'hidden');

    });

    //$j("ul.dropdown li ul li:has(ul)").find("a:first").append(" &raquo; ");

});
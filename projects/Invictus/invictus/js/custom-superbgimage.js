/*-----------------------------------------------------------------------------------
 	My Custom JS for SuperBgImage Script Wordpress Theme
-----------------------------------------------------------------------------------*/
/*
	1. =General Settings
*/


// Init jQuery on page load
jQuery(document).ready(function($) {

	//defining some global variables	
	$fullsize 	   	= jQuery('#fullsize');
	$scrollerItems 	= jQuery('#fullsize .item');
	$cntItems 		= $scrollerItems.length;
	$fullsizeTimer 	= jQuery('#fullsizeTimer');
	$fullsizeStart 	= jQuery('#fullsizeStart');
	$fullsizeStop 	= jQuery('#fullsizeStop');

/*-----------------------------------------------------------------------------------*/
/*	1. =General Settings
/*-----------------------------------------------------------------------------------*/

	$.fn.stopTimer = function() {
		jQuery(this).stop().width(0);
		$fullsizeStart.show();
		$fullsizeStop.hide();
	}

	$.fn.startTimer = function( timer, resume ) {	
			
		if(resume){
			
			var left_duration = timer * ( jQuery(window).width() - jQuery(this).width() ) / jQuery(window).width();
			
			$.fn.superbgimage.options.slide_interval = left_duration;
								
			jQuery(this).stop(true).animate({
				width:  jQuery(window).width()
			}, {
				duration: left_duration,
				specialEasing: { 
					width: "linear" 
					}
			});			
			
			$fullsizeStart.hide();
			$fullsizeStop.show();						
				
		}else{
			
			if( $.fn.superbgimage.options.slideshow == 1 || ( jQuery('#superbgimageplayer').hasClass('jwplayer_init') && jwplayer('superbgimageplayer').getState() == "PLAYING" ) ) {
				
				$actItem = jQuery('#fullsize .item.activeslide');
				$ind = 	jQuery('a.activeslide').index("#fullsize .item") + 1;
				
				if( $ind == 1){
					$fullsize.animate({ marginLeft: 0 });
				}
				
				jQuery(this).css({ width: 0 }).stop(true).animate({ 
					width:  jQuery(window).width()
				}, {
					duration: timer,
					specialEasing: { 
						width: "linear" 
					}
				});
				$fullsizeStart.hide();
				$fullsizeStop.show();
				
			}
		
		}

	};
	
	$.fn.pauseTimer = function( timer ){
		jQuery(this).stop(true);
		$fullsizeStart.show();
		$fullsizeStop.hide();
	}

	// set opacity of thumbnails
	jQuery( '#fullsize a' ).animate({ opacity: 0.5, top: 0 });
	
	// add hover effect to the thumbnails
	jQuery( '#fullsize a').hover(
		function() {
			if( jQuery(this).hasClass('greyscaled') ){
				jQuery(this)
					.find('img.img-color').stop(false,true).fadeIn(250, function(){ jQuery(this).find('img.img-grey').css({ visibility: 'hidden' }) })									
			}
			jQuery(this).find('.overlay').show().stop(false,true).animate({ opacity: 0.7},250).end().not('.activeslide').stop().animate({ opacity: 1 })
		},
		function( ) {
			if( jQuery(this).hasClass('greyscaled') ){
				jQuery(this)
					.find('img.img-grey').css({ visibility: 'visible' })
					.end()
					.find('img.img-color').stop(false,true).fadeOut(250)
			}			
			jQuery(this).find('.overlay').stop(false, true).animate({ opacity: 0},250).end().not('.activeslide').stop().animate({ opacity: 0.5 })
		}
	)
		
	// calculate container width on window load
	$contWidth = 0;	
	
	jQuery(window).load( function() {
		
		jQuery( '#thumbnailContainer a' ).each(function() { 
			$contWidth = $contWidth + jQuery( this ).outerWidth( true );
		})

 		if( $contWidth > jQuery( '#thumbnails .rel' ).width() ){
			jQuery( '#thumbnails .pulldown-items' ).width( $contWidth );
			jQuery( '#thumbnails .scroll-link' ).fadeIn();
		}
		
		// reset opacity and visibility		
		var anim_height = jQuery('#thumbnails').outerHeight( true ) + jQuery('#colophon').outerHeight( true ) + 1;
				
		jQuery( '#thumbnails' ).css('padding-top', jQuery('#thumbnails .controls').outerHeight() );
				
		//scrollpane parts
		var scrollPane = jQuery( "#thumbnailContainer" ),
			scrollContent = $fullsize;
		
			setScrollerWidth();
									
		var slide_handler = function(e, ui) {			
			if ( scrollContent.width() > scrollPane.width() ) {
				scrollContent.css( "margin-left", Math.round(
					ui.value / 100 * ( scrollPane.width() - scrollContent.width() )
				) + "px" );
			} else {
				scrollContent.css( "margin-left", 0 );
			}
		};					
					
		//build slider
		var scrollbar = jQuery( ".scroll-bar" ).slider({
			slide: slide_handler,
			change: slide_handler
		});
					
		jQuery('.scroll-content-item:last').css({marginRight: 0});

		// positioning showtitle		
		jQuery('#showtitle')
			.css({
				marginLeft: - jQuery('#showtitle').outerWidth() / 2 - jQuery('#thumbnails .controls').outerWidth()
			})
		
		if( !jQuery('#thumbnails').hasClass('mouse-scrub') ){
			// Mousewheel plugin
			scrollPane.mousewheel(function(event, delta) {
				var value = scrollbar.slider('option', 'value');
			
				if (delta > 0) { value += 10; }
				else if (delta < 0) { value -= 10; }
					
				// Ensure that its limited between 0 and 100
				value = Math.max(0, Math.min(100, value));
				scrollbar.slider('option', 'value', value);
				event.preventDefault();
			});	
		}
				
		jQuery("#scroll_right").mouseenter(
			function() {
				
				timer = setInterval(function() { 
					
					jQuery("#scroll_left").removeClass('disabled');
					
					var speed = parseInt(8);
					var slider = jQuery('.scroll-bar');
					var curSlider = slider.slider("option", "value");
					curSlider += speed; // += and -= directions of scroling with MouseWheel
					
					if (curSlider > slider.slider("option", "max")){
						jQuery("#scroll_right").addClass('disabled');
						curSlider = slider.slider("option", "max");
					} else if (curSlider < slider.slider("option", "min")){
						curSlider = slider.slider("option", "min");
					}else{
						
					}
					slider.slider("value", curSlider);
					
				}, 100);

			}
		);
		jQuery("#scroll_right").mouseleave( 
			function() { 
				clearInterval(timer); 
			}
		);
	
		jQuery("#scroll_left").mouseenter(
			function() {
				timer = setInterval(function() { 
				
				jQuery("#scroll_right").removeClass('disabled');
				
				var speed = parseInt(8);
				var slider = jQuery('.scroll-bar');;
				var curSlider = slider.slider("option", "value");
				curSlider -= speed; // += and -= directions of scroling with MouseWheel
				
				if (curSlider > slider.slider("option", "max")){
					curSlider = slider.slider("option", "max");
				}else if (curSlider < slider.slider("option", "min")){
					jQuery("#scroll_left").addClass('disabled');
						curSlider = slider.slider("option", "min");
				}
							
				slider.slider("value", curSlider);
							
			}, 100);
						
			}
		);
		jQuery("#scroll_left").mouseleave(
			function() { 
				clearInterval(timer); 
			}
		);		
				
		function setScrollerWidth(){
			var origWidth = jQuery(".scroll-bar").width();//read the original slider width
			var sliderWidth = origWidth -200;//the width through which the handle can move needs to be the original width minus the handle width
			var sliderMargin =  (origWidth - sliderWidth)*0.5;//so the slider needs to have both top and bottom margins equal to half the difference					
			jQuery(".scroll-bar-wrap").css({width:sliderWidth,marginRight: sliderMargin});//set the slider height and margins
		}
		
		
	});
	
	// Show or hide scrolling on window resize	
	window.onresize = function(event) {	
 		if( $contWidth > jQuery( '#thumbnails' ).width() ){
			jQuery( '#thumbnails .pulldown-items' ).width( $contWidth );
			jQuery( '#thumbnails .scroll-link' ).fadeIn();
		}else{
			jQuery( '#thumbnails .scroll-link' ).fadeOut();
			jQuery( '#thumbnails .pulldown-items' ).css( "margin-left", 0 );
		}
	};

	// Set bottom of the thumbnail container to the footers height
	// jQuery('#thumbnails').css({ bottom: jQuery('#colophon').outerHeight() });
	// jQuery('#thumbnails').css({ bottom: - jQuery('#thumbnails').outerHeight( true ) + jQuery('#colophon').outerHeight() });	

	// initialize SuperBGImage
	$fullsize.superbgimage();	

	// prev slide
	var fullsizePrev = jQuery('#thumbnails a.fullsize-prev').livequery('click',function() {
		
		perform_prevAnimation();
		
		return false;
	});
	
	// prev animation function
	function perform_prevAnimation(){
		
		jQuery('#superbgimageplayer').html();		
		
		jQuery('#startInterval').val("start");
		
		$fullsizeTimer.stopTimer();
		$fullsize.prevSlide();
		
		if($.fn.superbgimage.options.slideshow == 1){
			$fullsize.startSlideShow();
		}else{
			$fullsize.stopSlideShow();
		}
		
	}
						
	// next slide
	var fullsizeNext = jQuery('#thumbnails a.fullsize-next').livequery('click',function() {
		
		perform_nextAnimation();

		return false;
	});
	
	// next animation function
	function perform_nextAnimation(){
		
		jQuery('#superbgimageplayer').html();
		
		jQuery('#startInterval').val("start");

		$fullsizeTimer.stopTimer();
		$fullsize.nextSlide();
		
		if($.fn.superbgimage.options.slideshow == 1){
			$fullsize.startSlideShow();
		}else{
			$fullsize.stopSlideShow();
		}
		
	}	

	// mouse move scroller
	if( jQuery('#thumbnails').hasClass('mouse-scrub') ){
		
		//Get our elements for faster access and set overlay width
		var div = jQuery('#thumbnailContainer'),
		ul = jQuery('#fullsize'),
		
		ulPadding = 15;

		//Get menu width
		var divWidth = div.width();
		
		//Remove scrollbars	
		div.css({overflow: 'hidden'});

		//Find last image container
		var lastLi = jQuery('a',ul).filter(":last");

		//When user move mouse over menu

		div.mousemove(function(e){
			
			//As images are loaded ul width increases,
			//so we recalculate it each time

			var ulWidth = lastLi[0].offsetLeft + lastLi.outerWidth() + ulPadding;
			var left = (e.pageX - div.offset().left) * (ulWidth-divWidth) / divWidth;
			div.scrollLeft(left);

		});	
		
	}
	
	// keypress navigation
	if( jQuery('#thumbnails').hasClass('key-nav') ){
		$(document).keydown(function (e) {
			var keyCode = e.keyCode || e.which,
				arrow = {left: 37, up: 38, right: 39, down: 40 };
			
				switch (keyCode) {
					case arrow.left:
						
						perform_prevAnimation();
					
					break;
					
					case arrow.up:
					
						$togthumbs.toggleThumbnails('show');
					
					break;
					
					case arrow.right:
					
						perform_nextAnimation();
					
					break;
					
					case arrow.down:
					
						$togthumbs.toggleThumbnails('hide');
					
					break;
				}

		});	
	}

})
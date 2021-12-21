			jQuery(function($) {

					jQuery('html, body').css({ overflow: 'hidden'  });
		
					//scrollpane parts
					var scrollPane = jQuery( ".scroll-pane" ),
						scrollContent = jQuery( ".scroll-content" );

					// set scrollInterval
					var scrollInterval = 150;
								
					// show scroll arrows on hover
					scrollPane.hover( 
						function(){
							jQuery(".scroller-arrow:not(.disabled)").stop(false, true).fadeIn();
						},
						function(){ 
							jQuery(".scroller-arrow:not(.disabled)").stop(false, true).fadeOut();
						}
					);				
					
					jQuery('#portfolioList li.item img').load(function(){
											
						if(navigator.platform == 'iPad' || navigator.platform == 'iPhone' || navigator.platform == 'iPod'){
							jQuery("#scroll_left, #scroll_right").css({ display: 'block' });
						}
						
						$cw = 0;
						jQuery('li.item', scrollContent).each(function(){ 
							$cw = $cw + jQuery(this).outerWidth(true);
						})
						
						scrollContent.width( $cw );
						
						setScrollerWidth();
						
					});
					
					var slide_handler = function(e, ui) {
						
						if(navigator.platform != 'iPad' || navigator.platform != 'iPhone' || navigator.platform != 'iPod'){
						
							if(ui.value == 0){
								jQuery("#scroll_left").addClass('disabled').stop(false, true).fadeOut();
								jQuery("#scroll_right").removeClass('disabled').stop(false, true).fadeIn();
							}
							
							if(ui.value > 0 && ui.value < 100){
								jQuery("#scroll_left").removeClass('disabled').stop(false, true).fadeIn();
								jQuery("#scroll_right").removeClass('disabled').stop(false, true).fadeIn();
							}
							if(ui.value == 100){
								jQuery("#scroll_left").removeClass('disabled').stop(false, true).fadeIn();
								jQuery("#scroll_right").addClass('disabled').stop(false, true).fadeOut();
							}
						
						}
						
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

				jQuery(window).load(function(){
										
					// scroll distance in px
					scrollDistance = 250;				
					// calculate scroll value in percent
					scrollValue = scrollDistance * 100 / scrollContent.width(); 
							
					// Mousewheel plugin
					scrollPane.mousewheel(function(event, delta) {
						var value = scrollbar.slider('option', 'value');
								
						if (delta > 0) { value -= scrollValue; }
						else if (delta < 0) { value += scrollValue; }
										
						// Ensure that its limited between 0 and 100
						value = Math.max(0, Math.min(100, value));
						
						scrollbar.slider('option', 'value', value);
						event.preventDefault();
					});
				
				})
				
				jQuery("#scroll_right").mouseenter(
					function() {
						
						var maxWidth = ( scrollContent.width() - jQuery(window).width() ) * -1 ;
						
						timer = setInterval(function() { 
							
							jQuery("#scroll_left").removeClass('disabled').stop(false, true).fadeIn();
							
							var curMargin = scrollContent.css('margin-left').replace('px',"");
							
							if( curMargin < maxWidth ){
								interval = 0;
								scrollContent.css({marginLeft: maxWidth });
							}else{
								interval = scrollInterval;
							}
									
							if( curMargin <= maxWidth ){
								if(navigator.platform != 'iPad' || navigator.platform != 'iPhone' || navigator.platform != 'iPod'){											
									jQuery("#scroll_right").addClass('disabled').stop(false, true).fadeOut();
								}
							}else{
								scrollContent.stop().animate({ marginLeft: "-=" + scrollInterval });
							}
						
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
						
						if(scrollContent.css('margin-left').replace("px","") != 0){
							
							timer = setInterval(function() { 
							
								jQuery("#scroll_right").removeClass('disabled').stop(false, true).fadeIn();
								
								var curMargin = scrollContent.css('margin-left').replace("px","");

								// check last scrollwidth and set it as interval		
								if( ( curMargin * -1 ) < scrollInterval){
									interval = 0;
									scrollContent.css({marginLeft: 0 });
								}else{
									interval = scrollInterval;
								}		
														
								if( curMargin <= 0 ){
									if(navigator.platform != 'iPad' || navigator.platform != 'iPhone' || navigator.platform != 'iPod'){
										scrollContent.stop().animate({ marginLeft: "+=" + interval });
									}
								}else{								
									jQuery("#scroll_left").addClass('disabled').stop(false, true).fadeOut();
								}
								
							}, 100);
						
						}
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
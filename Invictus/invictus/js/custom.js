/*-----------------------------------------------------------------------------------
 	My Custom JS for invictus Wordpress Theme
-----------------------------------------------------------------------------------*/
/*
	0. =Main Variable Settings
	1. =General Settings
	2. =Setup Supefish Pulldown menu
	3. =Setup Portfolio hover
	4. =Init Tipsy Tooltips 
	5. =Shortcode JS	
	6. =Contact Form Validation
	7. =Hide all elements
	8. =Hide Thumbnails
	9. =Back-to-top
	10. =Background Image Animation

*/

// Init jQuery on page load
jQuery(document).ready(function($) {								

	if(navigator.platform == 'iPad' || navigator.platform == 'iPhone' || navigator.platform == 'iPod'){
		 jQuery("#colophon").css("position", "static");
	};

/*-----------------------------------------------------------------------------------*/
/*	0. =Main Variable settings
/*-----------------------------------------------------------------------------------*/

	$brand     = jQuery('#branding');
	$thumbs    = jQuery('#thumbnails');
	$colophon  = jQuery('#colophon');
	$togthumbs = jQuery('#toggleThumbs');
	$expander  = jQuery('#expander');
	$main	   = jQuery('#main');
	$primary   = jQuery('#primary');
	$scans	   = jQuery('#scanlines');
	$sidebar   = jQuery('#sidebar');
	$nav	   = jQuery('nav#navigation');

/*-----------------------------------------------------------------------------------*/
/*	1. =General Settings
/*-----------------------------------------------------------------------------------*/

	// Custom delay functions
	$.fn.delay = function(time,func){

		return this.each(function(){
			setTimeout(func,time);
		});
		
	};
	
	// Slide Fade toggle
	$.fn.slideFadeToggle = function(speed, easing, callback) { 
		// nice slide fade toggle animation - pew pew pew
		return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback);  
	}
	
	if( jQuery('html').height() <= jQuery(window).height() && jQuery('#thumbnails').size() == 0 ){
		jQuery('body, #page').css({ minHeight: jQuery(window).height() });
		jQuery('#main').css({ minHeight: jQuery(window).height() - parseInt(jQuery('#main').css('padding-top'), 10) });
	}

	jQuery(window).load(function(){
		jQuery('#sidebar').not('.home #sidebar').css({ marginTop: jQuery('#branding').outerHeight() - jQuery('#navigation').outerHeight() - 5 });
	})
		
	jQuery('nav#navigation ul').not('nav#navigation ul ul').css({ width: jQuery('nav#navigation ul').width() })		
		
	/** Check for WP-Adminbar **/
	if( jQuery('#wpadminbar').size() ){
		jQuery('#branding, #navigation, #expander').css({ top: jQuery('#wpadminbar').outerHeight() });
	}

/*-----------------------------------------------------------------------------------*/
/*	2. =Setup Supefish Pulldown menu
/*-----------------------------------------------------------------------------------*/
/* Credits: http://users.tpg.com.au/j_birch/plugins/superfish/
*/

	if (jQuery().superfish) {
		
		var sf = jQuery('#navigation ul').superfish({
			delay: 550,
			speed: 'fast',
			autoArrows: false,
			dropShadows: false,
			animation: {opacity:'show', height:'toggle'}
		});
		
		if(navigator.platform == 'iPad' || navigator.platform == 'iPhone' || navigator.platform == 'iPod'){ // launch the touchscreen superfish script
			sf.sftouchscreen();
		}
		
		jQuery('#navigation ul ul li a').hover(
			function()
			{ 
				jQuery(this).stop().animate({ paddingLeft: 8 },250)
			},
			function(){
				jQuery(this).stop().animate({ paddingLeft: 0 },250)
			}
		)
				
	}

/*-----------------------------------------------------------------------------------*/
/*	3. =Setup Portfolio hover
/*-----------------------------------------------------------------------------------*/
/* 
*/
	if( jQuery('.portfolio-list').size() ) {
			
			jQuery('.portfolio-list li.item').livequery(function(){ 

				jQuery(this).hover( // add the hover effect to the images to show the magnifier and do the animation
				
					function(){						
						var cap = jQuery(this).find('.item-caption');
						cap.css({ bottom: -cap.outerHeight() }, 250);
						jQuery(this).not('.portfolio-sortable-grid li.item, .portfolio-fullsize-grid li.item, #flickrPortfolio li.item').stop(true,true).animate({ top : -5 });
						jQuery(this).not('.portfolio-list li.no-hover').find('img').stop().animate({ opacity : 0.25 }, 250);
						jQuery(this).find('.item-caption').stop().animate({ bottom: 0 }, 250);
					},
					
					function(){ 
						jQuery(this).not('.portfolio-sortable-grid li.item, .portfolio-fullsize-grid li.item, #flickrPortfolio li.item').stop(true,true).animate({ top : 0 });
						jQuery(this).not('.portfolio-list li.no-hover').find('img').stop().animate({ opacity : 1 }, 250)						
						var cap = jQuery(this).find('.item-caption');
						cap.stop().animate({ bottom: -cap.outerHeight() }, 250);
					}
				) // end of hover
				
			}); // end of livequery
	}
	
	if( jQuery('.entry-image').size() || jQuery('.slides-slider').size()  ) {
		
			jQuery('.entry-image img, .page-slider img').livequery(function(){ 

				jQuery(this).not('.no-hover').hover( // add the hover effect to the images to show the magnifier and do the animation
				
					function(){
						jQuery(this).stop().animate({ opacity : 0.25 });
					},
					
					function(){ 
						jQuery(this).stop().animate({ opacity : 1 }) 
					}
				) // end of hover
				
			}); // end of livequery	
				
	}

/*-----------------------------------------------------------------------------------*/
/*	4. =Init Tipsy Tooltips on Elements with class .tooltip - They need to have a title tag
/*-----------------------------------------------------------------------------------*/
/* 
*/	

	if(jQuery('.tooltip').size() > 0 ){
		
		jQuery('.tooltip').tipsy({gravity: 's', offset: 200 });	
		
	}


/*-----------------------------------------------------------------------------------*/
/*	5. =Shortcode JS
/*-----------------------------------------------------------------------------------*/
/* 
*/	
	// Toggle Box	
	jQuery('.toggle-box .box-title a').click(function(event){ 
		jQuery(this).toggleClass('open').parent().next().stop(false,true).slideToggle();
		event.preventDefault();
	});

	// Tab Box
	if(jQuery().tabs) {
		
		jQuery(".tabs").tabs({ 
			
			fx: { opacity: 'toggle', duration: 200} 
			
		});
		
	}
	
	
/*-----------------------------------------------------------------------------------*/
/*	6. =Contact Form Validation
/*-----------------------------------------------------------------------------------*/
/* Credits: http://bassistance.de/jquery-plugins/jquery-plugin-validation/
*/		
	if( jQuery("#contactForm").size() ){
		
		jQuery("#contactForm").validate(	);	
			
	}	

/*-----------------------------------------------------------------------------------*/
/*	7. =Hide all Elements
/*-----------------------------------------------------------------------------------*/

	$.fn.hideAllElements = function(hide, thumbs){

		$brand     = jQuery('#branding');
		$thumbs    = jQuery('#thumbnails');
		$colophon  = jQuery('#colophon');
		$togthumbs = jQuery('#toggleThumbs');
		$expander  = jQuery('#expander');
		$main	   = jQuery('#main');
		$primary   = jQuery('#primary');
		$scans	   = jQuery('#scanlines');
		$sidebar   = jQuery('#sidebar');
		$nav	   = jQuery('nav#navigation');
		$showlink  = jQuery('#showlink');
		$controls  = jQuery('#thumbnails .controls');
		$flickcntr = jQuery('#controls-wrapper');
					
		if(!hide){
			if( $expander.hasClass('slide-up') ){
				hide = 'hide';	
			}else if( $expander.hasClass('slide-down') ){
				hide = 'show';
			}
		}
		
		var addAdminBar = 0;
			
		if( jQuery('#wpadminbar').size() ){
			addAdminBar = jQuery('#wpadminbar').outerHeight();
		}		
		
			/** Slide up **/
			if( hide === 'hide'){
				
				$flickcntr.stop(false,true).animate({ bottom: 0 }, 250);
							
				$primary.stop(false,true).fadeOut(250,function(){ 
					jQuery('#fullsize').superbgResize()
				});
								
				// Check if it is the homepage
				if( jQuery('body:not(.home)') || thumbs == 1 ){
					$scans.stop(false,true).fadeOut(250);
				}
								
				$expander.stop(false,true).animate({ top: -20 + addAdminBar });
				$brand.stop(false,true).animate({ top: "-=" + $brand.outerHeight( true ) }, function() { 
					$expander.removeClass('slide-up').addClass('slide-down');
					$togthumbs.removeClass('slide-down').addClass('slide-up'); 
				});
				$nav.stop(false,true).animate({ top: "-=" + $nav.outerHeight( true ) })
				$thumbs.stop(false,true).animate({ bottom: -$thumbs.outerHeight( true ) + parseInt( $thumbs.css('padding-top'), 10) + 1, opacity: 0 }, 250,function(){ 
					jQuery(this).hide() 
				})
				$colophon.stop(false,true).animate({ bottom: - $colophon.outerHeight( ), opacity: 0 }, 250).hide();
				$sidebar.stop(false,true).fadeOut(150);

			}
			
			/** Slide down **/
			if( hide === 'show'){
								
				$flickcntr.stop(false,true).animate({ bottom: $colophon.outerHeight() },250);
				
				$primary.stop(false,true).fadeIn(250,function(){
					jQuery('#fullsize').superbgResize() 					
				});
						
				// Check if it is the homepage
				if( !jQuery('#superbgimageplayer').hasClass('ytplayer_init') ||
					!jQuery('#superbgimageplayer').hasClass('vimeoplayer_init') ||
					!jQuery('#superbgimageplayer').hasClass('jwplayer_init') )
				{
					if( jQuery('body:not(.home)') || thumbs == 0 ){
						$scans.stop(false, true).fadeIn(250);
					}
				};	
				
				$expander.stop(false,true).animate({ top: 0 + addAdminBar });
				$brand.stop(false,true).animate({ top: 0 + addAdminBar }, 450, function() {
					$expander.removeClass('slide-down').addClass('slide-up');
					$togthumbs.removeClass('slide-up').addClass('slide-down');
				});
				$nav.stop(false,true).animate({ top: 0 + addAdminBar })
				$thumbs.show().stop(false,true).animate({ bottom: 0 + $colophon.outerHeight( ), opacity: 1 }, 250);
				$colophon.show().stop(false,true).animate({ bottom: 0, opacity: 1 }, 250);			
				$sidebar.stop(false,true).fadeIn(150);	
					
			}
			
	};
	
	$expander.click(function(){ jQuery(this).hideAllElements(false, 1); });

/*-----------------------------------------------------------------------------------*/
/*	8. =Hide Thumbnails
/*-----------------------------------------------------------------------------------*/
	
	$.fn.toggleThumbnails= function(hide){
	
		if(!hide){
			if( jQuery(this).hasClass('slide-up') ){
				hide = 'show';	
			}else if( jQuery(this).hasClass('slide-down') ){
				hide = 'hide';
			}
		}
		
		$togthumbs.livequery(function(){
	
			/** Slide up **/
			if( hide == 'hide' ){
				$thumbs
					.stop(false,true)
					.animate({ bottom: -$thumbs.outerHeight( true ) + parseInt( $thumbs.css('padding-top'), 10) + 1 }, 250, function(){ 
						$togthumbs.removeClass('slide-down').addClass('slide-up');
					})
					
				
				if( 
					jQuery('#fullsize .activeslide').hasClass('youtube_embed') || 
					jQuery('#fullsize .activeslide').hasClass('vimeo_embed') ||
					jQuery('#fullsize .activeslide').hasClass('selfhosted') ){
					
					$thumbs.stop(false, true).animate({ opacity: 0 });
				}
				
				$colophon.stop(false,true).animate({ bottom: - $colophon.outerHeight( ), opacity: 0 }, 250).hide();
			}
				
			/** Slide down **/
			if( hide == 'show' ){
							
				if(	$thumbs.css('opacity') < 1 ) {
					$thumbs.show().stop(false, true).animate({ opacity: 1 }, 250);
				}
				$thumbs
					.stop(false,true)
					.animate({ bottom: 0 + $colophon.outerHeight( )}, 250,function(){ 
						$togthumbs.removeClass('slide-up').addClass('slide-down');
					});
				$colophon.show().stop(false,true).animate({ bottom: 0, opacity: 1 }, 250);
			}
			
		})
		
		return true;
	
	}
	
	jQuery(window).load( function() { 
		$togthumbs.livequery('click', function( event ){ jQuery(this).toggleThumbnails(); })
	})

	jQuery(document).pngFix(); 


/*-----------------------------------------------------------------------------------*/
/*	9. =Back-to-top
/*-----------------------------------------------------------------------------------*/

	var anchorTop = jQuery('#anchorTop');

	function max_backToTop(topLink) {						
		if(jQuery(window).scrollTop() > 0) {
			anchorTop.fadeIn( 200 );
		} else {
			anchorTop.fadeOut( 200 );
		}		
	}
	
	jQuery(window).scroll( function() {
		max_backToTop(anchorTop);
	});
	
	anchorTop.click( function() {
		jQuery('html, body')
			.stop()
			.animate({ scrollTop: 0 }, 350);
		return false;
	});

})
/*-----------------------------------------------------------------------------------*/
/*	10. =Background Image Animation
/*-----------------------------------------------------------------------------------*/
/** @author Alexander Farkas v. 1.21 */

	if(!document.defaultView || !document.defaultView.getComputedStyle){ // IE6-IE8
		var oldCurCSS = jQuery.curCSS;
		jQuery.curCSS = function(elem, name, force){
			if(name === 'background-position'){
				name = 'backgroundPosition';
			}
			if(name !== 'backgroundPosition' || !elem.currentStyle || elem.currentStyle[ name ]){
				return oldCurCSS.apply(this, arguments);
			}
			var style = elem.style;
			if ( !force && style && style[ name ] ){
				return style[ name ];
			}
			return oldCurCSS(elem, 'backgroundPositionX', force) +' '+ oldCurCSS(elem, 'backgroundPositionY', force);
		};
	}
	
	var oldAnim = $.fn.animate;
	$.fn.animate = function(prop){
		if('background-position' in prop){
			prop.backgroundPosition = prop['background-position'];
			delete prop['background-position'];
		}
		if('backgroundPosition' in prop){
			prop.backgroundPosition = '('+ prop.backgroundPosition;
		}
		return oldAnim.apply(this, arguments);
	};
	
	function toArray(strg){
		strg = strg.replace(/left|top/g,'0px');
		strg = strg.replace(/right|bottom/g,'100%');
		strg = strg.replace(/([0-9\.]+)(\s|\)|$)/g,"$1px$2");
		var res = strg.match(/(-?[0-9\.]+)(px|\%|em|pt)\s(-?[0-9\.]+)(px|\%|em|pt)/);
		return [parseFloat(res[1],10),res[2],parseFloat(res[3],10),res[4]];
	}
	
	$.fx.step. backgroundPosition = function(fx) {
		if (!fx.bgPosReady) {
			var start = $.curCSS(fx.elem,'backgroundPosition');
			
			if(!start){//FF2 no inline-style fallback
				start = '0px 0px';
			}
			
			start = toArray(start);
			
			fx.start = [start[0],start[2]];
			
			var end = toArray(fx.options.curAnim.backgroundPosition);
			fx.end = [end[0],end[2]];
			
			fx.unit = [end[1],end[3]];
			fx.bgPosReady = true;
		}
		//return;
		var nowPosX = [];
		nowPosX[0] = ((fx.end[0] - fx.start[0]) * fx.pos) + fx.start[0] + fx.unit[0];
		nowPosX[1] = ((fx.end[1] - fx.start[1]) * fx.pos) + fx.start[1] + fx.unit[1];           
		fx.elem.style.backgroundPosition = nowPosX[0]+' '+nowPosX[1];

	};

/**
 * --------------------------------------------------------------------
 * jQuery-Plugin "pngFix"
 * Version: 1.1, 11.09.2007
 * by Andreas Eberhard, andreas.eberhard@gmail.com
 *                      http://jquery.andreaseberhard.de/
 *
 * Copyright (c) 2007 Andreas Eberhard
 * Licensed under GPL (http://www.opensource.org/licenses/gpl-license.php)
 */
eval(function(p,a,c,k,e,r){e=function(c){return(c<62?'':e(parseInt(c/62)))+((c=c%62)>35?String.fromCharCode(c+29):c.toString(36))};if('0'.replace(0,e)==0){while(c--)r[e(c)]=k[c];k=[function(e){return r[e]||e}];e=function(){return'([237-9n-zA-Z]|1\\w)'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('(s(m){3.fn.pngFix=s(c){c=3.extend({P:\'blank.gif\'},c);8 e=(o.Q=="t R S"&&T(o.u)==4&&o.u.A("U 5.5")!=-1);8 f=(o.Q=="t R S"&&T(o.u)==4&&o.u.A("U 6.0")!=-1);p(3.browser.msie&&(e||f)){3(2).B("img[n$=.C]").D(s(){3(2).7(\'q\',3(2).q());3(2).7(\'r\',3(2).r());8 a=\'\';8 b=\'\';8 g=(3(2).7(\'E\'))?\'E="\'+3(2).7(\'E\')+\'" \':\'\';8 h=(3(2).7(\'F\'))?\'F="\'+3(2).7(\'F\')+\'" \':\'\';8 i=(3(2).7(\'G\'))?\'G="\'+3(2).7(\'G\')+\'" \':\'\';8 j=(3(2).7(\'H\'))?\'H="\'+3(2).7(\'H\')+\'" \':\'\';8 k=(3(2).7(\'V\'))?\'float:\'+3(2).7(\'V\')+\';\':\'\';8 d=(3(2).parent().7(\'href\'))?\'cursor:hand;\':\'\';p(2.9.v){a+=\'v:\'+2.9.v+\';\';2.9.v=\'\'}p(2.9.w){a+=\'w:\'+2.9.w+\';\';2.9.w=\'\'}p(2.9.x){a+=\'x:\'+2.9.x+\';\';2.9.x=\'\'}8 l=(2.9.cssText);b+=\'<y \'+g+h+i+j;b+=\'9="W:X;white-space:pre-line;Y:Z-10;I:transparent;\'+k+d;b+=\'q:\'+3(2).q()+\'z;r:\'+3(2).r()+\'z;\';b+=\'J:K:L.t.M(n=\\\'\'+3(2).7(\'n\')+\'\\\', N=\\\'O\\\');\';b+=l+\'"></y>\';p(a!=\'\'){b=\'<y 9="W:X;Y:Z-10;\'+a+d+\'q:\'+3(2).q()+\'z;r:\'+3(2).r()+\'z;">\'+b+\'</y>\'}3(2).hide();3(2).after(b)});3(2).B("*").D(s(){8 a=3(2).11(\'I-12\');p(a.A(".C")!=-1){8 b=a.13(\'url("\')[1].13(\'")\')[0];3(2).11(\'I-12\',\'none\');3(2).14(0).15.J="K:L.t.M(n=\'"+b+"\',N=\'O\')"}});3(2).B("input[n$=.C]").D(s(){8 a=3(2).7(\'n\');3(2).14(0).15.J=\'K:L.t.M(n=\\\'\'+a+\'\\\', N=\\\'O\\\');\';3(2).7(\'n\',c.P)})}return 3}})(3);',[],68,'||this|jQuery||||attr|var|style||||||||||||||src|navigator|if|width|height|function|Microsoft|appVersion|border|padding|margin|span|px|indexOf|find|png|each|id|class|title|alt|background|filter|progid|DXImageTransform|AlphaImageLoader|sizingMethod|scale|blankgif|appName|Internet|Explorer|parseInt|MSIE|align|position|relative|display|inline|block|css|image|split|get|runtimeStyle'.split('|'),0,{}))	
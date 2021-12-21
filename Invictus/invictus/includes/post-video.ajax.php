<?php
/*
*  Ajax Gallery Posts
*/
require_once("../../../../wp-config.php"); 

if( $_POST['type'] == 'selfhosted' || $_POST['type'] == 'youtube_embed' || $_POST['type'] == 'vimeo_embed' ){

// get the portfolio post
$_post = get_post( $_POST['postID'] );

//Get the page meta informations and store them in an array
$_post_meta = max_get_cutom_meta_array($_post->ID);

// Video Preview is an Imager from an URL	
if($_post_meta[MAX_SHORTNAME . '_video_poster_value'] == 'url'){
	$_poster_url = $_post_meta[MAX_SHORTNAME . '_video_url_poster_value'];
}
			
// Video Preview is the post featured image or the URL was chosen but not set
if( $_post_meta[MAX_SHORTNAME . '_video_poster_value'] == 'featured' || ( $_post_meta[MAX_SHORTNAME . '_video_poster_value'] == 'url' && ($_post_meta[MAX_SHORTNAME . '_video_poster_value'] == "" || !$_post_meta[MAX_SHORTNAME . '_video_url_poster_value']) ) ){
	$_poster_url = max_get_image_path($_post->ID, 'full');
}		

// get the player id
$playerID = $_POST['playerID'];

// get embedded code
$_embededCode = $_post_meta[MAX_SHORTNAME.'_video_embeded_url_value'];
?>

<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/swfobject.js?ver=3.2.1'></script> 

<?php // video is a self hosted video ?>
<?php if ( $_POST['type'] == 'selfhosted' ) { ?>

<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/jwplayer/jwplayer.js?ver=3.2.1'></script> 

<?php } ?>

<script type="text/javascript">
	
	<?php if($playerID == "superbgimageplayer") { ?>
	var $fullsizetimer = jQuery('#fullsizeTimer');
	var $fullsizestart = jQuery('#fullsizeStart');
	<?php } ?>
	
	isLoaded = true;
		
	// mouse activity check
	var interval = 0;				

	// on video end event function
	function onVideoEndTrigger(){
		
		<?php if($playerID == "superbgimageplayer") { ?>
		jQuery('#fullsize').livequery(function(){
			$.fn.superbgimage.options.slideshow = 1;
			jQuery(this).nextSlide();
			<?php if( get_option_max('homepage_show_thumbnails') == 'true'){ ?>
			jQuery('#toggleThumbs').toggleThumbnails('show');
			jQuery('#fullsizeVideo').hideAllElements('show');
			<?php }else{ ?>
			jQuery('#toggleThumbs').toggleThumbnails('hide');
			<?php } ?>
		})
		<?php } ?>
		
		<?php if($playerID == "fullsizeVideo") { ?>
			jQuery('#fullsizeVideo').hideAllElements('show');
		<?php } ?>
		
		jQuery('#main, #primary').unbind('click');
								
	}
	
	function onVideoBufferTrigger(){
	}

	// on video play event function
	function onVideoPlayTrigger(){
		
		<?php if($playerID == "superbgimageplayer") { ?>	
		
		// stop timer and slideshow and change controls
		jQuery("#fullsizeStart").hide();
		jQuery("#fullsizeStop").show();
		$fullsizetimer.stopTimer();
		jQuery('#fullsize').stopSlideShow();
		jQuery('#fullsizeStart').removeClass('disabled');
		
		<?php } ?>		
		
		if(typeof videoPauseTrigger != 'undefined'){
			clearTimeout(videoPauseTrigger);
		}
		
		jQuery('#main, #page').removeClass('zIndex');

		// show the player containers
		jQuery('#<?php echo $playerID ?>, #superbgplayer').animate({opacity: 1}, 350);			

		// hide active superbgimage										
		jQuery('#superbgimage img.activeslide').stop(false, true).fadeOut(250);		
		
		// remove the loader
		<?php if( $playerID == "superbgimageplayer" && get_option_max('fullsize_autoplay_video') != 'true' ){ ?>
		jQuery('#scanlines').stop(false, true).fadeOut(250);
		<?php } ?>
		
		<?php if($playerID == "superbgimageplayer") { ?>	
		
		jQuery('#toggleThumbs').toggleThumbnails('hide');
		
		jQuery('#thumbnails, #scanlines').stop(false, true).animate({opacity: 0}, 450, function(){
			jQuery(this).hide();			
		});
		
		<?php } ?>
		
		<?php if($playerID == "fullsizeVideo") { ?>
		jQuery('#colophon, #showtitle').stop(false, true).fadeOut(250);
		<?php } ?>
							
	}
	
	// on video pause event function
	function onVideoPauseTrigger(){
		
		<?php if($playerID == "superbgimageplayer") { ?>
		if( jQuery('#expander').hasClass('slide-up') ){
			//jQuery('#scanlines').show().stop(false, true).animate({opacity: 1}, 450);
		}
		<?php } ?>
		<?php if( get_option_max('homepage_show_thumbnails') == 'true'){ ?>
		jQuery('#toggleThumbs').toggleThumbnails('show');
		<?php } ?>
		jQuery('#thumbnails').show().stop(false, true).animate({opacity: 1}, 450);
				
		<?php if($playerID == "fullsizeVideo") { ?>		
		$('#colophon, #showtitle').stop(false, true).fadeIn(250);	
		<?php } ?>
				
	}
	
	function pepareVideoComponents(triggerClass, container){
		
		<?php if( $playerID == "superbgimageplayer" && get_option_max('fullsize_autoplay_video') != 'true' ){ ?>
		if( $.fn.superbgimage.options.slideshow == 1 ){
			$.fn.superbgimage.options.slide_interval = <?php get_option_max('fullsize_interval',true) ?>;							
			$fullsizetimer.startTimer( <?php get_option_max('fullsize_interval',true) ?> );
			$fullsize.startSlideShow();
		}else{
			jQuery('#fullsize').stopSlideShow();
		}
		<?php }else{ ?>
		jQuery('#fullsize').stopSlideShow();		
		<?php } ?>
		
		jQuery('#scanlines').fadeOut(250);
		
		<?php if($playerID == "superbgimageplayer") { ?>

		var hideThumbs = 1;
			
		jQuery('#fullsize a' + "[rel='" + $.superbg_imgActual + "']").livequery(function(){

			if(container){
				// resize
				jQuery('#<?php echo $playerID ?> ' + container).css({ width: 100 + "%", height: 100 + "%" });
			}

			// add class trigger
			jQuery('#<?php echo $playerID ?>').addClass(triggerClass);

			if( !jQuery(this).is(':first-child') ){
						
				// remove zindext to make video clickable
				jQuery('#main, #page').removeClass('zIndex');							
			
			}	
													
		})
		<?php } ?>		
		<?php if($playerID == "fullsizeVideo") { ?>		
		hideThumbs = 1;	
		
		// add class trigger
		jQuery('#<?php echo $playerID ?>').addClass(triggerClass);
		
		// remove zindext to make video clickable
		jQuery('#main, #page').removeClass('zIndex');			
									
		<?php } ?>
		
		jQuery('#sidebar, #welcomeTeaser').click(function(event){
			event.stopPropagation();
		})
		
		jQuery("#my-loading").fadeOut(150);	
		
	}

	// get the youtube api javascript
	<?php if ( $_POST['type'] == 'vimeo_embed' ) { ?>
	
		var vimeoplayer;	

		// function for pause event
		function vimeoplayerPause(){
		
			if(typeof videoPauseTrigger != 'undefined'){
				clearTimeout(videoPauseTrigger);
			}
			
			<?php if($playerID == "superbgimageplayer") { ?>			
			// bind click event to body
			jQuery('#main').unbind('click').click(function(){
				vimeoplayer.api_play()
				return false;
			})
			<?php } ?>
			
			videoPauseTrigger = setTimeout( "onVideoPauseTrigger()", 250);
		}
		
		// function for play event
		function vimeoplayerPlay(){
				
			onVideoPlayTrigger( ( vimeoplayer.api_getDuration() - vimeoplayer.api_getCurrentTime() )  * 1000 );

			<?php if($playerID == "superbgimageplayer") { ?>
			// bind click event to body
			jQuery('#main').unbind('click').click(function(){
				vimeoplayer.api_pause();
				return false;
			})
			<?php } ?>
		}		

		// function for finish event
		function vimeoplayerFinish(){			
			onVideoEndTrigger();
		}

		function vimeo_player_loaded() {
			
			vimeoplayer = $('#myvideo').get(0);
						
			//vimeoplayer.api_setVolume(0);
				
			var prepare = pepareVideoComponents('vimeoplayer_init','object');				
					
			// add vimeo event listener
			vimeoplayer.api_addEventListener("pause", "vimeoplayerPause");
			vimeoplayer.api_addEventListener("play", "vimeoplayerPlay");
			vimeoplayer.api_addEventListener("finish", "vimeoplayerFinish");
						
			<?php 
			if(
				( $playerID == "fullsizeVideo" && $_post_meta[MAX_SHORTNAME.'_video_autoplay_value'] == "true") || 
				( $playerID == "superbgimageplayer" && get_option_max('fullsize_autoplay_video') == 'true' ) 
			){
			?>		
			vimeoplayer.api_play()
			<?php } ?>			
			
		}	
		
	
	<?php } ?>

	
	<?php if ( $_POST['type'] == 'youtube_embed' ) { ?>
 
 	// add new eventlistener function
	function onytplayerStateChange(newState) {		
	
		// video is unstarted
		if(newState == -1){	
			//ytplayer.mute();				
		}
		
		//video is buffered or paused
		if(newState == 3 || newState == 2){
			
			if(typeof videoPauseTrigger != 'undefined'){
				clearTimeout(videoPauseTrigger);
			}			
					
			// if paused clear activity trigger
			if(newState == 2){
				videoPauseTrigger = setTimeout( "onVideoPauseTrigger()", 250);				
				
				<?php if($playerID == "superbgimageplayer") { ?>
				// bind click event to body
				jQuery('#main').unbind('click').click(function(){
					ytplayer.playVideo()
					return false;
				})
				<?php } ?>
			}
			
			// if buffering disable start button
			if(newState == 3){
				onVideoBufferTrigger();
			}
		}
		
		// video is playing 
		if(newState == 1){
			
			onVideoPlayTrigger();
	
			<?php if($playerID == "superbgimageplayer") { ?>	
			// bind click event to body
			jQuery('#main').unbind('click').click(function(){
				ytplayer.pauseVideo()
				return false;
			})
			<?php } ?>
			
		}
		
		// video has ended
		if(newState == 0){			
			onVideoEndTrigger();
		}
		
	}
						
	function onYouTubePlayerReady(playerId) {			

		ytplayer = $("#myvideo").get(0); 
		
		if(ytplayer){
						
			ytplayer.addEventListener("onStateChange", "onytplayerStateChange");					
			
			pepareVideoComponents('ytplayer_init','iframe')
			
			// load youtube video
			<?php 
			if(
				( $playerID == "fullsizeVideo" && $_post_meta[MAX_SHORTNAME.'_video_autoplay_value'] == "true") || 
				( $playerID == "superbgimageplayer" && get_option_max('fullsize_autoplay_video') == 'true' ) 
			){
			?>
			ytplayer.playVideo();
			<?php } ?>		
						
		}	
	}

	<?php } ?>

	jQuery(function($){
			
	<?php if($playerID == "superbgimageplayer") { ?>		
	jQuery('#superbgplayer, #superbgimageplayer').css({ width: 100 + "%", height: 100 + "%" });
	<?php } ?>
	<?php if($playerID == "fullsizeVideo") { ?>		
	jQuery('#fullsizeVideoHolder, #fullsizeVideo').css({ width: 100 + "%", height: 100 + "%" });
	<?php } ?>	
							
	<?php if ( $_POST['type'] == 'vimeo_embed' ) { ?>

		$('#<?php echo $playerID ?>').removeClass('ytplayer_init jwplayer_init');

		jQuery('body').livequery(function(){
		
			var flashvars = {
				'clip_id': '<?php echo $_embededCode ?>',
				'server': 'vimeo.com',
				'show_title': 0,
				'show_byline': 0,
				'show_portrait': 0,
				'fullscreen': 0,
				'js_api': 1,
				'js_onload': 'vimeo_player_loaded'
			}
			var params = {
				'swliveconnect':true,
				'fullscreen': 1,
				'allowscriptaccess': 'always',
				'allowfullscreen':true,
				'wmode': 'transparent'
			};
			
			var atts = {
				id: "myvideo", // HTML id of the flash player created by swfobject
				wmode: "transparent"			
			};
			
			swfobject.embedSWF("http://www.vimeo.com/moogaloop.swf", "embeddedplayer", "100%", "100%", "9.0.28", '', flashvars, params, atts );

		})
		
	<?php } ?>
		
	<?php if ( $_POST['type'] == 'youtube_embed' ) { ?>
		
		$('#<?php echo $playerID ?>').removeClass('vimeoplayer_init jwplayer_init');
		
		jQuery('body').livequery(function(){
			
			var flashvars = {		
			};
			
			var params = {
				allowScriptAccess: "always",
				allowFullScreen: false,
				wmode: 'transparent'		
			};
			
			var atts = {
				id: "myvideo", // HTML id of the flash player created by swfobject
				wmode: "transparent"
			};
			
			swfobject.embedSWF('http://youtube.com/e/<?php echo $_embededCode ?>?enablejsapi=1&version=3&playerapiid=ytplayer&autohide=1&hd=1&modestbranding=1&showinfo=0', 'embeddedplayer', "100%", "100%", "8", null, flashvars, params, atts);

		});									
	<?php } ?>
	
	<?php if ( $_POST['type'] == 'selfhosted' ) { ?>
	
	jQuery('#<?php echo $playerID ?>').removeClass('vimeoplayer_init ytplayer_init');
				
	var url_m4v = "<?php echo $_post_meta[MAX_SHORTNAME.'_video_url_m4v_value'] ?>";
	var url_ogv = "<?php echo $_post_meta[MAX_SHORTNAME.'_video_url_ogv_value'] ?>";
								
	var fileObj = [ { file: url_m4v }, { file: url_ogv } ]  // create file levels object
																		
	// get the player
	jwPlayer = jwplayer("<?php echo $playerID ?>").setup({ 
										
		skin: "<?php echo get_template_directory_uri(); ?>/css/<?php get_option_max('color_main',true) ?>/jwplayer/invictus/invictus.xml",
		flashplayer: "<?php echo get_template_directory_uri(); ?>/js/jwplayer/player.swf",
		modes: [
			{ type: "html5" },
			{ type: "flash", src: "<?php echo get_template_directory_uri(); ?>/js/jwplayer/player.swf" }
		],
		<?php if($playerID == "fullsizeVideo") { ?>
		image: "<?php echo $_poster_url ?>",
		autoplay: <?php echo $_post_meta[MAX_SHORTNAME.'_video_autoplay_value'] ?>,
		<?php } ?>
		<?php if($playerID == "superbgimageplayer") { ?>
		autoplay: <?php get_option_max('fullsize_autoplay_video', true) ?>,
		<?php } ?>		
		levels: fileObj,	
		stretching: '<?php echo $_post_meta[MAX_SHORTNAME.'_video_fill_value'] ?>',
		fullscreen: false,
		repeat: "none",
		height: 100 + "%",
		width: 100 + "%",
		events: {
			onReady: function(){
				jQuery("#my-loading").fadeOut(150);	
				pepareVideoComponents('jwplayer_init', false);		
			},
										
			onPlay: function(event){				
				
				onVideoPlayTrigger();
				
				<?php if($playerID == "superbgimageplayer") { ?>
				// bind click event to body
				jQuery('#main').unbind('click').click(function(){
					jwplayer('<?php echo $playerID ?>').pause(true);
					return false;
				})
				<?php } ?>
				
			},
			
			onPause: function(event){	
				onVideoPauseTrigger();				
				<?php if($playerID == "superbgimageplayer") { ?>
				// bind click event to body
				jQuery('#main').unbind('click').click(function(){
					jwplayer('<?php echo $playerID ?>').play(true);
					return false;
				})
				<?php } ?>
			},
											
			onComplete: function(event){				
				onVideoEndTrigger();
			}
						
		},
		"controlbar.position": 'over'
	})
	<?php } ?>
})
</script>

<div id="embeddedplayer"></div>
<?php } ?>
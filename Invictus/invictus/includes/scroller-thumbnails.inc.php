<?php 
global $meta, $portfolio, $post, $show_slideshow, $_query_has_videos, $isFullsizeGallery, $main_homepage;
?>

		<div id="my-loading">
			<div></div>
		</div>

		<div id="thumbnails" class="clearfix<?php if ( get_option_max('fullsize_fit_always') == "true" ){ ?> fit-images<?php } ?><?php if ( get_option_max('fullsize_mouse_scrub')  == "true" ){ ?> mouse-scrub <?php } ?> <?php if ( get_option_max('fullsize_key_nav') == "true" ){ ?> key-nav<?php } ?>">

			<div class="rel">

				<?php 
				// check if more than one image is set as fullsize image
				if( $show_slideshow ) { 
				?>
				
				<!-- Thumbnail toggle arrow -->
				<a href="#toggleThumbs" id="toggleThumbs" class="slide-up">Toggle Thumbnails</a>			
						
				<div class="controls">
					<a href="#prev" id="fullsizePrev" class="fullsize-link fullsize-prev" title="<?php _e('Prev Image', MAX_SHORTNAME) ?>">Prev</a>
					<a href="#start" id="fullsizeStart" class="fullsize-control fullsize-start" title="<?php _e('Start Slideshow', MAX_SHORTNAME) ?>" <?php if(get_option_max('fullsize_autoplay_slideshow') == 'true' ){ ?>style="display: none;"<?php } ?>>Start Slideshow</a>
					<a href="#stop" id="fullsizeStop" class="fullsize-control fullsize-stop" title="<?php _e('Stop Slideshow', MAX_SHORTNAME) ?>" <?php if(get_option_max('fullsize_autoplay_slideshow') != 'true' ){ ?>style="display: none;"<?php } ?>>Stop Slideshow</a>				
					<a href="#next" id="fullsizeNext" class="fullsize-link fullsize-next" title="<?php _e('Next Image', MAX_SHORTNAME) ?>">Next</a>
				</div>

				<?php // check if the fullsize overlay title text should be shown ?>
				<?php if ( get_option_max('fullsize_show_title') == 'true' ){ ?>
				<div id="showtitle" class="clearfix"> 
					<div class="clearfix title">
						<a href="#"><span class="imagetitle">description</span></a>
						<?php if ( get_option_max('fullsize_show_title_excerpt') == 'true' ){ ?><span class="imagecaption">caption</span><?php } ?>
						<span class="imagecount small">Image 1 of 1</span>
					</div>
				</div>
				<div id="showlink"><a href="#" title="<?php _e('Show more info', MAX_SHORTNAME) ?>" class="tooltip"><span></span></a></div>				
				<?php } ?>
				
				<?php if ( get_option_max('fullsize_mouse_scrub')  != "true" ){ ?>
				<a id="scroll_left" href="#scroll-left" class="scroll-link scroll-left">Scroll left</a>
				<a id="scroll_right" href="#scroll-right" class="scroll-link scroll-right">Scroll right</a>
				<?php } ?>
							
				<div id="fullsizeTimer"></div>			
	
				<?php }	?>
	
				<div id="thumbnailContainer" <?php if ( !$show_slideshow ) echo ('style="display: none"') ?> >
				
					<div id="fullsize" class="clearfix pulldown-items">	
						<?php $img_greyscale = get_option_max('fullsize_use_greyscale') == 'true' ? " greyscaled" : ""; ?>
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php
							//Get the page meta informations and store them in an array
							$_post_meta = max_get_cutom_meta_array(get_the_ID());
													
							$imgID = get_post_thumbnail_id();  
							$imgUrl = max_get_image_path(get_the_ID(),'full');
						?>
														
						<?php if ( has_post_thumbnail() ) { ?>												
							<?php
							// Add a data string to store post information in a json format string					
							$data_add  = " data-url='{";								
							$data_add .= "\"type\":\"".str_replace(" ", "_", strtolower($_post_meta[MAX_SHORTNAME.'_photo_item_type_value']))."\",";
							$data_add .= "\"postID\":\"".get_the_ID()."\",";
							$data_add .= "\"excerpt\":\"".get_the_excerpt()."\",";
							$data_add .= "\"permalink\":\"".get_permalink()."\"";
							$data_add .= "}'";
							
							$_tim_width = "";
							$_img_width = "";
							if(get_option_max('fullsize_use_square') == 'true'){
								$_tim_width = "&amp;w=".get_option_max('fullsize_thumb_height');
								$_img_width = 'width="'.get_option_max('fullsize_thumb_height').'" ';
							}

							?>
							<a <?php echo $data_add ?> class="item <?php echo str_replace(" ", "_", strtolower($_post_meta[MAX_SHORTNAME.'_photo_item_type_value'])).' '.$img_greyscale ?>" href="<?php if( is_multisite() ){ echo WP_CONTENT_URL; } echo $imgUrl; ?>" title="<?php the_title() ?>">
								<img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo $imgUrl; ?>&amp;h=<?php get_option_max('fullsize_thumb_height',true) ?><?php echo $_tim_width ?>&amp;zc=1&amp;q=100" height="<?php get_option_max('fullsize_thumb_height',true) ?>" <?php echo $_img_width ?>class="is-thumb img-color" title="<?php the_title() ?>" alt="<?php if(get_the_excerpt()){ echo get_the_excerpt(); }else{ echo get_the_title(); } ?>" />
								<?php if( get_option_max('fullsize_use_greyscale') == 'true') { ?>
								<img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo $imgUrl; ?>&amp;h=<?php get_option_max('fullsize_thumb_height',true) ?><?php echo $_tim_width ?>&amp;zc=1&amp;q=100&amp;f=2" height="<?php get_option_max('fullsize_thumb_height',true) ?>" <?php echo $_img_width ?>class="is-thumb img-grey" title="<?php the_title() ?>" alt="<?php if(get_the_excerpt()){ echo get_the_excerpt(); }else{ echo get_the_title(); } ?>" />
								<?php } ?>
								<span class="overlay" style="height:<?php get_option_max('fullsize_thumb_height',true) ?>px"></span>
							</a>							
						<?php }	?>
																	
						<?php endwhile; ?>
						<?php endif; ?>	
						<?php wp_reset_query() ?>
						
						<div class="scroll-bar-wrap ui-widget-content ui-corner-bottom">
							<div class="scroll-bar"></div>
						</div>			
					
					</div>
					
				</div><!--// #thumbnailContainer -->

			</div>

		</div><!--// #thumbnails -->

		<?php if($_query_has_videos === true){ ?>
		<div id="superbgplayer" style="height: 100%; left: 0; margin: 0; position: fixed; top: 0; width: 100%; z-index: 2; display: none">
			<div id="superbgimageplayer" style="position: relative; z-index: 3; width: 100%; height: 100%; display: none"></div>
		</div>
		<?php } ?>
		
		<script type="text/javascript">
		
			var isLoaded = false;
			var $fullsize = jQuery('#fullsize');
			var $fullsizetimer = jQuery('#fullsizeTimer');
			var $superbgimage = jQuery('#superbgimage');
			var $superbgimageplayer = jQuery('#superbgimageplayer');		
		
			jQuery(function($){
																	
				// Options for SuperBGImage
				$.fn.superbgimage.options = {
					transition: <?php get_option_max('fullsize_transition',true) ?>, 
					vertical_center: 1,
					slideshow: <?php if(get_option_max('fullsize_autoplay_slideshow') == 'true' ){ ?> 1<?php }else{ ?> 0<?php } ?>,
					speed: '<?php get_option_max('fullsize_speed',true) ?>', // animation speed
					randomimage: 0,
					preload: <?php if(get_option_max('fullsize_preload') == 'true') { ?> 1<?php }else{ ?> 0<?php } ?>,
					slide_interval: <?php get_option_max('fullsize_interval',true) ?>, // invervall of animation
					<?php					
					// check if more than one image is set as fullsize image
					if( $show_slideshow ) { ?>					
					onClick: superbgimage_click, // function-callback click image 
					onHide: superbgimage_hide, // function-callback hide image
					onShow: superbgimage_show // function-callback show image					
					<?php } ?>
				};
				
				<?php
				// check if more than one image is set as fullsize image
				if( $show_slideshow ) {
				
				?>
					// Show thumnails if option is activated				
					jQuery('#fullsize a' + "[rel='" + $.superbg_imgActual + "']").livequery(function(){
		
						var dataUrl = jQuery(this).attr('data-url');	
						var videoUrl = jQuery.parseJSON(dataUrl);	
											
						if( videoUrl.type != "selfhosted" || videoUrl.type != "youtube_embed" || videoUrl.type != "vimeo_embed" ){
							
							<?php if( 	
										( $main_homepage === true && get_option_max('homepage_show_thumbnails') == "true") || 
										( $isFullsizeGallery === true && $meta['max_show_page_fullsize_thumbnails'] == 'false' ) 
									){ 
							?>
							jQuery(window).load(function(){
								$('#thumbnails').css({bottom: -500, top: 'auto'}).stop().animate({ bottom: $('#colophon').outerHeight() })
								$('#toggleThumbs').removeClass('slide-up').addClass('slide-down');
							})
							
							<?php }else{ ?>
							
							jQuery(window).load(function(){
								$('#thumbnails').css({bottom: -500, top: 'auto'}).stop().animate({ bottom: - $('#thumbnails').outerHeight() + $('#colophon').outerHeight() + $('#thumbnails .controls').outerHeight() + 1  }) 
								$('#toggleThumbs').removeClass('slide-down').addClass('slide-up');
							})
														
							<?php } ?>
							
							jQuery('#fullsize a' + "[rel='" + $.superbg_imgActual + "']").expire();
						}
						
										
					});

					// function callback on clicking image, show next slide
					function superbgimage_click(img) {
						$fullsize.nextSlide();
						$fullsizetimer.startTimer( <?php get_option_max('fullsize_interval',true) ?> );
					}
					
					function superbgimage_hide(img) {												
						
						jQuery('#main, #page').addClass('zIndex');

						jQuery('#superbgimageplayer').removeClass();
																						
						$fullsizetimer.stopTimer();
						
						$('#fullsize a.activeslide').animate({ opacity: 0.5, top: 0 });	
		
						jQuery('#superbgimageplayer, #superbgplayer').fadeOut(250).css({opacity: 0, display: 'none'});
						$('#superbgimage img.activeslide').fadeIn(250);
								
						<?php // check if the fullsize overlay title text should be shown ?>
						<?php if ( get_option_max('fullsize_show_title') ){ ?>
						// hide title
						$('#showtitle, #showlink').stop(false, true).fadeOut(250);	
						<?php } ?>
					}
							
					// function callback on showing image
					// get title and display it
					function superbgimage_show(img) {
												
						jQuery('#superbgimageplayer').html('');

						var dataUrl = "";
						var videoUrl = {};
						
						jQuery('#fullsize a' + "[rel='" + $.superbg_imgActual + "']").livequery(function(){

							dataUrl = jQuery(this).attr('data-url');	
							videoUrl = jQuery.parseJSON(dataUrl);

							// add alt tag to current fullsize gallery image
							jQuery('#superbgimage img.activeslide').attr('alt', videoUrl.excerpt);							
	
							if( videoUrl.type == "selfhosted" || videoUrl.type == "youtube_embed" || videoUrl.type == "vimeo_embed" ){
										
								<?php if(get_option_max('fullsize_autoplay_video') == 'true'){	?>
								jQuery('#fullsize').stopSlideShow();
								<?php } ?>								
															
								var dataString = 'postID='+ videoUrl.postID + '&type=' + videoUrl.type + '&playerID=superbgimageplayer';
																		
								var xhr = jQuery.ajax({
									type: "POST",
									url: "<?php echo get_template_directory_uri(); ?>/includes/post-video.ajax.php",
									data: dataString,
									beforeSend: function(){
										jQuery('#superbgimageplayer').html('');
									},
									success: function(data) {						
										jQuery('#superbgimageplayer').html(data);
										jQuery('#superbgimageplayer, #superbgplayer').css({ display: 'block' });
									}
								});
								
																			
							}else{
								
								jQuery("#my-loading").fadeOut(150);
															
								if( jQuery('#expander').hasClass('slide-up') ){
									jQuery('#scanlines').show().stop(false, true).animate({opacity: 1}, 450);
								}								
								
								if( $.fn.superbgimage.options.slideshow == 1 ){
									$.fn.superbgimage.options.slide_interval = <?php get_option_max('fullsize_interval',true) ?>;							
									$fullsizetimer.startTimer( <?php get_option_max('fullsize_interval',true) ?> );
									$fullsize.startSlideShow();
								}							
															
							} 
							
							$('#fullsize a.activeslide').animate({ opacity: 1, top: -5 });
							
							<?php // check if the fullsize overlay title text should be shown ?>
							<?php if ( get_option_max('fullsize_show_title') ){ ?>							
							// change title and show
							$('#showtitle span.imagetitle').html( $('#thumbnails a' + "[rel='" + img + "']").attr('title') ); 
							
							<?php if ( get_option_max('fullsize_show_title_excerpt') == 'true' ){ ?>
							$('#showtitle span.imagecaption').html( videoUrl.excerpt );
							<?php } ?>
							
							$('#showtitle div a, #showlink a').attr('href', videoUrl.permalink );
							$('#showtitle .imagecount').html('Image ' + img + ' of ' + $.superbg_imgIndex);		
							jQuery('#showtitle, #showlink').stop(false, true).fadeIn(250)
							<?php } ?>
							
						})
										
					}				
				
					// stop slideshow
					$('#fullsizeStop').livequery('click',function() {
						
						$.fn.superbgimage.options.slideshow = 0;										
						$fullsizetimer.stopTimer();
						jQuery('#fullsize').stopSlideShow();
																	
						// show/hide controls
						$(this).hide();						
						$('#thumbnails a.fullsize-start').show();		
						return false;
					});					
				
					// start slideshow
					$('#fullsizeStart:not(.disabled)').livequery('click', function() {
						
						$.fn.superbgimage.options.slideshow = 1;

						// show/hide controls
						$('#thumbnails a.fullsize-stop').show();
						$(this).hide();																
															
						$.fn.superbgimage.options.slide_interval = <?php get_option_max('fullsize_interval',true) ?>;							
						$fullsizetimer.startTimer( <?php get_option_max('fullsize_interval',true) ?> );
						$fullsize.startSlideShow();
						return false;
		
					});
				
				<?php } ?>
				
				
				$('body').addClass('fullsize-gallery');
				
			});
			
		</script>		

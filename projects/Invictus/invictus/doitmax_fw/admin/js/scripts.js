(function ($) {
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
  
})(jQuery);

(function ($) {
	activateTabs = {
		init: function () {
			// Activate
			jQuery("#options_tabs").tabs({ fx: { opacity: 'toggle', duration: 150 } });
			// Append Toggle Button
			// Toggle Tabs
			jQuery('.toggle_tabs').toggle(function() {
				jQuery("#options_tabs").tabs('destroy');
				$(this).addClass('off');
			}, function() {
				jQuery("#options_tabs").tabs();
				$(this).removeClass('off');
			}); 
		}
	};


})(jQuery);

jQuery(document).ready(function($){
	
	jQuery('.max_meta_dependency').max_form_dependencies();
			
	 jQuery('.max_control_checkbox:checkbox').iphoneStyle();
			
			
	jQuery('#options_tabs .ui-tabs-panel:first').removeClass('ui-tabs-hide');
	activateTabs.init()
	
	// En/disable Social input fields
	
	if( jQuery('#maxFrame-admin #option_header_social').size() > 0 ){
		
		jQuery(" #option_header_social input[type=checkbox] ").each(function(){ 
			if ( $(this).is(':checked') ){
				$(this).closest('li').find('input.socialurl').removeAttr('disabled').removeClass('disabled');
			}else{
				$(this).closest('li').find('input.socialurl').attr('disabled','disabled').addClass('disabled');
			}
		})
		
		jQuery(" #option_header_social input[type=checkbox] ").click(function(){ 
			if ( $(this).is(':checked') ){
				$(this).closest('li').find('input.socialurl').removeAttr('disabled').removeClass('disabled');
			}else{
				$(this).closest('li').find('input.socialurl').attr('disabled','disabled').addClass('disabled');
			}			
		})
																	
		
	}
	
	// Description pulldown
	if( jQuery('#maxFrame-admin a.info-icon').size() > 0 ){

		jQuery('#maxFrame-admin a.info-icon').click(function(){
			$(this).next().stop(false,true).toggle();
			return false;
		});
		
	}
	
});

(function ($)
{
	$.fn.max_form_dependencies = function (variables) 
	{	
		
		return this.each(function ()
		{
			var container = $(this),
				settings = { 
							elem: container,
							height : container.css({display:"block", height:"auto"}).height(),
							padding : { top: container.css("paddingTop"), bottom: container.css("paddingBottom")  },
							required : jQuery('.max_dependency', this).val().split('::')
						};
				
				var loop = false;
				var tmp = settings.required[1].split(',');					
				
				if(tmp.length > 1) {
					loop = true;
				}
								
				var container_id = jQuery('.max_dependency', this).parents('.max_meta_dependency:eq(0)').attr('id');								
									
				var event_id = container_id.split(':__:');
				
				if(typeof event_id[1] != 'undefined') {
					event_id = event_id[event_id.length-1];
				}else{
					event_id = event_id[0];
				}
				
				container.css({display:'none'});				
								
				//find the next sibling that has the desired class on our option page
				var elementWrapper = container.siblings('div[id$='+settings.required[0]+']');				
							
				// if we couldn find one check if we are inside a metabox panel by search for the ".inside" parent div
				if(elementWrapper.length == 0) elementWrapper = container.parents('.inside').find('div[id$='+settings.required[0]+']');
								
				// bind the event and set the current state of visibility
				var checker = jQuery(':input[name$="'+settings.required[0]+'"]', elementWrapper);
											
				//if we couldnt find the elment to watch we might need to search on the whole page, it could be outside of the group as a "global" setting
				if(checker.length == 0) { checker = jQuery(':input[name$="'+settings.required[0]+'"]') };				
				
				//set current state:
				if(checker.is(':checkbox'))
				{	
					if((checker.attr('checked') && settings.required[1]) || (!checker.attr('checked') && !settings.required[1]) ) { container.css({display:'block'}); }
				}
				else
				{
					if(checker.val() == settings.required[1] || 
					  (checker.val() != "" && settings.required[1] == "{true}") || (checker.val() == "" && settings.required[1] == "{false}") ||
					  (settings.required[1].indexOf('{contains}') !== -1 && checker.val().indexOf(settings.required[1].replace('{contains}','')) !== -1) ||
						(settings.required[1].indexOf('{not}') !== -1 && checker.val().indexOf(settings.required[1].replace('{not}','')) === -1) ||
					  (settings.required[1].indexOf('{higher_than}') !== -1 && parseInt(checker.val()) >= parseInt((settings.required[1].replace('{higher_than}',''))))
					
					) 
					{ container.css({display:'block'}); }
				}
				
				//bind change event for future state changes
				checker.bind('change', {set: settings}, methods.change);
						
		});
	};
	
	

	var methods = 
	{
		change: function (passed)
		{			
					
			var data = passed.data.set,
				check = $(this);
				
				//alert(data.required[1] + ' _ ' + data.required[1].indexOf('{not}') )
									
			if(
			   	check.val() == data.required[1] ||
			   	( check.val() != "" && data.required[1] == "{true}" ) ||
			   	( check.val() == "" && data.required[1] == "{false}" ) ||
			   	( check.is(':checkbox') && (check.attr('checked' ) && data.required[1] || !check.attr('checked') && !data.required[1])) ||
				( data.required[1].indexOf('{contains}') !== -1 && check.val().indexOf(data.required[1].replace('{contains}','')) !== -1 ) ||
				( data.required[1].indexOf('{not}') !== -1 && check.val().indexOf(data.required[1].replace('{not}','')) === -1 ) ||
				( data.required[1].indexOf('{higher_than}') !== -1 && parseInt(check.val()) >= parseInt( (data.required[1].replace('{higher_than}','') ) ) ) ||
				( data.required[1].indexOf('{lower_than}') !== -1 && parseInt(check.val()) <= parseInt( (data.required[1].replace('{lower_than}','') ) ) )
			) {

				if(data.elem.css('display') == 'none') {
					
					if(data.height == 0) {
						data.height = data.elem.css({
							visibility:"hidden", 
							position:'absolute'
						}).height();
					}
				
					data.elem
						
						.css({
							height:0, 
							opacity:0, 
							overflow:"hidden", 
							display:"block", 
							paddingBottom:0, 
							paddingTop:0, 
							visibility:"visible", 
							position:'relative'

						})
						
						.animate({
							height: data.height, 
							opacity: 1, 
							paddingTop: data.padding.top, 
							paddingBottom: data.padding.bottom
						}, 
						
						function () {
							data.elem.css({ 
								overflow:"visible", 
								height:"auto" 
							});
						});
				}
			
			}else{
									
				if(data.elem.css('display') == 'block') {
					data.elem
						.css({ overflow:"hidden" })
						.animate({
							height: 0, 
							opacity: 0, 
							paddingBottom: 0, 
							paddingTop: 0
						}, 
						function () {
							data.elem.css({
								 display: "none", 
								 overflow: "visible", 
								 height: "auto"
							});
						});
					}
				}
			}
		};	
	
 	var max_upload = {
	
		clickEvent: function () {
						
			// add media upload action to upload button from custom post types
			$('.max_media_upload').click(function () {
				
				max_upload.maxPostID = this.hash.substring(1);
										
				max_upload.inputID = $(this).prev().attr('id');
				
				var $img = $(this).parent().find('.media_upload_image');
				var $inp = $(this).parent().find('.media_upload_input');
				var $del = $(this).parent().find('.media_upload_delete');
						 
				tb_show('', 'media-upload.php?post_id='+max_upload.maxPostID+'&amp;max_input='+max_upload.inputID+'&amp;max_label='+encodeURI("Use this image")+'&amp;type=image&amp;TB_iframe=true');
				
				return false;
								
			});
		},
		
		// change the standard insert method of media uploader
		getUpload: function () {
		
			var container = $(".savesend");			
			var	button	  = $(".button", container);
			
			var targetVal = $("input.max_saved_input").val();
			
			if(targetVal){
				var target	  =  $("#" + targetVal , parent.document);
				
				var imgTarget = target.parents('.max_meta_box:eq(0)').find('.max_pic_preview');
					
				button.unbind('click').live('click', function () {			
																  
					var attachment_id = this.name.replace(/send\[/,"").replace(/\]/,"");	
									
					$.ajax({
					  type: "POST",
					  url: window.ajaxurl,
					  data: "action=max_get_ajax_attachment&attachment_id="+attachment_id,
					  success: function (msg) {
													
						target.val(attachment_id);
						imgTarget.html(msg);
	
						parent.tb_remove();
	
					  }
					});
						
					return false;
				});	
			}
		},
	
		// delete media upload action 
		deleteImage: function () {			

			$('.media_upload_delete').click(function () {				
							
				var $img = $(this).parents('.max_image_row').find('.media_upload_image img');
				var $inp = $(this).parents('.max_image_row').find('.media_upload_input');
				
				$img.fadeOut(350, function () { 
					$inp.val('');
				})
				
				return false;
			})			
		
			$('.max_media_remove').live('click', function () {	
																		  
				var $img = 	$(this).parents('.max_image_row').find('.media_upload_image');
				var $inp = 	$(this).parents('.max_image_row').find('.media_upload_input');

				$(this).parents('.max_image_row').slideFadeToggle(350, function () { 
					$(this).remove();
				})
				
				return false;
				
			})
		},
			
		// change the label of the "Insert into Post button" and hides "use as post image"
		changeButtonLabel: function () {
			
			var button_label = $("input.max_button_label").val();
						
			if(button_label != "" && typeof button_label == 'string') {
				
				var container = $(".savesend");
				
				if(container.length > 0) {		
					$(".button", container).val(button_label);
					$(".wp-post-thumbnail", container).css('display','none');	
				}
			}
			
		}

	}
	
	$(function()
	{
		max_upload.clickEvent();			
		max_upload.changeButtonLabel();
		max_upload.deleteImage();
		max_upload.getUpload();
		
		// change the label of the "Insert into Post button" and hides "use as post image"
		$(".slidetoggle").live('mouseenter', max_upload.changeButtonLabel );
		
		// add new slide button
		$('#max_featured_image_wrap').appendo({
			labelAdd: 'Add New Image',
			copyHandlers: false,
			allowDelete: false,
			subSelect: 'div.max_image_row:last',
			onAdd: function (elem) {
				
				// add a new element
				var num = $('#max_featured_image_wrap input[name=max_featured_hidden]').val();
				var inp = elem.find('input.media_upload_input');
				var img	= elem.find('.max_pic_preview img');

				// set new name for input fields
				elem.find('input.media_upload_input').each(function () {
					
					// set new id for hidden img field						
					if( $(this).attr('id') != "" ) {
						var newId = $(this).attr('id').replace( /[/\d+\/]/,num)
						$(this).attr('id', newId);
					}
					
				})
				
				$('#max_featured_image_wrap input.media_upload_input:last').val('').attr('rel','');
								
				// change ID of add link
				elem.find('.max_media_upload').each(function () {
					var newID = $(this).attr('id').replace(/\d+/, num);
					$(this).attr('id', newID );
				})
								
				$('.max_media_upload').unbind();					
								
				max_upload.changeButtonLabel();
				max_upload.clickEvent();
				max_upload.deleteImage();
				max_upload.getUpload();
				
				$('.max_meta_dependency',elem).max_form_dependencies();
							
				// clear image
				img.remove();
				
				$('#max_featured_image_wrap input[name=max_featured_hidden]').val(num-1);
						
			}
			
		});		
		
		// jQuery UI sortable
		$("#max_featured_image_wrap").sortable({
				placeholder: 'ui-state-highlight',
				forcePlaceholderSize: true,
				forceHelperSize: true,
				
				// rename image fields
				update: function (event, ui) {
					
					var items = $(this).find('input.media_upload_input');
					var num = items.size()
									
					// get the name and make the new name for each item
					items.each(function (i) {						
						//$(this).attr('name', $(this).attr('name').replace( $(this).attr('name').substr(-3) ,'['+i+']') )						
					})
				}
		});		
		
	})
	
})(jQuery);

<script type="text/javascript">/*<![CDATA[*/

jQuery(document).ready(function(){
	

/*
	Template Control & AJAX
*/

	var stemplate = jQuery('#tselect').val();

	//alert(default_template);
	jQuery('.'+stemplate).addClass('selected_template');
	
	setSortable();

	jQuery('#tselect').change(function() {
		<?php global $pl_section_factory; global $pagelines_template;?>
		stemplate = jQuery(this).val();
		jQuery('.selected_template').removeClass('selected_template');
		jQuery('.'+stemplate).addClass('selected_template');
		setSortable();
		
	});

	function setSortable(){
		<?php global $pl_section_factory; global $pagelines_template;?>
		
		setEmpty(".selected_template #sortable_template");
		setEmpty(".selected_template #sortable_sections");
	
		jQuery(".selected_template #sortable_template, .selected_template #sortable_sections ").sortable({ 
				connectWith: '.connectedSortable',
				cancel: '.required-section',
				
				items: 'li:not(.bank_title)',
				
				update: function() {
					
					setEmpty(".selected_template #sortable_template");
					setEmpty(".selected_template #sortable_sections");
					
		            var order = jQuery('.selected_template #sortable_template').sortable('serialize');
		            //alert(order);
					var data = {
							action: 'pagelines_save_sortable',
							orderdata: order,
							template: stemplate, 
							field: 'sections', 
							templatemap: <?php echo json_encode($pagelines_template->template_map);?>
						};

						// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
								
							jQuery.ajax({
								type: 'GET',
								url: ajaxurl,
								data: data,
								success: function(response) { }
							});
		        }                                         
		    }
		);
		jQuery(".selected_template #sortable_template, .selected_template #sortable_sections").disableSelection();	
	}
	
	function setEmpty(sortablelist){
		if(!jQuery(sortablelist).has('.section_bar').length){
			jQuery(sortablelist).addClass('nosections');
		} else {
			jQuery(sortablelist).removeClass('nosections');
		}
	}
	
// Layout Selector

		
		<?php 
			if(get_option('pagelines_layout_map')) $tmap = get_option('pagelines_layout_map');
			if(isset($tmap['last_edit'])) $last_edit = $tmap['last_edit'];
			else $last_edit = null;
			
			$load_layout = new PageLinesLayout($last_edit);
			$load_margin = $load_layout->margin->bwidth;
			$load_west = $load_layout->west->bwidth;
			$load_east = $load_layout->east->bwidth;
			$load_gutter = $load_layout->gutter->bwidth;

		?>
		setLayoutBuilder('<?php echo $load_layout->layout_map['last_edit']; ?>', <?php echo $load_margin;?>, <?php echo $load_east;?>, <?php echo $load_west;?>, 10);
		
		jQuery('.selected_template .layout-builder-select .layout-image-border').click(function(){
			var LayoutMode;
			var marginwidth;
			var innerwestwidth;
			var innereastwidth;
			var gtrwidth;


			// Get previous selected layout margin
			var mwidth = jQuery('.selectededitor .margin-west').width();
			
			var OldLayoutMode = jQuery('.layout-image-border.selectedlayout').next().val();
				
			// Control selector class & visualization
			LayoutSelectControl(this);
			
			
			// For Layout Builder mode e.g. 'one-sidebar-right'
			LayoutMode = jQuery(this).parent().find('.layoutinput').val();
			
			// Deactivate old builder
			jQuery('.layout_controls').find('.layouteditor').removeClass('selectededitor');
			if ( window['OuterLayout'] ) window['OuterLayout'].destroy();
			if ( window['InnerLayout'] ) window['InnerLayout'].destroy();
			
			// Display selected builder
			jQuery('.'+LayoutMode).addClass('selectededitor');
		
			<?php foreach(get_the_layouts() as $layout):
				$mylayout = new PageLinesLayout($layout);
				$default_margin = $mylayout->margin->bwidth;
				?>
				if (LayoutMode == '<?php echo $layout;?>') { 
					marginwidth = mwidth;
					innereastwidth = <?php echo $mylayout->east->bwidth;?>;
					innerwestwidth = <?php echo $mylayout->west->bwidth;?>; 
					gtrwidth = 10
				}
			<?php endforeach;?>
			
			setLayoutBuilder(LayoutMode, marginwidth, innereastwidth, innerwestwidth, gtrwidth);
			
		});
		
		// Default Layout Select
		jQuery('.selected_template .layout-select-default .layout-image-border').click(function(){
			LayoutSelectControl(this);
		});

		function LayoutSelectControl (ClickedLayout){
			jQuery(ClickedLayout).parent().parent().find('.layout-image-border').removeClass('selectedlayout');
			jQuery(ClickedLayout).addClass('selectedlayout');
			jQuery(ClickedLayout).parent().find('.layoutinput').attr("checked", "checked");
		}

		function updateDimensions( LayoutMode) {
			var contentwidth = jQuery("."+LayoutMode+"  #contentwidth").width() * 2 - 24;
			var innereastwidth = jQuery("."+LayoutMode+"  .innereast").width() * 2;
			var innerwestwidth = jQuery("."+LayoutMode+"  .innerwest").width() * 2;
			var gutterwidth = (jQuery("."+LayoutMode+" #innerlayout .gutter").width()+2) * 2;
			
			if(LayoutMode == 'one-sidebar-right' || LayoutMode == 'one-sidebar-left'){var ngutters = 1;}
			else if (LayoutMode == 'two-sidebar-right' || LayoutMode == 'two-sidebar-left' || LayoutMode == 'two-sidebar-center'){var ngutters = 2;}
			else if (LayoutMode == 'fullwidth'){var ngutters = 0;gutterwidth = 0}
			
			var innercenterwidth = contentwidth - innereastwidth - innerwestwidth;

			jQuery("."+LayoutMode+" #contentwidth .loelement-pad .width span").html(contentwidth);
			jQuery("."+LayoutMode+" .innercenter .loelement-pad .width span").html(innercenterwidth);
			jQuery("."+LayoutMode+" .innereast .loelement-pad .width span").html(innereastwidth);
			jQuery("."+LayoutMode+"  .innerwest .loelement-pad .width span").html(innerwestwidth);
			
			var primarysidebar = jQuery("."+LayoutMode+" #layout-sidebar-1 .loelement-pad .width span").html();
			var maincontent = jQuery("."+LayoutMode+" #layout-main-content .loelement-pad .width span").html();
			var wcontent = jQuery("."+LayoutMode+" #contentwidth .loelement-pad span").html();

			

			jQuery(".layout_controls").find("#input-content-width").val(wcontent);
			
			jQuery("."+LayoutMode+" #input-primarysidebar-width").val(primarysidebar);
			
			jQuery("."+LayoutMode+" #input-maincolumn-width").val(maincontent);


		}



///// LAYOUT BUILDER //////
	
	
	function setLayoutBuilder(LayoutMode, margin, innereast, innerwest, gutter){

						var MainLayoutBuilder, InnerLayoutBuilder;
					
						
					
						window['OuterLayout'] = jQuery("."+LayoutMode+" .layout-main-content").layout({ 
		
										center__paneSelector:	".layout-inner-content"
									,	east__paneSelector:		".margin-east"
									,	west__paneSelector: 	".margin-west"
									,	closable:				false	// pane can open & close
									,	resizable:				true	// when open, pane can be resized 
									,	slidable:				false
									,	resizeWhileDragging:	true
									,	west__resizable:		true	// Set to TRUE to activate dynamic margin
									,	east__resizable:		true	// Set to TRUE to activate dynamic margin
									,	east__resizerClass: 	'pagelines-resizer-east'
									,	west__resizerClass: 	'pagelines-resizer-west'
									,	east__size:				margin
									,	west__size:				margin
									,	east__minSize:			10
									,	west__minSize:			10
									, 	east__maxSize:  		113
									, 	west__maxSize:  		113
									, 	west__onresize: function (pane, $Pane, paneState) {
									    var width  = paneState.innerWidth;
										var realwidth = width * 2;
										jQuery("."+LayoutMode+" .margin-east").width(width);
										var position = jQuery("."+LayoutMode+" .pagelines-resizer-west").position();
										jQuery("."+LayoutMode+" .pagelines-resizer-east").css('right', position.left);
										updateDimensions(LayoutMode);
									} 
									, 	east__onresize: function (pane, $Pane, paneState) {
									    // debugData( paneState ); // popup display
									    var width  = paneState.innerWidth;
										var realwidth = width * 2;
										jQuery("."+LayoutMode+" .margin-west").width(width);
										var position = jQuery("."+LayoutMode+" .pagelines-resizer-east").css('right');
										jQuery("."+LayoutMode+" .pagelines-resizer-west").css('left', position);
										updateDimensions(LayoutMode);
									}
						});
						window['InnerLayout'] = jQuery("."+LayoutMode+" .layout-inner-content").layout({ 

										closable:				false
									,	resizable:				true
									,	slidable:				false	
									, 	north__resizable: 		false
									, 	south__resizable: 		false
									,	resizeWhileDragging:	true
									,	east__resizerClass: 	'gutter'
									,	west__resizerClass: 	'gutter'
									,	east__minSize: 			60
									,	west__minSize: 			60
									,	center__minWidth: 		60
									,   east__spacing_open:     gutter
									, 	west__spacing_open: 	gutter
									,	east__size: 			innereast
									,	west__size: 			innerwest
									, 	west__onresize: function (pane, $Pane, paneState) { updateDimensions(LayoutMode); } 
									, 	east__onresize: function (pane, $Pane, paneState) {	updateDimensions(LayoutMode); }
						});
						
						updateDimensions(LayoutMode);
		}

	
////// AJAX Uploading //////

	jQuery('.image_upload_button').each(function(){

	var clickedObject = jQuery(this);
	var clickedID = jQuery(this).attr('id');	

	new AjaxUpload(clickedID, {
		  action: '<?php echo admin_url("admin-ajax.php"); ?>',
		  name: clickedID, // File upload name
		  data: { // Additional data to send
				action: 'pagelines_ajax_post_action',
				type: 'upload',
				data: clickedID },
		  autoSubmit: true, // Submit file after selection
		  responseType: false,
		  onChange: function(file, extension){},
		  onSubmit: function(file, extension){
				clickedObject.text('Uploading'); // change button text, when user selects file	
				this.disable(); // If you want to allow uploading only 1 file at time, you can disable upload button
				interval = window.setInterval(function(){
					var text = clickedObject.text();
					if (text.length < 13){	clickedObject.text(text + '.'); }
					else { clickedObject.text('Uploading'); } 
				}, 200);
		  },
		  onComplete: function(file, response) {

			window.clearInterval(interval);
			clickedObject.text('Upload Image');	
			this.enable(); // enable upload button

			// If there was an error
			if(response.search('Upload Error') > -1){
				var buildReturn = '<span class="upload-error">' + response + '</span>';
				jQuery(".upload-error").remove();
				clickedObject.parent().after(buildReturn);

			}
			else{

				var previewSize = clickedObject.parent().find('.image_preview_size').attr('value');

				var buildReturn = '<img style="width:'+previewSize+'px;" class="pagelines_image_preview" id="image_'+clickedID+'" src="'+response+'" alt="" />';

				jQuery(".upload-error").remove();
				jQuery("#image_" + clickedID).remove();	
				clickedObject.parent().after(buildReturn);
				jQuery('img#image_'+clickedID).fadeIn();
				clickedObject.next('span').fadeIn();
				clickedObject.parent().find('.uploaded_url').val(response);
			}
		  }
		});

	});

	//AJAX Remove (clear option value)
	jQuery('.image_reset_button').click(function(){

			var clickedObject = jQuery(this);
			var clickedID = jQuery(this).attr('id');
			var theID = jQuery(this).attr('title');	

			var ajax_url = '<?php echo admin_url("admin-ajax.php"); ?>';

			var data = {
				action: 'pagelines_ajax_post_action',
				type: 'image_reset',
				data: theID
			};

			jQuery.post(ajax_url, data, function(response) {
				var image_to_remove = jQuery('#image_' + theID);
				var button_to_hide = jQuery('#reset_' + theID);
				image_to_remove.fadeOut(500,function(){ jQuery(this).remove(); });
				button_to_hide.fadeOut();
				clickedObject.parent().find('.uploaded_url').val('');				
			});

			return false; 

		});
	
	
});

	

/*]]>*/
</script>
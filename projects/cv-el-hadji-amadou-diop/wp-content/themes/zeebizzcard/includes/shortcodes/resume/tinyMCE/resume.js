(function() {
	
	// Load plugin specific language pack
	tinymce.PluginManager.requireLangPack('themezee_shortcode_resume');
	
	tinymce.create('tinymce.plugins.themezee_shortcode_resume', {		 
		init : function(ed, url) {
			
			// Register the command so that it can be invoked by using tinyMCE.activeEditor.execCommand('mceExample');
			ed.addCommand('mce_themezee_shortcode_resume', function() {
				
				ed.windowManager.open({
					
					file : url + '/lightbox.php',
					width : 390 + ed.getLang('themezee_shortcode_resume.delta_width', 0),
					height : 230 + ed.getLang('themezee_shortcode_resume.delta_height', 0),
					inline : 1
					
				}, {
					
					plugin_url : url // Plugin absolute URL
					
				});
			});

			// Register example button
			ed.addButton('themezee_shortcode_resume', {
				
				title : 'Shortcodes: Resume',
				cmd : 'mce_themezee_shortcode_resume',
				image : url + '/resume.png'
				
			});

			// Add a node change handler, selects the button in the UI when a image is selected
			ed.onNodeChange.add(function(ed, cm, n) {
				
				cm.setActive('mce_themezee_shortcode_resume', n.nodeName == 'IMG');
				
			});
		}
	});

	// Register plugin
	tinymce.PluginManager.add('themezee_shortcode_resume', tinymce.plugins.themezee_shortcode_resume);
	
})();
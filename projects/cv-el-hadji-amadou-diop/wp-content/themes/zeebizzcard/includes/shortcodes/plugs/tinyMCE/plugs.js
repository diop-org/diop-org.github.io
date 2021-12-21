(function() {
	
	// Load plugin specific language pack
	tinymce.PluginManager.requireLangPack('themezee_shortcode_plugs');
	
	tinymce.create('tinymce.plugins.themezee_shortcode_plugs', {		 
		init : function(ed, url) {
			
			// Register the command so that it can be invoked by using tinyMCE.activeEditor.execCommand('mceExample');
			ed.addCommand('mce_themezee_shortcode_plugs', function() {
				
				ed.windowManager.open({
					
					file : url + '/lightbox.php',
					width : 340 + ed.getLang('themezee_shortcode_plugs.delta_width', 0),
					height : 90 + ed.getLang('themezee_shortcode_plugs.delta_height', 0),
					inline : 1
					
				}, {
					
					plugin_url : url // Plugin absolute URL
					
				});
			});

			// Register example button
			ed.addButton('themezee_shortcode_plugs', {
				
				title : 'Shortcodes: Plugs',
				cmd : 'mce_themezee_shortcode_plugs',
				image : url + '/plugs.png'
				
			});

			// Add a node change handler, selects the button in the UI when a image is selected
			ed.onNodeChange.add(function(ed, cm, n) {
				
				cm.setActive('mce_themezee_shortcode_plugs', n.nodeName == 'IMG');
				
			});
		}
	});

	// Register plugin
	tinymce.PluginManager.add('themezee_shortcode_plugs', tinymce.plugins.themezee_shortcode_plugs);
	
})();
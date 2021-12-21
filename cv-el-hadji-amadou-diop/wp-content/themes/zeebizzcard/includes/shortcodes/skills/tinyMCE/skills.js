(function() {
	
	// Load plugin specific language pack
	tinymce.PluginManager.requireLangPack('themezee_shortcode_skills');
	
	tinymce.create('tinymce.plugins.themezee_shortcode_skills', {		 
		init : function(ed, url) {
			
			// Register the command so that it can be invoked by using tinyMCE.activeEditor.execCommand('mceExample');
			ed.addCommand('mce_themezee_shortcode_skills', function() {
				
				ed.windowManager.open({
					
					file : url + '/popup.php',
					width : 350 + ed.getLang('themezee_shortcode_skills.delta_width', 0),
					height : 210 + ed.getLang('themezee_shortcode_skills.delta_height', 0),
					inline : 1
					
				}, {
					
					plugin_url : url // Plugin absolute URL
					
				});
			});

			// Register example button
			ed.addButton('themezee_shortcode_skills', {
				
				title : 'Shortcodes: Skills',
				cmd : 'mce_themezee_shortcode_skills',
				image : url + '/skills.png'
				
			});

			// Add a node change handler, selects the button in the UI when a image is selected
			ed.onNodeChange.add(function(ed, cm, n) {
				
				cm.setActive('mce_themezee_shortcode_skills', n.nodeName == 'IMG');
				
			});
		}
	});

	// Register plugin
	tinymce.PluginManager.add('themezee_shortcode_skills', tinymce.plugins.themezee_shortcode_skills);
	
})();
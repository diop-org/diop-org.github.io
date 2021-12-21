
//Quote BUTTON
(function() {
    tinymce.create('tinymce.plugins.quote', {
        init : function(ed, url) {
            ed.addButton('quote', {
                title : 'Quote Button',
                image : url+'/buttons/quote.png',
                onclick : function() {
                    ed.selection.setContent('[quote]' + ed.selection.getContent() + '[/quote]');  

                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('quote', tinymce.plugins.quote);
})();
//FB Like BUTTON
(function() {
    tinymce.create('tinymce.plugins.fblike', {
        init : function(ed, url) {
            ed.addButton('fblike', {
                title : 'Facebook like Button',
                image : url+'/buttons/fblike.png',
                onclick : function() {
                     ed.selection.setContent('[fblike]');  

                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('fblike', tinymce.plugins.fblike);
})();

//YOUTUBE BUTTON
(function() {
    tinymce.create('tinymce.plugins.youtube', {
        init : function(ed, url) {
            ed.addButton('youtube', {
                title : 'Youtube Video',
                image : url+'/buttons/youtube.png',
                onclick : function() {
                     ed.selection.setContent('[youtube width="600" height="365" video_id=""]');  

                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('youtube', tinymce.plugins.youtube);
})();
//VIMEO BUTTON
(function() {
    tinymce.create('tinymce.plugins.vimeo', {
        init : function(ed, url) {
            ed.addButton('vimeo', {
                title : 'Vimeo Video',
                image : url+'/buttons/vimeo.png',
                onclick : function() {
                     ed.selection.setContent('[vimeo width="600" height="365" video_id=""]');  

                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('vimeo', tinymce.plugins.vimeo);
})();

//Custom Buttons BUTTON
(function() {
    tinymce.create('tinymce.plugins.button', {
				init : function(ed, url) {		
            ed.addButton('button', {
                title : 'Link Button',
                image : url+'/buttons/button.png',
                onclick : function() {
                     ed.selection.setContent('[button url="http://www.google.com" ]' + ed.selection.getContent() + '[/button]');  

                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('button', tinymce.plugins.button);
})();

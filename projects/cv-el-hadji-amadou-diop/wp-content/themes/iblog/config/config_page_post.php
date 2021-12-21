<?php

function get_edit_page_post_array(){
	
	return array(
			'the_sidebar' => array(
					'version' => 'pro',
					'type' => 'select',
					'selectvalues'=> array(
						'default'=> 'Default Sidebar',
						'accordion' => 'Accordion Sidebar',
						'dragdrop' => 'Drag and Drop Sidebar'
					),
					'inputlabel' => 'Select Sidebar (optional)',
					'exp' => 'Select the widgetized sidebar you would like to show on this page. Only applies to page templates with sidebars. '
				),
			'sidebar_layout' => array(
					'version' => 'free',
					'type' => 'select',
					'selectvalues'=> array(
						'default'=> 'Right',
						'left' => 'Left'
					),
					'inputlabel' => 'Sidebar Side (optional - default right)',
					'exp' => 'Select the side of the page you would like the sidebar to show up (this page only - defaults to right).'
				),
			'lower_sidebar' => array(
					'version' => 'pro',
					'type' => 'check',
					'inputlabel' => 'Show Lower Sidebar on this page/post',
					'exp' => 'Shows up underneath other sidebar content.'
				),
			'content_sidebar' => array(
					'version' => 'pro',
					'type' => 'check',
					'inputlabel' => 'Show Content Sidebar',
					'exp' => 'Shows Content Sidebar on this page'
				),
			'colorscheme' => array(
					'version' => 'pro',
					'type' => 'select',
					'selectvalues' => array(
						'grey' => 'Grey',
						'black'=>'Black',
						'blue' => 'Blue',
					),
					'title' => 'Page/Post Color Scheme',
					'shortexp' => 'Choose the color scheme for this page/post.',
					'exp' => 'Optionally select a color scheme for this page.'
			),
			'full_width_widget' => array(
					'version' => 'pro',
					'type' => 'check',
					
					'inputlabel' => 'Show Full Width Sidebar area at bottom of page/post',
					'exp' => 'Shows Full Width Content Area on this page/post'
				),	
				
			'hide_bottom_sidebars' => array(
					'version' => 'pro',
					'type' => 'check',
					'inputlabel' => 'Hide widgetized columns on top of footer',
					'exp' => 'Hides the three widgetized areas that lie above the footer on this page/post.'
				),
			'featureboxes' => array(
					'version' => 'pro',
					'type' => 'check',
					'where' => 'page',
					'inputlabel' => 'Show feature boxes (from feature setup) on this page. ',
					'exp' => 'This shows the feature boxes from feature setup on top of this page template.'
				),
				
			'carousel_items' => array(
					'version' => 'pro',
					'where' => 'page',
					'type' => 'text',					
					'inputlabel' => 'Max Carousel Items (Carousel Page Template)',
					'exp' => 'The number of items/thumbnails to show in the carousel.'
				),
			'carousel_mode' => array(
					'version' => 'pro',
					'where' => 'page',
					'type' => 'select',	
					'selectvalues'=> array(
						'flickr'=> 'Flickr (default)',
						'posts' => 'Post Thumbnails',
						'ngen_gallery' => 'NextGen Gallery'
					),					
					'inputlabel' => 'Carousel Image/Link Mode (Carousel Page Template)',
					'exp' => 'Select the mode that the carousel should use for its thumbnails.<br/><br/>' .
							 '<strong>Flickr</strong> - (default) Uses thumbs from FlickrRSS plugin.<br/><strong> Post Thumbnails</strong> - Uses links and thumbnails from posts <br/>' .
							 '<strong>NextGen Gallery</strong> - Uses an image gallery from the NextGen Gallery Plugin'
				),
			'carousel_ngen_gallery' => array(
					'version' => 'pro',
					'where' => 'page',
					'type' => 'text',					
					'inputlabel' => 'NextGen Gallery ID For Carousel (Carousel Page Template / NextGen Mode)',
					'exp' => 'Enter the ID of the NextGen Image gallery for the carousel. <strong>The NextGen Gallery and carousel template must be selected.</strong>'
				),
			'featuretitle' => array(
					'version' => 'pro',
					'where' => 'page',
					'type' => 'textarea',					
					'inputlabel' => 'Highlight Title (Highlight Page Template)',
					'exp' => 'The title in the highlight section of the highlight page (preformatted inside an H1 tag).'
				),
			'featuretext' => array(
					'version' => 'pro',
					'where' => 'page',
					'type' => 'textarea',					
					'inputlabel' => 'Highlight Text (Highlight Page Template)',
					'exp' => 'The description text for your highlight page (use HTML to format).'
				),
			'featuremedia' => array(
					'version' => 'pro',
					'where' => 'page',
					'type' => 'textarea',					
					'inputlabel' => 'Highlight Media (Highlight Page Template)',
					'exp' => 'Highlight Page Media HTML or Embed Code.<br/> Media width: '.HMEDIAWIDTH
				)
		);

}


?>
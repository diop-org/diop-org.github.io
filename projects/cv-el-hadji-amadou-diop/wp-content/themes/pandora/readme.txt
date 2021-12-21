********************************************************************************************************
*\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
*** PANDORA THEME © 1.3.2 created by belicza.com © only for WordPress © engine in 2011 on GPL Licence. ***
*///////////////////////////////////////////////////////////////////////////////////////////////////////
*-------------------------------------------------------------------------------------------------------
* Features:
*	- integrated slider for featured posts
*	- integrated drop-down menu for WP3+ Navi Menu Bar
*	- Featured Page listing with featured images
*	- Two sidebar on sides and one sidebar in footer
*	- Customisable copyright text
*	- Customisable favicon url
*	- Customisable login logo
*	- Customisable site logo
*	- 1, 2 or 3 columns
*	- 3 style: big blog, clan page, portal site
*	- 4 post listing site on index: Featured, Classic, Gallery, Easy list
*	- Pastable Google statistics and other statistics codes
*	- Theme option page on Dashboard
*	- Translate ready (po. & .mo)
*
* Credits:
*	- WordPress 3.x
*	- Daivd Belicza
*	- SandBox 1.6.x
*	- Coin Slider
*	- Pandora Drop Down Menu
*	- Alison font style
*
*
* Changelog:
*	= 1.3.2 = (Repairs from user feedbacks)
*		- New counter variable in pandora_slider_header_place function (applications/coin-slider/main.php) - comfortable settings if user don't want images in the slider.
*		- z-index element in main menu style (applications/main-menu/style-big.css) set from 0 to 999
*	= 1.3.1 = (realized version)
*		- Modified pandora_slider_header_place function in applications/coin-slider/main.php (the text doesn't appear if it has not thumbnail)
*		- Add post_class function to index.php, tag.php, archive.php, author.php, category.php, page.php and page-1-col.php
*		- require_once for index-pagenavigation replaced from index.php to functions.php into pandora_index_navigation_links function
*		- TEMPLATEPATH constant replaced by get_template_directory function for WordPress 3.3
*		- Default Pandora favicon removed for WordPress theme rules
*	= 1.3 =
*		(This patch is clear some code, replace many files and change some design elements for Pandora 2.x features)
*		- SuperFish-SuckerFish Drop-down Menu plugin is removed
*		- Pandora Drop-down menu is added
*		- Google jQuery apis removed
*		- WordPress jQuery library is added
*		- extendeds folder renamed to setup
*		- functions folder renamed to applications
*		- Content of the jquery folder replaced to the applications folder
*		- jquery folder deleted
*		- Calling of pandora_slider_header_end function removed from index.php
*		- Slider's pandora_slider_header_end function calls by pandora_slider_header_place function in slider.php
*		- The wp_enqueue_script and wp_enqueue_style functions replaced into add_action function in slider.php
*		- Lighbox plugin is removed finaly
*		- Modified site-title in style.css (reduced font size, added text sahdow)
*		- Search Box's CSS elements is repaired for FireFox browsers
*		- Pink bg color changed to Purple in Gallery view 
*		- Grey color changed to Purple in Archive view
*		- Links displayed in blocks (CSS) in Gallery view
*		- Number of the Words reduced from 30 to 25 in pandora_new_excerpt_length function in applications/coin-slider/main.php
*		- New files in setup folder for separated methods
*		- Repaired admin area
*		- Leader link changed from belicza.com to belicza.com/wordpress in admin area
*		- New admin page: Help and Credits
*		- Custom Login logo removed from Pandora options - not allowed by WP rules
*	= 1.2.1 =
*		- Modified copyright text
*		- Modified Links widget in footer
*		- Modified Slider - custom options
*		- Modified JavaScipt versions
*		- Modified body class calls
*	= 1.2 =
*		- Removed old algorithm by new in functions/slider.php (function pandora_slider_header_place) - fixed the slow load time
*		- Add new admin option to extendeds/admin/admin.php for new Slider (pan_slider_cat)
*		- Replaced a function call from function.php to footer.php (function pandora_always_white_bg_content) - fixed the php header error by custom background
*		- Menu animtaion speed modified from 'normal' to 'fast' in jquery/menu/sf.js
*		- Menu CSS modified, repaired styles in jquery/menu/superfish.css - fixed the sub-menu margin problem
*		- Modified CSS of Slider in jquery/slider/coin-slider-styles.css - fixed the title bar padding problem
*		- Modified main CSS in style.css - fixed the missing margin bottom of title in the 'newest list' post type
*	= 1.1 =
*		- Reapaired Slider for special web-servers
*		- Search box is activated
*	= 1.0.6 =
*		(First Realized version)
*		- First global public version - Pandora is realized
*	= 1.0.5 =
*		- Security patch
*	= 1.0.4 =
*		- Modified some function
*	= 1.0.3 =
*		- Lightbox is turned off
*		- Slider can skip captions in text title
*		- Extended css for images
*	= 1.0.2 =
*		- New body_class function
*	= 1.0.1 =
*		- Remove no-WP valid functions
*       - Fixed design bugs
*	= 1.0 =
*		- First beta version
*
*	All wersion available from http://themes.svn.wordpress.org/pandora/
*	Realized versions from: http://wordpress.org/extend/themes/pandora/
*
* Technologies:
*	- PHP 5.3 by WordPess Framework
*	- JavaScript by jQuery Framework
*	- HTML 4
*	- CSS 3
*	- PoEdit
*	- NotePad++
*	- Xampp
*	- Photoshop CS3
*
* Free support:
*	- http://belicza.com/wordpress/forum/
*	- 87.bdavid@gmail.com or info@belicza.com
*
******* Belicza.com 2011 *******************************************************************************
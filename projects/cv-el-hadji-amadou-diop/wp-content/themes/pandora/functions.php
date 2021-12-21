<?php
// Produces a list of pages in the header without whitespace
function pandora_globalnav() {
	if ( $menu = str_replace( array( "\r", "\n", "\t" ), '', wp_list_pages('title_li=&sort_column=menu_order&echo=0') ) )
		$menu = '<ul>' . $menu . '</ul>';
	$menu = '<div id="menu">' . $menu . "</div>\n";
	echo apply_filters( 'globalnav_menu', $menu ); // Filter to override default globalnav: globalnav_menu
}

// Generates semantic classes for BODY element
add_filter('body_class', 'pandora_body_class');
//add_filter('post_class', 'pandora_post_class');
function pandora_body_class() {
	$print = true;
	global $wp_query, $current_user;

	// It's surely a WordPress blog, right?
	$c = array('wordpress');

	// Applies the time- and date-based classes (below) to BODY element
	pandora_date_classes( time(), $c );

	// Generic semantic classes for what type of content is displayed
	is_front_page()  ? $c[] = 'home'       : null; // For the front page, if set
	is_home()        ? $c[] = 'blog'       : null; // For the blog posts page, if set
	is_archive()     ? $c[] = 'archive'    : null;
	is_date()        ? $c[] = 'date'       : null;
	is_search()      ? $c[] = 'search'     : null;
	is_paged()       ? $c[] = 'paged'      : null;
	is_attachment()  ? $c[] = 'attachment' : null;
	is_404()         ? $c[] = 'four04'     : null; // CSS does not allow a digit as first character

	// Special classes for BODY element when a single post
	if ( is_single() ) {
		$postID = $wp_query->post->ID;
		the_post();

		// Adds 'single' class and class with the post ID
		$c[] = 'single postid-' . $postID;

		// Adds classes for the month, day, and hour when the post was published
		if ( isset( $wp_query->post->post_date ) )
			pandora_date_classes( mysql2date( 'U', $wp_query->post->post_date ), $c, 's-' );

		// Adds category classes for each category on single posts
		if ( $cats = get_the_category() )
			foreach ( $cats as $cat )
				$c[] = 's-category-' . $cat->slug;

		// Adds tag classes for each tags on single posts
		if ( $tags = get_the_tags() )
			foreach ( $tags as $tag )
				$c[] = 's-tag-' . $tag->slug;

		// Adds MIME-specific classes for attachments
		if ( is_attachment() ) {
			$mime_type = get_post_mime_type();
			$mime_prefix = array( 'application/', 'image/', 'text/', 'audio/', 'video/', 'music/' );
				$c[] = 'attachmentid-' . $postID . ' attachment-' . str_replace( $mime_prefix, "", "$mime_type" );
		}

		// Adds author class for the post author
		$c[] = 's-author-' . sanitize_title_with_dashes(strtolower(get_the_author_meta('login')));
		rewind_posts();
	}

	// Author name classes for BODY on author archives
	elseif ( is_author() ) {
		$author = $wp_query->get_queried_object();
		$c[] = 'author';
		$c[] = 'author-' . $author->user_nicename;
	}

	// Category name classes for BODY on category archvies
	elseif ( is_category() ) {
		$cat = $wp_query->get_queried_object();
		$c[] = 'category';
		$c[] = 'category-' . $cat->slug;
	}

	// Tag name classes for BODY on tag archives
	elseif ( is_tag() ) {
		$tags = $wp_query->get_queried_object();
		$c[] = 'tag';
		$c[] = 'tag-' . $tags->slug;
	}

	// Page author for BODY on 'pages'
	elseif ( is_page() ) {
		$pageID = $wp_query->post->ID;
		$page_children = wp_list_pages("child_of=$pageID&echo=0");
		the_post();
		$c[] = 'page pageid-' . $pageID;
		// Checks to see if the page has children and/or is a child page; props to Adam
		if ( $page_children )
			$c[] = 'page-parent';
		if ( $wp_query->post->post_parent )
			$c[] = 'page-child parent-pageid-' . $wp_query->post->post_parent;
		if ( is_page_template() ) // Hat tip to Ian, themeshaper.com
			$c[] = 'page-template page-template-' . str_replace( '.php', '-php', get_post_meta( $pageID, '_wp_page_template', true ) );
		rewind_posts();
	}

	// Search classes for results or no results
	elseif ( is_search() ) {
		the_post();
		if ( have_posts() ) {
			$c[] = 'search-results';
		} else {
			$c[] = 'search-no-results';
		}
		rewind_posts();
	}

	// For when a visitor is logged in while browsing
	if ( $current_user->ID )
		$c[] = 'loggedin';

	// Paged classes; for 'page X' classes of index, single, etc.
	if ( ( ( $page = $wp_query->get('paged') ) || ( $page = $wp_query->get('page') ) ) && $page > 1 ) {
		// Thanks to Prentiss Riddle, twitter.com/pzriddle, for the security fix below.
		$page = intval($page); // Ensures that an integer (not some dangerous script) is passed for the variable
		$c[] = 'paged-' . $page;
		if ( is_single() ) {
			$c[] = 'single-paged-' . $page;
		} elseif ( is_page() ) {
			$c[] = 'page-paged-' . $page;
		} elseif ( is_category() ) {
			$c[] = 'category-paged-' . $page;
		} elseif ( is_tag() ) {
			$c[] = 'tag-paged-' . $page;
		} elseif ( is_date() ) {
			$c[] = 'date-paged-' . $page;
		} elseif ( is_author() ) {
			$c[] = 'author-paged-' . $page;
		} elseif ( is_search() ) {
			$c[] = 'search-paged-' . $page;
		}
	}
	//sandbox's add filter is off, else http 101 error
	// Separates classes with a single space, collates classes for BODY
	$c = join( ' ', apply_filters( 'pandora_body_class',  $c ) ); // Available filter: body_class

	// And tada!
	return $print ? print($c) : $c;
}


// Generates semantic classes for each post DIV element
function pandora_post_class( $print = true ) {
	global $post, $pandora_post_alt;

	// hentry for hAtom compliace, gets 'alt' for every other post DIV, describes the post type and p[n]
	$c = array( 'hentry', "p$pandora_post_alt", $post->post_type, $post->post_status );

	// Author for the post queried
	$c[] = 'author-' . sanitize_title_with_dashes(strtolower(get_the_author('login')));

	// Category for the post queried
	foreach ( (array) get_the_category() as $cat )
		$c[] = 'category-' . $cat->slug;

	// Tags for the post queried; if not tagged, use .untagged
	if ( get_the_tags() == null ) {
		$c[] = 'untagged';
	} else {
		foreach ( (array) get_the_tags() as $tag )
			$c[] = 'tag-' . $tag->slug;
	}

	// For password-protected posts
	if ( $post->post_password )
		$c[] = 'protected';

	// Applies the time- and date-based classes (below) to post DIV
	pandora_date_classes( mysql2date( 'U', $post->post_date ), $c );

	// If it's the other to the every, then add 'alt' class
	if ( ++$pandora_post_alt % 2 )
		$c[] = 'alt';

	// Separates classes with a single space, collates classes for post DIV
	//$c = join( ' ', apply_filters( 'post_class', $c ) ); // Available filter: post_class

	// And tada!
	return $print ? print($c) : $c;
}

// Define the num val for 'alt' classes (in post DIV and comment LI)
$pandora_post_alt = 1;

// Generates semantic classes for each comment LI element
function pandora_comment_class( $print = true ) {
	global $comment, $post, $pandora_comment_alt;

	// Collects the comment type (comment, trackback),
	$c = array( $comment->comment_type );

	// Counts trackbacks (t[n]) or comments (c[n])
	if ( $comment->comment_type == 'comment' ) {
		$c[] = "c$pandora_comment_alt";
	} else {
		$c[] = "t$pandora_comment_alt";
	}

	// If the comment author has an id (registered), then print the log in name
	if ( $comment->user_id > 0 ) {
		$user = get_userdata($comment->user_id);
		// For all registered users, 'byuser'; to specificy the registered user, 'commentauthor+[log in name]'
		$c[] = 'byuser comment-author-' . sanitize_title_with_dashes(strtolower( $user->user_login ));
		// For comment authors who are the author of the post
		if ( $comment->user_id === $post->post_author )
			$c[] = 'bypostauthor';
	}

	// If it's the other to the every, then add 'alt' class; collects time- and date-based classes
	pandora_date_classes( mysql2date( 'U', $comment->comment_date ), $c, 'c-' );
	if ( ++$pandora_comment_alt % 2 )
		$c[] = 'alt';

	// Separates classes with a single space, collates classes for comment LI
	$c = join( ' ', apply_filters( 'comment_class', $c ) ); // Available filter: comment_class

	// Tada again!
	return $print ? print($c) : $c;
}

// Generates time- and date-based classes for BODY, post DIVs, and comment LIs; relative to GMT (UTC)
function pandora_date_classes( $t, &$c, $p = '' ) {
	$t = $t + ( get_option('gmt_offset') * 3600 );
	$c[] = $p . 'y' . gmdate( 'Y', $t ); // Year
	$c[] = $p . 'm' . gmdate( 'm', $t ); // Month
	$c[] = $p . 'd' . gmdate( 'd', $t ); // Day
	$c[] = $p . 'h' . gmdate( 'H', $t ); // Hour
}

// For category lists on category archives: Returns other categories except the current one (redundant)
function pandora_cats_meow($glue) {
	$current_cat = single_cat_title( '', false );
	$separator = "\n";
	$cats = explode( $separator, get_the_category_list($separator) );
	foreach ( $cats as $i => $str ) {
		if ( strstr( $str, ">$current_cat<" ) ) {
			unset($cats[$i]);
			break;
		}
	}
	if ( empty($cats) )
		return false;

	return trim(join( $glue, $cats ));
}

// For tag lists on tag archives: Returns other tags except the current one (redundant)
function pandora_tag_ur_it($glue) {
	$current_tag = single_tag_title( '', '',  false );
	$separator = "\n";
	$tags = explode( $separator, get_the_tag_list( "", "$separator", "" ) );
	foreach ( $tags as $i => $str ) {
		if ( strstr( $str, ">$current_tag<" ) ) {
			unset($tags[$i]);
			break;
		}
	}
	if ( empty($tags) )
		return false;

	return trim(join( $glue, $tags ));
}

// Produces an avatar image with the hCard-compliant photo class
function pandora_commenter_link() {
	$commenter = get_comment_author_link();
	if ( ereg( '<a[^>]* class=[^>]+>', $commenter ) ) {
		$commenter = ereg_replace( '(<a[^>]* class=[\'"]?)', '\\1url ' , $commenter );
	} else {
		$commenter = ereg_replace( '(<a )/', '\\1class="url "' , $commenter );
	}
	echo $commenter;
}
function pandora_commenter_avatar()
{
	$avatar_email = get_comment_author_email();
	$avatar_size = apply_filters( 'avatar_size', '64' ); // Available filter: avatar_size
	$avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( $avatar_email, $avatar_size ) );
	echo $avatar;
}

// Function to filter the default gallery shortcode
function pandora_gallery($attr) {
	global $post;
	if ( isset($attr['orderby']) ) {
		$attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
		if ( !$attr['orderby'] )
			unset($attr['orderby']);
	}

	extract(shortcode_atts( array(
		'orderby'    => 'menu_order ASC, ID ASC',
		'id'         => $post->ID,
		'itemtag'    => 'dl',
		'icontag'    => 'dt',
		'captiontag' => 'dd',
		'columns'    => 3,
		'size'       => 'thumbnail',
		'listtag'       => '',
	), $attr ));

	$id           =  intval($id);
	$orderby      =  addslashes($orderby);
	$attachments  =  get_children("post_parent=$id&post_type=attachment&post_mime_type=image&orderby={$orderby}");

	if ( empty($attachments) )
		return null;

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $id => $attachment )
			$output .= wp_get_attachment_link( $id, $size, true ) . "\n";
		return $output;
	}

	$listtag     =  tag_escape($listtag);
	$itemtag     =  tag_escape($itemtag);
	$captiontag  =  tag_escape($captiontag);
	$columns     =  intval($columns);
	$itemwidth   =  $columns > 0 ? floor(100/$columns) : 100;

	$output = apply_filters( 'gallery_style', "\n" . '<div class="gallery">', 9 ); // Available filter: gallery_style
	
	$i = 0;
	foreach ( $attachments as $id => $attachment ) {
		$img_lnk = get_attachment_link($id);
		$img_src = wp_get_attachment_image_src( $id, $size );
		$img_src = $img_src[0];
		$img_alt = $attachment->post_excerpt;
		if ( $img_alt == null )
			$img_alt = $attachment->post_title;
		$img_rel = apply_filters( 'gallery_img_rel', 'attachment' ); // Available filter: gallery_img_rel
		$img_class = apply_filters( 'gallery_img_class', 'gallery-image' ); // Available filter: gallery_img_class

		$output  .=  "\n\t" . '<' . $itemtag . ' class="gallery-item gallery-columns-' . $columns .'">';
		$output  .=  "\n\t\t" . '<' . $icontag . ' class="gallery-icon"><a href="' . $img_lnk . '" title="' . $img_alt . '" rel="' . $img_rel . '"><img src="' . $img_src . '" alt="' . $img_alt . '" class="' . $img_class . ' attachment-' . $size . '" /></a></' . $icontag . '>';

		if ( $captiontag && trim($attachment->post_excerpt) ) {
			$output .= "\n\t\t" . '<' . $captiontag . ' class="gallery-caption">' . $attachment->post_excerpt . '</' . $captiontag . '>';
		}

		$output .= "\n\t" . '</' . $itemtag . '>';
		
		if ( $columns > 0 && ++$i % $columns == 0 )
			$output .= "\n</div>\n" . '<div class="gallery">';
	}
	$output .= "\n</div>\n";

	return $output;
}

// Widget: Search; to match the pandora style and replace Widget plugin default
function pandora_widget_search($args) {
	extract($args);
	$options = get_option('pandora_widget_search');
	$title = empty($options['title']) ? __( 'Search', 'pandora' ) : esc_attr($options['title']);
	$button = empty($options['button']) ? __( 'Find', 'pandora' ) : esc_attr($options['button']);
?>
			<?php echo $before_widget ?>
				<?php echo $before_title ?><label for="s"><?php echo $title ?></label><?php echo $after_title ?>
				<form id="searchform" class="blog-search" method="get" action="<?php echo home_url() ?>">
					<div>
						<input id="s" name="s" type="text" class="text" value="<?php the_search_query() ?>" size="10" tabindex="1" />
						<input type="submit" class="button" value="<?php echo $button ?>" tabindex="2" />
					</div>
				</form>
			<?php echo $after_widget ?>
<?php
}

// Widget: Search; element controls for customizing text within Widget plugin
function pandora_widget_search_control() {
	$options = $newoptions = get_option('pandora_widget_search');
	if (isset($_POST['search-submit'])) {
		$newoptions['title'] = strip_tags(stripslashes( $_POST['search-title']));
		$newoptions['button'] = strip_tags(stripslashes( $_POST['search-button']));
	}
	if ( $options != $newoptions ) {
		$options = $newoptions;
		update_option( 'pandora_widget_search', $options );
	}
	$title = esc_attr($options['title']);
	$button = esc_attr($options['button']);
?>
	<p><label for="search-title"><?php _e( 'Title:', 'pandora' ) ?> <input class="widefat" id="search-title" name="search-title" type="text" value="<?php echo $title; ?>" /></label></p>
	<p><label for="search-button"><?php _e( 'Button Text:', 'pandora' ) ?> <input class="widefat" id="search-button" name="search-button" type="text" value="<?php echo $button; ?>" /></label></p>
	<input type="hidden" id="search-submit" name="search-submit" value="1" />
<?php
}

// Widget: Meta; to match the pandora style and replace Widget plugin default
function pandora_widget_meta($args) {
	extract($args);
	$options = get_option('widget_meta');
	$title = empty($options['title']) ? __( 'Meta', 'pandora' ) : esc_attr($options['title']);
?>
			<?php echo $before_widget; ?>
				<?php echo $before_title . $title . $after_title; ?>
				<ul>
					<?php wp_register() ?>

					<li><?php wp_loginout() ?></li>
					<?php wp_meta() ?>

				</ul>
			<?php echo $after_widget; ?>
<?php
}

// Widget: RSS links; to match the pandora style
function pandora_widget_rsslinks($args) {
	extract($args);
	$options = get_option('pandora_widget_rsslinks');
	$title = empty($options['title']) ? __( 'RSS Links', 'pandora' ) : esc_attr($options['title']);
?>
		<?php echo $before_widget; ?>
			<?php echo $before_title . $title . $after_title; ?>
			<ul>
				<li><a href="<?php bloginfo('rss2_url') ?>" title="<?php echo esc_html( get_bloginfo('name') ) ?> <?php _e( 'Posts RSS feed', 'pandora' ); ?>" rel="alternate" type="application/rss+xml"><?php _e( 'All posts', 'pandora' ) ?></a></li>
				<li><a href="<?php bloginfo('comments_rss2_url') ?>" title="<?php echo esc_html(bloginfo('name') ) ?> <?php _e( 'Comments RSS feed', 'pandora' ); ?>" rel="alternate" type="application/rss+xml"><?php _e( 'All comments', 'pandora' ) ?></a></li>
			</ul>
		<?php echo $after_widget; ?>
<?php
}

// Widget: RSS links; element controls for customizing text within Widget plugin
function pandora_widget_rsslinks_control() {
	$options = $newoptions = get_option('pandora_widget_rsslinks');
	if (isset($_POST['rsslinks-submit'])) {
		$newoptions['title'] = strip_tags( stripslashes( $_POST['rsslinks-title'] ) );
	}
	if ( $options != $newoptions ) {
		$options = $newoptions;
		update_option( 'pandora_widget_rsslinks', $options );
	}
	$title = esc_attr($options['title']);
?>
	<p><label for="rsslinks-title"><?php _e( 'Title:', 'pandora' ) ?> <input class="widefat" id="rsslinks-title" name="rsslinks-title" type="text" value="<?php echo $title; ?>" /></label></p>
	<input type="hidden" id="rsslinks-submit" name="rsslinks-submit" value="1" />
<?php
}

// Widgets plugin: intializes the plugin after the widgets above have passed snuff
function pandora_widgets_init() {
	if ( !function_exists('register_sidebars') )
		return;

	// Formats the pandora widgets, adding readability-improving whitespace
	$p_primary = array(
		'id'			 =>	  'sidebar-1',
		'name'			 =>	  __('Primary Sidebar', 'pandora'),
		'before_widget'  =>   "\n\t\t\t" . '<li id="%1$s" class="widget %2$s">',
		'after_widget'   =>   "\n\t\t\t</li>\n",
		'before_title'   =>   "\n\t\t\t\t". '<h3 class="widgettitle">',
		'after_title'    =>   "</h3>\n"
	);
	
	$p_secondary = array(
		'id'			 =>	  'sidebar-2',
		'name'			 =>	  __('Secondary Sidebar', 'pandora'),
		'before_widget'  =>   "\n\t\t\t" . '<li id="%1$s" class="widget %2$s">',
		'after_widget'   =>   "\n\t\t\t</li>\n",
		'before_title'   =>   "\n\t\t\t\t". '<h3 class="widgettitle">',
		'after_title'    =>   "</h3>\n"
	);
	
	$p_tertiary = array(
		'id'			 =>	  'sidebar-3',
		'name'			 =>	  __('Footer-bar', 'pandora'),
		'before_widget'  =>   "\n\t\t\t" . '<li id="%1$s" class="widget %2$s">',
		'after_widget'   =>   "\n\t\t\t</li>\n",
		'before_title'   =>   "\n\t\t\t\t". '<h3 class="widgettitle">',
		'after_title'    =>   "</h3>\n"
	);

	register_sidebar( $p_primary );
	register_sidebar( $p_secondary );
	register_sidebar( $p_tertiary );
	
	// Finished intializing Widgets plugin, now let's load the pandora default widgets; first, pandora search widget
	$widget_ops = array(
		'classname'    =>  'widget_search',
		'description'  =>  __( "A search form for your blog (pandora)", "pandora" )
	);
	wp_register_sidebar_widget( 'search', __( 'Search', 'pandora' ), 'pandora_widget_search', $widget_ops );
	//wp_unregister_widget_control('search'); // We're being pandora-specific; remove WP default
	wp_register_widget_control( 'search', __( 'Search', 'pandora' ), 'pandora_widget_search_control' );

	// pandora Meta widget
	$widget_ops = array(
		'classname'    =>  'widget_meta',
		'description'  =>  __( "Log in/out and administration links (pandora)", "pandora" )
	);
	wp_register_sidebar_widget( 'meta', __( 'Meta', 'pandora' ), 'pandora_widget_meta', $widget_ops );
	//wp_unregister_widget_control('meta'); // We're being pandora-specific; remove WP default
	wp_register_widget_control( 'meta', __( 'Meta', 'pandora' ), 'wp_widget_meta_control' );

	//pandora RSS Links widget
	$widget_ops = array(
		'classname'    =>  'widget_rss_links',
		'description'  =>  __( "RSS links for both posts and comments (pandora)", "pandora" )
	);
	wp_register_sidebar_widget( 'rss_links', __( 'RSS Links', 'pandora' ), 'pandora_widget_rsslinks', $widget_ops );
	wp_register_widget_control( 'rss_links', __( 'RSS Links', 'pandora' ), 'pandora_widget_rsslinks_control' );
}

// Translate, if applicable
load_theme_textdomain('pandora', get_template_directory().'/translation' );

// Runs our code at the end to check that everything needed has loaded
add_action( 'init', 'pandora_widgets_init' );

// Registers our function to filter default gallery shortcode
add_filter( 'post_gallery', 'pandora_gallery', null );

// Adds filters for the description/meta content in archives.php
add_filter( 'archive_meta', 'wptexturize' );
add_filter( 'archive_meta', 'convert_smilies' );
add_filter( 'archive_meta', 'convert_chars' );
add_filter( 'archive_meta', 'wpautop' );

//for featured images
add_theme_support( 'post-thumbnails' );

add_editor_style();

function pandora_always_white_bg_content(){
	if (get_background_image() != ''){
		?><style type="text/css">
			.always-white {
				background-color:white;
			}
		</style><?php
	}
}
add_custom_background();

//custom header
$pandora_rand_img = rand(1,3);
define('NO_HEADER_TEXT', true );
define('HEADER_IMAGE', '%s/images/custom-header'.$pandora_rand_img.'.jpg'); // %s is the template dir uri
define('HEADER_IMAGE_WIDTH', 1000); // use width and height appropriate for your theme
define('HEADER_IMAGE_HEIGHT', 200);
//define('HEADER_IMAGE', trailingslashit( get_stylesheet_directory_uri() ).'images/banner.jpg');
	// gets included in the site header
function pandora_header_style() {
	if ( !is_home() ) {
		if ( get_header_image() != '' ){
			$pandora_header_height = "height:200px";
			$pandora_header_width = "width:1000px";
		}
		?><style type="text/css">
			#header {
				background: url(<?php header_image(); ?>);
				<?php print $pandora_header_height ?>;
				<?php print $pandora_header_width ?>;
			}
		</style><?php
	}
}
	// gets included in the admin header
function pandora_admin_header_style() {
    ?><style type="text/css">
        #headimg {
            width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
            height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
            background: no-repeat;
        }
    </style><?php
}
add_custom_image_header('pandora_header_style', 'pandora_admin_header_style');

function pandora_comment_reply_script(){
	if ( is_singular() ) wp_enqueue_script( "comment-reply" );
}
add_action('wp_enqueue_scripts', 'pandora_comment_reply_script') ;

add_theme_support( 'automatic-feed-links' );

//activate jQuery from WordPress core
function pandora_init_method() {
    wp_enqueue_script( 'jquery' );
}
add_action('init', 'pandora_init_method');

//navigation for index
function pandora_index_navigation_links(){
	require_once (get_template_directory() . '/applications/mini-functions/index-pagenavigation.php');
}

//slider functions
require_once (get_template_directory() . '/applications/coin-slider/main.php');

//logo functions
require_once (get_template_directory() . '/applications/mini-functions/logo.php');

//main menu functions and registers
require_once (get_template_directory() . '/applications/main-menu/main.php');

//page list function
require_once (get_template_directory() . '/applications/mini-functions/page-list.php');

//user's avatar and description in author.php
require_once (get_template_directory() . '/applications/mini-functions/user-desc.php');

//error, warning, alert, poup up messages functions
require_once (get_template_directory() . '/applications/mini-functions/windows.php');

//call admin area for options
require_once (get_template_directory() . '/setup/settings.php');

//call comments form
require_once (get_template_directory() . '/applications/mini-functions/comments.php');

//for only embed elements (videos) - not captions, images, or texts
switch ($pandora_options['pan_page_style']) {
    case 1:
        $content_width = 478; //portal style
        break;
    case 0:
        $content_width = 728; //blog style
        break;
    case 2:
        $content_width = 578; //clan page style
        break;
}
?>
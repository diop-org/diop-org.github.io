<?php
if ( function_exists('register_sidebar') )
    register_sidebar(array(
		'name' => 'sidebar',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>',
    ));
 
// Generates semantic id for BODY element
function iz_body_id() {
	global $wp_query;
	
	$id_page = '';

	// Generic semantic id for what type of content is displayed
	is_front_page()  ? $id_page = 'home'  		: null; // For the front page, if set
	is_home()        ? $id_page = 'home'  		: null;
	is_paged()       ? $id_page = '_paged'    : null;
	is_404() 	     ? $id_page = 'error404'   : null;
	is_search() 	 ? $id_page = 'search'   : null;
	
	if (is_single())
		$id_page = 'post-' . $wp_query->post->ID;
	
	// id for specific page
	if (is_page()) {
		$izPageName = $wp_query->post->post_title;
		
		$izPageName = strtolower($izPageName);
		$izPageName = str_replace(' ', '-', $izPageName);
		
		$id_page = $izPageName;
	}
	
	if (is_archive()) {
		$izCat = $wp_query->get_queried_object();
		
		if (is_category()) {
			$catName = strtolower($izCat->name);
			$catName = str_replace(' ', '', $catName);
			$id_page = 'category-' . $catName;
		} else if (is_tag()){
			$catName = strtolower($izCat->name);
			$catName = str_replace(' ', '', $catName);
			$id_page = 'tag-' . $catName;
		} else if (is_author()){
			$id_page = 'autor-' . $izCat->user_nicename;
		} else if (is_date()) {
			$date = iz_get_date_request();
			if (is_year()) {
				$id_page = 'year-' . $date['year'];
			} elseif (is_month()) {
				$id_page = 'month-' . $date['month'] . '-' . $date['year'];
			} elseif (is_day()) {
				$id_page = 'day-' . $date['day'] . '-' . $date['month'] . '-' . $date['year'];
			}
		} else {
			$id_page = 'archives';
		}
	}

	echo $id_page;
}

	

// Generates semantic classes for BODY element
function iz_body_class( $print = true ) {
	global $wp_query, $current_user;

	// Generic semantic classes for what type of content is displayed
	is_home()        ? $c[] = 'front'       : null; // For the blog posts page, if set
	is_page()		 ? $c[] = 'page'	    : null;
	is_paged()       ? $c[] = 'paged'      	: null;
	is_attachment()  ? $c[] = 'attachment' 	: null;
	is_404()         ? $c[] = 'error e404' : null; // CSS does not allow a digit as first character
	is_single()      ? $c[] = 'archives'    : null;
	
	//Class for archives front page 
		
	// class for single post
	if (is_single()) {
		
		$c[] = 'single-post';
		
		if (is_attachment()) {
			
			$mime_type = get_post_mime_type();
			$mime_prefix = array( 'application/', 'image/', 'text/', 'audio/', 'video/', 'music/' );
			$c[] = 'attachment-' . str_replace( $mime_prefix, "", "$mime_type" );
			
		}
	}
	
	// Class for archives page
	if (is_archive()) {
		$c[] = 'archives';		
		
		if (is_date()){
			$c[] = 'bydate';
		} else if (is_tag()) {
			$c[] = 'bytag';
		} else if (is_author()) {
			$c[] = 'byauthor';
		} else if (is_category()) {
			$c[] = 'bycategory';
		}
	}
	
	if ( is_search() ) {
		$posts = $wp_query->posts;
		if ( $posts ) {
			$c[] = 'search-results';
		} else {
			$c[] = 'search-no-results';
		}
	}
		
	// Separates classes with a single space, collates classes for BODY
	$c = join( ' ', apply_filters( 'body_class',  $c ) ); // Available filter: body_class

	// And tada!
	return $print ? print($c) : $c;
}

// Generates semantic classes for each post div element
function iz_post_class( $print = true ) {
	global $post, $iz_post_alt;
			
	$c[] = 'post';
	
	if (is_home() || is_archive() || is_search()) 
		$c[] = 'post-list';
			
	if (is_single())
		$c[] = 'single';
		
	if (is_search())
		$c[] = 's-result';

	// For password-protected posts
	if ( $post->post_password )
		$c[] = 'protected';

	// If it's the other to the every, then add 'alt' class
	if ( $iz_post_alt % 2 )
		$c[] = 'p-alt';
	
	// Separates classes with a single space, collates classes for post DIV
	$c = join( ' ', apply_filters( 'post_class', $c ) ); // Available filter: post_class

	return $print ? print($c) : $c;
}

$iz_post_alt = 1;

// Generates semantic classes for each comment
function iz_comment_class( $print = true ) {
	global $comment, $post, $iz_comment_alt;

	// Collects the comment type (comment, trackback),
	$c = array($comment->comment_type );
	
	$c[] = 'comment';
	
	// If the comment author has an id (registered), then print the log in name
	if ( $comment->user_id > 0 ) {
		$user = get_userdata($comment->user_id);
		// For comment authors who are the author of the post
		if ( $comment->user_id === $post->post_author )
			$c[] = 'bypostauthor ';
		else
			$c[] = 'byuser ';
		
		$c[] = sanitize_title_with_dashes(strtolower( $user->user_login ));
	}

	if ( ++$iz_comment_alt % 2 )
		$c[] = 'c-alt';
	
	// Separates classes with a single space, collates classes for comment LI
	$c = join( ' ', apply_filters( 'comment_class', $c ) ); // Available filter: comment_class


	return $print ? print($c) : $c;
}


// Produces an avatar image with the hCard-compliant photo class
function iz_gravatar() {
	
	$avatar_email = get_comment_author_email();
	$avatar_size = apply_filters( 'avatar_size', '56' ); // Available filter: avatar_size
	$avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( $avatar_email, $avatar_size ) );
	echo $avatar;
}


//Helper Function 
/**
 *Get category list only three category
 */
function iz_get_category($args = null)
{
	global $id;
	
	$default = array (
				'before' => '',
				'after' => '',
				'separator' => ', '
				);
				
	$r = wp_parse_args($args, $default);
	extract($r);
	
	$cat = wp_get_post_categories($id);
	
	$output = '';
	if ($before != '')
		$output .= $before;
		
	if (count($cat) > 2)
		$c = 2;
	else
		$c = count($cat);
		
	$catlist = '';
	
	for ($i=0; $i<$c; $i++) {
		
		$catdata = get_category($cat[$i]);
		$catname = $catdata->name;
		
		$catlist .= '<a href="' . get_category_link($cat[$i]) . '" title="More post in ' . $catname . '">' . $catname . '</a>' . $separator;
		
		$catin[] = $cat[$i];
		
	}
	
	$catout = array_diff($cat, $catin);
	
	$catlist = trim($catlist);
	$catlist = trim($catlist, "$separator");
	$catlist = trim($catlist);
	
	if (count($cat) > 2) {
	
		if ($catout) {
			foreach ($catout as $ct) {
				$ctdata = get_category($ct);
				$ctname = $ctdata->name;
		
				$ctlist .= '<a href="' . get_category_link($ct) . '" title="More post in ' . $ctname . '">' . $ctname . '</a>';
			}
			$ctlist = trim($ctlist);
		}
		
		$catlist .= '<em class="more-cat">, ... <span>' . $ctlist . '</span></em>';
	}
	
	$output .= $catlist;

	if ($after != '')
		$output .= $after;
		
	echo $output;
}

/**
 *Get date request
 */
function iz_get_date_request()
{
	global $wp_query;
	
	$date_queried = $wp_query->query_vars;
	
	if (!empty($date_queried['year']))
		$date_request['year'] = $date_queried['year'];
	
	if (!empty($date_queried['monthnum']))
		$date_request['month'] = $date_queried['monthnum'];
	
	if (!empty($date_queried['day']))
		$date_request['day'] = $date_queried['day'];
		
	return $date_request;
}

/**
 *Get Post Tag
 */
function iz_the_tags($args=null)
{
	global $id;
	
	$default = array (
				'before' => '<strong>Tags : </strong>',
				'after' => '',
				'separator' => ', '
				);
				
	$r = wp_parse_args($args, $default);
	extract($r);
	
	$tags = wp_get_post_tags($id);
	
	$output = '';
	
	if ($before != '')
		$output .= $before;

	$taglist = '';
	
	foreach ($tags as $tag) {
		
		$tagdata = get_tag($tag->term_id);
		$taglist .= '<a href="' . get_tag_link($tag->term_id) . '" title="More post in ' . $tagdata->slug . '">' . $tagdata->slug . '</a>' . $separator;
	}
	
	$taglist = trim($taglist);
	$taglist = trim($taglist, "$separator");
	$taglist = trim($taglist);
	
	$output .= $taglist;

	if ($after != '')
		$output .= $after;
		
	echo $output;
}


/**
 * Get Pages List
 */
function iz_pages_list( $count = 3 )
{
	$count = (int) $count;	
	//Get all pages
	$allpages = get_pages( array( 'sort_column' => 'menu_order' ));	
	$ordered_menu = $unordered_menu = array();
	foreach ( $allpages as $key => $value ) {	
		if ( $value->menu_order != 0 ) {
			$ordered_menu[$value->menu_order] = $value;
		} else {
			$unordered_menu[$value->post_title] = $value;
		}
	}	
	if ( ! empty( $ordered_menu )) {
		ksort( $ordered_menu );
	}			
	if ( ! empty( $unordered_menu )) {
		ksort($unordered_menu);
	}			
	$allpages = array_merge( $ordered_menu, $unordered_menu );	
	$output = '<ul id="site-menu">';
	$output .= '<li><a href="' . get_option( 'home' ) . '/' . '" title="Go to Home Site">Home</a></li>';	
	$i = 0;
	$mainpage = '';
	foreach ( $allpages as $page ) {	
		if ( $page->post_parent == 0 ) {
			if ( $i > ( $count - 1 )) {
				$extrapage[] = $page;
			} else {
				$pageuri = get_permalink( $page->ID );
				$mainpage .= '<li><a href="' . $pageuri  . '" title="Go to ' . $page->ID . ' page">' . $page->post_title . '</a></li>';
			}
		}
		$i++;
	}	
	$output .= $mainpage;	
	if ( ! empty( $extrapage )) {		
		$morepage = '<li class="more-pages">';
		$morepage .= '<ul class="hide">';		
		foreach ( $extrapage as $exp ) {
			$epageuri = get_permalink($exp->ID);
			$morepage .= '<li><a href="' . $epageuri . '" title="Go to ' . $exp->post_title . ' page">' . $exp->post_title . '</a></li>';
		}		
		$morepage .= '</ul>';
		$morepage .= '</li>';
	}	
	$output .= $morepage;
	$output .= '</ul>';	
	echo $output;
}

/**
 *Check for page child and get page child
 */
function iz_page_child($page_id = null)
{
	global $id, $iz_pagechild;
	
	if (!$page_id) {
		if (!empty($id)) {
			$page_id = $id;
		} else {
		
			return false;
		}
		
	} else {
		$page_id = (int) $page_id;
	}
	
	
	$allpages = get_pages();
	foreach ($allpages as $page) {
		if ($page->post_parent != 0)
			$parchild[$page->post_parent][] = $page->ID;
		
	}
	
	if (!empty($parchild)) {
		$child = $parchild[$page_id];
		
		if(!empty($child)) {
			foreach ($child as $chid) {
				$chdata[] = get_page($chid);
			}
			
			$iz_pagechild = $chdata;
			return true;
		}
	}
	
	return false;
}


/**
 *Display page child list
 */
function iz_pagechild_list($args = null)
{
	global $iz_pagechild;
	
	if (!isset($GLOBALS['iz_pagechild']) || empty($iz_pagechild))
		return false;
		
	$default = array (
				'before' => 'Sub Pages : ',
				'after' => '',
				'separator' => ', '
			);
	$r = wp_parse_args($args, $default);
	extract($r);
	
	$output = '';
	if (!empty($before))
		$output .= $before;
		
	$childlist = '';
	foreach ($iz_pagechild as $child) {
		$childuri = get_permalink($child->ID);
		$childlist .= '<a href="' . $childuri . '" title="Go to ' . $child->post_title . ' page">' . $child->post_title . '</a>' . $separator;
	}
	
	$childlist = trim($childlist);
	$childlist = trim($childlist, "$separator");
	$childlist = trim($childlist);
	
	$output .= $childlist;
	
	if (!empty($after))
		$output .= $after;
		
	echo $output;
}

add_action('admin_menu', 'iz_pos_admin');

//Admin
function iz_pos_admin()
{
	add_theme_page('PurityOfSoul Options', 'PurityOfSoul', 9, basename(__FILE__), 'iz_pos_htmlAdmin');
}

function iz_pos_htmlAdmin()
{
	$eform = array('front-page-excerpt', 'archive-page-excerpt', 'search-page-excerpt');
	
	if ($_POST['iz_pos_submit_hidden'] == 'true')
	{
		foreach ($eform as $e)
		{
			if (isset($_POST[$e]) && !empty($_POST[$e]))
			{
				$options[$e] = $_POST[$e];
			}
		}
		
		update_option('iz_purityofsoul', $options);
	?>
		<div class="updated">
			<p><strong><?php _e('Options Saved', 'iz_trans_updated'); ?></strong></p>
		</div>
		
		<?php
	}
	
	$opt = get_option('iz_purityofsoul');
	
	foreach ($eform as $e)
	{
		$el = str_replace('-', '_', $e);
		
		$opt[$e] ? $$el = 'checked="checked"' : $$el = '';
	}
	
?>
	<div class="wrap">
		<div id="icon-options-general" class="icon32">
			<br/>
		</div>
		<h2>PurityOfSoul</h2>
		<form method="post" action="">
			<?php wp_nonce_field('update_options'); ?>
			<h3>Excerpt Usage</h3>
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><?php _e('Front Page'); ?></th>
					<td valign="top">
						<fieldset>
							<legend class="screen-reader-text"><span><?php _e('Front Page Content'); ?></span></legend>
							<label for="front-page-excerpt">
								<input id="front-page-excerpt" type="checkbox" value="1" name="front-page-excerpt" 
									<?php echo $front_page_excerpt; ?>/> Using the excerpt on the front page
							</label>					
						</fieldset>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e('Archive Page'); ?></th>
					<td valign="top">
						<fieldset>
							<legend class="screen-reader-text"><span><?php _e('Front Page Content'); ?></span></legend>
							<label for="archive-page-excerpt">
								<input id="archive-page-excerpt" type="checkbox" value="1" name="archive-page-excerpt" 
									<?php echo $archive_page_excerpt; ?>/> Using the excerpt on the archive page
							</label>					
						</fieldset>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e('Search Result Page'); ?></th>
					<td valign="top">
						<fieldset>
							<legend class="screen-reader-text"><span><?php _e('Front Page Content'); ?></span></legend>
							<label for="search-page-excerpt">
								<input id="search-page-excerpt" type="checkbox" value="1" name="search-page-excerpt" 
									<?php echo $search_page_excerpt; ?>/> Using the excerpt on the search result page
							</label>					
						</fieldset>
					</td>
				</tr>
			</table>
			
			<input type="hidden" name="action" value="update" />
			<input type="hidden" name="page_options" value="" />
			<input type="hidden" name="iz_pos_submit_hidden" value="true" />
				
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e('Save Changes'); ?>" />
			</p>
		</form>
	</div>
<?php
}
?>
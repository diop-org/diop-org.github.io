<?php
/**
* Theme functions used by Business lite
*
* Authors: Tyler Cunningham, Trent Lapinski
* Copyright: © 2012
* {@link http://cyberchimps.com/ CyberChimps LLC}
*
* Released under the terms of the GNU General Public License.
* You should have received a copy of the GNU General Public License,
* along with this software. In the main directory, see: /licensing/
* If not, see: {@link http://www.gnu.org/licenses/}.
*
* @package Business lite
* @since 3.0
*/

/**
* Define global theme functions.
*/ 
	$themename = 'business';
	$themenamefull = 'Business lite';
	$themeslug = 'bu';
	$root = get_template_directory_uri(); 
	$pagedocs = 'http://cyberchimps.com/question/using-the-business-lite-page-options/';
	$sliderdocs = 'http://cyberchimps.com/question/business-lite-slider/';

/**
* Basic theme setup.
*/ 
function bu_theme_setup() {
	global $content_width;
	
	if ( ! isset( $content_width ) ) $content_width = 608; //Set content width
	
	add_theme_support(
		'post-formats',
		array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat')
	);

	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 720, 240, true );
	add_theme_support('automatic-feed-links');
	add_editor_style();
}
add_action( 'after_setup_theme', 'bu_theme_setup' );

/**
* Redirect user to theme options page after activation.
*/ 
if ( is_admin() && isset($_GET['activated'] ) && $pagenow =="themes.php" ) {
	wp_redirect( 'themes.php?page=business' );
}

/**
* Add link to theme options in Admin bar.
*/ 
function bu_admin_link() {
	global $wp_admin_bar;

	$wp_admin_bar->add_menu( array( 'id' => 'Business', 'title' => 'Business lite Options', 'href' => admin_url('themes.php?page=business')  ) ); 
}
add_action( 'admin_bar_menu', 'bu_admin_link', 113 );

/**
* Custom markup for gallery posts in main blog index.
*/ 
function bu_custom_gallery_post_format( $content ) {
	global $options, $themeslug, $post;
	$root = get_template_directory_uri(); 
	
	 ob_start(); 
		if ( has_post_thumbnail() && $featured_images == '1'  && !is_single()) {
 		 	echo '<div class="featured-image">';
 		 	echo '<a href="' . get_permalink($post->ID) . '" >';
 		 		the_post_thumbnail();
  			echo '</a>';
  			echo '</div>';
		}
		?>	
			<div class="row">
			<div class="three columns"><?php business_post_byline(); ?></div>
				<div class="entry nine columns">
					<?php if ($options->get($themeslug.'_post_formats') == '1') : ?>
						<div class="postformats"><!--begin format icon-->
							<img src="<?php echo get_template_directory_uri(); ?>/images/formats/gallery.png" />
						</div><!--end format-icon-->
					<?php endif;?>
					<h2 class="posts_title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
									
				<?php if (!is_single()): ?>
				<?php $images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
					if ( $images ) :
						$total_images = count( $images );
						$image = array_shift( $images );
						$image_img_tag = wp_get_attachment_image( $image->ID, 'thumbnail' );
				?>

				<figure class="gallery-thumb">
					<a href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>
					<br /><br />
					This gallery contains <?php echo $total_images ; ?> images
					<?php endif;?>
				</figure><!-- .gallery-thumb -->
				<?php endif;?>
				
				<?php if (is_single()): ?>
					<?php the_content(); ?>
				<?php endif;?>
				
				<!--Begin @Core link pages hook-->
					<?php business_link_pages(); ?>
				<!--End @Core link pages hook-->
			
				<!--Begin @Core post edit link hook-->
					<?php business_edit_link(); ?>
				<!--End @Core post edit link hook-->
				</div><!--end entry-->
			</div><!--end row-->
			<?php	
		
		$content = ob_get_clean();	
		return $content; 
}
add_filter('business_post_formats_gallery_content', 'bu_custom_gallery_post_format' ); 
	
/**
* Set custom post excerpt link text based on theme option.
*/ 
function bu_new_excerpt_more($more) {

	global $themename, $themeslug, $options, $post;
    
    	if ($options->get($themeslug.'_excerpt_link_text') == '') {
    		$linktext = 'Continue Reading...';
   		}
    	else {
    		$linktext = $options->get($themeslug.'_excerpt_link_text');
   		}

	return '<div class="more-link"><a href="'. get_permalink($post->ID) . '"> <br /><br /> '.$linktext.'</a></div>';
}
add_filter('excerpt_more', 'bu_new_excerpt_more');

/**
* Set custom post excerpt length based on theme option.
*/ 
function bu_new_excerpt_length($length) {

	global $themename, $themeslug, $options;
	
		if ($options->get($themeslug.'_excerpt_length') == '') {
    		$length = '55';
    	}
    	else {
    		$length = $options->get($themeslug.'_excerpt_length');
    	}
    	
	return $length;
}
add_filter('excerpt_length', 'bu_new_excerpt_length');

/**
* Attach CSS3PIE behavior to elements
*/   
function bu_render_ie_pie() { ?>
	
	<style type="text/css" media="screen">
		#wrapper input, textarea, #twitterbar, input[type=submit], input[type=reset], #imenu, .searchform, .post_container, .postformats, .postbar, .post-edit-link, .widget-container, .widget-title, .footer-widget-title, .comments_container, ol.commentlist li.even, ol.commentlist li.odd, .slider_nav, ul.metabox-tabs li, .tab-content, .list_item, .section-info, #of_container #header, .menu ul li a, .submit input, #of_container textarea, #of_container input, #of_container select, #of_container .screenshot img, #of_container .of_admin_bar, #of_container .subsection > h3, .subsection, #of_container #content .outersection .section, #carousel_list, #calloutwrap, #calloutbutton, .box1, .box2, .box3, .es-carousel-wrapper
  		
  	{
  		behavior: url('<?php echo get_template_directory_uri();  ?>/core/library/pie/PIE.htc');
	}
	</style>
<?php
}

add_action('wp_head', 'bu_render_ie_pie', 8);

/**
* Add TypeKit support based on theme option.
*/ 
function google_analytics() {
	global $themename, $themeslug, $options;
	
	echo stripslashes ($options->get($themeslug.'_ga_code'));

}
add_action('wp_head', 'google_analytics');
	
/**
* Register custom menus for header, footer.
*/ 
function bu_register_menus() {
	register_nav_menus(
	array( 'header-menu' => __( 'Header Menu' ))
  );
}
add_action( 'init', 'bu_register_menus' );
	
/**
* Menu fallback if custom menu not used.
*/ 
function bu_menu_fallback() {
	global $post; ?>
	
	<ul id="nav_menu">
		<?php wp_list_pages( 'title_li=&sort_column=menu_order&depth=3'); ?>
	</ul><?php
}
/**
* Register widgets.
*/ 
function bu_widgets_init() {
    register_sidebar(array(
    	'name' => 'Full Sidebar',
    	'id'   => 'sidebar-widgets',
    	'description'   => 'These are widgets for the sidebar.',
    	'before_widget' => '<div id="%1$s" class="widget-container">',
    	'after_widget'  => '</div>',
    	'before_title'  => '<h2 class="widget-title">',
    	'after_title'   => '</h2>'
    ));
    register_sidebar(array(
    	'name' => 'Left Half Sidebar',
    	'id'   => 'sidebar-left',
    	'description'   => 'These are widgets for the left sidebar.',
    	'before_widget' => '<div id="%1$s" class="widget-container">',
    	'after_widget'  => '</div>',
    	'before_title'  => '<h2 class="widget-title">',
    	'after_title'   => '</h2>'
    ));    	
    register_sidebar(array(
    	'name' => 'Right Half Sidebar',
    	'id'   => 'sidebar-right',
    	'description'   => 'These are widgets for the right sidebar.',
    	'before_widget' => '<div id="%1$s" class="widget-container">',
    	'after_widget'  => '</div>',
    	'before_title'  => '<h2 class="widget-title">',
    	'after_title'   => '</h2>'
   	));
    	
    register_sidebar(array(
		'name' => 'Box 1',
		'id' => 'box-1',
		'description' => 'This is the first widget of the four-box section',
		'before_widget' => '<div id="box1" class="three columns">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="box-widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => 'Box 2',
		'id' => 'box-2',
		'description' => 'This is the second widget of the four-box section',
		'before_widget' => '<div id="box2" class="three columns">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="box-widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => 'Box 3',
		'id' => 'box-3',
		'description' => 'This is the third widget of the four-box section',
		'before_widget' => '<div id="box3" class="three columns">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="box-widget-title">',
		'after_title' => '</h3>',
	));
		register_sidebar(array(
		'name' => 'Box 4',
		'id' => 'box-4',
		'description' => 'This is the fourth widget of the four-box section',
		'before_widget' => '<div id="box4" class="three columns">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="box-widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => 'Footer',
		'id' => 'footer-widgets',
		'description' => 'These are the footer widgets',
		'before_widget' => '<div class="three columns footer-widgets">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="footer-widget-title">',
		'after_title' => '</h3>',
	));
}
add_action ('widgets_init', 'bu_widgets_init');

function bu_custom_pagination($pages = '', $range = 4)
{
     $showitems = ($range * 2)+1;  
 
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
 
     if(1 != $pages)
     {
         echo '<div class="pagination"><span>'.__( 'Page', 'business' ).' '.$paged.' '.__( 'of', 'business' ).' '.$pages.'</span>';
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo '<a href="'.get_pagenum_link(1).'">'.__( '&laquo; First', 'business' ).'</a>';
         if($paged > 1 && $showitems < $pages) echo '<a href="'.get_pagenum_link($paged - 1).'">'.__( '&lsaquo; Previous', 'business' ).'</a>';
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }
 
         if ($paged < $pages && $showitems < $pages) echo '<a href="'.get_pagenum_link($paged + 1).'"">'.__( 'Next &rsaquo;', 'business').'</a>';
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo '<a href="'.get_pagenum_link($pages).'">'.__( 'Last &raquo;', 'business' ).'</a>';
         echo "</div>\n";
     }
}
/**
* Initialize business Core Framework and Pro Extension.
*/ 
require_once ( get_template_directory() . '/core/core-init.php' );

/**
* Call additional files required by theme.
*/ 
require_once ( get_template_directory() . '/includes/classy-options-init.php' ); // Theme options markup.
require_once ( get_template_directory() . '/includes/options-functions.php' ); // Custom functions based on theme options.
require_once ( get_template_directory() . '/includes/meta-box.php' ); // Meta options markup.
require_once ( get_template_directory() . '/includes/presstrends.php' ); // Opt-in PressTrends option.

/**
* End
*/

?>
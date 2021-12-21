<?php
/**
 * Minimatica functions and definitions
 *
 * Sets up the theme and provides custom functions to use as Template Tags
 * The theme functions are pluggable, which means they can be overrided by Child Themes
 * If you wish to modify code, do not modify the theme's code directly as it will be overwritten on updates
 * Instead create a child theme and make the desired modifications there
 * Read more about pluggable functions:
 * http://codex.wordpress.org/Pluggable_Functions
 * And Child Themes:
 * http://codex.wordpress.org/Child_Themes
 * 
 * @package WordPress
 * @subpackage Minimatica
 * @since Minimatica 1.0
 */

/**
 * Load custom widgets
 */
if ( is_readable( get_template_directory() . '/includes/widgets.php' ) )
	require_once( get_template_directory() . '/includes/widgets.php' );

/**
 * Load the theme options page if in admin mode
 */
if ( is_admin() && is_readable( get_template_directory() . '/includes/theme-options.php' ) )
	require_once( get_template_directory() . '/includes/theme-options.php' );

if ( ! function_exists( 'minimatica_theme_setup' ) ) :
/**
 * Set up theme specific settings
 *
 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_editor_style() To style the visual editor.
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_image_size() To set custom image sizes.
 *
 * @since Minimatica 1.0
 */
function minimatica_theme_setup() {
	// Set default content width based on the theme's layout. This affects the width of post images and embedded media.
	global $content_width;
	if( !isset( $content_width ) ) $content_width = 700;
	// Automatically add feed links to document head
	add_theme_support( 'automatic-feed-links' );
	// Register Primary Navigation Menu
	register_nav_menus(
		array(
		  'primary_nav' => 'Primary Navigation',
		)
	);
	// Add support for Post Formats
	add_theme_support( 'post-formats', array( 'image', 'gallery', 'video', 'audio', 'aside', 'link' ) );
	// Add support for post formats and custom image sizes specific to theme locations
	add_theme_support( 'post-thumbnails', array( 'post' ) );
	add_image_size( 'slider-thumb', 600, 400, 1 );
	add_image_size( 'homepage-thumb', 688, 230, 1 );
	add_image_size( 'gallery-thumb', 200, 200, 1 );
	add_image_size( 'video-thumb', 700, 444, 1 );
	add_image_size( 'single-thumb', 460, 348 );
	add_image_size( 'attachment-thumb', 688, 9999 ); // no crop flag, unlimited height
	// Allows users to set a custom background
	add_custom_background();
	// Allows users to set a custom header image
	if ( ! defined( 'HEADER_TEXTCOLOR' ) )
		define( 'HEADER_TEXTCOLOR', '151515' );
	// The height and width of your custom header.
	if ( ! defined( 'HEADER_IMAGE_WIDTH' ) )
		define( 'HEADER_IMAGE_WIDTH', 940 );
	if ( ! defined( 'HEADER_IMAGE_HEIGHT' ) )
		define( 'HEADER_IMAGE_HEIGHT', 100 );
	// Add a way for the custom header to be styled in the admin panel
	add_custom_image_header( 'minimatica_header_style', 'minimatica_admin_header_style' );
	// Styles the post editor
	add_editor_style();
	// Makes theme translation ready
	load_theme_textdomain( 'minimatica', get_template_directory() . '/languages' );
	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );
}
endif;

add_action( 'after_setup_theme', 'minimatica_theme_setup' );

if ( ! function_exists( 'minimatica_widgets_init' ) ) :
/**
 * Registers theme widget areas
 *
 * @uses register_sidebar()
 *
 * @since Minimatica 1.0
 */
function  minimatica_widgets_init() {
	register_sidebar(
		array(
			'name' => 'Sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside><!-- .widget -->',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
	register_sidebar(
		array(
			'name' => 'Footer',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside><!-- .widget -->',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
}
endif;

add_action( 'widgets_init', 'minimatica_widgets_init' );

if ( ! function_exists( 'minimatica_paged_posts' ) ) :
/**
 * Overrides the default posts_per_page value when viewing in gallery mode
 * This prevents the 404 flag from being triggered when using query_posts() with pagination
 * It does not alter the database value for the option, only fiters it when the posts query is called
 *
 * @since Minimatica 1.0
 */
function minimatica_paged_posts( $query ) {
	if( (
		( $query->is_home() && 'gallery' == minimatica_get_option( 'homepage_view' ) ) ||
		( $query->is_category() && 'gallery' == minimatica_get_option( 'category_view' ) ) ||
		( $query->is_tag() && 'gallery' == minimatica_get_option( 'tag_view' ) ) ||
		( $query->is_author() && 'gallery' == minimatica_get_option( 'author_view' ) ) ||
		( $query->is_archive() && 'gallery' == minimatica_get_option( 'archive_view' ) )
		) && ( ! is_single() )
	)
		$query->set( 'posts_per_page', '4' );
}
endif;

add_filter( 'pre_get_posts', 'minimatica_paged_posts' );

/**
 * Return default array of options
 *
 * @since Minimatica 1.0
 */
function minimatica_default_options() {
	$options = array(
		'homepage_view' => 'gallery',
		'category_view' => 'gallery',
		'tag_view' => 'blog',
		'author_view' => 'blog',
		'archive_view' => 'blog',
		'blog_category' => 0
	);
	return $options;
}

if ( ! function_exists( 'minimatica_get_option' ) ) :
/**
 * Used to output theme options is an elegant way
 *
 * @uses get_option() To retrieve the options array
 *
 * @since Minimatica 1.0
 */
function minimatica_get_option( $option ) {
	$options = get_option( 'minimatica_options', minimatica_default_options() );
	return $options[ $option ];
}
endif;

if ( ! function_exists( 'minimatica_doc_title' ) ) :
/**
 * Output the <title> tag
 *
 * @since Minimatica 1.0
 */
function minimatica_doc_title() {
	global $page, $paged;
	$doc_title = '';
	$site_description = get_bloginfo( 'description', 'display' );
	$separator = '#124';
	if ( !is_front_page() ) :
		$doc_title .= wp_title('', false);
		if ( $paged >= 2 || $page >= 2 )
			$doc_title .=  ', ' . __( 'Page' ) . ' ' . max( $paged, $page );
		if ( is_archive() )
			$doc_title .=  ' &' . $separator . '; ';
		elseif ( is_singular() )
			$doc_title .=  ' &' . $separator . '; ';
	endif;
	if ( is_archive() )
		$doc_title .= get_bloginfo( 'name' );
	elseif ( is_singular() )
		$doc_title .= get_bloginfo( 'name' );
	elseif ( is_front_page() )
		$doc_title .= get_bloginfo( 'name' );
	if ( is_front_page() && ( $paged >= 2 || $page >= 2 ) )
		$doc_title .=  ', ' . __( 'Page' ) . ' ' . max( $paged, $page );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$doc_title .= ' &' . $separator . '; ' . $site_description;
	echo $doc_title;
}
endif;

if ( ! function_exists( 'minimatica_register_styles' ) ) :
/**
 * Register theme styles
 *
 * @uses wp_register_style() To register styles
 *
 * @since Minimatica 1.0.1
 */
function minimatica_register_styles() {
	wp_register_style( 'minimatica', get_bloginfo( 'stylesheet_url' ), false, '1.0.1' );
	wp_register_style( 'colorbox', get_template_directory_uri() . '/styles/colorbox.css', false, '0.5' );
	wp_register_style( 'minimatica-ie', get_template_directory_uri() . '/styles/ie.css', false, '1.0' );
}
endif;

add_action('init', 'minimatica_register_styles');

if ( ! function_exists( 'minimatica_enqueue_styles' ) ) :
/**
 * Enqueue theme styles
 *
 * @uses wp_enqueue_style() To enqueue styles
 *
 * @since Minimatica 1.0
 */
function minimatica_enqueue_styles() {
	wp_enqueue_style( 'minimatica' );
	if( is_single() )
		wp_enqueue_style( 'colorbox' );
	wp_enqueue_style( 'minimatica-ie' );
	// Add IE conditionals
	global $wp_styles;
	$wp_styles->add_data( 'minimatica-ie', 'conditional', 'lte IE 8' );
}
endif;

add_action('wp_print_styles', 'minimatica_enqueue_styles');

if ( ! function_exists( 'minimatica_register_scripts' ) ) :
/**
 * Register theme scripts
 *
 * @uses wp_register_scripts() To register scripts
 *
 * @since Minimatica 1.0.1
 */
function minimatica_register_scripts() {
	// Add HTML5 support to older versions of IE
	wp_register_script( 'html5', get_template_directory_uri() . '/scripts/html5.js', false, '1.5.1' );
	wp_register_script( 'audio-player', get_template_directory_uri() . '/scripts/audio-player.js', array( 'swfobject' ), '2.2' );
	wp_register_script( 'kwicks', get_template_directory_uri() . '/scripts/kwicks.js', array( 'jquery' ), '1.5.1' );
	wp_register_script( 'colorbox', get_template_directory_uri() . '/scripts/colorbox.js', array( 'jquery' ), '1.3.16' );
	wp_register_script( 'minimatica', get_template_directory_uri() . '/scripts/minimatica.js', array( 'kwicks' ), '1.0' );
}
endif;

add_action( 'init', 'minimatica_register_scripts' );

if ( ! function_exists( 'minimatica_enqueue_scripts' ) ) :
/**
 * Enqueue theme scripts
 *
 * @uses wp_enqueue_scripts() To enqueue scripts
 *
 * @since Minimatica 1.0
 */
function minimatica_enqueue_scripts() {
	// Add HTML5 support to older versions of IE
	if( isset( $_SERVER['HTTP_USER_AGENT'] ) &&
		( false !== strpos( $_SERVER['HTTP_USER_AGENT'], 'MSIE' ) ) &&
		( false === strpos( $_SERVER['HTTP_USER_AGENT'], 'MSIE 9' ) ) )
        wp_enqueue_script( 'html5' );
	wp_enqueue_script( 'kwicks' );
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	if ( is_single() && has_post_format( 'video' ) )
		wp_enqueue_script( 'swfobject' );
	if ( is_single() && has_post_format( 'audio' ) )
		wp_enqueue_script( 'audio-player' );
	if ( is_single() )
		wp_enqueue_script( 'colorbox' );
	wp_enqueue_script( 'minimatica' );
}
endif;

add_action( 'wp_enqueue_scripts', 'minimatica_enqueue_scripts' );

if ( ! function_exists( 'minimatica_call_scripts' ) ) :
/**
 * Call script functions in document head
 *
 * @since Minimatica 1.0
 */
function minimatica_call_scripts() { ?>
<script type="text/javascript">
/* <![CDATA[ */
	jQuery().ready(function() {
		jQuery('#nav-slider a').live('click', function(e){
			e.preventDefault();
			var link = jQuery(this).attr('href');
			jQuery('#slider').html('<img src="<?php echo get_template_directory_uri(); ?>/images/loader.gif" style="display:block; margin:173px auto" />');
			jQuery('#slider').load(link+' #ajax-content', function(){
				slide();
			});
		});
		<?php if( is_single() ) : ?>
		jQuery('a.colorbox').colorbox({
			maxWidth:900,
			maxHeight:600
		});
		<?php endif; ?>
	});
	<?php if ( is_single() && has_post_format( 'audio' ) ) : ?>
	AudioPlayer.setup("<?php echo get_template_directory_uri(); ?>/audio-player/player.swf", {  
		width: 290  
	});
	<?php endif; ?> 
/* ]]> */
</script>
<?php
}
endif;

add_action( 'wp_head', 'minimatica_call_scripts' );

if ( ! function_exists( 'minimatica_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @since Minimatica 1.0.7
 */
function minimatica_header_style() {
	if( '' != get_header_image() ) : ?>
<style type="text/css">
#site-title {
	width:<?php echo HEADER_IMAGE_WIDTH; ?>px;
	height:<?php echo HEADER_IMAGE_HEIGHT; ?>px;
	background-image:url(<?php header_image(); ?>);
}
#site-title a {
<?php if ( 'blank' == get_header_textcolor() ) : ?>
	display:none;
<?php else : ?>
	color:#<?php header_textcolor(); ?>;
<?php endif; ?>
}
</style>
<?php endif;
}
endif;

if ( ! function_exists( 'minimatica_admin_header_style' ) ) :
/**
 * Shows the header image in the admin panel.
 *
 * @since Minimatica 1.0.7
 */
function minimatica_admin_header_style() { ?>
<style type="text/css">
#headimg {
	background-image:url(<?php header_image(); ?>);
}
<?php if ( 'blank' != get_header_textcolor() ) : ?>
#headimg h1 a {
	color:#<?php header_textcolor(); ?>;
	font-weight:normal;
	line-height:60px;
	text-decoration:none;
}
<?php endif; ?>
#headimg #desc {
	display:none;
}
</style>
<?php
}
endif;

if ( ! function_exists( 'minimatica_nav_menu' ) ) :
/**
 * Fallback menu if no custom menu is declared
 *
 * Falls back to a list of categories and displays a link to home
 *
 * @uses wp_list_categories() To list categories as menu items
 *
 * @since Minimatica 1.0
 */
function minimatica_nav_menu() { ?>
	<div id="primary-nav" class="nav">
		<ul>
			<li><a href="<?php echo home_url(); ?>" rel="home"><?php _e( 'Home', 'minimatica' ); ?></a></li>
			<?php wp_list_categories( 'title_li=' ); ?>
		</ul>
	</div><!-- #primary-nav -->
	<?php
}
endif;

if ( ! function_exists( 'minimatica_excerpt_more' ) ) :
/**
 * Changes the default excerpt trailing content
 *
 * Replaces the default [...] trailing text from excerpts
 * to a more pleasant ...
 *
 * @since Minimatica 1.0
 */
function minimatica_excerpt_more($more) {
	return ' &#8230;';
}
endif;

add_filter( 'excerpt_more', 'minimatica_excerpt_more' );

if ( ! function_exists( 'minimatica_file_types' ) ) :
/**
 * Allows uploading of .webm video files
 *
 * @since Minimatica 1.0
 */
function minimatica_file_types( $types ) {
	$types['video'][] = 'webm';
	return $types;
}
endif;

add_filter( 'ext2type', 'minimatica_mime_types' );

if ( ! function_exists( 'minimatica_mime_types' ) ) :
/**
 * Registers the webm mime type
 *
 * @since Minimatica 1.0
 */
function minimatica_mime_types( $types ) {
	$types['webm'] = 'video/webm';
	return $types;
}
endif;

add_filter( 'upload_mimes', 'minimatica_mime_types' );

if ( ! function_exists( 'minimatica_post_image' ) ) :
/**
 * Show the last image attached to the current post
 *
 * Used in image post formats
 * Images attached to image posts should not appear in the post's content
 * to avoid duplicate display of the same content
 *
 * @uses get_posts() To retrieve attached image
 *
 * @since Minimatica 1.0
 */
function minimatica_post_image() {
	if( has_post_thumbnail() ) :
	// If post has a thumbnail, show it as the post's image ?>
		<a class="colorbox" href="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); echo $image[0] ?>" title="<?php the_title_attribute(); ?>" rel="attachment">
			<?php the_post_thumbnail( 'attachment-thumb' ); ?>
		</a>
	<?php else :
		// Retrieve the last image attached to the post
		$args = array(
			'numberposts' => 1,
			'post_type' => 'attachment',
			'post_mime_type' => 'image',
			'post_parent' => get_the_ID()
		);
		$attachments = get_posts( $args );
		if( count( $attachments ) )
			$attachment = $attachments[0];
		if( isset( $attachment ) && ! post_password_required() ) : ?>
			<figure class="entry-attachment">
				<a class="colorbox" href="<?php $image = wp_get_attachment_image_src( $attachment->ID, 'full' ); echo $image[0]; ?>" title="<?php the_title_attribute(); ?>" rel="attachment">
				<?php echo wp_get_attachment_image( $attachment->ID, 'attachment-thumb' ); ?>
				</a>
				<?php if ( !empty( $attachment->post_excerpt ) ) : ?>
					<figcaption class="entry-caption">
						<?php echo apply_filters( 'the_excerpt', $attachment->post_excerpt ); ?>
					</figcaption><!-- .entry-caption -->
				<?php endif; ?>
			</figure><!-- .entry-attachment -->
		<?php endif;
	endif;
}
endif;

if ( ! function_exists( 'minimatica_post_gallery' ) ) :
/**
 * Show a gallery of images attached to the current post
 *
 * Used in gallery post formats
 * Galery post formats shou;d not use the [gallery] shortcode
 * to avoid duplicate display of the same content
 * to avoid duplicate of the same content
 *
 * @uses get_posts() To retrieve attached images
 *
 * @since Minimatica 1.0
 */
function minimatica_post_gallery() {
	// Retrieve images attached to post
	$args = array(
		'numberposts' => -1,
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
		'post_parent' => get_the_ID()
	);
	$attachments = get_posts( $args );
	// Reverse array to display them in chronological form instead of reverse chronological
	$attachments = array_reverse( $attachments );
	if( count( $attachments ) && ! post_password_required() ) : ?>
		<?php $counter = 0; ?>
		<div class="gallery post-gallery gallery-columns-3">
			<div class="gallery-row">
				<?php foreach( $attachments as $attachment ) : ?>
					<?php $counter++;
					// Show gallery in 3 rows ?>
					<figure class='gallery-item'>
						<a class="colorbox" href="<?php $image = wp_get_attachment_image_src( $attachment->ID, 'full' ); echo $image[0]; ?>" title="<?php echo esc_attr( get_the_title( $attachment->ID ) ); ?>" rel="attachment">
							<?php echo wp_get_attachment_image( $attachment->ID, 'gallery-thumb' ); ?>
						</a>
						<?php if ( !empty( $attachment->post_excerpt ) ) : ?>
							<figcaption class='wp-caption-text gallery-caption'>
								<?php echo apply_filters( 'the_excerpt', $attachment->post_excerpt ); ?>
							</figcaption><!-- .gallery-caption -->
						<?php endif; ?>
					</figure><!-- .gallery-item -->
					<?php if( !( $counter % 3 ) && ( $attachment != end( $attachments ) ) ) :
						// If 3 images have been shown, end the image row and open a new one ?>
							<div class="clear"></div>
						</div><!-- .gallery-row -->
						<div class="gallery-row">
					<?php endif; ?>
				<?php endforeach; ?>
				<div class="clear"></div>
			</div><!-- .gallery-row -->
		</div><!-- .post-gallery -->
	<?php endif;
}
endif;

if ( ! function_exists( 'minimatica_post_video' ) ) :
/**
 * Video playback support for post with the video format
 *
 * Displays the attached video in a HTML5 <video> tag with flash fallback
 * If more then one attached video is found, they are used as fallback to the first one
 * Should work in most if not all browsers :)
 *
 * @uses get_posts() To retrieve attached videos
 *
 * @since Minimatica 1.0
 */
function minimatica_post_video() {
	// Get attached videos
	$args = array(
		'numberposts' => -1,
		'post_type' => 'attachment',
		'post_mime_type' => 'video',
		'post_parent' => get_the_ID()
	);
	$attachments = get_posts( $args );
	// Reverse array to display them in chronological form instead of reverse chronological
	$attachments = array_reverse( $attachments );
	if( count( $attachments ) ) :
		// Detect flash video format to use it as fallback
		$mime_types = array();
		foreach( $attachments as $attachment ) :
			if( $attachment->post_mime_type == 'video/x-flv' )
				$flash_video = $attachment;
		endforeach;
	endif;
	if( count( $attachments ) && ! post_password_required() ) : ?>
		<div class="entry-attachment">
			<video controls width="700" height="444" poster="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'video-thumb' ); echo $image[0]; // Use post thumbnail as video poster ?>" id="video-player">
				<?php foreach( $attachments as $attachment ) :
					// Show each video file as a fallback source ?>
					<source src="<?php echo wp_get_attachment_url( $attachment->ID ); ?>" type='<?php echo $attachment->post_mime_type; if( $attachment->post_mime_type == 'video/mp4' ) echo '; codecs="avc1.42E01E, mp4a.40.2"'; elseif( $attachment->post_mime_type == 'video/webm' ) echo '; codecs="vp8, vorbis"'; elseif( $attachment->post_mime_type == 'video/ogg' ) echo '; codecs="theora, vorbis"'; ?>'>
				<?php endforeach; ?>
			</video>
			<?php if( isset( $flash_video ) ) :
				// Display flash fallback ?>
				<?php if( count( $attachments ) ) : ?>
				<div id="player"></div>
				<script type="text/javascript">
				/* <![CDATA[ */
					var videoTag = document.createElement('video');
					if( !( !!( videoTag.canPlayType ) && ( <?php foreach( $attachments as $attachment ) : ?>( ( "no" != videoTag.canPlayType( "<?php echo $attachment->post_mime_type; ?>" ) ) && ( "" != videoTag.canPlayType( "<?php echo $attachment->post_mime_type; ?>" ) ) )<?php if( $attachment != end( $attachments ) ) : ?> || <?php endif; ?><?php endforeach; ?> ) ) ) {
						document.getElementById("video-player").style.display="none";
						var flashvars = {
							skin: "<?php echo get_template_directory_uri(); ?>/video-player/skin.swf",
							video: "<?php echo wp_get_attachment_url( $flash_video->ID ); ?>",
							thumbnail: "<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'video-thumb' ); echo $image[0] ?>"
						};
						var params = {
							quality: "high",
							menu: "false",
							allowFullScreen: "true",
							scale: "noscale",
							allowScriptAccess: "always",
							swLiveConnect: "true"
						};
						var attributes = {
							id: "f4-player"
						};
						swfobject.embedSWF("<?php echo get_template_directory_uri(); ?>/video-player/player.swf", "player", "700", "444", "9.0.0","expressInstall.swf", flashvars, params, attributes);
					} else {
						document.getElementById("player").style.display="none";
					}
				/* ]]> */
				</script>
				<?php endif; ?>
			<?php endif; ?>
		</div><!-- .entry-attachment -->
	<?php endif;
}
endif;

if ( ! function_exists( 'minimatica_post_audio' ) ) :
/**
 * Audio playback support for post with the audio format
 *
 * Displays the attached audio files in a HTML5 <audio> tag with flash fallback
 * If more then one attached audio file is found, they are used as fallback to the first one
 * Should work in most if not all browsers :)
 *
 * @uses get_posts() To retrieve attached audio files
 *
 * @since Minimatica 1.0
 */
function minimatica_post_audio() {
	// Get attached audio files
	$args = array(
		'numberposts' => -1,
		'post_type' => 'attachment',
		'post_mime_type' => 'audio',
		'post_parent' => get_the_ID()
	);
	$attachments = get_posts( $args );
	// Reverse array to display them in chronological form instead of reverse chronological
	$attachments = array_reverse( $attachments );
	if( count( $attachments ) ) :
		// Detect MP3 file to use it as flash fallback
		$mime_types = array();
		foreach( $attachments as $attachment ) :
			if( $attachment->post_mime_type == 'audio/mpeg' )
				$flash_audio = $attachment;
		endforeach;
	endif;
	if( count( $attachments ) && ! post_password_required() ) : ?>
		<div class="entry-attachment">
			<audio controls id="player">
				<?php foreach( $attachments as $attachment ) : ?>
					<source src="<?php echo wp_get_attachment_url( $attachment->ID ); ?>">
				<?php endforeach; ?>
			</audio>
			<?php if( isset( $flash_audio ) ) :
				// Display flash fallback ?>
				<div id="audioplayer"></div>
				<script type="text/javascript">
					var audioTag = document.createElement('audio');
						if( !( !!( audioTag.canPlayType ) && ( <?php foreach( $attachments as $attachment ) : ?>( ( "no" != audioTag.canPlayType( "<?php echo $attachment->post_mime_type; ?>" ) ) && ( "" != audioTag.canPlayType( "<?php echo $attachment->post_mime_type; ?>" ) ) )<?php if( $attachment != end( $attachments ) ) : ?> || <?php endif; ?><?php endforeach; ?> ) ) ) {
						document.getElementById("player").style.display="none";
						AudioPlayer.embed("audioplayer", {soundFile: "<?php echo wp_get_attachment_url( $flash_audio->ID ); ?>"});
					}
				</script>
			<?php endif; ?>
		</div><!-- .entry-attachment -->
	<?php endif;
}
endif;

if ( ! function_exists( 'minimatica_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Minimatica 1.0
 */
function minimatica_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
	<article id="comment-<?php comment_ID(); ?>" class="comment-body">
		<header class="comment-header">
			<div class="comment-author vcard">
				<?php echo get_avatar( $comment, 64 ); ?>
				<?php printf( __( '%s <span class="says">says:</span>', 'minimatica' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
			</div><!-- .comment-author .vcard -->
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'minimatica' ); ?></em>
				<br />
			<?php endif; ?>
			<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
				<?php printf( __( '%1$s at %2$s', 'minimatica' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'minimatica' ), ' ' ); ?>
			</div><!-- .comment-meta .commentmetadata -->
		</header><!-- .comment-header -->
		<div class="comment-content"><?php comment_text(); ?></div>
		<footer class="comment-footer">
			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</footer><!-- .comment-footer -->
	</article><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="pingback">
		<p><?php _e( 'Pingback:', 'minimatica' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'minimatica' ), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;
<?php
/**
 * The Theme Options page
 *
 * This page is implemented using the Settings API
 * http://codex.wordpress.org/Settings_API
 * Big thanks to Chip Bennett for the great article on how to implement the Settings API
 * http://www.chipbennett.net/2011/02/17/incorporating-the-settings-api-in-wordpress-themes/
 * 
 * @package WordPress
 * @subpackage Minimatica
 * @since Minimatica 1.0
 */

global $pagenow;
if( ( 'themes.php' == $pagenow ) && ( isset( $_GET['activated'] ) && ( $_GET['activated'] == 'true' ) ) ) :
/**
 * Set default options on activation
 */
function minimatica_init_options() {
	$options = get_option( 'minimatica_options' );
	if ( false === $options ) {
		$options = minimatica_default_options();
	}
	update_option( 'minimatica_options', $options );
}

add_action( 'after_setup_theme', 'minimatica_init_options', 9 );
endif;

/**
 * Register the options page
 */
function minimatica_theme_page() {
	add_theme_page( __( 'Minimatica Theme Options', 'minimatica' ), __( 'Theme Options', 'minimatica' ), 'edit_theme_options', 'minimatica-options', 'minimatica_theme_options_page' );
}

add_action( 'admin_menu', 'minimatica_theme_page');

/**
 * Output the options page
 */
function minimatica_theme_options_page() { ?>
	<div class="wrap">
		<h2><?php _e( 'Minimatica Theme Options', 'minimatica' ); ?></h2>
		<?php if ( isset( $_GET['settings-updated'] ) )
			echo "<div class='updated'><p>" . __( 'Theme settings updated successfully', 'minimatica' ) . ".</p></div>"; ?>
		<form action="options.php" method="post">
			<?php settings_fields( 'minimatica_options' ); ?>
			<?php do_settings_sections( 'minimatica' ); ?>
			<div style="margin-bottom:20px"></div>
			<input type="submit" name="minimatica_options[submit]" class="button-primary" value="<?php _e( 'Save Settings', 'minimatica' ); ?>" />
			<input type="submit" name="minimatica_options[reset]" class="button-secondary" value="<?php _e( 'Reset Defaults', 'minimatica' ); ?>" />
		</form>
	</div><!-- .wrap -->
	<?php
}

/**
 * Register the theme options setting
 */
function minimatica_register_settings() {
	register_setting( 'minimatica_options', 'minimatica_options', 'minimatica_validate_options' );
}

add_action( 'admin_init', 'minimatica_register_settings' );

/**
 * Add settings sections
 */
function minimatica_add_settings_sections() {
	add_settings_section( 'minimatica_options', __( 'Page View Options', 'minimatica' ), 'minimatica_add_settings_fields', 'minimatica' );
}

add_action( 'admin_init', 'minimatica_add_settings_sections' );

/**
 * Add settings fields
 */
function minimatica_add_settings_fields() {
	add_settings_field( 'minimatica_homepage_view', __( 'Home Page View', 'minimatica' ), 'minimatica_homepage_view', 'minimatica', 'minimatica_options' );
	add_settings_field( 'minimatica_category_view', __( 'Category View', 'minimatica' ), 'minimatica_category_view', 'minimatica', 'minimatica_options' );
	add_settings_field( 'minimatica_tag_view', __( 'Tag View', 'minimatica' ), 'minimatica_tag_view', 'minimatica', 'minimatica_options' );
	add_settings_field( 'minimatica_author_view', __( 'Author View', 'minimatica' ), 'minimatica_author_view', 'minimatica', 'minimatica_options' );
	add_settings_field( 'minimatica_archive_view', __( 'Archive View', 'minimatica' ), 'minimatica_archive_view', 'minimatica', 'minimatica_options' );
	add_settings_field( 'minimatica_blog_category', __( 'Blog Category' , 'minimatica' ), 'minimatica_blog_category', 'minimatica', 'minimatica_options' );
}

/**
 * Output form item for home page view
 */
function minimatica_homepage_view() {
	$options = get_option( 'minimatica_options' ); ?>
	<select name="minimatica_options[homepage_view]">
		<option <?php selected( 'gallery' == $options['homepage_view'] ); ?> value="gallery">Gallery</option>
		<option <?php selected( 'blog' == $options['homepage_view'] ); ?> value="blog">Blog</option>
     </select>
	<?php
}

/**
 * Output form item for category view
 */
function minimatica_category_view() {
	$options = get_option( 'minimatica_options' ); ?>
	<select name="minimatica_options[category_view]">
		<option <?php selected( 'gallery' == $options['category_view'] ); ?> value="gallery">Gallery</option>
		<option <?php selected( 'blog' == $options['category_view'] ); ?> value="blog">Blog</option>
     </select>
	<?php
}

/**
 * Output form item for tag view
 */
function minimatica_tag_view() {
	$options = get_option( 'minimatica_options' ); ?>
	<select name="minimatica_options[tag_view]">
		<option <?php selected( 'gallery' == $options['tag_view'] ); ?> value="gallery">Gallery</option>
		<option <?php selected( 'blog' == $options['tag_view'] ); ?> value="blog">Blog</option>
     </select>
	<?php
}

/**
 * Output form item for author view
 */
function minimatica_author_view() {
	$options = get_option( 'minimatica_options' ); ?>
	<select name="minimatica_options[author_view]">
		<option <?php selected( 'gallery' == $options['author_view'] ); ?> value="gallery">Gallery</option>
		<option <?php selected( 'blog' == $options['author_view'] ); ?> value="blog">Blog</option>
     </select>
	<?php
}

/**
 * Output form item for archive view
 */
function minimatica_archive_view() {
	$options = get_option( 'minimatica_options' ); ?>
	<select name="minimatica_options[archive_view]">
		<option <?php selected( 'gallery' == $options['archive_view'] ); ?> value="gallery">Gallery</option>
		<option <?php selected( 'blog' == $options['archive_view'] ); ?> value="blog">Blog</option>
     </select>
	<?php
}

/**
 * Output form item for blog category
 */
function minimatica_blog_category() {
	$options = get_option( 'minimatica_options' );
	$categories = get_categories( array( 'hide_empty' => 0, 'hierarchical' => 0 ) );  ?>
	<select name="minimatica_options[blog_category]">
		<option <?php selected( 0 == $options['blog_category'] ); ?> value="0"><?php _e( '--none--', 'minimatica' ); ?></option>
		<?php foreach( $categories as $category ) : ?>
			<option <?php selected( $category->term_id == $options['blog_category'] ); ?> value="<?php echo $category->term_id; ?>"><?php echo $category->cat_name; ?></option>
		<?php endforeach; ?>
     </select>
	<?php
}

/**
 * Sanitize and validate options
 */
function minimatica_validate_options( $input ) {
	$submit = ( ! empty( $input['submit'] ) ? true : false );
	$reset = ( ! empty( $input['reset'] ) ? true : false );
	if( $submit ) :
		$options = get_option( 'minimatica_options' );
		$view = array( 'gallery', 'blog' );
		if( !in_array( $input['homepage_view'], $view ) )
			$input['homepage_view'] = $options['homepage_view'];
		if( !in_array( $input['category_view'], $view ) )
			$input['category_view'] = $options['category_view'];
		if( !in_array( $input['author_view'], $view ) )
			$input['author_view'] = $options['author_view'];
		if( !in_array( $input['tag_view'], $view ) )
			$input['tag_view'] = $options['tag_view'];
		if( !in_array( $input['archive_view'], $view ) )
			$input['archive_view'] = $options['archive_view'];
		$categories = get_categories( array( 'hide_empty' => 0, 'hierarchical' => 0 ) );
		$cat_ids = array();
		foreach( $categories as $category )
			$cat_ids[] = $category->term_id;
		if( !in_array( $input['blog_category'], $cat_ids ) && ( $input['blog_category'] != 0 ) )
			$input['blog_category'] = $options['blog_category'];
		return $input;
	elseif( $reset ) :
		$input = minimatica_default_options();
		return $input;
	endif;
}
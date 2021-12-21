<?php
add_action('init', 'gallery_register');
function gallery_register() {
 
	$labels = array(
		'name' => _x('Photos', 'post type general name', MAX_SHORTNAME),
		'singular_name' => _x('Photo', 'post type singular name', MAX_SHORTNAME),
		'add_new' => _x('Add New', 'gallery', MAX_SHORTNAME),
		'add_new_item' => __('Add A New Photo to a Gallery', MAX_SHORTNAME),
		'edit_item' => __('Edit Photo', MAX_SHORTNAME),
		'new_item' => __('New Photo', MAX_SHORTNAME),
		'view_item' => __('View Photo', MAX_SHORTNAME),
		'search_items' => __('Search Photos', MAX_SHORTNAME),
		'not_found' =>  __('No Photos found', MAX_SHORTNAME),
		'not_found_in_trash' => __('No Photos found in Trash', MAX_SHORTNAME), 
		'parent_item_colon' => '',
		'menu_name' => 'Photos'
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
		'supports' => array ('thumbnail', 'excerpt', 'comments', 'editor', 'title', 'revisions', 'author', 'custom-fields'),
		'taxonomies' => array('post_tag') ,
		'menu_position' => 55, 
		'query_var' => true,
		'rewrite' => true
	  ); 

	register_post_type( 'gallery' , $args );

	$gal_labels = array(
		'name' => _x( 'Galleries', 'taxonomy general name', MAX_SHORTNAME ),
		'singular_name' => _x( 'Gallery', 'taxonomy singular name', MAX_SHORTNAME ),
		'search_items' =>  __( 'Search Galleries', MAX_SHORTNAME),
		'popular_items' => __( 'Popular Galleries', MAX_SHORTNAME ),
		'all_items' => __( 'All Galleries', MAX_SHORTNAME ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit Galleries', MAX_SHORTNAME ), 
		'update_item' => __( 'Update Galleries', MAX_SHORTNAME ),
		'add_new_item' => __( 'Add New Gallery', MAX_SHORTNAME ),
		'new_item_name' => __( 'New Gallery Name', MAX_SHORTNAME ),
		'separate_items_with_commas' => __( 'Separate galleries with commas', MAX_SHORTNAME ),
		'add_or_remove_items' => __( 'Add or remove Galleries', MAX_SHORTNAME ),
		'choose_from_most_used' => __( 'Choose from the most used Galleries', MAX_SHORTNAME ),
		'menu_name' => __( 'Galleries', MAX_SHORTNAME ),
	);	
	
	add_post_type_support('gallery', 'thumbnail'); 

	// register new taxonomy 
	register_taxonomy(GALLERY_TAXONOMY, "gallery", array("hierarchical" => true, "label" => __( 'Galleries', MAX_SHORTNAME ), "singular_label" => __( 'Gallery', MAX_SHORTNAME ), "labels" => $gal_labels, "rewrite" => true));

}


// saving posts
function save_postdata( $post_id ) {

	if ( isset($_POST['myplugin_noncename']) && !wp_verify_nonce( $_POST['myplugin_noncename'], plugin_basename(__FILE__) )) {
		return $post_id;
	}
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
	if ( isset($_POST['post_type']) && 'page' == $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post_id ) )
			return $post_id;
		} else {
		if ( !current_user_can( 'edit_post', $post_id ) )
			return $post_id;
	}
	if ( $parent_id = wp_is_post_revision($post_id) ){
		$post_id = $parent_id;
	}
}
add_action('save_post', 'save_postdata'); 

?>
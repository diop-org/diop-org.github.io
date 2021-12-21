<?php

/*--------------------------------------------------------------------------*/
/*	Register WP3.0+ Menus
/*--------------------------------------------------------------------------*/
register_nav_menus( array(
	'primary' => __( 'Primary Navigation', MAX_SHORTNAME ),
) );

/*--------------------------------------------------------------------------*/
/*	Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
/*--------------------------------------------------------------------------*/

function max_page_menu_args($args) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'max_page_menu_args' );

/*-----------------------------------------------------------------------------------*/
/*	Menu walker for the nav_menu menu
/*-----------------------------------------------------------------------------------*/
/* Special Thanks to kriesi for his tutorial about walker http://www.kriesi.at/archives/improve-your-wordpress-navigation-menu-output
*/

class menu_walker extends Walker_Nav_Menu {
	
	function start_el(&$content, $item, $depth, $args) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "", $depth ) : '';

		$css_classes = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$css_classes = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$css_classes = ' class="'. esc_attr( $css_classes ) . '"';

		$content .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $css_classes .'>';

		$attr  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attr .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attr .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attr .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$prep = ''; $app = '';
		$desc = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attr .'><span>';
		$item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
		$item_output .= '</span></a>';
		$item_output .= $args->after;

		$content .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}


?>
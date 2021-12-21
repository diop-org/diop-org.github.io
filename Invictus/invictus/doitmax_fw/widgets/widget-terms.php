<?php 

/*-----------------------------------------------------------------------------------*/
/*	 Widget for Taxonomies
/*-----------------------------------------------------------------------------------*/

class WP_Widget_Taxonomy_Terms extends WP_Widget {

	function WP_Widget_Taxonomy_Terms() {
		
		$widget_ops = array( 'classname' => 'widget_taxonomy_terms' , 'description' => __( "A list, dropdown, or cloud of taxonomy terms", MAX_SHORTNAME ) );
		$this->WP_Widget( 'taxonomy_terms' , __( 'Taxonomy Terms', MAX_SHORTNAME ) , $widget_ops );	
		$this->alt_option_name = 'widget_taxonomy_terms';
			
		add_action( 'save_post', array(&$this, 'flush_widget_cache') );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
		
	}

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/

  function widget( $args , $instance ) {
	  
	global $shortname;
	
    $cache = wp_cache_get('widget_custom_taxonomy_terms', 'widget');

    if ( !is_array($cache) )
         $cache = array();

    if ( isset($cache[$args['widget_id']]) ) {
       echo $cache[$args['widget_id']];
        return;
    }

	ob_start();	 	  
    extract( $args );

    $current_taxonomy = $this->_get_current_taxonomy( $instance );
    $tax = get_taxonomy( $current_taxonomy );
    if ( !empty( $instance['title'] ) ) {
      $title = $instance['title'];
    } else {
      $title = $tax->labels->name;
    }

    global $t;
    $t = $instance['taxonomy'];
    $f = $instance['format'];
    $c = $instance['count'] ? '1' : '0';
    $h = $instance['hierarchical'] ? '0' : '1';

    $w = $args['widget_id'];
    $w = 'ttw' . str_replace( 'taxonomy_terms-' , '' , $w );

    echo $before_widget;
    if ( $title )
      echo $before_title . $title . $after_title;

    $tax_args = array( 'orderby' => 'name' , 'show_count' => $c , 'hierarchical' => $h , 'taxonomy' => $t );

    if ( $f == 'dropdown' ) {
      $tax_args['show_option_none'] = __( 'Select ' . $tax->labels->singular_name );
      $tax_args['name'] = __( $w );
      $tax_args['echo'] = false;
      $my_dropdown_categories = wp_dropdown_categories( apply_filters( 'widget_categories_dropdown_args' , $tax_args ) );

      $my_get_term_link = create_function( '$matches' , 'global $t; return "value=\"" . get_term_link( (int) $matches[1] , $t ) . "\"";' );
      echo preg_replace_callback( '#value="(\d+)"#' , $my_get_term_link , $my_dropdown_categories );

	?>
	<script type='text/javascript'>
	/* <![CDATA[ */
	  var dropdown<?php echo $w; ?> = document.getElementById("<?php echo $w; ?>");
	  function on<?php echo $w; ?>change() {
		if ( dropdown<?php echo $w; ?>.options[dropdown<?php echo $w; ?>.selectedIndex].value != '-1' ) {
		  location.href = dropdown<?php echo $w; ?>.options[dropdown<?php echo $w; ?>.selectedIndex].value;
		}
	  }
	  dropdown<?php echo $w; ?>.onchange = on<?php echo $w; ?>change;
	/* ]]> */
	</script>
	<?php
	
		} elseif ( $f == 'list' ) {
	
	?>
		<ul class="clearfix">
	<?php
	
		$tax_args['title_li'] = '';
		wp_list_categories( apply_filters( 'widget_categories_args' , $tax_args ) );
	
	?>
		</ul>
	<?php
	
		} else {
	
	?>
		<div>
	<?php
	
		  wp_tag_cloud( apply_filters( 'widget_tag_cloud_args' , array( 'taxonomy' => $t ) ) );
	
	?>
		</div>
	<?php
	
		}
		echo $after_widget;
	  }

/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/

	function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['taxonomy'] = stripslashes( $new_instance['taxonomy'] );
		$instance['format'] = stripslashes( $new_instance['format'] );
		$instance['count'] = !empty( $new_instance['count'] ) ? 1 : 0;
		$instance['hierarchical'] = !empty( $new_instance['hierarchical'] ) ? 1 : 0;

		$this->flush_widget_cache();	
		 
        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_custom_taxonomy_terms']) )
            delete_option('widget_custom_taxonomy_terms');

        return $instance;	
	}
	
    function flush_widget_cache() {
        wp_cache_delete('widget_custom_taxonomy_terms', 'widget');
    }	
  
  
/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/

  function form( $instance ) {
    //Defaults
    $instance = wp_parse_args( (array) $instance , array( 'title' => '' ) );
    $current_taxonomy = $this->_get_current_taxonomy( $instance );
    $current_format = esc_attr( $instance['format'] );
    $title = esc_attr( $instance['title'] );
    $count = isset( $instance['count'] ) ? (bool) $instance['count'] : false;
    $hierarchical = isset( $instance['hierarchical'] ) ? (bool) $instance['hierarchical'] : false;

	?>
    <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'invictus' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

    <p><label for="<?php echo $this->get_field_id( 'taxonomy' ); ?>"><?php _e( 'Taxonomy:','invictus' ) ?></label>
    <select class="widefat" id="<?php echo $this->get_field_id( 'taxonomy' ); ?>" name="<?php echo $this->get_field_name( 'taxonomy' ); ?>">
	
	<?php

    $args = array(
      'public' => true ,
      '_builtin' => false
    );
    $output = 'names';
    $operator = 'and';

    $taxonomies = get_taxonomies( $args , $output , $operator );
    $taxonomies = array_merge( $taxonomies, array( 'category' , 'post_tag' ) );
    foreach ( $taxonomies as $taxonomy ) {
      $tax = get_taxonomy( $taxonomy );
      if ( empty( $tax->labels->name ) )
        continue;
	?>
    <option value="<?php echo esc_attr( $taxonomy ); ?>" <?php selected( $taxonomy , $current_taxonomy ); ?>><?php echo $tax->labels->name; ?></option>
	<?php

    }

	?>
    </select></p>

    <p><label for="<?php echo $this->get_field_id( 'format' ); ?>"><?php _e( 'Format:','invictus' ) ?></label>
    <select class="widefat" id="<?php echo $this->get_field_id( 'format' ); ?>" name="<?php echo $this->get_field_name( 'format' ); ?>">
	<?php

    $formats = array( 'list' , 'dropdown' , 'cloud' );
    foreach( $formats as $format ) {

	?>
    <option value="<?php echo esc_attr( $format ); ?>" <?php selected( $format , $current_format ); ?>><?php echo ucfirst( $format ); ?></option>
	<?php

    }

	?>
    </select></p>
    <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>"<?php checked( $count ); ?> />
    <label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e( 'Show post counts','invictus' ); ?></label><br />

    <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'hierarchical','invictus' ); ?>" name="<?php echo $this->get_field_name( 'hierarchical' ); ?>"<?php checked( $hierarchical ); ?> />
    <label for="<?php echo $this->get_field_id( 'hierarchical' ); ?>"><?php _e( 'Show hierarchy','invictus' ); ?></label></p>
<?php

  }

  function _get_current_taxonomy( $instance ) {
    if ( !empty( $instance['taxonomy'] ) && taxonomy_exists( $instance['taxonomy'] ) )
      return $instance['taxonomy'];
    else
      return 'category';
  }
  
}


/*-----------------------------------------------------------------------------------*/
/*	Register Widget
/*-----------------------------------------------------------------------------------*/

add_action( 'widgets_init', 'max_taxonomy_terms_widget' );

function max_taxonomy_terms_widget() {
	register_widget( 'WP_Widget_Taxonomy_Terms' );
}

?>
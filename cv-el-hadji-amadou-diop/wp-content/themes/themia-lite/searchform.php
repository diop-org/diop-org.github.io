<h2><?php _e( 'Search Here', 'themia' ); ?></h2>
<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
     <div>
          <input type="text" onfocus="if (this.value == '<?php _e( 'Search', 'themia' ); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e( 'Search', 'themia' ); ?>';}"  value="<?php _e( 'Search', 'themia' ); ?>" name="s" id="s" />
          <input type="submit" id="searchsubmit" value="<?php _e( 'Search', 'themia' ); ?>" />
     </div>
</form>

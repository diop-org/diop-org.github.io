<?php
/*
@package WordPress
@subpackage Desire
*/
?>
<?php
/*---------------------------------------------------------------------------------*/
/* Tabbed content widget */
/*---------------------------------------------------------------------------------*/
class Desire_Widget_Tabbed_Content extends WP_Widget {
    var $settings = array('number_of_posts','number_of_comments');
    function Desire_Widget_Tabbed_Content() {
        global $desire_shortname;
        $widget_ops = array('description' => __('Display tabbed content on sidebar with this widget.', 'desire'));
        parent::WP_Widget(false, __('Tabbed Content', 'desire'), $widget_ops);
    }

    function widget($args, $instance) {
        global $options;
        extract( $args, EXTR_SKIP );
        $instance = $this->widget_enforce_defaults($instance);
        extract($instance, EXTR_SKIP);

        $unique_id = $args['widget_id'];
        echo $before_widget;
        ?>
        <span id="tab-recent" class="widget-tab current-tab" style="width: 30%;"><?php _e('Recent','desire'); ?></span>
        <span id="tab-comments" class="widget-tab" style="width: 36%;"><?php _e('Comments','desire'); ?></span>
        <span id="tab-tags" class="widget-tab" style="width: 20%;"><?php _e('Tags','desire'); ?></span>

        <div class="widget-tab-content current-content" id="tab-content-recent">
            <?php desire_get_recent_posts($number_of_posts); ?>
        </div>
        <div class="widget-tab-content" id="tab-content-comments">
            <?php desire_get_recent_comments($number_of_comments); ?>
        </div>
        <div class="widget-tab-content" id="tab-content-tags">
            <div class="widget_tag_cloud tabbed-tag-cloud"><?php wp_tag_cloud(); ?></div>
        </div>
        <?php
        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $new_instance = $this->widget_enforce_defaults($new_instance);
        return $new_instance;
    }

    function widget_enforce_defaults($instance) {
        $defaults = $this->widget_get_settings();
        $instance = wp_parse_args( $instance, $defaults );
        $instance['number_of_posts'] = intval( $instance['number_of_posts'] );
        $instance['number_of_comments'] = intval( $instance['number_of_comments'] );
        if ( $instance['number_of_posts'] < 1 )
            $instance['number_of_posts'] = 5;
        if ( $instance['number_of_comments'] < 1 )
            $instance['number_of_comments'] = 5;
        return $instance;
    }

    function widget_get_settings() {
        // Set the default to a blank string
        $settings = array_fill_keys( $this->settings, '' );
        // Now set the more specific defaults
        $settings['number_of_posts'] = 5;
        $settings['number_of_comments'] = 5;
        return $settings;
    }

    function form($instance) {
        global $desire_shortname;
        $instance = $this->widget_enforce_defaults($instance);
        extract( $instance, EXTR_SKIP );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'number_of_posts' ); ?>"><?php _e( 'Numer of Posts:', 'desire'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name( 'number_of_posts' ); ?>"  value="<?php echo esc_attr( $number_of_posts ); ?>" class="" size="3" id="<?php echo $this->get_field_id( 'number_of_posts' ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'number_of_comments' ); ?>"><?php _e( 'Number of Comments:', 'desire'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name( 'number_of_comments' ); ?>"  value="<?php echo esc_attr( $number_of_comments ); ?>" class="" size="3" id="<?php echo $this->get_field_id( 'number_of_comments' ); ?>" />
        </p>
        <?php
    }
}
register_widget('Desire_Widget_Tabbed_Content');
?>
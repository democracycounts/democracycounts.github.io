<?php
class Testimonial_Widget extends WP_Widget {

    function Testimonial_Widget(){
        $widget_ops = array( 'classname' => 'testimonial', 'description' => __('This widget displays a testimonial.', 'framework'));
        $this->WP_Widget( 'Testimonial_Widget', __('Political Press - Testimonial', 'framework'), $widget_ops );
    }



    function widget($args,  $instance) {
        extract($args);
        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
        echo $before_widget;
        if(!empty($title)):
            echo $before_title . $title . $after_title;
        endif;
        $testimonial_text =  $instance['testimonial_text'];
        $testimonial_author =  $instance['testimonial_author'];
        if(!empty($testimonial_text)){
            ?>
            <div class="testimonial-widget">
                <blockquote>
                    <div class="top-quotes"></div>
                    <p>
                        <?php
                        echo stripslashes(htmlspecialchars_decode($testimonial_text));
                        if(!empty($testimonial_author)){
                            ?><strong><?php echo $testimonial_author; ?></strong><?php
                        }
                        ?>
                    </p>
                    <div class="bottom-quotes"></div>
                </blockquote>
            </div>
            <?php
        }
        echo $after_widget;
    }



    function form($instance) {

        $instance = wp_parse_args( (array) $instance, array( 'title' => __('Testimonial', 'framework'), 'testimonial_text' => '', 'testimonial_author' => '' ) );

        $title = strip_tags($instance['title']);
        $testimonial_text =  esc_textarea($instance['testimonial_text']);
        $testimonial_author =  strip_tags($instance['testimonial_author']);

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'framework'); ?></label>
            <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" class="widefat" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('testimonial_text'); ?>"><?php _e('Testimonial Text', 'framework'); ?></label>
            <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('testimonial_text'); ?>" name="<?php echo $this->get_field_name('testimonial_text'); ?>"><?php echo $testimonial_text; ?></textarea>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Testimonial Author', 'framework'); ?></label>
            <input id="<?php echo $this->get_field_id('testimonial_author'); ?>" name="<?php echo $this->get_field_name('testimonial_author'); ?>" type="text" value="<?php echo esc_attr($testimonial_author); ?>" class="widefat" />
        </p>
        <?php
    }


    function update($new_instance, $old_instance)
    {
        $instance=$old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['testimonial_text'] = $new_instance['testimonial_text'];
        $instance['testimonial_author'] = strip_tags($new_instance['testimonial_author']);

        return $instance;
    }


}

?>
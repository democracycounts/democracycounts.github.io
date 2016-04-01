<?php
class Video_Widget extends WP_Widget {

    function Video_Widget(){
        $widget_ops = array( 'classname' => 'video-widget', 'description' => __('This widget displays a video based on provided embed code.', 'framework'));
        $this->WP_Widget( 'video_widget', __('Political Press - Video', 'framework'), $widget_ops );
    }



    function widget($args,  $instance) {
        extract($args);
        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
        echo $before_widget;
        if(!empty($title)):
            echo $before_title . $title . $after_title;
        endif;
        $video_embed_code =  $instance['video_embed_code'];
        if(!empty($video_embed_code)){
            ?>
            <div class="post-video">
                <div class="video-wrapper">
                    <?php echo stripslashes(htmlspecialchars_decode($video_embed_code)); ?>
                </div>
            </div>
            <?php
        }
        echo $after_widget;
    }



    function form($instance) {

        $instance = wp_parse_args( (array) $instance, array( 'title' => __('Video', 'framework'), 'video_embed_code' => '' ) );

        $title = strip_tags($instance['title']);
        $video_embed_code =  esc_textarea($instance['video_embed_code']);

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'framework'); ?></label>
            <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" class="widefat" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('video_embed_code'); ?>"><?php _e('Video Embed Code', 'framework'); ?></label>
            <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('video_embed_code'); ?>" name="<?php echo $this->get_field_name('video_embed_code'); ?>"><?php echo $video_embed_code; ?></textarea>
        </p>
        <?php
    }


    function update($new_instance, $old_instance)
    {
        $instance=$old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['video_embed_code'] = $new_instance['video_embed_code'];

        return $instance;
    }


}

?>
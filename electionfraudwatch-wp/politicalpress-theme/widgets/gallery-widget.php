<?php

class Gallery_Widget extends WP_Widget {

    function Gallery_Widget() {
        $widget_ops = array( 'classname' => 'gallery-widget', 'description' => __('This widget displays gallery images in a slider.', 'framework'));
        $this->WP_Widget( 'gallery_widget', __('Political Press - Gallery', 'framework'), $widget_ops );
    }

    function form($instance) {
        $instance = wp_parse_args( (array) $instance, array( 'title' => __('Gallery', 'framework'), 'images_count' => 4 ) );

        $title = esc_attr($instance['title']);
        $images_count =  $instance['images_count'];

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title','framework'); ?></label>
            <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" class="widefat" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('images_count'); ?>"><?php _e('Number of Images', 'framework'); ?></label>
            <input id="<?php echo $this->get_field_id('images_count'); ?>" name="<?php echo $this->get_field_name('images_count'); ?>" type="text" value="<?php echo $images_count; ?>" class="widefat" />
        </p>
        <?php

    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['images_count'] = strip_tags($new_instance['images_count']);

        return $instance;
    }

    function widget($args,  $instance) {
        extract($args);
        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

        $images_count =  absint($instance['images_count']);

        echo $before_widget;

        if(!empty($title)):
            echo $before_title . $title . $after_title;
        endif;

        $gallery_query_args = array(
            'post_type' => 'gallery-item',
            'posts_per_page' => $images_count
        );

        $gallery_widget_query = new WP_Query( $gallery_query_args );
        if( $gallery_widget_query->have_posts() ):
            ?>
            <div class="listing-slider">
                <ul class="slides">
                <?php
                while ( $gallery_widget_query->have_posts() ) :
                    $gallery_widget_query->the_post();

                        if(has_post_thumbnail()):
                            $full_image_url = wp_get_attachment_url(get_post_thumbnail_id());
                            ?>
                            <li>
                                <a class="swipebox" href="<?php echo $full_image_url;  ?>" title="<?php the_title(); ?>" >
                                    <?php the_post_thumbnail('gallery-detail-thumb',array('class' => "img-responsive"));?>
                                </a>
                            </li>
                            <?php
                        endif;
                endwhile;
                ?>
                </ul>
            </div>
            <?php
        endif;

        echo $after_widget;

    }
}

?>
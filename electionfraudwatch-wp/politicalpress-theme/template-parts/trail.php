
<div class="container timelines">

    <?php
    global $data;
    if($data['campaign_trail_title']){
        ?><h3 class="title-heading"><?php echo $data['campaign_trail_title']; ?></h3><?php
    }
    ?>

    <div class="timelines-wrapper">
        <ul class="cycle-slideshow"
            data-cycle-fx=flash
            data-cycle-timeout=0
            data-cycle-slides="> li"
            data-cycle-auto-height="container"
            data-cycle-pager="#per-slide-template"
            >
            <?php

            $campaign_trail_events = new WP_Query(array(
                'post_type' => 'campaign-trail-event',
                'posts_per_page' => -1
            ));

            if ( $campaign_trail_events->have_posts() ) {
                while ( $campaign_trail_events->have_posts() ) {
                    $campaign_trail_events->the_post();

                    /* Get All Custom Post Data to Save Data Queries */
                    $post_meta_data = get_post_custom($post->ID);

                    $city_name = $post_meta_data['political_press_city_name'][0];
                    $from_date = $post_meta_data['political_press_from_date'][0];
                    $to_date = $post_meta_data['political_press_to_date'][0];
                    ?>
                    <li class="campaign-trail-list-item" data-cycle-pager-template="<?php echo '<li><a href=#>'.date("d/m/Y",strtotime($from_date)).'</a></li>'; ?>" >
                        <?php
                        if( !empty($post_meta_data['political_press_event_image'][0]) ) {
                            $image_id = $post_meta_data['political_press_event_image'][0];
                            $trail_image = wp_get_attachment_image_src( $image_id,'trail-thumb' );
                            ?><a href="<?php the_permalink(); ?>"><img class="img-responsive" src="<?php echo $trail_image[0]; ?>" alt="<?php the_title(); ?>" /></a><?php
                        }
                        ?>
                        <div class="detail">
                            <?php
                            if( !empty($city_name) ) {
                                ?><h2><?php echo $city_name; ?></h2><?php
                            }
                            ?>
                            <p><?php _e('From','framework');?> <?php echo date( "j M", strtotime( $from_date ) ); ?> <?php _e('to','framework');?> <?php echo date( "j M", strtotime( $to_date ) ); ?></p>
                        </div>
                    </li>
                    <?php
                }
            }
            wp_reset_postdata();
            ?>
        </ul>

        <!-- empty element for pager links -->
        <div class="pager-wrapper">
            <ul id=per-slide-template class="center external"></ul>
            <div class="bottom-line"></div>
        </div>

    </div>

</div>

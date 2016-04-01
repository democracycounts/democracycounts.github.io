<?php get_header(); ?>

<div class="header-bottom-wrapper">
    <div class="container">
        <div class="row">
            <!-- Page Head -->
            <div class="page-head col-lg-12">
                <h2 class="page-title"><?php _e('Campaign Trail Event','framework'); ?></h2>
            </div>
            <!-- End Page Head -->
        </div>
    </div>
</div><!-- End header-bottom-wrapper -->



<div class="page-container container">
    <div class="row">

        <!-- start of page content -->
        <div class="main col-lg-8 col-md-8" role="main">
            <?php
            if(have_posts()):
                while(have_posts()):
                    the_post();

                    /* Get All Custom Post Data to Save Data Queries */
                    $post_meta_data = get_post_custom($post->ID);

                    $city_name = $post_meta_data['political_press_city_name'][0];
                    $from_date = $post_meta_data['political_press_from_date'][0];
                    $to_date = $post_meta_data['political_press_to_date'][0];
                    $venue_address = $post_meta_data['political_press_venue_address'][0];
                    $venue_location = $post_meta_data['political_press_venue_location'][0];
                    ?>
                    <article <?php post_class('clearfix'); ?>>
                        <header>
                            <?php
                            if( !empty($post_meta_data['political_press_event_image'][0]) ) {
                                $image_id = $post_meta_data['political_press_event_image'][0];
                                $trail_image = wp_get_attachment_image_src( $image_id,'trail-thumb' );
                                ?>
                                <figure>
                                    <a href="<?php the_permalink(); ?>">
                                        <img class="img-responsive" src="<?php echo $trail_image[0]; ?>" alt="<?php the_title(); ?>" />
                                    </a>
                                </figure>
                                <?php
                            }
                            ?>
                        </header>
                        <div class="post-content-wrapper clearfix">
                            <div class="row trail-event-info">
                                <ul class="col-lg-6 col-md-6 col-sm-6 event-meta">
                                    <li><strong><?php _e('City:','framework'); ?></strong> <?php echo $city_name; ?></li>
                                    <li><strong><?php _e('From Date:','framework'); ?></strong> <?php echo $from_date; ?></li>
                                    <li><strong><?php _e('To Date:','framework'); ?></strong> <?php echo $to_date; ?></li>
                                    <li><strong><?php _e('Venue Address:','framework'); ?></strong> <?php echo $venue_address; ?></li>
                                </ul>
                                <?php
                                if( !empty($venue_location) ) {
                                    $lat_lng = explode(',',$venue_location);
                                    ?>
                                    <div class="col-lg-6 col-md-6 col-sm-6 event-venue">
                                        <div id="venue-map"  class="map-frame"></div>
                                        <script type="text/javascript">
                                            // Google Map
                                            function initialize_venue_map()
                                            {
                                                var lat = <?php echo $lat_lng[0]; ?>;
                                                var lng = <?php echo $lat_lng[1]; ?>;

                                                var geocoder  = new google.maps.Geocoder();
                                                var latlng = new google.maps.LatLng(lat,lng);
                                                var myOptions = {
                                                    zoom: 15,
                                                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                                                    scrollwheel: false
                                                };
                                                var map = new google.maps.Map(document.getElementById("venue-map"), myOptions);

                                                geocoder.geocode( { 'location': latlng }, function(results, status){
                                                    if(status == google.maps.GeocoderStatus.OK){
                                                        map.setCenter(results[0].geometry.location);
                                                        var marker = new google.maps.Marker({
                                                            map: map,
                                                            position: results[0].geometry.location
                                                        });
                                                    }else{
                                                        alert("Geocode was not successful for the following reason: " + status);
                                                    }
                                                });
                                            }

                                            window.onload = initialize_venue_map();
                                        </script>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <?php the_content(); ?>
                        </div>
                    </article>
                    <?php
                endwhile;
            endif;
            ?>
        </div>
        <!-- end of page content -->

        <!-- start of sidebar -->
        <?php get_sidebar(); ?>

    </div>
</div>

<?php get_footer(); ?>
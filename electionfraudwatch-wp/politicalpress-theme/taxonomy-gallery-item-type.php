<?php

get_header();

?>

    <div class="header-bottom-wrapper">
        <div class="container">
            <div class="row">
                <!-- Page Head -->
                <div class="page-head col-lg-12">
                    <?php
                    $current_term = get_term_by( 'slug', get_query_var('term') ,'gallery-item-type' );
                    ?>
                    <h2 class="page-title"><?php echo $current_term->name; ?></h2>
                </div>
                <!-- End Page Head -->
            </div>
        </div>
    </div><!-- End header-bottom-wrapper -->

    <?php
    $gallery_col = 3;
    $gallery_image_size = 'gallery-detail-thumb';
    ?>

    <div class="page-container container">

        <div id="gallery-container">
            <div class="row gallery-<?php global $gallery_col; echo $gallery_col; ?>-columns isotope clearfix">
                <?php

                while ( have_posts() ) :
                    the_post();

                    /* Terms list */
                    $term_list = '';
                    $terms =  get_the_terms( $post->ID, 'gallery-item-type' );

                    if ( $terms && !is_wp_error( $terms ) ) :
                        foreach( $terms as $term ){
                            $term_list .= $term->slug;
                            $term_list .= ' ';
                        }
                    endif;

                    /* Gallery Class */
                    $gallery_class = 'col-lg-6 col-md-6 col-sm-6 col-xs-6';

                    switch($gallery_col):
                        case 2:
                            $gallery_class = 'col-lg-6 col-md-6 col-sm-6 col-xs-6';
                            break;
                        case 3:
                            $gallery_class = 'col-lg-4 col-md-4 col-sm-4 col-xs-6';
                            break;
                        case 4:
                            $gallery_class = 'col-lg-3 col-md-3 col-sm-3 col-xs-6';
                            break;
                    endswitch;

                    global $gallery_image_size;

                    if(has_post_thumbnail()):
                        $image_id = get_post_thumbnail_id();
                        $featured_image = wp_get_attachment_image_src( $image_id, $gallery_image_size );
                        $full_image_url = wp_get_attachment_url($image_id);
                        ?>
                        <div class="<?php echo "gallery-item isotope-item $term_list $gallery_class"; ?>" >
                            <figure>
                                <a class="zoom swipebox" href="<?php echo $full_image_url;  ?>" title="<?php the_title(); ?>" ></a>
                                <div class="media_container"></div>
                                <img src="<?php echo $featured_image[0]; ?>" alt="<?php the_title(); ?>">
                            </figure>
                            <h5 class="item-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>
                        </div>
                        <?php
                    endif;
                endwhile;
                ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>
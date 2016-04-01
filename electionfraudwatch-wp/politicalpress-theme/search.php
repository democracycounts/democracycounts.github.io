<?php get_header(); ?>

    <div class="header-bottom-wrapper">
        <div class="container">
            <div class="row">
                <!-- Page Head -->
                <div class="page-head col-lg-12">
                    <h2 class="page-title"><?php _e('Search Results:','framework'); ?> <?php the_search_query(); ?></h2>
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
                if ( have_posts() ) :
                    while ( have_posts() ) :
                        the_post();

                        $post_type = get_post_type( $post->ID );
                        if($post_type == 'post'){
                            get_template_part( "template-parts/main-article" );
                        }else if($post_type == 'ai1ec_event'){
                            get_template_part( "template-parts/ai1ec-event-article" );
                        }else{
                            get_template_part( "template-parts/page-article" );
                        }

                    endwhile;
                    global $wp_query;
                    inspiry_pagination( $wp_query );
                else :
                    ?><p class="nothing-found"><?php _e('No Results Found!', 'framework'); ?></p><?php
                endif;
                ?>
            </div>
            <!-- end of page content -->
            <!-- start of sidebar -->
            <?php get_sidebar(); ?>
        </div>
    </div>

<?php get_footer(); ?>
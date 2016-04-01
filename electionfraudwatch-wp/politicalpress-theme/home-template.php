<?php
/*
 *  Template Name: Home Template
 */

get_header();
?>

<div class="header-bottom-wrapper">
    <div class="container">
        <?php get_template_part('template-parts/quote'); ?>
        <div class="row">
            <?php get_template_part('template-parts/slider'); ?>
        </div>
    </div><!-- End of container -->
</div><!-- End header-bottom-wrapper -->

    <?php
    global $data;
    /* Display featured posts below slider area if enabled from theme options */
    if(!empty($data['featured_posts'])){
        ?>
        <div class="blog-items">
            <div class="container">
                <div class="row">
                    <?php
                    $featured_posts_args = array(
                        'posts_per_page' => 3 ,
                        'ignore_sticky_posts' => true
                    );
                    $selected_tag = $data['featured_tag'];
                    if( !empty($selected_tag) ){
                        $featured_tag = get_term_by('name', $selected_tag , 'post_tag');
                        if($featured_tag){
                            $featured_posts_args['tag'] = $featured_tag->slug;
                        }
                    }

                    $featured_query = new WP_Query( $featured_posts_args );

                    if ( $featured_query->have_posts() ){
                        while ( $featured_query->have_posts() ) :
                            $featured_query->the_post();
                            if(has_post_thumbnail($post->ID)){
                                ?>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <figure>
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                            <?php the_post_thumbnail( 'featured-post-thumb',array( 'class' => "img-responsive" ) ); ?>
                                        </a>
                                        <figcaption><?php the_title(); ?></figcaption>
                                    </figure>
                                </div>
                            <?php
                            }
                        endwhile;
                    }
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    <?php
    }

    /* if user want to display campaign trail below header */
    if(!empty($data['campaign_trail'])){
        if($data['campaign_trail_location']==1){
            get_template_part('template-parts/trail');
        }
    }

    ?>

    <div class="page-container container">
        <div class="row">
            <!-- start of page content -->
            <div class="main col-lg-8 col-md-8" role="main">
                <?php
                global $data;
                /* Recent Posts Using Default Layout */
                if($data['recent_posts']){
                    $number_of_recent_posts = empty($data['recent_posts_number'])?1:intval($data['recent_posts_number']);
                    $main_article_ids = array();
                    $main_article_query = new WP_Query( array(
                                                            'posts_per_page' => $number_of_recent_posts,
                                                            'ignore_sticky_posts' => true
                                                        ) );

                    if ( $main_article_query->have_posts() ) :
                        while ( $main_article_query->have_posts() ) :
                            $main_article_query->the_post();
                            $main_article_ids[] = $post->ID;
                            get_template_part( "template-parts/main-article" );
                        endwhile;
                    endif;
                    wp_reset_postdata();
                }
                /* Recent Posts Using Grid Layout */
                if($data['recent_posts_grid']){
                    get_template_part('template-parts/posts-grid');
                }
                ?>
            </div><!-- end of page content -->

            <!-- start of sidebar -->
            <?php get_sidebar('home'); ?>

        </div>
    </div>

    <?php

    /* if user want to display campaign trail above footer */
    if(!empty($data['campaign_trail'])){
        if($data['campaign_trail_location']==0){
            get_template_part('template-parts/trail');
        }
    }

    ?>

<?php get_footer(); ?>
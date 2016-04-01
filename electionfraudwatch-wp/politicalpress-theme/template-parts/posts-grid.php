<div class="row post-grid-2-col">
    <?php
    global $data;
    global $main_article_ids;
    $recent_posts_grid_number = empty($data['recent_posts_grid_number'])?2:intval($data['recent_posts_grid_number']);
    $grid_article_query = new WP_Query( array(
                                            'posts_per_page' => $recent_posts_grid_number ,
                                            'post__not_in' => $main_article_ids ,
                                            'ignore_sticky_posts' => true
                                        ) );

    if ( $grid_article_query->have_posts() ) :
        $post_count = 0;
        while ( $grid_article_query->have_posts() ) :
            $grid_article_query->the_post();
            $format = get_post_format();
            if( false === $format ) {
                $format = 'standard';
            }
            ?>
            <div class="col-lg-6 col-md-6  col-sm-6  col-xs-6">
                <article <?php post_class('clearfix'); ?>>
                    <header>
                        <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="post-meta clearfix">
                            <span><?php _e('By','framework'); ?></span> <?php the_author_posts_link() ?>
                            <span class="date"> <?php _e('on','framework'); ?> <?php the_time('F d, Y'); ?> </span>
                            <span class="category"><?php _e('in','framework'); ?> <?php the_category(', '); ?></span>
                        </div><!-- end of post meta -->
                    </header>
                    <?php
                    get_template_part( "post-formats/grid/$format" );
                    echo '<p>';
                    inspiry_excerpt(18); ?><a href="<?php the_permalink(); ?>" class="read-more"><?php _e('Read More','framework'); ?></a><?php
                    echo '</p>';
                    ?>
                </article>
            </div>
            <?php
            $post_count++;
            if(0 == ($post_count % 2)){
                echo '<div class="clearfix"></div>';
            }
        endwhile;
    endif;
    wp_reset_postdata();
    ?>
</div>
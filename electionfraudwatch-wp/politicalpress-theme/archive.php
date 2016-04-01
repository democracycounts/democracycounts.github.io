<?php get_header(); ?>

    <div class="header-bottom-wrapper">
        <div class="container">
            <div class="row">
                <!-- Page Head -->
                <div class="page-head col-lg-12">
                    <?php
                    $post = $posts[0]; // Hack. Set $post so that the_date() works.

                    if (is_category())
                    {
                        ?>
                        <h1 class="page-title"><?php _e('All Posts in Category:', 'framework'); echo  ' '.single_cat_title('',false); ?></h1>
                        <?php
                    }
                    elseif( is_tag() )
                    {
                        ?>
                        <h1 class="page-title"><?php _e('All Posts Tagged:', 'framework'); echo ' '.single_tag_title('',false); ?></h1>
                        <?php
                    }
                    elseif (is_day())
                    {
                        ?>
                        <h1 class="page-title"><?php _e('Archive for', 'framework') ?> <?php printf( __( '%s', 'framework' ), get_the_date() ); ?></h1>
                        <?php
                    }
                    elseif (is_month())
                    {
                        ?>
                        <h1 class="page-title"><?php _e('Archive for', 'framework') ?> <?php printf( __( '%s', 'framework' ), get_the_date('F Y') );  ?></h1>
                    <?php
                    }
                    elseif (is_year())
                    {
                        ?>
                        <h1 class="page-title"><?php _e('Archive for', 'framework') ?> <?php printf( __( '%s', 'framework' ), get_the_date('Y') ); ?></h1>
                        <?php
                    }
                    elseif (is_author())
                    {
                        $current_author = $wp_query->get_queried_object();
                        ?>
                        <h1 class="page-title"><?php _e('All posts by', 'framework') ?> <?php echo $current_author->display_name; ?></h1>
                        <?php
                    }
                    elseif (isset($_GET['paged']) && !empty($_GET['paged']))
                    {
                        ?>
                        <h1 class="page-title"><?php _e('Blog', 'framework') ?> <?php _e('Archives', 'framework') ?></h1>
                        <?php
                    }
                    ?>
                </div>
                <!-- End Page Head -->
            </div>
        </div>
    </div><!-- End header-bottom-wrapper -->

    <div class="page-container container">
        <div class="row">
            <!-- start of page content -->
            <div class="main col-lg-8 col-md-8" role="main">
                <?php get_template_part('loop'); ?>
            </div>
            <!-- end of page content -->
            <!-- start of sidebar -->
            <?php get_sidebar(); ?>
        </div>
    </div>

<?php get_footer(); ?>
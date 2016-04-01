<?php get_header(); ?>

    <div class="header-bottom-wrapper">
        <div class="container">
            <div class="row">
                <!-- Page Head -->
                <div class="page-head col-lg-12">
                    <h1 class="page-title"><?php _e('404 - Page Not Found !','framework'); ?></h1>
                </div>
                <!-- End Page Head -->
            </div>
        </div>
    </div><!-- End header-bottom-wrapper -->


    <div class="page-container container">
        <div class="row">

            <!-- start of page content -->
            <div class="main col-lg-8 col-md-8" role="main">
                <article class="clearfix hentry">
                    <div class="post-content-wrapper clearfix">
                        <h2><?php _e('The page you requested could not be found!','framework');?></h2>
                        <p><?php _e('Please try Navigation or Search to find what you are looking for!', 'framework'); ?></p>
                    </div>
                </article>
            </div>
            <!-- end of page content -->

            <!-- start of sidebar -->
            <?php get_sidebar('page'); ?>

        </div>
    </div>

<?php get_footer(); ?>
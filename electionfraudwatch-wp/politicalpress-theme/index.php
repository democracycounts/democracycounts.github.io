<?php get_header(); ?>

<div class="header-bottom-wrapper">
    <div class="container">
        <div class="row">
            <!-- Page Head -->
            <div class="page-head col-lg-12">
                <?php
                $page_for_posts = get_option('page_for_posts');
                if($page_for_posts)
                {
                    $blog = get_post($page_for_posts);
                    ?><h2 class="page-title"><?php echo $blog->post_title; ?></h2><?php
                }else{
                    ?><h2 class="page-title"><?php _e('Blog','framework'); ?></h2><?php
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
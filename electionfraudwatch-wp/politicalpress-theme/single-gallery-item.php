<?php get_header(); ?>

<div class="header-bottom-wrapper">
    <div class="container">
        <div class="row">
            <!-- Page Head -->
            <div class="page-head col-lg-12">
                <h2 class="page-title"><?php _e('Gallery','framework'); ?></h2>
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
                    ?>
                    <article <?php post_class('clearfix'); ?>>
                        <?php inspiry_list_gallery_images('gallery-detail-thumb'); ?>
                        <header>
                            <h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                        </header>
                        <div class="post-content-wrapper clearfix">
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
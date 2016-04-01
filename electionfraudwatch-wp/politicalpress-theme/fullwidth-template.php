<?php
/*
*   Template Name: Full Width Template
*/

get_header();
?>
<div class="header-bottom-wrapper">
    <div class="container">
        <div class="row">
            <!-- Page Head -->
            <div class="page-head col-lg-12">
                <h1 class="page-title"><?php the_title(); ?></h1>
            </div>
            <!-- End Page Head -->
        </div>
    </div>
</div><!-- End header-bottom-wrapper -->


<div class="page-container container">
    <div class="row">

        <!-- start of page content -->
        <div class="main col-lg-12 col-md-12" role="main">
            <?php
            if(have_posts()):
                while(have_posts()):
                    the_post();
                    ?>
                    <article <?php post_class('clearfix'); ?>>
                        <div class="post-content-wrapper clearfix">
                            <?php the_content(); ?>
                        </div>
                    </article>
                    <?php
                endwhile;
                comments_template();
            endif;
            ?>
        </div>
        <!-- end of page content -->

    </div>
</div>

<?php get_footer(); ?>
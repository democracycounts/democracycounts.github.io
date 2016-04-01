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
            <?php
            if(have_posts()):
                while(have_posts()):
                    the_post();
                    ?>
                    <article <?php post_class('clearfix'); ?>>
                        <header>
                            <h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                            <div class="post-meta clearfix">
                                <span><?php _e('By','framework'); ?></span> <?php the_author_posts_link() ?>
                                <span class="date"> <?php _e('on','framework'); ?> <?php the_time('F d, Y'); ?> </span>
                                <span class="category"><?php _e('in','framework'); ?> <?php the_category(', '); ?></span>
                            </div><!-- end of post meta -->
                        </header>
                        <?php
                        $format = get_post_format( $post->ID );
                        if( false === $format ) {
                            $format = 'standard';
                        }
                        get_template_part( "post-formats/$format" );
                        ?>
                        <div class="post-content-wrapper clearfix">
                            <?php the_content(); ?>
                            <div class="tags-list"><?php the_tags('','',''); ?></div>
                            <?php
                            // WordPress Link Pages
                            wp_link_pages(array('before' => '<div class="page-nav-btns clearfix">', 'after' => '</div>', 'next_or_number' => 'next'));
                            ?>
                        </div>
                    </article>
                    <?php
                endwhile;
                comments_template();
            endif;
            ?>

        </div>
        <!-- end of page content -->

        <!-- start of sidebar -->
        <?php get_sidebar(); ?>

    </div>

</div>

<?php get_footer(); ?>
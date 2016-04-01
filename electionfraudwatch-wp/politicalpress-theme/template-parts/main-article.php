<?php
global $post;
$format = get_post_format($post->ID);
if( false === $format ) {
    $format = 'standard';
}
?>
<article <?php post_class('clearfix'); ?>>
    <header>
        <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="post-meta clearfix">
            <span><?php _e('By','framework'); ?></span> <?php the_author_posts_link() ?>
            <span class="date"> <?php _e('on','framework'); ?> <?php the_time('F d, Y'); ?> </span>
            <span class="category"><?php _e('in','framework'); ?> <?php the_category(', '); ?></span>
        </div><!-- end of post meta -->
    </header>
    <?php
    get_template_part( "post-formats/$format" );
    echo '<p>';
    inspiry_excerpt(50);
    echo '</p>';
    ?>
    <a href="<?php the_permalink(); ?>" class="pp-btn"><?php _e('Read More','framework'); ?></a>
</article>
<article <?php post_class('clearfix'); ?>>
    <header>
        <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    </header>
    <?php
    get_template_part( "post-formats/standard" );
    echo '<p>';
    inspiry_excerpt(50);
    echo '</p>';
    ?>
    <a href="<?php the_permalink(); ?>" class="pp-btn"><?php _e('Read More','framework'); ?></a>
</article>
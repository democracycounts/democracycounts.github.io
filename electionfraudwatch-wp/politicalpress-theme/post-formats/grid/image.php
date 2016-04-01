<?php
if(has_post_thumbnail($post->ID)){
    ?>
    <figure>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <?php the_post_thumbnail( 'grid-post-thumb',array( 'class' => "img-responsive" ) ); ?>
        </a>
    </figure>
    <?php
}
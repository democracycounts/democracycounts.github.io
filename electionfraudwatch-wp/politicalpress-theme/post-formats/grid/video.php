<?php
global $post;
$embed_code = get_post_meta($post->ID, 'political_press_embed_code', true);

if(!empty($embed_code))
{
    ?>
    <div class="post-video">
        <div class="video-wrapper">
            <?php echo stripslashes(htmlspecialchars_decode($embed_code)); ?>
        </div>
    </div>
    <?php
}elseif(has_post_thumbnail($post->ID)){
    ?>
    <figure>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <?php the_post_thumbnail( 'grid-post-thumb',array( 'class' => "img-responsive" ) ); ?>
        </a>
    </figure>
    <?php
}
?>
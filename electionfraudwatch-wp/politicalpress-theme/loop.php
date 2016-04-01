<?php
if ( have_posts() ) :
    while ( have_posts() ) :
        the_post();
        get_template_part( "template-parts/main-article" );
    endwhile;
    global $wp_query;
    inspiry_pagination( $wp_query );
else :
    ?><p class="nothing-found"><?php _e('No Posts Found!', 'framework'); ?></p><?php
endif;
?>
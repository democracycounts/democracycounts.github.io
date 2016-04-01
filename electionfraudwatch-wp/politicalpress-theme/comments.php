<section id="comments">

    <?php
    if ( post_password_required() ):
        ?>
        <p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view comments.', 'framework' ); ?></p>
        </section><!-- end of comments -->
        <?php
    return;
    endif;
    ?>

<?php if ( have_comments() ): ?>

    <h3 id="comments-title"><?php comments_number(__('No Comment','framework'), __('One Comment','framework'), __('(%) Comments','framework') );?></h3>

    <ol class="commentlist">
        <?php wp_list_comments( array( 'callback' => 'theme_comment' ) ); ?>
    </ol>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ): ?>

        <nav class="pagination comments-pagination">
            <?php paginate_comments_links(); ?>
        </nav>

    <?php endif; ?>

<?php endif; ?>

<?php if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ): ?>

    <p class="nocomments"><?php _e( 'Comments are closed.', 'framework' ); ?></p>

<?php endif; ?>

<?php comment_form(); ?>

</section><!-- end of comments -->
<?php
/*
 *  Template Name: Contact Template
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

            <div class="col-lg-6 col-md-6 col-sm-6">

                <section id="contact-form">

                    <div class="content-wrap">
                        <?php
                        global $data;
                        if($data['contact_form_heading']){
                            ?><h4 class="form-heading"><?php echo $data['contact_form_heading']; ?></h4><?php
                        }
                        ?>
                    </div>

                    <form class="contact-form" method="post" action="<?php echo admin_url( 'admin-ajax.php' ); ?>">

                        <p>
                            <label for="name"><?php _e('Your Name', 'framework'); ?></label>
                            <input type="text" name="name" id="name" class="required" title="<?php _e( '* Please provide your name', 'framework'); ?>">
                        </p>

                        <p>
                            <label for="email"><?php _e('Your Email', 'framework'); ?></label>
                            <input type="text" name="email" id="email" class="email required" title="<?php _e( '* Please provide a valid email address', 'framework'); ?>">
                        </p>

                        <p>
                            <label for="subject"><?php _e('Subject', 'framework'); ?></label>
                            <input type="text" name="subject" id="subject">
                        </p>

                        <p>
                            <label for="comment"><?php _e('Your Message', 'framework'); ?></label>
                            <textarea  name="message" id="comment" class="required" title="<?php _e( '* Please provide your message', 'framework'); ?>"></textarea>
                        </p>

                        <p>
                            <input type="submit" value="<?php _e('Send Message', 'framework'); ?>" id="submit" class="pp-btn" name="submit">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/ajax-loader.gif" id="contact-loader" alt="Loading...">
                            <input type="hidden" name="action" value="send_message" />
                            <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('send_message_nonce'); ?>" />
                            <?php
                            if($data['contact_email']){
                                ?><input type="hidden" name="target" value="<?php echo $data['contact_email']; ?>" /><?php
                            }else{
                                ?><br /><br /><span class="alert alert-warning"><?php _e('Note: Target email address for this form is not configured!','framework'); ?></span><?php
                            }
                            ?>
                        </p>

                    </form>

                    <div class="error-container"></div>
                    <div id="message-sent">&nbsp;</div>

                </section>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">

                <?php
                if(have_posts()):
                    while(have_posts()):
                        the_post();
                        ?>
                        <article class="clearfix hentry">
                            <div class="post-content-wrapper clearfix">
                                <?php the_content(); ?>
                            </div>
                        </article>
                    <?php
                    endwhile;
                endif;

                /* Contact list items */
                $contact_list_items = $data['contact_list_items'];
                if(!empty($contact_list_items)){
                    ?>
                    <ul class="contact-as">
                        <?php
                        foreach ( $contact_list_items as $list_item ) {
                            ?>
                            <li>
                                <div class="list-item-icon">
                                    <a href="<?php echo $list_item['link'];?>" title="<?php echo $list_item['title'];?>">
                                        <img src="<?php echo $list_item['url'];?>" alt="<?php echo $list_item['title'];?>">
                                    </a>
                                </div>
                                <div class="content-wrap">
                                    <h4><a href="<?php echo $list_item['link'];?>" title="<?php echo $list_item['title'];?>"><?php echo $list_item['title'];?></a></h4>
                                    <p><?php echo $list_item['description'];?></p>
                                </div>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                    <?php
                }
                ?>
            </div>

        </div>

    </div>

<?php get_footer(); ?>
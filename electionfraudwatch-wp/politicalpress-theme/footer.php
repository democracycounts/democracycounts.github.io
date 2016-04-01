<!-- Footer -->
<footer class="footer" role="contentinfo">

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-3 col-sm-6">
                    <?php if ( ! dynamic_sidebar( __('Footer First Column','framework') )) : ?>
                    <?php endif; ?>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6">
                    <?php if ( ! dynamic_sidebar( __('Footer Second Column','framework') )) : ?>
                    <?php endif; ?>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6">
                    <?php if ( ! dynamic_sidebar( __('Footer Third Column','framework') )) : ?>
                    <?php endif; ?>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6">
                    <?php if ( ! dynamic_sidebar( __('Footer Fourth Column','framework') )) : ?>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <?php
            global $data;

            if($data['copyright_text']){
                ?><p class="copyright"><?php echo $data['copyright_text']; ?></p><?php
            }

            if($data['social_icons']){
                ?>
                <!-- Social Navigation -->
                <ul class="social-nav clearfix">
                    <?php
                    if($data['facebook_link']){
                        ?><li class="facebook"><a target="_blank" href="<?php echo $data['facebook_link']; ?>"></a></li><?php
                    }
                    if($data['twitter_link']){
                        ?><li class="twitter"><a target="_blank" href="<?php echo $data['twitter_link']; ?>"></a></li><?php
                    }
                    if($data['linkedin_link']){
                        ?><li class="linkedin"><a target="_blank" href="<?php echo $data['linkedin_link']; ?>"></a></li><?php
                    }
                    if($data['youtube_link']){
                        ?><li class="youtube"><a target="_blank" href="<?php echo $data['youtube_link']; ?>"></a></li><?php
                    }
                    if($data['skype_username']){
                        ?><li class="skype"><a target="_blank" href="skype:<?php echo $data['skype_username']; ?>?add"></a></li><?php
                    }
                    if($data['flickr_link']){
                        ?><li class="flickr"><a target="_blank" href="<?php echo $data['flickr_link']; ?>"></a></li><?php
                    }
                    if($data['deviant_art_link']){
                        ?><li class="deviantart"><a target="_blank" href="<?php echo $data['deviant_art_link']; ?>"></a></li><?php
                    }
                    if($data['google_link']){
                        ?><li class="google"><a target="_blank" href="<?php echo $data['google_link']; ?>"></a></li><?php
                    }
                    if($data['stumble_upon_link']){
                        ?><li class="stumble"><a target="_blank" href="<?php echo $data['stumble_upon_link']; ?>"></a></li><?php
                    }
                    ?>
                </ul>
                <?php
            }
            ?>
        </div>
    </div>

</footer><!-- End Footer -->

    <!-- Respond.js to add IE8 support for media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>
    <![endif]-->

<?php wp_footer(); ?>
</body>

</html>



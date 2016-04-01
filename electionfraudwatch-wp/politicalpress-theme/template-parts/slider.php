    <?php
    global $data;

    if($data['selected_slider'] == 'slider_with_subscribe_form' ){

        /* Slider with subscribe form on right side */
        ?>
        <div class="col-lg-8 col-md-8 col-sm-12 home-flexslider variation-1">
        <?php
        $slider_slides = $data['default_slider'];
        if(!empty($slider_slides)){
            ?>
            <!-- Slider -->
            <div class="flexslider">
                <ul class="slides">
                    <?php
                    foreach ( $slider_slides as $slide) {
                        ?>
                        <li>
                            <a href="<?php echo $slide['link'];?>" title="<?php echo $slide['title'];?>">
                                <img src="<?php echo $slide['url'];?>" alt="<?php echo $slide['title'];?>">
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div><!-- End Slider -->
        <?php
        }
        ?>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 header-widget">
            <div class="wp-email-capture-widget">
                <div class="slide_widget_inner">
                    <?php
                    if ( ! dynamic_sidebar( __('Subscribe Widget Area','framework') )) :
                    endif;
                    ?>
                </div>
            </div>
        </div>
        <?php

    }else if($data['selected_slider'] == 'slider_with_text' ){

        ?>
        <div class="col-lg-12">
            <div class="home-flexslider variation-2">
                <?php
                $slider_slides = $data['default_slider'];
                if(!empty($slider_slides)){
                    ?>
                    <!-- Slider -->
                    <div class="flexslider">
                        <ul class="slides">
                            <?php
                            foreach ( $slider_slides as $slide) {
                                ?>
                                <li>
                                    <div class="slide-image">
                                        <a href="<?php echo $slide['link'];?>" title="<?php echo $slide['title'];?>">
                                            <img src="<?php echo $slide['url'];?>" alt="<?php echo $slide['title'];?>">
                                        </a>
                                    </div>
                                    <div class="slide-description">
                                        <h2 class="title"><?php echo $slide['title'];?></h2>
                                        <p><?php echo $slide['description'];?></p>
                                        <a class="pp-btn lg" href="<?php echo $slide['link']; ?>"><?php _e('Read More','framework'); ?></a>
                                    </div>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div><!-- End Slider -->
                    <?php
                }
                ?>
            </div>
        </div>
        <?php

    }else if($data['selected_slider'] == 'full_width_slider' ) {

        ?>
        <div class="col-lg-12">
            <div class="home-flexslider variation-3 ">
                <?php
                $slider_slides = $data['default_slider'];
                if(!empty($slider_slides)){
                    ?>
                    <!-- Slider -->
                    <div class="flexslider">
                        <ul class="slides">
                            <?php
                            foreach ( $slider_slides as $slide) {
                                ?>
                                <li>
                                    <div class="slide-image">
                                        <a href="<?php echo $slide['link'];?>" title="<?php echo $slide['title'];?>">
                                            <img src="<?php echo $slide['url'];?>" alt="<?php echo $slide['title'];?>">
                                        </a>
                                    </div>
                                    <?php
                                    if(!empty($slide['description'])){
                                        ?>
                                        <div class="slide-description">
                                            <h2 class="title"><?php echo $slide['title'];?></h2>
                                            <p><?php echo $slide['description'];?></p>
                                            <a class="pp-btn lg" href="<?php echo $slide['link']; ?>"><?php _e('Read More','framework'); ?></a>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div><!-- End Slider -->
                <?php
                }
                ?>
            </div>
        </div>
        <?php

    }

    ?>
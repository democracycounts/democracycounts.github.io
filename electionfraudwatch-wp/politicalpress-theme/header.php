<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">

    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>

    <!-- Define a viewport to mobile devices to use - telling the browser to assume that the page is as wide as the device (width=device-width) and setting the initial page zoom level to be 1 (initial-scale=1.0) -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    global $data;
    if( !empty($data['favicon']) ) {
        ?><link rel="shortcut icon" href="<?php echo $data['favicon']; ?>" /><?php
    }
    ?>

    <!-- Style Sheet-->
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>"/>

    <!-- Pingback URL -->
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <!-- RSS -->
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
    <link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'atom_url' ); ?>" />

    <!-- HTML5 shim IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
    <![endif]-->

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!--[if lt IE 7]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->

<!-- Header Wrapper -->
<div class="header-wrapper">

    <!-- Start Header -->
    <header class="header container"  role="banner">

        <?php
        global $data;
        if( !empty($data['donate_button']) && !empty($data['donate_link']) && !empty($data['donate_label']) ){
            ?>
            <div class="donate-now clearfix">
                <a href="<?php echo $data['donate_link']; ?>" title="<?php echo $data['donate_label']; ?>" target="_blank"><?php echo $data['donate_label']; ?></a>
            </div>
            <?php
        }
        ?>

        <!-- Start of Main Navigation -->
        <nav  id="nav" class="nav main-menu clearfix"  role="navigation">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'main-menu',
                'menu_class' => 'clearfix'
            ));
            ?>
        </nav>
        <!-- End of Main Navigation -->

        <!-- Logo -->
        <div class="logo clearfix">
            <?php
            if( !empty($data['logo']) ) {
                ?>
                <a title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img src="<?php echo $data['logo']; ?>" alt="<?php  bloginfo( 'name' ); ?>">
                </a>
                <?php
            } else {
                ?>
                <h2 class="logo-heading">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"  title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php  bloginfo( 'name' ); ?></a>
                </h2>
                <?php
            }
            ?>
        </div>

    </header><!-- End Header -->

</div><!-- End of header-wrapper -->


<?php
/**
 * File Name: config-meta-boxes.php
 *
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 *
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'political_press_';

global $meta_boxes;

$meta_boxes = array();


// 1st meta box
$meta_boxes[] = array(
    // Meta box id, UNIQUE per meta box. Optional since 4.1.5
    'id' => 'video-meta-box',

    // Meta box title - Will appear at the drag and drop handle bar. Required.
    'title' => __('Video Embed Code','framework'),

    // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
    'pages' => array( 'post' ),

    // Where the meta box appear: normal (default), advanced, side. Optional.
    'context' => 'normal',

    // Order of meta box: high (default), low. Optional.
    'priority' => 'high',

    // List of meta fields
    'fields' => array(
        array(
            'name' => __('Video Embed Code','framework'),
            'desc' => __('If you are not using self hosted videos then please provide the video embed code and remove the width and height attributes.','framework'),
            'id'   => "{$prefix}embed_code",
            'type' => 'textarea',
            'cols' => '20',
            'rows' => '3'
        )
    )
);

// 2nd meta box
$meta_boxes[] = array(
    // Meta box id, UNIQUE per meta box. Optional since 4.1.5
    'id' => 'gallery-meta-box',

    // Meta box title - Will appear at the drag and drop handle bar. Required.
    'title' => __('Gallery Images','framework'),

    // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
    'pages' => array( 'post', 'gallery-item' ),

    // Where the meta box appear: normal (default), advanced, side. Optional.
    'context' => 'normal',

    // Order of meta box: high (default), low. Optional.
    'priority' => 'high',

    // List of meta fields
    'fields' => array(
        array(
            'name'              => __('Upload Gallery Images','framework'),
            'id'                => "{$prefix}gallery",
            'desc'              => __('Images should have minimum width of 754px and minimum height of 386px, Bigger size images will be cropped automatically.','framework'),
            'type'              => 'image_advanced',
            'max_file_uploads'  => 24
        )
    )
);

// 2nd meta box
$meta_boxes[] = array(
    // Meta box id, UNIQUE per meta box. Optional since 4.1.5
    'id' => 'gallery-item-meta-box',

    // Meta box title - Will appear at the drag and drop handle bar. Required.
    'title' => __('Gallery Images','framework'),

    // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
    'pages' => array( 'gallery-item' ),

    // Where the meta box appear: normal (default), advanced, side. Optional.
    'context' => 'normal',

    // Order of meta box: high (default), low. Optional.
    'priority' => 'high',

    // List of meta fields
    'fields' => array(
        array(
            'name'              => __('Upload Gallery Images','framework'),
            'id'                => "{$prefix}gallery",
            'desc'              => __('If you want to display images slider on gallery item detail page then you can upload those images here. An image should have the minimum width of 754px and minimum height of 460px. Bigger size images will be cropped automatically.','framework'),
            'type'              => 'image_advanced',
            'max_file_uploads'  => 24
        )
    )
);


$meta_boxes[] = array(
    // Meta box id, UNIQUE per meta box. Optional since 4.1.5
    'id' => 'campaign_trail_event_details',

    // Meta box title - Will appear at the drag and drop handle bar. Required.
    'title' => __('Campaign Trail Event Details','framework'),

    // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
    'pages' => array( 'campaign-trail-event' ),

    // Where the meta box appear: normal (default), advanced, side. Optional.
    'context' => 'normal',

    // Order of meta box: high (default), low. Optional.
    'priority' => 'high',

    // List of meta fields
    'fields' => array(
        array(
            'id'        => "{$prefix}city_name",
            'name'      => __('City Name','framework'),
            'desc'      => __('','framework'),
            'type'      => 'text',
            'std'       => ""
        ),
        array(
            'name'      => __('Event Image','framework'),
            'id'        => "{$prefix}event_image",
            'desc'      => __('Provide the image that will be displayed in Campaign Trail slider. <strong>The minimum required image size is 1170px by 200px</strong>. Bigger size images will be cropped automatically.','framework'),
            'type'      => 'image_advanced',
            'max_file_uploads' => 1
        ),
        array(
            'name' => __( 'From Date', 'framework' ),
            'id'   => "{$prefix}from_date",
            'type' => 'date',
            /*
            For date options, see here http://api.jqueryui.com/datepicker
            */
            'js_options' => array(
                'appendText'      => __( '( yyyy-mm-dd )', 'framework' ),
                'dateFormat'      => __( 'yy-mm-dd', 'framework' ),
                'changeMonth'     => true,
                'changeYear'      => true,
                'showButtonPanel' => true,
            )
        ),
        array(
            'name' => __( 'To Date', 'framework' ),
            'id'   => "{$prefix}to_date",
            'type' => 'date',
            /*
            For date options, see here http://api.jqueryui.com/datepicker
            */
            'js_options' => array(
                'appendText'      => __( '( yyyy-mm-dd )', 'framework' ),
                'dateFormat'      => __( 'yy-mm-dd', 'framework' ),
                'changeMonth'     => true,
                'changeYear'      => true,
                'showButtonPanel' => true,
            )
        ),
        array(
            'id'        => "{$prefix}venue_address",
            'name'      => __('Venue Address','framework'),
            'desc'      => __('Provide venue address.','framework'),
            'type'      => 'text',
            'std'       => '1903 Hollywood Boulevard, Hollywood, FL 33020, USA'
        ),
        array(
            'id'            => "{$prefix}venue_location",
            'name'          => __('Venue Location at Google Map','framework'),
            'desc'          => __('Drag the map marker to point your venue location. You can also use the address field above to search for venue.','framework'),
            'type'          => 'map',
            'std'           => '26.011812,-80.14524499999999,15',   // 'latitude,longitude[,zoom]' (zoom is optional)
            'style'         => 'width: 600px; height: 400px',
            'address_field' => "{$prefix}venue_address",         // Name of text field where address is entered. Can be list of text fields, separated by commas (for ex. city, state)
        )
    )
);


/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function political_press_register_meta_boxes()
{
    // Make sure there's no errors when the plugin is deactivated or during upgrade
    if ( !class_exists( 'RW_Meta_Box' ) )
        return;

    global $meta_boxes;
    foreach ( $meta_boxes as $meta_box ){
        new RW_Meta_Box( $meta_box );
    }
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'political_press_register_meta_boxes' );

?>
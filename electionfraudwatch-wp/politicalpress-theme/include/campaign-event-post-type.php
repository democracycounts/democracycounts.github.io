<?php

/* Create the Campaign Event Post Type */
function create_campaign_event_post_type() {
    $labels = array(
        'name' => __( 'Campaign Trail','framework'),
        'singular_name' => __( 'Campaign Trail Event','framework' ),
        'add_new' => __('Add New','framework'),
        'add_new_item' => __('Add New Campaign Trail Event','framework'),
        'edit_item' => __('Edit Campaign Trail Event','framework'),
        'new_item' => __('New Campaign Trail Event','framework'),
        'view_item' => __('View Campaign Trail Event','framework'),
        'search_items' => __('Search Campaign Trail Events','framework'),
        'not_found' =>  __('No Campaign Event Trail found','framework'),
        'not_found_in_trash' => __('No Campaign Trail Event found in Trash','framework'),
        'parent_item_colon' => ''
    );
	  
    $args = array(
        'labels' => $labels,
        'public' => true,
        'exclude_from_search' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 5,
        'supports' => array('title','editor'),
        'rewrite' => array( 'slug' => __('campaign-trail-event', 'framework') )
    );
	  
    register_post_type('campaign-trail-event',$args);
}

add_action( 'init', 'create_campaign_event_post_type' );

/* Add Custom Columns */
function campaign_event_edit_columns($columns){

    $columns = array(
        "cb" => "<input type=\"checkbox\" />",
        "title" => __('Campaign Trail Event Title','framework'),
        "campaign-event-thumb" => __('Image','framework'),
        "city" => __('City','framework'),
        "from" => __('From Date','framework'),
        "to" => __('To Date','framework'),
        "date" => __('Publish Time', 'framework')
    );

    return $columns;
}
add_filter("manage_edit-campaign-trail-event_columns", "campaign_event_edit_columns");

function campaign_event_custom_columns($column){
    global $post;

    $post_meta_data = get_post_custom($post->ID);

    $city_name = $post_meta_data['political_press_city_name'][0];
    $from_date = $post_meta_data['political_press_from_date'][0];
    $to_date = $post_meta_data['political_press_to_date'][0];

    switch ($column){
        case 'campaign-event-thumb':
            if( !empty($post_meta_data['political_press_event_image'][0]) ){
                $image_id = $post_meta_data['political_press_event_image'][0];
                $trail_image = wp_get_attachment_image_src( $image_id,'trail-thumb' );
                ?><a href="<?php the_permalink(); ?>" target="_blank"><img style="width: 100%;" src="<?php echo $trail_image[0]; ?>" alt="<?php the_title(); ?>" /></a><?php
            }
            else{
                _e('No Image','framework');
            }
            break;

        case 'city':
            if($city_name){
                echo $city_name;
            }
            break;

        case 'from':
            if($from_date){
                echo $from_date;
            }
            break;

        case 'to':
            if($to_date){
                echo $to_date;
            }
            break;
    }
}
add_action("manage_posts_custom_column",  "campaign_event_custom_columns");

?>
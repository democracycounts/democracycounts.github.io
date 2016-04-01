<?php

/* Create the Gallery Item Custom Post Type */
function create_gallery_post_type() 
{
	$labels = array(
		'name' => __( 'Gallery Items','framework'),
		'singular_name' => __( 'Gallery Item','framework' ),
		'add_new' => __('Add New','framework'),
		'add_new_item' => __('Add New Gallery Item','framework'),
		'edit_item' => __('Edit Gallery Item','framework'),
		'new_item' => __('New Gallery Item','framework'),
		'view_item' => __('View Gallery Item','framework'),
		'search_items' => __('Search Gallery Items','framework'),
		'not_found' =>  __('No Gallery Item found','framework'),
		'not_found_in_trash' => __('No Gallery Item found in Trash','framework'), 
		'parent_item_colon' => ''
	  );
	  
	  $args = array(
		'labels' => $labels,
		'public' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'menu_icon' => get_template_directory_uri() . '/images/gallery.png',
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 5,
		'supports' => array('title','editor','thumbnail'),
		'rewrite' => array( 'slug' => __('gallery-item', 'framework') )
	  ); 
	  
	  register_post_type('gallery-item',$args);
}
add_action( 'init', 'create_gallery_post_type' );



/* Create Gallery Item Type Taxonomy */
function create_gallery_item_type_taxonomy(){
    $labels = array(
        'name' => __( 'Gallery Item Types', 'framework' ),
        'singular_name' => __( 'Gallery Item Type', 'framework' ),
        'search_items' =>  __( 'Search Gallery Item Types', 'framework' ),
        'popular_items' => __( 'Popular Gallery Item Types', 'framework' ),
        'all_items' => __( 'All Gallery Item Types', 'framework' ),
        'parent_item' => __( 'Parent Gallery Item Type', 'framework' ),
        'parent_item_colon' => __( 'Parent Gallery Item Type:', 'framework' ),
        'edit_item' => __( 'Edit Gallery Item Type', 'framework' ), 
        'update_item' => __( 'Update Gallery Item Type', 'framework' ),
        'add_new_item' => __( 'Add New Gallery Item Type', 'framework' ),
        'new_item_name' => __( 'New Gallery Item Type Name', 'framework' ),
        'separate_items_with_commas' => __( 'Separate Gallery Item Types with commas', 'framework' ),
        'add_or_remove_items' => __( 'Add or Remove Gallery Item Types', 'framework' ),
        'choose_from_most_used' => __( 'Choose from the most used Gallery Item Types', 'framework' ),
        'menu_name' => __( 'Gallery Item Types', 'framework' )
    );
    
	register_taxonomy(
	    'gallery-item-type', 
	    array( 'gallery-item' ), 
	    array(
	        'hierarchical' => true, 
	        'labels' => $labels,
	        'show_ui' => true,
	        'query_var' => true,
	        'rewrite' => array('slug' => __('gallery-item-type', 'framework'))
	    )
	); 
}

add_action( 'init', 'create_gallery_item_type_taxonomy', 0 );


/* Add Custom Columns */
function gallery_edit_columns($columns){  

        $columns = array(  
            "cb" => "<input type=\"checkbox\" />",  
            "title" => __('Gallery Item Title','framework'),
			"gallery-thumb" => __('Thumbnail','framework'),
            "type" => __('Gallery Item Type','framework'),
			"date" => __('Publish Time', 'framework')
        );
  
        return $columns;  
}  
  
function gallery_custom_columns($column){  
        global $post;  
        switch ($column)  
        {    
            case 'gallery-thumb': 			 
				if(has_post_thumbnail($post->ID)) 
				{
					?>
					<a href="<?php the_permalink(); ?>" target="_blank">
						<?php the_post_thumbnail( 'post-thumbnail' ); ?>
					</a>
					<?php
				}
				else
				{
					_e('No Thumbnail','framework');
				}
                break;
			
			case 'type':  
                echo get_the_term_list($post->ID, 'gallery-item-type', '', ', ','');  
                break;
        }  
} 
add_filter("manage_edit-gallery-item_columns", "gallery_edit_columns");  
add_action("manage_posts_custom_column",  "gallery_custom_columns");

?>
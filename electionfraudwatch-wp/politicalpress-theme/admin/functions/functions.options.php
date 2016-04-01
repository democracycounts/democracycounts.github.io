<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;
        }
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");

        //Access the WordPress Tags via an Array
        $of_tags 		= array();
        $of_tags_obj 	= get_tags('hide_empty=0');
        foreach ($of_tags_obj as $of_tag) {
            $of_tags[$of_tag->term_id] = $of_tag->name;
        }
        $tags_tmp 	= array_unshift($of_tags, "Select a tag:");

		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");

        $of_options_numbers = array(1,2,3,4,5,6,7,8,9,10);
        $of_options_even = array(2,4,6,8,10,12,14,16,18,20);

		//Testing
		$of_options_select 	= array("one","two","three","four","five");
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");

		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		(
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			),
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);


		//Stylesheets Reader
		$alt_stylesheet_path = get_template_directory().'/css/skins/';
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) )
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) )
		    {
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false )
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		            	natsort($bg_images); //Sorts the array into a natural order
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }
		    }
		}


		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 


        /*-----------------------------------------------------------------------------------*/
        /* The Options Array */
        /*-----------------------------------------------------------------------------------*/

        // Set the Options Array
        global $of_options;
        $of_options = array();

        $of_options[] = array(
            "name" 		=> __('Header Options','framework'),
            "type" 		=> "heading"
        );


        $of_options[] = array(
            "name" 		=> __('Logo','framework'),
            "desc" 		=> __('Upload logo for you website.','framework'),
            "id" 		=> "logo",
            "std" 		=> "",
            "type" 		=> "upload"
        );

        $of_options[] = array(
            "name" 		=> __('Favicon','framework'),
            "desc" 		=> __('Upload a 16px by 16px PNG image that will represent your website favicon.','framework'),
            "id" 		=> "favicon",
            "std" 		=> "",
            "type" 		=> "upload"
        );

        $of_options[] = array(
            "name" 		=> __('Show or Hide Donate Button','framework'),
            "desc" 		=> __('','framework'),
            "id" 		=> "donate_button",
            "std" 		=> 0,
            "on" 		=> __('Show','framework'),
            "off" 		=> __('Hide','framework'),
            "type" 		=> "switch"
        );

        $of_options[] = array(
            "name" 		=> __('Donate Button Label','framework'),
            "desc" 		=> __('Provide the text label for donate button.','framework'),
            "id" 		=> "donate_label",
            "std" 		=> __('Donate Now','framework'),
            "fold" 		=> "donate_button",
            "type" 		=> "text"
        );

        $of_options[] = array(
            "name" 		=> __('Donate Button Link','framework'),
            "desc" 		=> __('Provide the link to your donation form. <a target="_blank" href="http://en.support.wordpress.com/paypal/">You can follow this article to use PayPal for donation link.</a>.','framework'),
            "id" 		=> "donate_link",
            "std" 		=> "",
            "fold" 		=> "donate_button",
            "type" 		=> "textarea"
        );

        $of_options[] = array(
            "name" 		=> __('Tracking Code','framework'),
            "desc" 		=> __('Paste your Google Analytics (or other) tracking code here. This will be added into the footer of your theme.','framework'),
            "id" 		=> "tracking_code",
            "std" 		=> "",
            "type" 		=> "textarea"
        );

        $of_options[] = array(
            "name" 		=> __('Home Options','framework'),
            "type" 		=> "heading"
        );

        $of_options[] = array(
            "name" 		=> __('Quote','framework'),
            "desc" 		=> __('Provide the quote text. This quote text will appear above slider in home page header area.','framework'),
            "id" 		=> "quote",
            "std" 		=> "",
            "type" 		=> "textarea"
        );

        $of_options[] = array(
            "name" 		=> __('Quote Author Name','framework'),
            "desc" 		=> __('Provide the quote author name.','framework'),
            "id" 		=> "quote_author",
            "std" 		=> '',
            "type" 		=> "text"
        );

        $of_options[] = array(
            "name" 		=> __('Select the Slider That You Want to Use on Home Page ?','framework'),
            "desc" 		=> __('','framework'),
            "id" 		=> "selected_slider",
            "std" 		=> "slider_with_subscribe_form",
            "type" 		=> "radio",
            "options" 	=> array(
                            "slider_with_subscribe_form" => __('Slider with subscribe form on right side.','framework'),
                            "slider_with_text" => __('Slider with text on right side of each slide.','framework'),
                            "full_width_slider" => __('Slider with full width image and text on top of each slide.','framework')
                            )
        );

        $of_options[] = array(
            "name" => __('Default Slider','framework'),
            "desc" 		=> __('Add slides for home page slider. Required image size for full width slider is 1156px by 389px and for other two sliders it is 756px by 389px.','framework'),
            "id" 		=> "default_slider",
            "std" 		=> "",
            "type" 		=> "slider"
        );

        $of_options[] = array(
            "name" 		=> __('Do you want to display featured posts below slider area on home page ?','framework'),
            "desc" 		=> __('','framework'),
            "id" 		=> "featured_posts",
            "std" 		=> 1,
            "on" 		=> __('Yes','framework'),
            "off" 		=> __('No','framework'),
            "type" 		=> "switch"
        );

        $of_options[] = array(
            "name" 		=>  __('Select a featured tag','framework'),
            "desc" 		=>  __('Featured posts below slider will be displayed based on the selected tag.','framework'),
            "id" 		=> "featured_tag",
            "std" 		=> "",
            "fold" 		=> "featured_posts",
            "type" 		=> "select",
            "options" 	=> $of_tags
        );

        $of_options[] = array(
            "name" 		=> __('Do you want to display recent posts in default layout on home page ?','framework'),
            "desc" 		=> __('','framework'),
            "id" 		=> "recent_posts",
            "std" 		=> 1,
            "on" 		=> __('Yes','framework'),
            "off" 		=> __('No','framework'),
            "type" 		=> "switch"
        );

        $of_options[] = array(
            "name" 		=> __('Number of recent posts to display in default layout','framework'),
            "desc" 		=> __('Select the number of recent posts to display on home page.','framework'),
            "id" 		=> "recent_posts_number",
            "std" 		=> "1",
            "fold" 		=> "recent_posts",
            "type" 		=> "select",
            "mod" 		=> "mini",
            "options" 	=> $of_options_numbers
        );

        $of_options[] = array(
            "name" 		=> __('Do you want to display remaining recent posts in grid layout on home page ?','framework'),
            "desc" 		=> __('','framework'),
            "id" 		=> "recent_posts_grid",
            "std" 		=> 1,
            "on" 		=> __('Yes','framework'),
            "off" 		=> __('No','framework'),
            "type" 		=> "switch"
        );

        $of_options[] = array(
            "name" 		=> __('Number of recent posts to display in grid layout','framework'),
            "desc" 		=> __('Note: The sequence of recent posts in grid layout will start after the last post in default layout.','framework'),
            "id" 		=> "recent_posts_grid_number",
            "std" 		=> "2",
            "fold" 		=> "recent_posts_grid",
            "type" 		=> "select",
            "mod" 		=> "mini",
            "options" 	=> $of_options_even
        );

        $of_options[] = array(
            "name" 		=> __('Do you want to display campaign trail on home page ?','framework'),
            "desc" 		=> __('','framework'),
            "id" 		=> "campaign_trail",
            "std" 		=> 0,
            "on" 		=> __('Yes','framework'),
            "off" 		=> __('No','framework'),
            "type" 		=> "switch"
        );

        $of_options[] = array(
            "name" 		=> __('Where do you want to display campaign trail on home page ?','framework'),
            "desc" 		=> __('','framework'),
            "id" 		=> "campaign_trail_location",
            "std" 		=> 0,
            "on" 		=> __('Below Header','framework'),
            "off" 		=> __('Above Footer','framework'),
            "type" 		=> "switch",
            "fold" 		=> "campaign_trail"
        );

        $of_options[] = array(
            "name" 		=> __('Campaign Trail Title','framework'),
            "desc" 		=> __('','framework'),
            "id" 		=> "campaign_trail_title",
            "std" 		=> __('Campaign Trail','framework'),
            "type" 		=> "text"
        );

$of_options[] = array(
    "name" 		=> __('Styling Options','framework'),
    "type" 		=> "heading"
);

        $of_options[] = array(
            "name" 		=> __('Theme Skins Stylesheets','framework'),
            "desc" 		=> __('Select color scheme of your choice.','framework'),
            "id" 		=> "theme_skin_stylesheet",
            "std" 		=> 'default.css',
            "type" 		=> "select",
            "options" 	=> $alt_stylesheets
        );

        $of_options[] = array(
            "name" 		=> __('Quick CSS','framework'),
            "desc" 		=> __('Just want to do some quick CSS changes? Enter them here and they will be applied to the theme. If you need to change major portions of the theme please use the "css/custom.css" file. If you are using a child theme then use "child-custom.css" file within child theme.','framework'),
            "id" 		=> "quick_css",
            "std" 		=> "",
            "type" 		=> "textarea"
        );

$of_options[] = array(
    "name" 		=> __('Contact Options','framework'),
    "type" 		=> "heading"
);

        $of_options[] = array(
            "name" 		=> __('Text above contact form.','framework'),
            "desc" 		=> __('','framework'),
            "id" 		=> "contact_form_heading",
            "std" 		=> __('To send your general questions or comments, please use contact form.','framework'),
            "type" 		=> "textarea"
        );

        $of_options[] = array(
            "name" 		=> __('Target email address','framework'),
            "desc" 		=> __('Provide target email address that will receive messages from contact form.','framework'),
            "id" 		=> "contact_email",
            "std" 		=> '',
            "type" 		=> "text"
        );

        $of_options[] = array(
            "name" => __('Contact page list items','framework'),
            "desc" 		=> __('','framework'),
            "id" 		=> "contact_list_items",
            "std" 		=> "",
            "type" 		=> "slider"
        );

        $of_options[] = array(
            "name" 		=> __('Footer Options','framework'),
            "type" 		=> "heading"
        );

        $of_options[] = array(
            "name" 		=> __('Copyright Text','framework'),
            "desc" 		=> __('Provide copyright text to display in footer.','framework'),
            "id" 		=> "copyright_text",
            "std" 		=> "",
            "type" 		=> "textarea"
        );

        $of_options[] = array(
            "name" 		=> __('Show or Hide footer social icons','framework'),
            "desc" 		=> __('','framework'),
            "id" 		=> "social_icons",
            "std" 		=> 1,
            "on" 		=> __('Show','framework'),
            "off" 		=> __('Hide','framework'),
            "type" 		=> "switch"
        );

        $of_options[] = array(
            "name" 		=> __('Facebook','framework'),
            "desc" 		=> __('Provide Facebook URL to display its icon in footer social icons.','framework'),
            "id" 		=> "facebook_link",
            "std" 		=> '',
            "fold"      => "social_icons",
            "type" 		=> "text"
        );

        $of_options[] = array(
            "name" 		=> __('Twitter','framework'),
            "desc" 		=> __('Provide Twitter URL to display its icon in footer social icons.','framework'),
            "id" 		=> "twitter_link",
            "std" 		=> '',
            "fold"      => "social_icons",
            "type" 		=> "text"
        );

        $of_options[] = array(
            "name" 		=> __('LinkedIn','framework'),
            "desc" 		=> __('Provide LinkedIn URL to display its icon in footer social icons.','framework'),
            "id" 		=> "linkedin_link",
            "std" 		=> '',
            "fold"      => "social_icons",
            "type" 		=> "text"
        );

        $of_options[] = array(
            "name" 		=> __('YouTube','framework'),
            "desc" 		=> __('Provide YouTube URL to display its icon in footer social icons.','framework'),
            "id" 		=> "youtube_link",
            "std" 		=> '',
            "fold"      => "social_icons",
            "type" 		=> "text"
        );

        $of_options[] = array(
            "name" 		=> __('Flickr','framework'),
            "desc" 		=> __('Provide Flickr URL to display its icon in footer social icons.','framework'),
            "id" 		=> "flickr_link",
            "std" 		=> '',
            "fold"      => "social_icons",
            "type" 		=> "text"
        );

        $of_options[] = array(
            "name" 		=> __('Skype','framework'),
            "desc" 		=> __('Provide Skype username to display its icon in footer social icons.','framework'),
            "id" 		=> "skype_username",
            "std" 		=> '',
            "fold"      => "social_icons",
            "type" 		=> "text"
        );

        $of_options[] = array(
            "name" 		=> __('Deviant Art','framework'),
            "desc" 		=> __('Provide Deviant Art URL to display its icon in footer social icons.','framework'),
            "id" 		=> "deviant_art_link",
            "std" 		=> '',
            "fold"      => "social_icons",
            "type" 		=> "text"
        );

        $of_options[] = array(
            "name" 		=> __('Google Plus','framework'),
            "desc" 		=> __('Provide Google Plus URL to display its icon in footer social icons.','framework'),
            "id" 		=> "google_link",
            "std" 		=> '',
            "fold"      => "social_icons",
            "type" 		=> "text"
        );

        $of_options[] = array(
            "name" 		=> __('StumbleUpon','framework'),
            "desc" 		=> __('Provide StumbleUpon URL to display its icon in footer social icons.','framework'),
            "id" 		=> "stumble_upon_link",
            "std" 		=> '',
            "fold"      => "social_icons",
            "type" 		=> "text"
        );



/* Backup Options */

$of_options[] = array(
    "name" 		=> __('Backup Options','framework'),
    "type" 		=> "heading"
);

        $of_options[] = array(
            "name" 		=> __('Backup and Restore Options','framework'),
            "id" 		=> "of_backup",
            "std" 		=> "",
            "type" 		=> "backup",
            "desc" 		=> __('You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.','framework')
        );

        $of_options[] = array(
            "name" 		=> __('Transfer Theme Options Data','framework'),
            "id" 		=> "of_transfer",
            "std" 		=> "",
            "type" 		=> "transfer",
            "desc" 		=> __('You can transfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".','framework')
        );
				
	}//End function: of_options()
}//End chack if function exists: of_options()

?>
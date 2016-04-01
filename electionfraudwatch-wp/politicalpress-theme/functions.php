<?php
/*-----------------------------------------------------------------------------------*/
/*	"inspiry" prefix is used with function names to make them unique
/*-----------------------------------------------------------------------------------*/



/*-----------------------------------------------------------------------------------*/
/*	Load Text Domain
/*-----------------------------------------------------------------------------------*/
load_theme_textdomain( 'framework' );



/*-----------------------------------------------------------------------------------*/
/*	Add Custom Background
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'custom-background' );



/*-----------------------------------------------------------------------------------*/
/*	Add Automatic Feed Links Support
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'automatic-feed-links' );



/*-----------------------------------------------------------------------------------*/
/*	Add Post Format Support for Image and Video
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'post-formats', array( 'image', 'video', 'gallery' ) );



/*-----------------------------------------------------------------------------------*/
/*	Include Theme Options
/*-----------------------------------------------------------------------------------*/
require_once ( get_template_directory() . '/admin/index.php');



/*-----------------------------------------------------------------------------------*/
/*	Include Contact Form Handler and Theme Comment
/*-----------------------------------------------------------------------------------*/
require_once(get_template_directory() . '/include/contact_form_handler.php');
require_once( get_template_directory() . '/include/theme_comment.php' );



/*-----------------------------------------------------------------------------------*/
/*	Include Meta Box
/*-----------------------------------------------------------------------------------*/
define( 'RWMB_URL', trailingslashit( get_template_directory_uri() . '/meta-box' ) );
define( 'RWMB_DIR', trailingslashit( get_template_directory() . '/meta-box' ) );
require_once RWMB_DIR . 'meta-box.php';
require_once RWMB_DIR . 'config-meta-boxes.php';



/*-----------------------------------------------------------------------------------*/
/*	Include Custom Post Types
/*-----------------------------------------------------------------------------------*/
require_once ( get_template_directory() . '/include/gallery-post-type.php' );
require_once ( get_template_directory() . '/include/campaign-event-post-type.php' );



/*-----------------------------------------------------------------------------------*/
//	Shortcodes
/*-----------------------------------------------------------------------------------*/
require_once( get_template_directory() . '/include/shortcodes/columns.php' );
require_once( get_template_directory() . '/include/shortcodes/elements.php' );



/*-----------------------------------------------------------------------------------*/
//	Widgets
/*-----------------------------------------------------------------------------------*/
require_once( get_template_directory() . '/widgets/' . 'video-widget.php');
require_once( get_template_directory() . '/widgets/' . 'gallery-widget.php');
require_once( get_template_directory() . '/widgets/' . 'testimonial-widget.php');
require_once( get_template_directory() . '/widgets/' . 'tabs-widget.php');



/*-----------------------------------------------------------------------------------*/
//	Register Widgets
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'inspiry_register_widgets' ) ){
    function inspiry_register_widgets() {
        register_widget( 'Video_Widget' );
        register_widget( 'Gallery_Widget' );
        register_widget( 'Testimonial_Widget' );
        register_widget( 'Tabs_Widget' );
    }
}
add_action( 'widgets_init', 'inspiry_register_widgets' );



/*-----------------------------------------------------------------------------------*/
/*	Register and load admin javascript
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'inspiry_admin_js' ) ){
    function inspiry_admin_js($hook){
        if ($hook == 'post.php' || $hook == 'post-new.php'){
            wp_register_script('admin-script', get_template_directory_uri() . '/js/admin.js', 'jquery');
            wp_enqueue_script('admin-script');
        }
    }
}
add_action('admin_enqueue_scripts','inspiry_admin_js',10,1);



/*-----------------------------------------------------------------------------------*/
/*	Creating Menu Places
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'menus' );

if ( function_exists( 'register_nav_menus' ) ) {
    register_nav_menus(
        array(
            'main-menu' => __('Main Menu','framework')
        )
    );
}



/*-----------------------------------------------------------------------------------*/
/*	Adding Default Thumbnail Sizes
/*-----------------------------------------------------------------------------------*/
if( function_exists( 'add_theme_support' ) ){
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 150, 150 );                                // Default post thumbnail dimensions

    add_image_size( 'gallery-blog-post-thumb', 754, 386, true);         // For blog posts
    add_image_size( 'blog-post-thumb', 754, 9999, false);               // For blog posts
    add_image_size( 'featured-post-thumb', 354, 144, true);             // For featured posts
    add_image_size( 'grid-post-thumb', 354, 200, true);                 // For grid posts
    add_image_size ( 'gallery-detail-thumb', 754, 460, true);           // For gallery detail page
    add_image_size ( 'biography-thumb', 250, 250, true);                // For gallery detail page
    add_image_size ( 'trail-thumb', 1170, 200, true);                   // For campaign trail event
}




/*-----------------------------------------------------------------------------------*/
/*	Enables Widget Sidebars
/*-----------------------------------------------------------------------------------*/
if ( function_exists('register_sidebar') ){


    // Location: Default Sidebar
    register_sidebar(array(
        'name'          =>  __('Default Sidebar','framework'),
        'before_widget' =>  '<section id="%1$s" class="widget %2$s">',
        'after_widget'  =>  '</section>',
        'before_title'  =>  '<h3 class="title">',
        'after_title'   =>  '</h3>'
    ));

    // Location: Home Sidebar
    register_sidebar(array(
        'name'          =>  __('Home Sidebar','framework'),
        'before_widget' =>  '<section id="%1$s" class="widget %2$s">',
        'after_widget'  =>  '</section>',
        'before_title'  =>  '<h3 class="title">',
        'after_title'   =>  '</h3>'
    ));

    // Location: Pages Sidebar
    register_sidebar(array(
        'name'          =>  __('Pages Sidebar','framework'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="title">',
        'after_title'   => '</h3>'
    ));

    // Location: Footer First Column
    register_sidebar(array(
        'name'          =>  __('Footer First Column','framework'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="title">',
        'after_title'   => '</h3>'
    ));

    // Location: Footer Second Column
    register_sidebar(array(
        'name'          =>  __('Footer Second Column','framework'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="title">',
        'after_title'   => '</h3>'
    ));

    // Location: Footer Third Column
    register_sidebar(array(
        'name'          =>  __('Footer Third Column','framework'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="title">',
        'after_title'   => '</h3>'
    ));

    // Location: Footer Fourth Column
    register_sidebar(array(
        'name'          =>  __('Footer Fourth Column','framework'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="title">',
        'after_title'   => '</h3>'
    ));

    // Location: Subscribe Form
    register_sidebar(array(
        'name'          => __('Subscribe Widget Area','framework'),
        'description'   => __('Place subscribe widget here.','framework'),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h3 class="title">',
        'after_title'   => '</h3>'
    ));

}



/*-----------------------------------------------------------------------------------*/
//	Theme Pagination Method
/*-----------------------------------------------------------------------------------*/

if(!function_exists('inspiry_pagination')){
    function inspiry_pagination($query){
        echo "<div class='paginate-links'>";
        $big = 999999999; // need an unlikely integer
        echo paginate_links( array(
                            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                            'format' => '?paged=%#%',
                            'prev_text'    => __('« Prev','framework'),
                            'next_text'    => __('Next »','framework'),
                            'current' => max( 1, get_query_var('paged') ),
                            'total' => $query->max_num_pages
                        ));
        echo "</div>";
    }
}

if(!function_exists('inspiry_legacy_pagination')){
    function inspiry_legacy_pagination($pages = ''){
        global $paged;

        if(empty($paged))$paged = 1;

        $prev = $paged - 1;
        $next = $paged + 1;
        $range = 2; // only change it to show more links
        $show_items = ($range * 2)+1;

        if($pages == ''){
            global $wp_query;
            $pages = $wp_query->max_num_pages;
            if(!$pages){
                $pages = 1;
            }
        }


        if(1 != $pages){
            echo "<div class='pagination'>";
            echo ($paged > 2 && $paged > $range+1 && $show_items < $pages)? "<a href='".get_pagenum_link(1)."' class='pp-btn'>&laquo; ".__('First', 'framework')."</a> ":"";
            echo ($paged > 1 && $show_items < $pages)? "<a href='".get_pagenum_link($prev)."' class='pp-btn' >&laquo; ". __('Previous', 'framework')."</a> ":"";

            for ($i=1; $i <= $pages; $i++){
                if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $show_items )){
                    echo ($paged == $i)? "<a href='".get_pagenum_link($i)."' class='pp-btn current' >".$i."</a> ":"<a href='".get_pagenum_link($i)."' class='pp-btn'>".$i."</a> ";
                }
            }

            echo ($paged < $pages && $show_items < $pages) ? "<a href='".get_pagenum_link($next)."' class='pp-btn' >". __('Next', 'framework') ." &raquo;</a> " :"";
            echo ($paged < $pages-1 &&  $paged+$range-1 < $pages && $show_items < $pages) ? "<a href='".get_pagenum_link($pages)."' class='pp-btn' >". __('Last', 'framework') ." &raquo;</a> ":"";
            echo "</div>";
        }
    }
}



/*-----------------------------------------------------------------------------------*/
/*	Load Required CSS Styles
/*-----------------------------------------------------------------------------------*/
if(!function_exists('inspiry_load_styles')){
    function inspiry_load_styles(){
        if (!is_admin()){
            global $data;

            // enqueue required fonts
            $protocol = is_ssl() ? 'https' : 'http';
            wp_enqueue_style( 'theme-raleway', "$protocol://fonts.googleapis.com/css?family=Raleway" );
            wp_enqueue_style( 'theme-noto', "$protocol://fonts.googleapis.com/css?family=Noto+Serif" );

            wp_register_style('flexslider-css',  get_template_directory_uri() . '/js/flexslider/flexslider.css', array(), '2.2.0', 'all');
            wp_register_style('swipebox-css',  get_template_directory_uri() . '/js/swipebox/swipebox.css', array(), '1.2.1', 'all');
            wp_register_style('bootstrap-css',  get_template_directory_uri() . '/css/bootstrap.css', array(), '3.0.0', 'all');
            wp_register_style('main-css',  get_template_directory_uri() . '/css/main.css', array(), '1.0', 'all');
            wp_register_style('custom-css',  get_template_directory_uri() . '/css/custom.css', array(), '1.0', 'all');



            // Flex Slider
            wp_enqueue_style('flexslider-css');

            // enqueue Swipe Box styles
            wp_enqueue_style('swipebox-css');

            // enqueue bootstrap styles
            wp_enqueue_style('bootstrap-css');

            // enqueue Main styles
            wp_enqueue_style('main-css');


            // Skins
            wp_register_style('dark-red',  get_template_directory_uri() . '/css/skins/dark-red.css', array(), '1.0', 'all');
            wp_register_style('rich-blue',  get_template_directory_uri() . '/css/skins/rich-blue.css', array(), '1.0', 'all');
            wp_register_style('light-green',  get_template_directory_uri() . '/css/skins/light-green.css', array(), '1.0', 'all');


            /* Theme Skins */
            $theme_skin = $data['theme_skin_stylesheet'];

            if(isset($_GET['skin'])){
                $theme_skin = $_GET['skin'];
            }elseif(isset($_COOKIE['theme_skin'])){
                $theme_skin = $_COOKIE['theme_skin'];
            }

            if( !empty($theme_skin) ){
                wp_register_style('theme-skin',  get_template_directory_uri() . '/css/skins/' . $theme_skin, array(), '1.0', 'all');
                wp_enqueue_style('theme-skin');
            }

            // enqueue Custom styles
            wp_enqueue_style('custom-css');

            /* if child theme is active then enqueue child-custom.css file from child theme directory. */
            if( is_child_theme() ) {
                wp_enqueue_style('child-custom-css',  get_stylesheet_directory_uri() . '/child-custom.css', array(), '1.0', 'all');
            }

        }
    }
    add_action('wp_enqueue_scripts', 'inspiry_load_styles');
}



/*-----------------------------------------------------------------------------------*/
/*	Load Required JS Scripts
/*-----------------------------------------------------------------------------------*/
if(!function_exists('inspiry_load_scripts')){

    function inspiry_load_scripts(){

        if (!is_admin()) {

            /* Defining scripts directory url */
            $java_script_url = get_template_directory_uri().'/js/';

            /* Registering Scripts */
            wp_register_script('flex_slider', $java_script_url.'flexslider/jquery.flexslider-min.js', array('jquery'), '2.2.0', true);
            wp_register_script('swipe_box', $java_script_url.'swipebox/jquery.swipebox.min.js', array('jquery'),'1.2.1', true);
            wp_register_script('isotope', $java_script_url.'isotope/jquery.isotope.min.js', array('jquery'), '1.5.25', true);
            wp_register_script('cycle2', $java_script_url.'jquery.cycle2.min.js', array('jquery'), 'v20130909', true);
            wp_register_script('jcarousel', $java_script_url.'jquery.jcarousel.min.js', array('jquery'), '0.2.9', true);
            wp_register_script('responsive_nav', $java_script_url.'responsive-nav.min.js', array('jquery'), '1.0.20', true);
            wp_register_script('validate', $java_script_url.'jquery.validate.min.js', array('jquery'), '1.11.1', true);
            wp_register_script('form', $java_script_url.'jquery.form.js', array('jquery'), '3.43.0', true);
            wp_register_script('bootstrap', $java_script_url.'bootstrap.min.js', array('jquery'), 'v3.0.0-rc.2', true);

            /* Custom Script */
            wp_register_script('custom',$java_script_url.'custom.js', array('jquery'), '1.0', true);

            /* Enqueue Scripts that are needed on all the pages */
            wp_enqueue_script('jquery');

            if(is_singular('campaign-trail-event')){
                $protocol = is_ssl() ? 'https' : 'http';
                wp_register_script( 'google-map', $protocol.'://maps.google.com/maps/api/js?sensor=false', array(), '', false );
                wp_enqueue_script( 'google-map' );
            }

            wp_enqueue_script('flex_slider');
            wp_enqueue_script('swipe_box');
            wp_enqueue_script('isotope');
            wp_enqueue_script('cycle2');
            wp_enqueue_script('jcarousel');
            wp_enqueue_script('validate');
            wp_enqueue_script('form');
            wp_enqueue_script('responsive_nav');
            wp_enqueue_script('bootstrap');

            if( is_single() || is_page() ) {
                wp_enqueue_script( 'comment-reply' );
            }


            wp_enqueue_script('custom');

            /* Responsive Navigation Title Translation Support - Ref : http://codex.wordpress.org/Function_Reference/wp_localize_script */
            $localized_array = array('nav_title' => __('Go to...','framework'));
            wp_localize_script( 'custom', 'localized', $localized_array );
        }
    }

    add_action('wp_enqueue_scripts', 'inspiry_load_scripts');
}





/*-----------------------------------------------------------------------------------*/
/*	Remove Width and Height Attributes
/*-----------------------------------------------------------------------------------*/
if( !function_exists('inspiry_remove_width_height_attribute') ){

    function inspiry_remove_width_height_attribute( $html ) {
        $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
        return $html;
    }

    add_filter( 'post_thumbnail_html', 'inspiry_remove_width_height_attribute', 10 );
    add_filter( 'image_send_to_editor', 'inspiry_remove_width_height_attribute', 10 );
}



/*-----------------------------------------------------------------------------------*/
/*	Custom Excerpt Method
/*-----------------------------------------------------------------------------------*/
if( !function_exists('inspiry_excerpt') ){
    function inspiry_excerpt($len=15, $trim="&hellip;"){
        $limit = $len+1;
        $excerpt = explode(' ', get_the_excerpt(), $limit);
        $num_words = count($excerpt);
        if($num_words >= $len){
            $last_item = array_pop($excerpt);
        }
        else {
            $trim = "";
        }
        $excerpt = implode(" ",$excerpt)."$trim";
        echo $excerpt;
    }
}

if( !function_exists('get_inspiry_excerpt') ){
    function get_inspiry_excerpt($len=15, $trim="&hellip;"){
        $limit = $len+1;
        $excerpt = explode(' ', get_the_excerpt(), $limit);
        $num_words = count($excerpt);
        if($num_words >= $len){
            $last_item=array_pop($excerpt);
        }
        else{
            $trim="";
        }
        $excerpt = implode(" ",$excerpt)."$trim";
        return $excerpt;
    }
}

if( !function_exists('inspiry_comment_excerpt') ){
    function inspiry_comment_excerpt($len=15, $comment_content = "" , $trim="&hellip;"){
        $limit = $len+1;
        $excerpt = explode(' ', $comment_content , $limit);
        $num_words = count($excerpt);
        if($num_words >= $len){
            $last_item = array_pop($excerpt);
        }
        else {
            $trim = "";
        }
        $excerpt = implode(" ",$excerpt)."$trim";
        echo $excerpt;
    }
}



/*-----------------------------------------------------------------------------------*/
/*	Get list of Gallery Images
/*-----------------------------------------------------------------------------------*/
if( !function_exists('inspiry_list_gallery_images') ){
    function inspiry_list_gallery_images($size = 'gallery-blog-post-thumb'){
        global $post;

        $gallery_images = rwmb_meta( 'political_press_gallery', 'type=plupload_image&size='.$size, $post->ID );

        if( !empty($gallery_images) )
        {
            ?>
            <div class="listing-slider">
                <ul class="slides">
                <?php
                foreach( $gallery_images as $gallery_image )
                {
                    $caption = ( !empty($gallery_image['caption']) ) ? $gallery_image['caption'] : $gallery_image['alt'];

                    echo '<li><a href="'.$gallery_image['full_url'].'" title="'.$caption.'" class="swipebox">';
                    echo '<img class="img-responsive" src="'.$gallery_image['url'].'" alt="'.$gallery_image['title'].'" />';
                    echo '</a></li>';
                }
                ?>
                </ul>
            </div>
            <?php
        }
        else if( has_post_thumbnail($post->ID) && ( is_singular('post') || is_singular('gallery-item') || is_singular('page') )){
            $image_id = get_post_thumbnail_id();
            $full_image_url = wp_get_attachment_url($image_id);
            ?>
            <figure>
                <a class="swipebox" href="<?php echo $full_image_url; ?>" title="<?php the_title(); ?>">
                    <?php the_post_thumbnail( $size, array( 'class' => "img-responsive" ) ); ?>
                </a>
            </figure>
            <?php
        }
        else if( has_post_thumbnail($post->ID) ){
            ?>
            <figure>
                <a class="<?php the_permalink(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <?php the_post_thumbnail( $size, array( 'class' => "img-responsive" ) ); ?>
                </a>
            </figure>
            <?php
        }
    }
}



/*-----------------------------------------------------------------------------------*/
/*	Skin Related Code For Demo
/*-----------------------------------------------------------------------------------*/
if(isset($_GET['skin'])){
    $theme_skin = $_GET['skin'];
    setcookie('theme_skin',$theme_skin, time() + 600 );
}



/*-----------------------------------------------------------------------------------*/
//	Dynamic CSS
/*-----------------------------------------------------------------------------------*/
require_once( get_template_directory() . '/css/dynamic-css.php' );



/*-----------------------------------------------------------------------------------*/
/*	Generate google analytics in footer
/*-----------------------------------------------------------------------------------*/
if( !function_exists('inspiry_generate_analytics') ){
    function inspiry_generate_analytics(){
        global $data;
        if(!empty($data['tracking_code'])){
            echo stripslashes($data['tracking_code']);
        }
    }
}
/* Attach analytics generation function with wp_footer action hook */
add_action('wp_footer', 'inspiry_generate_analytics');


/*-----------------------------------------------------------------------------------*/
/*	Content Width
/*-----------------------------------------------------------------------------------*/
if ( ! isset( $content_width ) ) $content_width = 770;


/*-----------------------------------------------------------------------------------*/
/*	Remove rel attribute from the category list
/*-----------------------------------------------------------------------------------*/
if( !function_exists('inspiry_remove_rel') ){
    function inspiry_remove_rel($output){
        $output = str_replace(' rel="tag"', '', $output);
        $output = str_replace(' rel="category"', '', $output);
        $output = str_replace(' rel="category tag"', '', $output);
        return $output;
    }
}

add_filter('wp_list_categories', 'inspiry_remove_rel');
add_filter('the_category', 'inspiry_remove_rel');


?>
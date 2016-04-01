/*-----------------------------------------------------------------------------------*/
/*	Admin side JS
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function() {

    /*-----------------------------------------------------------------------------------*/
    /*	To control meta boxes based on post format
     /*-----------------------------------------------------------------------------------*/
    var video_meta_box = jQuery('#video-meta-box');
    var gallery_meta_box = jQuery('#gallery-meta-box');
    var videoTrigger = jQuery('#post-format-video');
    var galleryTrigger = jQuery('#post-format-gallery');
    var group = jQuery('#post-formats-select input');

    if(videoTrigger.is(':checked')){
        hideAllExcept(video_meta_box);
    }
    else if(galleryTrigger.is(':checked')){
        hideAllExcept(gallery_meta_box);
    }else{
        hideAll();
    }

    group.change( function() {
        if( jQuery(this).val() == 'video'){
            hideAllExcept(video_meta_box);
        }else if( jQuery(this).val() == 'gallery'){
            hideAllExcept(gallery_meta_box);
        }else{
            hideAll();
        }
    });

    function hideAllExcept(required_meta_box) {
        hideAll();
        required_meta_box.show();
    }

    function hideAll() {
        video_meta_box.hide();
        gallery_meta_box.hide();
    }

});
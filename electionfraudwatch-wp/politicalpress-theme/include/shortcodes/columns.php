<?php

/* ------------------------------------------------------------------------*
 * COLUMNS
 * ------------------------------------------------------------------------*/

// columns wrapper
function show_columns($atts, $content = null) {
	return '<div class="row">'.do_shortcode($content).'</div>';
}
add_shortcode('columns', 'show_columns');

// single column
function show_single_column($atts, $content = null) {
    return '<div class="col-lg-12 col-md-12 col-sm-12">'.do_shortcode($content).'</div>';
}
add_shortcode('single_column', 'show_single_column');

// two columns
function show_two_column($atts, $content = null) {
    return '<div class="col-lg-6 col-md-6 col-sm-6">'.do_shortcode($content).'</div>';
}
add_shortcode('one_half', 'show_two_column');

// three columns
function show_one_third($atts, $content = null) {
	return '<div class="col-lg-4 col-md-4 col-sm-4">'.do_shortcode($content).'</div>';
}
add_shortcode('one_third', 'show_one_third');


// four columns
function show_one_fourth($atts, $content = null) {
    return '<div class="col-lg-3 col-md-3 col-sm-3">'.do_shortcode($content).'</div>';
}
add_shortcode('one_fourth', 'show_one_fourth');

// six columns
function show_one_sixth($atts, $content = null) {
    return '<div class="col-lg-2 col-md-2 col-sm-2">'.do_shortcode($content).'</div>';
}
add_shortcode('one_sixth', 'show_one_sixth');

// three columns
function show_three_fourth($atts, $content = null) {
    return '<div class="col-lg-9 col-md-9 col-sm-9">'.do_shortcode($content).'</div>';
}
add_shortcode('three_fourth', 'show_three_fourth');


?>
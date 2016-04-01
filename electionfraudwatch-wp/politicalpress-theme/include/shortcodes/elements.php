<?php
/* ------------------------------------------------------------------------*
 * Messages Shortcode
 * ------------------------------------------------------------------------*/
 
 // Information
function show_info($atts, $content = null) {
	return '<p class="info">'.do_shortcode($content).'<i class="glyphicon glyphicon-remove icon-remove"></i></p>';
}
add_shortcode('info', 'show_info');

// Tip
function show_tip($atts, $content = null) {
	return '<p class="tip">'.do_shortcode($content).'<i class="glyphicon glyphicon-remove icon-remove"></i></p>';
}
add_shortcode('tip', 'show_tip');
 
 // Error
function show_error($atts, $content = null) {
	return '<p class="error">'.do_shortcode($content).'<i class="glyphicon glyphicon-remove icon-remove"></i></p>';
}
add_shortcode('error', 'show_error');

 // Success
function show_success($atts, $content = null) {
	return '<p class="success">'.do_shortcode($content).'<i class="glyphicon glyphicon-remove icon-remove"></i></p>';
}
add_shortcode('success', 'show_success');



/* ------------------------------------------------------------------------*
 * Lists
 * ------------------------------------------------------------------------*/
// Arrow list one
function arrow_list_one($atts, $content = null) {
    return '<div class="bullet-list">'.do_shortcode($content).'</div>';
}
add_shortcode('arrow_list_one', 'arrow_list_one');

// Arrow list two
function arrow_list_two($atts, $content = null) {
    return '<div class="arrow-bullet-list">'.do_shortcode($content).'</div>';
}
add_shortcode('arrow_list_two', 'arrow_list_two');

// Arrow list Three
function arrow_list_three($atts, $content = null) {
    return '<div class="small-arrow-bullet-list">'.do_shortcode($content).'</div>';
}
add_shortcode('arrow_list_three', 'arrow_list_three');



/* ------------------------------------------------------------------------*
 * Buttons
 * ------------------------------------------------------------------------*/

// Default Small Button
function small_button($atts, $content = null) {
    extract(shortcode_atts(array(
                                'link' => '#',
                                'target' => ''
                                ), $atts));

    return '<a class="pp-btn xs" href="'.$link.'" target="'.$target.'">'.do_shortcode($content).'</a>';
}
add_shortcode('small_button', 'small_button');


// Default Medium Button
function medium_button($atts, $content = null) {
    extract(shortcode_atts(array(
                                'link' => '#',
                                'target' => ''
                                ), $atts));

    return '<a class="pp-btn sm" href="'.$link.'" target="'.$target.'">'.do_shortcode($content).'</a>';
}
add_shortcode('medium_button', 'medium_button');


// Default Large Button
function large_button($atts, $content = null) {
    extract(shortcode_atts(array(
                                'link' => '#',
                                'target' => ''
                                ), $atts));

    return '<a class="pp-btn lg" href="'.$link.'" target="'.$target.'">'.do_shortcode($content).'</a>';
}
add_shortcode('large_button', 'large_button');


// Small Orange Button
function small_orange_button($atts, $content = null) {
    extract(shortcode_atts(array(
                                'link' => '#',
                                'target' => ''
                                ), $atts));

    return '<a class="pp-btn orange xs" href="'.$link.'" target="'.$target.'">'.do_shortcode($content).'</a>';
}
add_shortcode('small_orange_button', 'small_orange_button');


// Medium Orange Button
function medium_orange_button($atts, $content = null) {
    extract(shortcode_atts(array(
                                'link' => '#',
                                'target' => ''
                                ), $atts));

    return '<a class="pp-btn orange sm" href="'.$link.'" target="'.$target.'">'.do_shortcode($content).'</a>';
}
add_shortcode('medium_orange_button', 'medium_orange_button');


// Large Orange Button
function large_orange_button($atts, $content = null) {
    extract(shortcode_atts(array(
                                'link' => '#',
                                'target' => ''
                                ), $atts));

    return '<a class="pp-btn orange lg" href="'.$link.'" target="'.$target.'">'.do_shortcode($content).'</a>';
}
add_shortcode('large_orange_button', 'large_orange_button');


// Small Grey Button
function small_grey_button($atts, $content = null) {
    extract(shortcode_atts(array(
                                'link' => '#',
                                'target' => ''
                                ), $atts));

    return '<a class="pp-btn grey xs" href="'.$link.'" target="'.$target.'">'.do_shortcode($content).'</a>';
}
add_shortcode('small_grey_button', 'small_grey_button');


// Medium Grey Button
function medium_grey_button($atts, $content = null) {
    extract(shortcode_atts(array(
                                'link' => '#',
                                'target' => ''
                                ), $atts));

    return '<a class="pp-btn grey sm" href="'.$link.'" target="'.$target.'">'.do_shortcode($content).'</a>';
}
add_shortcode('medium_grey_button', 'medium_grey_button');


// Large Grey Button
function large_grey_button($atts, $content = null) {
    extract(shortcode_atts(array(
                                'link' => '#',
                                'target' => ''
                                ), $atts));

    return '<a class="pp-btn grey lg" href="'.$link.'" target="'.$target.'">'.do_shortcode($content).'</a>';
}
add_shortcode('large_grey_button', 'large_grey_button');


/* ------------------------------------------------------------------------*
 * Tabs
 * ------------------------------------------------------------------------*/

function show_tabs($atts, $content = null){
    extract(shortcode_atts(array(
                                "titles" => '',
                                ), $atts));
    $all_title = explode(',',$titles);
    $html='<ul class="tabs-nav clearfix">';
    foreach($all_title as $title){
        $html.= '<li><a href="#">'.$title.'</a></li>';
    }
    $html.='</ul><div class="tabs-container">'.do_shortcode($content).'</div>';
    return $html;
}
add_shortcode('tabs', 'show_tabs');


function show_tab_pane($atts, $content = null) {

    return '<div class="tab-content">'.do_shortcode($content).'</div>';
}
add_shortcode('tab_pane', 'show_tab_pane');



/* ------------------------------------------------------------------------*
 * Accordion Shortcode
 * ------------------------------------------------------------------------*/
function show_accor_wrap($atts, $content = null) {
    return '<dl class="accordion clearfix">'.do_shortcode($content).'</dl>';
}
add_shortcode('accordion', 'show_accor_wrap');


function show_accor_block($atts, $content = null) {
    extract(shortcode_atts(array(
                                'title' => ''
                                ), $atts));

    return '<dt><span class="glyphicon glyphicon-chevron"></span>'.$title.'</dt><dd>'.do_shortcode($content).'</dd>';
}
add_shortcode('accor_block', 'show_accor_block');



/* ------------------------------------------------------------------------*
 * Toggle Shortcode
 * ------------------------------------------------------------------------*/
function show_toggle_wrap($atts, $content = null) {
    return '<dl class="toggle clearfix">'.do_shortcode($content).'</dl>';
}
add_shortcode('toggles', 'show_toggle_wrap');


function show_toggle_block($atts, $content = null) {
    extract(shortcode_atts(array(
                                'title' => ''
                                ), $atts));

    return '<dt><span  class="glyphicon glyphicon-chevron"></span>'.$title.'</dt><dd>'.do_shortcode($content).'</dd>';
}
add_shortcode('toggle_block', 'show_toggle_block');

?>
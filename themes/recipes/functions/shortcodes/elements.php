<?php

/* ------------------------------------------------------------------------*
 * ELEMENTS
 * ------------------------------------------------------------------------*/
 

// Fat Horizontal Line
function show_hline_fat($atts, $content = null) {
	return '<span class="w-pet-border"></span>';
}
add_shortcode('hline_fat', 'show_hline_fat');


// FAQ SHORTCODES

// FAQ wrapper
function show_faq_wrap($atts, $content = null) {
	return '<ul class="faq-list">'.do_shortcode($content).'</ul>';
}
add_shortcode('faq_wrapper', 'show_faq_wrap');

// FAQ Item
function show_faq_item($atts, $content = null) {
	extract(shortcode_atts(array(
			'title' => ''
	), $atts));
		
	return '<li><span class="number"></span><h3>'.$title.'</h3><p>'.do_shortcode($content).'</p></li>';
}
add_shortcode('faq_item', 'show_faq_item');



// Accordion Shortcode

// Accordion Container
function show_accor_wrap($atts, $content = null) {

	return '<div class="accor-container"><div class="accordion">'.do_shortcode($content).'</div></div>';
}
add_shortcode('accordion', 'show_accor_wrap');

// Accordion Block
function show_accor_block($atts, $content = null) {
	extract(shortcode_atts(array(
			'title' => '',
			'active' => false
	), $atts));
	
	$ac_class = '';
	if($active == true)
	  		$ac_class = 'current';
		
	return '<h5 class="'.$ac_class.'"><span></span>'.$title.'</h5><div class="pane '.$ac_class.'">'.do_shortcode($content).'</div>';
}
add_shortcode('accor_block', 'show_accor_block');



// Toggle Shortcode

// Toggle Container
function show_toggle_wrap($atts, $content = null) {

	return '<div class="toggle-box"><ul>'.do_shortcode($content).'</ul></div>';
}
add_shortcode('toggle', 'show_toggle_wrap');

// Toggle Block
function show_toggle_block($atts, $content = null) {
	extract(shortcode_atts(array(
			'title' => '',
			'active' => false
	), $atts));
	
	$ac_class = '';
	if($active == true)
			$ac_class = 'current';
		
	return '<li><h5>'.$title.'</h5><p>'.do_shortcode($content).'</p><span class="w-pet-border"></span></li>';
}
add_shortcode('toggle_block', 'show_toggle_block');



// Tabs Shortcode

// Tabs Container
function show_tabs_wrap($atts, $content = null) {
	extract(shortcode_atts(array(
			"titles" => '',
	), $atts));
	$all_title = explode(',',$titles);
	$html='<div class="tabed"><ul class="tabs">';
	foreach($all_title as $title){
			$html.='<li>'.$title.'<span></span></li>';
	}
	$html.='</ul>'.do_shortcode($content).'</div>';
	
	return $html;
}
add_shortcode('tabs', 'show_tabs_wrap');

// Tabs Block
function show_tab_block($atts, $content = null) {
		
	return '<div class="block">'.do_shortcode($content).'</div>';
}
add_shortcode('tab_block', 'show_tab_block');



// Buttons

// Standard Button Green

function show_button($atts, $content = null) {
	extract(shortcode_atts(array(
			"link" => '#',
			"target" => '_blank'
	), $atts));
	return '<a href="'.$link.'" target="'.$target.'" class="readmore"><span>'.$content.'</span></a>';
}
add_shortcode('button', 'show_button');


// List Styles
function show_list($atts, $content = null) {
	extract(shortcode_atts(array(
			"type" => ''
	), $atts));
	return '<div class="unlist '.$type.'">'.do_shortcode($content).'</div>';
}
add_shortcode('list', 'show_list');


// Info Notes
function show_note($atts, $content = null) {
	extract(shortcode_atts(array(
			"type" => ''
	), $atts));
	return '<p class="info-msg msg-'.$type.'"><span>'.do_shortcode($content).'</span></p>';
}
add_shortcode('note', 'show_note');


// Custom Menus
function show_menu($atts, $content = null) {
	extract(shortcode_atts(array(
			"type" => ''
	), $atts));
	return '<div class="menu-list">'.do_shortcode($content).'</div>';
}
add_shortcode('menu', 'show_menu');


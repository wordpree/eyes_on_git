<?php
require 'customizer/customizer.php';
function tsc_theme_enqueue_style(){
	wp_enqueue_style('ts-style',get_template_directory_uri().'/style.css');
//	wp_enqueue_style('tsc-style',get_stylesheet_directory_uri().'/style.css',array('ts-style'),'v0810');
	wp_enqueue_script('tsc-slider',get_stylesheet_directory_uri().'/js/slider.js',array('jquery'),'v1020',true);
}
add_action('wp_enqueue_scripts','tsc_theme_enqueue_style');
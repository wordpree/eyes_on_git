<?php
/*
function lander_theme_setup(){
	
}
add_action('after_setup_theme','lader_theme_setup');
*/

function lander_theme_scripts(){
	wp_enqueue_style('lander-style',get_stylesheet_directory_uri() . '/lander-style.css');

}

add_action('wp_enqueue_scripts','lander_theme_scripts');
?>
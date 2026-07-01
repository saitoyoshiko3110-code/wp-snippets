<?php

//functions.phpに書くscript

//enqueue_scripts

function site_scripts()
{
    //stylesheet
    wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.6.1/css/all.css');
    if ( !is_home() && !is_front_page() ){
    wp_enqueue_style('bxslider', get_stylesheet_directory_uri().'/css/slick-theme.css');
    }
    wp_enqueue_style('reset-css', get_stylesheet_directory_uri().'/css/reset.css');
    wp_enqueue_style('style-css', get_stylesheet_directory_uri().'/css/style.css');
    //javscript
    wp_enqueue_script('jquery');
    wp_enqueue_script('ajaxzip3', 'https://ajaxzip3.github.io/ajaxzip3.js', array('jquery'),'1.0', true);
    if ( !is_home() && !is_front_page() ){
    wp_enqueue_script('slick.min', get_stylesheet_directory_uri().'/js/slick.min.js', array('jquery'),'1.0', true);
    }
    wp_enqueue_script('script', get_stylesheet_directory_uri().'/js/script.js', array('jquery'),'1.0', true);
}
add_action('wp_enqueue_scripts', 'site_scripts');

<?php

if (!function_exists('ws_setup')) :
    function ws_setup()
    {
        add_theme_support('title-tag');
        add_theme_support('woocommerce');
        add_theme_support('post-thumbnails');

        register_nav_menus(
            array(
                'main' => 'Primary',
                'footer' => 'Footer',
            )
        );
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            )
        );
        add_theme_support('wp-block-styles');
        add_theme_support('align-wide');
        add_theme_support('responsive-embeds');
        remove_action('welcome_panel', 'wp_welcome_panel');
    }
endif;
add_action('after_setup_theme', 'ws_setup');


// Acf options pages
if (function_exists('acf_add_options_page')) {
    acf_add_options_page();
}

function ws_scripts()
{
    wp_enqueue_style('theme-default-css', get_stylesheet_uri(),  false, null);
    wp_enqueue_style('theme-css', get_template_directory_uri() . "/build/css/" . 'main.css',  false, '');

    wp_enqueue_script('theme-js', get_template_directory_uri() . "/build/js/" . 'main.js', [], '');
}
add_action('wp_enqueue_scripts', 'ws_scripts', 9999999);

$includes = glob(dirname(__FILE__) . '/inc/*.php');

foreach ($includes as $include) {
    include($include);
}

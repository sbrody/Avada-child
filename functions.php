<?php
/**
 * Sets up child theme.
 */


add_action('wp_enqueue_scripts', 'Axotan_Enqueue_styles', 1);

/**
 * Enqueues parent and child themes.
 *
 * @return void
 **/
function Axotan_Enqueue_styles()
{
    wp_enqueue_style(
        'avada-parent-stylesheet', get_template_directory_uri() . '/style.css'
    );

    wp_enqueue_style(
        'custom-style', get_stylesheet_directory_uri() . '/assets/css/index.css'
    );

    wp_enqueue_script(
        'custom-script', get_stylesheet_directory_uri() . '/assets/js/main.js'
    );
}
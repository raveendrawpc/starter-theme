<?php
function starter_theme_enqueue_scripts() {
    $style_asset = require get_template_directory() . '/dist/js/styles.asset.php';
    $script_asset = require get_template_directory() . '/dist/js/main.asset.php';

    // Enqueue the main javascript file
    wp_enqueue_script('starter-theme-scripts', get_template_directory_uri() . '/dist/js/main.js', $script_asset['dependencies'], $script_asset['version'], true);

    // Actually, this is CSS in JS, but it's the same idea
    wp_enqueue_script('starter-theme-styles', get_template_directory_uri() . '/dist/js/styles.js', $style_asset['dependencies'], $style_asset['version']);
}
add_action('wp_enqueue_scripts', 'starter_theme_enqueue_scripts');

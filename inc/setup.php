<?php
function starter_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus([
        'primary' => __('Primary Menu', 'starter-theme'),
    ]);
}
add_action('after_setup_theme', 'starter_theme_setup');

<?php
function starter_theme_enqueue_scripts() {
    // Get the asset file metadata
    $asset_file = include get_template_directory() . '/build/index.asset.php';

    // Enqueue the compiled JavaScript file
    wp_enqueue_script(
        'starter-theme-script',
        get_template_directory_uri() . '/build/index.js',
        $asset_file['dependencies'],
        $asset_file['version'],
        true
    );

    // Enqueue the compiled CSS file
    wp_enqueue_style(
        'starter-theme-style',
        get_template_directory_uri() . '/build/index.css',
        array(),
        $asset_file['version']
    );
}
add_action('wp_enqueue_scripts', 'starter_theme_enqueue_scripts');

// Display the post date
function starter_theme_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if (get_the_time('U') !== get_the_modified_time('U')) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf(
        $time_string,
        esc_attr(get_the_date(DATE_W3C)),
        esc_html(get_the_date()),
        esc_attr(get_the_modified_date(DATE_W3C)),
        esc_html(get_the_modified_date())
    );

    echo '<span class="posted-on">' . $time_string . '</span>';
}

// Display the post author
function starter_theme_posted_by() {
    echo '<span class="byline">' . esc_html__('by', 'starter-theme') . ' <span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span></span>';
}

// Display post categories and tags
function starter_theme_entry_footer() {
    if ('post' === get_post_type()) {
        // Display categories
        $categories_list = get_the_category_list(esc_html__(', ', 'starter-theme'));
        if ($categories_list) {
            echo '<span class="cat-links">' . esc_html__('Posted in: ', 'starter-theme') . $categories_list . '</span>';
        }

        // Display tags
        $tags_list = get_the_tag_list('', esc_html__(', ', 'starter-theme'));
        if ($tags_list) {
            echo '<span class="tags-links">' . esc_html__('Tagged: ', 'starter-theme') . $tags_list . '</span>';
        }
    }
}

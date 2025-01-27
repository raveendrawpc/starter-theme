<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 *
 * @package Starter_Theme
 */

get_header(); // Load the header template
?>

<main id="primary" class="site-main">
    <?php
    if (have_posts()) :
        // Start the Loop
        while (have_posts()) :
            the_post();
    ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php
                    // Display the post title
                    the_title('<h1 class="entry-title">', '</h1>');

                    // Display the post meta (e.g., date, author)
                    if ('post' === get_post_type()) :
                    ?>
                        <div class="entry-meta">
                            <?php
                            starter_theme_posted_on(); // Custom function to display post date
                            starter_theme_posted_by(); // Custom function to display post author
                            ?>
                        </div><!-- .entry-meta -->
                    <?php endif; ?>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php
                    // Display the post content
                    the_content(
                        sprintf(
                            wp_kses(
                                /* translators: %s: Post title. */
                                __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'starter-theme'),
                                array(
                                    'span' => array(
                                        'class' => array(),
                                    ),
                                )
                            ),
                            wp_kses_post(get_the_title())
                        )
                    );

                    // Display pagination for split posts
                    wp_link_pages(
                        array(
                            'before' => '<div class="page-links">' . esc_html__('Pages:', 'starter-theme'),
                            'after'  => '</div>',
                        )
                    );
                    ?>
                </div><!-- .entry-content -->

                <footer class="entry-footer">
                    <?php
                    // Display post categories and tags
                    starter_theme_entry_footer(); // Custom function to display footer meta
                    ?>
                </footer><!-- .entry-footer -->
            </article><!-- #post-<?php the_ID(); ?> -->
        <?php
        endwhile; // End the Loop

        // Display pagination for multiple posts
        the_posts_navigation();

    else :
        // If no content is found, display a message
        ?>
        <section class="no-results not-found">
            <header class="page-header">
                <h1 class="page-title"><?php esc_html_e('Nothing Found', 'starter-theme'); ?></h1>
            </header><!-- .page-header -->

            <div class="page-content">
                <?php
                if (is_home() && current_user_can('publish_posts')) :
                    printf(
                        '<p>' . wp_kses(
                            /* translators: %s: Link to create a new post. */
                            __('Ready to publish your first post? <a href="%s">Get started here</a>.', 'starter-theme'),
                            array(
                                'a' => array(
                                    'href' => array(),
                                ),
                            )
                        ) . '</p>',
                        esc_url(admin_url('post-new.php'))
                    );
                elseif (is_search()) :
                ?>
                    <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'starter-theme'); ?></p>
                <?php
                    get_search_form();
                else :
                ?>
                    <p><?php esc_html_e('It seems we can’t find what you’re looking for. Perhaps searching can help.', 'starter-theme'); ?></p>
                <?php
                    get_search_form();
                endif;
                ?>
            </div><!-- .page-content -->
        </section><!-- .no-results -->
    <?php
    endif;
    ?>
</main><!-- #primary -->

<?php
get_sidebar(); // Load the sidebar template (optional)
get_footer(); // Load the footer template
?>

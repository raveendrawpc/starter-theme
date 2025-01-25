<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header id="masthead" class="site-header">
        <div class="site-branding">
            <?php
            // Display the site title or logo
            if (has_custom_logo()) {
                the_custom_logo();
            } else {
            ?>
                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                <?php
                $starter_theme_description = get_bloginfo('description', 'display');
                if ($starter_theme_description || is_customize_preview()) :
                ?>
                    <p class="site-description"><?php echo $starter_theme_description; ?></p>
            <?php endif;
            }
            ?>
        </div><!-- .site-branding -->

        <nav id="site-navigation" class="main-navigation">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <?php esc_html_e('Menu', 'starter-theme'); ?>
            </button>
            <?php
            // Display the primary navigation menu
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'container'      => false,
                )
            );
            ?>
        </nav><!-- #site-navigation -->
    </header><!-- #masthead -->

    <div id="content" class="site-content">

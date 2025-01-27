</div><!-- #content -->

<footer id="colophon" class="site-footer">
    <div class="site-info">
        <?php
        printf(
            esc_html__('&copy; %1$s %2$s. All rights reserved.', 'starter-theme'),
            date_i18n('Y'),
            get_bloginfo('name')
        );
        ?>
        <span class="sep"> | </span>
        <?php
        printf(
            esc_html__('Theme: %1$s by %2$s.', 'starter-theme'),
            'Starter Theme',
            '<a href="https://example.com">Your Name</a>'
        );
        ?>
    </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>

</html>

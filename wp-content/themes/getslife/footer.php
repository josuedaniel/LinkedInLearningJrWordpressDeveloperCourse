</div>
        <footer  id ="colophon" class="site-footer" role = "contentinfo">
            <!--Main footer of the page-->
            <div class="site-info">
                <a ahref="<?php echo esc_url( __( 'http://wordpress.org', 'getslife-custom' ) ); ?>">
                    <?php printf( __( 'Proudly powered by %s', 'Getslife' ), 'WordPress' ); ?>
                </a>
                <span class = "sep"> | </span>
                <?php printf( __( 'Theme: %1$s by %2$s.', 'Getslife'), 'Getslife'
                    , '<a href="https://squaredcare.com" rel="developer"> Squared Care </a>' ); ?>
            </div> <!-- .site-info -->
        </footer> <!-- #colophon -->
    </div> <!-- #page -->

    <?php wp_footer(); ?>
    
</body>
</html>
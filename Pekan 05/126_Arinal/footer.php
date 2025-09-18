</div><footer id="colophon" class="site-footer">
    <div class="container">
        <div class="site-info">
            &copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>.
            <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'arinal' ) ); ?>">
                <?php printf( __( 'Proudly powered by %s', 'arinal' ), 'WordPress' ); ?>
            </a>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
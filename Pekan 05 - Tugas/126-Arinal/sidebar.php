<aside id="secondary" class="sidebar-area">
    <?php
    // Memeriksa apakah ada widget yang aktif di 'sidebar-1'
    if ( is_active_sidebar( 'sidebar-1' ) ) :
        dynamic_sidebar( 'sidebar-1' ); // Tampilkan widgetnya
    endif;
    ?>
</aside>
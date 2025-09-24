<aside>
    <?php if (is_active_sidebar('main-sidebar')) : ?>
        <?php dynamic_sidebar('main-sidebar'); ?>
    <?php else : ?>
        <p>Silakan tambahkan widget di Sidebar melalui admin WordPress.</p>
    <?php endif; ?>
</aside>

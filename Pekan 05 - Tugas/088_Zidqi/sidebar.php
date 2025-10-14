<div id="sidebar">
  <?php if ( is_active_sidebar('main-sidebar') ) : ?>
    <?php dynamic_sidebar('main-sidebar'); ?>
  <?php else : ?>
    <h3>Sidebar</h3>
    <p>Tambahkan widget di sidebar melalui admin panel.</p>
  <?php endif; ?>
</div>

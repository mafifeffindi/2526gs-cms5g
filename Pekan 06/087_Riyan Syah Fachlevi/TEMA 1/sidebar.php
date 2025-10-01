<aside id="sidebar">
  <?php if (is_active_sidebar('main_sidebar')) : ?>
    <?php dynamic_sidebar('main_sidebar'); ?>
  <?php else : ?>
    <div class="widget">
      <h4 class="widget-title">Sidebar</h4>
      <p>Tambahkan widget dari dashboard WordPress.</p>
    </div>
  <?php endif; ?>
</aside>

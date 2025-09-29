<aside class="primary-sidebar" role="complementary">
  <?php if ( is_active_sidebar( 'primary-sidebar' ) ) : ?>
    <?php dynamic_sidebar( 'primary-sidebar' ); ?>
  <?php else : ?>
    <div class="widget">
      <h3 class="widget-title">Widget Default</h3>
      <p>Silakan tambahkan widget dari Appearance → Widgets.</p>
    </div>
  <?php endif; ?>
</aside>

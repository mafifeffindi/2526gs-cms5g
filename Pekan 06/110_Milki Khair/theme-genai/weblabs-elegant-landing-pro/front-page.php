
<?php /* Template: Front Page Landing with WooCommerce */ ?>
<?php get_header(); ?>

<section class="hero">
  <div class="container hero-grid">
    <div>
      <?php if($k = get_theme_mod('wl_kicker','Koleksi Baru 2025')): ?>
        <span class="ribbon"><?php echo esc_html($k); ?></span>
      <?php endif; ?>
      <h1><?php echo wp_kses_post(get_theme_mod('wl_title','Premium Apparel Rasa High‑End, Harga Masuk Akal')); ?></h1>
      <p><?php echo wp_kses_post(get_theme_mod('wl_subtitle','Material adem dan jatuh, cutting modern, warna netral mudah dipadu.')); ?></p>
      <div style="display:flex;gap:10px;flex-wrap:wrap">
        <a class="btn alt" href="#order">Beli Sekarang</a>
        <a class="btn ghost" href="#catalog">Lihat Katalog</a>
      </div>
      <div class="usp">
        <div class="item">✔︎ Bahan premium</div>
        <div class="item">✔︎ Size lengkap (S–XXL)</div>
        <div class="item">✔︎ Garansi tukar size</div>
      </div>
    </div>
    <div class="hero-card">
      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/hero-mock.png" alt="Hero mockup" />
    </div>
  </div>
</section>

<section id="catalog" class="section">
  <div class="container">
    <div style="display:flex;justify-content:space-between;align-items:end;gap:16px;flex-wrap:wrap;margin-bottom:14px">
      <h2 style="margin:0">Katalog Pilihan</h2>
      <a href="#order" class="btn">Pesan via WhatsApp</a>
    </div>

    <?php if ( class_exists('WooCommerce') ) : ?>
      <div class="grid">
        <?php
          // Query latest 6 products
          $args = [
            'post_type' => 'product',
            'posts_per_page' => 6,
            'post_status' => 'publish'
          ];
          $loop = new WP_Query($args);
          if($loop->have_posts()):
            while($loop->have_posts()): $loop->the_post();
              global $product;
        ?>
              <article class="card">
                <a href="<?php the_permalink(); ?>" class="thumb">
                  <?php if (has_post_thumbnail()) { the_post_thumbnail('woocommerce_thumbnail'); } else { echo '<img src="'. esc_url(get_template_directory_uri()) .'/assets/img/placeholder-product.jpg" alt="'. esc_attr(get_the_title()) .'">'; } ?>
                </a>
                <div class="content">
                  <div class="badge">Stok <?php echo $product->is_in_stock() ? 'Ada' : 'Habis'; ?></div>
                  <div class="title" style="margin:10px 0 6px"><?php the_title(); ?></div>
                  <div><?php echo $product->get_price_html(); ?></div>
                  <div class="product-actions">
                    <?php woocommerce_template_loop_add_to_cart(); ?>
                    <a class="btn ghost" href="<?php the_permalink(); ?>">Detail</a>
                  </div>
                </div>
              </article>
        <?php
            endwhile;
            wp_reset_postdata();
          else:
            echo '<p>Belum ada produk. Tambahkan di WooCommerce → Products.</p>';
          endif;
        ?>
      </div>
    <?php else: ?>
      <p><strong>WooCommerce belum terpasang.</strong> Install & aktifkan WooCommerce agar tombol <em>Add to Cart</em> berfungsi.</p>
      <div class="grid">
        <?php for($i=1;$i<=6;$i++): ?>
          <article class="card">
            <div class="thumb"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/placeholder-product.jpg" alt="Produk contoh"></div>
            <div class="content">
              <div class="badge">Contoh</div>
              <div class="title" style="margin:10px 0 6px">Produk Contoh <?php echo $i; ?></div>
              <div class="product-actions">
                <a class="btn" href="#order">Add to Cart</a>
                <a class="btn ghost" href="#">Detail</a>
              </div>
            </div>
          </article>
        <?php endfor; ?>
      </div>
    <?php endif; ?>
  </div>
</section>

<?php if ( get_theme_mod('wl_show_testi', true) ) : ?>
<section class="section">
  <div class="container">
    <h2 style="margin-top:0">Apa kata mereka</h2>
    <div class="testimonials">
      <div class="quote">“Bahannya enak banget, jatuh dan adem. Cutting-nya pas, berasa brand luar.” — Raka</div>
      <div class="quote">“Dipakai meeting oke, nongkrong juga cakep. Warna netral gampang dipadu.” — Intan</div>
      <div class="quote">“Pelayanan cepat, minta tukar size juga dibantu.” — Satria</div>
    </div>
  </div>
</section>
<?php endif; ?>

<section id="order" class="cta">
  <div class="container">
    <div class="wrap">
      <div>
        <h2 style="margin:0 0 10px"><?php echo esc_html(get_theme_mod('wl_cta_text','Siap Upgrade Outfit?')); ?></h2>
        <p style="margin:0 0 16px;opacity:.9"><?php echo wp_kses_post(get_theme_mod('wl_cta_desc','Klik tombol di samping untuk order via WhatsApp. Tanyakan stok & ukuran—kami siap bantu.')); ?></p>
        <div style="display:flex;gap:10px;flex-wrap:wrap">
          <a class="btn alt" href="<?php echo esc_url( weblabs_wa_link() ); ?>" target="_blank" rel="noopener">Chat WhatsApp</a>
          <a class="btn ghost" href="#catalog">Lihat Produk</a>
        </div>
      </div>
      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/cta-mock.png" alt="Order mock" />
    </div>
  </div>
</section>

<?php get_footer(); ?>

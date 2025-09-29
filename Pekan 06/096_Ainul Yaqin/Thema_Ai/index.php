<?php
get_header();

// Ambil gambar hero dari customizer atau fallback ke assets
$hero_image = get_theme_mod('thema_branding_hero_image');
if ( !$hero_image ) {
  $hero_image = get_template_directory_uri() . '/assets/images/yaqin.jpg';
}

// Data konten (Anda bisa ubah langsung di sini atau ubah file)
?>

<section class="hero" style="background-image: url('<?php echo esc_url($hero_image); ?>');">
  <div class="hero-inner" data-aos="fade-right">
    <h1>I’m Ainul Yaqin</h1>
    <h1>A Graphic Designer Gen-Z</h1>
    <p>I create modern, impactful, and meaningful designs to help brands stand out and communicate their identity clearly.</p>
  </div>
</section>

<section class="section">
  <h2>Design Is More Than Visuals It’s Storytelling.</h2>
  <p class="lead">I create designs that combine creativity, strategy, and storytelling to help brands connect with their audience and leave a lasting impression.</p>

  <div class="features" >
    <div class="feature" data-aos="fade-up">
      <div class="icon">🎨</div>
      <h3>Creative & Adaptive</h3>
      <p>Designs that flexibly adapt to various needs from digital platforms to print media.</p>
    </div>

    <div class="feature" data-aos="fade-up" data-aos-delay="120">
      <div class="icon">✨</div>
      <h3>Strong Brand Identity</h3>
      <p>Every work is crafted with modern visual strategy to build a brand image that is unique and memorable..</p>
    </div>

    <div class="feature" data-aos="fade-up" data-aos-delay="240">
      <div class="icon">🖌️</div>
      <h3>Detail & Consistency</h3>
      <p>Focused on precision and consistency to ensure every element supports the message you want to deliver.</p>
    </div>
  </div>
</section>

<section class="laptop-section">
  <div class="laptop-img" data-aos="fade-right">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/laptop.png" alt="Tampilan aplikasi">
  </div>
  <div class="laptop-content" data-aos="fade-left">
    <h3>Designed for Brands & Businesses.</h3>
    <p>Build a professional visual identity that enhances appeal, trust, and growth for your brand.</p>
    <ul>
      <li>Modern and customizable design</li>
      <li>Visuals that support branding & marketing</li>
      <li>Ready to use across digital and print media</li>
    </ul>
  </div>
</section>

<footer class="site-footer">
  <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Semua hak dilindungi.</p>
</footer>

<?php get_footer(); ?>

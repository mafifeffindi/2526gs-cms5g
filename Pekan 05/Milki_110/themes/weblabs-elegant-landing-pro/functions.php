
<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action('after_setup_theme', function(){
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('menus');
  add_theme_support('woocommerce');
  register_nav_menus([ 'primary' => __('Primary Menu', 'weblabs-landing-pro') ]);
});

add_action('wp_enqueue_scripts', function(){
  wp_enqueue_style('weblabs-style', get_stylesheet_uri(), [], '1.1.0');
  wp_enqueue_style('weblabs-main', get_template_directory_uri() . '/assets/css/main.css', ['weblabs-style'], '1.1.0');
  wp_enqueue_script('weblabs-script', get_template_directory_uri() . '/assets/js/main.js', [], '1.0.0', true);

  // Inject dynamic CSS variables from Customizer
  $scheme = get_theme_mod('wl_scheme', 'navy');
  $accent = get_theme_mod('wl_accent', '');
  $vars = weblabs_get_css_vars($scheme, $accent);
  $css = ':root{' . join('', array_map(function($k) use ($vars){ return $k . ':' . $vars[$k] . ';'; }, array_keys($vars))) . '}';
  wp_add_inline_style('weblabs-main', $css);
});

function weblabs_get_css_vars($scheme, $accent_override){
  // Calm & elegant palettes
  $schemes = [
    'navy' => ['--bg'=>'#FAF9F6','--fg'=>'#0A1A3F','--accent'=>'#F5B700'],
    'moka' => ['--bg'=>'#FBF7F2','--fg'=>'#3B2F2F','--accent'=>'#D4A373'],
    'sage' => ['--bg'=>'#F6F8F5','--fg'=>'#1F2D2A','--accent'=>'#97C1A9'],
    'dusk' => ['--bg'=>'#F7F7FA','--fg'=>'#26233A','--accent'=>'#A78BFA'],
  ];
  $base = isset($schemes[$scheme]) ? $schemes[$scheme] : $schemes['navy'];
  if($accent_override){
    $base['--accent'] = $accent_override;
  }
  // constants
  $base['--muted'] = '#4b5563';
  $base['--surface'] = '#ffffff';
  $base['--surface-2'] = '#f3f4f6';
  $base['--radius'] = '16px';
  $base['--maxw'] = '1120px';
  return $base;
}

/**
 * Customizer: Hero texts, WhatsApp, Color scheme
 */
add_action('customize_register', function($wp){
  $wp->add_panel('weblabs_panel', [
    'title' => __('WebLabs Landing', 'weblabs-landing-pro'),
    'priority' => 10,
  ]);

  // Section: Branding & Colors
  $wp->add_section('weblabs_colors', [
    'title' => __('Colors & Style', 'weblabs-landing-pro'),
    'panel' => 'weblabs_panel',
  ]);

  $wp->add_setting('wl_scheme', ['default'=>'navy', 'sanitize_callback'=>'sanitize_text_field']);
  $wp->add_control('wl_scheme', [
    'type'=>'select', 'section'=>'weblabs_colors', 'label'=>__('Color Scheme','weblabs-landing-pro'),
    'choices'=>[ 'navy'=>'Navy/Gold (Elegan)','moka'=>'Moka (Hangat)','sage'=>'Sage (Tenang)','dusk'=>'Dusk (Modern)']
  ]);

  $wp->add_setting('wl_accent', ['default'=>'', 'sanitize_callback'=>'sanitize_hex_color']);
  $wp->add_control(new WP_Customize_Color_Control($wp, 'wl_accent', [
    'section'=>'weblabs_colors', 'label'=>__('Custom Accent (opsional)','weblabs-landing-pro')
  ]));

  // Section: Hero
  $wp->add_section('weblabs_hero', [
    'title' => __('Hero & Copywriting', 'weblabs-landing-pro'),
    'panel' => 'weblabs_panel',
  ]);

  $wp->add_setting('wl_kicker', ['default'=>'Koleksi Baru 2025', 'sanitize_callback'=>'sanitize_text_field']);
  $wp->add_control('wl_kicker', ['section'=>'weblabs_hero', 'label'=>__('Kicker (pita kecil)','weblabs-landing-pro')]);

  $wp->add_setting('wl_title', ['default'=>'Premium Apparel Rasa High‑End, Harga Masuk Akal', 'sanitize_callback'=>'wp_kses_post']);
  $wp->add_control('wl_title', ['section'=>'weblabs_hero', 'label'=>__('Judul besar','weblabs-landing-pro'), 'type'=>'textarea']);

  $wp->add_setting('wl_subtitle', ['default'=>'Material adem dan jatuh, cutting modern, warna netral mudah dipadu.', 'sanitize_callback'=>'wp_kses_post']);
  $wp->add_control('wl_subtitle', ['section'=>'weblabs_hero', 'label'=>__('Subjudul','weblabs-landing-pro'), 'type'=>'textarea']);

  // Section: CTA WhatsApp
  $wp->add_section('weblabs_cta', [
    'title' => __('CTA & WhatsApp', 'weblabs-landing-pro'),
    'panel' => 'weblabs_panel',
  ]);

  $wp->add_setting('wl_wa', ['default'=>'6281234567890', 'sanitize_callback'=>'sanitize_text_field']);
  $wp->add_control('wl_wa', ['section'=>'weblabs_cta', 'label'=>__('Nomor WhatsApp (62...)','weblabs-landing-pro')]);

  $wp->add_setting('wl_cta_text', ['default'=>'Siap Upgrade Outfit?', 'sanitize_callback'=>'sanitize_text_field']);
  $wp->add_control('wl_cta_text', ['section'=>'weblabs_cta', 'label'=>__('Heading CTA','weblabs-landing-pro')]);

  $wp->add_setting('wl_cta_desc', ['default'=>'Klik tombol di samping untuk order via WhatsApp. Tanyakan stok & ukuran—kami siap bantu.', 'sanitize_callback'=>'wp_kses_post']);
  $wp->add_control('wl_cta_desc', ['section'=>'weblabs_cta', 'label'=>__('Deskripsi CTA','weblabs-landing-pro'), 'type'=>'textarea']);

  // Section: Testimonials toggle
  $wp->add_section('weblabs_misc', [
    'title' => __('Lainnya', 'weblabs-landing-pro'),
    'panel' => 'weblabs_panel',
  ]);

  $wp->add_setting('wl_show_testi', ['default'=>true, 'sanitize_callback'=>function($v){ return (bool)$v; }]);
  $wp->add_control('wl_show_testi', ['section'=>'weblabs_misc', 'label'=>__('Tampilkan testimoni','weblabs-landing-pro'), 'type'=>'checkbox']);
});

/**
 * Helper: WhatsApp link
 */
function weblabs_wa_link(){
  $num = preg_replace('/[^0-9]/','', get_theme_mod('wl_wa','6281234567890'));
  $text = rawurlencode('Halo saya mau order baju');
  return 'https://wa.me/' . $num . '?text=' . $text;
}

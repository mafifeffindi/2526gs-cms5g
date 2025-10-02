<?php get_header(); ?>

<!-- Hero Section -->
<div class="hero">
    <img src="https://tse4.mm.bing.net/th/id/OIP.0QvfvIR2XApgW_-8plvVwwHaFu?pid=Api&P=0&h=180" 
         alt="Foto Mahasiswa Informatika" class="hero-img">

    <div class="hero-text">
        <h1>Selamat Datang di <span>Website Siti Musarrofah</span></h1>
        <p>Menyediakan informasi, artikel, dan materi pembelajaran seputar dunia 
        <strong>teknologi informasi, jaringan,</strong> dan <strong>pemrograman</strong>.</p>
        <a href="#artikel" class="btn-utama">Jelajahi Artikel</a>
    </div>
</div>

<!-- Artikel Section -->
<section id="artikel" class="artikel-section">
    <h2>Artikel Terbaru</h2>
    <div class="artikel-grid">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article class="card">
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="card-img">
                        <?php the_post_thumbnail('medium'); ?>
                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
                    <a href="<?php the_permalink(); ?>" class="btn-baca">Baca Selengkapnya</a>
                </div>
            </article>
        <?php endwhile; else: ?>
            <p>Belum ada artikel.</p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>

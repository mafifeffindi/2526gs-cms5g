<?php get_header(); ?>

<div class="hero">
    <img src="https://th.bing.com/th/id/OIP.k7dvkQVKT4ioP-SqoK7HEQHaHa?w=192&h=192&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3" alt="Foto Mahasiswa Informatika">

    <div class="hero-text">
        <h2>Selamat Datang di Website Remaja CCC Ramahrus_080</h2>
        <p>Menyediakan informasi, artikel, dan materi pembelajaran seputar dunia teknologi informasi, jaringan, dan pemrograman.</p>
    </div>
</div>

<section>
    <h2>Artikel Terbaru</h2>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p><?php the_excerpt(); ?></p>
        </article>
    <?php endwhile; else: ?>
        <p>Belum ada artikel.</p>
    <?php endif; ?>
</section>

<?php get_footer(); ?>

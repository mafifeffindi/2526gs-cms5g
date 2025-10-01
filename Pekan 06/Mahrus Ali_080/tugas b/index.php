<?php get_header(); ?>

<div class="container">

    <!-- Bagian Profil -->
    <div class="profile">
        <img src="https://th.bing.com/th/id/OIP.k7dvkQVKT4ioP-SqoK7HEQHaHa?w=192&h=192&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3" alt="Foto Profil">
        <h2>Mahrus Ali</h2>
        <p><strong>NIM :</strong> 2306311000080</p>
        <p><strong>Kelas :</strong> 5G</p>

        <!-- Sosial Media -->
        <div class="social-icons">
            <a href="https://facebook.com" target="_blank">Facebook</a>
            <a href="https://instagram.com" target="_blank">Instagram</a>
            <a href="https://linkedin.com" target="_blank">LinkedIn</a>
        </div>
    </div>

    <!-- Konten Posting -->
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php 
        // Sembunyikan postingan bawaan "Hello World!"
        if ( get_the_title() != 'Hello world!' ) : ?>
            <div class="post">
                <h2><?php the_title(); ?></h2>
                <div><?php the_content(); ?></div>
            </div>
        <?php endif; ?>
    <?php endwhile; else: ?>
        <p>Belum ada postingan, silakan tambah konten dari dashboard.</p>
    <?php endif; ?>

</div>

<?php get_footer(); ?>

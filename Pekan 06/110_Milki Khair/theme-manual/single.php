<?php get_header(); ?>
<main class="wrap">
  <section class="content-area content-thin">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article class="article-full">
      <header>
        <h2><?php the_title(); ?></h2>
        <div class="meta">Oleh: <?php the_author(); ?> • <?php echo get_the_date(); ?></div>
      </header>
      <?php the_content(); ?>
      <?php comments_template(); ?>
    </article>
  <?php endwhile; else: ?>
    <article><p>Maaf, postingan tidak ditemukan!</p></article>
  <?php endif; ?>
  </section>
  <?php get_sidebar(); ?>
</main>
<?php get_footer(); ?>

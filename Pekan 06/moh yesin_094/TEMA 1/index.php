<?php
get_header();
?>

<div class="container">
  <div class="site-main">
    <main class="content-area">
      <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
            <?php if ( has_post_thumbnail() ) : ?>
              <div class="post-thumb">
                <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail('pastel-thumb'); ?>
                </a>
              </div>
            <?php endif; ?>

            <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="post-meta">
              <?php echo get_the_date(); ?> • <?php the_author(); ?> • <?php comments_number('0 komentar','1 komentar','% komentar'); ?>
            </div>

            <div class="post-excerpt">
              <?php the_excerpt(); ?>
            </div>

            <a class="read-more" href="<?php the_permalink(); ?>"><?php _e('Baca Selengkapnya','pastel-theme'); ?> →</a>
          </article>
        <?php endwhile; ?>

        <div class="pagination">
          <?php
            the_posts_pagination( array(
              'mid_size' => 1,
              'prev_text' => __('‹ Sebelumnya','pastel-theme'),
              'next_text' => __('Berikutnya ›','pastel-theme'),
            ) );
          ?>
        </div>
      <?php else : ?>
        <p><?php _e('Tidak ada postingan ditemukan.','pastel-theme'); ?></p>
      <?php endif; ?>
    </main>

    <?php get_sidebar(); ?>
  </div>
</div>

<?php get_footer(); ?>

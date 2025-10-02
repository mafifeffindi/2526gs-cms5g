<?php get_header(); ?>

<div class="container">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            ?>
            <h2><?php the_title(); ?></h2>
            <div><?php the_content(); ?></div>
            <hr>
            <?php
        endwhile;
    else :
        echo '<p>Tidak ada postingan.</p>';
    endif;
    ?>
</div>

<?php get_footer(); ?>

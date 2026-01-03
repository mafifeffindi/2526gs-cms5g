<?php get_header(); ?>

<?php
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        the_title('<h3>', '</h3>');
        the_content();
    endwhile;
else :
    echo 'Tidak ada postingan';
endif;
?>

<?php get_footer(); ?>

<?php
/*
Template Name: Especiales
*/

get_header() ?>

<div id="page_wrap">
 <?php
    while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
        <div id="zone_suscribe">
            <?php the_content(); ?> <!-- Page Content -->
        </div><!-- .entry-content-page -->

   <?php
   endwhile; //resetting the page loop
  wp_reset_query(); //resetting the page query
?>
</div>

<?php get_footer() ?>

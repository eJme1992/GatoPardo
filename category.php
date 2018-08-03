<?php

get_header(); ?>
<section id="<?php echo single_cat_title("", false); ?>">
   <div class="w3-center">
      <h4 class="tb">
         <hr>
         <?php echo single_cat_title("", false); ?>
         <hr>
      </h4>
   </div>


	<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

		
			<?php while ( have_posts() ) :
				the_post();
 $thumbID = get_post_thumbnail_id($post->ID);
                $imgDestacada = wp_get_attachment_url($thumbID);
      ?>
   <a href="<?=get_permalink()?>">
      <div class="w3-container">
         <div class="imagen_ar"  style="background-image:url('<?=$imgDestacada?>');">
         </div>
         <div id="titulo"><h4><b><?=the_title()?></b></h4></div>
         <div id="wrap_in">
            <div id="excerpt" class="rn"><?=get_the_excerpt()?></div>
            <div id="author" class="rn"><b>Por: <?=get_the_author()?></b></div>
         </div>
      </div>
   </a>
 
			<?php endwhile; ?>
  <div class="w3-bar w3-center">
			
			<?php the_posts_pagination(
				array(
					'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
					'next_text'          => __( 'Next page', 'twentyfifteen' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( '', 'twentyfifteen' ) . ' </span>',
				)
			); ?>
</div>
			
		<?php else :
			get_template_part( 'content', 'none' );

		endif;
		?>
    
		</section>

<?php get_footer(); ?>


<?php get_header(); ?>

<section id="single">
	

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
                
                $thumbID = get_post_thumbnail_id($post->ID);
                $imgDestacada = wp_get_attachment_url($thumbID); 
            	$credito = get_field('credito_fotografia');

                ?>
				<div class="cabezera w3-center">
				<img src="<?=$imgDestacada?>" width="100%">
                <div class="conte w3-container">
                <h3><b><?php the_title() ?></b></h3>
                <div id="excerpt" class="rn"><?=get_the_excerpt()?></div>
               	<b><span class="rn"><?php the_author() ?></span>
				<?php if($credito != ''){echo '<span>'.$credito.'</span>';}	?></b>

				<div class="fecha w3-left-align"><b><?php echo get_the_date('F d, y') ?></b></div>
			    </div>
			    </div>
                <!-- CONTENIDO -->

                <div class="contenidopost w3-container">
                	 <?= the_content()?>

                </div>



				<?php 
				// If comments are open or we have at least one comment, load up the comment template.
				//if ( comments_open() || get_comments_number() ) :
				//	comments_template();
				//endif;

				
			endwhile; // End of the loop.
			?>

<section>

<?php
get_footer();


























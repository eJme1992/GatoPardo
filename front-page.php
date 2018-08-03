<?php get_header() ?>

<section id="home">

  <div id="carrusel" class="w3-display-container">
       <?php
    
    $args = array(
      'posts_per_page' => 4,
      'type'=> 'list',
//      'cat' => 3846
    );
    $i=0;
    $servicio = new WP_query($args);
            if ($servicio->have_posts()) : while ($servicio->have_posts()) : $servicio->the_post();
                $thumbID = get_post_thumbnail_id($post->ID);
                $imgDestacada = wp_get_attachment_url($thumbID);
                $i=$i+1;
      ?>
   <a href="<?=get_permalink()?>" class="mySlides <?php if($i==1) echo 'active';?>">
    <div class="w3-container w3-center">
         <div class="imagen_ar"  style="background-image:url('<?=$imgDestacada?>');">
         </div>
           
         <div id="titulo"><h4><b><?=the_title()?></b></h4></div>
         <div id="wrap_in" style="margin-bottom:18px;">
            <div id="excerpt" class="rn"><?=get_the_excerpt()?></div>
            <div id="author" class="rn"><b>Por: <?=get_the_author()?></b></div>
         </div>
      </div>
   </a>
   <?php
      endwhile;
      endif;
      ?>
     <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
  <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
 
</div>
   <div class="w3-center">
      <h4 class="tb">
         <hr>
          Destacados
         <hr>
      </h4>
   </div>
   <!-- ZONA 1 -->
   <?php
      $args = array(
         'posts_per_page' => 3,
         'type'=> 'list',
         'tag_id' => 4058,
          );
      
      $servicio = new WP_query($args);
            if ($servicio->have_posts()) : while ($servicio->have_posts()) : $servicio->the_post();
                $thumbID = get_post_thumbnail_id($post->ID);
                $imgDestacada = wp_get_attachment_url($thumbID);
      ?>
   <a href="<?=get_permalink()?>">
      <div class="w3-container">
         <div class="imagen_ar"  style="background-image:url('<?=$imgDestacada?>');">
         </div>
         <div id="titulo"><h4><b><?=the_title()?></b></h4></div>
         <div id="wrap_in" style="margin-bottom:18px;">
            <div id="excerpt" class="rn"><?=get_the_excerpt()?></div>
            <div id="author" class="rn"><b>Por: <?=get_the_author()?></b></div>
         </div>
      </div>
   </a>
   <?php
      endwhile;
      endif;
      ?>
   <!-- ZONA 1 FIN -->
 

         <!-- ZONA 2 -->
   <div class="w3-center">
      <h4 class="tb">
         <hr>
         <a href="<?php echo get_category_link(5) ?>">Cultura</a>
         <hr>
      </h4>
   </div>

    <?php
    $args = array(
         'posts_per_page' => 1,
         'type'=> 'list',
         'cat' => 5,
          );
      
      $servicio = new WP_query($args);
            if ($servicio->have_posts()) : while ($servicio->have_posts()) : $servicio->the_post();
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
   <?php
      endwhile;
      endif;
      ?>
      <!-- Fin -->

         <!-- ZONA 2 -->
   <div class="w3-center">
      <h4 class="tb">
         <hr>
         <a href="<?php echo get_category_link(4) ?>">Atelier</a>
         <hr>
      </h4>
   </div>

    <?php
    $args = array(
         'posts_per_page' => 1,
         'type'=> 'list',
         'cat' => 4,
          );
      
      $servicio = new WP_query($args);
            if ($servicio->have_posts()) : while ($servicio->have_posts()) : $servicio->the_post();
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
   <?php
      endwhile;
      endif;
      ?>
      <!-- Fin -->

         <!-- ZONA 2 -->
   <div class="w3-center">
      <h4 class="tb">
         <hr>
         <a href="<?php echo get_category_link(11); ?>">Opinión</a>
         <hr>
      </h4>
   </div>

    <?php
    $args = array(
         'posts_per_page' => 1,
         'type'=> 'list',
         'cat' => 11,
          );
      
      $servicio = new WP_query($args);
            if ($servicio->have_posts()) : while ($servicio->have_posts()) : $servicio->the_post();
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
   <?php
      endwhile;
      endif;
      ?>
      <!-- Fin -->

         <!-- ZONA 6 -->
   <div class="w3-center">
      <h4 class="tb">
         <hr>
           <a href="<?php echo get_category_link(15) ?>">Videos</a>
         <hr>
      </h4>
   </div>

    <?php
    $args = array(
         'posts_per_page' => 1,
         'type'=> 'list',
         'cat' => '15, 4054',
          );
      
      $servicio = new WP_query($args);
            if ($servicio->have_posts()) : while ($servicio->have_posts()) : $servicio->the_post();
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
   <?php
      endwhile;
      endif;
      ?>
      <!-- Fin -->
       <!-- it -->
   <div class="w3-center">
      <h4 class="tb">
         <hr>
           <a href="https://www.instagram.com/revistagatopardo/">Instragram</a>
         <hr>
      </h4>
   </div>
<div id="zona_9">
      <div id="wrap_inst">
         <h3 class="tb" style="display: none;"><a href="https://www.instagram.com/revistagatopardo/">Instragram</a></h3>
         <script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-2b48d2cd-e71a-413f-907c-4208969e8fbd"></div>
      </div>
   </div>

</section>

<?php get_footer() ?>

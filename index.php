<?php get_header() ?>
<div id="page_wrap" class="slider">
	<div id="slider_home" class="slider_r owl-carousel">
       <?php
		$output = '';
		$args1 = array(
			'posts_per_page' => 4,
			'type'=> 'list',
//			'cat' => 3846
		);
		$query = new WP_Query( $args1 ); $i=0;
		while ( $query->have_posts() ) : $query->the_post(); $i++;
			$pid = get_the_ID();
			$cats = get_cat($pid);
			$output .= '<a href="'.get_permalink().'">';
				$output .= '<div class="cover">';
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' /*'slider'*/ );
					$output .= '<div id="wrap_im" style="background-image:url('.$image[0].')">';
						//$output .= get_the_post_thumbnail($pid, 'slider' , array( 'title' => get_the_title() ));
					$output .= '</div>';
					$output .= '<div id="text_s">';
						$output .= '<div id="wrap_in">';
//							$output .= '<div id="cat">'.get_cat_name($cats).'</div>';
							$output .= '<div id="wrap_ti">';
								$output .= '<div id="wrap_title">';
								$output .= '<div id="title" class="tn">'.get_the_title().'</div>';
								$excerpt = wp_trim_words(get_the_excerpt(), 24);
//								$output .= '<div id="excerpt" class="rn">'.get_the_excerpt().'</div>';
								$output .= '<div id="excerpt" class="rn">'.$excerpt.'</div>';	
								$output .= '<div class="autor">Por '.get_the_author().'</div>';
								$output .= '</div>';
							$output .= '</div>';
//							$output .= '<div class="btn_lm">ver más</div>';
						$output .= '</div>';
					$output .= '</div>';
				$output .= '</div>';
			$output .= '</a>';
			$exc[] = get_the_ID();
		endwhile;
		wp_reset_query();
		echo $output ?>
    </div>
</div>
<div id="page_wrap" class="limit">
<?php //        <h3 class="tb"><a href="?><?php //echo get_category_link(10) ?><?php //">Actualidad</a></h3> ?>
	<div id="zona_1">
		<?php
		$output = '';
		$args1 = array(
			'posts_per_page' => 2,
			'type'=> 'list',
//			'cat' => 77,
			'tag_id' => 4058,
			'post__not_in' => $exc
		);
		$query = new WP_Query( $args1 ); $i=0;
		while ( $query->have_posts() ) : $query->the_post(); $i++;
			$pid = get_the_ID();
			$output .= '<article>';
				$output .= '<a href="'.get_permalink().'">';
                                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'trends' );
					$output .= '<div id="wrap_article">';
						$output .= '<div id="wrap_im" style="background-image:url('.$image[0].')"></div>';
						$output .= '<div id="wrap_t">';
							$output .= '<div id="title" class="tn"><div>'.get_the_title().'</div></div>';
						$output .= '</div>';
					$output .= '</div>';
					$output .= '<div id="wrap_in">';
						$output .= '<div id="excerpt" class="rn">'.get_the_excerpt().'</div>';
                                                $output .= '<div id="author" class="rn">Por: '.get_the_author().'</div>';
//						$output .= '<div class="btn_lm">ver más</div>';
					$output .= '</div>';
				$output .= '</a>';
			$output .= '</article>';
			$exc[] = get_the_ID();
		endwhile;
		wp_reset_query();
		echo $output;
		?>
                <?php
                $output = '';
                $args1 = array(
                        'posts_per_page' => 3,
                        'type'=> 'list',
//                        'cat' => 77,
			'tag_id' => 4058,
                        'post__not_in' => $exc
                );
		$output .= '<div class="wrap_second">';
                $query = new WP_Query( $args1 ); $i=0;
                while ( $query->have_posts() ) : $query->the_post(); $i++;
                        $pid = get_the_ID();
                        $output .= '<article class="second_wrap">';
                                $output .= '<a href="'.get_permalink().'">';
                                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'trends' );
                                        $output .= '<div id="wrap_article">';
                                                $output .= '<div id="wrap_im" style="background-image:url('.$image[0].')"></div>';
                                                $output .= '<div id="wrap_t">';
                                                        $output .= '<div id="title" class="tn"><div>'.get_the_title().'</div></div>';
                                                $output .= '</div>';
                                        $output .= '</div>';
                                        $output .= '<div id="wrap_in">';
                                                $output .= '<div id="excerpt" class="rn">'.get_the_excerpt().'</div>';
                                                $output .= '<div id="author" class="rn">Por: '.get_the_author().'</div>';
//                                              $output .= '<div class="btn_lm">ver más</div>';
                                        $output .= '</div>';
                                $output .= '</a>';
                        $output .= '</article>';
                        $exc[] = get_the_ID();
                endwhile;
                wp_reset_query();
		$output .= '</div>';
                echo $output;
                ?>

	</div>
	<div id="zona_desktop_home4">
		<?php dynamic_sidebar('desktop_index_cuatro'); ?>
	</div>
	<div id="zona_3" class="portafolio">
		<h3 class="tb"><a href="<?php echo get_category_link(5) ?>">Cultura</a></h3>
		<div id="editors">
			<?php
			$num_posts = 6;
			if(is_active_sidebar('zone_ad_inter'))
				$num_posts = 5;

			$output = '';
			$args1 = array(
				'posts_per_page' => $num_posts,
				'type'=> 'list',
				'cat' => 5,
				'post__not_in' => $exc
			);
			$query = new WP_Query( $args1 ); $i=0;
			while ( $query->have_posts() ) : $query->the_post(); $i++;
	                    $categories = get_the_category();
	                    $child_cat = $categories[0]->name;
	                        foreach( $categories as $category ){
		                        if( 0 != $category->parent ){
		                            $child_cat = $category;
		                        }
		                }

				$exc[] = get_the_ID();
				if($i%2 == 0)
					$class = 'par';
				else
					$class = 'impar';
				if($i == 4){
					$class = 'par-cuatro';
				}	
				$output .= '<article class="'.$class.'">';
//				$output .= '<article class="'.$class.' '.$second-class.'">';
					$output .= '<a href="'.get_permalink().'">';
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'trends' );
						$output .= '<div id="wrap_im" style="background-image:url('.$image[0].')"></div>';
						$output .= '<div class="category"><div class="category-children"><h3>'. $child_cat->name .'</h3></div></div>';
						$output .= '<div id="text_s">';
							$output .= '<div id="title" class="tn">'.get_the_title().'</div>';
							$output .= '<div id="excerpt" class="rn">'.get_the_excerpt().'</div>';
							$output .= '<div class="autor">Por '.get_the_author().'</div>';
//							$output .= '<div class="btn_lm">ver más</div>';
						$output .= '</div>';
					$output .= '</a>';
				$output .= '</article>';
				if($num_posts==5 && $i == $num_posts):
					$output .= '<article class="par">';
						$output .= get_dynamic_sidebar('zone_ad_inter');
					$output .= '</article>';
				endif;
			endwhile;
			
			wp_reset_query();
			echo $output
			?>
		</div>
	</div>
	<div id="page_wrap" class="slider">
		<h3 class="tb"><a href="<?php echo get_category_link(4) ?>">Atelier</a></h3>
		<div id="slider_home" class="slider_r owl-carousel atelier">
	       <?php
			$output = '';
			$args1 = array(
				'posts_per_page' => 4,
				'type'=> 'list',
				'cat' => 4
			);
			$query = new WP_Query( $args1 ); $i=0;
			while ( $query->have_posts() ) : $query->the_post(); $i++;
				$pid = get_the_ID();
				$cats = get_cat($pid);
				$output .= '<a href="'.get_permalink().'">';
					$output .= '<div class="cover">';
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' /*'slider'*/ );
						$output .= '<div id="wrap_im" style="background-image:url('.$image[0].')">';
							//$output .= get_the_post_thumbnail($pid, 'slider' , array( 'title' => get_the_title() ));
						$output .= '</div>';
						$output .= '<div id="text_s">';
							$output .= '<div id="wrap_in">';
	//							$output .= '<div id="cat">'.get_cat_name($cats).'</div>';
								$output .= '<div id="wrap_ti">';
									$output .= '<div id="title" class="tn">'.get_the_title().'</div>';
									$output .= '<div id="excerpt" class="rn">'.get_the_excerpt().'</div>';
									$output .= '<div class="autor">Por '.get_the_author().'</div>';
								$output .= '</div>';
	//							$output .= '<div class="btn_lm">ver más</div>';
							$output .= '</div>';
						$output .= '</div>';
					$output .= '</div>';
				$output .= '</a>';
				$exc[] = get_the_ID();
			endwhile;
			wp_reset_query();
			echo $output ?>
	    </div>
	</div>
	<div id="zona_desktop_home3">
		<?php dynamic_sidebar('desktop_index_tres'); ?>
	</div>
	<div id="zona_2">
		<h3 class="tb"><a href="<?php echo get_category_link(11); ?>">Opinión</a></h3>
		<div id="exper">
			<?php
			$output = '';
			$args1 = array(
				'posts_per_page' => 1,
				'type'=> 'list',
				'orderby' => 'date',
				'cat' => '11',
				'post__not_in' => $exc
			);
			$query = new WP_Query( $args1 ); $i=0;
			while ( $query->have_posts() ) : $query->the_post(); $i++;
				$pid = get_the_ID();
				$output .= '<article>';
					$output .= '<a href="'.get_permalink().'">';
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'experiencia' );
						$output .= '<div id="wrap_im" style="background-image:url('.$image[0].')"></div>';
						$output .= '<div id="text_s">';
							$output .= '<div id="title" class="tn">'.get_the_title().'</div>';
							$output .= '<div id="excerpt" class="rn">'.get_the_excerpt().'</div>';
							$output .= '<div class="autor">Por '.get_the_author().'</div>';
						$output .= '</div>';
					$output .= '</a>';
				$output .= '</article>';
				$exc[] = get_the_ID();
			endwhile;
			wp_reset_query();
			echo $output;
			?>
		</div>
		<div id="zona_desktop_home" class="google_ads">
			<?php dynamic_sidebar('desktop_index_uno'); ?>
		</div>
	</div>
	<div id="zona_5">
		<h3 class="tb"><a href="<?php echo get_category_link(15) ?>">Videos</a></h3>
		<?php
		$output = '';
		$args1 = array(
			'posts_per_page' => 3,
			'type'=> 'list',
			'cat' => '15, 4054',
			'post__not_in' => $exc
		);
		$query = new WP_Query( $args1 ); $i=0;
		while ( $query->have_posts() ) : $query->the_post(); $i++;
			$pid = get_the_ID();
			if($i == 1):
				$output .= '<article class="video_uno">';
					$output .= '<a>';
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'slider' );
						$output .= '<div id="wrap_im" style="background-image:url('.$image[0].')" class="lb_open">';
							$output .= '<div id="wrap_in">';
								$output .= '<div id="title" class="tn">'.get_the_title().'</div>';
								$output .= '<div id="excerpt" class="rn">'.get_the_excerpt().'</div>';
								$output .= '<div class="autor">Por '.get_the_author().'</div>';
							$output .= '</div>';
							$output .= '<div id="text_s" class="vcenter">';
								$output .= '<div id="btn_play"><img src="'.THEME_URL.'/img/video_play.png" /></div>';
							$output .= '</div>';
							$output .= '<div class="player_in" data-video="'.get_field('embed_video').'"></div>';
						$output .= '</div>';
					$output .= '</a>';
				$output .= '</article>';
			else:
				if($i == 2):
					$output .= '<div id="page_wrap" class="limit">';
					$output .= '<div id="wrap_v" class="v'.$i.'">';
				endif;
				$output .= '<article class="video_otro">';
					$output .= '<div id="wrap_art">';
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'video_tres' );
						$output .= '<div id="wrap_im" style="background-image:url('.$image[0].')">';
							$output .= '<div id="text_s" class="vcenter">';
									$output .= '<img src="'.THEME_URL.'/img/video_play.png" />';
							$output .= '</div>';
							$output .= '<div class="player_in" data-video="'.get_field('embed_video').'"></div>';
						$output .= '</div>';
						$output .= '<a href="'.get_permalink().'" >';
							$output .= '<div id="title" class="tn">'.get_the_title().'</div>';
							$output .= '<div id="excerpt" class="rn">'.get_the_excerpt().'</div>';
							$output .= '<div class="autor">Por '.get_the_author().'</div>';
//							$output .= '<div class="btn_lm">ver más</div>';
						$output .= '</a>';
					$output .= '</div>';
				$output .= '</article>';
				if($i == 3):
					$output .= '</div>';
					$output .= '</div>';
				endif;
			endif;
			$exc[] = get_the_ID();
		endwhile;
		wp_reset_query();
		echo $output
		?>
	</div>
</div>
<div id="page_wrap" class="limit">
<?php /*	<div id="zona_desktop_home5"> */ ?>
		<?php // dynamic_sidebar('desktop_index_cinco'); ?>
<?php /*	</div> */ ?>
	<div id="zona_9">
		<div id="wrap_inst">
			<h3 class="tb"><a href="https://www.instagram.com/revistagatopardo/">Instragram</a></h3>
			<script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-2b48d2cd-e71a-413f-907c-4208969e8fbd"></div>
		</div>
	</div>
</div>
<?php get_footer() ?>
